<?php

//// For Only PHP Pages
function startXSS($address,$typeChkLines)
{
chdir($address);
global $TotalXSSLines;
global $countTemp;  ///For Calculating Recurssion
global $TotalXSSVulnlines;
global $TotalVarInPage; 
global $sno;
global $VarNo;



$TotalXSSLines=0;
$countTemp=0;  ///For Calculating Recurssion
$TotalXSSVulnlines=0;
$TotalVarInPage=0; 
$LogFileName=$_SESSION['LogFileName'];
$superArray=array();
//For Storing all lines 
//$superSinkLines=array();    //For storing line number where xss is possible


//Json File for appending output Code started
$XSSjson;  
$myfile = fopen("XSS.json", "w") or die("Unable to open file!");
file_put_contents("XSS.json","[",FILE_APPEND);
$XSSjson->AttackName='CrossSiteScripting';


// Json Finished

$sno=1;

$VarNo=1;
       
            
// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{

   
    $superArray=$typeChkLines;
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";


        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = XSSmultiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        XSSSources($typeChkLine,$trimSendline,$typeChkLines,$typeChkLine_num,$XSSjson);
  
    $GLOBALS['VarNo']=1;
}

           
$XSSjsonFinal->ForCorrection='String Added to Validate the Json';  
$XSSjsonFinal->Total_lines="Total Number of Lines are " .$TotalXSSLines;
$XSSjsonFinal->Total_Vulnlines="Total Number of Vulnerable lines are " .$TotalXSSVulnlines;
$myJSON = json_encode($XSSjsonFinal);
$LogFileName=$GLOBALS['LogFileName'];
file_put_contents("XSS.json", $myJSON,FILE_APPEND);
file_put_contents("XSS.json","]",FILE_APPEND);

            
 
//echo " Total Number of Lines are " .$TotalXSSLines;
//echo " Total Number of Vulnerable lines are " .$TotalXSSVulnlines;
            
            
//For calculating an reporting no of lines infected 
            
$_SESSION['TotalXSSLines']=$TotalXSSLines;
$_SESSION['TotalXSSVulnLines']=$TotalXSSVulnlines;
$_SESSION['XSSDone']=0;


}

function XSSmultiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=","%","&gt;","&lt;","&#x27;"," &#x2F;",";",".","&quot");
    $data=str_replace('"', ',', $data);
    $data=stripslashes($data);
    $quotedata=str_replace('"',"", $data);
	$MakeReady = str_replace($delimiters, $delimiters[0], $quotedata);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}

//This functiond print echo and other sources
function XSSSources($Line,$chkLineSource,$typeChkLines,$typeChkLine_num,$XSSjson)
{
    include'warmHole.php';
    
    $substr1=count($chkLineSource);
    $substr2=count($XSSWarmhole);
    
    
   for($i=0;$i<$substr1;$i++)
    {
        for($j=0;$j<$substr2;$j++)
        {
            
            if($chkLineSource[$i]==$XSSWarmhole[$j])
            {
//                echo "Line Number".$typeChkLine_num; 
               echo "<hr><br>";
                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$typeChkLine_num."</b> May be  Vulnerable</h3>";
                 $GLOBALS['TotalXSSLines']++;
                 $LineJson="Vulnerable Line is ".htmlspecialchars($Line).""; 
                
                echo "<p class='card-text'>Vulnerable Line is  <code>".htmlspecialchars($Line)."</code></p>";
                $XSSjson->LineInfo=$LineJson;
                 getPhpVar($chkLineSource,$typeChkLines,$XSSjson);
              
                
        //Json File for appending output Code 
                $myJSON = json_encode($XSSjson);
                $LogFileName=$GLOBALS['LogFileName'];
                file_put_contents("XSS.json", $myJSON,FILE_APPEND);
                file_put_contents("XSS.json",",",FILE_APPEND);
                
                  echo "</div>";
                
            }
            else
            {
                //To do write functions for var =var declarations lines
            }
        }
   }
    
}


