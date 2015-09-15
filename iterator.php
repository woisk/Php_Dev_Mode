<?php
//行为型
//迭代器模式，用于构造特定的对象，提供单一标准接口，来补足遍历的需求，用于处理要计数和可遍历数的时候
class CD{
	protected $name;
	protected $price;

	public function setName($name){
		$this->name = $name;
	}

	public function setPrice($price){
		$this->price = $price;
	}
}

class CDIterator implements Iterator{
	protected $position;
	protected $cds = array();
	public function __construct(){
		$this->position = 0;
		//获取cd对象
		mysql_connect('127.0.0.1','root','123');
		mysql_select_db('test');
		$query = mysql_query('select * from cd');
		if(is_resource($query) && !empty($query)){
			while($arr = mysql_fetch_array($query)){
				$cd =  new CD();
				$cd->setName($arr['name']);
				$cd->setPrice($arr['price']);
				array_push($this->cds, $cd);
			}
		}
	}

	public function next(){
		++$this->position;
	}	

	public function current(){
		return $this->cds[$this->position];
	}

	public function prev(){
		--$this->position;
	}

	public function rewind(){
		$this->position = 0;
	}

	public function key(){
		return $this->position;
	}

	public function valid(){
		return isset($this->cds[$this->position]);
	}	
}

//实现了迭代器接口，可以对CDIterator进行遍历
foreach ($CDIterator as $key => $value) {
	var_dump($key,$value);
}

?>