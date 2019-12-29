<?php

namespace App\Http\Controllers;

use App\Models\TouristAcommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TouristAcommodationController extends Controller
{
    public function index() {
        $touristAcommodations = TouristAcommodation::get();
        return view('tourist_acommodation.list')->with(compact('touristAcommodations'));
    }

    public function filter(Request $request) {
        $category = $request->category;
        if ($category) {
            $touristAcommodations = TouristAcommodation::where('category','=', $category)->get();
        } else {
            $touristAcommodations = TouristAcommodation::get();
        }
        return view('tourist_acommodation.list')->with(compact('touristAcommodations', 'category'));
    }

    public function getForm() {
        return view('tourist_acommodation.form');
    }

    public function saveForm(Request $request) {
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'image' => 'image',
            'type' => 'required',
            'email' => 'email'
        ];

        $messages = [
            'name.required' => 'tên cơ sở lưu trú không được để trống',
            'code.required' => 'mã cơ sở lưu trú không được để trống',
            'image.image' => 'Ảnh đại diện phải thuộc định dạng ảnh',
            'type.required' => 'Phân loại không được để trống',
            'email.email' => 'Thư điện tử không đúng đính dạng',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $data = $request->all();
            unset($data['image']);
            if($request->hasFile('image'))
            {
                $image_path = $request->file('image')->store('images', 'public');
                $data['image'] = $image_path;
            }
            TouristAcommodation::create($data);
            return redirect()->route('admin.tourist_acommodation.list');
        }
    }

    public function editForm($id) {
        $touristAcommodation = TouristAcommodation::FindOrFail($id);
        return view('tourist_acommodation.edit', compact('touristAcommodation'));
    }

    public function updateForm(Request $request, $id) {
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'image' => 'image',
            'type' => 'required',
            'email' => 'email'
        ];

        $messages = [
            'name.required' => 'tên cơ sở lưu trú không được để trống',
            'code.required' => 'mã cơ sở lưu trú không được để trống',
            'image.image' => 'Ảnh đại diện phải thuộc định dạng ảnh',
            'type.required' => 'Phân loại không được để trống',
            'email.email' => 'Thư điện tử không đúng đính dạng',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $touristAcommodation = TouristAcommodation::FindOrFail($id);
            if ($request->hasFile('image')) {
                //xoa anh cu neu co
                $currentImg = $touristAcommodation->image;
                if ($currentImg) {
                    Storage::delete('public/' . $currentImg);
                }
                //cap nhap anh moi
                $image = $request->file('image');
                $pathImage = $image->store('images', 'public');
            }
            $updateRequest = $request->all();
            unset($updateRequest['_token']);
            unset($updateRequest['image']);
            if (isset($pathImage)) {
                $updateRequest['image'] = $pathImage;
            }
            TouristAcommodation::find($id)->update($updateRequest);
            return redirect()->route('admin.tourist_acommodation.list');
        }
    }

    public function detail($id) {
        $touristAcommodation = TouristAcommodation::FindOrFail($id);
        return view('tourist_acommodation.detail', compact('touristAcommodation'));
    }

    public function exportData() {
//        field => title
        $exportFields = [
            'stt' => 'STT',
            'code' => 'Mã cơ sở lưu trú',
            'name' => 'Tên cơ sở lưu trú',
            'type' => 'Phân loại',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',
            'email' => 'Thư điện tử',
            'fax' => 'Fax',
            'website' => 'Website',
            'room' => 'Số phòng',
            'min_price' => 'Giá phòng rẻ nhất',
            'max_price' => 'Giá phòng đắt nhất',
        ];
        $touristAcommodations = TouristAcommodation::orderBy('created_at', 'desc')->get();
        $category = config('base.tourist_accommodation_type');

        $data = [];
        foreach ($touristAcommodations as $k => $item) {
            $item['stt'] = $k + 1;
            $item['type'] = !empty($item->type) ? $category[$item->type] : '';

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('ThongKeCSLT data'.date('Y-m-d'), $exportFields, $data, 'ThongKeCSLT-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id) {
        TouristAcommodation::FindOrFail($id)->delete();
        return redirect()->back();
    }
}
