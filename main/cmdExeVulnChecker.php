
<?php

//chdir($address);

function startCmd($address,$typeChkLines)
{
chdir($address);
global $cmdTotalLines;
global $countTemp;       //For Calculating Recurssion
global $sessionVar;      //To calculate no of var  
global $cmdTotalVulnlines;
global $cmdTotalVarInPage; 
global $cmdLineVar;       //To calcuate no of var in Vuln line
global $cmdVulnLineVar;  //To store no of vulnerable var in a Vuln line to compare after testing it

global $userInpVal;  //To test for user input Values;
global $noCmdVulLines;//To calculate total Lines
    
$cmdTotalLines=0;
$countTemp=0;       //For Calculating Recurssion
$sessionVar=0;      //To calculate no of var  
$cmdTotalVulnlines=0;
$cmdTotalVarInPage=0; 
$cmdLineVar=0;       //To calcuate no of var in Vuln line
$cmdVulnLineVar=0;  //To store no of vulnerable var in a Vuln line to compare after testing it
$inputValues=array(); //To store input values Responsible for vuln
$userInpVal=0;  //To test for user input Values;
$noCmdVulLines=0;//To calculate total Lines
    
  
$typeChkLines = $_SESSION['checkTypeCheckLine'];
$LogFileName=$_SESSION['LogFileName'];;

global $sno;  //For counting vuln var
$sno=1;  //For counting vuln var

//Json Class for storing result in json file
$cmdjson;  
$cmdmyfile = fopen("CmdExecution.json", "w") or die("Unable to open file!");
file_put_contents("CmdExecution.json","[",FILE_APPEND);
$cmdjson->AttackName='CmdExecution';

$superArray=array(); //For Storing all lines 
//$superSinkLines=array();    //For storing line number where xss is possible 

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{ 
    $superArray=$typeChkLines;
   
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";


        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = cmdmultiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        cmdcheckSources($trimmed_Sendline,$typeChkLine_num,$typeChkLines,$cmdjson,$typeChkLine);
        
  
    

}
    
$cmdjsonFinal->ForCorrection='String Added to Validate the Json';  
$cmdjsonFinal->Total_lines="Total Number of Lines are " .$GLOBALS['noLines'];
$cmdjsonFinal->Total_Vulnlines="Total Number of Vulnerable lines are " .$GLOBALS['noCmdVulLines'];
$cmdmyJSON = json_encode($cmdjsonFinal);
$LogFileName=$GLOBALS['LogFileName'];
file_put_contents("CmdExecution.json", $cmdmyJSON,FILE_APPEND);
file_put_contents("CmdExecution.json","]",FILE_APPEND);


//echo "<p class='card-text'>No fo Lines are ".$GLOBALS['cmdTotalLines']."</p>";

//echo "<p class='card-text'>No of Vulnerable Lines are ".$GLOBALS['noCmdVulLines']."</p>";

//For calculating an reporting no of lines infected 

$_SESSION['TotalCmdLines']=$GLOBALS['cmdTotalLines']+$_SESSION['TotalCmdLines'];
$_SESSION['TotalCmdVulnLines']=$GLOBALS['noCmdVulLines']+$_SESSION['TotalCmdVulnLines'];

$_SESSION['cmdDone']=0;
    
}






function cmdmultiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=","%","&gt;","&lt;","&#x27;"," &#x2F;",";",".","&quot");
    $data=str_replace('"', ',', $data);
    $data=stripslashes($data);
    $quotedata=str_replace('"',"", $data);
	$MakeReady = str_replace($delimiters, $delimiters[0], $quotedata);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}



function cmdcheckSources($chkLine,$chkLineNo,$typeChkLines,$cmdjson,$Line)
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
                $GLOBALS['cmdTotalLines']++;
                    
                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$chkLineNo."</b> May be  Vulnerable</h3>";

                    
                $cmdjson->LineInfo="Line Number ".$chkLineNo." May be  Vulnerable";  
                    
                echo "<p class='card-text'>Vulnerable Code <br> <code>".htmlspecialchars($Line)."</code></p>"; 
                    
                $cmdjson->LineCode="Vulnerable line Code is  ".htmlspecialchars($Line)." ";  
                    
               cmdCheckVarVuln($chkLine,$cmdjson);
              cmdcheckifVaribles($chkLine,$chkLineNo,$typeChkLines,$cmdjson);
             
              
            if($GLOBALS['cmdVulnLineVar']==0)
              {
                
                  echo "<p class='card-text'>Line Number <red>".$chkLineNo." </red> is <red> Vulnerable </red> .All the <red> Variables may Not be secured</red></p>";
                
                  $cmdjson->MainInfo="Line Number ".$chkLineNo." is Vulnerable  .All the variables may Not be secured"; 
                
                
                $GLOBALS['noCmdVulLines']++;

              }
              else 
              {
                   echo "<p class='card-text'>Line Number <green>".$chkLineNo."</green>  is <green>  Protected </green> .All the <green> Variables are secured</green> </p>";
                
                  $cmdjson->MainInfo="Line Number ".$chkLineNo." is Protected  .All the variables are secured"; 
                
                 
              }
              
              
                $cmdmyJSON = json_encode($cmdjson);
    file_put_contents("CmdExecution.json", $cmdmyJSON,FILE_APPEND);
    file_put_contents("CmdExecution.json",",",FILE_APPEND);
          } 
       }
    }
    $GLOBALS['cmdLineVar']=0; 
    $GLOBALS['cmdVulnLineVar']=0;
    //Json File for appending output Code 
                    
  
} 


