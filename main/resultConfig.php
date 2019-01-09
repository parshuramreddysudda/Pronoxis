<?php

include 'FullScanConfig.php';
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
    
    function startFull()
    {
        echo "<div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrameCMD</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='cmdExeVulnChecker.php'></iframe>
  </div>
</div><div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='codeExeVulnChk.php'></iframe>
  </div>
</div><div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='fileDisVUlnChk.php'></iframe>
  </div>
</div>
<div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='fileIncVulnChk.php'></iframe>
  </div>
</div>
    <div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='fileManpVulnChk.php'></iframe>
  </div>
</div>
    <div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='HttpResVulChk.php'></iframe>
  </div>
</div>
    <div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='ProtocolInjVulnChk.php'></iframe>
  </div>
</div>
   
<div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='ReflectionVulnChk.php'></iframe>
  </div>
</div>
   <div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='sessionFixVulnChk.php'></iframe>
  </div>
</div>
   <div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='sqlVulChecker.php'></iframe>
  </div>
</div>
   <div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='userInputVulnChk.php'></iframe>
  </div>
</div>
   <div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='xPathVulChk.php'></iframe>
  </div>
</div>
   <div class='container'>
  <h2>Injection</h2>
  <p>Responsive IFrame</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='xssVulChecker.php'></iframe>
  </div>
</div>";
        
    }
    ?>

</body>
</html>
