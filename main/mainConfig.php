<?php
$_SESSION['projectName']=$_POST['ProjectName'];
$_SESSION['search']=$_POST['Search'];

echo $_SESSION['projectName'];
echo $_SESSION['search'];


if(isset($_SESSION['search']))
{
}
else
{
	echo "No Address";
	exit();
}


 function scantype($type,$FileName)
   {
       echo "
            <script type=\"text/javascript\">
            document.getElementById('scanType').innerHTML='Currently Scanning against <b>".$type."</b>';
            </script>
        ";  
       sleep(0.3);
       flush();
       
   }  
   

?>  
<html>
<head>
    <!-- Meta-Information -->
    <title>Pronoxis Full  Scan</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <!-- Vendor: Materialize Stylesheets  -->
        <link rel="stylesheet" href="../assets/customAssets/css/materialize.min.css" type="text/css">

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="../assets/customAssets/css/icons.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/customAssets/css/main.css" type="text/css">
    <link rel="stylesheet" href="../assets/customAssets/css/responsive.css" type="text/css">
    <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.css">

    <!-- Color Scheme -->
    <link rel="stylesheet" href="../assets/customAssets/css/color-schemes/color.css" type="text/css" title="color3">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color1.css" title="color1">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color2.css" title="color2">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color4.css" title="color4">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color5.css" title="color5">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/scanLoader/style.css">
<link rel="stylesheet" href="../assets/css/material-dashboard.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/loading.css">
<link rel="stylesheet" href="../assets/css/loading-bar.css" >
     <style >
/*
#load
{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("https://i.imgur.com/Gp6xPjs.gif") no-repeat center center rgba(1,0,0,0.73);
} 
*/
    </style>
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
        .card-text
        {
            color: black;
        }

        .counter { 

            @font-face {
                font-family: "Product";
                src: url(../assets/fonts/product-sans/Product%20Sans%20Regular.ttf) vertical-align: middle;
            }
        }
    </style>
    
</head>
    
<body class="panel-data expand-data  navbar-expand-md" style="font-family: 'Cabin', sans-serif;">
      <div id="load" style="background-color:#fffff"></div>
<div class="topbar">
  <div class="logo">
    <h1><a href="#" title=""><img  style="width:150px;margin-top:17px;" src="../assets/img/logo.png" alt=""/></a></h1>
  </div>
  <div class="topbar-data">
   
      
      
    <form class="topbar-search">
      <button type="submit"><i class="ion-ios-search-strong"></i></button>
      <input type="text" placeholder="Type and Hit Enter" />
    </form>
    <div class="usr-act">
      <span><img src="../assets/customAssets/images/resource/topbar-usr1.jpg" alt="" /><i class="sts away"></i></span>
      <div class="usr-inf">
        <div class="usr-thmb brd-rd50">
          <img class="brd-rd50" src="../assets/customAssets/images/resource/usr.jpg" alt="" />
          <i class="sts away"></i>
          <a class="green-bg brd-rd5" href="#" title=""><i class="fa fa-envelope"></i></a>
        </div>
        <h5><a href="#" title="">Ram</a></h5>
        <span>Co Worker</span>
        <i>8179940463</i>
        <div class="act-pst-lk-stm">
          <a class="brd-rd5 green-bg-hover" href="#" title=""><i class="ion-heart"></i> Love</a>
          <a class="brd-rd5 blue-bg-hover" href="#" title=""><i class="ion-forward"></i> Reply</a>
        </div>
        <div class="usr-ft">
          <a class="btn-danger" href="#" title=""><i class="fa fa-sign-out"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>
  <div class="topbar-bottom-colors" style="background-color: #2c3e50;">
    <i style="background-color: #2c3e50;"></i>
  </div>
</div><!-- Topbar -->
    
    
<div class="option-panel">
  <span class="panel-btn"><i class="fa ion-android-settings fa-spin"></i></span>
  <div class="color-panel">
    <h4>Text Color</h4>
    <span class="color1" onclick="setActiveStyleSheet('color1'); return false;"><i></i></span>
    <span class="color2" onclick="setActiveStyleSheet('color2'); return false;"><i></i></span>
    <span class="color3" onclick="setActiveStyleSheet('color'); return false;"><i></i></span>
    <span class="color4" onclick="setActiveStyleSheet('color4'); return false;"><i></i></span>
    <span class="color5" onclick="setActiveStyleSheet('color5'); return false;"><i></i></span>
  </div>
  <div class="backgroundimg-panel">
    <h4>Background Image</h4>
    <span class="backgroundimg1-click" style="background-image: url(../assets/customAssets/images/resource/backgroundimg1.png);"></span>
    <span class="backgroundimg2-click" style="background-image: url(../assets/customAssets/images/resource/backgroundimg2.png);"></span>
    <span class="backgroundimg3-click" style="background-image: url(../assets/customAssets/images/resource/backgroundimg3.png);"></span>
    <span class="backgroundimg4-click" style="background-image: url(../assets/customAssets/images/resource/backgroundimg4.png);"></span>
    <span class="backgroundimg5-click" style="background-image: url(../assets/customAssets/images/resource/backgroundimg5.png);"></span>
  </div>
