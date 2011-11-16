
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>

		<!-- 1a) Optional: add a theme file -->
		<!--
			<script type="text/javascript" src="../js/themes/gray.js"></script>
		-->

		<!-- 1b) Optional: the exporting module -->
	<!--	<script type="text/javascript" src="js/modules/exporting.js"></script> -->
    
<!--<script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>-->
<script type="text/javascript">

$(document).ready(function() {

	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
</script>



      <script type="text/javascript">
         $(document).ready(function() {
            var options = {
               chart: {
                  renderTo: 'ActFisica',
                  type: 'pie',
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false
               },
               title: {
                  text: 'Grafico de Actividad Fisica'
               },
                tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: false
							},
							showInLegend: true
						}
					},
               series: [{
                   type: 'pie',
						name: 'Dias de Actividad Fisica',
                   data:[]}]
            };
             // Load the data from the XML file

             $.get('views/dataActFisica.xml', function(xml) {

                 // Split the lines
                 var $xml = $(xml);
                  var seriesOptions = {data: [] };

                 $xml.find('ttHeader').each(function () {
   var $row = $(this);
   var dataRow = {};
   dataRow.name = $row.find('CustomerName').text();
   dataRow.y = parseFloat( $row.find('TotalAmount').text());

   seriesOptions.data.push(dataRow);
});


options.series.push(seriesOptions);
 var chart = new Highcharts.Chart(options);
});
         });

      </script>
<script type="text/javascript">
		$(document).ready(function() {


			var options = {
				chart: {
					renderTo: 'Consumo',
					type: 'column'
				},
				title: {
					text: 'Grafico de Consumos de:'
				},
                	subtitle: {
						text: 'Tabaco, Alcohol, Drogas,Medicamentos'
					},
				xAxis: {
					categories: []
				},
				yAxis: {
						min: 0,
						title: {
							text: 'Cantidad(personas)'
						}
				},
                tooltip: {
						formatter: function() {
							return ''+
								this.x +': '+ this.y +' personas';
						}
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
				series: []
			};

			// Load the data from the XML file
			$.get('views/dataConsumo.xml', function(xml) {

				// Split the lines
				var $xml = $(xml);

				// push categories
				$xml.find('categories item').each(function(i, category) {
					options.xAxis.categories.push($(category).text());
				});

				// push series
				$xml.find('series').each(function(i, series) {
					var seriesOptions = {
						name: $(series).find('name').text(),
						data: []
					};

					// push data points
					$(series).find('data point').each(function(i, point) {
						seriesOptions.data.push(
							parseInt($(point).text())
						);
					});

					// add it to the options
					options.series.push(seriesOptions);
				});
				var chart = new Highcharts.Chart(options);
			});


		});
		</script>
 <script type="text/javascript">
         $(document).ready(function() {
            var options = {
               chart: {
                  renderTo: 'Enfermedades',
                  type: 'pie',
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false
               },
               title: {
                  text: 'Grafico de Enfermedades'
               },
                tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: false
							},
							showInLegend: true
						}
					},
               series: [{
                   type: 'pie',
						name: 'Tipo de enfermedad',
                   data:[]}]
            };
// Load the data from the XML file

             $.get('views/dataEnfermedades.xml', function(xml) {

                 // Split the lines
                 var $xml = $(xml);
                  var seriesOptions = {data: [] };

                 $xml.find('ttHeader').each(function () {
   var $row = $(this);
   var dataRow = {};
   dataRow.name = $row.find('CustomerName').text();
   dataRow.y = parseFloat( $row.find('TotalAmount').text());

   seriesOptions.data.push(dataRow);
});


options.series.push(seriesOptions);
 var chart = new Highcharts.Chart(options);
});
         });
      </script>
 <script type="text/javascript">
         $(document).ready(function() {
            var options = {
               chart: {
                  renderTo: 'Lesiones',
                  type: 'pie',
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false
               },
               title: {
                  text: 'Grafico de Lesiones'
               },
                tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: false
							},
							showInLegend: true
						}
					},
               series: [{type: 'pie',
						name: 'Tipo de Lesiones',
                   data:[]}]
            };
// Load the data from the XML file

             $.get('views/dataLesiones.xml', function(xml) {

                 // Split the lines
                 var $xml = $(xml);
                  var seriesOptions = {data: [] };

                 $xml.find('ttHeader').each(function () {
   var $row = $(this);
   var dataRow = {};
   dataRow.name = $row.find('CustomerName').text();
   dataRow.y = parseFloat( $row.find('TotalAmount').text());

   seriesOptions.data.push(dataRow);
});
options.series.push(seriesOptions);
 var chart = new Highcharts.Chart(options);

  });
         });
      </script>
</head>

<body>

<div class="container">
	
    <ul class="tabs">
        <li><a href="#tab1">Consumo</a></li>
        <li><a href="#tab2">Enfermedades</a></li>
        <li><a href="#tab3">Lesiones</a></li>
        <li><a href="#tab4">Actividad Fisica</a></li>
    </ul>
    <div class="tab_container">
        <div id="tab1" class="tab_content">
<div id="Consumo"  style="width: 600px; height: 400px; margin: 0 auto"></div>
        </div>
        <div id="tab2" class="tab_content">

<div id="Enfermedades"  style="width: 600px; height: 400px; margin: 0 auto"></div>
        </div>
        <div id="tab3" class="tab_content">

<div id="Lesiones"  style="width: 600px; height: 400px; margin: 0 auto"></div>
        </div>
        <div id="tab4" class="tab_content">
          
<div id="ActFisica"  style="width: 600px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
</div>
</body>
</html>