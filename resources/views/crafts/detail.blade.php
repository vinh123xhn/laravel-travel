@extends('layout.master')
@section('where', 'Nghề thủ công')
@section('where_active', 'Nghề thủ công')
@section('title', 'Nghề thủ công')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Chi tiết nghề thủ công</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-th">
                            <tr>
                                <th>Tên nghề thủ công</th>
                                <td>{{$crafts->name}}</td>
                            </tr>
                            <tr>
                                <th>Loại nghề hay làng nghề</th>
                                <td>{{$crafts->type ? config('base.crafts_village_or_work')[$crafts->type] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Loại làng nghề</th>
                                <td>{{$crafts->type_of_crafts_village	? config('base.crafts_village_type')[$crafts->type_of_crafts_village] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Loại hình</th>
                                <td>{{config('base.crafts_category')[$crafts->category]}}</td>
                            </tr>
                            <tr>
                                <th>Thuyết minh</th>
                                <td>
                                    <?php
                                    $str = $crafts->subtitle;
                                    echo html_entity_decode($str);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Ảnh đại diện</th>
                                <td>
                                    <a href="{{asset('storage/'.$crafts->image)}}" class="fancy">
                                        <img src="{{asset('storage/'.$crafts->image)}}" style="width: 400px; height: 300px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Tình trạng</th>
                                <td>{{$crafts->status ? config('base.crafts_status')[$crafts->status] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Đơn vị quản lý</th>
                                <td>{{$crafts->management_unit}}</td>
                            </tr>
                            <tr>
                                <th>Danh nhân liên quan</th>
                                <td>{{$crafts->celebrity}}</td>
                            </tr>
                            <tr>
                                <th>Địa điểm liên quan</th>
                                <td>{{$crafts->location}}</td>
                            </tr>
                            <tr>
                                <th>Sự kiện liên quan</th>
                                <td>{{$crafts->event}}</td>
                            </tr>
                            <tr>
                                <th>Tài liệu liên quan</th>
                                <td>
                                    @if(isset($document))
                                        @foreach($document as $item)
                                            <a href="{{asset('storage/'.$item)}}" download><i class="fa fa-download"></i> Tải xuống</a>
                                            <br>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <div class="col-md-5">
                            <a href="{{redirect()->getUrlGenerator()->previous()}}" class="btn btn-primary">Quay lại</a>
                            <a href="{{route('admin.crafts.form.edit', $crafts->id)}}" class="btn btn-primary">Sửa</a>
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
