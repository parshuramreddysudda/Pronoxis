<?php

function startFileReflec($address,$typeChkLines)
{
chdir($address);
    
global $httpTotalLines;  //to count no of lines
global $ReflecnoLines;         //To count no of lines
global $noVulLines;       //TO count no of Vuln varaibles
global $sno;

$httpTotalLines=0;  //to count no of lines
$ReflecnoLines=0;         //To count no of lines
$noVulLines=0;       //TO count no of Vuln varaibles




$LogFileName=$_SESSION['LogFileName'];


//Json Class for appending result
$Reflecjson;  
$myfile = fopen("ReflectionInjection.json", "w") or die("Unable to open file!");
file_put_contents("ReflectionInjection.json","[",FILE_APPEND);
$Reflecjson->AttackName='ReflectionInjection';

$sno=1;

$superArray=array(); //For Storing all lines 
//$superSinkLines=array();    //For storing line number where xss is possible 

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{ 
    $superArray=$typeChkLines;
     
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";
        
        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = Reflecmultiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
    RefleccheckSources($trimmed_Sendline,$typeChkLine_num,$typeChkLines,$typeChkLine,$Reflecjson,$typeChkLine);

    
    

}
    
$ReflecjsonFinal->ForCorrection='String Added to Validate the Json';  
$ReflecjsonFinal->Total_lines="Total Number of Lines are " .$GLOBALS['ReflecnoLines'];
$ReflecjsonFinal->Total_Vulnlines="Total Number of Vulnerable lines are " .$GLOBALS['noVulLines'];
$myJSON = json_encode($ReflecjsonFinal);
$LogFileName=$GLOBALS['LogFileName'];
file_put_contents("ReflectionInjection.json", $myJSON,FILE_APPEND);
file_put_contents("ReflectionInjection.json","]",FILE_APPEND);


//echo "<p class='card-text'>No fo Lines are ".$GLOBALS['ReflecnoLines']."</p>";


//echo "<p class='card-text'>No of Vulnerable Lines are ".$GLOBALS['noVulLines']."</p>";


            
            
            
//For calculating an reporting no of lines infected 
            
$_SESSION['TotalReflecLines']=$GLOBALS['ReflecnoLines']+$_SESSION['TotalReflecLines'];
$_SESSION['TotalReflecVulnLines']=$GLOBALS['noVulLines']+$_SESSION['TotalReflecVulnLines'];

$_SESSION['RefDone']=0;
      

}



//This line is commenetd since these function is declared already in previous call
function Reflecmultiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=","%","&gt;","&lt;","&#x27;"," &#x2F;",";",".","&quot");
    $data=str_replace('"', ',', $data);
    $data=stripslashes($data);
    $quotedata=str_replace('"',"", $data);
	$MakeReady = str_replace($delimiters, $delimiters[0], $quotedata);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}


function RefleccheckSources($chkLine,$chkLineNo,$typeChkLines,$typeChkLine,$Reflecjson,$Line)
{
    
    include'warmHole.php'; 
    $varLenth=count($chkLine);
    $listLen=count($reflectionWarmhole); 
    
    for($i=0;$i<$varLenth;$i++)
    {
        
        for($j=0;$j<$listLen;$j++)
        {
            if(strlen($chkLine[$i])>1)
            {
                if(strcmp($chkLine[$i],$reflectionWarmhole[$j])==0)
                {
//                    This if conditions confirms for sinks    
            
                    
//                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$chkLineNo."</b> May be  Vulnerable</h3>";

    $GLOBALS['ReflecnoLines']++;
                    
                $Reflecjson->LineInfo="Line Number ".$chkLineNo." May be  Vulnerable";  
                    
//                echo "<p class='card-text'>Vulnerable Code <br> <code>".htmlspecialchars($Line)."</code></p>"; 
                    
                $Reflecjson->LineCode="Vulnerable Code ".htmlspecialchars($Line)." ";  
                    
//                echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']." . ".$chkLine[$i]."</red> This may rise Vulnerability</p>";
                    
                $Reflecjson->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']." . ".$chkLine[$i]." This may rise Vulnerability";   
                    
                  checkforReflecSinks($chkLine,$typeChkLines,$chkLineNo,$Reflecjson);
                    checkReflecVarSecure($chkLine,$Reflecjson);
                    
         //Json File for appending output Code 
                    
                $myJSON = json_encode($Reflecjson);
                file_put_contents("ReflectionInjection.json", $myJSON,FILE_APPEND);
                file_put_contents("ReflectionInjection.json",",",FILE_APPEND);
                
                    break;
                }
            }
            
        }
    }  
    
}






