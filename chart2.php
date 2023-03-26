<?php 
	include "db.php";
	$sql = "SELECT MONTH(Date) AS month, WEEK(Date) AS week, DATE(Date) AS date, COUNT(CustomerID) AS count FROM salesorder WHERE date(Date) BETWEEN '2020-11-01' AND '2021-11-31' GROUP BY week ORDER BY Date";
	$result = mysqli_query($con,$sql);

	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$Month = $row['month'];
			$week = $row['week'];
			$date = $row['date'];
			$count = $row['count'];
		}
		}else{
		echo "Something went wrong!";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chart</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
</head>
<body>
	<canvas id="mychart" style="height: auto; width: 500px;"></canvas>

	<?php 
		echo'<input type = hidden id="Month" value='.$Month.'>
		<input type = hidden id="week" value='.$week.'>
		<input type = hidden id="date" value='.$date.'>
		<input type = hidden id="count" value='.$count.'>';
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

	<script>
		var Month = document.getElementByID("Month").value;
		var week = document.getElementByID("week").value;
		var date = document.getElementByID("date").value;
		var count = document.getElementByID("count").value;


		window.onload = function(){
			var randomScalingFactor = function(){
				return Math.round(Math.ranom()* 100);
			}
		};

		var config = {
			type: 'bar',
			data:{
				borderColor "#fffff",
				datasets: [{
					data: [
					Month,
					week,
					date,
					count
					],
					borderColor: "#fff",
					borderWidth: "3",
					hoverBorderColor: "#000",

					label: "Monthly Sales Report",

					backgroundColor: [
                        "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                         "#ffc750"
                    ],
                    hoverBackgroundColor:[
                        "#ffc750",
                        "#5969ff",
                        "#25d5f2",
                        "#ff407b"
                    ]

				}],
				labels: [
				"Month",
				"Week",
				"Date",
				"count"
				]
			},

			options:{
				responsive: true
			}
                          
		};

		var ctx = document.getElementByID('mychart').getContext('2d');
		window.myPie = new Chart(ctx, config);
		;
	</script>
</body>
</html>