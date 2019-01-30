<?php



 

function startFileMan($address,$typeChkLines)
{
    
chdir($address);
 
$LogFileName=$_SESSION['LogFileName'];

global $httpTotalLines;  //to count no of lines
global $noFileManLines;         //To count no of lines
global $noFileManVulLines;       //TO count no of Vuln varaibles

 
$httpTotalLines=0;  //to count no of lines
$noFileManLines=0;         //To count no of lines
$noFileManVulLines=0;       //TO count no of Vuln varaibles

     
    
$fileManjson;  
$myfile = fopen("FileManipulationVuln.json", "w") or die("Unable to open file!");
file_put_contents("FileManipulationVuln.json","[",FILE_APPEND);
$fileManjson->AttackName='FileManipulationVuln';

$sno=1;

$superArray=array(); //For Storing all lines 
//$superSinkLines=array();    //For storing line number where xss is possible 

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{ 
    $superArray=$typeChkLines;
    
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";
        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = fileManmultiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
    fileMancheckSources($trimmed_Sendline,$typeChkLine_num,$typeChkLines,$typeChkLine,$fileManjson,$typeChkLine);
       
    
    $GLOBALS['sno']=1;
    
 
    

}

 
    
    $fileManjsonFinal->ForCorrection='String Added to Validate the Json';  
$fileManjsonFinal->Total_lines="Total Number of Lines are " .$GLOBALS['noFileManLines'];
$fileManjsonFinal->Total_Vulnlines="Total Number of Vulnerable lines are " .$GLOBALS['noFileManVulLines'];
$myJSON = json_encode($fileManjsonFinal);
$LogFileName=$GLOBALS['LogFileName'];
file_put_contents("FileManipulationVuln.json", $myJSON,FILE_APPEND);
file_put_contents("FileManipulationVuln.json","]",FILE_APPEND);



//echo "<p class='card-text'>No fo Lines are ".$GLOBALS['noFileManLines']."</p>";

//echo "<p class='card-text'>No of Vulnerable Lines are ".$GLOBALS['noFileManVulLines']."</p>";


//For calculating an reporting no of lines infected 
            
$_SESSION['TotalFileManLines']=$GLOBALS['noFileManLines'];
$_SESSION['TotalFileManVulnLines']=$GLOBALS['noFileManVulLines'];

$_SESSION['fileManDone']=0;
}



function fileManmultiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=","%","&gt;","&lt;","&#x27;"," &#x2F;",";",".","&quot");
    $data=str_replace('"', ',', $data);
    $data=stripslashes($data);
    $quotedata=str_replace('"',"", $data);
	$MakeReady = str_replace($delimiters, $delimiters[0], $quotedata);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}


function fileMancheckSources($chkLine,$chkLineNo,$typeChkLines,$typeChkLine,$fileManjson,$Line)
{
    
    include'warmHole.php'; 
    $varLenth=count($chkLine);
    $listLen=count($fileManipWarmhole); 
    
    for($i=0;$i<$varLenth;$i++)
    {
        
        for($j=0;$j<$listLen;$j++)
        {
            if(strlen($chkLine[$i])>1)
            {
                if(strcmp($chkLine[$i],$fileManipWarmhole[$j])==0)
                {
//                    This if conditions confirms for sinks 
                  echo "<hr><br>";
                    
                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$chkLineNo."</b> May be  Vulnerable</h3>";

                     $GLOBALS['noFileManLines']++;  
                $fileManjson->LineInfo="Line Number ".$chkLineNo." May be  Vulnerable";  
                    
                echo "<p class='card-text'>Vulnerable Code <br> <code>".htmlspecialchars($Line)."</code></p>"; 
                    
                $fileManjson->LineCode="Vulnerable Code ".htmlspecialchars($Line)." ";  
                    
                echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']." . ".$chkLine[$i]."</red> This may rise Vulnerability</p>";
                    
                $fileManjson->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']." . ".$chkLine[$i]." This may rise Vulnerability";   
                    
               fileMancheckforSinks($chkLine,$typeChkLines,$chkLineNo,$fileManjson);
                    
                      //Json File for appending output Code 
                    
                $myJSON = json_encode($fileManjson);
                file_put_contents("FileManipulationVuln.json", $myJSON,FILE_APPEND);
                file_put_contents("FileManipulationVuln.json",",",FILE_APPEND);
                     echo "</div>";
                
                }
            }
            
        }
    }  
    
}






//This function checks for sinks in the source lines
function fileMancheckforSinks($sinkChkLine,$typeChkLines,$chkLineNo,$fileManjson)
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
                 echo "<p class='card-text'>Input Values found they are  <red>".$userInputValues[$j]."</red>";
                  
                  $fileManjson->InputValues="Input Values found they are ".$userInputValues[$j]." ";
                      
                      
                      
                  echo "<p class='card-text'>Checking for Securing Functions<br></p>";
                  
                    $fileManjson->ChkSecure="Checking for Securing Functions";
                  
                  fileMancheckSecure($sinkChkLine,$fileManjson);
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
        echo "<p class='card-text'>Input Values <green>Not found </green> Cheking  Variables If </p> ";
        
         $fileManjson->InputChk="Input Values <green>Not found </green> Cheking  Variables If  ";
        
        fileMancheckifVaribles($sinkChkLine,$typeChkLines,$chkLineNo,$fileManjson);
    }
    
}


