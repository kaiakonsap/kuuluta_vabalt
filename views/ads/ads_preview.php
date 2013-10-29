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
					<h1><?=$data["ad_title"]?></h1>
					<p><?=$data["ad_text"]?></p>
				</div>
				<div class="col-md-6">
					<button type="button" class="btn btn-primary icon pull-center"><?=$data["ad_price"]?> €</button>
					<p>Telefoni number: <?=$data["ad_phone"]?></p>
					<p>Email: <?=$data["ad_mail"]?></p>
					<p><?=$data["ad_publisher_name"]?></p>
					<p>Asukoht: <?=$data["ad_location"]?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:15px;">
		<div class="col-md-8">
			<button type="button" class="btn btn-info btn-xs "><?=$category["category_name"]?></button>
		</div>

	</div>
	<div class="row">
		<div class="btn-bar well col-lg-12">
				<button type="button" class="btn btn-primary btn-lg"><a href="javascript:history.go(-1)">Tagasi kuulutust muutma</a></button>
			<form method="POST">
				<input type="submit" name="submit" value="Lisa kuulutus" class="btn btn-primary btn-lg">
			</form>
		</div>
	</div>
</div>