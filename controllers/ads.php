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
	}
	function lists(){
		$this->ads = get_all("SELECT * FROM ad");
	}
	function preview() {
		/**
		Vaja ifid üksteise sisse ja ja previews näitab ka pilti
		 */
		if(isset($_POST["preview"]) && !empty($_POST)):
			foreach ($_POST["data"] as $element_name=>$element_value) {
				$_SESSION["preview_data"][$element_name]=trim($element_value);
			}
			$id=$_SESSION["preview_data"]["ad_category"];

			$this->category=get_one("SELECT category_name FROM category WHERE category_id='$id'");
			if (!empty($_FILES["ad_image"]))
			{
				$_SESSION["preview_data"]["ad_image"]=ASSETS_URL . "images/" . $_FILES["ad_image"]["name"];
			}
			if ($_FILES["ad_image"]["error"] > 0)
			{
				echo "Error: " . $_FILES["ad_image"]["error"] . "<br>";
			}
			else
			{
				echo "Upload: " . $_FILES["ad_image"]["name"] . "<br>";
				echo "Type: " . $_FILES["ad_image"]["type"] . "<br>";
				echo "Size: " . ($_FILES["ad_image"]["size"] / 1024) . " kB<br>";
				echo "Stored in: " . $_FILES["ad_image"]["tmp_name"];
			}
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
					echo "Upload: " . $_FILES["ad_image"]["name"] . "<br>";
					echo "Type: " . $_FILES["ad_image"]["type"] . "<br>";
					echo "Size: " . ($_FILES["ad_image"]["size"] / 1024) . " kB<br>";
					echo "Temp file: " . $_FILES["ad_image"]["tmp_name"] . "<br>";

					if (file_exists(ASSETS_URL . "images/" . $_FILES["ad_image"]["name"]))
					{
						echo $_FILES["ad_image"]["name"] . " already exists. ";
					}
					else
					{
						move_uploaded_file($_FILES["ad_image"]["tmp_name"],
							getcwd(). "/assets/images/" . $_FILES["ad_image"]["name"]);
						echo "Stored in: " . getcwd(). "/assets/images/" . $_FILES["ad_image"]["name"];
					}
				}
			}
			else
			{
				echo "Invalid file";
			}




		endif;
		if(isset($_POST["submit"])):
			insert("ad", $_SESSION["preview_data"]);
			header('Location: '.BASE_URL);
		endif;
	}
	function help() {

	}
}