<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kaia.konsap
 * Date: 10.10.13
 * Time: 17:43
 * To change this template use File | Settings | File Templates.
 */

class ads extends Controller {
	function index(){

	}
	function insert(){
		$this->cats = get_all("SELECT * FROM category");

		if(isset($_POST) && !empty($_POST)):
			$data["ad_title"]=trim($_POST["title"]);
			$data["ad_text"]=trim($_POST["text"]);
			$data["ad_phone"]=trim($_POST["phone"]);
			$data["ad_category"]=trim($_POST["category"]);
			$data["ad_publisher_name"]=trim($_POST["fullname"]);
			$data["ad_price"]=trim($_POST["price"]);
			$data["ad_location"]=trim($_POST["location"]);
			if(isset($_POST["mail"])):
				$data["ad_mail"]=trim($_POST["mail"]);
			endif;
			if(isset($_POST["image"])):
				$data["ad_image"]=ASSETS_URL."images/".$_POST["image"];
			endif;
			insert("ad", $data);
		endif;
	}
	function view(){

}
	function lists(){

	}
	function preview() {

	}
}