//This function checks for sinks in the source lines
function checkforReflecSinks($sinkChkLine,$typeChkLines,$chkLineNo,$Reflecjson)
{
    include'checkWordlists.php';
        
      $listNo=count($userInputValues);
      $varNo=count($sinkChkLine);
      $vuln=0;
   
    

    
    for($i=0;$i<$varNo;$i++)
    {
//          print_r($sinkChkLine);
        for($j=0;$j<$listNo;$j++)
        {
           
            
            if(strlen($sinkChkLine[$i])>1)
            {
        
            $tempcount=strlen($sinkChkLine[$i]);  //To count no of letter
            $tempCut=substr($sinkChkLine[$i],0,$tempcount-1)  ;    //To cut last letter i.e $_GET[  => $GET  
           
              if(strcmp($tempCut,$userInputValues[$j])==0)
              {
                 
                  $vuln=1;                 //Too count 
//                   echo "<p class='card-text'>Input Values found they are  <red>".$userInputValues[$j]."</red>";
                  
                  $Reflecjson->InputValues="Input Values found they are ".$userInputValues[$j]." ";
                      
                   
//                  echo "<p class='card-text'>Checking for Securing Functions<br></p>";
                  
                    $Reflecjson->ChkSecure="Checking for Securing Functions";
                  
                  checkReflecSecure($sinkChkLine,$Reflecjson);
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
            break;
        }
    }
    if($vuln==0)
    {
//         echo "<p class='card-text'>Input Values <green>Not found </green> Checking  Variables If </p> ";
        
         $Reflecjson->InputChk="Input Values <green>Not found </green> Checking";
         
        checkifReflecVariables($sinkChkLine,$typeChkLines,$chkLineNo,$Reflecjson);
    }
    
}


//This function checks whether sinks  i.e get and post are protected or not
function checkReflecSecure($vulnChkLine,$Reflecjson)
{
    $vuln=0;
    $vuln1=0;
    include'vulnWordlist.php';
    include 'checkWordlists.php';
        $listCount=count($xssSecureVuln);
        $varCount=count($vulnChkLine);
        $fileList=count($fileInputValues);
    
    for($i=0;$i<$varCount;$i++)
    {
        for($j=0;$j<$listCount;$j++)
        {
            
            if(strlen($vulnChkLine[$i])>1)
            {
                
            if(strcmp($vulnChkLine[$i],$xssSecureVuln[$j])==0)
               {
//                echo "<p class='card-text'>This Line is <green>Secure</green> with  ".$vulnChkLine[$i]."</p>";
                
                   $Reflecjson->Secure="This Line is  Secure with  ".$vulnChkLine[$i]." ";
                
          
                 $vuln=1;
                  break;
               }
            }
               
        }
    }
    if($vuln==0)
    {
//        echo "<p class='card-text'>No Securing functions or Variables Found</p>";
        
          $Reflecjson->Functions=" No Securing functions Found";
        
//        echo "<p class='card-text'>This line is <red> Vulnerable </red>. It doesn't <red>no</red>t have <red>Securing</red> Functions</p>";
        
         $Reflecjson->SinksInfo="This line is Vulnerable . It doesn't not have Securing Functions";
        
        
        $GLOBALS['noVulLines']++;
    }
    
    //Checking the File input Strings  (sinks)
    

     
    for($i=0;$i<$varCount;$i++)
    {
        for($j=0;$j<$fileList;$j++)
        {
            
            if(strlen($vulnChkLine[$i])>1)
            {
                
            if(strcmp($vulnChkLine[$i],$fileInputValues[$j])==0)
               {
               
//                 echo "<p class='card-text'>This Line is <green>Secure</green> with  ".$vulnChkLine[$i]."</p>";
                
                   $Reflecjson->fileSecure="This Line is  Secure with  ".$vulnChkLine[$i]." ";
                
                 $vuln1=1; 
                  break;
               }
            }
               
        }
    }
    if($vuln1==0)
    {
//        echo "<p class='card-text'>No Securing functions or Variables Found</p>";
        
          $Reflecjson->fileFunctions=" No Securing functions Found";
        
//        echo "<p class='card-text'>This line is <red> Vulnerable </red>. It doesn't <red>no</red>t have <red>Securing</red> Functions</p>";
        
         $Reflecjson->fileSinksInfo="This line is Vulnerable . It doesn't not have Securing Functions";
        
        $GLOBALS['noVulLines']++;
    }
    
    
}

            
            //Checking Variables for Vulenrable 

function checkReflecVarSecure($vulnChkLine,$Reflecjson)
{
    $vuln=0;
    $vuln1=0;
    include'vulnWordlist.php';
    include 'checkWordlists.php';
        $listCount=count($anySecureVuln);
        $varCount=count($vulnChkLine);
    
    for($i=0;$i<$varCount;$i++)
    {
        for($j=0;$j<$listCount;$j++)
        {
            
            if(strlen($vulnChkLine[$i])>1)
            {
                
            if(strcmp($vulnChkLine[$i],$anySecureVuln[$j])==0)
               {
               
//                  echo "<p class='card-text'>This Line is <green>Secure</green> with  <code>  ".$vulnChkLine[$i]."</code></p>";
                
                   $Reflecjson->RelectionInjectionSecure="This Line is  Secure with  ".$anySecureVuln[$i]." ";
                
                 $vuln=1;
                  break;
               }
            }
               
        }
    }
    if($vuln==0)
    {
//        echo "<p class='card-text'>No Securing functions Found For Main Line</p>";
        
          $Reflecjson->Functions=" No Securing functions Found";
        
//        echo "<p class='card-text'>This line is <red> Vulnerable </red>. It doesn't <red>no</red>t have <red>Securing</red> Functions</p>";
        
         $Reflecjson->RelectionInjectionInfo="This line is Vulnerable . It doesn't not have Securing Functions";
        
         
        
        $GLOBALS['noVulLines']++;
    }
}

//This functiuons checks for the variables in the vuln lines !

function checkifReflecVariables($chkVarSendline,$chkVarLines,$chkSendDecLine_num,$Reflecjson)
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
                ReflecprintRelectionInjectionDeclaration($chkVarSendline[$i],$chkVarLines,$chkSendDecLine_num,$Reflecjson);
        }
        
         else
           {
            $tempCutQuot1=substr($chkVarSendline[$i],7,-7);  //Substr for getting values in db ".$value." => to $value trimming both sides symbols
             $tempCut=substr($tempCutQuot1,0,1);
             
             if($tempCut=='$')
             {
                 echo $tempCutQuot1;
               
            ReflecprintRelectionInjectionDeclaration($tempCutQuot1,$chkVarLines,$chkSendDecLine_num,$Reflecjson);  //Send the value decleared in th sql string since it has uni characters like " ' . they are trimmed first and then sent
             }
             
            
           }
        
        
//        $GLOBALS['countTemp']++;
    }
    
