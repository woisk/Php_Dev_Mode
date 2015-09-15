<?php
//数据对象映射模式
//行为型模式，一个对象对应一张表,如何创建提供访问任何数据源的对象
class baseDAO{
	
	protected $_db = null;
	public function __construct($config){
		$this->_db = new Mysql();
	}

	public function select(){

	}

	public function update($key,$value){

	}

	public function delete(){

	}

	public function insert(){

	}
}

class Member extends baseDAO{
	protected  $_table = 'member';

}


?>
