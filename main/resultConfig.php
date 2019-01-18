<?php

include 'FullScanConfig.php';
//include 'cmdExeVulnChecker.php';
//include 'codeExeVulnChk.php';
ini_set('max_execution_time', 3000);

$httpTotalLines=0;  //to count no of lines
$noLines=0;         //To count no of lines
$noVulLines=0;       //TO count no of Vuln varaibles 
$_SESSION['LogFileName']="Temp";
 
?>

<html lang="en">
<head>
  <title>Pronoxis by DECRYPTER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/material-dashboard.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  
</head>
<body>
<?php
   
    
  
 echo "<div class='container'>
  
  <p>Responsive IFrameCMD</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='cmdExeVulnChecker.php'></iframe>
  </div>
</div><div class='container'>
  
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='codeExeVulnChk.php'></iframe>
  </div>
</div>
  ";

    ?>

</body>
</html>
