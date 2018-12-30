<?php
/*   

To-do
Input values checker

 */

$time_start = microtime(true); //Create a variable for start time
$fh = fopen('Vulnerability.log', 'w');
$date = new DateTime();
$date = $date->format("y:m:d h:i:s");
chdir('/Applications/MAMP/htdocs/dept');
//echo getcwd();
fwrite($fh, $date);
$workDir=getcwd();
$conFile = scandir($workDir);
print_r($conFile);
echo "<br>";
$cmdTotalLines=0;
$countTemp=0;       //For Calculating Recurssion
$sessionVar=0;      //To calculate no of var  
$cmdTotalVulnlines=0;
$cmdTotalVarInPage=0; 
$cmdLineVar=0;       //To calcuate no of var in Vuln line
$cmdVulnLineVar=0;  //To store no of vulnerable var in a Vuln line to compare after testing it
$inputValues=array(); //To store input values Responsible for vuln
$userInpVal=0;  //To test for user input Values;
$typeChkLines = file($conFile[23]);

$superArray=array(); //For Storing all lines 
//$superSinkLines=array();    //For storing line number where xss is possible 

// Loop through our array, show HTML source as HTML source; and line numbers too.
$json;
$json->default='Null';
$myfile = fopen("newfile.json", "w") or die("Unable to open file!");
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{ 
    $superArray=$typeChkLines;
    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";

       $json=$GLOBALS['json'];
        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        checkSources($trimmed_Sendline,$typeChkLine_num,$typeChkLines,$json);
        
    echo "<br>";
    $GLOBALS['cmdTotalLines']++;

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



function checkSources($chkLine,$chkLineNo,$typeChkLines,$json)
{
    include'warmHole.php';
    $varCount=count($chkLine);
    $varCount2=count($cmdWarmhole);
    
    for($i=0;$i<$varCount;$i++)
    {
       for($j=0;$j<$varCount2;$j++)
       {
          if(strcmp($chkLine[$i],$cmdWarmhole[$j])==0)
          {
              checkifVaribles($chkLine,$chkLineNo,$typeChkLines,$json);
              CheckVarVuln($chkLine);
              echo "<br>No of Variables are ".$GLOBALS['cmdLineVar'];

              
              $json->NoVar="<br>No of Variables are ".$GLOBALS['cmdLineVar'];
              
              echo "<br>No of Vuln var are". $GLOBALS['cmdVulnLineVar'];
               $json->NofVulnVar="<br>No of Vuln var are". $GLOBALS['cmdVulnLineVar'];
              
              if($GLOBALS['cmdLineVar']>=$GLOBALS['cmdVulnLineVar'])
              {
                  echo "Line Number ".$chkLineNo." is Vulnerable ";
                   $json->VulnLineNo="Line Number ".$chkLineNo." is Vulnerable ";
                  if(is_array ($GLOBALS['inputValues'])&&count($GLOBALS['inputValues'])>0)
                  {
                     $var=count($GLOBALS['inputValues']);
                     echo "<br>User Input Values are found. <br> Values are ";
                      $json->InputValues="User Input Values are found. <br> Values are ";
                    
                  
                       print_r(array_reduce($GLOBALS['inputValues'],"myfunction"));
                      
                       if(!checkSecure($chkLine))
                        {
                           echo "<br>Needed Input Sanitization"; 
                           $json->remark1= "Needed Input Sanitization"; 
                        } 
                      
                       unset($GLOBALS['inputValues']);
                       $inputValues=array();
                  }
                 
              }
              else
              {
                  echo "Line Number ".$chkLineNo." is Protected";
                  $json->secure="Line Number ".$chkLineNo." is Protected";
                    if(is_array ($GLOBALS['inputValues'])&&count($GLOBALS['inputValues'])>0)
                  {
                     $var=count($GLOBALS['inputValues']);
                     echo "<br>User Input Values are found. <br> Values are ";
                    $json->InputValues="User Input Values are found. <br> Values are ";
                   
                       print_r(array_reduce($GLOBALS['inputValues'],"myfunction"));
                        if(!checkSecure($chkLine))
                        {
                            echo "<br>Needed Input Sanitization"; 
                            $json->remark1= "Needed Input Sanitization"; 
                        }
                       
                       unset($GLOBALS['inputValues']);
                       $inputValues=array();
                  }
                 
              }
                  

              
          } 
       }
    }
    $GLOBALS['cmdLineVar']=0; 
    $GLOBALS['cmdVulnLineVar']=0;
} 


function  checkifVaribles($chkVarSendline,$chkLineNo,$typeChkLines,$json)
{
   
//    print_r($chkVarSendline);
    static $var=array();
   
    $noofelelments=count($chkVarSendline);
   
    
     
    for($i=1;$i<$noofelelments;$i++)
    {
        $tempCut=substr($chkVarSendline[$i],0,1);
        
        if(strcmp($tempCut,'$')==0)
        {
//            echo "<br>Trimmed Var ".$chkVarSendline[$i];
//            $Token = new Tokenizer();
//            $Token-> 
            
              chekUserInputValues($chkVarSendline);
              printDeclaration($chkVarSendline[$i],$chkLineNo,$typeChkLines);
        } 
      else
           {
            
            $tempCutQuot1=substr($chkVarSendline[$i],7,-7);  //Substr for getting values in db ".$value." => to $value trimming both sides symbols
             $tempCut=substr($tempCutQuot1,0,1);
             
             if($tempCut=='$')
             {
//             echo $tempCutQuot1;
               
               chekUserInputValues($chkVarSendline);
               printDeclaration($tempCutQuot1,$chkLineNo,$typeChkLines);  //Send the value decleared in th sql string since it has uni characters like " ' . they are trimmed first and then sent
             }
             
            
           }
        
        
        $GLOBALS['countTemp']++;
    }
    
     $GLOBALS['cmdLineVar']++;
      
    echo "<br>";   
}



function printDeclaration($prtDecVar,$prtDecLine_num,$prtDecLines)   //Dec==Declaration
{
   
    foreach ($prtDecLines as $chkprtDecLine_num => $chkprtDecLine)
    {   
        $sendprtDecLine=htmlspecialchars($chkprtDecLine);
        $trimDecprtSendline = multiexplode($sendprtDecLine); 
        $trimmed_DecprtSendline=array_map('trim',$trimDecprtSendline);
      
//        echo $chkprtDecLine_num."<br>";
//        print_r($trimmed_DecprtSendline);
//        echo "<br>";
        
        $filteredArray=array_filter($trimmed_DecprtSendline);
        $firstEle=array_shift($filteredArray);
        if(strcmp($prtDecVar,$firstEle)==0)
        { 
           
 
            echo "<br>";
//            echo $prtDecVar;
//            echo $trimmed_DecprtSendline[0];
//            echo $chkprtDecLine_num.", ";
//            echo $prtDecLine_num;
           
            if($chkprtDecLine_num==$prtDecLine_num)
            {
//                echo "Same Elements Called ".$chkprtDecLine_num;
                break;
               
            }
            else
            {
                 echo $chkprtDecLine;
                return $chkprtDecLine;
//                print_r($prtDecLine_num);
                 CheckVarVuln($trimmed_DecprtSendline); 
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = multiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
                 checkifVaribles($chkprtDecLine,$chkprtDecLine_num,$prtDecLines);
            }
        }
   
        $GLOBALS['countTemp']++;
    }

}



function  CheckVarVuln($chkvulnLine)
{
    include'vulnWordlist.php';
    
    
    $lineLen1=count($chkvulnLine);
    $linelen2=count($osCmdExeSecuringVuln);
    $vuln=0;
    $tempVulnChk=0;   //To calculate no of matched variables in J loop
    $tempVarConf=0;   //To calculate no of Vuln variables in total loop
    
    for($i=0;$i<$lineLen1;$i++)
    {
        for($j=0;$j<$linelen2;$j++)
        {
            if(strcmp($chkvulnLine[$i],$osCmdExeSecuringVuln[$j])==0)
            {
                
                $tempVulnChk=0;
                echo $chkvulnLine[$i];
                break;
            }
            else
            {
                
                $tempVulnChk=1;
            }
            
        }
        if($tempVulnChk==1)
        {
            $tempVarConf++;
        }
        
    }
    if($tempVarConf==$lineLen1)
    {
        
        $GLOBALS['cmdVulnLineVar']++;
    }
    else
    {
        
    }
    
}
function chekUserInputValues($sinkChkLine)
{
    include'checkWordlists.php';
   
      $tempinputValues=array();
    
      global $inputValues;
      $inputValues=array();
      $listNo=count($userInputValues);
      $varNo=count($sinkChkLine);
//    print_r($sinkChkLine);
      for($i=0;$i<$varNo;$i++)
     {
        for($j=0;$j<$listNo;$j++)
        {
            $tempcount=strlen($sinkChkLine[$i]);  //To count no of letter
            $tempCut=substr($sinkChkLine[$i],0,$tempcount-1)  ;    //To cut last letter i.e $_GET[  => $GET  
            
            
            if(strcmp($tempCut,$userInputValues[$j])==0)
               {
                 
                  array_push($inputValues,$tempCut);
               }
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
                $json->Values="val is ".$vulnChkLine[$i];
                  return true;
    
               }
            }
               
        }
    }
}


  function myfunction($v1,$v2)
                     {
                        return $v1 . "<br>" . $v2;
                     }


$myJSON = json_encode($json);

echo $myJSON;






















?>