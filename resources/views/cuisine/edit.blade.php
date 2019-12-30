@extends('layout.master')
@section('where', 'Ẩm thực')
@section('where_active', 'Ẩm thực')
@section('title', 'Ẩm thực')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Thêm mới ẩm thực</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="{{route('admin.cuisine.form.update', $cuisine->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Mã</label>
                                                <input name="code" type="text" class="form-control" placeholder="Nhập mã ẩm thực" value="{{old('code') ? old('code') : $cuisine->code}}">
                                                @error('code')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tên</label>
                                                <input name="name" type="text" class="form-control" placeholder="Nhập tên ẩm thực" value="{{old('name') ? old('name') : $cuisine->name}}">
                                                @error('name')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ảnh đại diện</label>
                                                <input name="image" type="file" onchange="readURL(this);" class="form-control"/>
                                                <br>
                                                @if(isset($cuisine->image))
                                                    <img id="avatar" style="width: 400px; height: 300px" src="{{asset('storage/'.$cuisine->image)}}" alt="avatar"/>
                                                @else
                                                    <img id="avatar" src="#" alt="avatar"/>
                                                @endif
                                                @error('image')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Phân loại ẩm thực</label>
                                                <select name="category" class="form-control">
                                                    @foreach(config('base.cuisine_category') as $k => $item)
                                                        <option
                                                            @if($cuisine->category == $k)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$k}}">{{$item}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Vị chính</label>
                                                <select name="taste" class="form-control">
                                                    @foreach(config('base.cuisine_taste') as $k => $item)
                                                        <option
                                                            @if($cuisine->taste == $k)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$k}}">{{$item}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kiểu</label>
                                                <select name="type" class="form-control">
                                                    @foreach(config('base.cuisine_type') as $k => $item)
                                                        <option
                                                            @if($cuisine->type == $k)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$k}}">{{$item}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Loại món</label>
                                                <select name="kind_of_dish" class="form-control">
                                                    @foreach(config('base.cuisine_kind_of_dish') as $k => $item)
                                                        <option
                                                            @if($cuisine->kind_of_dish == $k)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$k}}">{{$item}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Sức khỏe</label>
                                                <select name="health" class="form-control">
                                                    @foreach(config('base.cuisine_health') as $k => $item)
                                                        <option
                                                            @if($cuisine->health == $k)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$k}}">{{$item}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Mùa</label>
                                                <select name="season" class="form-control">
                                                    @foreach(config('base.cuisine_season') as $k => $item)
                                                        <option
                                                            @if($cuisine->season == $k)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$k}}">{{$item}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nguồn gốc nguyên liệu</label>
                                                <select name="ingredient" class="form-control">
                                                    @foreach(config('base.cuisine_ingredient') as $k => $item)
                                                        <option
                                                            @if($cuisine->ingredient == $k)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$k}}">{{$item}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nơi chế biến</label>
                                                <select name="place" class="form-control">
                                                    @foreach(config('base.cuisine_place') as $k => $item)
                                                        <option
                                                            @if($cuisine->place == $k)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$k}}">{{$item}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Hiện trạng sử dụng</label>
                                                <select name="use" class="form-control">
                                                    @foreach(config('base.cuisine_use') as $k => $item)
                                                        <option
                                                            @if($cuisine->use == $k)
                                                            {{"selected"}}
                                                            @endif
                                                            value="{{$k}}">{{$item}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Thuyết minh</label>
                                                <textarea name="subtitle" id="editor1">{{old('subtitle') ? old('subtitle') : $cuisine->subtitle}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Cách chế biến</label>
                                                <textarea name="cook" id="editor2">{{old('cook') ? old('cook') : $cuisine->cook}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nguyên liệu</label>
                                                <textarea name="material" id="editor3">{{old('material') ? old('material') : $cuisine->material}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Không gian</label>
                                                <input name="space" type="text" class="form-control" placeholder="Nhập không gian" value="{{old('space') ? old('space') : $cuisine->space}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ca múa nhạc</label>
                                                <input name="music" type="text" class="form-control" placeholder="Nhập ca múa nhạc" value="{{old('music') ? old('music') : $cuisine->music}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Trang phục</label>
                                                <input name="costume" type="text" class="form-control" placeholder="Nhập trang phục" value="{{old('costume') ? old('costume') : $cuisine->costume}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nghi lễ</label>
                                                <input name="ceremony" type="text" class="form-control" placeholder="Nhập nghi lễ" value="{{old('ceremony') ? old('ceremony') : $cuisine->ceremony}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Đơn vị quản lý</label>
                                                <input name="management_unit" type="text" class="form-control" placeholder="Nhập đơn vị quản lý" value="{{old('management_unit') ? old('management_unit') : $cuisine->management_unit}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Danh nhân liên quan</label>
                                                <input name="celebrity" type="text" class="form-control" placeholder="Nhập danh nhân liên quan" value="{{old('celebrity') ? old('celebrity') : $cuisine->celebrity}}">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Địa điểm liên quan</label>
                                                <input name="location" type="text" class="form-control" placeholder="Nhập địa điểm liên quan" value="{{old('location') ? old('location') : $cuisine->location}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Sự kiện liên quan</label>
                                                <input name="event" type="text" class="form-control" placeholder="Nhập sự kiện liên quan" value="{{old('event') ? old('event') : $cuisine->event}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tài liệu liên quan</label>
                                                <input name="document[]" multiple="multiple" type="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1" style="padding-right:0">
                                            <button id="payment-button" type="submit" class="btn btn-info  border-radius-5">
                                                Lưu
                                            </button>
                                        </div>
                                        <div class="col-md-2" style="padding-left:0">
                                            <a href="{{route('admin.cuisine.list')}}" class="btn btn-primary  border-radius-5">Quay lại</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->


            </div>
        </div><!-- .animated -->
    </div>
@endsection
@section('js')
    <script>
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
        CKEDITOR.replace('editor2', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
        CKEDITOR.replace('editor3', {
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        } );
    </script>
    <script src={{asset("vendors/datatables.net/js/jquery.dataTables.min.js")}}></script>
    <script src={{asset("vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}></script>
    <script src={{asset("vendors/datatables.net-buttons/js/dataTables.buttons.min.js")}}></script>
    <script src={{asset("vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js")}}></script>
    <script src={{asset("vendors/jszip/dist/jszip.min.js")}}></script>
    <script src={{asset("vendors/pdfmake/build/pdfmake.min.js")}}></script>
    <script src={{asset("vendors/pdfmake/build/vfs_fonts.js")}}></script>
    <script src={{asset("vendors/datatables.net-buttons/js/buttons.html5.min.js")}}></script>
    <script src={{asset("vendors/datatables.net-buttons/js/buttons.print.min.js")}}></script>
    <script src={{asset("vendors/datatables.net-buttons/js/buttons.colVis.min.js")}}></script>
    <script src={{asset("assets/js/init-scripts/data-table/datatables-init.js")}}></script>
@endsection
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar')
                    .attr('src', e.target.result)
                    .width(400)
                    .height(300);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
