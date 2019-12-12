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
                                <th>Tên di tích</th>
                                <td>{{$relics->name}}</td>
                            </tr>
                            <tr>
                                <th>Cấp di tích</th>
                                <td>{{$relics->relics_level ? config('base.relics_level')[$relics->relics_level] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Ảnh đại diện</th>
                                <td>
                                    <a href="{{asset('storage/'.$relics->image)}}" class="fancy">
                                        <img src="{{asset('storage/'.$relics->image)}}" style="width: 400px; height: 300px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Tình trạng</th>
                                <td>{{config('base.relics_status')[$relics->status]}}</td>
                            </tr>
                            <tr>
                                <th>Phân loại</th>
                                <td>{{config('base.relics_category')[$relics->category]}}</td>
                            </tr>
                            <tr>
                                <th>Thuyết minh</th>
                                <td>
                                    <?php
                                    $str = $relics->subtitle;
                                    echo html_entity_decode($str);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Số quyết định công nhận</th>
                                <td>{{$relics->num_of_recognition_decisions}}</td>
                            </tr>
                            <tr>
                                <th>Năm công nhận</th>
                                <td>{{$relics->year_of_recognition}}</td>
                            </tr>
                            <tr>
                                <th>Quá trình phát hiện</th>
                                <td>
                                    <?php
                                    $str = $relics->detection_process;
                                    echo html_entity_decode($str);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tình trạng hiện nay</th>
                                <td>{{$relics->status ? config('base.relics_status')[$relics->status] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Đơn vị quản lý</th>
                                <td>{{$relics->management_unit}}</td>
                            </tr>
                            <tr>
                                <th>Danh nhân liên quan</th>
                                <td>{{$relics->celebrity}}</td>
                            </tr>
                            <tr>
                                <th>Địa điểm liên quan</th>
                                <td>{{$relics->location}}</td>
                            </tr>
                            <tr>
                                <th>Sự kiện liên quan</th>
                                <td>{{$relics->event}}</td>
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
                            <a href="{{redirect()->getUrlGenerator()->previous()}}" class="btn btn-primary">Quay lại</a>
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
