<?php

include 'configuration.php';
//// For Only PHP Pages

$time_start = microtime(true); //Create a variable for start time
$fh = fopen('Vulnerability.log', 'w');
$date = new DateTime();
$date = $date->format("y:m:d h:i:s");

echo "<br>";
$TotalLines=0;
$countTemp=0;  ///For Calculating Recurssion
$TotalVulnlines=0;
$TotalVarInPage=0; 
$typeChkLines = $SERVER['checkFileName'];

$superArray=array(); //For Storing all lines 
//$superSinkLines=array();    //For storing line number where xss is possible 

$json;
$json->default='Null';
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$sno=1;

$VarNo=1;
?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Xss Vulnerability Details</h4>
            
<?php

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{
    
 $json=$GLOBALS['json'];
    $superArray=$typeChkLines;
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";


        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        Sources($typeChkLine,$trimSendline,$typeChkLines,$typeChkLine_num,$json);
    $GLOBALS['TotalLines']++;
    $GLOBALS['VarNo']=1;
    

}




function multiexplode($data)
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
function Sources($Line,$chkLineSource,$typeChkLines,$typeChkLine_num,$json)
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
                echo "<hr>";
                echo "<div>   <h4 class='text-muted card-subtitle mb-2'>Line Number <b>".$typeChkLine_num."</b> May be  Vulnerable</h4>";
               
//                 echo "Vulnerable Line is ".htmlspecialchars($Line);
                
                echo "<p class='card-text'>Vulnerable Line is <br><code>".htmlspecialchars($Line)."</code></p>";
                $json->Line=$Line;
                 getPhpVar($chkLineSource,$typeChkLines,$json);
            }
            else
            {
                //To do write functions for var =var declarations lines
            }
        }
   }
    
}

//To print the lines having insecure XSS strings like Echo and etc
function getPhpVar($chkVulnLineSource,$typeChkLines,$json)
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
                     echo "<p class='card-text'>It is Vulnerable Sinks are <b>".$preVar."</b></p>";    
                    
                         $json->SinksInfo="It is Vulnerable Sinks are <b>".$preVar."</b>";
                         if(checkSecure($chkVulnLineSource)==true) //To check source line with sinks are secure
                           {
//                              echo "<br>Echo Line with sinks and sources is Secure ";  //Secure function after checking for sources and sinks and having secure functions
                             $json->SinSecure="<br>Line with sinks and sources is Secure ";
                               echo "<p class='card-text'>Line with sinks and sources is Secure </p>";  
                            }
                       else
                            {
//                              echo "<br>Echo Line is Not secure Due to Sink ".$preVar." Doesnot have any Secure Functions";//InSecure function after checking for sources and sinks and not having secure functions
                           
                            echo "<p class='card-text'>Line is Not secure Due to Sink ".$preVar." Doesnot have any Secure Functions</p>"; 
                           
                           
                           $json->SinSecure="<br>Line is Not secure Due to Sink ".$preVar." Doesnot have any Secure Functions";
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
//                              echo "<br>Echo Line with sources is  Secure";  //Secure function after checking for sources and sinks and having secure functions
                            echo "<p class='card-text'>Line with sources is  Secure </p>";  
                            }
                       else
                            {
                           
//                             echo "vuln var are ".$chkVulnLineSource[$i];
                           
                           echo "<p class='card-text'>Vulnerable Variables  in the Line are  <b style='color:red'>  ".$GLOBALS['VarNo']++." .".$chkVulnLineSource[$i]."</b></p>";  
                           
                           
                           
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
//                  echo "<br>Source line is".$chkprtDecLine_num;
//                  echo "<br> Source Line is ".$chkprtDecLine;
                  
                    echo "<p class='card-text'>Line no ".$chkprtDecLine_num." is effecting this line  </p>";  
                  echo "  Source of Line Number <b>".$chkprtDecLine_num."</b> is  <code> <br>".$chkprtDecLine."</code> ";
                  
//                  echo $firstEle;
                  if(checkforsinks($trimmed_DecprtSendline)==true)  //to check Sinks for 
                  {
                      //Lines having sources and sinks are sent for checking securing strings
                     if(checkSecure($trimmed_DecprtSendline)==true) //To check secure
                     {
//                         echo "<br>Line with sinks and sources is Secure ";  //Secure function after checking for sources and sinks and having secure functions
                              echo "<p class='card-text'>Line with sinks and sources is <b> Secure </b></p>";  
                         
                     }
                      else
                      {
//                          echo "<br>Line no ".$chkprtDecLine_num." is Not secure since Line <b> ".$chkprtDecLine."</b>  does not have any securing functions and has Sinks";//InSecure function after checking for sources and sinks and not having secure functions
                           $GLOBALS['TotalVulnlines']++;
                          
                           echo "<p class='card-text'>Line no ".$chkprtDecLine_num." is Not secure since Line <b> ".$chkprtDecLine."</b>  does not have any securing functions and has Sinks</p>";  
                      }
                  }
                  else
                  { 
//                     These Lines dont have sinks like GET or POST so line is sent for securing strings 
                         if(checkSecure($trimmed_DecprtSendline)==true) //to check secure
                     {
//                         echo "<br>Line no ".$chkprtDecLine_num." with sources is Secure";  //Secure function after checking for sources and having secure functions
                             
                            echo "<p class='card-text'>Line no ".$chkprtDecLine_num." with sources is Secure</p>";     
                             
                     }
                      else
                      {
//                          echo "<br>Line no ".$chkprtDecLine_num." is Not secure Since it has sources and not have secure functions";//InSecure function after checking for sources and not having secure functions
                           $GLOBALS['TotalVulnlines']++;
                           echo "<p class='card-text'>Line no ".$chkprtDecLine_num." is Not secure Since it has sources and not have secure functions</p>";  
                          
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
//            echo "vuln is 1";
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
//                 echo "val is ".$vulnChkLine[$i];
                 echo "<p class='card-text'>Val is ".$vulnChkLine[$i]."</p>";  
                
                  return true;
    
               }
            }
                
        }
    }
}

function checkForVulnLines($vulnVar)
{
    $workDir=getcwd();
$conFile = scandir($workDir);
    
    $superSinkLines=file($conFile[17]); 
$VulnLinesTempVar=count($superSinkLines);
    for($i=0;$i<$VulnLinesTempVar;$i++)
    {
        
//        echo "Line No".$i." has ".htmlspecialchars($superSinkLines[$i])."<br>";
        $varSendLine=htmlspecialchars($superSinkLines[$i]);
        $vulntrimSendline = multiexplode($varSendLine);  //Gets the line by removing Delimiters 
        $varTrimmed_Sendline=array_map('trim',$vulntrimSendline);//To remove White Spaces from Array
        checkXSS($varTrimmed_Sendline,$varSendLine,$i,$vulnVar); //this send each line for verification 
    }
}
    
    
function checkXSS($Line,$printLine,$LineNo,$vulnVar)
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
//                           echo "<br>Line Number ".$LineNo." is Vulnerable <br> Code is  ".$printLine."<br>"; 
                            
                        echo "<p class='card-text'>Line Number ".$LineNo." is Vulnerable <br><code> Code is  ".$printLine."</code></p>";  
                        
                        
                        break;
                       }
                }
            }
        }
    }
    
}
//
function checkForSecureString()
{
    
}


echo "<hr>";
echo "<br>Total Number of Lines are " .$TotalLines;
echo "<br>Total Number of Vulnerable lines are " .$TotalVulnlines;


?>
        </div>
    </div>
</div>