//To print the lines having insecure XSS strings like Echo and etc
function getPhpVar($chkVulnLineSource,$typeChkLines,$XSSjson)
{
    include'checkWordlists.php';
    global $vulnVar;
    $vulnVar=array("0");
    $varPresnt=0;  //To check if line has sinks :D
    $substr1=count($chkVulnLineSource);

//    print_r($chkVulnLineSource);
    
    if(count($chkVulnLineSource)>1)
    {
    for($i=0;$i<$substr1;$i++)
    {
         $subVar=substr($chkVulnLineSource[$i],0,1);
    
         if($subVar=='$')
         {
             
             if(in_array($chkVulnLineSource[$i],$vulnVar))
                {
                    //Discard Repeated values Since echo may have two pr more recursiion is continued untill are are captured
                }
                else
                {
                 
                    
                 $preVarNo=strlen($chkVulnLineSource[$i]);
                 $preVar=substr($chkVulnLineSource[$i],0,$preVarNo-1);
                 $substr2=count($userInputValues);
                 for($j=0;$j<$substr2;$j++)
                 {
               
                     if($preVar==$userInputValues[$j])
                     { 
//                     echo "It is Vuln Sinks are ".$preVar;
                     echo "<p class='card-text'>It is Vulnerable, Sinks are <b>".$preVar."</b></p>";    
                    
                         //Json object  appending to Class Code
                         $XSSjson->SinksInfo="It is Vulnerable, Sinks are".$preVar."";
                         if(XSScheckSecure($chkVulnLineSource,$XSSjson)==true) //To check source line with sinks are secure
                           {
                              echo " Echo Line with sinks and sources is Secure ";  //Secure function after checking for sources and sinks and having secure functions
                              //Json object  appending to Class Code
                             $XSSjson->SinSecure="Line with sinks and sources is  Secure";
                               echo "<p class='card-text'>Line with sinks and sources is <green>Secure </green></p>";  
                             $_SESSION['Secured']++;
                            }
                       else
//                            {
//                              echo " Echo Line is Not secure Due to Sink ".$preVar." Doesnot have any Secure Functions";//InSecure function after checking for sources and sinks and not having secure functions
                           
                            echo "<p class='card-text'>Line is <red> Not Secure<red> Due to Sink ".$preVar." Doesnot have any <red>Secure Functions </red></p>"; 
                           
                            //Json object  appending to Class Code
                           $XSSjson->SinSecure="Line is  Not Secure  Due to Sink ".$preVar." and it Doesn't have any Secure Functions";
                            $GLOBALS['TotalXSSVulnlines'];
                            }
                         
                       $varPresnt=1;
                       break;
                     }
                 }
                    if($varPresnt==0)
                    {
                        
                        if(XSScheckSecure($chkVulnLineSource,$XSSjson)==true) //To check source line with are secure
                           {
//                              echo " Echo Line with sources is  Secure";  //Secure function after checking for sources and sinks and having secure functions
                            echo "<p class='card-text'>Line with sources is <green> Secure </green></p>"; 
                            
                             //Json object  appending to Class Code
                              $XSSjson->SinSecure="Line with sources is  Secure";
                            }
                       else
                            {
                           
//                             echo "vuln var are ".$chkVulnLineSource[$i];
                           
                           echo "<p class='card-text'>Vulnerable Variables  in the Line are  <b style='color:#A52A2A'>  ".$GLOBALS['VarNo']++." .".$chkVulnLineSource[$i]."</b></p>"; 
                           
                            //Json object  appending to Class Code
                              $XSSjson->SinSecure="Vulnerable Variables  in the Line are  ".$GLOBALS['VarNo']++." .".$chkVulnLineSource[$i];
                           
                           
                               XSScheckVarLineVuln($chkVulnLineSource[$i],$typeChkLines,$XSSjson);  //Check this varible declaration line for Vuln . this prints the insecure XSS lines
                           
                            }
                        
//                     echo " Variables are ".$chkVulnLineSource[$i];
                       $vulnVar[]=$chkVulnLineSource[$i]; 
                       
                    }
                }
             
         }
    }
}





