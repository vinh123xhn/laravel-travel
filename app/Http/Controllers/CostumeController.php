<?php

namespace App\Http\Controllers;

use App\Models\Costume;
use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CostumeController extends Controller
{
    public function index() {
        $costumes = Costume::get();
        return view('costume.list', compact('costumes'));
    }

    public function filter(Request $request) {
        $category = $request->category;
        if ($category) {
            $costumes = Costume::where('category','=', $category)->get();
        } else {
            $costumes = Costume::get();
        }
        return view('costume.list')->with(compact('costumes', 'category'));
    }

    public function getForm() {
        return view('costume.form');
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
            Costume::create($data);
            return redirect()->route('admin.costume.list');
        }
    }

    public function editForm($id) {
        $costume = Costume::FindOrFail($id);
        return view('costume.edit', compact('costume'));
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
            $ostume = Costume::FindOrFail($id);
            if ($request->hasFile('image')) {
                //xoa anh cu neu co
                $currentImg = $ostume->image;
                if ($currentImg) {
                    Storage::delete('public/' . $currentImg);
                }
                //cap nhap anh moi
                $image = $request->file('image');
                $pathImage = $image->store('images', 'public');
            }
            if ($request->hasFile('document')) {
                //xoa anh cu neu co
                $currentDocument = json_decode($ostume->document);
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
            Costume::find($id)->update($updateRequest);
            return redirect()->route('admin.costume.list');
        }
    }

    public function detail($id) {
        $costume = Costume::FindOrFail($id);
        if (!empty($costume->document)) {
            $document = json_decode($costume->document);
            return view('costume.detail', compact('costume', 'document'));
        }
        return view('costume.detail', compact('costume'));
    }

    public function exportData() {
//        field => title
        $exportFields = [
            'stt' => 'STT',
            'code' => 'Mã trang phục',
            'name' => 'Tên trang phục',
            'material' => 'Chất liệu',
            'category' => 'Phân loại',
            'nation' => 'Dân tộc',
            'religion' => 'Tôn giáo',
            'status' => 'Tình trạng hiện nay',
            'purpose' => 'Mục đích sử dụng',
        ];
        $costumes = Costume::orderBy('created_at', 'desc')->get();
        $category = config('base.costume_category');
        $material = config('base.costume_material');
        $status = config('base.costume_status');
        $purpose = config('base.costume_purpose');
        $nation = config('base.ethnic_groups');
        $religion = config('base.religion');

        $data = [];
        foreach ($costumes as $k => $item) {
            $item['stt'] = $k + 1;
            $item['category'] = !empty($item->category) ? $category[$item->category] : '';
            $item['material'] = !empty($item->material) ? $material[$item->material] : '';
            $item['nation'] = !empty($item->nation) ? $nation[$item->nation] : '';
            $item['religion'] = !empty($item->religion) ? $religion[$item->religion] : '';
            $item['status'] = !empty($item->status) ? $status[$item->status] : '';
            $item['purpose'] = !empty($item->purpose) ? $purpose[$item->purpose] : '';

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('ThongKeTrangPhuc data'.date('Y-m-d'), $exportFields, $data, 'ThongKeTrangPhuc-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id) {
        Costume::FindOrFail($id)->delete();
        return redirect()->back();
    }
}
