<?php if (!empty(json_decode($dailyChart))): ?>
	<div id="containerDaily" style="height: 400px; width: 100%"></div>
<script>
	$(document).ready(function(){
		 var dataJson = JSON.parse(JSON.stringify(<?= $dailyChart ?>));
var length = dataJson.length;

console.log(length)
		var startDate ;
  var data = [];
 (function(H) {
    var j = 1;
    var i = 1;
    var start = Date.UTC(new Date().getFullYear(), new Date().getMonth(), 1);
    var end = Date.UTC(new Date().getFullYear(), new Date().getMonth(), new Date(dataJson[length-1].date).getDate());


    var getkeyByDate = function(obj, date) {
        var returnKey = -1;
        $.each(obj, function(key, info) {
            if ( moment(info.date).format('YYYY-MM-DD') == date) {
               returnKey = key;
                return false; 
            };   
        });
        return returnKey;       
    }
    var loop = new Date(start);
    while(loop <= end){
      var key = getkeyByDate(dataJson, moment(loop).format('YYYY-MM-DD'));
      var color = "#2ecc71";
      var y = 0;
      if (loop.getDate() == new Date(dataJson[length-1].date).getDate() ) {
        color = '#ea1a43';
      }

      if (key > -1) {
        y = Number(dataJson[key].total);
      }else {
        y = 0;
      }
      data.push({ y:y, color:color });
       var newDate = loop.setDate(loop.getDate() + 1);
       loop = new Date(newDate);

       i++;
    }
    
  }(Highcharts));

 console.log(data)
		Highcharts.chart('containerDaily',{
    chart: {
      type: 'line',
      zoomType: 'x',
      spacingRight: 0,
      
    },
    title: {
      text: 'Spending Percentages Daily'
    },
    xAxis: {
      type: 'datetime',
      tickInterval: 0,
      dateTimeLabelFormats: {
        ordinal:false,
        day: '%e'
      },
      min: Date.UTC(new Date().getFullYear(), new Date().getMonth(), 1),
      max: Date.UTC(new Date().getFullYear(), new Date().getMonth(), new Date().getDate()),
      title: {
        text: 'Date of Month'
      },
      startOnTick: false,
      endOnTick: false,
    },
    plotOptions: {
      series: {
            pointPadding: 0,
            groupPadding: 0,
            borderWidth: 2,
            shadow: true,
        },
         
      column: {
        pointPlacement: ''
      }
    },
    yAxis: {
      title: {
        text: 'Total target this day'
      }
    },
    tooltip: {
      shared: false
    },
    legend: {
      enabled: false
    },
    series: [{
      type: 'line',
      name: 'Spending Percentage',
      pointInterval: 24 * 3600 * 1000,
      pointStart: Date.UTC(new Date().getFullYear(), new Date().getMonth(), 1), //Get from receive_at in last submited 
      data: data
    },{
      type: 'spline',
      enableMouseTracking: false,
      linkedTo: 0,
      marker: {
        enabled: false
      },
    }]
  })

	})
</script>
<?php else: ?>
<div class="alert alert-success">
                      No data to display
                    </div> 
<?php endif ?>