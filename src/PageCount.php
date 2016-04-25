<?php
class PageCount{
	private $page = 1;
	private $pageCount = 10;
	
	public function setPage($_page){
		$this->page = $_page;
	}
	
	public function getPage() {
		return $this->page;
	}
	
	public function setPageCount($_pageCount) {
		$this->pageCount = $_pageCount;
	}
	
	public function getPageCount() {
		return $this->pageCount;
	}
}
?>