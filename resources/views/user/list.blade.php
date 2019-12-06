@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('user', 'active')
@section('title')
    user
@endsection
@section('content_header_name')
    Danh sách người dùng
@endsection
@section('redirect_to_list')
    <a href="{{route('admin.user.list')}}">
        Danh sách người dùng
    </a>
@endsection
@section('content_header_active')
    Danh sách người dùng
@endsection
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12 col-md-6 float-right">
                            <div id="bootstrap-data-table-export_filter" class="dataTables_filter">
                                <label>Loại hình:
                                    <select class="form-control form-control-sm" aria-controls="bootstrap-data-table-export" style="min-width: 140px">
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                </label>
                                <label>Phân loại:
                                    <select class="form-control form-control-sm" aria-controls="bootstrap-data-table-export" style="min-width: 140px">
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                </label>
                                <label>
                                    <a class="btn btn-primary" style="border-radius: 0.2rem; height: 31px; line-height: 20px; margin-bottom:1px; margin-left: 10px; font-size: 14px; width: 170px" href="{{route('admin.user.form.get')}}"> Thêm mới người dùng</a>
                                </label>
                            </div>
                        </div>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tài khoản</th>
                                <th>Họ và tên</th>
                                <th>Thư điện tử</th>
                                <th>Nhóm</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $k => $item)
                                <tr>
                                    <td>{{$k + 1}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->group ? config('base.group_user')[$item->group] : ''}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.user.form.get')}}"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin.user.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.user.delete', $item->id)}}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
