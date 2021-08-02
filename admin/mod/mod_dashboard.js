$.ajax({
    url: url + '/administrator/dashboard/getGrafikPenjualan',
    dataType: 'json',
    success: function(data){
		var dataLabels = [];
		var dataItem = [];

        $.each(data, function(key, val){
			dataLabels.push(val.tgl);
			dataItem.push(val.total);
		})

		var chart    = document.getElementById('myChart').getContext('2d'),
			gradient = chart.createLinearGradient(0, 0, 0, 450);
		
		gradient.addColorStop(0, 'rgba(87, 150, 255, .9)');
		gradient.addColorStop(0.5, 'rgba(87, 150, 255, .1)');
		gradient.addColorStop(1, 'rgba(87, 150, 255, 0)');
		
		var data  = {
			labels: dataLabels,
			datasets: [{
				label: 'Grafik Penjualan',
				backgroundColor: gradient,
				pointBackgroundColor: 'white',
				borderWidth: 1,
				borderColor: 'rgba(87, 150, 255, 1)',
				data: dataItem
			}]
		};
		
		
		var options = {
			responsive: true,
			maintainAspectRatio: true,
			animation: {
				easing: 'easeInOutQuad',
				duration: 520
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: 'rgba(200, 200, 200, 0.05)',
						lineWidth: 1
					}
				}],
				yAxes: [{
					gridLines: {
						color: 'rgba(200, 200, 200, 0.08)',
						lineWidth: 1
					}
				}]
			},
			elements: {
				line: {
					tension: 0.4
				}
			},
			legend: {
				display: false
			},
			point: {
				backgroundColor: 'white'
			},
			tooltips: {
				titleFontFamily: 'Open Sans',
				backgroundColor: 'rgba(0,0,0,0.3)',
				titleFontColor: 'red',
				caretSize: 5,
				cornerRadius: 2,
				xPadding: 10,
				yPadding: 10
			}
		};
		
		
		var chartInstance = new Chart(chart, {
			type: 'line',
			data: data,
				options: options
		});
    }
})