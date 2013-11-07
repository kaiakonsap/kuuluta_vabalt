<?php
/**
 * Created by PhpStorm.
 * User: hennotaht
 * Date: 7/29/13
 * Time: 21:48
 */

class log_actions extends Controller {
	public $requires_login=true;
	function index(){
		header('Location: '.BASE_URL);
	}
	function logout(){
		session_destroy();
		header('Location: '.BASE_URL);
	}
}