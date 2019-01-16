<?php

include 'FullScanConfig.php';
include 'cmdExeVulnChecker.php';
include 'codeExeVulnChk.php';
include 'fileDisVulnChk.php';
$_SESSION['LogFileName']='Temp';
header('Cache-Control: no-cache');
//session_destroy();  
ini_set('max_execution_time', 30000);
$configDir=getcwd();
echo $configDir;
chdir('C:\xampp\htdocs\dept2\dept');

$workDir=getcwd(); 
$scan=0;
$conFile = scandir($workDir);
print_r($conFile);
$countOfAll=count($conFile);
  
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

$fileName=random_string(5);
 mkdir($fileName);

//echo getcwd();
for($fullScan=0;$fullScan<$countOfAll;$fullScan++)
{
$tmp = explode('.', $conFile[$fullScan]);
$file_extension = end($tmp);
     
if($file_extension=='php')
{ 

$typeChkLines = file($conFile[$fullScan]); 
$_SESSION['checkTypeCheckLine']=$typeChkLines;
chdir($fileName);
mkdir($conFile[$fullScan]);
chdir($conFile[$fullScan]);
    
$Mainaddress=getcwd(); 
    echo "<br>";   echo "<br>";   
startCode($Mainaddress,$typeChkLines);  
    echo "<br>";   echo "<br>";
startCmd($Mainaddress,$typeChkLines);  
     echo "<br>";   echo "<br>";
startFileDis($Mainaddress,$typeChkLines);  
     echo "<br>";   echo "<br>";
chdir('..');
chdir('..');
    echo "Directory Changed";
}
    
}


function runUntilComplete()
{
    while(isset($_SESSION['TotalCmdLines'])&&isset($_SESSION['TotalCodeLines'])&&isset($_SESSION['TotalFileDisLines'])&&isset($_SESSION['TotalFileIncLines'])&&isset($_SESSION['TotalFileManLines'])&&isset($_SESSION['TotalHttpResLines'])&&isset($_SESSION['TotalProtocLines'])&&isset($_SESSION['TotalReflecLines'])&&isset($_SESSION['TotalSessionLines'])&&isset($_SESSION['TotalSqlLines'])&&isset(
$_SESSION['TotalUserLines'])&&isset($_SESSION['TotalxPathLines'])&&isset($_SESSION['TotalXSSLines']))
    {
        echo "Done";
    }
}







 
?> 
<html>

<head>
    
  <title>Pronoxis by DECRYPTER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/material-dashboard.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
    <style>
    
        code{
            background-color: #eff0f1;
            color: #cc0000;
            padding: 6px 0px; 
            margin-bottom: 6px;
            
        }
        .h3Head{
            color: black;
            margin-bottom: 30px;
            font-family: product;
        }
        red{
            color: crimson;
        }
        green{
            color: #4CAF50;
        }
        blue{
            color: #0074D9;
        }
       @font-face {
font-family: "Product";
src: url(../assets/fonts/product-sans/Product%20Sans%20Regular.ttf);

}
 

    </style>
</head>
     
 
Total no of lines of code is 
    <?php
    
    if(isset($_SESSION['TotalCmdLines'])&&isset($_SESSION['TotalCodeLines'])&&isset($_SESSION['TotalFileDisLines'])&&isset($_SESSION['TotalFileIncLines'])&&isset($_SESSION['TotalFileManLines'])&&isset($_SESSION['TotalHttpResLines'])&&isset($_SESSION['TotalProtocLines'])&&isset($_SESSION['TotalReflecLines'])&&isset($_SESSION['TotalSessionLines'])&&isset($_SESSION['TotalSqlLines'])&&isset(
$_SESSION['TotalUserLines'])&&isset($_SESSION['TotalxPathLines'])&&isset($_SESSION['TotalXSSLines']))
    {
        echo $_SESSION['TotalCmdLines']+$_SESSION['TotalCodeLines']+$_SESSION['TotalFileDisLines']+$_SESSION['TotalFileIncLines']+$_SESSION['TotalFileManLines']+$_SESSION['TotalHttpResLines']+$_SESSION['TotalProtocLines']+$_SESSION['TotalReflecLines']+$_SESSION['TotalSessionLines']+$_SESSION['TotalSqlLines']+$_SESSION['TotalUserLines']+$_SESSION['TotalxPathLines']+$_SESSION['TotalXSSLines'];
    }
    echo "Vuln Cmd lines are ".$_SESSION['TotalCmdVulnLines'];
    echo "Vuln Code lines are ".$_SESSION['TotalCodeVulnLines'];
    echo "Vuln File DIs lines are ".$_SESSION['TotalFileDisVulnLines'];
    
    
    ?>
</html>