</div><!-- Options Panel -->
<div class="pg-tp">
    <i class="ion-cube"></i>
    <div class="pr-tp-inr">
        <h4>Currently Scanning Page <br> <strong id="pageName">
		  <?php  echo $page; ?></strong><span></span> </h4>
        <span>Security at its basic Form</span>
    </div>
</div><!-- Page Top -->

<div class="panel-content">
    
    
<div class="load" id="loadingBar" >
  <div class="gear one">
    <svg id="blue" viewbox="0 0 100 100" fill="#94DDFF">
      <path d="M97.6,55.7V44.3l-13.6-2.9c-0.8-3.3-2.1-6.4-3.9-9.3l7.6-11.7l-8-8L67.9,20c-2.9-1.7-6-3.1-9.3-3.9L55.7,2.4H44.3l-2.9,13.6      c-3.3,0.8-6.4,2.1-9.3,3.9l-11.7-7.6l-8,8L20,32.1c-1.7,2.9-3.1,6-3.9,9.3L2.4,44.3v11.4l13.6,2.9c0.8,3.3,2.1,6.4,3.9,9.3      l-7.6,11.7l8,8L32.1,80c2.9,1.7,6,3.1,9.3,3.9l2.9,13.6h11.4l2.9-13.6c3.3-0.8,6.4-2.1,9.3-3.9l11.7,7.6l8-8L80,67.9      c1.7-2.9,3.1-6,3.9-9.3L97.6,55.7z M50,65.6c-8.7,0-15.6-7-15.6-15.6s7-15.6,15.6-15.6s15.6,7,15.6,15.6S58.7,65.6,50,65.6z"></path>
    </svg>
  </div>
  <div class="gear two">
    <svg id="pink" viewbox="0 0 100 100" fill="#FB8BB9">
      <path d="M97.6,55.7V44.3l-13.6-2.9c-0.8-3.3-2.1-6.4-3.9-9.3l7.6-11.7l-8-8L67.9,20c-2.9-1.7-6-3.1-9.3-3.9L55.7,2.4H44.3l-2.9,13.6      c-3.3,0.8-6.4,2.1-9.3,3.9l-11.7-7.6l-8,8L20,32.1c-1.7,2.9-3.1,6-3.9,9.3L2.4,44.3v11.4l13.6,2.9c0.8,3.3,2.1,6.4,3.9,9.3      l-7.6,11.7l8,8L32.1,80c2.9,1.7,6,3.1,9.3,3.9l2.9,13.6h11.4l2.9-13.6c3.3-0.8,6.4-2.1,9.3-3.9l11.7,7.6l8-8L80,67.9      c1.7-2.9,3.1-6,3.9-9.3L97.6,55.7z M50,65.6c-8.7,0-15.6-7-15.6-15.6s7-15.6,15.6-15.6s15.6,7,15.6,15.6S58.7,65.6,50,65.6z"></path>
    </svg>
  </div>
  <div class="gear three">
    <svg id="yellow" viewbox="0 0 100 100" fill="#FFCD5C">
      <path d="M97.6,55.7V44.3l-13.6-2.9c-0.8-3.3-2.1-6.4-3.9-9.3l7.6-11.7l-8-8L67.9,20c-2.9-1.7-6-3.1-9.3-3.9L55.7,2.4H44.3l-2.9,13.6      c-3.3,0.8-6.4,2.1-9.3,3.9l-11.7-7.6l-8,8L20,32.1c-1.7,2.9-3.1,6-3.9,9.3L2.4,44.3v11.4l13.6,2.9c0.8,3.3,2.1,6.4,3.9,9.3      l-7.6,11.7l8,8L32.1,80c2.9,1.7,6,3.1,9.3,3.9l2.9,13.6h11.4l2.9-13.6c3.3-0.8,6.4-2.1,9.3-3.9l11.7,7.6l8-8L80,67.9      c1.7-2.9,3.1-6,3.9-9.3L97.6,55.7z M50,65.6c-8.7,0-15.6-7-15.6-15.6s7-15.6,15.6-15.6s15.6,7,15.6,15.6S58.7,65.6,50,65.6z"></path>
    </svg>
  </div>
  <div class="lil-circle"></div>
  <svg class="blur-circle">
    <filter id="blur">
      <fegaussianblur in="SourceGraphic" stddeviation="13"></fegaussianblur>
    </filter>
    <circle cx="70" cy="70" r="66" fill="transparent" stroke="white" stroke-width="40" filter="url(#blur)"></circle>
  </svg>
