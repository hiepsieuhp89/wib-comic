<?php

namespace App;

class Manga{
	public $name = null;
	public $slug = null;
	public $url = null;
	public $views = 0;
	public $follow = 0;
	public $image = null;
	public $source = null;
	public $category = null;
	public $status = null;
	public $description = null;
	public $last_chapter = null;


	public function __construct(){
		$this->name = null;
		$this->slug = null;
		$this->url = null;
		$this->views = 0;
		$this->follow = 0;
		$this->image = null;
		$this->source = null;
		$this->category = null;
		$this->status = null;
		$this->description = null;
		$this->last_chapter = null;
	}
}
