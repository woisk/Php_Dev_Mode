<?php
//行为型
//代理模式：代理模式跟我们PC上用的代理道理一样，主要是在我们电脑和远程站点之间加了一层代理，可以使访问透明，截取或者代理这两个对象之间的访问,过滤或增强两个对象之间的通信
class cd{
	
	protected $title = null;
	protected $band = null;
	public function __construct($title,$band){
		$this->title = $title;
		$this->band = $band;
	}

	public function buy(){
		$sql = 'update num = num - 1 where title = '.$this->title.' and band = '.$this->band;
		mysql_query($sql);
	}

	protected function _connect(){
		mysql_connect('A','root','123456');
		mysql_select_db('cds');
	}
}

//hangzhoucd,基于代理模式的新对象
class hangzhoucd extends cd{
	protected function _connect(){
		mysql_connect('B','root','123456');
		mysql_select_db('cds');
	}
}

?>