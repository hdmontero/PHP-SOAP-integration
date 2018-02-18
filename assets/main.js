jQuery(function(){
	
	// Create class to manage bussines logic
	var Requester = {

		table: $('table.table tbody'),
		
		// load data from server
		loadOperators: function (params){
			var self = this;
			$.ajax({
				url: '/routing.php',
				type: 'POST',
				dataType: 'json',
				data: {action: 'load_operators'}, 
				success: function(response){
					self.buildTableWithData(response);
					self.showAlert('info');
				},
				error: function(error){
					self.showAlert('error');
					self.hideSpinner();
				}
			});
		},

		// build table content with the passed data
		buildTableWithData: function(data) {
			var self = this;
			$.each(data, function(index, item){
				self.table.append(self.buildRow(item));
			});

			this.hideSpinner();
		},

		// hide spinner displayed while fetching data
		hideSpinner: function(){
			$('.spinner-container img').fadeOut();
		},

		// builds a row (tr) element
		buildRow: function(item) {
			theRow  = '<tr>';
			theRow += 	'<td data-name="country-iso">' + item.country.iso + '</td>';
			theRow += 	'<td data-name="country-name">' + item.country.name + '</td>';
			theRow += 	'<td data-name="operator-external-id">' + item.external_id + '</td>';
			theRow += 	'<td data-name="operator-name">' + item.name + '</td>';
			theRow += 	'<td><button class="btn btn-default btn-save">Add</button></td>';
			theRow += '</tr>';

			return theRow;
		},

		// save selected row data
		saveRowData: function(btnElement){
			var parentRow = btnElement.parents('tr');
			var data = {
				'operator_name': parentRow.find('td[data-name="operator-name"]').text(),
				'operator_external_id': parentRow.find('td[data-name="operator-external-id"]').text(),
				'country_name': parentRow.find('td[data-name="country-name"]').text(),
				'country_iso': parentRow.find('td[data-name="country-iso"]').text()
			}	
			// do actual save		
			this.doActualDataSave(data, btnElement);
		},
		
		// display messages in a friendly fashion
		showAlert: function(type){
			$('.alert').fadeOut(100);
			switch(type){
				case 'error':
					$('.alert.alert-danger').fadeIn();
					break;
				case 'info':
					$('.alert.alert-info').fadeIn();
					break;
				case 'success':
					$('.alert.alert-success').fadeIn();
					break;
			}
		},

		// do request to save data
		doActualDataSave: function(data, btnElement){
			var self = this;
			data.action = 'save_operator'; // append action param
			$.ajax({
				url: '/routing.php',
				type: 'POST',
				dataType:'json',
				data: data,
				success: function(response){
					if(response.error) {
						btnElement.prop('disabled', false);
						self.showAlert('error');
						return;	
					}
					btnElement.remove();
					self.showAlert('success');
				},
				error: function(a,b,c){
					self.showAlert('error');
				}
			});
		}
	}
	
	// on document loaded, bind events
	$(document).ready(function(){
		Requester.loadOperators();
		$('table.table').on('click', '.btn-save', function(){
			$(this).prop('disabled', true);
			Requester.saveRowData($(this));
		});
	});
});