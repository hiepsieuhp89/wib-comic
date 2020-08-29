@extends('wibcomi.manga.layout.master')
@section('title')
Tìm truyện
@endsection
@section('content')
<section class="main-content">
    <div class="container story-list">
        <div class="title-list">
            Tìm theo danh mục
        </div>
        <div class="story-list-bl01 box">
            <table>
                <tbody>
                    <tr>
                        <th>Thể loại truyện</th>
                        <td>
                            <div class="select is-warning">
                                <select id="category">
                                @foreach($category as $key)
                                @foreach($key as $value)
                                <option @if(request()->type==$value['slug']) {{$typename = $value['name']}} {{$type_title = $value['title']}} selected="" @endif value="
                                  {{request()->fullUrlWithQuery(['type' => $value['slug'],'id'=>1,'keyword'=>null])}}
                                  ">{{$value['name']}}</option>
                                @endforeach
                                @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Tình trạng</th>
                        <td>
                            <ul class="choose">
                                <li><a @if(request()->status == -1) class="active" @endif href="{{ request()->fullUrlWithQuery(['status' => -1,'sort'=>request()->sort,'keyword'=>null]) }}">Tất cả</a></li>
                                <li><a @if(request()->status == 1) class="active" @endif href="{{ request()->fullUrlWithQuery(['status' => 1,'sort'=>request()->sort,'keyword'=>null]) }}">Đang tiến hành</a></li>
                                <li><a @if(request()->status == 2) class="active" @endif href="{{ request()->fullUrlWithQuery(['status' => 2,'sort'=>request()->sort,'keyword'=>null]) }}">Hoàn thành</a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th>Sắp xếp</th>
                        <td>
                            <div class="select is-warning">
                                <select id="category-sort">
                                    <option @if(request()->sort == 0) selected="" @endif value="{{ request()->fullUrlWithQuery(['status' => request()->status,'sort'=>0,'keyword'=>null]) }}">Ngày cập nhật</option>
                                    <option @if(request()->sort == 15) selected="" @endif value="{{ request()->fullUrlWithQuery(['status' => request()->status,'sort'=>15,'keyword'=>null]) }}">Truyện mới</option>
                                    <option @if(request()->sort == 10) selected="" @endif value="{{ request()->fullUrlWithQuery(['status' => request()->status,'sort'=>10,'keyword'=>null]) }}">Đầu bảng xếp hạng</option>
                                    <option @if(request()->sort == 20) selected="" @endif value="{{ request()->fullUrlWithQuery(['status' => request()->status,'sort'=>20,'keyword'=>null]) }}">Số lượt theo dõi</option>
                                    <option @if(request()->sort == 30) selected="" @endif value="{{ request()->fullUrlWithQuery(['status' => request()->status,'sort'=>30,'keyword'=>null]) }}">Số chương truyện</option>
                                    <option @if(request()->sort == 5) selected="" @endif value="{{ request()->fullUrlWithQuery(['status' => request()->status,'sort'=>5,'keyword'=>null]) }}">Tên truyện</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="title-list">
            @if(!request()->type)
            @if(request()->keyword)
            Tìm theo từ khóa: {{$keyword}}
            @else
            Tất cả thể loại
            @endif
            @else
            Truyện {{$typename}}
            @endif
        </div>
        <div class="box">
            {{$type_title}}
        </div>
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-parent">
                <ul class="list-stories grid-6">
                    @if($Manga)
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
                    @endif
                </ul>
            </div>
        </div>
        <!-- /.list-stories -->
        <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
            @if($pagination)
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
            @endif
        </nav>
    </div>
</section>
<!-- /.main-content -->
@endsection