<div class="container">
	<div class="row">
		<div class="col-md-4">
			<img width="320px" alt="140x140" src="http://lorempixel.com/140/140/" />
		</div>
		<div class="col-md-8">
			<div class="row-fluid">
				<div class="col-md-3">
					<img alt="140x140" src="http://lorempixel.com/140/140/" />
				</div>
				<div class="col-md-3">
					<img alt="140x140" src="http://lorempixel.com/140/140/" />
				</div>
				<div class="col-md-3">
					<img alt="140x140" src="http://lorempixel.com/140/140/" />
				</div>
				<div class="col-md-3">
					<img alt="140x140" src="http://lorempixel.com/140/140/" />
				</div>
			</div>
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
			<button type="button" class="btn btn-info btn-xs "><?=$categories[$ads['ad_category']]?></button>
		</div>
		<div class="col-md-4">
			<p><?=$ads['ad_time']?></p>
		</div>
	</div>
</div>