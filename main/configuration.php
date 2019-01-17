
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
     

    
   <div class="col">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center card-title">Files info</h2>
            <h1>Currently Scanning</h1>
            <h3 id="temp">Currently Scanning</h3>
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-monospace">File name</h4>
                </div>
                <div class="col-md-6">
                    <h4>Scan Type</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-monospace" id="file">File name</h4>
                </div>
                <div class="col-md-6">
                    <h4 id="scan">Scan Type</h4>
                </div>
            </div>
        </div>
    </div>
</div><?php
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

$_SESSION['LogFileName']='Temp';
$GLOBALS['LogFileName']='Temp';
header('Cache-Control: no-cache');
//session_destroy();  
ini_set('max_execution_time', 300000);
$configDir=getcwd();
chdir('C:\xampp\htdocs\dept2\dept');

$workDir=getcwd(); 
$scan=0;
$conFile = scandir($workDir);
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
filea($fileName);
//echo getcwd();


 
?> 
    <?php
    
    
    for($fullScan=0;$fullScan<$countOfAll;$fullScan++)
{
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
    
chdir('..');
chdir('..');
}
    
}
   function scantype($type)
   {
       echo "
            <script type=\"text/javascript\">
            document.getElementById('scan').innerHTML='".$type."';
            </script>
        ";
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
</html>
 
Total no of lines of code is 
    <?php
    
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
    
