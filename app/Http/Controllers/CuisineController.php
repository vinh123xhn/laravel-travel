<?php

namespace App\Http\Controllers;

use App\Models\Cuisine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CuisineController extends Controller
{
    public function index() {
       $cuisines = Cuisine::get();
        return view('cuisine.list')->with(compact('cuisines'));
    }

    public function filter(Request $request) {
        $category = $request->category;
        if ($category) {
            $cuisines = Cuisine::where('category','=', $category)->get();
        } else {
            $cuisines = Cuisine::get();
        }
        return view('cuisine.list')->with(compact('cuisines', 'category'));
    }

    public function getForm() {
        return view('cuisine.form');
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
            Cuisine::create($data);
            return redirect()->route('admin.cuisine.list');
        }
    }

    public function editForm($id) {
        $cuisine = Cuisine::FindOrFail($id);
        return view('cuisine.edit', compact('cuisine'));
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
            $cuisine = Cuisine::FindOrFail($id);
            if ($request->hasFile('image')) {
                //xoa anh cu neu co
                $currentImg = $cuisine->image;
                if ($currentImg) {
                    Storage::delete('public/' . $currentImg);
                }
                //cap nhap anh moi
                $image = $request->file('image');
                $pathImage = $image->store('images', 'public');
            }
            if ($request->hasFile('document')) {
                //xoa anh cu neu co
                $currentDocument = json_decode($cuisine->document);
                if ($currentDocument) {
                    foreach ($currentDocument as $file)
                        Storage::delete('/public/' . $file);
                }
                //cap nhap anh moiestival
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
            Cuisine::find($id)->update($updateRequest);
            return redirect()->route('admin.cuisine.list');
        }
    }

    public function detail($id) {
        $cuisine = Cuisine::FindOrFail($id);
        if (isset($cuisine->document)) {
            $document = json_decode($cuisine->document);
        } else {
            $document = [];
        }
        return view('cuisine.detail', compact('cuisine', 'document'));
    }

    public function exportData() {
//        field => title
        $exportFields = [
            'stt' => 'STT',
            'code' => 'Mã',
            'name' => 'Tên ẩm thực',
            'category' => 'Loại',
            'taste' => 'Vị chính',
            'type' => 'Kiểu',
            'kind_of_dish' => 'Loại món',
            'health' => 'Sức khỏe',
            'season' => 'Mùa',
            'ingredient' => 'Nguồn gốc nguyên liệu',
            'place' => 'Nơi chế biến',
            'use' => 'Hiện trạng sử dụng',
        ];
        $cuisines = Cuisine::orderBy('created_at', 'desc')->get();
        $category = config('base.cuisine_category');
        $taste = config('base.cuisine_taste');
        $type = config('base.cuisine_type');
        $kind_of_dish = config('base.cuisine_kind_of_dish');
        $health = config('base.cuisine_health');
        $season = config('base.cuisine_season');
        $ingredient = config('base.cuisine_ingredient');
        $place = config('base.cuisine_place');
        $use = config('base.cuisine_use');

        $data = [];
        foreach ($cuisines as $k => $item) {
            $item['stt'] = $k + 1;
            $item['category'] = !empty($item->category) ? $category[$item->category] : '';
            $item['taste'] = !empty($item->taste) ? $taste[$item->taste] : '';
            $item['type'] = !empty($item->type) ? $type[$item->type] : '';
            $item['kind_of_dish'] = !empty($item->kind_of_dish) ? $kind_of_dish[$item->kind_of_dish] : '';
            $item['health'] = !empty($item->health) ? $health[$item->health] : '';
            $item['season'] = !empty($item->season) ? $season[$item->season] : '';
            $item['ingredient'] = !empty($item->ingredient) ? $ingredient[$item->ingredient] : '';
            $item['place'] = !empty($item->place) ? $place[$item->place] : '';
            $item['use'] = !empty($item->use) ? $use[$item->use] : '';

            $item = $item->toArray();
            $data[] = $item;
        }
        $this->downloadExcel('ThongKeAmThuc data'.date('Y-m-d'), $exportFields, $data, 'ThongKeAmThuc-'.date('Y-m-d').'.xlsx');
    }

    public function delete($id) {
        Cuisine::FindOrFail($id)->delete();
        return redirect()->back();
    }
}
