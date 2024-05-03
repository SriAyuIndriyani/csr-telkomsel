<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.viewer.title-meta')
    @include('layouts.viewer.head-css')
</head>
@include('layouts.viewer.body')
@include('sweetalert::alert')
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.viewer.menu')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-container" style="position: relative; height:400px; width:100%">
                                <canvas id="pie"></canvas>
                                {{-- <div id="pie-chart-legend" class="pie-chart-legend"></div> --}}
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

                <!-- end table responsive -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.viewer.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->
<!-- JAVASCRIPT -->
@include('layouts.viewer.vendor-scripts')
<!-- Chart JS -->
<script src="/assets/libs/chart.js/Chart.bundle.min.js"></script>
<!-- Chart 3D Plugin -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-chart-3d"></script>
<!-- chartjs init -->
<script src="/assets/js/pages/chartjs.init.js"></script>
<script src="/assets/js/app.js"></script>

<script>
    $(document).ready(function() {
        "use strict";

        // Lakukan permintaan ke URL
        $.ajax({
            url: '/viewer/dashboard/data',
            method: 'GET',
            success: function(response) {
                // Ambil data yang diterima dari respons
                var labels = response.labels;
                var data = response.datasets[0].data;
                var backgroundColors = response.datasets[0].backgroundColor;

                // Buat pie chart dengan data yang diterima
                var ctx = document.getElementById('pie').getContext('2d');
                var pieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: backgroundColors,
                            borderColor: '#000000'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            datalabels: {
                                color: '#000000',
                                font: {
                                    size: 12,
                                    weight: 'bold'
                                },
                                formatter: function(value, context) {
                                    return context.chart.data.labels[context.dataIndex];
                                }
                            }
                        },
                        plugins: {
                            chartjs3d: {
                                enabled: true,
                                alphaAngle: 60,
                                betaAngle: 30
                            }
                        }
                    }
                });

                // Menampilkan legenda di atas chart
                var legend = document.getElementById('pie-chart-legend');
                legend.innerHTML = pieChart.generateLegend();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>

</body>

</html>