</div>
<div class="text" id="scanType" style="color:#000000;margin-bottom:140px;" >loading</div>
    
	
	
	
	
<div class="card">
    <div class="card-body">
 
        <h6 class="text-muted card-subtitle mb-2">Progress</h6>
        <p class="card-text"></p>
       <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
		 
</div>
        <h4>File Information  </h4><!-- Progress information -->
	    <div id="information" style="width"></div>

    </div>
</div>   
	<div class="widget pad50-40">
    <div class="timeline-wrp">
      <div class="timeline-innr">
        <div class="timeline-label"><span class="brd-rd5 blue-bg">Output</span></div>
		<div class="timeline-block">
          <span class="pst-tm"><i class="ion-clock"></i> Progress </span>
          <i class="sts online"></i>
          <div class="brd-rd5 act-pst">
            <img class="brd-rd50" src="images/resource/acti-thmb2.jpg" alt="">
            <div class="act-pst-inf">
              <div class="act-pst-inr"><h5><a href="#" title="">File  </a></h5> Created as <a href="#" title=""><code id="temp" ></code></a></div>
              <div class="act-pst-dta">
                <p>File created with Your Project name </p>
              </div>
            </div>
          </div>
        </div>
        <div class="timeline-block">
          <span class="pst-tm"><i class="ion-clock"></i> Detailed Report</span>
          <i class="sts away"></i>
          <div class="brd-rd5 act-pst">
            <img class="brd-rd50" src="images/resource/acti-thmb1.jpg" alt="">
            <div class="act-pst-inf">
              <div class="act-pst-inr"><h5><a href="#" title="">JSON  Files</a></h5> saved in <a href="#" title="">  <?php echo getcwd();?></a></div>
              <div class="act-pst-dta">
			  <p>This is the Directory which has all the Scan reports In JSON File</p>
              </div>
            </div>
          </div>
        </div>
        
        
        <div class="timeline-label"><a class="brd-rd5 blue-bg" href="#" title="">The End</a></div>
      </div>
    </div>
  </div>
     
<div class="col" hidden>
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
   

                </div>

                <div class="col-md-4">
                    <h4 id="scan">Scan Type</h4>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    
//    
//error_reporting(0);
//@ini_set('display_errors', 0);
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
$_SESSION['TotalScanned']=0;
$_SESSION['scannedLines']=0;

    
$name=array();
$TotalLinesArray=array();
$ScannedLines=array();
$vulnerableLines=array();
$securedLines=array();
    
    
    
$_SESSION['LogFileName']='Temp';
$GLOBALS['LogFileName']='Temp';
header('Cache-Control: no-cache');
//session_destroy();  
ini_set('max_execution_time', 3000000);
$configDir=getcwd();
chdir($_SESSION['search']);
	
$_SESSION['Secured']=0;
  
    
$workDir=getcwd(); 
$scan=0;
$conFile = scandir($workDir);
$countOfAll=count($conFile);
  
// File Created for Temp File Storage
// function random_string($length) 
// {
//    $key = '';
//    $keys = array_merge(range(0, 9), range('a', 'z'));
//
//    for ($i = 0; $i < $length; $i++) {
//        $key .= $keys[array_rand($keys)];
//    }
//
//    return $key;
// }

