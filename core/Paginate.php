<?php

namespace Core;

class Paginate {
	private $previous = "";
	private $next = "";
	private $list = "";
	private $lastPage;
	private $currentPage;
	private $path;

	private function __construct($currentPage, $lastPage, $path)
	{
		$this->lastPage = $lastPage;
		$this->currentPage = $currentPage;
		$this->path = $path;
	}

	public static function make($currentPage, $lastPage, $path)
	{
		if ($lastPage == 1) return;
		$static = new static($currentPage, $lastPage, $path);
		$static->setPrevious();
		$static->setList();
		$static->setNext();
		return $static;
	}

	protected function setPrevious()
	{
		$currentPage = $this->currentPage - 1;
		if($this->currentPage > 1){
			$this->previous .= "<li class='previous'><a href='{$this->path}./{$currentPage}'><span class='fa fa-chevron-left'></span></a></li>";
		}
	}

	protected function setList()
	{
		for($i = 1; $i <= $this->lastPage; $i++)
		{
			$this->list  .= "<li";
			if($this->currentPage == $i)
				$this->list .= " class='active' ";
			$this->list .= "><a href='{$this->path}./{$i}'>{$i}</a></li>";				
		}
	}

	protected function setNext()
	{
		$currentPage = $this->currentPage + 1;
		if($this->currentPage < $this->lastPage)
			$this->next .= "<li class='next'><a href='{$this->path}./{$currentPage}'><span class='fa fa-chevron-right'></span></a></li>";	
	}

	public function __toString() {
		return "<ul class='pagination main-pagination'>".$this->previous.$this->list.$this->next."</ul>";
	}
}