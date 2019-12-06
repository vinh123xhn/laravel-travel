@extends('layout.master')
@section('where', 'Trang phục')
@section('where_active', 'Trang phục')
@section('title', 'Trang phục')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Chi tiết trang phục</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-th">
                            <tr>
                                <th>Tên trang phục</th>
                                <td>{{$costume->name}}</td>
                            </tr><tr>
                                <th>Chất liệu</th>
                                <td>{{$costume->material ? config('base.costume_material')[$costume->material] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Loại hình</th>
                                <td>{{config('base.costume_category')[$costume->category]}}</td>
                            </tr>
                            <tr>
                                <th>Dân tộc</th>
                                <td>{{$costume->nation ? config('base.ethnic_groups')[$costume->nation] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Tôn giáo</th>
                                <td>{{$costume->religion ? config('base.religion')[$costume->religion] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Thuyết minh</th>
                                <td>
                                    <?php
                                    $str = $costume->subtitle;
                                    echo html_entity_decode($str);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Ảnh đại diện</th>
                                <td>
                                    <img src="{{asset('storage/'.$costume->image)}}" style="width: 400px; height: 300px">
                                </td>
                            </tr>
                            <tr>
                                <th>Thời kỳ, triều đại</th>
                                <td>{{$costume->age}}</td>
                            </tr>
                            <tr>
                                <th>Mục đích sử dụng</th>
                                <td>{{$costume->purpose	? config('base.costume_purpose')[$costume->purpose] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Tình trạng hiện nay</th>
                                <td>{{$costume->status ? config('base.costume_status')[$costume->status] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Đơn vị quản lý</th>
                                <td>{{$costume->management_unit}}</td>
                            </tr>
                            <tr>
                                <th>Danh nhân liên quan</th>
                                <td>{{$costume->celebrity}}</td>
                            </tr>
                            <tr>
                                <th>Địa điểm liên quan</th>
                                <td>{{$costume->location}}</td>
                            </tr>
                            <tr>
                                <th>Sự kiện liên quan</th>
                                <td>{{$costume->event}}</td>
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
                        <div class="col-md-2">
                            <a href="{{route('admin.costume.list')}}" class="btn btn-primary">Quay lại</a>
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
