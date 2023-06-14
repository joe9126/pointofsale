$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



 /*
	ANNUAL GROSS SALES GRAPH
 */
//window.onload = function () {
	$(document).ready(function(){


if(window.location.pathname =="/salesanalysis" || window.location.pathname =="/dashboard")
	{
		//alert("path okay");
			var dataPoints = [];

	$.ajax({
		url:'annualgrosssales',
		type:'get',
		dataType:'json',
		async:false,
		success:function(data){
			console.log(data);
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				exportEnabled: true,
				theme: "light2",
				title: {
					text: "Gross Sales for "+(new Date()).getFullYear()
				},
				axisY: {
					title: "Gross Sales",
					prefix: "Kes ",
					titleFontSize: 24,
					includeZero: true
				},
				axisX2: {
					tickThickness: 0,
					labelAngle: 0
				},

				data: [{
		type: "column",
		yValueFormatString: "Kes #,###",
		dataPoints: dataPoints
	}]
});
			for (var i = 0; i < data.length; i++) {
					dataPoints.push({
					label: data[i].month, y: data[i].monthgross_sale
					});
				}
	chart.render();

 	}
	});



$.ajax({
	url:"annualsaledata",
	type:'get',
	async:false,
	dataType:'json',
	success:function(data){
		var net_sale = parseFloat(data[0].annual_gross) - parseFloat(data[0].annual_discs);
		console.log("net_sale "+net_sale);
		$("#gross_sale").html("<strong>Kes "+numeral(data[0].annual_gross).format('0,000.00')+"</strong>");
		$("#annual_discs").html("<strong>Kes "+numeral(data[0].annual_discs).format('0,000.00')+"</strong>");
		$("#net_sale").html("<strong>Kes "+numeral(net_sale).format('0,000.00')+"</strong>");

		$("#gross_profit").html("<strong>Kes "+numeral(data[0].annual_profit).format('0,000.00')+"</strong>");
	}
});
		
}
});
//}
/*
	MONTHLY GROSS SALES
*/

$("#monthlygrossbtn").on("click", function(){
	var dataPoints = [];
	$.ajax({
		url:"monthlygross",
		type:"get",
		async:false,
		dataType:"json",
		success:function(data){
			//console.log(data);
				var chart = new CanvasJS.Chart("chartContainer", {
					animationEnabled: true,
					exportEnabled: true,
					theme: "light2",
					title: {
						text: "Gross Sales for "+(new Date()).toLocaleString('default', { month: 'long' })+", "+(new Date()).getFullYear()
					},
					axisY: {
						title: "Gross Sale",
						prefix: "Kes ",
						titleFontSize: 24,
						includeZero: true
					},
					axisX2: {
						tickThickness: 0,
						labelAngle: 0
					},

					data: [{
						type: "column",
						yValueFormatString: "Kes #,###",
						dataPoints: dataPoints
					}]
				});

			for (var i = 0; i < data.length; i++) {
					//var date = moment(data[i].day);
					dataPoints.push({
					label: dateOrdinal(data[i].day), y: data[i].dailygross_sale
					});
				}
				chart.render();
		}
	});

	$.ajax({
	url:"monthlysaledata",
	type:'get',
	async:false,
	dataType:'json',
	success:function(data){
		//console.log(data);
		var net_sale = parseFloat(data[0].monthly_gross) - parseFloat(data[0].monthly_discs);
		//console.log("net_sale "+net_sale);
		$("#gross_sale").html("<strong>Kes "+numeral(data[0].monthly_gross).format('0,000.00')+"</strong>");
		$("#annual_discs").html("<strong>Kes "+numeral(data[0].monthly_discs).format('0,000.00')+"</strong>");
		$("#net_sale").html("<strong>Kes "+numeral(net_sale).format('0,000.00')+"</strong>");

		$("#gross_profit").html("<strong>Kes "+numeral(data[0].monthly_profit).format('0,000.00')+"</strong>");
	}
});
});
 
 function dateOrdinal(d) {
    return d+(31==d||21==d||1==d?"st":22==d||2==d?"nd":23==d||3==d?"rd":"th");
};


/*TODAY GROSS SALE */

$("#todaygrossBtn").on('click', function(){
	var dataPoints = [];
	$.ajax({
		url:"todaygross",
		type:"get",
		dataType:"json",
		async:false,
		success:function(data){
			//console.log(data);
				var chart = new CanvasJS.Chart("chartContainer", {
					animationEnabled: true,
					exportEnabled: true,
					theme: "light2",
					title: {
						text: "Gross Sales for "+(new Date()).toLocaleDateString('en', {weekday:'long'})
					},
					axisY: {
						title: "Gross Sale",
						prefix: "Kes ",
						titleFontSize: 24,
						includeZero: true
					},
					axisX2: {
						tickThickness: 0,
						labelAngle: 0
					},

					data: [{
						type: "column",
						yValueFormatString: "Kes #,###",
						dataPoints: dataPoints
					}]
				});

			for (var i = 0; i < data.length; i++) {
					//var date = moment(data[i].day);
					dataPoints.push({
					label:  data[i].productname, y: data[i].productsale
					});
				}
				chart.render();
		}
	});
});

$(document).ready(function(){
	if(window.location.pathname =="/dashboard"){
		
		var thismonthSales = function(){
			var temp= null;
			$.ajax({
				url:"monthsales",
				async:false,
				type:"get",
				dataType:'json',
				success:function(data){
					temp = data[0].monthTotal;
					//console.log(data);
				}

			 });
			return temp;
		}();
		
		//console.log(" months sales: "+thismonthSales);
		$("#monthsales").text("KES. "+numeral(thismonthSales).format('#,###.##'));
		$.ajax({
			url:"top_products",
			type:"get",
			dataType:"json",
			success:function(data){
				//console.log(data);
					var dataPoints = [];
				var chart = new CanvasJS.Chart("productschartContainer", {
					animationEnabled: true,
					title: {
						text: ""
					},
					data: [{
						type: "pie",
						startAngle: 240,
						yValueFormatString: "##0.00\"%\"",
						indexLabel: "{label} {y}",
						dataPoints: dataPoints
					}]
				});
							for(var i=0;i < data.length;i++){
								var itemstotalpercent = numeral((data[i].itemTotal/thismonthSales)*100).format("#,###.##");
								dataPoints.push({
									y: itemstotalpercent, label: data[i].productname
								});
								
							}
				chart.render();

				//QUANTITY CHART

					var dataPointsqty = [];
				var chartqty = new CanvasJS.Chart("qtychartContainer", {
					animationEnabled: true,
					title: {
						text: ""
					},
					data: [{
						type: "pie",
						startAngle: 240,
						yValueFormatString: "##0 items",
						indexLabel: "{label} {y}",
						dataPoints: dataPointsqty
					}]
				});
							for(var i=0;i < data.length;i++){
								
								dataPointsqty.push({
									y: data[i].qtysold, label: data[i].productname
								});
								
							}
				chartqty.render();
			}
		});


	}
});