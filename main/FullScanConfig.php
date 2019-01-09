<?php
session_start();

ini_set(‘error_reporting’, E_ALL);
ini_set(‘display_errors’, 1);
$_SESSION['TotalCmdLines']		=0;
$_SESSION['TotalCmdVulnLines']	=0;
$_SESSION['TotalCodeLines']		=0;
$_SESSION['TotalCodeVulnLines']	=0;
$_SESSION['TotalFileDisLines']	=0;
$_SESSION['TotalFileDisVulnLines']=0;           
$_SESSION['TotalFileIncLines']	=0;
$_SESSION['TotalFileIncVulnLines']=0;
$_SESSION['TotalFileManLines']	=0;
$_SESSION['TotalFileManVulnLines']=0;
$_SESSION['TotalHttpResLines']	=0;
$_SESSION['TotalHttpResVulnLines']=0;
$_SESSION['TotalProtocLines']	=0;
$_SESSION['TotalProtocVulnLines']=0;           
$_SESSION['TotalReflecLines']	=0;
$_SESSION['TotalReflecVulnLines']=0;
$_SESSION['TotalSessionLines']	=0;
$_SESSION['TotalSessionVulnLines']=0;
$_SESSION['TotalSqlLines']		=0;
$_SESSION['TotalSqlVulnLines']	=0;
$_SESSION['TotalUserLines']		=0;
$_SESSION['TotalUserVulnLines']	=0;
$_SESSION['TotalxPathLines']	=0;
$_SESSION['TotalxPathVulnLines']=0;
$_SESSION['TotalXSSLines']		=0;
$_SESSION['TotalXSSVulnLines']	=0;

//    
//unset($_SESSION['TotalCmdLines']);unset($_SESSION['TotalCodeLines']);unset($_SESSION['TotalFileDisLines']);unset($_SESSION['TotalFileIncLines']);unset($_SESSION['TotalFileManLines']);unset($_SESSION['TotalHttpResLines']);unset($_SESSION['TotalProtocLines']);unset($_SESSION['TotalReflecLines']);unset($_SESSION['TotalSessionLines']);unset($_SESSION['TotalSqlLines']);unset(
//$_SESSION['TotalUserLines']);unset($_SESSION['TotalxPathLines']);unset($_SESSION['TotalXSSLines']);
//   
//if(!isset($_SESSION['TotalxPathLines']))
//{
//    echo "Done";
//}
?> 