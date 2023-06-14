 
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
	title: {
		text: "Gross Sales for 2020"              
	},
	axisX: {
		title: "Months"
	},
	axisY: {
		title: "Values x1,000 (USD)"
	},
	data: [              
	{
		// Change type to "doughnut", "line", "splineArea", etc.
		type: "column",
		dataPoints: [
			{ label: "Jan",  y: 10  },
			{ label: "Feb", y: 15  },
			{ label: "Mar", y: 25  },
			{ label: "Apr",  y: 30  },
			{ label: "May",  y: 28  },
			{ label: "June",  y: 48  },
			{ label: "July",  y: 38  },
			{ label: "Aug",  y: 25  },
			{ label: "Sep",  y: 58  },
			{ label: "Oct",  y: 88  },
			{ label: "Nov",  y: 60  }
		]
	}
	]
};

$("#chartContainer").CanvasJSChart(options);
}
 
 