<?php

namespace App\Http\Controllers;

use App\Models\Tourist;
use App\Models\TouristAndTouristAcommodation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TouristController extends Controller
{
    public function index($touristAcommodation) {
        $tourists = TouristAndTouristAcommodation::with('tourists')->get();
        return view('tourist.list')->with(compact('tourists', 'touristAcommodation'));
    }

    public function getForm($touristAcommodation) {
        return view('tourist.form', compact('touristAcommodation'));
    }

    public function saveForm(Request $request, $touristAcommodation) {
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'type' => 'required',
            'cmt' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'email' => 'email'
        ];

        $messages = [
            'name.required' => 'tên khách du lịch không được để trống',
            'code.required' => 'mã khách du lịch không được để trống',
            'type.required' => 'Phân loại không được để trống',
            'cmt.required' => 'CMT/CCCD không được để trống',
            'start_date.required' => 'Ngày nhận phòng không được để trống',
            'end_date.required' => 'Ngày trả phòng không được để trống',
            'email.email' => 'Thư điện tử không đúng đính dạng',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $data = $request->all();
            $now = new Carbon($request->start_date);
            $data['year'] = $now->year;
            $data['tourist_acommodation'] = $touristAcommodation;
            $tourist = Tourist::create($data);
            $data['tourist'] = $tourist->id;
            TouristAndTouristAcommodation::create($data);
            return redirect()->route('admin.tourist.list', compact('touristAcommodation'));
        }
    }

    public function editForm($touristAcommodation, $id) {
        $tourist = TouristAndTouristAcommodation::FindOrFail($id);
        $touristDetail = Tourist::FindOrFail($tourist->tourist);
        return view('tourist.edit', compact('touristAcommodation', 'tourist', 'touristDetail'));
    }

    public function updateForm(Request $request, $touristAcommodation, $id) {
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'image' => 'image',
            'type' => 'required',
            'email' => 'email'
        ];

        $messages = [
            'name.required' => 'tên khách du lịch không được để trống',
            'code.required' => 'mã khách du lịch không được để trống',
            'image.image' => 'Ảnh đại diện phải thuộc định dạng ảnh',
            'type.required' => 'Phân loại không được để trống',
            'email.email' => 'Thư điện tử không đúng đính dạng',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // tra ve true neu validate bi loi
            return redirect()->back()->withErrors($validator)->withInput($request->input());
        } else {
            $touristData = [];
            $touristRelation = [];
            $touristData['code'] = $request->code;
            $touristData['name'] = $request->name;
            $touristData['type'] = $request->type;
            $touristData['gender'] = $request->gender;
            $touristData['birthday'] = $request->birthday;
            $touristData['address'] = $request->address;
            $touristData['phone'] = $request->phone;
            $touristData['email'] = $request->email;
            $touristData['cmt'] = $request->cmt;

            $touristRelation['room'] = $request->room;
            $touristRelation['start_date'] = $request->start_date;
            $touristRelation['end_date'] = $request->end_date;
            $now = new Carbon($request->start_date);
            $touristRelation['year'] = $now->year;
            $tourist = TouristAndTouristAcommodation::FindOrFail($id);
            Tourist::FindOrFail($tourist->tourist)->update($touristData);
            $tourist->update($touristRelation);

            return redirect()->route('admin.tourist.list', compact('touristAcommodation'));
        }
    }

    public function detail($touristAcommodation, $id) {
        $tourist = TouristAndTouristAcommodation::FindOrFail($id);
        $touristDetail = Tourist::FindOrFail($tourist->tourist);
        return view('tourist.edit', compact('touristAcommodation', 'tourist', 'touristDetail'));
    }

    public function exportData($touristAcommodation) {
//        field => title
        $exportFields = [
            'stt' => 'STT',
            'code' => 'Mã khách du lịch',
            'name' => 'Tên khách du lịch',
            'gender' => 'Giới tính',
            'birthday' => 'Ngày sinh',
            'address' => 'Địa chỉ',
            'phone' => 'Số điện thoại',
            'email' => 'Thư điện tử',
            'cmt' => 'CMT/CCCD',
            'type' => 'Loại du khách',
            'room' => 'Ở phòng',
            'start_date' => 'Ngày nhận phòng',
            'end_date' => 'Ngày trả phòng',
        ];
        $tourists = TouristAndTouristAcommodation::where('tourist_acommodation', '=', $touristAcommodation)->orderBy('created_at', 'desc')->get();
        $gender = config('base.gender');
        $type = config('base.tourist_type');

        $data = [];
        foreach ($tourists as $k => $item) {
            $item['stt'] = $k + 1;
            $item['code'] = !empty($item->tourists->code) ? $item->tourists->code : '';
            $item['name'] = !empty($item->tourists->name) ? $item->tourists->name : '';
            $item['gender'] = !empty($item->tourists->gender) ? $gender[$item->tourists->gender] : '';
            $item['birthday'] = !empty($item->tourists->birthday) ? $item->tourists->birthday : '';
            $item['address'] = !empty($item->tourists->address) ? $item->tourists->address : '';
            $item['phone'] = !empty($item->tourists->phone) ? $item->tourists->phone : '';
            $item['email'] = !empty($item->tourists->email) ? $item->tourists->email : '';
            $item['cmt'] = !empty($item->tourists->cmt) ? $item->tourists->cmt : '';
            $item['type'] = !empty($item->tourists->type) ? $type[$item->tourists->type] : '';

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('ThongKeDuKhach data'.date('Y-m-d'), $exportFields, $data, 'ThongKeDuKhach-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id) {
        $tourist = TouristAndTouristAcommodation::FindOrFail($id);
        Tourist::FindOrFail($tourist->tourist)->delete();
        $tourist->delete();
        return redirect()->back();
    }
}
