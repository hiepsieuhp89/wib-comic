<?php

namespace App;

class Manga_detail{
	public $name = null;
	public $slug = null;
	public $author = null;
	public $status = 0;
	public $image = 0;
	public $description = null;
	public $views = null;
	public $follow = null;
	public $url = null;
	public $source = null;
	public $rate = null;
	public $category = null;
	public $chapters = null;

	public function __construct(){
		$this->name = null;
		$this->slug = null;
		$this->author = null;
		$this->status = 0;
		$this->image = 0;
		$this->description = null;
		$this->views = null;
		$this->follow = null;
		$this->url = null;
		$this->source = null;
		$this->rate = null;
		$this->category = null;
		$this->chapters = null;

	}
	public function addCategory($key,$name,$slug){
		$this->category[$key]['name'] = $name;
		$this->category[$key]['slug'] = $slug;
	}
	public function addChapter($key,$name,$slug,$views,$date_update){
		$this->chapters[$key]['name'] = $name;
		$this->chapters[$key]['slug'] = $slug;
		$this->chapters[$key]['views'] = $views;
		$this->chapters[$key]['date_update'] = $date_update;

	}
}
