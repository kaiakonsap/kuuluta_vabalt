<div class="container">
	<div class="row well">
		<form method="POST" class="span8 ad-insert form">
			<div class="col-lg-4">
				<div class="form-group">
					<label>Kuulutaja nimi</label>
					<input name="fullname" type="text" class="span3 form-control" placeholder="Kuulutaja nimi" required="required">
				</div>
				<div class="form-group">
					<label>E-mail</label>
					<input name="mail" type="text" class="span3 form-control" placeholder="Meil">
				</div>
				<div class="form-group">
					<label>Telefon</label>
					<input name="phone" type="text" class="span3 form-control" placeholder="Telefon" required="required">
				</div>
				<div class="form-group">
					<label>Pealkiri</label>
					<input name="title" type="text" class="span3 form-control" placeholder="Pealkiri" required="required">
				</div>
				<div class="form-group">
					<label>Hind</label>
					<input name="price" type="text" class="span3 form-control" placeholder="Hind" required="required">
				</div>
				<div class="form-group">
					<label>Asukoht</label>
					<input name="location" type="text" class="span3 form-control" placeholder="Asukoht" required="required">
				</div>
				<div class="form-group">
					<label>Kategooria</label>
					<select id="category" name="category" class="span3 form-control" required="required">
						<option selected=""></option>
						<? foreach($cats as $cat): ?>
							<option value="<?=$cat['category_id'] ?>"><?=$cat['category_name'] ?></option>
						<? endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label>Lisa pilt</label>
					<input name="image" type="file" class="span3">
				</div>
			</div>
			<div class="col-lg-8 pull-right">
				<label>Kuulutus</label>
				<textarea name="text" id="message" class="input-xlarge  form-control" rows="10" required="required"></textarea>
				<button type="submit" class="btn btn-primary ">Kuulutus valmis</button>
			</div>
			<button type="submit" class="btn btn-primary pull-left">Kuulutus valmis</button>

		</form>
	</div>
</div>
