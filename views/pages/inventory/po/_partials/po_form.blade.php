<tr data-row="0">
	<td class="col-md-1"><input type="number" name="qty[]" required></td>
	<td class="col-md-2">
		{{ Form::select('inventory_id[]', $inventory_id,
			Input::old('inventory_id')
		) }}
	</td>
	<td class="col-md-2">
		<input type="text" name="unit_price[]">
	</td>
	<td class="col-md-1"><input type="text" name="vat[]"></td>
	<td class="col-md-3">
		{{ Form::select('cost_center_id[]', $cost_center_id,
			Input::old('cost_center_id')
		) }}
	</td>
	<!--td class="col-md-3">
		<select name="cost_center_id[]" data-row="0" required>
			<option value="">Choose</option>
			
		</select>
	</td-->
	
	<td class="col-md-2"><button class="btnDeleteItem"  type="button" data-row="0">Delete</button></td>
</tr>