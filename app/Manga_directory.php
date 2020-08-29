<?php

namespace App;

class Manga_directory{
	public $mangas = null;
	public $categorys = null;

	public function __construct(){
		$this->mangas = null;
		$this->categorys = null;
	}
	public function addCategory($key,$name,$slug){
		$this->categorys[$key]['name'] = $name;
		$this->categorys[$key]['slug'] = $slug;
	}
	public function addManga($key,$name,$slug,$image,$views,$latest_chapters,$url,$source){
		$this->mangas[$key]['name'] = $name;
		$this->mangas[$key]['slug'] = $slug;
		$this->mangas[$key]['views'] = $views;
		$this->mangas[$key]['image'] = $image;
		$this->mangas[$key]['url'] = $url;
		$this->mangas[$key]['source'] = $source;
		$this->mangas[$key]['latest_chapters'] = $latest_chapters;
	}
}
