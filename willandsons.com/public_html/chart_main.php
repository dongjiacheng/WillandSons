<!DOCTYPE HTML>

<html>
	<head>
    <!--Load the AJAX API-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);
      google.setOnLoadCallback(drawAnthonyChart);
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
	var jsonData = $.ajax({
 	 url: "chart_domain.php",
 	 dataType:"json",
 	 async: false
 	 }).responseText;
   
// Create our data table out of JSON data loaded from server.
	var data = new google.visualization.DataTable(jsonData);
       // var data = new google.visualization.DataTable();
       // data.addColumn('string', 'PlayerID');
       // data.addColumn('number', 'kill');
       // data.addRows([
       //   ['54321', 3],
       //   ['17682', 1],
      //    ['49360', 1],
      //    ['99200', 1],
      //    ['44722', 2]
      //  ]);

        // Set chart options
        var options = {'title':'Kill Chart',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
	 function drawAnthonyChart() {

        // Create the data table for Anthony's pizza.
       var jsonData2 = $.ajax({
   url: "getdata.php",
   dataType:"json",
   async: false
   }).responseText;
   
// Create our data table out of JSON data loaded from server.
  var data = new google.visualization.DataTable(jsonData2);

        // Set options for Anthony's pie chart.
        var options = {title:'Death Chart',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
      }



    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart
    <div id="chart_div"></div>
  	<td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
	-->
	<table class="columns">
      <tr>
        <td><div id="chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>

	</body>
</html>

