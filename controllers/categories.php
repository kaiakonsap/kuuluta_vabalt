<?php
/**
 * Created by JetBrains PhpStorm.
 * User: kaia.konsap
 * Date: 10.10.13
 * Time: 17:43
 * To change this template use File | Settings | File Templates.
 */

class categories extends Controller {
	function index(){

		$category_name = $this->params[0];
		$this->category = get_one ("SELECT * FROM category WHERE category_name='$category_name'");
		$category_id = get_one("SELECT category_id FROM category WHERE category_name='$category_name'");
		$category_id = $category_id['category_id'];
		$this->ads = get_all("SELECT * FROM ad WHERE ad_category='$category_id'");


	}
	function preview() {

	}
}