//     $GLOBALS['sessionVar']++;
      
//    echo "<br>";   
}



function ReflecprintRelectionInjectionDeclaration($prtDecVar,$prtDecLines,$prtDecLine_num,$Reflecjson)   //Dec==Declaration
{
    
   
    foreach ($prtDecLines as $chkprtDecLine_num => $chkprtDecLine)
    {   
        $sendprtDecLine=htmlspecialchars($chkprtDecLine);
        $trimDecprtSendline = Reflecmultiexplode($sendprtDecLine); 
        $trimmed_DecprtSendline=array_map('trim',$trimDecprtSendline);
      
//        echo $chkprtDecLine_num."<br>";
//        print_r($trimmed_DecprtSendline);
//        echo "<br>";
        
        $filteredArray=array_filter($trimmed_DecprtSendline);
        $firstEle=array_shift($filteredArray);
        if(strcmp($prtDecVar,$firstEle)==0)
        { 
           
 
//            echo "<br>";
            
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
//                 echo "<p class='card-text'>Input Values are found in ".$chkprtDecLine."</p>";
                 
                 $Reflecjson->InputValChk=" Input Values are found in ".$chkprtDecLine." ";
                
                
            
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = Reflecmultiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
                 checkReflecSecure($chkprtDecLine,$Reflecjson); checkifReflecVariables($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$Reflecjson);
            }
        }
        else if(count($trimmed_DecprtSendline)>1)     //To check the Variable declared after a space or in the a[1] from starting .
        {
            
            $tempCutDec=substr($prtDecVar,0,1);   //To print only php variables in the analyzer
           
//               echo $prtDecVar;
            if(strcmp($prtDecVar,$trimmed_DecprtSendline[1])==0&&($trimmed_DecprtSendline[2]==" "||$trimmed_DecprtSendline[1]="NULL"||$trimmed_DecprtSendline[2]==" "||$trimmed_DecprtSendline[2]="NULL"||$trimmed_DecprtSendline[3]==" "||$trimmed_DecprtSendline[3]="NULL")) //To print variables declared after two spaces or three
            { 
//                echo "<br>Lines  Compared ".$prtDecVar." are ".$trimmed_DecprtSendline[0];
//                echo " <br>Same Declared Element Called ".$prtDecVar;
//                  echo "<br>";
//                echo $prtDecVar;
//                echo $chkprtDecLine_num.", ";
//                echo $prtDecLine_num;
           
                if($chkprtDecLine_num==$prtDecLine_num)
                {
//                    echo "Same Elements of same Line".$chkprtDecLine_num;
                    break;
               
                }
                else
                {
//                   echo "<p class='card-text'>Input Values are found in ".$chkprtDecLine."</p>";
                 
                 $Reflecjson->InputValChk=" Input Values are found in ".$chkprtDecLine." ";
                
                  
                    $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                    $chkprtDecLine = Reflecmultiexplode($chkprtDecLine);
                    $chkprtDecLine=array_map('trim',$chkprtDecLine);
//                    print_r($chkprtDecLine);
//                  $Token = new Tokenizer();
//            $Token->
                checkReflecSecure($chkprtDecLine,$Reflecjson); 
                checkifReflecVariables($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$Reflecjson);
                }
            }
       
            
        
       } 
//        $GLOBALS['countTemp']++;
    }

}

          


?>            
