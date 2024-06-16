<?php
require 'config.php';

$nama1 = 'Certificate of Attendance';
$nama2 = 'Certificate of Appreciation';
$nama3 = 'Professional Certificate';
$nama4 = 'Certificate of Completion';

$sqlebook   = mysqli_query($conn, "SELECT * FROM `sertif` WHERE Kategori='$nama1'");
$sqleref    = mysqli_query($conn, "SELECT * FROM `sertif` WHERE Kategori='$nama2'");
$sqlhiprod  = mysqli_query($conn, "SELECT * FROM `sertif` WHERE Kategori='$nama3'");
$sqlcomplete  = mysqli_query($conn, "SELECT * FROM `sertif` WHERE Kategori='$nama4'");
$chart_data = "";
$ebook      = mysqli_num_rows($sqlebook);
$eref       = mysqli_num_rows($sqleref);
$hiprod     = mysqli_num_rows($sqlhiprod);
$complete    = mysqli_num_rows($sqlcomplete);
?>
<script>
    Chart.defaults.global.defaultFontFamily =
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    var ctx = document.getElementById("grafik2");
    var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Certificate of Attendance", "Certificate of Appreciation", "Professional Certificate","Certificate of Completion"],
            datasets: [{
                label: "Jumlah Dokumen",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [<?php echo json_encode($ebook); ?>, <?php echo json_encode($eref); ?>, <?php echo json_encode($hiprod); ?>, <?php echo json_encode($complete); ?>]
            }],
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 10,
                        maxTicksLimit: 5
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });
</script>