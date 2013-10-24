<div class="container">
	<div class="row well">
		<form action="preview" method="POST" class="span8 ad-insert form">
			<div class="col-lg-4">
				<div class="form-group">
					<label>Kuulutaja nimi</label>
					<input name="data[fullname]" type="text" class="span3 form-control" placeholder="Kuulutaja nimi" required="required">
				</div>
				<div class="form-group">
					<label>E-mail</label>
					<input name="data[mail]" type="text" class="span3 form-control" placeholder="Meil">
				</div>
				<div class="form-group">
					<label>Telefon</label>
					<input name="data[phone]" type="text" class="span3 form-control" placeholder="Telefon" required="required">
				</div>
				<div class="form-group">
					<label>Pealkiri</label>
					<input name="data[title]" type="text" class="span3 form-control" placeholder="Pealkiri" required="required">
				</div>
				<div class="form-group">
					<label>Hind</label>
					<input name="data[price]" type="text" class="span3 form-control" placeholder="Hind" required="required">
				</div>
				<div class="form-group">
					<label>Asukoht</label>
					<input name="data[location]" type="text" class="span3 form-control" placeholder="Asukoht" required="required">
				</div>
				<div class="form-group">
					<label>Kategooria</label>
					<select id="category" name="data[category]" class="span3 form-control" required="required">
						<option selected=""></option>
						<? foreach($cats as $cat): ?>
							<option value="<?=$cat['category_id'] ?>"><?=$cat['category_name'] ?></option>
						<? endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label>Lisa pilt</label>
					<input name="data[image]" type="file" class="span3">
				</div>
			</div>
			<div class="col-lg-8 pull-right">
				<label>Kuulutus</label>
				<textarea name="data[text]" id="message" class="input-xlarge  form-control" rows="10" required="required"></textarea>
				<button type="preview" class="btn btn-primary ">Kuulutus valmis</button>
			</div>
		</form>
	</div>
</div>
