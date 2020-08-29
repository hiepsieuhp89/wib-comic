<?php

namespace App\Http\Controllers\wibcomi;

use App\Http\Controllers\Controller;
//use Sunra\PhpSimple\HtmlDomParser;
use Illuminate\Http\Request;
use App\Manga;
use App\Manga_detail;
use App\Manga_directory;
use App\Manga_reading_mode;
class IndexController extends Controller
{
    public function index(Request $request){
    	//$data = $request->all();
    	//dd($data);
        if(!$request)
        $html = file_get_html('http://www.nettruyen.com/');
        else
        $html = file_get_html('http://www.nettruyen.com/?page='.$request->page);
        $main = $html->find('div.row');
        $items = $main[0]->find('div.item');
        $pagination = $html->find('ul.pagination li a');
        $url_last_page = $pagination[count($pagination)-1]->href;
        $last_page_number = substr($url_last_page, strpos($url_last_page, "=") + 1);
        $i=0;
        foreach($items as $key){
            $Manga[$i] = new Manga();
            $url = $key->find('a');
            $name = $key->find('h3 a.jtip');
            $image = $key->find('figure.clearfix')[0]->find('div.image')[0]->find('a')[0]->find('img.lazy');
            $view = explode(" ",trim($key->find('span.pull-left')[0]->plaintext));
            //dd($view);
            $Manga[$i]->name = $name[0]->innertext;
            $Manga[$i]->slug = substr($url[0]->href, strpos($url[0]->href, "truyen-tranh") + 13);
            $Manga[$i]->url = $url[0]->href;
            $host = parse_url($url[0]->href)['host'];
            if($host=='www.nettruyen.com')
                $Manga[$i]->source = 1;
            else if($host=='nhattruyen.com')
                $Manga[$i]->source = 2;
            $Manga[$i]->views = $view[0];
            $Manga[$i]->follow = $view[4];
            $Manga[$i]->image = $image[0]->getAttribute('data-original');
            $Manga[$i]->description = $key->find('div.box_tootip div.box_li div.box_text')[0]->innertext;
            $Manga[$i]->addition_info = $key->find('div.box_tootip div.box_li div.message_main')[0]->innertext;
            $last_chapter = $key->find('figure.clearfix figcaption ul li.chapter a')[0];
            $Manga[$i]->last_chapter['slug'] = substr($last_chapter->href, strpos($last_chapter->href, "truyen-tranh") + 13);
            $Manga[$i]->last_chapter['name'] = $last_chapter->innertext;
            $Manga[$i]->last_chapter['?time_ago'] = $key->find('figure.clearfix figcaption ul li.chapter i.time')[0]->innertext;
            $i++;
        }

        //hot_manga
        /*
        $hot_manga[0] = $this->getHot_manga('http://www.nettruyen.com/truyen-tranh/dao-hai-tac-9169');
        $hot_manga[1] = $this->getHot_manga('http://www.nettruyen.com/truyen-tranh/phap-su-khong-phep-thuat-9285');
        $hot_manga[2] = $this->getHot_manga('http://www.nettruyen.com/truyen-tranh/mien-dat-hua-14654');
        $hot_manga[3] = $this->getHot_manga('http://www.nettruyen.com/truyen-tranh/bay-dai-ac-nhan-10365');
        $hot_manga[4] = $this->getHot_manga('http://nhattruyen.com/truyen-tranh/naruto-cuu-vi-ho-ly-11996');
        */

        //dd($hot_manga);
        //dd($category);
        //dd($Manga);
        return view('wibcomi.index',compact('Manga','pagination','last_page_number'));
        
    }
    public function category(Request $request){
    	if($request->keyword){
    		$keyword = str_replace(' ','+',$request->keyword);
    		$url= 'http://www.nettruyen.com/tim-truyen?keyword='.$keyword;
    	}
    	else{
    		$keyword = null;
    		if(!$request->type){
    			if($request->sort==0&&$request->status==2){
	    			$url='http://www.nettruyen.com/truyen-full';
	    		}
	    		else{
	    			if($request->id==1 || !$request->id)
			    	$url= 'http://www.nettruyen.com/tim-truyen'.'?page='.$request->page.'&status='.$request->status.'&sort='.$request->sort.'&keyword='.$request->keyword;
					else
			    	$url= 'http://nhattruyen.com/the-loai'.'?page='.$request->page.'&status='.$request->status.'&sort='.$request->sort.'&keyword='.$request->keyword;
	    		}
	    	}
	    	else{
	    		if($request->id==1 || !$request->id)
			    	$url= 'http://www.nettruyen.com/tim-truyen/'.$request->type.'?page='.$request->page.'&status='.$request->status.'&sort='.$request->sort.'&keyword='.$request->keyword;
				else
			    	$url= 'http://nhattruyen.com/the-loai/'.$request->type.'?page='.$request->page.'&status='.$request->status.'&sort='.$request->sort.'&keyword='.$request->keyword;
	    	}
    	}
    	//dd($url);
    	$html = file_get_html($url);
    	$items = $html->find('div.ModuleContent div.items div.row div.item');
	        $pagination = $html->find('ul.pagination li a');
	        if(!$pagination){
		        $pagination=null;
		        $url_last_page =null;
		        $last_page_number =null;
		    }
		    else{
		        $url_last_page = $pagination[count($pagination)-1]->href;
		        $last_page_number = substr($url_last_page, strpos($url_last_page, "=") + 1);
		    }
	        if(!$items){
	        	$Manga = null;
	        }
	        else{
	        	$i=0;
		        foreach($items as $key){
		        	$Manga[$i] = new Manga();
		            $url = $key->find('a');
		            $name = $key->find('h3 a.jtip');
		           	$image = $key->find('figure.clearfix')[0]->find('div.image')[0]->find('a')[0]->find('img.lazy');
		            $view = explode(" ",trim($key->find('span.pull-left')[0]->plaintext));
		            $last_chapter = $key->find('figure.clearfix figcaption ul li.chapter a')[0];

		            $Manga[$i]->name = $name[0]->innertext;
	            	$Manga[$i]->slug = substr($url[0]->href, strpos($url[0]->href, "truyen-tranh") + 13);
	            	$Manga[$i]->url = $url[0]->href;
	            	$Manga[$i]->views = $view[0];
		            $Manga[$i]->follow = $view[4];
		            $Manga[$i]->image = $image[0]->getAttribute('data-original');
		            $Manga[$i]->description = $key->find('div.box_tootip div.box_li div.box_text')[0]->innertext;
		            $Manga[$i]->addition_info = $key->find('div.box_tootip div.box_li div.message_main')[0]->innertext;
		            $Manga[$i]->last_chapter['slug'] = substr($last_chapter->href, strpos($last_chapter->href, "truyen-tranh") + 13);
		            $Manga[$i]->last_chapter['name'] = $last_chapter->innertext;
		            $Manga[$i]->last_chapter['?time_ago'] = $key->find('figure.clearfix figcaption ul li.chapter i.time')[0]->innertext;
	            	$host = parse_url($url[0]->href)['host'];
		            if($host=='www.nettruyen.com')
		                $Manga[$i]->source = 1;
		            else if($host=='nhattruyen.com')
		                $Manga[$i]->source = 2;
	            	$i++;
		        }
	        }
        //dd($Manga);
        return view('wibcomi.manga.category',compact('Manga','pagination','last_page_number','keyword'));
        
    }
    public function detail_manga($slug,Request $request){
    	//dd($slug);
        if($request->id==1)
            $html = file_get_html('http://www.nettruyen.com/truyen-tranh/'.$slug);
        if($request->id==2)
            $html = file_get_html('http://nhattruyen.com//truyen-tranh/'.$slug);
        $main = $html->find('div.row');
        $name = $main[0]->find('article h1.title-detail');
        $author = $html->find('ul li.author p.col-xs-8');
        $status = $main[0]->find('ul li.status p.col-xs-8');
        $image = $main[0]->find('div.detail-info div.col-image img');
        $category = $main[0]->find('ul li.kind p.col-xs-8 a');
        $chapters = $main[0]->find('ul li div.chapter');
        $rate = $main[0]->find('div.rating div.col-sm-6');
        $description = $main[0]->find('div.detail-content p');
        $views = $main[0]->find('ul.list-info li.row p.col-xs-8');
        $follow = $main[0]->find('div.follow span b');
        //$slug = substr($slug, strpos('truyen.com/the-loai/', "=") + 1);  

        $Manga_detail = new Manga_detail();
        $Manga_detail->name = $name[0]->innertext;
        $Manga_detail->slug = $slug;
        $Manga_detail->author = $author[0]->innertext;
        $Manga_detail->status = $status[0]->innertext;
        $Manga_detail->image = $image[0]->src;
        $Manga_detail->description = $description[0]->innertext;
        $Manga_detail->views = $views[count($views)-1]->innertext;
        $Manga_detail->follow = $follow[0]->innertext;
        $Manga_detail->url = url()->current();
        $Manga_detail->source = $request->id;
        $Manga_detail->rate = $rate[0]->innertext;
        foreach($category as $key=>$value){
            if($Manga_detail->source == 1) $slug_category = substr($value->href, strpos($value->href, 'tim-truyen') + 11);
            if($Manga_detail->source == 2) $slug_category = substr($value->href, strpos($value->href, 'the-loai') + 9);
            $Manga_detail->addCategory($key,$value->innertext,$slug_category);
        }
        foreach($chapters as $key=>$value){
            $slug_chap = substr($value->find('a')[0]->href, strpos($value->find('a')[0]->href, 'truyen-tranh') + 13);
            $Manga_detail->addChapter(
                $key,
                $value->find('a')[0]->innertext,
                $slug_chap,
                $value->parent()->find('div.col-xs-3')[0]->innertext,
                $value->parent()->find('div.col-xs-4')[0]->innertext
            );
        }
        //dd($Manga_detail);
        return view('wibcomi.manga.manga',compact('Manga_detail'));
    }
    public function read_manga(Request $request, $slug,$chap,$code){
        $scrapt_string = $slug.'/'.$chap.'/'.$code;
        if($request->id==1)
            $html = file_get_html('http://www.nettruyen.com/truyen-tranh/'.$scrapt_string);
        if($request->id==2)
            $html = file_get_html('http://nhattruyen.com//truyen-tranh/'.$scrapt_string);

        $url = $html->find('h1.txt-primary')[0]->find('a')[0]->href;
        $url = file_get_html($url);
        $allpages = $html->find('div.reading div.reading-detail div.page-chapter img');
        $chapters = $url->find('ul li div.chapter');
        $Manga = new Manga_reading_mode();
        $taga = $html->find('h1.txt-primary')[0]->find('a')[0];
        $Manga->slug = substr($taga->href, strpos($taga->href,'truyen-tranh') + 13);
		$Manga->manga = $taga->innertext;
        $Manga->name = $Manga->manga.' '.$html->find('h1.txt-primary')[0]->find('span')[0]->innertext;
        $Manga->source = $request->id;
        $Manga->chapter_slug=$scrapt_string;
        $i=0;
        foreach($allpages as $key){
        	$host = parse_url($key->getAttribute('data-original'))['host'];
   			//$data = imagecreatefromstring(file_get_contents($key->getAttribute('data-original'));
   			//dd($data);
   			if(strpos($host,'bp.blogspot.com') !== false ||
   			 	strpos($host,'images8.intercomics')!== false
   			 ){
   				$image = str_replace('+','%2B',$key->getAttribute('data-original'));
   				$Manga->pages[$i]['url'] = $image;
   			}
   			else{
   				$image = str_replace('+','%2B',$key->getAttribute('data-original'));
   				$Manga->pages[$i]['url'] = 'https://tienmacomic.com/proxy/proxy.php?url='.$image;
   			}
            $Manga->pages[$i]['name'] = $key->getAttribute('alt');
            $i++;
        }
        $i=0;
        foreach($chapters as $key){
            $Manga->chapters[$i]['name'] = $key->find('a')[0]->innertext;
            $Manga->chapters[$i]['slug'] = substr($key->find('a')[0]->href, strpos($key->find('a')[0]->href,'truyen-tranh') + 13);
            if($scrapt_string == $Manga->chapters[$i]['slug']){
            	if(isset($chapters[$i+1])){
            		$Manga->prev_chapter_slug = substr($chapters[$i+1]->find('a')[0]->href, strpos($chapters[$i+1]->find('a')[0]->href,'truyen-tranh') + 13);
            	}
            	if(isset($chapters[$i-1])){
            		$Manga->next_chapter_slug = substr($chapters[$i-1]->find('a')[0]->href, strpos($chapters[$i-1]->find('a')[0]->href,'truyen-tranh') + 13);
            	}
            }
            $i++;
        }
      	//dd($Manga);
        return view('wibcomi.manga.read',compact('Manga'));
    }
    public function getHot_manga($url){
    	$items = file_get_html($url)->find('div.row');

   		$name = $items[0]->find('article h1.title-detail');
   		$image = $items[0]->find('div.detail-info div.col-image img');
        $category = $items[0]->find('ul li.kind p.col-xs-8 a');
        $description = $items[0]->find('div.detail-content p');

        $hot_manga = new Manga();
        $hot_manga->name = $name[0]->innertext;
        $hot_manga->slug = 'dao-hai-tac-9169';
        $hot_manga->description = $description[0]->innertext;
        $host = parse_url($url)['host'];
		if($host=='www.nettruyen.com')
		    $hot_manga->source = 1;
		else if($host=='nhattruyen.com')
		    $hot_manga->source = 2;
        $i=0;
        foreach($category as $key=>$value){
            if($hot_manga->source == 1) $slug_category = substr($value->href, strpos($value->href, 'tim-truyen') + 11);
            if($hot_manga->source == 2) $slug_category = substr($value->href, strpos($value->href, 'the-loai') + 9);
            $hot_manga->category[$i]['name']=$value->innertext;
            $hot_manga->category[$i]['slug']=$value->innertext;
            $i++;        
        }
        return $hot_manga;
    }
}
