$(document).ready(function() {

	// Call Function
	globalData();
	dataIndonesia();

	// Auto Refresh
	setInterval(function() {
		globalData();
		dataIndonesia();
	}, 3000);

	function globalData() {
		$.ajax({
			url: 'https://coronavirus-19-api.herokuapp.com/all',
			success: function(data) {
				try {
					var json = data;
					var cases = data.cases;
					var deaths = data.deaths;
					var recovered = data.recovered;
					var formatter = new Intl.NumberFormat('en');

					$('#cases').html(formatter.format(cases));
					$('#deaths').html(formatter.format(deaths));
					$('#recovered').html(formatter.format(recovered));
				} catch {
					alert('Error');
				}
			}
		});
	}

	function dataIndonesia() {
		$.ajax({
			url: 'https://coronavirus-19-api.herokuapp.com/countries',
			success: function(data) {
				try {
					var json = data;
					var html = [];
					var formatter = new Intl.NumberFormat('en');

					if (json.length > 0) {
						for (var i = 0; i < json.length; i++) {
							var stateData = json[i];
							var countryName = stateData.country;

							if (countryName === 'Indonesia') {
								var cases = stateData.cases;
								var deaths = stateData.deaths;
								var recovered = stateData.recovered;

								$('#data-indonesia').html(
									'Confirmed: <b>' + formatter.format(cases) + '</b><br> Deaths: <b>' + formatter.format(deaths) + '</b><br> Recovered: <b>' + formatter.format(recovered) + '</b>'
								)
							}
						}
					}
				} catch {
					alert('Error');
				}
			}
		});
	}
});