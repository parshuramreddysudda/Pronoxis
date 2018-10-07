<?php


//// For Only PHP Pages

$time_start = microtime(true); //Create a variable for start time
$fh = fopen('Vulnerability.log', 'w');
$date = new DateTime();
$date = $date->format("y:m:d h:i:s");
//chdir('G:\xammp\htdocs\test');
fwrite($fh, $date);
$workDir=getcwd();
$conFile = scandir($workDir);
print_r($conFile);
echo "<br>";
$TotalLines=0;
$countTemp=0;  ///For Calculating Recurssion
$TotalVulnlines=0;
$TotalVarInPage=0; 
$typeChkLines = file($conFile[19]);

$superArray=array(); //For Storing all lines 
//$superSinkLines=array();    //For storing line number where xss is possible 

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{
    $superArray=$typeChkLines;
    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";


        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        Sources($trimmed_Sendline,$typeChkLines);
        
    echo "<br>";
    $GLOBALS['TotalLines']++;
    

}


function multiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=","%","&gt;","&lt;","&#x27;"," &#x2F;",";",".","&quot");
    $data=str_replace('"', ',', $data);
    $quotedata=str_replace('"',"", $data);
	$MakeReady = str_replace($delimiters, $delimiters[0], $quotedata);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}

//This functiond print echo and other sources
function Sources($chkLineSource,$typeChkLines)
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
               
                 getPhpVar($chkLineSource,$typeChkLines);
            }
            else
            {
                //To do write functions for var =var declarations lines
            }
        }
   }
    
}

//To print the lines having insecure XSS strings like Echo and etc
function getPhpVar($chkVulnLineSource,$typeChkLines)
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
//                     echo "It is Vuln";
//                       echo "Sinks are ".$preVar;
                         if(checkSecure($chkVulnLineSource)==true) //To check source line with sinks are secure
                           {
                              echo "<br>Echo Line with sinks and sources is Secure ";  //Secure function after checking for sources and sinks and having secure functions
                            }
                       else
                            {
                              echo "<br>Echo Line is Not secure Due to Sink ".$preVar." Doesnot have any Secure Functions";//InSecure function after checking for sources and sinks and not having secure functions
                            $GLOBALS['TotalVulnlines']++;
                            }
                         
                       $varPresnt=1;
                       break;
                     }
                 }
                    if($varPresnt==0)
                    {
                        
                        if(checkSecure($chkVulnLineSource)==true) //To check source line with are secure
                           {
                              echo "<br>Echo Line with sources is  Secure";  //Secure function after checking for sources and sinks and having secure functions
                            }
                       else
                            {
                           
//                             echo "vuln var are ".$chkVulnLineSource[$i];
                               checkVarLineVuln($chkVulnLineSource[$i],$typeChkLines);  //Check this varbile declaration line for Vuln . this prints the insecure XSS lines
                           
                            }
                        
//                     echo "<br>Variables are ".$chkVulnLineSource[$i];
                       $vulnVar[]=$chkVulnLineSource[$i]; 
                       
                    }
                }
             
         }
    }
}
}





function checkVarLineVuln($vulnVar,$allLines)
{
 
    
   
    foreach ($allLines as $chkprtDecLine_num => $chkprtDecLine) //Compare every line first letter to find the vulnerable var declartion
    {   
        $sendprtDecLine=htmlspecialchars($chkprtDecLine);
        $trimDecprtSendline = multiexplode($sendprtDecLine); 
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
//                  echo "<br>Vuln line is".$chkprtDecLine_num;
//                  echo "<br> Effeted Line is ".$chkprtDecLine;
//                  echo $firstEle;
                  if(checkforsinks($trimmed_DecprtSendline)==true)  //to check Sinks for 
                  {
                      //Lines having sources and sinks are sent for checking securing strings
                     if(checkSecure($trimmed_DecprtSendline)==true) //To check secure
                     {
                         echo "<br>Line with sinks and sources is Secure ";  //Secure function after checking for sources and sinks and having secure functions
                     }
                      else
                      {
                          echo "<br>Line no ".$chkprtDecLine_num." is Not secure since Line <b> ".$chkprtDecLine."</b>  does not have any securing functions and has Sinks";//InSecure function after checking for sources and sinks and not having secure functions
                           $GLOBALS['TotalVulnlines']++;
                      }
                  }
                  else
                  { 
//                     These Lines dont have sinks like GET or POST so line is sent for securing strings 
                         if(checkSecure($trimmed_DecprtSendline)==true) //to check secure
                     {
                         echo "<br>Line with sources is Secure";  //Secure function after checking for sources and having secure functions
                     }
                      else
                      {
                          echo "<br>Line is Not secure Since it has sources and not have secure functions";//InSecure function after checking for sources and not having secure functions
                           $GLOBALS['TotalVulnlines']++;
                      }
                  }
                  
                  break;
              }
            }
        
        
    }
    
}

//This function checks for sinks in the source lines
function checkforsinks($sinkChkLine)
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
            echo "vuln is 1";
            break;
        }
    }
    
}

function checkSecure($vulnChkLine)
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
                 echo "val is ".$vulnChkLine[$i];
                  return true;
    
               }
            }
                
        }
    }
}

//function checkForVulnLines($vulnVar)
//{
//    $workDir=getcwd();
//$conFile = scandir($workDir);
//    
//    $superSinkLines=file($conFile[17]); 
//$VulnLinesTempVar=count($superSinkLines);
//    for($i=0;$i<$VulnLinesTempVar;$i++)
//    {
//        
////        echo "Line No".$i." has ".htmlspecialchars($superSinkLines[$i])."<br>";
//        $varSendLine=htmlspecialchars($superSinkLines[$i]);
//        $vulntrimSendline = multiexplode($varSendLine);  //Gets the line by removing Delimiters 
//        $varTrimmed_Sendline=array_map('trim',$vulntrimSendline);//To remove White Spaces from Array
//        checkXSS($varTrimmed_Sendline,$varSendLine,$i,$vulnVar); //this send each line for verification 
//    }
//}
//    
//    
//function checkXSS($Line,$printLine,$LineNo,$vulnVar)
//{
//    include'warmHole.php';
//    
//    $substr1=count($Line);
//    $substr2=count($XSSWarmhole);
//      
//    
//    
//   for($i=0;$i<$substr1;$i++)
//    {
//        for($j=0;$j<$substr2;$j++)
//        {
//            if($Line[$i]==$XSSWarmhole[$j])
//            {
//                for($k=0;$k<$substr1;$k++)
//                {
//                    if(strcmp($Line[$i],$vulnVar==0))
//                       {
//                           echo "<br>Line Number ".$LineNo." is Vulnerable <br> Code is  ".$printLine."<br>"; 
//                        break;
//                       }
//                }
//            }
//        }
//    }
//    
//}
////
//function checkForSecureString()
//{
//    
//}



echo "Total Number of Vulnerable lines are " .$TotalVulnlines;
echo "<br>Total Number of Lines are " .$TotalLines;

































?>



