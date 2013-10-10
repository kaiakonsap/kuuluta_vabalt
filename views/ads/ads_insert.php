<form method="POST" class="well span8">
	<div class="row">
		<div class="span3">
			<label>Pealkiri</label>
			<input name="title" type="text" class="span3" placeholder="Pealkiri">
			<label>E-mail</label>
			<input name="mail" type="text" class="span3" placeholder="Telefon">
			<label>Telefon</label>
			<input name="phone" type="text" class="span3" placeholder="Telefon">
			<label>Kategooria</label>
			<select id="category" name="category" class="span3">
				<option value="vehicles" selected="">Sõidukid</option>
				<option value="property">Kinnisvara</option>
				<option value="home">Kodu</option>
				<option value="electronics">Elektroonika</option>
			</select>
		</div>
	<div class="span5">
		<textarea name="text" id="message" class="input-xlarge span5" rows="10"></textarea>
		<label>Kuulutus</label>
	</div>
		<button type="submit" class="btn btn-primary pull-right">Send</button>

</form>
