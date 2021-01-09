$(document).ready(function() {

	// Global Data
	globalData();

	// Data Indonesia
	dataIndonesia();
	dataProvince();

	// Auto Refresh
	setInterval(function() {
		globalData();
		dataIndonesia();
		dataProvince();
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

					$('#cases').html(cases);
					$('#deaths').html(deaths);
					$('#recovered').html(recovered);
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

					if (json.length > 0) {
						for (var i = 0; i < json.length; i++) {
							var stateData = json[i];
							var countryName = stateData.country;

							if (countryName === 'Indonesia') {
								var cases = stateData.cases;
								var deaths = stateData.deaths;
								var recovered = stateData.recovered;

								$('#data-indonesia').html(
									'Cases: ' + cases + '<br> Deaths: ' + deaths + '<br> Recovered: ' + recovered
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

	function dataProvince() {
		$.ajax({
			url: 'curl.php',
			type: 'GET',
			success: function(data) {
				try {
					$('#data-province').html(data);
				} catch {
					alert('Error');
				}
			}
		});
	}
});