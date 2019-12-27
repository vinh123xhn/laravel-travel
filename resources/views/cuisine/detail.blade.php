@extends('layout.master')
@section('where', 'Ẩm thực')
@section('where_active', 'Ẩm thực')
@section('where_active', 'Ẩm thực')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Chi tiết ẩm thực</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-th">
                            <tr>
                                <th>Tên</th>
                                <td>{{$cuisine->name}}</td>
                            </tr>
                            <tr>
                                <th>Phân loại</th>
                                <td>{{config('base.cuisine_category')[$cuisine->category]}}</td>
                            </tr>
                            <tr>
                                <th>Thuyết minh</th>
                                <td>
                                    <?php
                                    $str = $cuisine->subtitle;
                                    echo html_entity_decode($str);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Ảnh đại diện</th>
                                <td>
                                    <a href="{{asset('storage/'.$cuisine->image)}}" class="fancy">
                                        <img src="{{asset('storage/'.$cuisine->image)}}" style="width: 400px; height: 300px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th>Nguyên liệu</th>
                                <td>
                                    <?php
                                    $str = $cuisine->material;
                                    echo html_entity_decode($str);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Cách chế biến</th>
                                <td>
                                    <?php
                                    $str = $cuisine->cook;
                                    echo html_entity_decode($str);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Hiện trạng sử dụng</th>
                                <td>{{$cuisine->use ? config('base.cuisine_use')[$cuisine->use] : ''}}</td>
                            </tr>
                            <tr>
                                <th>Không gian</th>
                                <td>{{$cuisine->space}}</td>
                            </tr>
                            <tr>
                                <th>Ca múa nhạc</th>
                                <td>{{$cuisine->music}}</td>
                            </tr>
                            <tr>
                                <th>Trang phục</th>
                                <td>{{$cuisine->costume}}</td>
                            </tr>
                            <tr>
                                <th>Nghi lễ</th>
                                <td>{{$cuisine->ceremony}}</td>
                            </tr>
                            <tr>
                                <th>Đơn vị quản lý</th>
                                <td>{{$cuisine->management_unit}}</td>
                            </tr>
                            <tr>
                                <th>Danh nhân liên quan</th>
                                <td>{{$cuisine->celebrity}}</td>
                            </tr>
                            <tr>
                                <th>Địa điểm liên quan</th>
                                <td>{{$cuisine->location}}</td>
                            </tr>
                            <tr>
                                <th>Sự kiện liên quan</th>
                                <td>{{$cuisine->event}}</td>
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
                            <a href="{{route('admin.cuisine.form.edit', $cuisine->id)}}" class="btn btn-primary">Sửa</a>
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
