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
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12" style="padding-left: 0">
                            <div class="col-md-4" style="padding-left: 0">
                                <form action="{{route('admin.festival.filter')}}" method="get">
                                    <label>
                                        <select class="form-control form-control-sm" name="category" aria-controls="bootstrap-data-table-export">
                                            @if(isset($category))
                                                @foreach(config('base.festival_category') as $k => $item)
                                                    <option
                                                        @if($category == $k)
                                                        {{"selected"}}
                                                        @endif
                                                        value="{{$k}}">{{$item}}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option value="">Lựa chọn</option>
                                                @foreach(config('base.festival_category') as $k => $item)
                                                    <option value="{{$k}}">{{$item}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </label>
                                    <label>
                                        <button class="btn btn-primary for-list  border-radius-5" type="submit">Lọc</button>
                                    </label>
                                </form>
                            </div>
                            <div class="float-right">
                                <label>
                                    <a class="btn btn-primary for-list" style="margin-bottom:1px; margin-left: 10px" href="{{route('admin.festival.form.get')}}"> Thêm mới lễ hội</a>
                                </label>
                                <label>
                                    <a class="btn btn-warning for-list" style="margin-bottom:1px; margin-left: 10px" href="{{route('admin.festival.export')}}"> Xuất dữ liệu</a>
                                </label>
                            </div>
                        </div>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã</th>
                                <th>Tên lễ hội</th>
                                <th>Phân loại</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody id="table-data">
                            @foreach($festivals as $k => $item)
                                <tr>
                                    <td>{{$k + 1}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->category ? config('base.festival_category')[$item->category] : ''}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.festival.detail', $item->id)}}"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin.festival.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.festival.delete', $item->id)}}"><i class="fa fa-trash-o"></i></a>
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
