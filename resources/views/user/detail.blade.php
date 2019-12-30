@extends('layout.master')
@section('where', 'Người dùng')
@section('title', 'Người dùng')
@section('where_active', 'Người dùng')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Chi tiết Người dùng</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-th">
                            <tr>
                                <th>Họ và tên</th>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <th>Giới tính</th>
                                <td>{{$user->gender ? config('base.gender')[$user->gender] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Thư điện tử</th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{$user->phone}}</td>
                            </tr>
                            <tr>
                                <th>Ảnh đại diện</th>
                                <td>
                                    <a href="{{asset('storage/'.$user->image)}}" class="fancy">
                                        <img src="{{asset('storage/'.$user->image)}}" style="width: 200px; height: 100px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Nhóm</th>
                                <td>{{config('base.group_user')[$user->group]}}</td>
                            </tr>
                            <tr>
                                <th>Trạng thái hoạt động</th>
                                <td>{{config('base.active')[$user->active]}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <a href="{{redirect()->getUrlGenerator()->previous()}}" class="btn btn-primary border-radius-5">Quay lại</a>
                        <a href="{{route('admin.user.form.edit', $user->id)}}" class="btn btn-primary border-radius-5">Sửa</a>
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
