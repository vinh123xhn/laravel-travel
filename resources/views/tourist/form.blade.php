@extends('layout.master')
@section('where', 'Khách du lịch')
@section('title', 'Khách du lịch')
@section('where_active', 'Khách du lịch')
@section('head')

@endsection
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Thêm mới khách du lịch</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="{{route('admin.tourist.form.post', $touristAcommodation)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Mã khách du lịch</label>
                                                <input name="code" type="text" class="form-control" placeholder="Nhập mã khách du lịch" value="{{old('code')}}">
                                                @error('code')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Tên khách du lịch</label>
                                                <input name="name" type="text" class="form-control" placeholder="Nhập tên khách du lịch" value="{{old('name')}}">
                                                @error('name')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Loại khách du lịch</label>
                                                <select name="type" class="form-control">
                                                    <option value="">Lựa chọn</option>
                                                    @foreach(config('base.tourist_type') as $k => $item)
                                                    <option value="{{$k}}">{{$item}}</option>
                                                    @endforeach
                                                </select>
                                                @error('type')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Giới tính</label>
                                                <select name="gender" class="form-control">
                                                    <option value="">Lựa chọn</option>
                                                    @foreach(config('base.gender') as $k => $item)
                                                    <option value="{{$k}}">{{$item}}</option>
                                                    @endforeach
                                                </select>
                                                @error('gender')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ngày sinh</label>
                                                <input name="birthday" type="text" class="form-control" placeholder="Nhập ngày sinh" value="{{old('birthday')}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Địa chỉ</label>
                                                <input name="address" type="text" class="form-control" placeholder="Nhập địa chỉ" value="{{old('address')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Số điện thoại</label>
                                                <input name="phone" type="text" class="form-control" placeholder="Nhập số điện thoại" value="{{old('phone')}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Thư điện tử</label>
                                                <input name="email" type="text" class="form-control" placeholder="Nhập thư điện tử" value="{{old('email')}}">
                                                @error('email')
                                                <p class="danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Chứng minh thư/ CCCD</label>
                                                <input name="cmt" type="text" class="form-control" placeholder="Nhập chứng minh thư/ CCCD" value="{{old('cmt')}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Phòng</label>
                                                <input name="room" type="text" class="form-control" placeholder="Nhập phòng" value="{{old('room')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ngày nhận phòng</label>
                                                <input name="start_date" type="text" class="form-control" placeholder="Nhập nhận phòng" value="{{old('start_date')}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Ngày trả phòng</label>
                                                <input name="end_date" type="text" class="form-control" placeholder="Nhập ngày trả phòng" value="{{old('end_date')}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10">
                                            <button id="payment-button" type="submit" class="btn btn-info  border-radius-5" style="width: 100px; margin-right: 10px">
                                                Lưu
                                            </button>
                                            <a href="{{route('admin.tourist_acommodation.list')}}" class="btn btn-primary  border-radius-5">Quay lại</a>
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
