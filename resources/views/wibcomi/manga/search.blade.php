@extends('wibcomi.manga.layout.master')
@section('title')
Tìm kiếm
@endsection
@section('content')
<body class=" layout-boxed ">
    <style>
        .latestmanga a{
            color: black;
        }
        .latestmanga a:hover{
            color: blue;
        }
    </style>
        <div class="wrapper">
            @include('wibcomi.manga.layout.header')
            <div class=" container ">
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                    </div>
                </div>
                <!--/ row -->
                <!-- row -->
                <div class="row">
                    <div style="clear:both"></div>
                    <style>
                        .hotmanga {
                        display: block;
                        float: left;
                        margin-left: 10px;
                        width: 15.6%;
                        }
                        @media  screen and (max-width: 800px){
                        .hotmanga {
                        display: block;
                        float: left;
                        margin-left: 10px;
                        width: 30%;
                        }
                        }
                    </style>
                    <div class="col-sm-4 col-sm-push-8">
                        <!-- ads -->
                        <div class="row">
                            <div class="col-xs-12" style="padding: 0">
                                <div style="display: table; margin: 10px auto;">
                                </div>
                                <div style="display: table; margin: 10px auto;">
                                </div>
                            </div>
                        </div>
                        <!-- About Me -->
                        
                        <!--/ About Me -->
                        <!-- ads -->
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <!-- ads -->
                            <div class="row">
                                <div class="col-xs-12" style="padding: 0">
                                    <div class="ads-large" style="display: table; margin: 10px auto;">
                                    </div>
                                    <div style="display: table; margin: 10px auto;">
                                        <div class="pull-left ads-sqre1" style="margin-right: 10px;">
                                        </div>
                                        <div class="pull-right ads-sqre2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- news -->
                            <h2 class="listmanga-header">
                                <i class="fa fa-bars"></i>Truyện update mới nhất
                            </h2>
                            <hr>
                            <ul class="hot-thumbnails">
                                @foreach($Manga as $key)
                                <li class="latestmanga">
                                    <div class="photo" style="position: relative;">
                                        <a style="text-decoration:none;" class="thumbnail" style="position: relative; z-index: 10; background: rgb(255, 255, 255) none repeat scroll 0% 0%;" href="{{route('wibcomi.manga.manga',$key->slug)}}?id={{$key->source}}">
                                        <img style="height: 180px;" src="{{$key->image}}" alt="">
                                        </a>
                                        <div class="well">
                                            <p>
                                                <a style="text-decoration:none;" href="{{route('wibcomi.manga.manga',$key->slug)}}?id={{$key->source}}">{{$key->name}}</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <!-- ads -->
                            <style>
                                .latestmanga {
                                display: block;
                                float: left;
                                margin-left: 10px;
                                width: 15%;
                                }
                                @media  screen and (max-width: 1000px){
                                .latestmanga {
                                display: block;
                                float: left;
                                margin-left: 10px;
                                width: 30%;
                                }
                                }
                                @media  screen and (max-width: 800px){
                                .latestmanga {
                                display: block;
                                float: left;
                                margin-left: 10px;
                                width: 30%;
                                }
                                }
                            </style>
                        </div>
                        <div class="row" style="text-align: center;">
                            <div class="col-xs-12">
                                <ul class="pagination">
                                            <li><a style="color: black;" style="text-decoration:none;" href="{{ request()->fullUrlWithQuery(['page' => 1]) }}" rel="prev">«</a></li>
                                                @foreach($pagination as $key)
                                                    @if($key->innertext!== '&rsaquo;' && $key->innertext!== '&raquo;' && $key->innertext!== '&lsaquo;' && $key->innertext!== '&laquo;')
                                                    <li @if(request()->page == $key->innertext) class="active" @endif><a style="text-decoration:none; color: black;" href="{{ request()->fullUrlWithQuery(['page' => $key->innertext]) }}">{{$key->innertext}}</a></li>
                                                    @endif
                                                @endforeach
                                            <li><a style="color: black;" style="text-decoration:none;" href="{{ request()->fullUrlWithQuery(['page' => $last_page_number]) }}" rel="next">»</a></li>
                                    </ul>

                            </div>
                        </div>
                        </div>
                </div>
                <!--/ row -->
                @include('wibcomi.manga.layout.footer')
            </div>
        </div>
        <div class="autocomplete-suggestions" style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
        <div id="eJOY__extension_root" class="eJOY__extension_root_class" style="all: unset;"></div>
        </body>
@endsection