function XSScheckVarLineVuln($vulnVar,$allLines,$XSSjson)
{
 
    
   
    foreach ($allLines as $chkprtDecLine_num => $chkprtDecLine) //Compare every line first letter to find the vulnerable var declartion
    {   
        $sendprtDecLine=htmlspecialchars($chkprtDecLine);
        $trimDecprtSendline = XSSmultiexplode($sendprtDecLine); 
        $trimmed_DecprtSendline=array_map('trim',$trimDecprtSendline);
        
        
//        print_r($trimmed_DecprtSendline);
        $filteredArray=array_filter($trimmed_DecprtSendline);
        
//        print_r($filteredArray);
        $firstEle=array_shift($filteredArray);  //To get the First element of array
      
        $subVar=substr($firstEle,0,1);
//       
//        if($chkprtDecLine_num==8)
//        {
//            echo "val is ".$firstEle;
//        }
           if($subVar=='$')
            { 
           
              if(strcmp($firstEle,$vulnVar)==0)
              {
//                  echo " Source line is".$chkprtDecLine_num;
//                  echo "  Source Line is ".$chkprtDecLine;
                  
                    echo "<p class='card-text'>Line no ".$chkprtDecLine_num." is effecting this line  </p>";  
                  echo " <p class='card-text'> Source of Line Number <b>".$chkprtDecLine_num."</b> is  <code>  ".$chkprtDecLine."</code></p> ";
                  
                  
                   //Json object  appending to Class Code
                   $XSSjson->SourceLine="Line no ".$chkprtDecLine_num." is effecting this line  ";
                  
                    $XSSjson->SourceLineCode="Source of Line Number ".$chkprtDecLine_num." is ".$chkprtDecLine;
                  
                  
                  
                  
                  
//                  echo $firstEle;
                  if(XSScheckforsinks($trimmed_DecprtSendline,$XSSjson)==true)  //to check Sinks for 
                  {
                      //Lines having sources and sinks are sent for checking securing strings
                     if(XSScheckSecure($trimmed_DecprtSendline,$XSSjson)==true) //To check secure
                     {
//                         echo " Line with sinks and sources is Secure ";  //Secure function after checking for sources and sinks and having secure functions
                              echo "<p class='card-text'>Source Line with sinks and sources is <b> Secure </b></p>";  
                         
                         
                          //Json object  appending to Class Code
                              $XSSjson->SourceLineVuln="Source Line with sinks and sources is Secure";
                         $_SESSION['Secured']++;
                         
                     }
                      else
                      { 
//                          echo " Line no ".$chkprtDecLine_num." is Not secure since Line <b> ".$chkprtDecLine."</b>  does not have any securing functions and has Sinks";//InSecure function after checking for sources and sinks and not having secure functions
                           $GLOBALS['TotalXSSVulnlines']++;
                          
                           echo "<p class='card-text'>Source Line no ".$chkprtDecLine_num." is <red>Not Secure </red> since Line <b> ".$chkprtDecLine."</b>  does not have any Securing functions and has Sinks</p>";  
                          
                           //Json object  appending to Class Code
                           $XSSjson->SourceLineVuln="Source Line no ".$chkprtDecLine_num." is Not Secure since Line ".$chkprtDecLine."  does not have any Securing functions and has Sinks";
                      }
                  }
                  else
                  { 
//                     These Lines dont have sinks like GET or POST so line is sent for securing strings 
                         if(XSScheckSecure($trimmed_DecprtSendline,$XSSjson)==true) //to check secure
                     {
//                         echo " Line no ".$chkprtDecLine_num." with sources is Secure";  //Secure function after checking for sources and having secure functions
                             
                            echo "<p class='card-text'>Source Line no ".$chkprtDecLine_num." with sources is <green> Secure </green></p>";
                             
                              //Json object  appending to Class Code
                             $XSSjson->SourceLineVuln="Source Line no ".$chkprtDecLine_num." with sources is Secure" ;
                             $_SESSION['Secured']++;
                             
                     }
                      else
                      {
//                          echo " Line no ".$chkprtDecLine_num." is Not secure Since it has sources and not have secure functions";//InSecure function after checking for sources and not having secure functions
                           $GLOBALS['TotalXSSVulnlines']++;
                          echo "<p class='card-text' style=''>Source Line no ".$chkprtDecLine_num." is <red>Not Secure </red> Since it has sources and not have secure functions</p>";  
                          
                          
                           //Json object  appending to Class Code
                            $XSSjson->SourceLineVuln="Source Line no ".$chkprtDecLine_num." is Not Secure Since it has sources and not have secure functions";
                          
                      }
                  }
                  
                  break;
              }
            }
        
        
    }
    
}

