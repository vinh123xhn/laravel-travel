@extends('layout.master')
@section('where', 'Trang chủ')
@section('where_active', 'Trang chủ')
@section('head')
    <script src="{{asset('highchart/code/highcharts.js')}}"></script>
    <script src="{{asset('highchart/code/modules/exporting.js')}}"></script>
    <script src="{{asset('highchart/code/modules/export-data.js')}}"></script>
@endsection
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div id="art" style="min-width: 1000px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="height: 400px; background-color: #92e6f1">
                        <ol class="carousel-indicators">
                            @foreach($arts as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators1" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators1" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($arts as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item active">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.art.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.art.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.art.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.art.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div id="costume" style="width: 1000px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel" style="height: 400px; background-color: #92e6f1">
                        <ol class="carousel-indicators">
                            @foreach($costumes as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($costumes as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item active">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.costume.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.costume.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.costume.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.costume.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div id="cuisine" style="width: 1000px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel" style="height: 400px; background-color: #92e6f1">
                        <ol class="carousel-indicators">
                            @foreach($cuisines as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators3" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators3" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($cuisines as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item active">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.cuisine.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.cuisine.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.cuisine.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.cuisine.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div id="crafts" style="width: 1000px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div id="carouselExampleIndicators4" class="carousel slide" data-ride="carousel" style="height: 400px; background-color: #92e6f1">
                        <ol class="carousel-indicators">
                            @foreach($crafts as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators4" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators4" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($crafts as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item active">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.crafts.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.crafts.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.crafts.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.crafts.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators4" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators4" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div id="festival" style="width: 1000px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div id="carouselExampleIndicators5" class="carousel slide" data-ride="carousel" style="height: 400px; background-color: #92e6f1">
                        <ol class="carousel-indicators">
                            @foreach($festivals as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators5" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators5" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($festivals as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item active">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.festival.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.festival.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.festival.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.festival.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators5" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators5" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div id="relics" style="min-width: 1000px; height: 400px; margin: 0 auto"></div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div id="carouselExampleIndicators6" class="carousel slide" data-ride="carousel" style="height: 400px; background-color: #92e6f1">
                        <ol class="carousel-indicators">
                            @foreach($relics as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators6" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators6" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($relics as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item active">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.relics.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.relics.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-6 margin-top-10">
                                            <a href="{{route('admin.relics.detail', $item->id)}}">
                                                @if(!empty($item->image))
                                                    <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @else
                                                    <img src="" class="d-block w-100" style="width: 400px; height: 300px" alt="...">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-6 margin-top-10">
                                            <div class="row">
                                                <a href="{{route('admin.relics.detail', $item->id)}}">
                                                    <h4 class="title_slide">{{$item->name}}</h4>
                                                </a>
                                                <p>
                                                    <?php
                                                    $str = $item->subtitle;
                                                    echo html_entity_decode(substr($str, 0, 800)).'...';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators6" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators6" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
@endsection
@section('js')
    <script src="{{asset('js/art.js')}}"></script>
    <script src="{{asset('js/costume.js')}}"></script>
    <script src="{{asset('js/crafts.js')}}"></script>
    <script src="{{asset('js/cuisine.js')}}"></script>
    <script src="{{asset('js/festival.js')}}"></script>
    <script src="{{asset('js/relics.js')}}"></script>
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

