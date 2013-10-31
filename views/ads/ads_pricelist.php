<div class="container">
		<table class="table table-hover">
			<thead>
				<tr class="warning">
					<th><h3>Teenus</h3></th>
					<th><h3>Hind</h3></th>
				</tr>
			</thead>
			<tbody>
				<?foreach($pricelist as $pricelist_row):?>
				<tr>
					<td><span class="service"><?=$pricelist_row['description']?></span></td>
					<td><span class="btn btn-primary"><?=$pricelist_row['price']?>€</span></td>
				</tr>
				<?endforeach?>
			</tbody>
		</table>
</div>