$fileName= $_SESSION['projectName'];
mkdir($fileName);
filea($fileName);
//echo getcwd(); 
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
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background:linear-gradient(to right, #990033 0%, #000000 100%);;\">&nbsp;</div>";
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
		document.getElementById('pageName').innerHTML='".$conFile[$fullScan]."';
            </script>
        ";
$_SESSION['checkTypeCheckLine']=$typeChkLines;
chdir($fileName);
mkdir($conFile[$fullScan]);
chdir($conFile[$fullScan]);
    
$Mainaddress=getcwd(); 

startCode($Mainaddress,$typeChkLines);  
scantype('CodeExecution',$conFile[$fullScan]);

startCmd($Mainaddress,$typeChkLines);  
 scantype('CodeExecution',$conFile[$fullScan]);
 
 
startFileDis($Mainaddress,$typeChkLines);  
scantype('File Disclosure',$conFile[$fullScan]);
    
startfileInc($Mainaddress,$typeChkLines);  
scantype('File Inclusion',$conFile[$fullScan]);
    
startFileMan($Mainaddress,$typeChkLines);  
 scantype('File Manipulation',$conFile[$fullScan]);   
 
startHttpRes($Mainaddress,$typeChkLines);  
scantype('Http Res Vuln',$conFile[$fullScan]);   

startProtoc($Mainaddress,$typeChkLines);  
scantype('Protocol Injection',$conFile[$fullScan]);


startFileReflec($Mainaddress,$typeChkLines);  
scantype('Reflection Injection',$conFile[$fullScan]);
    
startSession($Mainaddress,$typeChkLines);  
 scantype('Session Hijacking',$conFile[$fullScan]);   
 
StartSql($Mainaddress,$typeChkLines);  
scantype('Sql Injection',$conFile[$fullScan]);
 
startUserInput($Mainaddress,$typeChkLines);  
 scantype('User Input Checker',$conFile[$fullScan]);
    
startXSS($Mainaddress,$typeChkLines); 
scantype('XSS Crossite Scripting',$conFile[$fullScan]);
    
startXpath($Mainaddress,$typeChkLines);  
scantype('Xpath Injection',$conFile[$fullScan]);
 
      
    array_push($name,$conFile[$fullScan]);
    
     $totalLinesSum=13*$_SESSION['TotalLinesofFile'];
    $_SESSION['TotalScanned']=$_SESSION['TotalScanned']+$totalLinesSum;
    array_push($TotalLinesArray,$totalLinesSum);
    
    
  //Calculating lines Scanned
   $cmdold1=$_SESSION['TotalCmdLines']+$_SESSION['TotalCodeLines']+$_SESSION['TotalFileDisLines']+$_SESSION['TotalFileIncLines']+$_SESSION['TotalFileManLines']+$_SESSION['TotalHttpResLines']+$_SESSION['TotalProtocLines']+$_SESSION['TotalReflecLines']+$_SESSION['TotalSessionLines']+$_SESSION['TotalSqlLines']+$_SESSION['TotalUserLines']+$_SESSION['TotalxPathLines']+$_SESSION['TotalXSSLines']; 
    
    
    $presentTotal=$cmdold1-$cmdOld2;
     $_SESSION['scannedLines']= $_SESSION['scannedLines']+$presentTotal;
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
    sleep(0.5);
    
}

    function filea($fileName)
    {
         echo "
            <script type=\"text/javascript\">
            document.getElementById('temp').innerHTML='".$fileName."';
            </script>
        ";
    }
?>
    
    
    
    
    
    
    
    
    
    
    
    
    
   <link rel="stylesheet" href="../assets/js/progress.js">
    <script type="text/x-javascript" src="../assets/js/loading-bar.js"></script>
	
	 
<?php
    if(isset($_SESSION['TotalCmdLines'])&&isset($_SESSION['TotalCodeLines'])&&isset($_SESSION['TotalFileDisLines'])&&isset($_SESSION['TotalFileIncLines'])&&isset($_SESSION['TotalFileManLines'])&&isset($_SESSION['TotalHttpResLines'])&&isset($_SESSION['TotalProtocLines'])&&isset($_SESSION['TotalReflecLines'])&&isset($_SESSION['TotalSessionLines'])&&isset($_SESSION['TotalSqlLines'])&&isset(
$_SESSION['TotalUserLines'])&&isset($_SESSION['TotalxPathLines'])&&isset($_SESSION['TotalXSSLines']))
    {
        $temp=$_SESSION['TotalCmdLines']+$_SESSION['TotalCodeLines']+$_SESSION['TotalFileDisLines']+$_SESSION['TotalFileIncLines']+$_SESSION['TotalFileManLines']+$_SESSION['TotalHttpResLines']+$_SESSION['TotalProtocLines']+$_SESSION['TotalReflecLines']+$_SESSION['TotalSessionLines']+$_SESSION['TotalSqlLines']+$_SESSION['TotalUserLines']+$_SESSION['TotalxPathLines']+$_SESSION['TotalXSSLines'];
	    echo "<p style='color:rgb(238, 238, 238);'>".$temp."</p>";
    }
	
	
	     if(isset($_SESSION['TotalCmdLines'])&&isset($_SESSION['TotalCodeLines'])&&isset($_SESSION['TotalFileDisLines'])&&isset($_SESSION['TotalFileIncLines'])&&isset($_SESSION['TotalFileManLines'])&&isset($_SESSION['TotalHttpResLines'])&&isset($_SESSION['TotalProtocLines'])&&isset($_SESSION['TotalReflecLines'])&&isset($_SESSION['TotalSessionLines'])&&isset($_SESSION['TotalSqlLines'])&&isset(
$_SESSION['TotalUserLines'])&&isset($_SESSION['TotalxPathLines'])&&isset($_SESSION['TotalXSSLines']))
    {
        $totalScanedlines=$_SESSION['TotalCmdLines']+$_SESSION['TotalCodeLines']+$_SESSION['TotalFileDisLines']+$_SESSION['TotalFileIncLines']+$_SESSION['TotalFileManLines']+$_SESSION['TotalHttpResLines']+$_SESSION['TotalProtocLines']+$_SESSION['TotalReflecLines']+$_SESSION['TotalSessionLines']+$_SESSION['TotalSqlLines']+$_SESSION['TotalUserLines']+$_SESSION['TotalxPathLines']+$_SESSION['TotalXSSLines'];
    }

