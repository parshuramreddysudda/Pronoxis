<?php


chdir('C:\xampp\htdocs\dept2\dept');
$workDir=getcwd();
$conFile = scandir($workDir);
print_r($conFile);

$httpTotalLines=0;  //to count no of lines
$noLines=0;         //To count no of lines
$noVulLines=0;       //TO count no of Vuln varaibles

$typeChkLines = file($conFile[46]); 


$SERVER['checkFileName']=$typeChkLines;

//print_r($typeChkLines);
$SERVER['LogFileName']="XSS";
 
?> 
<html>

<head>
    
  <title>Bootstrap Example</title>
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
       @font-face {
font-family: "Product";
src: url(../assets/fonts/product-sans/Product%20Sans%20Regular.ttf);

}


    </style>
</head>
    
 

</html>
