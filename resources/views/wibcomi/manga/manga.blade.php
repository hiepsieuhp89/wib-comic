@extends('wibcomi.manga.layout.master')
@section('title')
<?php echo $Manga_detail->name;?>
@endsection
@section('content')
<section class="main-content">
    <div class="container has-background-white story-detail">
        <div id="path">
            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
            </ol>
        </div>
        <div class="block01">
            <div class="left"><img src="{{$Manga_detail->image}}" alt="Cô Vợ Ấm Áp Của Hạ Thiếu" /></div>
            <div class="center" itemscope="" itemtype="http://schema.org/Book">
                <h1 itemprop="name"><?php echo $Manga_detail->name;?></h1>
                <div class="txt">
                    <p class="info-item">Tác giả: <?php echo $Manga_detail->author;?></p>
                    <p class="info-item">Tình trạng: {{$Manga_detail->status}}</p>
                    <div>
                        <span>Thống kê:</span>
                        <span class="sp01"><i class="fas fa-heart"></i> <span class="sp02">{{$Manga_detail->follow}}</span></span>
                        <span class="sp01"><i class="fas fa-eye"></i> <span class="sp02">{{$Manga_detail->views}}</span></span>
                    </div>
                </div>
                <ul class="list01">
                    @foreach($Manga_detail->category as $key=>$value)
                    <li class="li03"><a href="{{route('wibcomi.manga.category')}}?type={{$value['slug']}}&id={{request()->id}}">{{$value['name']}}</a></li>
                    @endforeach
                </ul>
                <ul class="story-detail-menu">
                    <li class="li01"><a href="{{route('wibcomi.manga.read',[
                        'slug'=>explode("/",$Manga_detail->chapters[count($Manga_detail->chapters)-1]['slug'])[0],
                        'chap'=>explode("/",$Manga_detail->chapters[count($Manga_detail->chapters)-1]['slug'])[1],
                        'code'=>explode("/",$Manga_detail->chapters[count($Manga_detail->chapters)-1]['slug'])[2],
                        ])}}?id={{$Manga_detail->source}}" class="button is-danger is-rounded"><span class="btn-read"></span>Đọc từ đầu</a>
                    </li>
                    <li class="li03"><a href="{{route('wibcomi.manga.read',[
                        'slug'=>explode("/",$Manga_detail->chapters[0]['slug'])[0],
                        'chap'=>explode("/",$Manga_detail->chapters[0]['slug'])[1],
                        'code'=>explode("/",$Manga_detail->chapters[0]['slug'])[2],
                        ])}}?id={{$Manga_detail->source}}" class="button is-danger is-rounded btn-like"><span class="btn-read"></span>Đọc Chap cuối</a>
                    </li>
                    <li class="li02"><a href="" class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index" data-id="4917"><span class="fas fa-heart"></span>Theo dõi</a></li>
                </ul>
                <div class="txt txt01 story-detail-info" itemprop="description">
                    <?php echo $Manga_detail->description;?>
                </div>
            </div>
        </div>
        <ul class="story-detail-menu">
            <li class="li01"><a href="{{route('wibcomi.manga.read',[
                        'slug'=>explode("/",$Manga_detail->chapters[count($Manga_detail->chapters)-1]['slug'])[0],
                        'chap'=>explode("/",$Manga_detail->chapters[count($Manga_detail->chapters)-1]['slug'])[1],
                        'code'=>explode("/",$Manga_detail->chapters[count($Manga_detail->chapters)-1]['slug'])[2],
                        ])}}?id={{$Manga_detail->source}}" class="button is-danger is-rounded"><span class="btn-read"></span>Đọc từ đầu</a>
                    </li>
                    <li class="li03"><a href="{{route('wibcomi.manga.read',[
                        'slug'=>explode("/",$Manga_detail->chapters[0]['slug'])[0],
                        'chap'=>explode("/",$Manga_detail->chapters[0]['slug'])[1],
                        'code'=>explode("/",$Manga_detail->chapters[0]['slug'])[2],
                        ])}}?id={{$Manga_detail->source}}" class="button is-danger is-rounded btn-like"><span class="btn-read"></span>Đọc Chap cuối</a>
                    </li>
                    <li class="li02"><a href="" class="button is-danger is-rounded btn-subscribe subscribeBook" data-page="index" data-id="4917"><span class="fas fa-heart"></span>Theo dõi</a></li>
        </ul>
        <div class="block02">
            <div class="title">
                <h2 class="story-detail-title">Danh sách chương</h2>
            </div>
            <div class="box">
                <div class="works-chapter-list">
                    @foreach($Manga_detail->chapters as $key=>$value)
                    <div class="works-chapter-item row">
                        <div class="col-md-10 col-sm-10 col-xs-8 ">
                            <a target="_blank" href="{{route('wibcomi.manga.read',[
                            'slug'=>explode("/",$value['slug'])[0],
                            'chap'=>explode("/",$value['slug'])[1],
                            'code'=>explode("/",$value['slug'])[2],
                            ])}}?id={{$Manga_detail->source}}">{{$value['name']}}</a>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 text-right">
                            {{$value['date_update']}}                   
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!--
            <div class="block03">
               <h2 class="story-detail-title">Cùng thể loại</h2>
               <div class="tile is-ancestor">
                  <div class="tile is-vertical is-parent">
                     <ul class="list-stories grid-6">
                        <li>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <input type="hidden" id="book_id" value="4917" />
            <input type="hidden" id="total_page" value="77" />
            <input type="hidden" id="current_page" value="1" />
            <input type="hidden" id="id_textarea" value="" />
            <input type="hidden" id="parent_id" value="" />
            <input type="hidden" id="episode_name" value="" />
            <input type="hidden" id="episode_id" value="" />
            <input type="hidden" id="slug" value="co-vo-am-ap-cua-ha-thieu" />
            <div class="comment-container">
               <span class="story-detail-title"><i class="fas fa-comments"></i>Bình Luận (<span class="comment-count">762</span>)</span>
               <div class="group01 comments-container">
                  <div class="notify" style="padding: 10px; margin-bottom: 10px; background-color: #FFF;">
                     Like <a rel="nofollow" href="https://www.facebook.com/truyenqq.page" target="_blank">Fanpage</a> để ủng hộ TruyenQQ và cập nhật các thông tin mới nhất về các bộ truyện nhé. 
                     <div class="fb-like" data-href="https://www.facebook.com/truyenqq.page" data-send="false" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                  </div>
                  <div class="form-comment main_comment">
                     <div class="message-content">
                        <div class="input-comment">
                           <span class="col-md-6 col-sm-6 col-xs-12 text-center"><input value="" class="input" id="name_comment" type="text" placeholder="Họ tên"></span>
                           <span class="col-md-6 col-sm-6 col-xs-12 text-center"><input value="" class="input" id="email_comment" type="email" placeholder="Email"></span>
                        </div>
                        <div class="mess-input">
                           <textarea class="textarea" placeholder="Nội dung bình luận" id="content_comment"></textarea>
                           <button type="submit" class="click_emoji"></button>
                           <button type="submit" class="submit_comment"></button>
                        </div>
                     </div>
                  </div>
                  <div class="list-comment">
                     <article class="info-comment child_1034762 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                           <figure class="avartar-comment">
                              <img src="http://avatar.mangaqq.com/160x160/avatar_1587524538.jpg?r=r8645456" alt="Koro Sushine">
                           </figure>
                           <div class="item-comment">
                              <div class="outline-content-comment">
                                 <div>
                                    <strong>Koro Sushine</strong><span class="title-user-comment title-member">Thành Viên</span>
                                    <span class="time">43 Phút Trước</span>
                                 </div>
                                 <div class="content-comment">
                                    <strong></strong> hayyyy                        
                                 </div>
                              </div>
                              <div class="action-comment">
                                 <span class="like-comment" data-id="1034762"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                 <span class="reply-comment" data-parent="0" data-id="1034762" data-user="76245" data-replyname="Koro Sushine"><i class="far fa-comment"></i> Trả lời</span>
                              </div>
                           </div>
                        </div>
                     </article>
                     <article class="info-comment child_1034751 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                           <figure class="avartar-comment">
                              <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png" alt="Vlamidir">
                           </figure>
                           <div class="item-comment">
                              <div class="outline-content-comment">
                                 <div>
                                    <strong>Vlamidir</strong><span class="title-user-comment title-member">Thành Viên</span>
                                    <span class="time">1 Giờ Trước</span>
                                 </div>
                                 <div class="content-comment">
                                    <strong></strong> IQ cao nói j cũng đúng nhỉ                        
                                 </div>
                              </div>
                              <div class="action-comment">
                                 <span class="like-comment" data-id="1034751"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                 <span class="reply-comment" data-parent="0" data-id="1034751" data-user="127612" data-replyname="Vlamidir"><i class="far fa-comment"></i> Trả lời</span>
                              </div>
                           </div>
                        </div>
                     </article>
                     <article class="info-comment child_1029289 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                           <figure class="avartar-comment">
                              <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png" alt="Tanjitou">
                           </figure>
                           <div class="item-comment">
                              <div class="outline-content-comment">
                                 <div>
                                    <strong>Tanjitou</strong><span class="title-user-comment title-member">Thành Viên</span>
                                    <span class="time">2 Ngày Trước</span>
                                 </div>
                                 <div class="content-comment">
                                    <strong></strong> Con tuesday này ko có gì đặc sắc ;)))))<br>Mánh mèo cả                        
                                 </div>
                              </div>
                              <div class="action-comment">
                                 <span class="like-comment" data-id="1029289"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">1</span></span>
                                 <span class="reply-comment" data-parent="0" data-id="1029289" data-user="164075" data-replyname="Tanjitou"><i class="far fa-comment"></i> Trả lời</span>
                              </div>
                           </div>
                        </div>
                     </article>
                     <article class="info-comment child_1026576 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                           <figure class="avartar-comment">
                              <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png" alt="Bao">
                           </figure>
                           <div class="item-comment">
                              <div class="outline-content-comment">
                                 <div>
                                    <strong>Bao</strong><span class="title-user-comment title-hidden">Ẩn Danh</span>
                                    <span class="time">3 Ngày Trước</span>
                                 </div>
                                 <div class="content-comment">
                                    <strong></strong> Ai cũng bảo vợ hạ tổng bình thường ko có gì đặc biệt :))))))))                        
                                 </div>
                              </div>
                              <div class="action-comment">
                                 <span class="like-comment" data-id="1026576"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">1</span></span>
                                 <span class="reply-comment" data-parent="0" data-id="1026576" data-user="0" data-replyname="Bao"><i class="far fa-comment"></i> Trả lời</span>
                              </div>
                           </div>
                        </div>
                     </article>
                     <article class="info-comment child_1025926 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                           <figure class="avartar-comment">
                              <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png" alt="Duy">
                           </figure>
                           <div class="item-comment">
                              <div class="outline-content-comment">
                                 <div>
                                    <strong>Duy</strong><span class="title-user-comment title-hidden">Ẩn Danh</span>
                                    <span class="time">3 Ngày Trước</span>
                                 </div>
                                 <div class="content-comment">
                                    <strong></strong> Con nhược vi chap 5 còn vui vẻ tác hợp hai vợ chồng n9 cái về sau thì tự nhiên ghét ngang ai làm gì đâu                        
                                 </div>
                              </div>
                              <div class="action-comment">
                                 <span class="like-comment" data-id="1025926"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">1</span></span>
                                 <span class="reply-comment" data-parent="0" data-id="1025926" data-user="0" data-replyname="Duy"><i class="far fa-comment"></i> Trả lời</span>
                              </div>
                           </div>
                        </div>
                     </article>
                     <article class="info-comment child_1025290 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                           <figure class="avartar-comment">
                              <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png" alt="Nguyễn Hiệp">
                           </figure>
                           <div class="item-comment">
                              <div class="outline-content-comment">
                                 <div>
                                    <strong>Nguyễn Hiệp</strong><span class="title-user-comment title-member">Thành Viên</span>
                                    <span class="time">3 Ngày Trước</span>
                                 </div>
                                 <div class="content-comment">
                                    <strong></strong> Chap 235- Hẳn là bộ thần kinh thô sơ :)))) thèn con láo quá rồi :))))))))                        
                                 </div>
                              </div>
                              <div class="action-comment">
                                 <span class="like-comment" data-id="1025290"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                 <span class="reply-comment" data-parent="0" data-id="1025290" data-user="37775" data-replyname="Nguyễn Hiệp"><i class="far fa-comment"></i> Trả lời</span>
                              </div>
                           </div>
                        </div>
                     </article>
                     <article class="info-comment child_1022025 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                           <figure class="avartar-comment">
                              <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png" alt="Nami">
                           </figure>
                           <div class="item-comment">
                              <div class="outline-content-comment">
                                 <div>
                                    <strong>Nami</strong><span class="title-user-comment title-member">Thành Viên</span>
                                    <span class="time">4 Ngày Trước</span>
                                 </div>
                                 <div class="content-comment">
                                    <strong></strong> C-214 con ninh duy này nhìn xấu chó thế mà bảo ai cx thick tính nết còn như lb                        
                                 </div>
                              </div>
                              <div class="action-comment">
                                 <span class="like-comment" data-id="1022025"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                 <span class="reply-comment" data-parent="0" data-id="1022025" data-user="229400" data-replyname="Nami"><i class="far fa-comment"></i> Trả lời</span>
                              </div>
                           </div>
                        </div>
                     </article>
                     <article class="info-comment child_1016652 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                           <figure class="avartar-comment">
                              <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png" alt="Tống long">
                           </figure>
                           <div class="item-comment">
                              <div class="outline-content-comment">
                                 <div>
                                    <strong>Tống long</strong><span class="title-user-comment title-member">Thành Viên</span>
                                    <span class="time">6 Ngày Trước</span>
                                 </div>
                                 <div class="content-comment">
                                    <strong></strong> Ninh duy là ai                        
                                 </div>
                              </div>
                              <div class="action-comment">
                                 <span class="like-comment" data-id="1016652"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                 <span class="reply-comment" data-parent="0" data-id="1016652" data-user="41474" data-replyname="Tống long"><i class="far fa-comment"></i> Trả lời</span>
                              </div>
                           </div>
                        </div>
                     </article>
                     <article class="info-comment child_1017141 parent_1016652 reply-list">
                        <div class="outsite-comment reply-list">
                           <figure class="avartar-comment">
                              <img src="http://static.truyenqq.com/template/frontend/images/noavatar.png" alt="Drama">
                           </figure>
                           <div class="item-comment">
                              <div class="outline-content-comment">
                                 <div>
                                    <strong>Drama</strong><span class="title-user-comment title-hidden">Ẩn Danh</span>
                                    <span class="time">6 Ngày Trước</span>
                                 </div>
                                 <div class="content-comment">
                                    <strong>Tống long</strong> Đọc truyện đê ông ơi đừng chỉ nhìn tranh ảnh                        
                                 </div>
                              </div>
                              <div class="action-comment">
                                 <span class="like-comment" data-id="1017141"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                 <span class="reply-comment" data-parent="1016652" data-id="1017141" data-user="0" data-replyname="Drama"><i class="far fa-comment"></i> Trả lời</span>
                              </div>
                           </div>
                        </div>
                     </article>
                     <article class="info-comment child_1015584 parent_0 comment-main-level">
                        <div class="outsite-comment comment-main-level">
                           <figure class="avartar-comment">
                              <img src="http://avatar.mangaqq.com/160x160/avatar_1585664155.jpg?r=r8645456" alt="Là tao DIO">
                           </figure>
                           <div class="item-comment">
                              <div class="outline-content-comment">
                                 <div>
                                    <strong>Là tao DIO</strong><span class="title-user-comment title-member">Thành Viên</span>
                                    <span class="time">7 Ngày Trước</span>
                                 </div>
                                 <div class="content-comment">
                                    <strong></strong> Up ghê thế đại kỉ nguyên à                        
                                 </div>
                              </div>
                              <div class="action-comment">
                                 <span class="like-comment" data-id="1015584"><i class="fas fa-thumbs-up"></i> <span class="total-like-comment">0</span></span>
                                 <span class="reply-comment" data-parent="0" data-id="1015584" data-user="166458" data-replyname="Là tao DIO"><i class="far fa-comment"></i> Trả lời</span>
                              </div>
                           </div>
                        </div>
                     </article>
                  </div>
               </div>
               <div class="load-more load_more_comment"><a class="button is-info">Xem thêm nhiều bình luận</a></div>
            </div>
             -->
    </div>
</section>
<!-- /.main-content -->
@endsection