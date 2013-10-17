<form method="POST" class="well span8 ad-insert">
	<div class="row">
		<div class="span3">
			<label>Kuulutaja nimi</label>
			<input name="fullname" type="text" class="span3" placeholder="Kuulutaja nimi" required="required">
			<label>E-mail</label>
			<input name="mail" type="text" class="span3" placeholder="Meil">
			<label>Telefon</label>
			<input name="phone" type="text" class="span3" placeholder="Telefon" required="required">
			<label>Pealkiri</label>
			<input name="title" type="text" class="span3" placeholder="Pealkiri" required="required">
			<label>Hind</label>
			<input name="price" type="text" class="span3" placeholder="Hind" required="required">
			<label>Asukoht</label>
			<input name="location" type="text" class="span3" placeholder="Asukoht" required="required">
			<label>Kategooria</label>
			<select id="category" name="category" class="span3" required="required">
				<option selected=""></option>

				<? foreach($cats as $cat): ?>
					<option value="<?=$cat['category_id'] ?>"><?=$cat['category_name'] ?></option>
				<? endforeach; ?>
			</select>
			<label>Lisa pilt</label>
			<input name="image" type="file" class="span3">
		</div>
	<div class="span5">
		<label>Kuulutus</label>
		<textarea name="text" id="message" class="input-xlarge span5" rows="10" required="required"></textarea>
	</div>
		<button type="submit" class="btn btn-primary pull-left">Kuulutus valmis</button>

</form>
