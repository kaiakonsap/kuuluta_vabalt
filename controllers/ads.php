<?php


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
		$this->categories = get_all("SELECT * FROM category");
		$cat =  array();
		foreach($this->categories as $ct){
			$cat[$ct["category_id"]]=$ct["category_name"];
		}
		$this->categories = $cat;

	}
	function lists(){
		$this->ads = get_all("SELECT * FROM ad" );
		$this->categories = get_all("SELECT * FROM category");
		$cat =  array();
		foreach($this->categories as $ct){
			$cat[$ct["category_id"]]=$ct["category_name"];
		}
		$this->categories = $cat;

	}
	function preview() {
		/**
		Vaja ifid üksteise sisse ja ja previews näitab ka pilti
		 */
		if(isset($_POST["preview"]) && !empty($_POST)){
			foreach ($_POST["data"] as $element_name=>$element_value) {
				$_SESSION["preview_data"][$element_name]=trim($element_value);
			}
			$id=$_SESSION["preview_data"]["ad_category"];
			$this->category=get_one("SELECT category_name FROM category WHERE category_id='$id'");
			if (!empty($_FILES["ad_image"]))
			{
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["ad_image"]["name"]);
				$extension = end($temp);
				if ((($_FILES["ad_image"]["type"] == "image/gif")
						|| ($_FILES["ad_image"]["type"] == "image/jpeg")
						|| ($_FILES["ad_image"]["type"] == "image/jpg")
						|| ($_FILES["ad_image"]["type"] == "image/pjpeg")
						|| ($_FILES["ad_image"]["type"] == "image/x-png")
						|| ($_FILES["ad_image"]["type"] == "image/png"))
					&& ($_FILES["ad_image"]["size"] < 2000000)
					&& in_array($extension, $allowedExts))
				{
					if ($_FILES["ad_image"]["error"] > 0)
					{
						echo "Return Code: " . $_FILES["ad_image"]["error"] . "<br>";
					}
					else
					{
						if (file_exists(ASSETS_URL . "images/" . $_FILES["ad_image"]["name"]))
						{
							echo $_FILES["ad_image"]["name"] . " already exists. ";
						}
						else
						{
							move_uploaded_file($_FILES["ad_image"]["tmp_name"],
								getcwd(). "/assets/images/" . $_FILES["ad_image"]["name"]);
							$_SESSION["preview_data"]["ad_image"]=ASSETS_URL . "images/" . $_FILES["ad_image"]["name"];
						}
					}
				}
				else
				{
					echo "Invalid file";
				}
			}
			if ($_FILES["ad_image"]["error"] > 0)
			{
				echo "Error: " . $_FILES["ad_image"]["error"] . "<br>";
			}
		}

		if(isset($_POST["submit"])){
			insert("ad", $_SESSION["preview_data"]);
			$_SESSION['adInsertSuccess'] = "<p><strong>Kuulutuse sisestamine õnnestus!</strong> Täname Teid koostöö eest!</p>";
			header('Location: '.BASE_URL.'/ads/lists/');
		}
	}
	function help() {
        $this->help = get_all("SELECT * FROM help");

        //TODO: Empty $_POST["new_question"] upon page refresh
        //TODO?: Give info on question limit
        if(!empty($_POST["new_question"]) && preg_match("/[a-zA-Z0-9]/",$_POST["new_question"])){
            $q = $_POST['new_question'];
            $question = ["help_new_q" => $q];
            insert("help_new", $question);
            $_SESSION['adInsertSuccess'] = "<strong>Küsimus saadeti ära!</strong>";
        }
    }
	function pricelist() {
		$this->pricelist = get_all("SELECT * FROM pricelist");
	}
}