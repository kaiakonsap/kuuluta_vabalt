<style>
	.clearfix {
		margin-bottom:4px;
}
	.thumbnails{
		list-style-type:none;
	}
</style>
<?foreach($ads as $ad):?>
<div class="container">
<ul class="thumbnails">
	<li class="col-md-12 clearfix" >
		<div class="thumbnail clearfix">
			<img src="http://www.vendelin.ee/photoblog/images/20100713233330_karu3.jpg" alt="ALT NAME" class="pull-left col-md-2 clearfix" style='margin-right:10px'>
			<div class="caption" class="pull-left">
				<span class="btn btn-primary icon  pull-right"><?=$ad['ad_price']?></span>
				<h4>
					<a href="<?=BASE_URL?>ads/view/<?=$ad['ad_id']?>" ><?=$ad['ad_title']?></a>
				</h4>
				<small><?=$ad['ad_text']?></small>
			</div>
			<a href="#"><span class="label label-info"><?=$ad['ad_category']?></span></a>
		</div>
	</li>
</ul>
</div>
<?endforeach?>