@extends('layout.master')
@section('where', 'Lễ hội')
@section('where_active', 'Lễ hội')
@section('title', 'Lễ hội')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Chi tiết lễ hội</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-th">
                            <tr>
                                <th>Loại hình</th>
                                <td>{{config('base.art_category')[$festival->category]}}</td>
                            </tr>
                            <tr>
                                <th>Tên nghệ thuật</th>
                                <td>{{$festival->name}}</td>
                            </tr>
                            <tr>
                                <th>Ảnh đại diện</th>
                                <td>
                                    <a href="{{asset('storage/'.$festival->image)}}" class="fancy">
                                        <img src="{{asset('storage/'.$festival->image)}}" style="width: 400px; height: 300px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Thuyết minh</th>
                                <td>
                                    <?php
                                    $str = $festival->subtitle;
                                    echo html_entity_decode($str);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tình trạng</th>
                                <td>{{$festival->status ? config('base.festival_status')[$festival->status] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Phân loại</th>
                                <td>{{$festival->category ? config('base.festival_category')[$festival->category] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Kiểu lịch</th>
                                <td>{{$festival->calendar_type ? config('base.calendar_type')[$festival->calendar_type] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Đơn vị quản lý</th>
                                <td>{{$festival->management_unit}}</td>
                            </tr>
                            <tr>
                                <th>Danh nhân liên quan</th>
                                <td>{{$festival->celebrity}}</td>
                            </tr>
                            <tr>
                                <th>Địa điểm liên quan</th>
                                <td>{{$festival->location}}</td>
                            </tr>
                            <tr>
                                <th>Sự kiện liên quan</th>
                                <td>{{$festival->event}}</td>
                            </tr>
                            <tr>
                                <th>Tài liệu liên quan</th>
                                <td>
                                    @if(isset($document))
                                        @foreach($document as $item)
                                            <a href="{{asset('storage/'.$item)}}"><i class="fa fa-download"></i> Tải xuống</a>
                                            <br>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <div class="col-md-5">
                            <a href="{{redirect()->getUrlGenerator()->previous()}}" class="btn btn-primary">Quay lại</a>
                            <a href="{{route('admin.festival.form.edit', $festival->id)}}" class="btn btn-primary">Sửa</a>
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
