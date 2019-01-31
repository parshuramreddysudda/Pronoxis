<html>

<head>

    <title>Pronoxis by DECRYPTER</title>
    <meta charset="utf-8">
<!--    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/tim.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/material-dashboard.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../assets/css/loading.css">
<link rel="stylesheet" href="../assets/css/loading-bar.css" >
    

    <style>
        code {
            background-color: #eff0f1;
            color: #cc0000;
            padding: 6px 0px;
            margin-bottom: 6px;

        } 

        .h3Head {
            color: black;
            margin-bottom: 30px;
            font-family: product;
        }

        red {
            color: crimson;
        }

        green {
            color: #4CAF50;
        }

        blue {
            color: #0074D9;
        }

        @font-face {
            font-family: "Product";
            src: url(../assets/fonts/product-sans/Product%20Sans%20Regular.ttf);

        }

        .counter { 

            @font-face {
                font-family: "Product";
                src: url(../assets/fonts/product-sans/Product%20Sans%20Regular.ttf) vertical-align: middle;
            }
        }
    </style>
</head>



<div class="col">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center card-title">Files info</h2>
            <h1>Currently Scanning</h1>
            <h3 id="temp">Currently Scanning</h3>
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-monospace">File name</h4>
                </div>  
                <div class="col-md-4">
                    <h4 class="text-monospace">Percentage</h4>
                </div>
                <div class="col-md-4">
                    <h4>Scan Type</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-monospace" id="file">name</h4>
                </div>
                <div class="col-md-4">
                    <h4 class="text-monospace counter" id="percent"></h4>
            <div id="progress" style="width:100%;border:1px solid #ccc;"></div>
<!-- Progress information -->
<div id="information" style="width"></div>
                </div>

                <div class="col-md-4">
                    <h4 id="scan">Scan Type</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
error_reporting(0);
@ini_set('display_errors', 0);
include 'designConfig.php';
include 'FullScanConfig.php';
include 'cmdExeVulnChecker.php';
include 'codeExeVulnChk.php';
include 'fileDisVulnChk.php';
include 'fileIncVulnChk.php';
include 'fileManpVulnChk.php';
include 'HttpResVulChk.php';
include 'ProtocolInjVulnChk.php';
include 'ReflectionVulnChk.php';
include 'sessionFixVulnChk.php';
include 'sqlVulChecker.php';
include 'userInputVulnChk.php';
include 'xssVulChecker.php';
include 'xPathVulChk.php';

    //Array for holding Values
    
    
$name=array();
$TotalLinesArray=array();
$ScannedLines=array();
$vulnerableLines=array();
$securedLines=array();
    
    
    
$_SESSION['LogFileName']='Temp';
$GLOBALS['LogFileName']='Temp';
header('Cache-Control: no-cache');
//session_destroy();  
ini_set('max_execution_time', 300000);
$configDir=getcwd();
chdir('C:\xampp\htdocs\dept2\dept');

$_SESSION['Secured']=0;
    
$workDir=getcwd(); 
$scan=0;
$conFile = scandir($workDir);
$countOfAll=count($conFile);
  
