<?php
include("config.php");
$ID = $_GET["ID"];
$data = mysqli_query($conn, "SELECT * FROM sertif WHERE ID='$ID'");
$sertif = mysqli_fetch_array($data);
?>
<?php
$html = '
<style>
body {
	font-family: Axiata;
  src: url("AXIATA\ BOOK.TTF");
}
.gradient {
	border:0.1mm solid #220044;
	background-color: #f0f2ff;
	background-gradient: linear #c7cdde #f0f2ff 0 1 0 0.5;
}
.radialgradient {
	border:0.1mm solid #220044;
	background-color: #f0f2ff;
	background-gradient: radial #00FFFF #FFFF00 0.5 0.5 0.5 0.5 0.65;
	margin: auto;
}
.rounded {
	border:0.1mm solid #220044;
	background-color: #f0f2ff;
	background-gradient: linear #c7cdde #f0f2ff 0 1 0 0.5;
	border-radius: 2mm;
	background-clip: border-box;
}
h1 {
	font-weight: bold;
	font-size: 70px;
}
h2 {
	width: 100%;
	font-weight: bold;
	font-size: 80px;
	text-align: center;
	line-height: 0.5;
}
h3 {
	width: 100%;
	font-weight: bold;
	font-size: 80px;
	text-align: center;
	line-height: 0.50;
}
h4 {
	font-size: 40px;
	text-align: center;
	line-height: 0.7;
}
div {
	padding: 1em;
	margin: auto;
	text-align: justify;
	line-height: 0.5;
}
.center {
	width: 100%;
	padding: 230px;
	text-align: center;
	line-height: 0.5;
}
.name {
	width: 100%;
	font-size: 60px;
	text-align: center;
	line-height: 0.5;
}
.issueddate {
	width: 100%;
	font-size: 40px;
	padding-top: -20px;
	text-align: left;
}


pre { text-align: left }
pre.code { font-family: "Axiata Book" }
</style>
<body>
<div class="issueddate">
<p>Issued Date: ' . $sertif['TglTerbit'] . '</p>
</div>
<div class="center">
<h1>' . $sertif['Kategori'] . '</h1>
<h4>This certificate is presented to</h4>
<div class="name">
<h2>' . $sertif['Nama'] . '</h2>
<h4>for the completion of ' . $sertif['NamaSertif'] . ' issued by ' . $sertif['IssuedBy'] . '</h4>
<h4>Credential ID: ' . $sertif['SertifID'] . '</h4>
</div>
</div>
</body>
';

$approveby = $sertif['ApprovedBy'];
if ($approveby == 'Nashrudin Ismail') {
	$background = '
	@page {
	   background: url("input-lnd/Certificate Templates/pakudin.png") no-repeat 0 0;
	   background-image-resize: 6;
	}';
} elseif ($approveby == 'Mochamad Hira Kurnia') {
	$background = '
 @page {
	background: url("input-lnd/Certificate Templates/pakhira.png") no-repeat 0 0;
	background-image-resize: 6;
 }';
} else {
	$background = '
 @page {
	background: url("input-lnd/Certificate Templates/template.png") no-repeat 0 0;
	background-image-resize: 6;
 }';
}

require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'c', 'format' => [535, 380],
	'default_font' => 'Axiata']);
$mpdf->WriteHTML($background, 1);
$mpdf->WriteHTML($html);
$mpdf->Output();
?>