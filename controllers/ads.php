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

        // FILTER ADS
        //Aktiivsed kuulutused vaikimisi eesõiguse (kes rohkem maksnud või pildiga; kat. "Kuulutused")või kuupäeva järgi ("viimati üles pandud")?
        $this->sort_cat_names = array("ad_price" => "Hind","ad_time" => "Kuupäev","ad_priority" => "Kuulutus");

        if(isset($_COOKIE['ad_listing'])) {
            $cookie_sort = explode(",", $_COOKIE['ad_listing']);
            $_SESSION['list_sort_cat'] = $cookie_sort[0];
            $_SESSION['list_sort_order'] = $cookie_sort[1]+0; //+0 to convert str into int
        }
        if(!isset($_SESSION['list_sort_cat'])) {
            $_SESSION['list_sort_cat'] = "ad_priority"; // Default category; To have the default category <button> on the rightmost side, shift the corresponding element to be the last in $sort_cat_names.
            $_SESSION['list_sort_order'] = SORT_DESC;
        }
        if(!isset($this->sort_cat)) { $this->sort_cat = $_SESSION['list_sort_cat']; }

        // Save category preference and sorting order
        foreach ($this->sort_cat_names as $cat_name => $title) {
            if (isset($_POST[$cat_name])) {
                if ($this->sort_cat === $cat_name) {
                    if ($_SESSION['list_sort_order'] === SORT_ASC) {$_SESSION['list_sort_order'] = SORT_DESC;}
                    else {$_SESSION['list_sort_order'] = SORT_ASC;}
                }
                else { $_SESSION['list_sort_order'] = SORT_ASC; }

                $_SESSION['list_sort_cat'] = $cat_name;
                $this->sort_cat = $_SESSION['list_sort_cat'];
                setcookie('ad_listing', $this->sort_cat.",".$_SESSION['list_sort_order'], time() + (86400 * 0.004)); // 86400 = 1 day; current ~5 min
                break;
            }
        }
        // Sort outer array after inner array values
        foreach($this->ads as $res) {
            $sortAds[] = $res[$this->sort_cat];
        }
        array_multisort($sortAds, $_SESSION['list_sort_order'], $this->ads);
        // END OF- FILTER ADS
	}
	function preview() {
        include("assets/captcha/simple_php_captcha.php");
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
                /* Security issue with 'type' in $_FILES["ad_image"]["type"] ?
                 * From http://www.php.net/manual/en/features.file-upload.post-method.php
                 * "This mime type is however not checked on the PHP side and therefore don't take its value for granted."
                 */
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
						if (file_exists(ASSETS_URL . "images/ads/" . $_FILES["ad_image"]["name"]))
						{
							echo $_FILES["ad_image"]["name"] . " already exists. ";
						}
						else
						{
							move_uploaded_file($_FILES["ad_image"]["tmp_name"],
								getcwd(). "/assets/images/ads/" . $_FILES["ad_image"]["name"]);
							$_SESSION["preview_data"]["ad_image"]=ASSETS_URL . "images/ads/" . $_FILES["ad_image"]["name"];
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

		if(isset($_POST["submit"]) && $_POST['captcha'] == $_SESSION['captcha']['code']){
			insert("ad", $_SESSION["preview_data"]);
			$_SESSION['adInsertSuccess'] = "<p><strong>Kuulutuse sisestamine õnnestus!</strong> Täname Teid koostöö eest!</p>";
			header('Location: '.BASE_URL.'/ads/lists/');
		}
	}
	function help() {
        $this->help = get_all("SELECT * FROM help");

        //TODO: Empty $_POST["new_question"] upon page refresh (don't resend the question)
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