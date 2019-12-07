@extends('layout.master')
@section('where', 'Di tích')
@section('title', 'Di tích')
@section('where_active', 'Di tích')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Thêm mới di tích</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="{{route('admin.relics.form.update', $relic->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Mã di tích</label>
                                                <input name="code" type="text" class="form-control" placeholder="Nhập mã di tích" value="{{old('code') ? old('code') : $relic->code}}">
                                                @error('code')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tên di tích</label>
                                                <input name="name" type="text" class="form-control" placeholder="Nhập tên di tích" value="{{old('name') ? old('name') : $relic->name}}">
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
                                                @if(isset($relic->image))
                                                    <img id="avatar" style="width: 400px; height: 300px" src="{{asset('storage/'.$relic->image)}}" alt="avatar"/>
                                                @else
                                                    <img id="avatar" src="#" alt="avatar"/>
                                                @endif
                                                @error('image')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                                @error('image')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Cấp di tích</label>
                                                <select name="relics_level" class="form-control">
                                                    @foreach(config('base.relics_level') as $k => $item)
                                                        <option
                                                            @if($relic->relics_level == $k)
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
                                                <label for="cc-payment" class="control-label mb-1">Phân loại di tích</label>
                                                <select name="category" class="form-control">
                                                    <option value="">Lựa chọn</option>
                                                    @foreach(config('base.relics_category') as $k => $item)
                                                        <option
                                                            @if($relic->relics_level == $k)
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
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Số quyết định công nhận</label>
                                                <input name="num_of_recognition_decisions" type="text" class="form-control" placeholder="Nhập số quyết định" value="{{old('num_of_recognition_decisions') ? old('num_of_recognition_decisions') : $relic->num_of_recognition_decisions}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Năm công nhận</label>
                                                <input name="year_of_recognition" type="text" class="form-control" placeholder="Nhập năm công nhận" value="{{old('year_of_recognition') ? old('year_of_recognition') : $relic->year_of_recognition}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Niên đại</label>
                                                <input name="age" type="text" class="form-control" placeholder="Nhập niên đại" value="{{old('age') ? old('age') : $relic->age}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Thuyết minh</label>
                                                <textarea name="subtitle" id="editor1">{{old('subtitle') ? old('subtitle') : $relic->subtitle}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Quá trình phát triển</label>
                                                <textarea name="detection_process" class="form-control" style="width: 100%">{{old('detection_process') ? old('detection_process') : $relic->detection_process}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tình trạng hiện nay</label>
                                                <select name="status" class="form-control">
                                                    @foreach(config('base.relics_status') as $k => $item)
                                                        <option
                                                            @if($relic->status == $k)
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
                                                <input name="management_unit" type="text" class="form-control" placeholder="Nhập đơn vị quản lý" value="{{old('management_unit') ? old('management_unit') : $relic->management_unit}}">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Danh nhân liên quan</label>
                                                <input name="celebrity" type="text" class="form-control" placeholder="Nhập danh nhân liên quan" value="{{old('celebrity') ? old('celebrity') : $relic->celebrity}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Địa điểm liên quan</label>
                                                <input name="location" type="text" class="form-control" placeholder="Nhập địa điểm liên quan" value="{{old('location') ? old('location') : $relic->location}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Sự kiện liên quan</label>
                                                <input name="event" type="text" class="form-control" placeholder="Nhập sự kiện liên quan" value="{{old('event') ? old('event') : $relic->event}}">
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
                                            <a href="{{route('admin.relics.list')}}" class="btn btn-primary">Quay lại</a>
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

