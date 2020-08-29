@extends('wibcomi.manga.layout.master')
@section('title')
{{$Manga->name}}
@endsection
@section('content')
<div class="background">
    <section class="story-faul container" id="report_error">
        <div class="close"><a href="javascript:void(0);"><img src="./Vạn Cổ Đệ Nhất Tế Chap 32 Next Chap 33 Tiếng Việt _ TruyenQQ.Com - Truyện Tranh - Manga_files/close-icon.png"></a></div>
    </section>
</div>
<section class="main-content on">
    <div class="story-see container">
        <div class="story-see-main">
            <div class="block">
                <div class="box">
                    <div>
                        <h1 class="detail-title"><a href="{{route('wibcomi.manga.manga',$Manga->slug)}}?id={{$Manga->source}}">{{$Manga->name}}</a></h1>
                        <!--<time datetime="2020-08-29T07:03:39+07:00">(Cập nhật lúc: 16:03 29/08/2020)</time>-->
                    </div>
                    <div class="chapter-control">
                        <div class="alert alert-info hidden-xs hidden-sm align-items-center">
                            <i class="fa fa-info-circle"></i> <em>Sử dụng mũi tên trái (←) hoặc phải (→) để chuyển chapter</em>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            @if($Manga->prev_chapter_slug)
                            <a class="btn btn-info go-btn prev text-white m-1 d-block" href="{{route('wibcomi.manga.read',[
                            'slug'=>explode("/",$Manga->prev_chapter_slug)[0],
                            'chap'=>explode("/",$Manga->prev_chapter_slug)[1],
                            'code'=>explode("/",$Manga->prev_chapter_slug)[2],
                            ])}}?id={{$Manga->source}}"><em class="fa fa-arrow-left"></em> Chap trước</a>
                            @endif
                            @if($Manga->next_chapter_slug)
                            <a class="btn btn-info go-btn prev text-white m-1 d-block" href="{{route('wibcomi.manga.read',[
                            'slug'=>explode("/",$Manga->next_chapter_slug)[0],
                            'chap'=>explode("/",$Manga->next_chapter_slug)[1],
                            'code'=>explode("/",$Manga->next_chapter_slug)[2],
                            ])}}?id={{$Manga->source}}">Chap sau <em class="fa fa-arrow-right"></em></a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="story-see-content">
                    @foreach($Manga->pages as $key=>$value)
                    <img class="lazy" src="{{$value['url']}}" data-src="{{$value['url']}}" alt="{{$Manga->name}}"><br>
                    @endforeach
                </div>
                <div class="show-footer"></div>
            </div>
        </div>
    </div>
</section>
<!-- /.main-content -->
<section class="story-see-footer has-background-white on">
    <div class="container">
        <div class="level">
            <div class="level-left">
                <ul class="list-01">
                    <li><a class="" href="{{route('wibcomi.home')}}"><i class="fas fa-home"></i> <span class="control-see">Trang chủ</span></a></li>
                    <!--<li><a class="" href="javascript:void(0);" id="faul"><i class="fas fa-exclamation-circle"></i> <span class="control-see">Báo lỗi</span></a></li>-->
                </ul>
            </div>
            <div class="center level">
                @if($Manga->prev_chapter_slug)
                <div class="prev level-left"><a class="link-prev-chap" href="{{route('wibcomi.manga.read',[
                    'slug'=>explode("/",$Manga->prev_chapter_slug)[0],
                    'chap'=>explode("/",$Manga->prev_chapter_slug)[1],
                    'code'=>explode("/",$Manga->prev_chapter_slug)[2],
                    ])}}?id={{$Manga->source}}" title="Chương trước"><i class="fas fa-arrow-circle-left"></i></a>
                </div>
                @else
                <a class="disable"><i class="fas fa-arrow-circle-left"></i></a>
                @endif
                <select class="selectEpisode">
                @foreach($Manga->chapters as $value)
                <option @if($value['slug'] == $Manga->chapter_slug) selected="" @endif value="{{route('wibcomi.manga.read',[
                'slug'=>explode("/",$value['slug'])[0],
                'chap'=>explode("/",$value['slug'])[1],
                'code'=>explode("/",$value['slug'])[2],
                ])}}?id={{$Manga->source}}">{{$value['name']}}</option>
                @endforeach
                </select>
                @if($Manga->next_chapter_slug)
                <div class="next level-right"><a class="link-next-chap" href="{{route('wibcomi.manga.read',[
                    'slug'=>explode("/",$Manga->next_chapter_slug)[0],
                    'chap'=>explode("/",$Manga->next_chapter_slug)[1],
                    'code'=>explode("/",$Manga->next_chapter_slug)[2],
                    ])}}?id={{$Manga->source}}" title="Chương sau"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
                @else
                <a class="disable"><i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
            <div class="level-right">
                <ul class="list-01">
                    <li><a class="light-see" href="javascript:void(0);"><i class="fas fa-lightbulb"></i> <span class="control-see">Bật đèn</span></a></li>
                    <!--
                        <li><a class="subscribeBook" href="javascript:void(0);" data-id="9609" data-page="detail"><i class="far fa-heart"></i> <span class="control-see">Theo dõi</span></a></li>
                         -->
                </ul>
                <!-- /.social-links -->
            </div>
        </div>
    </div>
</section>
<!-- /.footer -->
<!-- /.main-content -->
@endsection