$unsecured=$_SESSION['TotalCmdVulnLines']+$_SESSION['TotalCodeVulnLines']+$_SESSION['TotalFileDisVulnLines']+$_SESSION['TotalFileIncVulnLines']+$_SESSION['TotalFileManVulnLines']+$_SESSION['TotalHttpResVulnLines']+$_SESSION['TotalProtocVulnLines']+$_SESSION['TotalReflecVulnLines']+$_SESSION['TotalSessionVulnLines']+$_SESSION['TotalSqlVulnLines']+$_SESSION['TotalXSSVulnLines']+$_SESSION['TotalxPathVulnLines'];
 

//echo "
//            <script type=\"text/javascript\">
//             
//            document.getElementById('totalScanedlines').innerText=".$totalScanedlines."; 
//          document.getElementById('vulnLines').innerText=".$unsecured."; 
//            document.getElementById('secureLines').innerText=".$_SESSION['Secured']."; 
//            document.getElementById('totalScan').innerText=".$_SESSION['totalFileLines'].";
//            
//            
//            </script>
//            ";
//echo "<div class='container card'>";
//echo "<div class='card-body
//'>";
//echo "<br>";
//    echo "Vuln Cmd lines are   ".$_SESSION['TotalCmdVulnLines'];echo "<br>";
//    echo "Vuln Code lines are ".$_SESSION['TotalCodeVulnLines'];echo "<br>";
//    echo "Vuln File DIs lines are ".$_SESSION['TotalFileDisVulnLines'];echo "<br>"; 
//    echo "Vuln File Inc lines are ".$_SESSION['TotalFileIncVulnLines']; echo "<br>";
//    echo "Vuln File Man lines are ".$_SESSION['TotalFileManVulnLines']; echo "<br>";
//    echo "Vuln  HTTP Res lines are ".$_SESSION['TotalHttpResVulnLines'];  echo "<br>";
//    echo "Vuln  Protocol lines are ".$_SESSION['TotalProtocVulnLines'];echo "<br>";
//    echo "Vuln  Reflection lines are ".$_SESSION['TotalReflecVulnLines'];echo "<br>";
//    echo "Vuln  Session lines are ".$_SESSION['TotalSessionVulnLines'];echo "<br>";
//    echo "Vuln  Sql Vuln lines are ".$_SESSION['TotalSqlVulnLines'];echo "<br>";  echo "Vuln  User  Vuln lines are ".$_SESSION['TotalUserVulnLines']; echo "<br>";echo "Vuln  XSS  Vuln lines are ".$_SESSION['TotalXSSVulnLines'];echo "<br>";
//    echo "Vuln  Xpath  Vuln lines are ".$_SESSION['TotalxPathVulnLines'];echo "<br>";
//echo "</div>";
//echo "</div>";
//    
    
    ?>
    
      
    <div class="filter-items">
        <div class="row grid-wrap mrg20">
            <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget" style="background-color:#ffffff;">
                 
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="fa fa-code" style="color:#13aaf9 "></i>
                    <div class="stat-box-innr">
                        <span><i class="counter" id=' ' style="color:black">
					<?php echo $_SESSION['TotalScanned']; ?></i></span>
                        <h5 style="color:black">Total No Of Lines </h5>
                    </div>
                </div>
            </div>
            <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget" style="background-color:#ffffff;" >
                   
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="ion-code" style="color:#e56262;"></i>
                    <div class="stat-box-innr">
                        <span><i class="counter" id=" " style="color:black">
					<?php echo $unsecured; ?></i></span>
                        <h5 style="color:black">Total No of Unsecured</h5>
                    </div>
                </div>
            </div>
         <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget" style="color:#ffffff">
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="ion-code-working" style="color:#6dba7f"></i>
                    <div class="stat-box-innr">
                        <span><i class="counter" id=" " style="color:black"> 
					<?php echo $_SESSION['Secured']; ?></i></span>
                        <h5 style="color:black">Total No of Lines Secured</h5>
                    </div>
                  
                </div>
            </div>
            <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget" style="background-color:#ffffff">
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="ion-code-download" style="color:#d3d3d3"></i>
                    <div class="stat-box-innr">
				  <span><i class="counter" id=" " style="color:black">
					  <?php echo  $_SESSION['scannedLines']; ?> </i></span>
                        <h5 style="color:black">No of Lines Scanned in File</h5>
                    </div>
                    
                </div>
            </div>
        </div><!-- Filter Items -->
    
    </div>

            <div class="col m12 grid-item col s12 col l12">
                <div class="widget proj-order pad50-40">
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <h4 class="widget-title">Scanned Report</h4>
                    <a class="add-proj brd-rd5" href="#" data-toggle="tooltip" title="Add Project" data-tooltip="Add Project">+</a>
                    <div class="slct-bx">
                        <i class="ion-android-funnel"> Sort By:</i>
                        <span>
                            <select>
                                <option>Name</option>
                                <option>Total Lines</option>
                                <option>Scanned Lines</option>
                                <option>Vulnerable Lines</option>
                                <option>Secured Lines</option>
                            </select>
                        </span>
                    </div>
                    <div class="table-wrap">
                        <table class="table table-bordered style2">
                            <thead><tr><th>#</th><th>Name</th><th>Total Lines</th><th>Scanned Lines</th><th>Vulnerable Lines</th><th>Secured Lines</th></tr></thead>
                            <tbody>
                                
                                
                                <?php
                                
                                
                                
                                
                                $limit=count($name);
                                
                                
                                $j=0;
                                
                                for($i=0;$i<$limit;$i++)
                                {
                            $j++;
                               echo "<tr>
                                    <td><span class='blue-bg indx'>".$j."</span></td>
                                    <td><span class='date'>".$name[$i]."</span></td>
                                    <td><h4 class='name'>".$TotalLinesArray[$i]."</h4></td>
                                    <td><span class='ph#'>".$ScannedLines[$i]."</span></td>
                                    <td><span class='addr'>".$vulnerableLines[$i]."</span></td>
                                    <td><span class='addr'>".$securedLines[$i]."</span></td>
                                </tr>
                                ";
                                   
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
	<div class="col m12 grid-item col s12 col l12">
                <div class="widget proj-order pad50-40">
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <h4 class="widget-title">Vulnerable Attacks Report </h4>
                    <a class="add-proj brd-rd5" href="#" data-toggle="tooltip" title="Add Project" data-tooltip="Add Project">+</a>
                    <div class="slct-bx">
                        <i class="ion-android-funnel"> Sort By:</i>
                        <span>
                            <select>
                                <option>Attack Name</option>
                                <option>No Of Vulnerable Lines</option> 
                            </select>
                        </span>
                    </div>
                    <div class="table-wrap">
                        <table class="table table-bordered style2">
                            <thead><tr><th>#</th><th>Attack Name</th><th>Total Vulnerable Lines</th> </tr></thead>
                            <tbody>
                                <tr>
                                    <td><span class="blue-bg indx">1</span></td>
                                    <td><span class="date">Command Injection</span></td>
                                    <td><h4 class="name"><?php  echo $_SESSION['TotalCmdVulnLines']; ?></h4></td> 
                                </tr>   
					     <tr>
                                    <td><span class="blue-bg indx">2</span></td>
                                    <td><span class="date">Code Injection </span></td>
                                     <td><h4 class="name"><?php  echo  $_SESSION['TotalCodeVulnLines']  ; ?></h4></td> 
                                </tr>   
					     <tr>
                                    <td><span class="blue-bg indx">3</span></td>
                                    <td><span class="date">File Disclosure</span></td>
                                     <td><h4 class="name"><?php  echo  $_SESSION['TotalFileDisVulnLines']  ; ?></h4></td> 
                                </tr>   
					     <tr>
                                    <td><span class="blue-bg indx">4</span></td>
                                    <td><span class="date">File Inclusion</span></td>
                                           <td><h4 class="name"><?php  echo   $_SESSION['TotalFileIncVulnLines'] ; ?></h4></td> 
                                </tr>   
					     <tr>
                                    <td><span class="blue-bg indx">5</span></td>
                                    <td><span class="date">File Manipulation</span></td>
        					<td><h4 class="name"><?php  echo    $_SESSION['TotalFileManVulnLines']; ?></h4></td> 
                                </tr> 
					    <tr>
                                    <td><span class="blue-bg indx">5</span></td>
                                    <td><span class="date">Http Response Splitting</span></td>
                                      <td><h4 class="name"><?php  echo   $_SESSION['TotalHttpResVulnLines']; ?></h4></td> 
                                </tr> 
					    <tr>
                                    <td><span class="blue-bg indx">5</span></td>
                                    <td><span class="date">Protocol Injection</span></td>
                                     <td><h4 class="name"><?php  echo   $_SESSION['TotalProtocVulnLines'] ; ?></h4></td> 
                                </tr> 
					     <tr>
                                    <td><span class="blue-bg indx">5</span></td>
                                    <td><span class="date">Reflection Injection </span></td>
                                     <td><h4 class="name"><?php  echo  $_SESSION['TotalReflecVulnLines']  ; ?></h4></td> 
                                </tr> 
					     <tr>
                                    <td><span class="blue-bg indx">5</span></td>
                                    <td><span class="date">Session Hijacking</span></td>
                                      <td><h4 class="name"><?php  echo  $_SESSION['TotalSessionVulnLines']  ; ?></h4></td> 
                                </tr> 
					     <tr>
                                    <td><span class="blue-bg indx">5</span></td>
                                    <td><span class="date">Sql Injection</span></td>
                                    <td><h4 class="name"><?php  echo   $_SESSION['TotalSqlVulnLines'] ; ?></h4></td> 
                                     
                                </tr> 
					     <tr>
                                    <td><span class="blue-bg indx">5</span></td>
                                    <td><span class="date">User Input </span></td>
                               <td><h4 class="name"><?php  echo    $_SESSION['TotalUserVulnLines']; ?></h4></td> 
                                </tr> 
					     <tr>
                                    <td><span class="blue-bg indx">5</span></td>
                                    <td><span class="date">XSS Scripting</span></td>
                                  <td><h4 class="name"><?php  echo  $_SESSION['TotalXSSVulnLines']  ; ?></h4></td> 
                                </tr> 
					    <tr>
                                    <td><span class="blue-bg indx">5</span></td>
                                    <td><span class="date">XPath Injection</span></td>
                                 <td><h4 class="name"><?php  echo   $_SESSION['TotalxPathVulnLines'] ; ?></h4></td> 
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    <style>
#chartdiv {
  width: 100%;
  height: 700px;
}

