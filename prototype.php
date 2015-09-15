<?php
//原型模式，用于出来创建成本较高或者初始信息相对不变的对象
class student{
	public function __construct($class,$school,$teacherName,$id){
		$this->class = $class;
		$this->school = $school;
		$this->teacherName = $teacherName;
		$this->id = $id;
	}

	public $class;
	public $school;
	public $teacherName;
}

$studentA = new student(1,2,3,4);
$studentB = clone $studentA;

var_dump($studentA);
var_dump($studentB);
//两个学生拥有相同的班级、学校、老师名字的，所以可以采用原形模式，获取一份原对象的拷贝,初始化信息相对不变的情况下

$studentA->id = 1;
$studentB->id = 2;
var_dump($studentA);
var_dump($studentB);

?>