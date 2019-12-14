<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArtController extends Controller
{
    public function index() {
        $arts = Art::get();
        return view('art.list')->with(compact('arts'));
    }

    public function filter(Request $request) {
        $category = $request->category;
        if ($category) {
            $arts = Art::where('category','=', $category)->get();
        } else {
            $arts = Art::get();
        }
        return view('art.list')->with(compact('arts', 'category'));
    }

    public function getForm() {
        return view('art.form');
    }

    public function saveForm(Request $request) {
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'image' => 'image',
            'category' => 'required'
        ];

        $messages = [
            'name.required' => 'tên di tích không được để trống',
            'code.required' => 'mã di tích không được để trống',
            'image.image' => 'Ảnh đại diện phải thuộc định dạng ảnh',
            'category.required' => 'Phân loại không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $data = $request->all();
            unset($data['document']);
            unset($data['image']);
            if($request->hasFile('image'))
            {
                $image_path = $request->file('image')->store('images', 'public');
                $data['image'] = $image_path;
            }
            if($request->hasFile('document'))
            {
                $document = [];
                foreach ($request->file('document') as $k => $file) {
                    $path = $file->store('document','public');
                    $document[$k] = $path;
                }
                $data['document'] = json_encode($document);
            }
            Art::create($data);
            return redirect()->route('admin.art.list');
        }
    }

    public function editForm($id) {
        $art = Art::FindOrFail($id);
        return view('art.edit', compact('art'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'image' => 'image',
            'category' => 'required'
        ];

        $messages = [
            'name.required' => 'tên di tích không được để trống',
            'code.required' => 'mã di tích không được để trống',
            'image.image' => 'Ảnh đại diện phải thuộc định dạng ảnh',
            'category.required' => 'Phân loại không được để trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $art = Art::FindOrFail($id);
            if ($request->hasFile('image')) {
                //xoa anh cu neu co
                $currentImg = $art->image;
                if ($currentImg) {
                    Storage::delete('public/' . $currentImg);
                }
                //cap nhap anh moi
                $image = $request->file('image');
                $pathImage = $image->store('images', 'public');
            }
            if ($request->hasFile('document')) {
                //xoa anh cu neu co
                $currentDocument = json_decode($art->document);
                if ($currentDocument) {
                    foreach ($currentDocument as $file)
                        Storage::delete('/public/' . $file);
                }
                //cap nhap anh moi
                $document = [];
                foreach ($request->file('document') as $k => $file) {
                    $path = $file->store('document', 'public');
                    $document[$k] = $path;
                }
            }
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            unset($updateRequest['image']);
            unset($updateRequest['document']);
            if (isset($pathImage)) {
                $updateRequest['image'] = $pathImage;
            }
            if (isset($document)) {
                $updateRequest['document'] = json_encode($document);;
            }
            Art::find($id)->update($updateRequest);
            return redirect()->route('admin.art.list');
        }
    }

    public function detail($id) {
        $art = Art::FindOrFail($id);
        if (!empty($art->document)) {
            $document = json_decode($art->document);
            return view('art.detail', compact('art', 'document'));
        }
        return view('art.detail', compact('art'));
    }

    public function exportData() {
//        field => title
        $exportFields = [
            'stt' => 'STT',
            'code' => 'Mã nghệ thuật',
            'name' => 'Tên nghệ thuật',
            'category' => 'Loại hình',
            'level_1' => 'Loại hình chi tiết cấp 1',
            'level_2' => 'Loại hình chi tiết cấp 2',
            'status' => 'Hiện trạng',
        ];
        $arts = Art::orderBy('created_at', 'desc')->get();
        $category = config('base.art_category');
        $level_1 = config('base.art_level_1');
        $level_2 = config('base.art_level_2');
        $status = config('base.art_status');

        $data = [];
        foreach ($arts as $k => $item) {
            $item['stt'] = $k + 1;
            $item['category'] = !empty($item->category) ? $category[$item->category] : '';
            $item['level_1'] = !empty($item->level_1) ? $level_1[$item->level_1] : '';
            $item['level_2'] = !empty($item->level_2) ? $level_2[$item->level_2] : '';
            $item['status'] = !empty($item->status) ? $status[$item->status] : '';

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('ThongKeNgheThuat data'.date('Y-m-d'), $exportFields, $data, 'ThongKeNgheThuat-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id) {
        Art::FindOrFail($id)->delete();
        return redirect()->back();
    }
}
