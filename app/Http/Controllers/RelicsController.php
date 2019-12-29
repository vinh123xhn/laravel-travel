<?php

namespace App\Http\Controllers;

use App\Models\Relics;
use App\Models\RelicsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RelicsController extends Controller
{
    public function index() {
        $relics = Relics::get();
        return view('relics.list')->with(compact('relics'));
    }

    public function filter(Request $request) {
        $category = $request->category;
        if ($category) {
            $relics = Relics::where('category','=', $category)->get();
        } else {
            $relics = Relics::get();
        }
        return view('relics.list')->with(compact('relics', 'category'));
    }

    public function getForm() {
        return view('relics.form');
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
            Relics::create($data);
            return redirect()->route('admin.relics.list');
        }
    }

    public function editForm($id) {
        $relic = Relics::FindOrFail($id);
        return view('relics.edit', compact('relic'));
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
            $relic = Relics::FindOrFail($id);
            if ($request->hasFile('image')) {
                //xoa anh cu neu co
                $currentImg = $relic->image;
                if ($currentImg) {
                    Storage::delete('public/' . $currentImg);
                }
                //cap nhap anh moi
                $image = $request->file('image');
                $pathImage = $image->store('images', 'public');
            }
            if ($request->hasFile('document')) {
                //xoa anh cu neu co
                $currentDocument = json_decode($relic->document);
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
            Relics::find($id)->update($updateRequest);
            return redirect()->route('admin.relics.list');
        }
    }

    public function detail($id) {
        $relics = Relics::FindOrFail($id);
        if (isset($relics->document)) {
            $document = json_decode($relics->document);
        }else {
            $document = [];
        }
        return view('relics.detail', compact('relics', 'document'));
    }

    public function exportData() {
//        field => title
        $exportFields = [
            'stt' => 'STT',
            'code' => 'Mã di tích',
            'name' => 'Tên di tích',
            'relics_level' => 'Cấp di tích',
            'category' => 'Phân loại',
            'num_of_recognition_decisions' => 'Số quyết định công nhận',
            'year_of_recognition' => 'Năm công nhận',
            'status' => 'Tình trạng hiện nay',
            'age' => 'Niên đại',
            'detection_process' => 'Quán trình phát hiện',
            'management_unit' => 'Đơn vị quản lý',
            'celebrity' => 'Danh nhân liên quan',
            'location' => 'Địa điểm liên quan',
            'event' => 'Sự kiên liên quan',
        ];
        $relics = Relics::orderBy('created_at', 'desc')->get();
        $category = config('base.relics_category');
        $relics_level = config('base.relics_level');
        $status = config('base.relics_status');

        $data = [];
        foreach ($relics as $k => $item) {
            $item['stt'] = $k + 1;
            $item['category'] = !empty($item->category) ? $category[$item->category] : '';
            $item['relics_level'] = !empty($item->relics_level) ? $relics_level[$item->relics_level] : '';
            $item['status'] = !empty($item->status) ? $status[$item->status] : '';

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('ThongKeDiTich data'.date('Y-m-d'), $exportFields, $data, 'ThongKeDiTich-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id) {
        Relics::FindOrFail($id)->delete();
        return redirect()->back();
    }
}
