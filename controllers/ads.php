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
		$this->categories = get_all("SELECT * FROM category");


	}
	function insert(){
		$this->cats = get_all("SELECT * FROM category");


	}
	function view(){
		$ad_id = $this->params[0];
		$this->ads = get_one("SELECT * FROM ad WHERE ad_id='$ad_id'");
}
	function lists(){
		$this->ads = get_all("SELECT * FROM ad");
	}
	function preview() {
		if(isset($_POST["preview"]) && !empty($_POST)):
			foreach ($_POST["data"] as $element_name=>$element_value) {
				$_SESSION["preview_data"][$element_name]=trim($element_value);
			}
			$id=$_SESSION["preview_data"]["ad_category"];
			$this->category=get_one("SELECT category_name FROM category WHERE category_id='$id'");


		endif;
		if(isset($_POST["submit"])):
			insert("ad", $_SESSION["preview_data"]);
			header('Location: '.BASE_URL);
		endif;
	}
	function help() {

	}
	function pricelist() {

	}
}