function  cmdcheckifVaribles($chkVarSendline,$chkLineNo,$typeChkLines,$cmdjson)
{
   $temp=0;
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
            $temp=1;
              cmdchekUserInputValues($chkVarSendline,$cmdjson);
              cmdprintDeclaration($chkVarSendline[$i],$chkLineNo,$typeChkLines,$cmdjson);
        } 
      else
           {
            $temp=1;
            $tempCutQuot1=substr($chkVarSendline[$i],7,-7);  //Substr for getting values in db ".$value." => to $value trimming both sides symbols
             $tempCut=substr($tempCutQuot1,0,1);
             
             if($tempCut=='$')
             {
//             echo $tempCutQuot1;
               
               cmdchekUserInputValues($chkVarSendline,$cmdjson);
               cmdprintDeclaration($tempCutQuot1,$chkLineNo,$typeChkLines,$cmdjson);  //Send the value decleared in th sql string since it has uni characters like " ' . they are trimmed first and then sent
             }
             
            
           }
        
        
        $GLOBALS['countTemp']++;
    }
    
    
    if($temp==0)
    {
//        echo "<p class='card-text'>No Variables found </p>";
    }
    
    
     $GLOBALS['cmdLineVar']++;
      
   
}



function cmdprintDeclaration($prtDecVar,$prtDecLine_num,$prtDecLines,$cmdjson)   //Dec==Declaration
{

    foreach ($prtDecLines as $chkprtDecLine_num => $chkprtDecLine)
    {  
        
        $sendprtDecLine=htmlspecialchars($chkprtDecLine);
        $trimDecprtSendline = cmdmultiexplode($sendprtDecLine); 
        $trimmed_DecprtSendline=array_map('trim',$trimDecprtSendline);
      
//        echo $chkprtDecLine_num."<br>";
//        print_r($trimmed_DecprtSendline);
//        echo "<br>";
        
        $filteredArray=array_filter($trimmed_DecprtSendline);
        $firstEle=array_shift($filteredArray);
        if(strcmp($prtDecVar,$firstEle)==0)
        { 
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
//                 echo  "<p class='card-text'> Variables are <br>  <code>".$prtDecVar."</code></p>";
                
                 $cmdjson->DeclaredLineNo="Variables found ".$prtDecVar;
                
//                 echo  "<p class='card-text'> Variables Declaration of Vulnerable Line is <br><code>".$chkprtDecLine."</code></p>";
                
                  $cmdjson->DeclaredLineNo="Vulnerable Variables are ".$chkprtDecLine;
                
//                print_r($prtDecLine_num);
                
                
                 cmdCheckVarVuln($trimmed_DecprtSendline,$cmdjson); 
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = cmdmultiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
                 cmdcheckifVaribles($chkprtDecLine,$chkprtDecLine_num,$prtDecLines,$cmdjson);
            }
        }
    
        $GLOBALS['countTemp']++;
    }
   
}



function  cmdCheckVarVuln($chkvulnLine,$cmdjson)
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
//                echo "Securing Functions for this line is ".$chkvulnLine[$i];
                        
//                echo "<p class='card-text'>Securing Functions for this line is<code>".$chkvulnLine[$i]."</code></p>";
                  
                $cmdjson->ChkSecure="Securing Functions for this line is".$chkvulnLine[$i];
                 
                
                
                $GLOBALS['cmdVulnLineVar']++;
                break;
            }
            else
            {
                
                $tempVulnChk=1;
            }
            
        }
       
        
    }
    if($tempVulnChk==0)
    {
//        echo "<p class='card-text'>No Securing Functions for this Line</p>";
                  
        $cmdjson->ChkSecure="No Securing Functions for this Line";
                
        
    }
  
}
function cmdchekUserInputValues($sinkChkLine,$cmdjson)
{
    include'checkWordlists.php';
   
      $tempinputValues=array();
    
      global $inputValues;
      $input=0;
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
                 
//               echo "<p class='card-text'>Input Values found they are  <red>".$userInputValues[$j]."</red>";
                  
               $cmdjson->InputValues="Input Values found they are ".$userInputValues[$j]." ";
                
//               echo "<p class='card-text'>Checking for Securing Functions<br></p>";
                  
                    $cmdjson->ChkSecure="Checking for Securing Functions";
                $input=1;
                cmdcheckSecure($sinkChkLine,$cmdjson);
               }
         }
        
      }
    
    if($input==0)
    {
        
//        echo "<p class='card-text'>Input Values <green>Not found </green> Checking  Variables If </p> ";
        
         $cmdjson->InputValues="Input Values <green>Not found </green> Checking  Variables If  ";
    }
 
}

function cmdcheckSecure($vulnChkLine,$cmdjson)
{
    include'vulnWordlist.php';
        $listCount=count($xssSecureVuln);
        $varCount=count($vulnChkLine);
    $vuln=0;
    
    for($i=0;$i<$varCount;$i++)
    {
        for($j=0;$j<$listCount;$j++)
        {
            
            
            if(strlen($vulnChkLine[$i])>1)
            {
            if(strcmp($vulnChkLine[$i],$xssSecureVuln[$j])==0)
               {
//        echo "<p class='card-text'>This Line is <green>Secure</green> with  ".$xssSecureVuln[$j]."</p>";
                
    $cmdjson->Secure="This Line is  Secure with  ".$xssSecureVuln[$j]." ";
    $vuln=1;
               }
            }
               
        }
    }
    
   if($vuln==0)
   {
      
//        echo "<p class='card-text'>This line is <red> Vulnerable </red>. It doesn't <red>no</red>t have <red>Securing</red> Functions</p>";
        
         $cmdjson->InputInfo="This line is Vulnerable . It doesn't not have Securing Functions";
       
       $GLOBALS['cmdVulnLineVar']--;
   }
}


?>
                      
            