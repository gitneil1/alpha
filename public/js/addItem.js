$(document).ready(function() {
	// when the add button is clicked
	$("#btnAddItem").click(function() {
		// find the last row
		var lastRow = $('table').find('tr:last');
		// get the row number
		var rowNumber = lastRow.data('row');
		// clone the row and add 1 to its data-row attribute
		var newRow = lastRow.clone().attr('data-row', rowNumber + 1)
		// empty the inputs and select
		var newRow = newRow.find('input, select').val('').end();
		// add 1 to the data-row attribute of the delete button
		var newRow = newRow.find('button, .selMaterial').attr('data-row', rowNumber + 1).end();
		// increment the rowNumber
		rowNumber = rowNumber + 1;
		// append the cloned row to the last row
		lastRow.after(newRow);
	});

	// when the delete button is clicked
	$('table').on('click', '.btnDeleteItem', function() {
		// get the row number of the button
		var rowNumber = $(this).data('row');
		// delete the table row based on the row number of the button
		$('table tr[data-row="' + rowNumber + '"]').remove();
	});
})