<?php

class testController extends Controller{


	public function index() {
		$model = $this->Model('Einkauf');
		$view = $this->View();
		$view->displayError();
		$view->displayHeader();
		$view->displayFooter();
	}
	public function second() {
		$abgelaufen = "06.22";
		$temp = '01.';
		$temp .= $abgelaufen;
		//echo $temp;
		$temp2 = substr($temp, -2, 2);
		$temp4 = substr($temp, 0, 6);
		$temp3 = "20".$temp2;
		$abgelaufen = $temp.$temp3;
		//echo $abgelaufen;
		echo $temp4.$temp3;

		//echo strtotime("09.10.2015")."<br />";



	}
	public function sorting(){
	$model = $this->Model('Einkauf');
 $data = $model->getAll();
//dnd($data);
	dnd(sorting_down($data, 'shop_id'));
}


public function zeit() {


	$model = $this->Model('Truhe');
	$date = "23.06.1992";
	$model->datetoTimestamp($date);



}
public function test(){
	$a = 1;
	if ($a == true) echo "haha";
}
}
