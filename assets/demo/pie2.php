<?php
require 'config.php';

$nama1 = 'Free Access';
$nama2 = 'Premium Access';
$nama3 = 'No Access';

$sqlfree    = mysqli_query($conn, "SELECT * FROM `book` WHERE JenisAkses='$nama1'");
$sqlprem    = mysqli_query($conn, "SELECT * FROM `book` WHERE JenisAkses='$nama2'");
$sqlnoacc   = mysqli_query($conn, "SELECT * FROM `book` WHERE JenisAkses='$nama3'");
$chart_data = "";
$free       = mysqli_num_rows($sqlfree);
$prem       = mysqli_num_rows($sqlprem);
$noacc      = mysqli_num_rows($sqlnoacc);
?>
<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    var ctx = document.getElementById("pie2");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Free Access", "Premium Access", "No Access"],
            datasets: [{
                data: [<?php echo json_encode($free); ?>, <?php echo json_encode($prem); ?>, <?php echo json_encode($noacc); ?>],
                backgroundColor: ['#007bff', '#dc3545', '#ffc107'],
            }],
        },
    });
</script>