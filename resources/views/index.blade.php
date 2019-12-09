@extends('layout.master')
@section('where', 'Trang chủ')
@section('where_active', 'Trang chủ')
@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div id="art" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($arts as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($arts as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item">
                                        <div class="col-md-12">
                                            <a href="{{route('admin.art.detail', $item->id)}}">
                                                <h4>
                                                    {{$item->name}}
                                                </h4>
                                            </a>
                                            <p>
                                                <?php
                                                $string = $item->subtitle;
                                                echo substr($string, 0, 150).'...'
                                                ?>
                                            </p>
                                        </div>
                                        <a href="{{route('admin.art.detail', $item->id)}}">
                                            <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 50%; height: 50%" alt="...">
                                        </a>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-12">
                                            <a href="{{route('admin.art.detail', $item->id)}}">
                                                <h4>
                                                    {{$item->name}}
                                                </h4>
                                            </a>
                                            <p>
                                                <?php
                                                $string = $item->subtitle;
                                                echo substr($string, 0, 150).'...'
                                                ?>
                                            </p>
                                        </div>
                                        <a href="{{route('admin.art.detail', $item->id)}}">
                                            <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 50%; height: 50%" alt="...">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="costume" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($costumes as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($costumes as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item">
                                        <div class="col-md-12">
                                            <a href="{{route('admin.costume.detail', $item->id)}}">
                                                <h4>
                                                    {{$item->name}}
                                                </h4>
                                            </a>
                                            <p>
                                                <?php
                                                $string = $item->subtitle;
                                                echo substr($string, 0, 150).'...'
                                                ?>
                                            </p>
                                        </div>
                                        <a href="{{route('admin.costume.detail', $item->id)}}">
                                            <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 50%; height: 50%" alt="...">
                                        </a>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-12">
                                            <a href="{{route('admin.costume.detail', $item->id)}}">
                                                <h4>
                                                    {{$item->name}}
                                                </h4>
                                            </a>
                                            <p>
                                                <?php
                                                $string = $item->subtitle;
                                                echo substr($string, 0, 150).'...'
                                                ?>
                                            </p>
                                        </div>
                                        <a href="{{route('admin.costume.detail', $item->id)}}">
                                            <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 50%; height: 50%" alt="...">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="cuisine" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($cuisines as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($cuisines as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item">
                                        <div class="col-md-12">
                                            <a href="{{route('admin.cuisine.detail', $item->id)}}">
                                                <h4>
                                                    {{$item->name}}
                                                </h4>
                                            </a>
                                            <p>
                                                <?php
                                                $string = $item->subtitle;
                                                echo substr($string, 0, 150).'...'
                                                ?>
                                            </p>
                                        </div>
                                        <a href="{{route('admin.cuisine.detail', $item->id)}}">
                                            <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 50%; height: 50%" alt="...">
                                        </a>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-12">
                                            <a href="{{route('admin.cuisine.detail', $item->id)}}">
                                                <h4>
                                                    {{$item->name}}
                                                </h4>
                                            </a>
                                            <p>
                                                <?php
                                                $string = $item->subtitle;
                                                echo substr($string, 0, 150).'...'
                                                ?>
                                            </p>
                                        </div>
                                        <a href="{{route('admin.cuisine.detail', $item->id)}}">
                                            <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 50%; height: 50%" alt="...">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="crafts" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($crafts as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($crafts as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item">
                                        <div class="col-md-12">
                                            <a href="{{route('admin.crafts.detail', $item->id)}}">
                                                <h4>
                                                    {{$item->name}}
                                                </h4>
                                            </a>
                                            <p>
                                                <?php
                                                $string = $item->subtitle;
                                                echo substr($string, 0, 150).'...'
                                                ?>
                                            </p>
                                        </div>
                                        <a href="{{route('admin.crafts.detail', $item->id)}}">
                                            <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 50%; height: 50%" alt="...">
                                        </a>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-12">
                                            <a href="{{route('admin.crafts.detail', $item->id)}}">
                                                <h4>
                                                    {{$item->name}}
                                                </h4>
                                            </a>
                                            <p>
                                                <?php
                                                $string = $item->subtitle;
                                                echo substr($string, 0, 150).'...'
                                                ?>
                                            </p>
                                        </div>
                                        <a href="{{route('admin.crafts.detail', $item->id)}}">
                                            <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 50%; height: 50%" alt="...">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="festival" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($festivals as $k => $item)
                                @if($k == 0)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$k}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($festivals as $k => $item)
                                @if($k == 0)
                                    <div class="carousel-item">
                                        <div class="col-md-12">
                                            <a href="{{route('admin.festival.detail', $item->id)}}">
                                                <h4>
                                                    {{$item->name}}
                                                </h4>
                                            </a>
                                            <p>
                                                <?php
                                                $string = $item->subtitle;
                                                echo substr($string, 0, 150).'...'
                                                ?>
                                            </p>
                                        </div>
                                        <a href="{{route('admin.festival.detail', $item->id)}}">
                                            <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 50%; height: 50%" alt="...">
                                        </a>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <div class="col-md-12">
                                            <a href="{{route('admin.festival.detail', $item->id)}}">
                                                <h4>
                                                    {{$item->name}}
                                                </h4>
                                            </a>
                                            <p>
                                                <?php
                                                $string = $item->subtitle;
                                                echo substr($string, 0, 150).'...'
                                                ?>
                                            </p>
                                        </div>
                                        <a href="{{route('admin.festival.detail', $item->id)}}">
                                            <img src="{{asset('storage/'.$item->image)}}" class="d-block w-100" style="width: 50%; height: 50%" alt="...">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
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


        </div>
    </div><!-- .animated -->
@endsection
@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

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

