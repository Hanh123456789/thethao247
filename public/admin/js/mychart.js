 window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: ""
      },
      axisY: {
        title: ""
      },
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "center"
      },
      data: [

      {
        color: "#17a2b8",
        type: "column",
        showInLegend: true,
        legendMarkerType: "none",
        legendText: "",
        dataPoints: [
        { x: 1, y: 15, label: "{{$hanh}}"},
        { x: 2, y: 30,  label: "Mar 28" },
        { x: 3, y: 35,  label: "Mar 15"},
        { x: 4, y: 20,  label: "Mar 3"},
        { x: 5, y: 0,  label: "Mar 21"},
        { x: 6, y: 0, label: "Jun 8"},
        { x: 7, y: 0,  label: "Jun 26"},
        { x: 8, y: 0,  label: "Jun 14"},
		    { x: 9, y: 0,  label: "Aug 1"},
		    { x: 10, y: 0,  label: "Aug 19"}
        ]
      }
      ]
    });

    chart.render();
  }