<?php

namespace App\Http\Controllers;

use App\Models\Crafts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Scalar;

class CraftsController extends Controller
{
    public function index() {
       $crafts = Crafts::get();
       return view('crafts.list')->with(compact('crafts'));
    }

    public function filter(Request $request) {
        $category = $request->category;
        if ($category) {
            $crafts = Crafts::where('category','=', $category)->get();
        } else {
            $crafts = Crafts::get();
        }
        return view('crafts.list')->with(compact('crafts', 'category'));
    }

    public function getForm() {
        return view('crafts.form');
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
            Crafts::create($data);
            return redirect()->route('admin.crafts.list');
        }
    }

    public function editForm($id) {
        $crafts = Crafts::FindOrFail($id);
        return view('crafts.edit', compact('crafts'));
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
            $crafts = Crafts::FindOrFail($id);
            if ($request->hasFile('image')) {
                //xoa anh cu neu co
                $currentImg = $crafts->image;
                if ($currentImg) {
                    Storage::delete('public/' . $currentImg);
                }
                //cap nhap anh moi
                $image = $request->file('image');
                $pathImage = $image->store('images', 'public');
            }
            if ($request->hasFile('document')) {
                //xoa anh cu neu co
                $currentDocument = json_decode($crafts->document);
                if ($currentDocument) {
                    foreach ($currentDocument as $file)
                        Storage::delete('/public/' . $file);
                }
                //cap nhap anh moielic
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
            Crafts::find($id)->update($updateRequest);
            return redirect()->route('admin.crafts.list');
        }
    }

    public function detail($id) {
        $crafts = Crafts::FindOrFail($id);
        if (isset($crafts->document)) {
            $document = json_decode($crafts->document);
        }else {
            $document = [];
        }
        return view('crafts.detail', compact('crafts', 'document'));
    }

    public function exportData() {
//        field => title
        $exportFields = [
            'stt' => 'STT',
            'code' => 'Mã nghề thủ công',
            'name' => 'Tên nghề thủ công',
            'anniversary' => 'Ngày giỗ tổ',
            'year_of_recognition' => 'Năm công nhận',
            'type' => 'Nghề hay làng nghề',
            'type_of_crafts_village' => 'Loại làng nghề',
            'concrete' => 'Loại nhóm cụ thể',
            'qualification' => 'Trình độ kỹ thuật',
            'number_of' => 'Số người tham gia',
            'status' => 'Hiện trạng',
        ];
        $crafts = Crafts::orderBy('created_at', 'desc')->get();
        $category = config('base.crafts_category');
        $type = config('base.crafts_village_or_work');
        $type_of_crafts_village = config('base.crafts_village_type');
        $concrete = config('base.crafts_concrete');
        $qualification = config('base.crafts_qualification');
        $number_of = config('base.crafts_number_of');
        $status = config('base.crafts_status');

        $data = [];
        foreach ($crafts as $k => $item) {
            $item['stt'] = $k + 1;
            $item['category'] = !empty($item->category) ? $category[$item->category] : '';
            $item['type'] = !empty($item->type) ? $type[$item->type] : '';
            $item['type_of_crafts_village'] = !empty($item->type_of_crafts_village) ? $type_of_crafts_village[$item->type_of_crafts_village] : '';
            $item['concrete'] = !empty($item->concrete) ? $concrete[$item->concrete] : '';
            $item['qualification'] = !empty($item->qualification) ? $qualification[$item->qualification] : '';
            $item['number_of'] = !empty($item->number_of) ? $number_of[$item->number_of] : '';
            $item['status'] = !empty($item->status) ? $status[$item->status] : '';

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('TKNgheThuCong data'.date('Y-m-d'), $exportFields, $data, 'TKNgheThuCong-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id) {
        Crafts::FindOrFail($id)->delete();
        return redirect()->back();
    }
}
