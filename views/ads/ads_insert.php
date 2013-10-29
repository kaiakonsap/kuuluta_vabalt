<div class="container">
	<div class="row well">
		<form action="preview" method="POST" class="form-group ad-insert">
			<div class="col-lg-4">
				<div class="form-group">
					<label>Kuulutaja nimi</label>
					<input name="data[ad_publisher_name]" type="text" class="span3 form-control" placeholder="Kuulutaja nimi"
					       required="required">
				</div>
				<div class="form-group">
					<label>E-mail</label>
					<input name="data[ad_mail]" type="text" class="span3 form-control" placeholder="Meil">
				</div>
				<div class="form-group">
					<label>Telefon</label>
					<input name="data[ad_phone]" type="text" class="span3 form-control" placeholder="Telefon" required="required">
				</div>
				<div class="form-group">
					<label>Pealkiri</label>
					<input name="data[ad_title]" type="text" class="span3 form-control" placeholder="Pealkiri"
					       required="required">
				</div>
				<div class="form-group">
					<label>Hind</label>
					<input name="data[ad_price]" type="text" class="span3 form-control" placeholder="Hind" required="required">
				</div>
				<div class="form-group">
					<label>Asukoht</label>
					<input name="data[ad_location]" type="text" class="span3 form-control" placeholder="Asukoht" required="required">
				</div>
				<div class="form-group">
					<label>Kategooria</label>
					<select id="category" name="data[ad_category]" class="span3 form-control" required="required">
						<option selected=""></option>
						<? foreach($cats as $cat): ?>
							<option value="<?=$cat['category_id'] ?>"><?=$cat['category_name'] ?></option>
						<? endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label>Lisa pilt</label>
					<input name="data[ad_image]" type="file" class="span3">
				</div>
			</div>
			<div class="col-lg-8 form-group">
				<label>Kuulutus</label>
				<textarea name="data[ad_text]" id="message" class="input-large form-control" rows="10" required="required"></textarea>
				<button type="submit" name="preview" class="btn btn-primary btn-lg">Kuulutus valmis</button>
			</div>
		</form>
	</div>
</div>