</style>
    <div class="card" id="chartdiv"></div>
    <!-- Styles -->



<!-- Chart code -->
    
 

<!-- HTML -->

</div><!-- Panel Content -->
<footer>
  <p>Copyright <a href="#" title="">Aiplus Company</a> &amp; 2017 - 2018</p>
  <span>10GB of 250GB Free.</span>
</footer>
<!-- Vendor: Javascripts -->
<script src="../assets/customAssets/js/jquery.min.js" type="text/javascript"></script>
<!-- Vendor: Followed by our custom Javascripts -->
<script src="../assets/customAssets/js/materialize.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/select2.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/slick.min.js" type="text/javascript"></script>
<!-- Our Website Javascripts -->
<script src="../assets/customAssets/js/isotope.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/isotope-int.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.counterup.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/waypoints.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/highcharts.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/exporting.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/highcharts-more.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/moment.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.circliful.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/fullcalendar.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.downCount.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.formtowizard.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/form-validator.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/form-validator-lang-en.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/cropbox-min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/ion.rangeSlider.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.poptrox.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/styleswitcher.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/main.js" type="text/javascript"></script>  
<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
<script type="text/javascript" src="https://unpkg.com/popper.js@1.14.6/dist/umd/popper.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../assets/scanLoader/index.js"></script>
      <script>
          
          
        document.onreadystatechange = function () 
        {
  var state = document.readyState
  if (state == 'complete') {
         document.getElementById('interactive');
      
      document.getElementById('scanType').style.visibility="none"; 
      document.getElementById('scanType').style.opacity= 0;
      document.getElementById('scanType').style.width= '0px';
      document.getElementById('scanType').style.height= '0px';
      document.getElementById('scanType').style.marginBottom= '-60px';
      document.getElementById('scanType').style.transition = "all 1s";
	  
     document.getElementById('loadingBar').style.visibility="none"; 
      document.getElementById('loadingBar').style.opacity= 0;
      document.getElementById('loadingBar').style.width= '0px';
      document.getElementById('loadingBar').style.height= '0px';
      document.getElementById('loadingBar').style.transition = "all 2s";
    
   
}
     
  }
        </script>
