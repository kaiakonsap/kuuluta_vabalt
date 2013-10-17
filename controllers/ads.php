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
			$data["ad_title"]=$_POST["title"];
			$data["ad_text"]=$_POST["text"];
			$data["ad_phone"]=$_POST["phone"];
			$data["ad_category"]=$_POST["category"];
			$data["ad_publisher_name"]=$_POST["fullname"];
			$data["ad_price"]=$_POST["price"];
			$data["ad_location"]=$_POST["location"];
			if(isset($_POST["mail"])):
				$data["ad_mail"]=$_POST["mail"];
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
}