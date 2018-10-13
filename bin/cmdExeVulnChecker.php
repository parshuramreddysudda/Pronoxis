<?php
/*   

To-do
Input values checker


 */
function cmdExecution($typeChkLines)
{

$cmdTotalLines=0;
$countTemp=0;       //For Calculating Recurssion
$sessionVar=0;      //To calculate no of var  
$cmdTotalVulnlines=0;
$cmdTotalVarInPage=0; 
$cmdLineVar=0;       //To calcuate no of var in Vuln line
$cmdVulnLineVar=0;  //To store no of vulnerable var in a Vuln line to compare after testing it
$inputValues=array(); //To store input values Responsible for vuln
$userInpVal=0;  //To test for user input Values;


$superArray=array(); //For Storing all lines 
//$superSinkLines=array();    //For storing line number where xss is possible 

// Loop through our array, show HTML source as HTML source; and line numbers too.


$cmdExe_array=array();
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{ 
    $superArray=$typeChkLines;
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";


        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        checkSources($trimmed_Sendline,$typeChkLine_num,$typeChkLines,$typeChkLine);
        
//    echo "<br>";
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



function checkSources($chkLine,$chkLineNo,$typeChkLines,$typeChkLine)
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
//              echo "Line No ".$chkLineNo." May vulnerable to cmdExecution";
              $string= "Line No ".$chkLineNo." May vulnerable to cmdExecution";
              
                  push($string);
              push($typeChkLine);
               
              checkifVaribles($chkLine,$chkLineNo,$typeChkLines);
              CheckVarVuln($chkLine);
//              echo "<br>Variables are ".$GLOBALS['cmdLineVar'];
              
//              echo "<br>Vuln var are ". $GLOBALS['cmdVulnLineVar'];
             
              
              if($GLOBALS['cmdLineVar']>=$GLOBALS['cmdVulnLineVar'])
              {
//                  echo "Line Number ".$chkLineNo." is Vulnerable ";
                  
                   
                      $string= "Line Number ".$chkLineNo." is Vulnerable ";
                       push($string);
                  
                  if(is_array ($GLOBALS['inputValues'])&&count($GLOBALS['inputValues'])>0)
                  {
                     $var=count($GLOBALS['inputValues']);
//                     echo "<br>User Input Values are found. <br> Values are ";
                    
                      $string= "User Input Values are found. <br> Values are ";
                       push($string);
                  
                       array_reduce($GLOBALS['inputValues'],"myfunction");
                         
                       if(!checkSecure($chkLine))
                        {
//                           echo "<br>Needed Input Sanitization"; 
                           
                           
                          $string= "Needed Input Sanitization";
                          push($string);
                        } 
                      
                       unset($GLOBALS['inputValues']);
                       $inputValues=array();
                  }
                 
              }
              else
              {
//                  echo "Line Number ".$chkLineNo." is Protected";
                  
                   $string= "Line Number ".$chkLineNo." is Protected";
                          push($string);
                  
                    if(is_array ($GLOBALS['inputValues'])&&count($GLOBALS['inputValues'])>0)
                  {
                     $var=count($GLOBALS['inputValues']);
//                     echo "<br>User Input Values are found. <br> Values are ";
                        
                      $string=  "User Input Values are found. <br> Values are ";
                      push($string);
                   
                       array_reduce($GLOBALS['inputValues'],"myfunction");
                        
                        if(!checkSecure($chkLine))
                        {
//                            echo "<br>Needed Input Sanitization"; 

                                
                      $string=  "Needed Input Sanitization"; 
                      push($string);
                            
                            
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
    push('new');
} 


function  checkifVaribles($chkVarSendline,$chkLineNo,$typeChkLines)
{
   
//    print_r($chkVarSendline);
   
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
//                 echo $chkprtDecLine;
//                print_r($prtDecLine_num);
                push($chkprtDecLine);
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
//                echo $chkvulnLine[$i];
//                push($chkvulnLine[$i]);
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
                  return true;
    
               }
            }
               
        }
    }
}


  function myfunction($v1,$v2)
                     {
                           push($v1);
      push($v2);
                        return $v1 . "<br>" . $v2;
                     }
                      



function push($string)
{
         array_push($GLOBALS['cmdExe_array'],htmlspecialchars($string));
}


//echo "<br>".$xPath_array[0];
$length=count($cmdExe_array);



//for($i=1;$i<$length-1;$i++)
//{
//    
//    
//    echo "<br>".htmlspecialchars($xPath_array[$i])." ".htmlspecialchars($xPath_array[++$i]);
//    if($length==$i)
//    {
//        break;
//    }
//   $i=$i++;
//    
//    if(strcmp($xPath_array[$i],'new')==0)
//    {
//        echo "<br>Line is <br>".htmlspecialchars($xPath_array[$i]);
//        $i=$i++;
//    
//    }
//}
//
//
//

for($i=0;$i<$length;$i++)
{
    if($cmdExe_array[$i]=='new')
    {
//        echo "<br>occured";
    }
    else
    {
        echo "<br>".$cmdExe_array[$i];
    }
}





}
















?>