function random_string($length) 
{
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

$fileName=random_string(5);
mkdir($fileName);
filea($fileName);
//echo getcwd();
   function scantype($type)
   {
       echo "
            <script type=\"text/javascript\">
            document.getElementById('scan').innerHTML='".$type."';
            </script>
        ";  
       sleep(0.01);
       flush();
       
   }  
$cmdold1=0;
$cmdOld2=0;
$vuln1=0;
$vuln2=0;
$secuure1=0;
$secure2=0;
    
   
for($fullScan=0;$fullScan<=$countOfAll;$fullScan++)
{

    $_SESSION['TotalLinesofFile']=0;
    // Calculate the percentation
    $percent = intval($fullScan/$countOfAll * 100)."%";

    // Javascript for updating the progress bar and information
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="'.$fullScan.' files(s) processed.";
    </script>';
    // This is for the buffer achieve the minimum size in order to flush data
    echo str_repeat(' ',1024*64);
// Send output to browser immediately
flush();
$tmp = explode('.', $conFile[$fullScan]);
$file_extension = end($tmp);
if($file_extension=='php')
{  
 
$typeChkLines = file($conFile[$fullScan]); 
echo "
            <script type=\"text/javascript\">
            document.getElementById('file').innerHTML='".$conFile[$fullScan]."';
            </script>
        ";
$_SESSION['checkTypeCheckLine']=$typeChkLines;
chdir($fileName);
mkdir($conFile[$fullScan]);
chdir($conFile[$fullScan]);
    
$Mainaddress=getcwd(); 

startCode($Mainaddress,$typeChkLines);  
scantype('CodeExecution');

startCmd($Mainaddress,$typeChkLines);  
 scantype('CodeExecution');
 
 
startFileDis($Mainaddress,$typeChkLines);  
scantype('File Disclosure');
    
startfileInc($Mainaddress,$typeChkLines);  
scantype('File Inclusion');
    
startFileMan($Mainaddress,$typeChkLines);  
 scantype('File Manipulation');   
 
startHttpRes($Mainaddress,$typeChkLines);  
scantype('Http Res Vuln');   

startProtoc($Mainaddress,$typeChkLines);  
scantype('Protocol Injection');


startFileReflec($Mainaddress,$typeChkLines);  
scantype('Reflection Injection');
    
startSession($Mainaddress,$typeChkLines);  
 scantype('Session Hijacking');   
 
StartSql($Mainaddress,$typeChkLines);  
scantype('Sql Injection');
 
startUserInput($Mainaddress,$typeChkLines);  
 scantype('User Input Checker');
    
startXSS($Mainaddress,$typeChkLines); 
scantype('XSS Crossite Scripting');
    
startXpath($Mainaddress,$typeChkLines);  
scantype('Xpath Injection');
 
      
    array_push($name,$conFile[$fullScan]);
    
     $totalLinesSum=13*$_SESSION['TotalLinesofFile'];
    
    array_push($TotalLinesArray,$totalLinesSum);
    
    
  //Calculating lines Scanned
   $cmdold1=$_SESSION['TotalCmdLines']+$_SESSION['TotalCodeLines']+$_SESSION['TotalFileDisLines']+$_SESSION['TotalFileIncLines']+$_SESSION['TotalFileManLines']+$_SESSION['TotalHttpResLines']+$_SESSION['TotalProtocLines']+$_SESSION['TotalReflecLines']+$_SESSION['TotalSessionLines']+$_SESSION['TotalSqlLines']+$_SESSION['TotalUserLines']+$_SESSION['TotalxPathLines']+$_SESSION['TotalXSSLines']; 
    
    
    $presentTotal=$cmdold1-$cmdOld2;
     
    array_push($ScannedLines,$presentTotal);
        
      $vuln1=$_SESSION['TotalCmdVulnLines']+$_SESSION['TotalCodeVulnLines']+ $_SESSION['TotalFileDisVulnLines']+$_SESSION['TotalFileIncVulnLines']+$_SESSION['TotalFileManVulnLines']+$_SESSION['TotalHttpResVulnLines']+$_SESSION['TotalProtocVulnLines']+$_SESSION['TotalReflecVulnLines']+$_SESSION['TotalSessionVulnLines']+$_SESSION['TotalSqlVulnLines']+$_SESSION['TotalUserVulnLines']+$_SESSION['TotalxPathVulnLines']+$_SESSION['TotalXSSVulnLines'];	
          
       $presetVuln=$vuln1-$vuln2;
    
    array_push($vulnerableLines,$presetVuln);  
          
    
    
$secuure1=$_SESSION['Secured'];
    
    $presentSecure=$secuure1-$secure2;
     array_push($securedLines,$presentSecure);
    
$secure2=$secuure1;
    
          
          
  
   
    
    

$cmdOld2=$cmdold1;
$vuln2=$vuln1; 
    
chdir('..');
chdir('..');
    
}
    sleep(0.8);
    
}

    function filea($fileName)
    {
         echo "
            <script type=\"text/javascript\">
            document.getElementById('temp').innerHTML='File Created ".$fileName."';
            </script>
        ";

    }
?>
    
    
    
    
    
    
    
    
    
    
    
    
    
   <link rel="stylesheet" href="../assets/js/progress.js">
    <script type="text/x-javascript" src="../assets/js/loading-bar.js"></script>

Total no of lines of code is
<?php

    echo $_SESSION['Secured'];
    if(isset($_SESSION['TotalCmdLines'])&&isset($_SESSION['TotalCodeLines'])&&isset($_SESSION['TotalFileDisLines'])&&isset($_SESSION['TotalFileIncLines'])&&isset($_SESSION['TotalFileManLines'])&&isset($_SESSION['TotalHttpResLines'])&&isset($_SESSION['TotalProtocLines'])&&isset($_SESSION['TotalReflecLines'])&&isset($_SESSION['TotalSessionLines'])&&isset($_SESSION['TotalSqlLines'])&&isset(
$_SESSION['TotalUserLines'])&&isset($_SESSION['TotalxPathLines'])&&isset($_SESSION['TotalXSSLines']))
    {
        echo $_SESSION['TotalCmdLines']+$_SESSION['TotalCodeLines']+$_SESSION['TotalFileDisLines']+$_SESSION['TotalFileIncLines']+$_SESSION['TotalFileManLines']+$_SESSION['TotalHttpResLines']+$_SESSION['TotalProtocLines']+$_SESSION['TotalReflecLines']+$_SESSION['TotalSessionLines']+$_SESSION['TotalSqlLines']+$_SESSION['TotalUserLines']+$_SESSION['TotalxPathLines']+$_SESSION['TotalXSSLines'];
    }
echo "<div class='container card'>";
echo "<div class='card-body'>";
echo "<br>";
    echo "Vuln Cmd lines are   ".$_SESSION['TotalCmdVulnLines'];echo "<br>";
    echo "Vuln Code lines are ".$_SESSION['TotalCodeVulnLines'];echo "<br>";
    echo "Vuln File DIs lines are ".$_SESSION['TotalFileDisVulnLines'];echo "<br>"; 
    echo "Vuln File Inc lines are ".$_SESSION['TotalFileIncVulnLines']; echo "<br>";
    echo "Vuln File Man lines are ".$_SESSION['TotalFileManVulnLines']; echo "<br>";
    echo "Vuln  HTTP Res lines are ".$_SESSION['TotalHttpResVulnLines'];  echo "<br>";
    echo "Vuln  Protocol lines are ".$_SESSION['TotalProtocVulnLines'];echo "<br>";
    echo "Vuln  Reflection lines are ".$_SESSION['TotalReflecVulnLines'];echo "<br>";
    echo "Vuln  Session lines are ".$_SESSION['TotalSessionVulnLines'];echo "<br>";
    echo "Vuln  Sql Vuln lines are ".$_SESSION['TotalSqlVulnLines'];echo "<br>";  echo "Vuln  User  Vuln lines are ".$_SESSION['TotalUserVulnLines']; echo "<br>";echo "Vuln  XSS  Vuln lines are ".$_SESSION['TotalXSSVulnLines'];echo "<br>";
    echo "Vuln  Xpath  Vuln lines are ".$_SESSION['TotalxPathVulnLines'];echo "<br>";
echo "</div>";
echo "</div>";
    
    
    ?>