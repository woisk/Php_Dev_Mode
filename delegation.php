<?php
//委托模式
//行为型：为了除去核心对象的复杂性，并且能够动态的添加新的功能，就应当使用委托设计模式
//委托模式不通过极大依赖于通过评估条件而执行特定的功能性的对象一样，基于委托模式的对象能够将判决委托给不同的对象

class MP3playlistDelegate{
	public function getPlayList($songs){
		if(is_array($songs) && !empty($songs)){
			foreach ($songs as $key => $value) {
				echo $value['song'];
			}
		}
	}
}

class Player{
	private $_playobj;
	private $_songs = array();
	public function __construct($type){
		$str = $type.'playlistDelegate';
		$this->_playobj = new $str;
	}

	public function addSong($location,$song){
 		array_push($this->_songs,array('location' => $location, 'song' => $song));
	}

	public function getPlayList(){
		$this->_playobj->getPlayList($this->_songs);
	}
}

$player = new Player('MP3');
$player->addSong('1','1');
$player->addSong('2','2');
$player->addSong('3','3');
$player->addSong('4','4');
$player->getPlayList();

?>