</body>
</html>

<?php
  

echo "
            <script type=\"text/javascript\">
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var iconPath = 'M421.976,136.204h-23.409l-0.012,0.008c-0.19-20.728-1.405-41.457-3.643-61.704l-1.476-13.352H5.159L3.682,74.507 C1.239,96.601,0,119.273,0,141.895c0,65.221,7.788,126.69,22.52,177.761c7.67,26.588,17.259,50.661,28.5,71.548  c11.793,21.915,25.534,40.556,40.839,55.406l4.364,4.234h206.148l4.364-4.234c15.306-14.85,29.046-33.491,40.839-55.406  c11.241-20.888,20.829-44.96,28.5-71.548c0.325-1.127,0.643-2.266,0.961-3.404h44.94c49.639,0,90.024-40.385,90.024-90.024  C512,176.588,471.615,136.204,421.976,136.204z M421.976,256.252h-32c3.061-19.239,5.329-39.333,6.766-60.048h25.234  c16.582,0,30.024,13.442,30.024,30.024C452,242.81,438.558,256.252,421.976,256.252z'

var chart = am4core.create('chartdiv', am4charts.SlicedChart);
chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect
chart.paddingLeft = 150;

chart.data = [
{
    'name': ' Code Injection',
    'value': ".$_SESSION['TotalCmdVulnLines'].",
    'disabled':true
}, 
{
    'name': ' Command  Injection',
    'value': ".$_SESSION['TotalCodeVulnLines'].",
    'disabled':true
}, 
{
    'name': '  File Disclosure ',
    'value': ".$_SESSION['TotalFileDisVulnLines'].",
    'disabled':true
}, 
{
    'name': ' File Inclusion',
    'value': ".$_SESSION['TotalFileIncVulnLines'].",
    'disabled':true
}, 
{
    'name': ' File Manipuation',
    'value': ".$_SESSION['TotalFileManVulnLines'].",
    'disabled':true
}, 
{
    'name': ' HTTP Resolution',
    'value': ".$_SESSION['TotalHttpResVulnLines'].",
    'disabled':true
}, 
{
    'name': ' Protocol Injection',
    'value': ".$_SESSION['TotalProtocVulnLines'].",
    'disabled':true
}, 
{
    'name': ' Reflection Injection',
    'value': ".$_SESSION['TotalReflecVulnLines'].",
    'disabled':true
}, 

{
    'name': ' Session Hijacking',
    'value': ".$_SESSION['TotalSessionVulnLines'].",
    'disabled':true
},

{
    'name': ' Sql Injection',
    'value': ".$_SESSION['TotalSqlVulnLines'].",
    'disabled':true
},

{
    'name': ' User Input Injection',
    'value': ".$_SESSION['TotalUserVulnLines'].",
    'disabled':true
},

{
    'name': ' XPath  Injection',
    'value': ".$_SESSION['TotalxPathVulnLines'].",
    'disabled':true
},

{
    'name': ' XSS Scripting',
    'value': ".$_SESSION['TotalXSSVulnLines'].",
    'disabled':true
}
];

var series = chart.series.push(new am4charts.PictorialStackedSeries());
series.dataFields.value = 'value';
series.dataFields.category = 'name';
series.alignLabels = true;
// this makes only A label to be visible
series.labels.template.propertyFields.disabled = 'disabled';
series.ticks.template.propertyFields.disabled = 'disabled';


series.maskSprite.path = iconPath;
series.ticks.template.locationX = 1;
series.ticks.template.locationY = 0;

series.labelsContainer.width = 100;

chart.legend = new am4charts.Legend();
chart.legend.position = 'top';
chart.legend.paddingRight = 160;
chart.legend.paddingBottom = 40;
let marker = chart.legend.markers.template.children.getIndex(0);
chart.legend.markers.template.width = 40;
chart.legend.markers.template.height = 40;
marker.cornerRadius(20,20,20,20);
            </script>
        ";
        ?>