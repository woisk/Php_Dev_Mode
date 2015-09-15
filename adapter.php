<?php
//结构型
//适配者模式：将一个对象接口适配为另外一个对象所期望的接口,实现Adapter对象不仅是最佳做法，而且也能减少很多麻烦
//情型：目前的情况，存在一个report的类，report中只有msg，而msg中由ReportNumber和Content组成，在打印类中需要将number和content分别打印
class report{
	protected $msg;
	public function __construct($msg){
		$this->msg = $msg;
	}

	public function getMsg(){
		return $this->msg;
	}
}

class reportAdapter{
	protected $number;
	protected $content;
	public function __construct($msg){
		$msg = explode(":", $msg);
		if(!empty($msg)){
			$this->number = $msg[0];
			$this->content = $msg[1];
		}
	}

	public function getReportNumber(){
		return $this->number;
	}

	public function getReportContent(){
		return $this->content;
	}
}

class printReport{
	protected $report;
	public function __construct($report){
		$this->report = $report;
	}

	public function printReportNumber(){
		echo $this->report->getReportNumber();
	}

	public function printReportContent(){
		echo $this->report->getReportContent();
	}
}

$print = new printReport(new reportAdapter("1:error"));
$print->printReportNumber();
$print->printReportContent();

//在此例子中，reportAdapter实现了printReport所期望的接口

?>