<?php

namespace App;

class Manga_reading_mode{
	public $slug = null;
	public $manga = null;
	public $chapters = null;
	public $pages = null;
	public $source = null;
	public $chapter_slug = null;
	public $name = null;
	public $next_chapter_slug = null;
	public $prev_chapter_slug = null;

	public function __construct(){
		$this->slug = null;
		$this->manga = null;
		$this->chapters = null;
		$this->pages = null;
		$this->source = null;
		$this->chapter_slug = null;
		$this->name = null;
		$this->next_chapter_slug = null;
		$this->prev_chapter_slug = null;
	}
}
