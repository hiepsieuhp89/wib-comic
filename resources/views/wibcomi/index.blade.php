@extends('wibcomi.manga.layout.master')
@section('title')
Wibcomi
@endsection
@section('content')
            <!--<section class="hero">
                <div class="container">
                    <div class="tile is-ancestor">
                        <div class="tile is-3 is-vertical is-parent">
                            <div class="tile is-child">
                                <a href="http://truyenqq.com/truyen-tranh/the-promised-neverland-2547-chap-181.html">
                                    <div class="hero-item">
                                        <img class="cover" src="./Đọc truyện tranh Manhwa, Manga, Manhua Online_files/slider_1560501729.jpg" alt="cover">
                                        <div class="bottom-shadow"></div>
                                        <div class="captions">
                                            <h3>The Promised Neverland</h3>
                                        </div>
                                        <div class="chapter orange">Chương 181</div>
                                    </div>
                                </a>
                            </div>
                            <div class="tile is-child">
                                <a href="http://truyenqq.com/truyen-tranh/kingdom-vuong-gia-thien-ha-245-chap-650.html">
                                    <div class="hero-item">
                                        <img class="cover" src="./Đọc truyện tranh Manhwa, Manga, Manhua Online_files/slider_1567830171.jpg" alt="cover">
                                        <div class="bottom-shadow"></div>
                                        <div class="captions">
                                            <h3>Kingdom – Vương Giả Thiên Hạ</h3>
                                        </div>
                                        <div class="chapter red">Chương 650</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="tile is-parent">
                            <div class="tile is-child">
                                <a href="http://truyenqq.com/truyen-tranh/nanatsu-no-taizai-740-chap-346.html">
                                    <div class="hero-item has-excerpt">
                                        <img class="cover" src="./Đọc truyện tranh Manhwa, Manga, Manhua Online_files/slider_1559213426.jpg" alt="cover">
                                        <div class="bottom-shadow"></div>
                                        <div class="captions">
                                            <h5>Thể loại: Action, Adventure, Comedy, Fantasy, Shounen</h5>
                                            <h3>Nanatsu No Taizai</h3>
                                        </div>
                                        <div class="chapter blue">Chương 346</div>
                                        <div class="excerpt">“Thất đại ác nhân”, một nhóm chiến binh có tham vọng lật đổ vương quốc Britannia, được cho là đã bị tiêu diệt bởi các “hiệp sĩ thánh chiến” mặc dù vẫn còn 1 số người cho rằng họ vẫn còn sống. 10 năm sau, Các hiệp sĩ thánh chiến đã làm 1 cuộc đảo chính và khống chế đức vua, họ trở thành người cai trị độc tài mới của vương quốc. Elizabeth, con gái duy nhất của nhà vua, đã lên đường tìm “thất đại ác nhân” để nhờ họ tái chiếm lại vương quốc. Công chúa có thành công trong việc tìm kiếm “thất đại ác nhân”, các “hiệp sĩ thánh chiến” sẽ làm gì để ngăn chăn cô? xem các chap truyện sau sẽ rõ.</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="tile is-3 is-vertical is-parent">
                            <div class="tile is-child">
                                <a href="http://truyenqq.com/truyen-tranh/black-clover-499-chap-261.html">
                                    <div class="hero-item">
                                        <img class="cover" src="./Đọc truyện tranh Manhwa, Manga, Manhua Online_files/slider_1560493497.jpg" alt="cover">
                                        <div class="bottom-shadow"></div>
                                        <div class="captions">
                                            <h3>Black Clover</h3>
                                        </div>
                                        <div class="chapter green">Chương 261</div>
                                    </div>
                                </a>
                            </div>
                            <div class="tile is-child">
                                <a href="http://truyenqq.com/truyen-tranh/dao-hai-tac-128-chap-988.html">
                                    <div class="hero-item">
                                        <img class="cover" src="./Đọc truyện tranh Manhwa, Manga, Manhua Online_files/slider_1559211185.jpg" alt="cover">
                                        <div class="bottom-shadow"></div>
                                        <div class="captions">
                                            <h3>Đảo Hải Tặc</h3>
                                        </div>
                                        <div class="chapter violet">Chương 988</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div></section> -->    
            <section class="main-content index">
                <div class="container">
                    <div class="latest">
                        <div class="caption" id="list-update"><a href="{{route('wibcomi.manga.category')}}?sort=0&id=1"><span class="starts-icon"></span>Truyện mới cập nhật</a></div>
                        <ul class="list-stories grid-6">
                            @foreach($Manga as $key)
                            <li>
                                <div class="story-item">
                                    <a href="{{route('wibcomi.manga.manga',$key->slug)}}?id={{$key->source}}" title="{{$key->name}}"><img class="story-cover lazy_cover" src="{{$key->image}}" alt="{{$key->name}}"></a>
                                    <div class="top-notice">
                                        <span class="time-ago">{{$key->last_chapter['?time_ago']}}</span>                                    
                                    </div>
                                    <h3 class="title-book"><a href="{{route('wibcomi.manga.manga',$key->slug)}}?id={{$key->source}}" title="{{$key->name}}"><?php echo $key->name;?></a></h3>
                                    <div class="episode-book"><a href="{{route('wibcomi.manga.read',[
                                        'slug'=>explode("/",$key->last_chapter['slug'])[0],
                                        'chap'=>explode("/",$key->last_chapter['slug'])[1],
                                        'code'=>explode("/",$key->last_chapter['slug'])[2],
                                        ])}}?id={{$key->source}}">{{$key->last_chapter['name']}}</a>
                                    </div>
                                    <div class="more-info">
                                        <?php echo $key->addition_info;?>
                                        <div class="list-tags">
                                        </div>
                                        <div class="excerpt"><?php echo $key->description;?></div>
                                    </div>
                                </div>
                                <!-- /.story-item -->
                            </li>
                            @endforeach
                        </ul>
                        <!-- /.list-stories -->
                        <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
                            <ul class="pagination-list">
                                <li><a class="pagination-previous" href="{{ request()->fullUrlWithQuery(['page' => 1]) }}"><span aria-hidden="true">«</span></a></li>
                                    @foreach($pagination as $key)
                                        @if($key->innertext!== '&rsaquo;' && $key->innertext!== '&raquo;' && $key->innertext!== '&lsaquo;' && $key->innertext!== '&laquo;')
                                            <li><a class="pagination-link 
                                                    @if(request()->page == $key->innertext || (!request()->page && $key->innertext==1)) is-current @endif
                                                " href="{{ request()->fullUrlWithQuery(['page' => $key->innertext]) }}">{{$key->innertext}}</a></li>
                                        @endif
                                    @endforeach
                                <li><a class="pagination-next" href="{{ request()->fullUrlWithQuery(['page' => $last_page_number]) }}"><span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- /.latest -->
                </div>
                <div id="Top" class="scrollTop none" style="display: block;">
                    <span><a href="http://truyenqq.com/"><img src="./Đọc truyện tranh Manhwa, Manga, Manhua Online_files/back-to-top-icon.png"></a></span>
                </div>
            </section>
            <!-- /.main-content -->
@endsection