//This function checks for sinks in the source lines
function XSScheckforsinks($sinkChkLine,$XSSjson)
{
    include'checkWordlists.php';
        
      $listNo=count($userInputValues);
      $varNo=count($sinkChkLine);
      $vuln=0;
   
    
//    print_r($sinkChkLine);
    
    for($i=0;$i<$varNo;$i++)
    {
//          print_r($sinkChkLine);
        for($j=0;$j<$listNo;$j++)
        {
           
            
            if(strlen($sinkChkLine[$i])>1)
            {
        
            $tempcount=strlen($sinkChkLine[$i]);  //To count no of letter
            $tempCut=substr($sinkChkLine[$i],0,$tempcount-1)  ;    //To cut last letter i.e $_GET[  => $GET  
//            echo $tempCut;
              if(strcmp($tempCut,$userInputValues[$j])==0)
              {
                 
                  return true;
                  $vuln=1;                 //Too count 
                  break;
              }
            }
            else
            {
               break; 
            }
        }
        if($vuln==1)
        {
//            echo "vuln is 1";
            break;
        }
    }
    
}

function XSScheckSecure($vulnChkLine,$XSSjson)
{
    include'vulnWordlist.php';
        $listCount=count($xssSecureVuln);
        $varCount=count($vulnChkLine);
    
    for($i=0;$i<$varCount;$i++)
    {
        for($j=0;$j<$listCount;$j++)
        {
            
            
            if(strlen($vulnChkLine[$i])>1)
            {
            if(strcmp($vulnChkLine[$i],$xssSecureVuln[$j])==0)
               {
//                 echo "val is ".$vulnChkLine[$i];
                 echo "<p class='card-text'>Securing Functions are <b>".$vulnChkLine[$i]."</b></p>"; 
                
                 //Json object  appending to Class Code
                
                 $XSSjson->SourceLineSecFunc="Securing Functions are <b>".$vulnChkLine[$i];
                 
                
                  return true;
    
               }
            }
                
        } 
    }  
}

function XSScheckForVulnLines($vulnVar,$XSSjson)
{
    $workDir=getcwd();
$conFile = scandir($workDir);
    
    $superSinkLines=file($conFile[17]); 
$VulnLinesTempVar=count($superSinkLines);
    for($i=0;$i<$VulnLinesTempVar;$i++)
    {
        
//        echo "Line No".$i." has ".htmlspecialchars($superSinkLines[$i])." ";
        $varSendLine=htmlspecialchars($superSinkLines[$i]);
        $vulntrimSendline = XSSmultiexplode($varSendLine);  //Gets the line by removing Delimiters 
        $varTrimmed_Sendline=array_map('trim',$vulntrimSendline);//To remove White Spaces from Array
        checkXSS($varTrimmed_Sendline,$varSendLine,$i,$vulnVar,$XSSjson); //this send each line for verification 
    }
}
    
    
function checkXSS($Line,$printLine,$LineNo,$vulnVar,$XSSjson)
{
    include'warmHole.php';
    
    $substr1=count($Line);
    $substr2=count($XSSWarmhole);
      
    
    
   for($i=0;$i<$substr1;$i++)
    {
        for($j=0;$j<$substr2;$j++)
        {
            if($Line[$i]==$XSSWarmhole[$j])
            {
                for($k=0;$k<$substr1;$k++)
                {
                    if(strcmp($Line[$i],$vulnVar==0))
                       {
//                           echo " Line Number ".$LineNo." is Vulnerable   Code is  ".$printLine." "; 
                            
                        echo "<p class='card-text'>Line Number ".$LineNo." is Vulnerable  <code> Code is  ".$printLine."</code></p>";  
                        
                         //Json object  appending to Class Code
                          $XSSjson->LineVulnNo=$LineNo." is Vulnerable Code is  ".$printLine." ";
                        
                        break;
                       }
                }
            }
        }
    }
    
}

function checkForSecureString()
{
    
}
              
 
?>
 