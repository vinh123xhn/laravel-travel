@extends('layout.master')
@section('where', 'Nghệ thuật')
@section('where_active', 'Nghê thuật')
@section('title', 'Nghê thuật')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12" style="padding-left: 0">
                            <div class="col-md-4" style="padding-left: 0">
                                <form action="{{route('admin.art.filter')}}" method="get">
                                    <label>
                                        <select class="form-control form-control-sm" name="category" aria-controls="bootstrap-data-table-export">
                                            @if(isset($category))
                                                @foreach(config('base.art_category') as $k => $item)
                                                    <option
                                                        @if($category == $k)
                                                        {{"selected"}}
                                                        @endif
                                                        value="{{$k}}">{{$item}}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="">Lựa chọn</option>
                                                @foreach(config('base.art_category') as $k => $item)
                                                    <option value="{{$k}}">{{$item}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </label>
                                    <label>
                                        <button class="btn btn-primary for-list" type="submit">Lọc</button>
                                    </label>
                                </form>
                            </div>
                            <div class="float-right">
                                <label>
                                    <a class="btn btn-primary for-list" style="margin-bottom:1px; margin-left: 10px" href="{{route('admin.art.form.get')}}"> Thêm mới nghệ thuật</a>
                                </label>
                                <label>
                                    <a class="btn btn-warning for-list" style="margin-bottom:1px; margin-left: 10px" href="{{route('admin.art.export')}}"> Xuất dữ liệu</a>
                                </label>
                            </div>
                        </div>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã</th>
                                <th>Tên nghệ thuật</th>
                                <th>Phân loại</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($arts as $k => $item)
                                <tr>
                                    <td>{{$k + 1}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->category ? config('base.art_category')[$item->category] : ''}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.art.detail', $item->id)}}"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin.art.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.art.delete', $item->id)}}"><i class="fa fa-trash-o"></i></a>
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
