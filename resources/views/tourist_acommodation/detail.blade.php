@extends('layout.master')
@section('where', 'Cơ sở lưu trú')
@section('title', 'Cơ sở lưu trú')
@section('where_active', 'Cơ sở lưu trú')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Chi tiết Cơ sở lưu trú</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-th">
                            <tr>
                                <th>Mã Cơ sở lưu trú</th>
                                <td>{{$touristAcommodation->code}}</td>
                            </tr>
                            <tr>
                                <th>Tên Cơ sở lưu trú</th>
                                <td>{{$touristAcommodation->name}}</td>
                            </tr>
                            <tr>
                                <th>Ảnh đại diện</th>
                                <td>
                                    <a href="{{asset('storage/'.$touristAcommodation->image)}}" class="fancy">
                                        <img src="{{asset('storage/'.$touristAcommodation->image)}}" style="width: 400px; height: 300px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Loại cơ sở lưu trú</th>
                                <td>{{config('base.tourist_accommodation_type')[$touristAcommodation->type]}}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td>{{$touristAcommodation->address}}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{$touristAcommodation->phone}}</td>
                            </tr>
                            <tr>
                                <th>Thư điện tử</th>
                                <td>{{$touristAcommodation->email}}</td>
                            </tr>
                            <tr>
                                <th>Fax</th>
                                <td>{{$touristAcommodation->fax}}</td>
                            </tr>
                            <tr>
                                <th>Website</th>
                                <td>{{$touristAcommodation->website}}</td>
                            </tr>
                            <tr>
                                <th>Số phòng</th>
                                <td>{{$touristAcommodation->room}}</td>
                            </tr>
                            <tr>
                                <th>Giá thấp nhất</th>
                                <td>{{$touristAcommodation->min_price}}</td>
                            </tr>
                            <tr>
                                <th>Giá cao nhất</th>
                                <td>{{$touristAcommodation->max_price}}</td>
                            </tr>
                        </table>
                        <div class="col-md-5">
                            <a href="{{redirect()->getUrlGenerator()->previous()}}" class="btn btn-primary  border-radius-5">Quay lại</a>
                            <a href="{{route('admin.tourist_acommodation.form.edit', $touristAcommodation->id)}}" class="btn btn-info  border-radius-5">Sửa</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
@endsection
@section('js')
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
