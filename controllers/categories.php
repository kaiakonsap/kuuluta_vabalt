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
		$this->ads = get_all("SELECT * FROM ad");
	}
	function preview() {

	}
}