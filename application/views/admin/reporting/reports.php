    <?php $this->load->view('admin/include/header'); ?>

    <?php $this->load->view('admin/include/sidebar'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">

                <div class ="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pie Chart | Cash Registers Balance <small>(register_id == 4)</small></h4>
                                <p>Negative values excluded.</p>
                                <div id="pieChart" class="flot-chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bar Chart | Customers Balance <small>(customer_id == 2)</small></h4>
                                <div id="barChart" class="flot-chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Line Chart | Messages </h4>
                                <div id="lineChart" class=""></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


    <?php $this->load->view('admin/include/footer'); ?>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        drawLineChart();
        drawPieChart();
        drawColumnChart();
    }

    function drawLineChart() {
        var phpData = <?php echo json_encode($message_data); ?>;
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Time');
        data.addColumn('number', 'Number of Messages');

        phpData.forEach(function(row) {
            data.addRow([row.time, parseInt(row.message_count)]);
        });

        var options = {
            title: 'Messages vs Time',
            hAxis: { title: 'Time' }, 
            vAxis: {
                title: 'Number of Messages',
                minValue: 0,
                maxValue: 15,
                gridlines: { count: 16 }
            },
            legend: 'none'
        };

        var chart = new google.visualization.LineChart(document.getElementById('lineChart'));
        chart.draw(data, options);
    }

    function drawPieChart() {
        var phpData = <?php echo json_encode($cash_register_data); ?>;
        var data = google.visualization.arrayToDataTable([
            ['Currency', 'Balance'],
            ['USD', parseFloat(phpData.usd)],
            ['TRY', parseFloat(phpData.try)],
            ['EUR', parseFloat(phpData.eur)],
            ['GBP', parseFloat(phpData.gbp)]
        ]);

        var options = {
            title: 'Cash Registers Balance',
            pieHole: 0,
            slices: {
                0: { color: '#28a745' },
                1: { color: '#dc3545' },
                2: { color: '#ac7c42' },
                3: { color: '#173679' }
            }
        };

        var chart = new google.visualization.PieChart(document.getElementById('pieChart'));
        chart.draw(data, options);
    }

    function drawColumnChart() {
        var phpData = <?php echo json_encode($customer_balance_data); ?>;
        console.log(phpData); // Veriyi kontrol etmek için ekleyin
        var data = google.visualization.arrayToDataTable([
            ['Currency', 'Balance'],
            ['USD', parseFloat(phpData.usd)],
            ['TRY', parseFloat(phpData.try)],
            ['EUR', parseFloat(phpData.eur)],
            ['GBP', parseFloat(phpData.gbp)]
        ]);

        var options = {
            title: 'Customer Balance',
            hAxis: { title: 'Currency' },
            vAxis: { title: 'Balance' },
            legend: 'none'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('barChart'));
        chart.draw(data, options);
    }
</script>