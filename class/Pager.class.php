<?php
/***************************************************
* Last Modify: 2011/05/20 
* Description: 分頁器
****************************************************/
//require_once('../Anti-invasion.php');
class Pager
{
	private $result;
	private $page_size;
	private $current_page;
	private $result_count;
	function __construct($result, $page_size = 5, $current_page = 1){
		if( !isset($result) || $page_size <=0 ) throw new Exception('Pager construct error');
		$this->result = $result;
		$this->result_count = $result->num_rows;
		
			
		$this->set_page_size($page_size);
		$this->set_current_page($current_page);
		
	}
	
	function is_last_page()
	{
		return $this->get_current_page() == $this->get_last_page();
	}
	
	function is_first_page()
	{
		return $this->get_current_page() == $this->get_first_page();
	}
	
	function goto_next_page()
	{
		
		if($this->current_page+1 > $this->get_last_page()) {
			$this->current_page = $this->get_last_page();
			return false;
		}
		else {
			$this->current_page = $this->current_page+1;
			return true;
		}
	}
	
	function goto_prev_page()
	{
		if($this->current_page-1 < $this->get_first_page()) {
			$this->current_page = $this->get_first_page();
			return false;
		}
		else {
			$this->current_page = $this->current_page+1;
			return true;
		}
	}
	
	function goto_first_page()
	{
		$this->set_current_page($this->get_first_page());	
	}
	
	function goto_last_page()
	{
		$this->set_current_page($this->get_last_page());	
	}
	
	function get_current_page()
	{
		return $this->current_page;	
	}
	
	function get_page_size()
	{
		return $this->page_size;	
	}
	
	function get_first_page(){
		return 1;	
	}
	
	function get_last_page(){
		return ceil($this->result_count/$this->page_size);
	}
	
	function set_page_size($page_size)
	{
		$this->page_size = min($page_size, $this->result_count);
		if( $this->page_size == 0 )
			throw new Exception('Page size can\'t be 0');
	}
	
	function set_current_page($current_page)
	{
		$current_page = max($current_page, $this->get_first_page());
		$this->current_page = min($current_page, $this->get_last_page());
	}
	
	
	function get_result()
	{
		$this->result->data_seek(($this->current_page-1)*$this->page_size);
		
		$i = $this->page_size;
		$rows = array();
		while( ( $rows[] = $this->result->fetch_assoc() )  && --$i );
		if( $last = array_pop($rows) ) $rows[] = $last; //若最後一個是null就拿掉，否則加回去  
		return $rows;	
	}
	
	function show_pagination( $var = 'page', $style = 'quotes')
	{
		$path = '';
		echo '<div class="pagination '.$style.'"><ul>';
		if($this->get_current_page() == $this->get_first_page())
		{
			echo '<li><a class="disabled">第一頁</a></li>';
			echo '<li><a class="disabled">上一頁</a></li>';
		}
		else 
		{
			echo '<li><a href="'.$path.'?'.$var.'='.$this->get_first_page().'">第一頁</a></li>';
			echo '<li><a href="'.$path.'?'.$var.'='.($this->get_current_page()-1).'">上一頁</a></li>';
		}
		for($i=$this->get_first_page();$i<=$this->get_last_page();$i++)
		{
			if($i == $this->get_current_page())
				echo '<li class="current">'.$i.'</li>';
			else
				echo '<li><a href="'.$path.'?'.$var.'='.$i.'">'.$i.'</a></li>';	
				
		}
		if($this->get_current_page() == $this->get_last_page())
		{
			echo '<li><a class="disabled">下一頁</a></li>';
			echo '<li><a class="disabled">最後一頁</a></li>';
		}
		else 
		{
			echo '<li><a href="'.$path.'?'.$var.'='.($this->get_current_page()+1).'">下一頁</a></li>';
			echo '<li><a href="'.$path.'?'.$var.'='.$this->get_last_page().'">最後一頁</a></li>';
		}
		echo '</ul></div>';
	}
}
?>