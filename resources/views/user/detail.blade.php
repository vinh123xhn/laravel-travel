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
                        <strong class="card-title">Chi tiết di tích</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-th">
                            <tr>
                                <th>Loại hình</th>
                                <td>{{config('base.art_category')[$user->category]}}</td>
                            </tr>
                            <tr>
                                <th>Tên nghệ thuật</th>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <th>Thuyết minh</th>
                                <td>
                                    <?php
                                    $str = $user->subtitle;
                                    echo html_entity_decode($str);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Loại hình chi tiết cấp 1</th>
                                <td>{{$user->level_1 ? config('base.art_level_1')[$user->level_1] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Loại hình chi tiết cấp 2</th>
                                <td>{{$user->level_2	? config('base.art_level_2')[$user->level_2] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Ảnh đại diện</th>
                                <td>
                                    <img src="{{asset('storage/'.$user->image)}}" style="width: 400px; height: 300px">
                                </td>
                            </tr>
                            <tr>
                                <th>Tình trạng hiện nay</th>
                                <td>{{$user->status ? config('base.art_status')[$user->status] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Nội dung và các di bản</th>
                                <td>{{$user->content}}</td>
                            </tr>
                            <tr>
                                <th>Đơn vị quản lý</th>
                                <td>{{$user->management_unit}}</td>
                            </tr>
                            <tr>
                                <th>Danh nhân liên quan</th>
                                <td>{{$user->celebrity}}</td>
                            </tr>
                            <tr>
                                <th>Địa điểm liên quan</th>
                                <td>{{$user->location}}</td>
                            </tr>
                            <tr>
                                <th>Sự kiện liên quan</th>
                                <td>{{$user->event}}</td>
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
