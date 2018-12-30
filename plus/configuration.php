<?php

chdir('/Applications/MAMP/htdocs/dept');
$workDir=getcwd();
$conFile = scandir($workDir);
//print_r($conFile);

$httpTotalLines=0;  //to count no of lines
$noLines=0;         //To count no of lines
$noVulLines=0;       //TO count no of Vuln varaibles

$typeChkLines = file($conFile[10]); 


$SERVER['checkFileName']=$typeChkLines;

//print_r($typeChkLines);
function code($typeChkLines)
{
    
$SERVER['checkFileName']=$typeChkLines;
    
require_once 'codeExeVulnChk.php';
ob_end_clean ();
}
function sql($typeChkLines)
{
   
$SERVER['checkFileName']=$typeChkLines; 
require_once 'sqlVulChecker.php';
}

code($typeChkLines);
sql($typeChkLines);
?>