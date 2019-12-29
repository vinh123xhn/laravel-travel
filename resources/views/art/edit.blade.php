@extends('layout.master')
@section('where', 'Nghệ thuật')
@section('where_active', 'Nghê thuật')
@section('title', 'Trang phục')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Thêm mới nghệ thuật</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="{{route('admin.art.form.update', $art->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Mã nghệ thuật</label>
                                                <input name="code" type="text" class="form-control" placeholder="Nhập mã nghệ thuật" value="{{old('code') ? old('code') : $art->code}}">
                                                @error('code')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tên nghệ thuật</label>
                                                <input name="name" type="text" class="form-control" placeholder="Nhập tên nghệ thuật" value="{{old('name') ? old('name') : $art->name}}">
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
                                                @if(isset($art->image))
                                                    <img id="avatar" style="width: 400px; height: 300px" src="{{asset('storage/'.$art->image)}}" alt="avatar"/>
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
                                                <label for="cc-payment" class="control-label mb-1">Phân loại nghệ thuật</label>
                                                <select name="category" class="form-control">
                                                    @foreach(config('base.art_category') as $k => $item)
                                                         <option
                                                            @if($art->category == $k)
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
                                                <label for="cc-payment" class="control-label mb-1">Loại hình chi tiết cấp 1</label>
                                                <select name="level_1" class="form-control">
                                                    @foreach(config('base.art_level_1') as $k => $item)
                                                         <option
                                                            @if($art->level_1 == $k)
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
                                                <label for="cc-payment" class="control-label mb-1">Loại hình chi tiết cấp 2</label>
                                                <select name="level_2" class="form-control">
                                                    @foreach(config('base.art_level_2') as $k => $item)
                                                         <option
                                                            @if($art->level_2 == $k)
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
                                                <textarea name="subtitle" id="editor1">{{old('subtitle') ? old('subtitle') : $art->subtitle}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nội dung và các di bản</label>
                                                <input name="content" type="text" class="form-control" placeholder="Nhập nội dung và các di bản" value="{{old('content') ? old('content') : $art->content}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Hiện trạng</label>
                                                <select name="status" class="form-control">
                                                    @foreach(config('base.art_status') as $k => $item)
                                                         <option
                                                            @if($art->status == $k)
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
                                                <label for="cc-payment" class="control-label mb-1">Đơn vị quản lý</label>
                                                <input name="management_unit" type="text" class="form-control" placeholder="Nhập đơn vị quản lý" value="{{old('management_unit') ? old('management_unit') : $art->management_unit}}">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Danh nhân liên quan</label>
                                                <input name="celebrity" type="text" class="form-control" placeholder="Nhập danh nhân liên quan" value="{{old('celebrity') ? old('celebrity') : $art->celebrity}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Địa điểm liên quan</label>
                                                <input name="location" type="text" class="form-control" placeholder="Nhập địa điểm liên quan" value="{{old('location') ? old('location') : $art->location}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Sự kiện liên quan</label>
                                                <input name="event" type="text" class="form-control" placeholder="Nhập sự kiện liên quan" value="{{old('event') ? old('event') : $art->event}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tài liệu liên quan</label>
                                                <input name="document[]" multiple="multiple" type="file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1" style="padding-right:0">
                                            <button id="payment-button" type="submit" class="btn btn-info">
                                                Lưu
                                            </button>
                                        </div>
                                        <div class="col-md-2" style="padding-left:0">
                                            <a href="{{route('admin.art.list')}}" class="btn btn-primary">Quay lại</a>
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
    <script> CKEDITOR.replace('editor1', {
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
