<style>
	.clearfix {
		margin-bottom:4px;
}
	.thumbnails{
		list-style-type:none;
	}

	.alert {
		text-align: center;
	}
    #filter {
        text-align: center;
        float:right;
    }
</style>

<div class="container">
    <form method="POST" id="filter" class="list-group" > <!--class="list-group"-->
    <?php
        foreach ($sort_cat_names as $cat_name => $title) {
            if ($cat_name === $sort_cat){ echo " <button name=".$cat_name." class='btn btn-primary'>".$title."</button> "; }
            else { echo " <button name=".$cat_name." class='btn btn-default'> ".$title."</button> "; }
        }
    ?>
    </form>

	<?php if (isset($_SESSION['adInsertSuccess'])): ?>
		<div class="alert alert-success">
			<p><?php echo $_SESSION['adInsertSuccess']; ?></p>
		</div>
		<?php unset($_SESSION['adInsertSuccess']); ?>
	<?php endif; ?>
</div>

<?foreach($ads as $ad):
    $images = explode(",", $ad['ad_image']);
    if ($images[0] == NULL) { $images[0] =  ASSETS_URL."images/no-image.jpg"; }
?>

<div class="container">
	<ul class="thumbnails">
		<li class="col-md-12 clearfix" >
			<div class="thumbnail clearfix">
				<img src="<?=$images[0]?>" alt="KUULUTUSE PILT" class="pull-left col-md-2 clearfix" style='margin-right:10px'>
				<div class="caption" class="pull-left">
					<span class="btn btn-primary icon  pull-right"><?=$ad['ad_price']?>€</span>
					<h4>
						<a href="<?=BASE_URL?>ads/view/<?=$ad['ad_id']?>" ><?=$ad['ad_title']?></a>
					</h4>
					<small><?=$ad['ad_text']?></small>
				</div>
				<a href="<?=BASE_URL?>categories/index/<?=$categories[$ad['ad_category']]?>" ><span class="label label-info"><?=$categories[$ad['ad_category']]?></span></a>
			</div>
		</li>
	</ul>
</div>
<?endforeach?>