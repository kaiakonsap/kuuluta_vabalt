<div class="container">
	<div class="row">
		<div class="slogan">
			<h1 class="text-center text-info">Sinu vana on kellegi uus!</h1>
		</div>
	</div>
	<a href="<?=BASE_URL?>ads/insert"><div style="text-align:center;" class="alert alert-info"><strong>Kuuluta vabalt!</strong></div></a>

		<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						<a href="#" class="list-group-item active">Categories</a>
					<?foreach ($categories as $category):?>
						<a href="<?=BASE_URL?>categories/index/<?=$category['category_name']?>" class="list-group-item"><?=$category['category_name']?></a>
					<? endforeach?>
					</div>
				</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-4">
						<img src="http://www.mormonshare.com/sites/default/files/handouts/cg_banner-blank.gif" class="img-responsive" alt="Responsive image">
						<h1>Hello, world!</h1>
						<p>...</p>
						<p><a class="btn btn-primary btn-sm">Learn more</a></p>
					</div>
					<div class="col-md-4">
						<img src="http://www.mormonshare.com/sites/default/files/handouts/cg_banner-blank.gif" class="img-responsive" alt="Responsive image">
						<h1>Hello, world!</h1>
						<p>...</p>
						<p><a class="btn btn-primary btn-sm">Learn more</a></p>
					</div>
					<div class="col-md-4">
						<img src="http://www.mormonshare.com/sites/default/files/handouts/cg_banner-blank.gif" class="img-responsive" alt="Responsive image">
						<h1>Hello, world!</h1>
						<p>...</p>
						<p><a class="btn btn-primary btn-sm">Learn more</a></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<img src="http://www.mormonshare.com/sites/default/files/handouts/cg_banner-blank.gif" class="img-responsive" alt="Responsive image">
						<h1>Hello, world!</h1>
						<p>...</p>
						<p><a class="btn btn-primary btn-sm">Learn more</a></p>
					</div>
					<div class="col-md-4">
						<img src="http://www.mormonshare.com/sites/default/files/handouts/cg_banner-blank.gif" class="img-responsive" alt="Responsive image">
						<h1>Hello, world!</h1>
						<p>...</p>
						<p><a class="btn btn-primary btn-sm">Learn more</a></p>
					</div>
					<div class="col-md-4">
						<img src="http://www.mormonshare.com/sites/default/files/handouts/cg_banner-blank.gif" class="img-responsive" alt="Responsive image">
						<h1>Hello, world!</h1>
						<p>...</p>
						<p><a class="btn btn-primary btn-sm">Learn more</a></p>
					</div>
				</div>
			</div>
		</div>

</div>
