google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
google.charts.load('current', {'packages':['table']});
google.charts.setOnLoadCallback(drawTable);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Time', 'CO2'],
    ['11h',  880],
    ['11h15',865],
    ['11h30',775],
    ['11h45', 800],
    ['12h00', 815]
    ]);
    var options = {
    title: 'CO2',
    curveType: 'function',
    legend:'none'
    };
    var chart = new google.visualization.LineChart(document.getElementById('chartCO2'));
    chart.draw(data, options);


    var data = google.visualization.arrayToDataTable([
    ['Time', 'BPM'],
    ['11h',  105],
    ['11h15',145],
    ['11h30',155],
    ['11h45', 160],
    ['12h00', 140]
    ]);
    var options = {
    title: 'BPM',
    curveType: 'function',
    legend:'none'
    };
    var chart2 = new google.visualization.LineChart(document.getElementById('chartBPM'));
    chart2.draw(data, options);
    

    var data = google.visualization.arrayToDataTable([
    ['Time', '°C'],
    ['11h',  37.5],
    ['11h15',37.6],
    ['11h30',37.8],
    ['11h45', 37.7],
    ['12h00', 37.5]
    ]);
    var options = {
    title: 'Température corporelle',
    curveType: 'function',
    legend:'none'
    };
    var chart3 = new google.visualization.LineChart(document.getElementById('chart°C'));
    chart3.draw(data, options);



    var data = google.visualization.arrayToDataTable([
    ['Time', 'dB'],
    ['11h',  85],
    ['11h15',65],
    ['11h30',55],
    ['11h45', 58],
    ['12h00', 52]
    ]);
    var options = {
    title: 'Pollution sonore',
    curveType: 'function',
    legend:'none'
    };

    var chart4 = new google.visualization.LineChart(document.getElementById('chartdB'));

    chart4.draw(data, options);
}



function drawTable() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'date');
    data.addColumn('number', 'CO2');
    data.addColumn('number', 'BPM');
    data.addColumn('number', 'Temp. corp');
    data.addColumn('number', 'Bruit');
    data.addRows([
      ['09/12/2022',  880,105,37.5, 85],
      ['03/12/2022',   880,105,37.5, 85],
      ['22/11/2022', 880,105,37.5, 85],
      ['15/11/2022',   880,105,37.5, 85]
    ]);

    var table = new google.visualization.Table(document.getElementById('table'));

    table.draw(data, {width: '100%', height: '100%'});
  }