<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FestivalController extends Controller
{
    public function index() {
        $festivals = Festival::get();
        return view('festival.list')->with(compact('festivals'));
    }

    public function filter(Request $request) {
        $category = $request->category;
        if ($category) {
            $festivals = Festival::where('category','=', $category)->get();
        } else {
            $festivals = Festival::get();
        }
        return view('festival.list')->with(compact('festivals', 'category'));
    }

    public function getForm() {
        return view('festival.form');
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
            Festival::create($data);
            return redirect()->route('admin.festival.list');
        }
    }

    public function editForm($id) {
        $festival = Festival::FindOrFail($id);
        return view('festival.edit', compact('festival'));
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
            $festival = Festival::FindOrFail($id);
            if ($request->hasFile('image')) {
                //xoa anh cu neu co
                $currentImg = $festival->image;
                if ($currentImg) {
                    Storage::delete('public/' . $currentImg);
                }
                //cap nhap anh moi
                $image = $request->file('image');
                $pathImage = $image->store('images', 'public');
            }
            if ($request->hasFile('document')) {
                //xoa anh cu neu co
                $currentDocument = json_decode($festival->document);
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
            Festival::find($id)->update($updateRequest);
            return redirect()->route('admin.festival.list');
        }
    }

    public function detail($id) {
        $festival = Festival::FindOrFail($id);
        if (!empty($festival->document)) {
            $document = json_decode($festival->document);
            return view('festival.detail', compact('festival', 'document'));
        }
        return view('festival.detail', compact('festival'));
    }

    public function exportData() {
//        field => title
        $exportFields = [
            'stt' => 'STT',
            'code' => 'Mã lễ hội',
            'name' => 'Tên lễ hội',
            'festival_level' => 'Cấp lễ hội',
            'organizational_level' => 'Cấp tổ chức',
            'calendar_type' => 'Kiểu lịch',
            'frequency' => 'Tần suất',
            'day' => 'Cố định ngày',
            'start_date' => 'Ngày bắt đầu',
            'end_date' => 'Ngày kết thúc',
            'category' => 'Phân loại',
            'characteristics' => 'Đặc điểm',
            'status' => 'Tình trạng hiện nay',
            'nation' => 'Dân tộc',
            'religion' => 'Tôn giáo',
            'management_unit' => 'Đơn vị quản lý',
            'celebrity' => 'Danh nhân liên quan',
            'location' => 'Địa điểm liên quan',
            'event' => 'Sự kiên liên quan',
        ];
        $festivals = Festival::orderBy('created_at', 'desc')->get();
        $category = config('base.cuisine_category');
        $festival_level = config('base.festival_level');
        $organizational_level = config('base.festival_level');
        $calendar_type = config('base.calendar_type');
        $day = config('base.day');
        $status = config('base.festival_status');
        $characteristics = config('base.festival_characteristics');
        $nation = config('base.ethnic_groups');
        $religion = config('base.religion');

        $data = [];
        foreach ($festivals as $k => $item) {
            $item['stt'] = $k + 1;
            $item['category'] = !empty($item->category) ? $category[$item->category] : '';
            $item['festival_level'] = !empty($item->festival_level) ? $festival_level[$item->festival_level] : '';
            $item['organizational_level'] = !empty($item->organizational_level) ? $organizational_level[$item->organizational_level] : '';
            $item['calendar_type'] = !empty($item->calendar_type) ? $calendar_type[$item->calendar_type] : '';
            $item['day'] = !empty($item->day) ? $day[$item->day] : '';
            $item['status'] = !empty($item->status) ? $status[$item->status] : '';
            $item['characteristics'] = !empty($item->characteristics) ? $characteristics[$item->characteristics] : '';
            $item['nation'] = !empty($item->nation) ? $nation[$item->nation] : '';
            $item['religion'] = !empty($item->religion) ? $religion[$item->religion] : '';

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('ThongKeLeHoi data'.date('Y-m-d'), $exportFields, $data, 'ThongKeLeHoi-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id) {
        Festival::FindOrFail($id)->delete();
        return redirect()->back();
    }
}
