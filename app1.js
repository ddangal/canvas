$(document).ready(function(){
		$.ajax({
			url: "http://localhost/chartjs/data1.php",
			method: "GET",
			success: function(data) {
				console.log(data);
				var data = JSON.parse(data);
				var namo = [];
				var numo = [];
				/*namo[1] = "Deep";
				namo[2] = "Deep";
				numo[1] = 10;
				numo[1] = 20;*/
				var count = 0;
				for (var i in data)
				{
					namo.push(data[i].name);
					numo.push(data[i].num);
					count++;
				}
				
				//console.log(namo);
				console.log(count);

				var chartdata = {
					labels: namo,
					datasets:[
					{
							label: 'Number of Students',
								backgroundColor: '#4499aa',
								borderColor:'green',
								data: numo	
					}
					]
				}

				var ctx = $("#mycan1");
				var bargraph = new Chart(ctx, {
					type:'pie',
					data: chartdata
				});

			},
			error: function(data) {
				console.log(data);
			}

		});
});
