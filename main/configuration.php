<?php
include 'checkTemp.php';
//session_destroy();
ini_set('max_execution_time', 30000);
chdir('C:\xampp\htdocs\dept2\dept');
$workDir=getcwd();

$conFile = scandir($workDir);
//print_r($conFile);
$countOfAll=count($conFile);
$typeChkLines=file($conFile);
$string=$conFile[0];

 
mkdir("testing");
chdir('testing');
echo getcwd();
for($fullScan=0;$fullScan<$countOfAll;$fullScan++)
{
$tmp = explode('.', $conFile[$fullScan]);
$file_extension = end($tmp);

   

if($file_extension=='php')
{
mkdir($conFile[$fullScan]);
chdir($conFile[$fullScan]);
$_SESSION['address']=getcwd();
$_SESSION['AllcheckFileName']=$typeChkLines;
//include 'resultconfig.php';
chdir('..');
}
    
}
$domains=$conFile;

$typeChkLines = file($conFile[55]); 








//print_r($typeChkLines);
$SERVER['LogFileName']="XSS";
 
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
    
 
total no of lines of code is <?php
    
    if(isset($_SESSION['TotalCmdLines'])&&isset($_SESSION['TotalCodeLines'])&&isset($_SESSION['TotalFileDisLines'])&&isset($_SESSION['TotalFileIncLines'])&&isset($_SESSION['TotalFileManLines'])&&isset($_SESSION['TotalHttpResLines'])&&isset($_SESSION['TotalProtocLines'])&&isset($_SESSION['TotalReflecLines'])&&isset($_SESSION['TotalSessionLines'])&&isset($_SESSION['TotalSqlLines'])&&isset(
$_SESSION['TotalUserLines'])&&isset($_SESSION['TotalxPathLines'])&&isset($_SESSION['TotalXSSLines']))
    {
        echo $_SESSION['TotalCmdLines']+$_SESSION['TotalCodeLines']+$_SESSION['TotalFileDisLines']+$_SESSION['TotalFileIncLines']+$_SESSION['TotalFileManLines']+$_SESSION['TotalHttpResLines']+$_SESSION['TotalProtocLines']+$_SESSION['TotalReflecLines']+$_SESSION['TotalSessionLines']+$_SESSION['TotalSqlLines']+$_SESSION['TotalUserLines']+$_SESSION['TotalxPathLines']+$_SESSION['TotalXSSLines'];
    }
    
    
    ?>
</html>