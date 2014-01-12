<link rel="stylesheet" href="<?=ASSETS_URL?>css/lightbox.css" type="text/css" />
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					<h1><?=$ads['ad_title']?></h1>
					<p><?=$ads['ad_text']?></p>
				</div>
				<div class="col-md-6">
					<button type="button" class="btn btn-primary icon pull-center"><?=$ads['ad_price']?>€</button>
					<p>Telefoni number: <?=$ads['ad_phone']?></p>
					<p>Email: <?=$ads['ad_mail']?></p>
					<p>Nimi: <?=$ads['ad_publisher_name']?></p>
					<p>Asukoht: <?=$ads['ad_location']?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:15px;">
		<div class="col-md-8">
			<a href= "<?=BASE_URL?>categories/index/<?=$categories[$ads['ad_category']]?>"><button type="button" class="btn btn-info btn-xs "  ><?=$categories[$ads['ad_category']]?></button></a>
		</div>
		<div class="col-md-4">
			<p><?=$ads['ad_time']?></p>
		</div>
	</div>
    <div id="imageSet" class="row">
    <?foreach($images as $index=>$img):
        if ($images[$index] == NULL) { $images[$index] =  ASSETS_URL."images/no-image.jpg"; }
        echo '<a href="'.$images[$index].'" class="lightboxTrigger">
            <img class="thumb" src="'.$images[$index].'" alt=""/></a>';
    endforeach?>
    </div>
</div>

<script src="<?=ASSETS_URL?>js/jquery-1.10.2.min.js"></script>
<script src="<?=ASSETS_URL?>js/lightbox.js"></script>
