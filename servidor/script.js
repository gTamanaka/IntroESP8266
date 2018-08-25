
var chart; // global
var chartSeries = {};

function mockPointCoordinates(point) {
  var now = new Date();
  var nowInMilliseconds = Date.UTC(now.getFullYear(), now.getMonth(), now.getDate(), now.getHours(), now.getMinutes(), now.getSeconds());
  point[0] = nowInMilliseconds;
  point[1] = Math.random() * 10;
}

//simplified value generator   
function requestData() {

  $.ajax({
    //url: 'data.json',
    url: 'points.json',
    success: function(seriesUpdate) {

      //in case initializer of highcharts is too quick - skip the update
      if (!chart) {
        setTimeout(requestData, 100);
        return;
      }
      
      //mocking for making static response data into dynamic
      $.each(seriesUpdate, function (serieIndex, serieUpdate) {
        mockPointCoordinates(serieUpdate.data[0]);
      });
      
      $.each(seriesUpdate, function (serieIndex, serieUpdate) {
            var existingSerie = chartSeries[serieUpdate.name];
            if (existingSerie ) {
              //add a point
              var shift = existingSerie.data.length > 20;
              existingSerie.addPoint(serieUpdate.data[0], true, shift);
            } else {
              //add a chart with point
      			  var newSerie = chart.addSeries({                        
      			    name: serieUpdate.name,
      				  data: serieUpdate.data
			        }, true);
			        chartSeries[serieUpdate.name] = newSerie;
            }

		  });
      // call it again after one second
      setTimeout(requestData, 100);
    },
    cache: false
  });
}

$(document).ready(function() {
  chart = new Highcharts.Chart({
    chart: {
      renderTo: 'container',
      defaultSeriesType: 'spline',
      events: {
        load: requestData
      }
    },
    title: {
      text: 'Monitoramento em tempo real'
    },
    xAxis: {
      type: 'datetime',
      tickPixelInterval: 150,
      maxZoom: 20 * 1000
    },
    yAxis: {
      minPadding: 0.2,
      maxPadding: 0.2,
      title: {
        text: 'Valor',
        margin: 80
      }
    },
    series: []
  });
  
});
