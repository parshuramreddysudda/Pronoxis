<?php
include 'Sessionfile.php';
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

if(isset( $_SESSION['projectName']))
{
$wr=$_SESSION['projectName'];
 

chdir($_SESSION['search']);
    
$workDir=getcwd();

    
$conFile = scandir($workDir);
//print_r($conFile);

$page=$_POST['page'];

$val=array_search($page,$conFile);
 

   //Created for output Buffer initialization and executin  
    
    
    
$typeChkLines = file($conFile[$val]); 

    
$_SESSION['checkFileName']=$typeChkLines;
    
    mkdir($_SESSION['projectName']." Pronoxis Scanned Files");
    
chdir($_SESSION['projectName']." Pronoxis Scanned Files");
mkdir($page." File Vuln");
chdir($page." File Vuln");
$_SESSION['partScanAdress']=getcwd();
    
    
    function sqlInjection()
    {
        echo "<object class='embed-responsive-item' data='sqlVulChecker.php' scrolling='no' style='position: relative; width:100%; height:500px;' frameborder='0' type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
        
    }
    
     function xssExecute()
    {
            
         echo "<object class='embed-responsive-item' data='xssVulChecker.php' scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
          
    }
    function xPath()
    {
             
         echo "<object class='embed-responsive-item' data='xPathVulChk.php' scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
          
    }
      function codeExec()
    {
             
         echo "<object class='embed-responsive-item' data='codeExeVulnChk.php' scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
          
     
    }
    
    function HttpResponce()
    {   
         echo "<object class='embed-responsive-item' data='HttpResVulChk.php' scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
       
    }
    function LDAPInjec()
    {
          
         echo "<object class='embed-responsive-item' data='codeExeVulnChk.php'  scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
      
    }
    function sessionFix()
    {
        
         echo "<object class='embed-responsive-item' data='sessionFixVulnChk.php'  scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
       
    }
     function objInjection()
    {      
         echo "<object class='embed-responsive-item' data='ProtocolInjVulnChk.php'  scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0' type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
          

    }
     function fileIncl()
    {
      echo "<object class='embed-responsive-item' data='fileIncVulnChk.php'  scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
          
         ;
    }
    
    function fileManip()
    {     
         echo "<object class='embed-responsive-item' data='fileManpVulnChk.php'  scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
         
        
    }
      function cmdExeExecute()
    {
          
          
               
         echo "<object class='embed-responsive-item' data='cmdExeVulnChecker.php'  scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0' type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
          
    }
    
  
    function fileDisVuln()
    {
        
             
         echo "<object class='embed-responsive-item' data='fileDisVUlnChk.php' scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
        
    }  
    
    function reflex()
    {
        
             
         echo "<object class='embed-responsive-item' data='ReflectionVulnChk.php' scrolling='no' style='position:relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";
         
    } 
    function UserInput()
    {     
         echo "<object class='embed-responsive-item' data='userInputVulnChk.php' scrolling='no' style='position: relative; height: 500px; width: 100%;' frameborder='0'  type='text/html'>
    Nothing to Displayed :( May be Wrong with the Url. Try to Cook
</object>";

    }
    

}
   

?> 



<!doctype html>
<html lang="en"> 

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Pronoxis By Decrypter
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="../assets/fonts/product-sans/Product%20Sans%20Regular.ttf" rel="stylesheet">
    
    <link href="../assets/helvetica/HELR45W.ttf" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.css">
    <link rel="stylesheet" href="../assets/pageLoading/style.css">

    <style >
/*
#load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("https://i.imgur.com/Gp6xPjs.gif") no-repeat center center rgba(1,0,0,0.73);
} 
*/
    </style>
</head>

<body onbeforeunload="return window.location.reload(true)">
    <div id="load" style="background-color:#fffff"></div>
  
      <!-- Navbar -->
  <nav class="navbar navbar-light navbar-expand-md">
    <div class="container-fluid">
         <a class="navbar-brand" href="#" style="background-image:url(../assets/img/logo.png);background-position: center;background-size: contain;background-repeat: no-repeat">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>      
          
        <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
             <span class="navbar-toggler-icon"></span>
             <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"
            id="navcol-1">
            <form class="form-inline ml-auto"><button class="btn btn-link" type="button" style="color: black;font-family: 'Product Sans', sans-serif;">Source Code &nbsp<i class="fa fa-github"></i></button></form>
        </div>
    </div>
</nav>
        
          
<!--    Alert docx decomment it       -->
          
    
<!--    <div role="alert" class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons" style="margin-left:-1.3px">close</i></span></button><span><strong>Please upload only 10 file per scan .</strong></span></div>-->
     
      <!-- End Navbar -->
<!--

Animation
      <div class="preloader-wrap">
  <div class="percentage" id="precent"></div>
  <div class="loader">
    <div class="trackbar">
      <div class="loadbar"></div>
    </div>
    <div class="glow"></div>
  </div>
</div>
-->
  <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="background-color:rgb(107,146,193);">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"><img src="mountain_bg.jpg" class="img-fluid" style="margin-right:auto;margin-left:auto;display:block;"/></div>
                        <div class="col-md-6">
                            <h4 style="font-size:24px;color:#ffffff;">82849</h4>
                            <h4 style="color:#ffffff;">No of Lines</h4>
                        </div>
                    </div>
                    <p class="card-text" style="color:rgba(255,255,255,0.87);"><i class="fa fa-clock-o"></i>Updated Now</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="background-color:#e56262;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"><img src="mountain_bg.jpg" class="img-fluid" style="margin-right:auto;margin-left:auto;display:block;" /></div>
                        <div class="col-md-6">
                            <h4 style="font-size:24px;color:#ffffff;">82849</h4>
                            <h4 style="color:#ffffff;">No of Lines</h4>
                        </div>
                    </div>
                    <p class="card-text" style="color:rgba(255,255,255,0.87);"><i class="fa fa-clock-o"></i>Updated Now</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="background-color:rgb(107,146,193);">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"><img src="mountain_bg.jpg" class="img-fluid" style="margin-right:auto;margin-left:auto;display:block;" /></div>
                        <div class="col-md-6">
                            <h4 style="font-size:24px;color:#ffffff;">82849</h4>
                            <h4 style="color:#ffffff;">No of Lines</h4>
                        </div>
                    </div>
                    <p class="card-text" style="color:rgba(255,255,255,0.87);"><i class="fa fa-clock-o"></i>Updated Now</p>
                </div>
            </div>
        </div>
    </div>
</div>
      <div class="content">
        <div class="container-fluid">
          <div class="container">
              <h3 style="font-family: 'Product Sans', sans-serif;">Report of Pronoxis</h3>
    </div>
          </div>
    </div>
            
    <div class="card">
<div class="card-body">
    <h3 style="font-family: 'Product Sans', sans-serif;"><?php echo $page; ?>Vulnerabilties</h3>
    
    <div >
       
    


        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
            
           Sql Injection </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="https://www.owasp.org/index.php/SQL_Injection">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="https://www.owasp.org/index.php/SQL_Injection_Prevention_Cheat_Sheet">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'dba_open'=SQLinjection" style="background-color: #E12E6D" ><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="One traditional approach to prevent SQL injection attacks is to handle them as an input validation problem and either accept only characters from a whitelist of safe values or identify and escape a blacklist of potentially malicious values. Whitelisting can be a very effective means of enforcing strict input validation rules but parameterized SQL statements require less maintenance and can offer more guarantees with respect to security. As is almost always the case, blacklisting is riddled with loopholes that make it ineffective at preventing SQL injection attacks. 

Another solution commonly proposed for dealing with SQL injection attacks is to use stored procedures. " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="The platform affected can be: 

Language: SQL 

Platform: Any (requires interaction with a SQL database) 

SQL Injection has become a common issue with database-driven web sites. The flaw is easily detected, and easily exploited, and as such, any site or software package with even a minimal user base is likely to be subject to an attempted attack of this kind. 

Essentially, the attack is accomplished by placing a meta character into data input to then place SQL commands in the control plane, which did not exist there before. This flaw depends on the fact that SQL makes no real distinction between the control and data planes. 


                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content="SQL injection errors occur when: 

*Data enters a program from an untrusted source. 

*The data used to dynamically construct a SQL query 

The main consequences are: 

Confidentiality: Since SQL databases generally hold sensitive data, loss of confidentiality is a frequent problem with SQL Injection vulnerabilities. 

Authentication: If poor SQL commands are used to check user names and passwords, it may be possible to connect to a system as another user with no previous knowledge of the password. 

Authorization: If authorization information is held in a SQL database, it may be possible to change this information through the successful exploitation of a SQL Injection vulnerability. 

Integrity: Just as it may be possible to read sensitive information, it is also possible to make changes or even delete this information with a SQL Injection attack. " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <?php   StartSql($Mainaddress,$typeChkLines);  
scantype('Sql Injection');?>
                        
                        </div>
                    </div>
                </div>
                
                
                
            </div>
        </div>

    

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
            
           Cross-site scripting </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="https://www.owasp.org/index.php/XSS_Filter_Evasion_Cheat_Sheet">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'echo'=Cross-site Scripting" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content=" It's crucial that you turn off HTTP TRACE support on all web servers. An attacker can steal cookie data via Javascript even when document.cookie is disabled or not supported by the client. This attack is mounted when a user posts a malicious script to a forum so when another user clicks the link, an asynchronous HTTP Trace call is triggered which collects the user's cookie information from the server, and then sends it over to another malicious server that collects the cookie information so the attacker can mount a session hijack attack. This is easily mitigated by removing support for HTTP TRACE on all web server" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="XSS can cause a variety of problems for the end user that range in severity from an annoyance to complete account compromise. The most severe XSS attacks involve disclosure of the user’s session cookie, allowing an attacker to hijack the user’s session and take over the account. Other damaging attacks include the disclosure of end user files, installation of Trojan horse programs, redirect the user to some other page or site, or modify presentation of content.  

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content="Cross-Site Scripting (XSS) attacks occur when: 

Data enters a Web application through an untrusted source, most frequently a web request. 

The data is included in dynamic content that is sent to a web user without being validated for malicious content. " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                      <div class="card-body">
                        
                                     <h3>&nbsp Vulnerable Code</h3>
                    
                      <?php startXSS($Mainaddress,$typeChkLines); 
scantype('XSS Crossite Scripting');
      ?>
            
                        </div>  
                        
                       
                    </div>
                </div>
            </div>
        </div>
                
                <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
            
           Xpath Injection </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'xpath_eval'=Xpath Injection" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="There is a need to use a parameterized XPath interface if one is available, or escape the user input to make it safe to include in a dynamically constructed query. Using quotes to terminate untrusted input in a dynamically constructed XPath query can lead to the attack so there is a need to escape that quote in the untrusted input to ensure the untrusted data can't try to break out of that quoted context." style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="XPath Injection attacks occur when a web site uses user-supplied information to construct an XPath query for XML data. 

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content="XPath Injection attacks occur when a web site uses user-supplied information to construct an XPath query for XML data. " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No xss Details</p>
                            <p><?php startXpath($Mainaddress,$typeChkLines);  
scantype('Xpath Injection');   ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
                                <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
            
           Code Injection </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+''=Code Injection" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="These types of vulnerabilities can range from very hard to find, to easy to find If found, are usually moderately hard to exploit, depending of scenario If successfully exploited, impact could cover loss of confidentiality, loss of integrity, loss of availability, and/or loss of accountability. 
                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content=" These types of attacks are usually made possible due to a lack of proper input/output data validation, for example: allowed characters (standard regular expressions classes or custom) data format 

amount of expected data . " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No Details</p>
                            <p><?php startCode($Mainaddress,$typeChkLines);  
scantype('CodeExecution');
  ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
                                <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
            
           HTTP Response Splitting</div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'header'=HTTP response Splitting" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="Testing on the platform of concern to see if the underlying platform allows for CR or LF characters to be injected into headers. In general, this vulnerability has been fixed in most modern application servers, regardless of what language the code has been written in. " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="To mount a successful exploit, the application must allow input that contains CR (carriage return, also given by %0d or \r) and LF (line feed, also given by %0a or \n)characters into the header AND the underlying platform must be vulnerable to the injection of such characters. These characters not only give attackers control of the remaining headers and body of the response the application intends to send, but also allow them to create additional responses entirely under their control. 

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content="HTTP response splitting occurs when: Data enters a web application through an untrusted source, most frequently an HTTP request. The data is included in an HTTP response header sent to a web user without being validated for malicious characters.  " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No Details</p>
                        <p><?php startHttpRes($Mainaddress,$typeChkLines);  
scantype('Http Res Vuln');   ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
        
        
        
        
<!--
        
<div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
            
          Code Injection </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'ldap_add'=LDAP Injection" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="Input Validation : All user-end input must be sanitized. It should be free of suspicious characters and strings that can be malicious. 

 " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="Authentication bypass ,Privilege escalation,Information disclosure 
                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content="Injects LDAP (Lightweight Directory Access Protocol) statements to execute arbitrary LDAP commands including granting permissions and modifying the contents of an LDAP tree.  " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No Details</p>
                            <p><?php  LDAPInjec();?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
-->
                                <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
            
           Session fixation </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'setcookie'=Session Fixation" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="There is a need to use a parameterized XPath interface if one is available, or escape the user input to make it safe to include in a dynamically constructed query. Using quotes to terminate untrusted input in a dynamically constructed XPath query can lead to the attack so there is a need to escape that quote in the untrusted input to ensure the untrusted data can't try to break out of that quoted context." style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="XPath Injection attacks occur when a web site uses user-supplied information to construct an XPath query for XML data. 

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content="There are several techniques to execute the attack; it depends on how the Web application deals with session tokens.
                              Below are some of the most common techniques: 

                              • Session token in the URL argument: The Session ID is sent to the victim in a hyperlink and the victim accesses the site through the malicious URL. 

                              • Session token in a hidden form field: In this method, the victim must be tricked to authenticate in the target Web Server, using a login form developed for the attacker. The form could be hosted in the evil web server or directly in html formatted e-mail. 

                              • Session ID in a cookie:Client-side script  " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No Details</p>
                             <p><?php startSession($Mainaddress,$typeChkLines);  
 scantype('Session Hijacking');   ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
                                <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
            
         Protocol Injection </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values='unserialize'=PHP Object Injection" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="Do not use unserialize() function with user-supplied input, use JSON functions instead." style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="In order to successfully exploit a PHP Object Injection vulnerability two conditions must be met:The application must have a class which implements a PHP magic method (such as __wakeup or __destruct) that can be used to carry out malicious attacks, or to start a POP chain. 

All of the classes used during the attack must be declared when the vulnerable unserialize() is being called, otherwise object autoloading must be supported for such classes. 

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content="The vulnerability occurs when user-supplied input is not properly sanitized before being passed to the unserialize() PHP function. Since PHP allows object serialization, attackers could pass ad-hoc serialized strings to a vulnerable unserialize() call, resulting in an arbitrary PHP object(s) injection into the application scope.  " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No  SEssion Details</p>
                            <p><?php  startProtoc($Mainaddress,$typeChkLines); scantype('Protocol Injection');  
 ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
                 <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
            
     File inclusion </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'include'=File Inclusion" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="avoid passing user-submitted input to any filesystem/framework API. If this is not possible the application can maintain a white list of files, that may be included by the page, and then use an identifier (for example the index number) to access to the selected file. Any request containing an invalid identifier has to be rejected, in this way there is no attack surface for malicious users to manipulate the path. " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="Code execution on the web server Code execution on the client-side such as JavaScript which can lead to other attacks such as cross site scripting (XSS) ,Denial of Service (DoS) Sensitive Information Disclosure 

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content="This issue is occurred when an application builds a path to executable code using an attacker-controlled variable in a way that allows the attacker to control which file is executed at run time.   " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No Details</p>
                            <p><?php  startfileInc($Mainaddress,$typeChkLines);  
scantype('File Inclusion');  ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
                 <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
File manipulation </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'bzwrite'=File Manipulation" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="Avoiding this kind of vulnerability is similar to avoiding a local file upload vulnerability:Only allow specific file extensions. 
                        Only allow authorized and authenticated users to use the feature. 
                         Check any file fetched from the Web for content.
                    Make sure it is actually an image or whatever file type you expect. 

 " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="Code execution on the web server.Code execution on the client-side such as JavaScript which can lead to other attacks such as cross site scripting (XSS) 

 

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content="This attack occurs when: 
an application allows a user to upload a malicious file directly which is then executed. 

an application uses user input to fetch a remote file from a site on the Internet and store it locally. This file is then executed by an attacker.  " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No Manip</p>
                          <p>  <?php startFileMan($Mainaddress,$typeChkLines);  
 scantype('File Manipulation');    ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
         
                
             <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
File disclosure </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'bzread'=File disclosure" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="Save the file paths in a database and assign an ID to each of them. By doing so, users only see the ID and are not able to view or change the path. Use a whitelist of filenames and ignore every other filename and path. Instead of including files on the web server, store their content in databases where possible. 
 

 

 

 " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="If the webroot is getting leaked, attackers may abuse the knowledge and use it in combination with file inclusion vulnerabilites to steal configuration files regarding the web application or the rest of the operating system. 

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurence" data-content="A sensitive file exposure vulnerability is a situation which occurs when a file that is supposed to be private is accessible to the outside world via web server.  " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>       
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No File Dis Details</p>
                            <p><?php startFileDis($Mainaddress,$typeChkLines);  
scantype('File Disclosure');
     ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
          <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
Command execution </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'backticks'=Command execution" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="Perform proper input validation  Con" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="When a web application does not properly sanitize user-supplied input before using it within application code, it may be possible to trick the application into executing Operating System commands. The executed commands will run with the same permissions of the component that executed the command (e.g. Database server, Web application server, Web server, etc.) 

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurrence" data-content="Command execution attacks are possible when an application passes unsafe user supplied data (forms, cookies, HTTP headers etc.) to a system shell. In this attack, the attacker-supplied operating system commands are usually executed with the privileges of the vulnerable application.  
s  " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No Details</p>
                        <p><?php startCmd($Mainaddress,$typeChkLines);  
 scantype('CodeExecution'); ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
                
        
                  <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
Reflection Injection </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'backticks'=Command execution" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="Perform proper input validation  Con" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="When a web application does not properly sanitize user-supplied input before using it within application code, it may be possible to trick the application into executing Operating System commands. The executed commands will run with the same permissions of the component that executed the command (e.g. Database server, Web application server, Web server, etc.) 

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurrence" data-content="Command execution attacks are possible when an application passes unsafe user supplied data (forms, cookies, HTTP headers etc.) to a system shell. In this attack, the attacker-supplied operating system commands are usually executed with the privileges of the vulnerable application.  
s  " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No Details</p>
                        <p><?php reflex();  ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
                

                  <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card text-left" data-bs-hover-animate="pulse">
                      <div class="card-header card-header-icon  card-header-rose" >
                          <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">
User Input  Injection </div>
                  
                               
                          <div class="dropdown  float-right">
                              <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: #E53571">More</button>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" role="presentation" href="#">How PRONOXIS  found </a>
        <a class="dropdown-item" role="presentation" href="#">More about this Attack </a>
        
        <a class="dropdown-item" role="presentation" href="#">How to hack this </a>
        <a class="dropdown-item" role="presentation" href="#"> More...</a>                                        </div>
                              
</div>  
                              
                          
                           <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="top" title="Code" data-content="user-input values+'backticks'=Command execution" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">code</i>
                          
                          </button>
                          <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="right" title="Prevention" data-content="Perform proper input validation  Con" style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">security</i>
                          
                          </button>
                              
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="left" title="Risk Factors" data-content="When a web application does not properly sanitize user-supplied input before using it within application code, it may be possible to trick the application into executing Operating System commands. The executed commands will run with the same permissions of the component that executed the command (e.g. Database server, Web application server, Web server, etc.) 

                              " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                          </button>
                             
                               
                             
                               
                              <button class="btn btn-primary btn-fab btn-fab-mini btn-round float-right" type="button"  data-toggle="popover" data-placement="bottom" title="Occurrence" data-content="Command execution attacks are possible when an application passes unsafe user supplied data (forms, cookies, HTTP headers etc.) to a system shell. In this attack, the attacker-supplied operating system commands are usually executed with the privileges of the vulnerable application.  
s  " style="background-color: #E12E6D"><i class="material-icons" style="margin-left:-1.3px">bug_report</i>
                          
                              </button>
                             
                          
                     
                          
                
                     
                          
    </div>
                        
                        
                        
                        
                        <h3>&nbsp Vulnerable Code</h3>
                        <div class="card-body">
                           
                            <p style="color: #e83c3c"> No Details</p>
                        <p><?php UserInput(); ?></p>
                        </div>
                    </div>
                </div>
                
                
                    </div>
                </div>
    </div>
        </div>
    </div>

    
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www..com">
                  Planus
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons" style="margin-left:-1.3px">favorite</i> by
            <a href="https://www.pronoxis.com" target="_blank">Planus</a> 
          </div>
          <!-- your footer here -->
        </div>
      </footer>
 
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
            <script src="../assets/pageLoading/index.js"></script>
        <script>
        document.onreadystatechange = function () 
        {
  var state = document.readyState
  if (state == 'complete') {
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
       if (! localStorage.justOnce) 
       {
        localStorage.setItem("justOnce", "true");
        window.location.reload();
       }
      else
          {
              removeItem("justOnce", "true");
              
          }
   
}
     
  }
        </script> 
</body>
    
</html>
        
        
        <?php
        
if(isset($_SESSION['TotalCmdLines']))
{
    echo "settted";
}
        while(isset($_SESSION['TotalCmdLines'])&&isset($_SESSION['TotalCodeLines'])&&isset($_SESSION['TotalFileDisLines'])&&isset($_SESSION['TotalFileIncLines'])&&isset($_SESSION['TotalFileManLines'])&&isset($_SESSION['TotalHttpResLines'])&&isset($_SESSION['TotalProtocLines'])&&isset($_SESSION['TotalReflecLines'])&&isset($_SESSION['TotalSessionLines'])&&isset($_SESSION['TotalSqlLines'])&&isset(
$_SESSION['TotalUserLines'])&&isset($_SESSION['TotalxPathLines'])&&isset($_SESSION['TotalXSSLines']))
    {
        echo  "Total No of Lines are ".$_SESSION['TotalCmdLines']+$_SESSION['TotalCodeLines']+$_SESSION['TotalFileDisLines']+$_SESSION['TotalFileIncLines']+$_SESSION['TotalFileManLines']+$_SESSION['TotalHttpResLines']+$_SESSION['TotalProtocLines']+$_SESSION['TotalReflecLines']+$_SESSION['TotalSessionLines']+$_SESSION['TotalSqlLines']+$_SESSION['TotalUserLines']+$_SESSION['TotalxPathLines']+$_SESSION['TotalXSSLines'];
            break;
    
    }
        echo "Total Lines are";
        echo 13*$_SESSION['totalFileLines'];
      


        ?>