//This function checks whether sinks  i.e get and post are protected or not
function fileMancheckSecure($vulnChkLine,$fileManjson)
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
               
                  echo "<p class='card-text'>This Line is <green>Secure</green> with  ".$vulnChkLine[$i]."</p>";
                
                   $fileManjson->Secure="This Line is  Secure with  ".$vulnChkLine[$i]." ";
                
                
                 $vuln=1;
                  break;
               }
            }
               
        }
    }
    if($vuln==0)
    {
        echo "<p class='card-text'><red>No Secur</red>ing functions Found</p>";
        
          $fileManjson->Functions=" No Securing functions Found";
        
        echo "<p class='card-text'>This line is <red> Vulnerable </red>. It doesn't <red>no</red>t have <red>Securing</red> Functions</p>";
        
         $fileManjson->SinksInfo="This line is Vulnerable . It doesn't not have Securing Functions";
        
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
               
                 echo "<p class='card-text'> Sinks found  they are ".$vulnChkLine[$i]."</p>";
                $fileManjson->SinkStatus="Sinks found  they are ".$vulnChkLine[$i];
                 $vuln1=1; 
                $_SESSION['Secured']++;
                  break;
               }
            }
               
        }
    }
    if($vuln1==0)
    {
        echo "<p class='card-text'>No Sinks Found</p>";
        $fileManjson->SinkStatus="No Sinks Found";
        $GLOBALS['noFileManVulLines']++;
    }
    
    
}




//This functiuons checks for the variables in the vuln lines !

function fileMancheckifVaribles($chkVarSendline,$chkVarLines,$chkSendDecLine_num,$fileManjson)
{
   
//    print_r($chkVarSendline);
     $temp=0;
    $noofelelments=count($chkVarSendline);
   
    
    for($i=1;$i<$noofelelments;$i++)
    {
        $tempCut=substr($chkVarSendline[$i],0,1);
        
        if(strcmp($tempCut,'$')==0)
        {
//            echo "<br>Trimmed Var ".$chkVarSendline[$i];
//            $Token = new Tokenizer();
//            $Token->
                fileManprintDeclaration($chkVarSendline[$i],$chkVarLines,$chkSendDecLine_num,$fileManjson);
              $temp=1;
        }
        
         else
           {
            $tempCutQuot1=substr($chkVarSendline[$i],7,-7);  //Substr for getting values in db ".$value." => to $value trimming both sides symbols
             $tempCut=substr($tempCutQuot1,0,1);
             
             if($tempCut=='$')
             {
//                 echo $tempCutQuot1;
               
            fileManprintDeclaration($tempCutQuot1,$chkVarLines,$chkSendDecLine_num,$fileManjson);  //Send the value decleared in th sql string since it has uni characters like " ' . they are trimmed first and then sent
                   $temp=1;
             }

           }

    }
    
     if($temp==0)
    {
        echo "<p class='card-text'>No Variables found </p>";
    }
    


}



function fileManprintDeclaration($prtDecVar,$prtDecLines,$prtDecLine_num,$fileManjson)   //Dec==Declaration
{
    
   
    foreach ($prtDecLines as $chkprtDecLine_num => $chkprtDecLine)
    {   
        $sendprtDecLine=htmlspecialchars($chkprtDecLine);
        $trimDecprtSendline = fileManmultiexplode($sendprtDecLine); 
        $trimmed_DecprtSendline=array_map('trim',$trimDecprtSendline);

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
//                echo "<p class='card-text'>Input Values are found in 
//                <code>".$chkprtDecLine." </code></p>";
                 
                 $fileManjson->InputValChkforVulnVar=" Variables found in their Declaration is ".$chkprtDecLine." ";
                
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = fileManmultiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
                 fileMancheckSecure($chkprtDecLine,$fileManjson); fileMancheckifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$fileManjson);
            }
        }
        else if(count($trimmed_DecprtSendline)>1)     //To check the Variable declared after a space or in the a[1] from starting .
        {
            
            $tempCutDec=substr($prtDecVar,0,1);   //To print only php variables in the analyzer
           
//               echo $prtDecVar;
            if(strcmp($prtDecVar,$trimmed_DecprtSendline[1])==0&&($trimmed_DecprtSendline[2]==" "||$trimmed_DecprtSendline[1]="NULL"||$trimmed_DecprtSendline[2]==" "||$trimmed_DecprtSendline[2]="NULL"||$trimmed_DecprtSendline[3]==" "||$trimmed_DecprtSendline[3]="NULL")) //To print variables declared after two spaces or three
            { 
//                echo "<br>Li/nes  Compared ".$prtDecVar." are ".$trimmed_DecprtSendline[0];
//                echo " <br>Same Declared Element Called ".$prtDecVar;
                
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
                   echo "<p class='card-text'>Variables are found in Line Number ".$chkprtDecLine_num."</p>";
                    
                 $fileManjson->InputValChkforVulnVar="Variables are found in Line Number ".$chkprtDecLine_num ;
                    
                        echo "<p class='card-text'>Code for Line Number   ".$chkprtDecLine_num." is <br><code>".$chkprtDecLine."</code></p>";
                    
                  $fileManjson->VulnLineCode="Code for Line Number   ".$chkprtDecLine_num." is ".$chkprtDecLine." ";
                    
                    
                    $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                    $chkprtDecLine = fileManmultiexplode($chkprtDecLine);
                    $chkprtDecLine=array_map('trim',$chkprtDecLine);
//                    print_r($chkprtDecLine);
//                  $Token = new Tokenizer();
//            $Token->
                fileMancheckSecure($chkprtDecLine,$fileManjson); 
                fileMancheckifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$fileManjson);
                }
            }
       
            
        
       } 
    }

}



?>
         

    