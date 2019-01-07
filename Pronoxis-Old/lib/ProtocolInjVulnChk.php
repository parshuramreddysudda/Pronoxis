<?php

include 'configuration.php';

$time_start = microtime(true); //Create a variable for start time
$fh = fopen('Vulnerability.log', 'w');
$date = new DateTime();
$date = $date->format("y:m:d h:i:s");
//chdir('G:\xammp\htdocs\test');
$httpTotalLines=0;  //to count no of lines
$noLines=0;         //To count no of lines
$noVulLines=0;       //TO count no of Vuln varaibles
$typeChkLines = $SERVER['checkFileName'];
$LogFileName=$SERVER['LogFileName'];


//Json Class for appending result
$json;  
$myfile = fopen("ProtocolInjection.json", "w") or die("Unable to open file!");
file_put_contents("ProtocolInjection.json","[",FILE_APPEND);
$json->AttackName='ProtocolInjection';

$sno=1;
?> 
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Protocol Injection Vulnerability Details</h4>
            
<?php

    
 


$superArray=array(); //For Storing all lines 
//$superSinkLines=array();    //For storing line number where xss is possible 

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{ 
    $superArray=$typeChkLines;
     
 $json=$GLOBALS['json'];
   
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";
        
        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
    checkSources($trimmed_Sendline,$typeChkLine_num,$typeChkLines,$typeChkLine,$json,$typeChkLine);

    
    $GLOBALS['httpTotalLines']++;
    

}



//This line is commenetd since these function is declared already in previous call
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


function checkSources($chkLine,$chkLineNo,$typeChkLines,$typeChkLine,$json,$Line)
{
    
    include'warmHole.php'; 
    $varLenth=count($chkLine);
    $listLen=count($protocalWarmhole); 
    
    for($i=0;$i<$varLenth;$i++)
    {
        
        for($j=0;$j<$listLen;$j++)
        {
            if(strlen($chkLine[$i])>1)
            {
                if(strcmp($chkLine[$i],$protocalWarmhole[$j])==0)
                {
//                    This if conditions confirms for sinks    
                echo "<hr><br>";
                    
                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$chkLineNo."</b> May be  Vulnerable</h3>";

                    
                $json->LineInfo="Line Number ".$chkLineNo." May be  Vulnerable";  
                    
                echo "<p class='card-text'>Vulnerable Code <br> <code>".htmlspecialchars($Line)."</code></p>"; 
                    
                $json->LineCode="Vulnerable Code ".htmlspecialchars($Line)." ";  
                    
                echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']." . ".$chkLine[$i]."</red> This may rise Vulnerability</p>";
                    
                $json->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']." . ".$chkLine[$i]." This may rise Vulnerability";   
                    
                  checkforProtocSinks($chkLine,$typeChkLines,$chkLineNo,$json);
                    checkProtocVarSecure($chkLine,$json);
                  $GLOBALS['noLines']++; 
                    
         //Json File for appending output Code 
                    
                $myJSON = json_encode($json);
                file_put_contents("ProtocolInjection.json", $myJSON,FILE_APPEND);
                file_put_contents("ProtocolInjection.json",",",FILE_APPEND);
                
                    break;
                }
            }
            
        }
    }  
    
}






//This function checks for sinks in the source lines
function checkforProtocSinks($sinkChkLine,$typeChkLines,$chkLineNo,$json)
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
                  
                  $json->InputValues="Input Values found they are ".$userInputValues[$j]." ";
                      
                   
                  echo "<p class='card-text'>Checking for Securing Functions<br></p>";
                  
                    $json->ChkSecure="Checking for Securing Functions";
                  
                  checkProtocSecure($sinkChkLine,$json);
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
         echo "<p class='card-text'>Input Values <green>Not found </green> Checking  Variables If </p> ";
        
         $json->InputChk="Input Values <green>Not found </green> Checking";
         
        checkifProtocVariables($sinkChkLine,$typeChkLines,$chkLineNo,$json);
    }
    
}


//This function checks whether sinks  i.e get and post are protected or not
function checkProtocSecure($vulnChkLine,$json)
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
                
                   $json->Secure="This Line is  Secure with  ".$vulnChkLine[$i]." ";
                
          
                 $vuln=1;
                  break;
               }
            }
               
        }
    }
    if($vuln==0)
    {
        echo "<p class='card-text'>No Securing functions or Variables Found</p>";
        
          $json->Functions=" No Securing functions Found";
        
        echo "<p class='card-text'>This line is <red> Vulnerable </red>. It doesn't <red>no</red>t have <red>Securing</red> Functions</p>";
        
         $json->SinksInfo="This line is Vulnerable . It doesn't not have Securing Functions";
        
        
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
               
                 echo "<p class='card-text'>This Line is <green>Secure</green> with  ".$vulnChkLine[$i]."</p>";
                
                   $json->fileSecure="This Line is  Secure with  ".$vulnChkLine[$i]." ";
                
                 $vuln1=1; 
                  break;
               }
            }
               
        }
    }
    if($vuln1==0)
    {
        echo "<p class='card-text'>No Securing functions or Variables Found</p>";
        
          $json->fileFunctions=" No Securing functions Found";
        
        echo "<p class='card-text'>This line is <red> Vulnerable </red>. It doesn't <red>no</red>t have <red>Securing</red> Functions</p>";
        
         $json->fileSinksInfo="This line is Vulnerable . It doesn't not have Securing Functions";
        
        $GLOBALS['noVulLines']++;
    }
    
    
}

            
            //Checking Variables for Vulenrable 

function checkProtocVarSecure($vulnChkLine,$json)
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
               
                  echo "<p class='card-text'>This Line is <green>Secure</green> with  <code>  ".$vulnChkLine[$i]."</code></p>";
                
                   $json->XpathSecure="This Line is  Secure with  ".$anySecureVuln[$i]." ";
                
                 $vuln=1;
                  break;
               }
            }
               
        }
    }
    if($vuln==0)
    {
        echo "<p class='card-text'>No Securing functions Found For Main Line</p>";
        
          $json->Functions=" No Securing functions Found";
        
        echo "<p class='card-text'>This line is <red> Vulnerable </red>. It doesn't <red>no</red>t have <red>Securing</red> Functions</p>";
        
         $json->XpathInfo="This line is Vulnerable . It doesn't not have Securing Functions";
        
         
        
        $GLOBALS['noVulLines']++;
    }
}

//This functiuons checks for the variables in the vuln lines !

function checkifProtocVariables($chkVarSendline,$chkVarLines,$chkSendDecLine_num,$json)
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
                printXpathDeclaration($chkVarSendline[$i],$chkVarLines,$chkSendDecLine_num,$json);
        }
        
         else
           {
            $tempCutQuot1=substr($chkVarSendline[$i],7,-7);  //Substr for getting values in db ".$value." => to $value trimming both sides symbols
             $tempCut=substr($tempCutQuot1,0,1);
             
             if($tempCut=='$')
             {
                 echo $tempCutQuot1;
               
            printXpathDeclaration($tempCutQuot1,$chkVarLines,$chkSendDecLine_num,$json);  //Send the value decleared in th sql string since it has uni characters like " ' . they are trimmed first and then sent
             }
             
            
           }
        
        
//        $GLOBALS['countTemp']++;
    }
    
//     $GLOBALS['sessionVar']++;
      
//    echo "<br>";   
}



function printXpathDeclaration($prtDecVar,$prtDecLines,$prtDecLine_num,$json)   //Dec==Declaration
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
                 echo "<p class='card-text'>Input Values are found in ".$chkprtDecLine."</p>";
                 
                 $json->InputValChk=" Input Values are found in ".$chkprtDecLine." ";
                
                
            
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = multiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
                 checkProtocSecure($chkprtDecLine,$json); checkifProtocVariables($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$json);
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
                   echo "<p class='card-text'>Input Values are found in ".$chkprtDecLine."</p>";
                 
                 $json->InputValChk=" Input Values are found in ".$chkprtDecLine." ";
                
                  
                    $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                    $chkprtDecLine = multiexplode($chkprtDecLine);
                    $chkprtDecLine=array_map('trim',$chkprtDecLine);
//                    print_r($chkprtDecLine);
//                  $Token = new Tokenizer();
//            $Token->
                checkProtocSecure($chkprtDecLine,$json); 
                checkifProtocVariables($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$json);
                }
            }
       
            
        
       } 
//        $GLOBALS['countTemp']++;
    }

}

          

$jsonFinal->ForCorrection='String Added to Validate the Json';  
$jsonFinal->Total_lines="Total Number of Lines are " .$GLOBALS['noLines'];
$jsonFinal->Total_Vulnlines="Total Number of Vulnerable lines are " .$GLOBALS['noVulLines'];
$myJSON = json_encode($jsonFinal);
$LogFileName=$GLOBALS['LogFileName'];
file_put_contents("ProtocolInjection.json", $myJSON,FILE_APPEND);
file_put_contents("ProtocolInjection.json","]",FILE_APPEND);


echo "<p class='card-text'>No fo Lines are ".$GLOBALS['noLines']."</p>";
echo "<p class='card-text'>No fo Lines are ".$GLOBALS['httpTotalLines']."</p>";

echo "<p class='card-text'>No of Vulnerable Lines are ".$GLOBALS['noVulLines']."</p>";

            
//For calculating an reporting no of lines infected 
            
$_SESSION['TotalProtocLines']=$GLOBALS['noLines'];
$_SESSION['TotalProtocVulnLines']=$GLOBALS['noVulLines'];



?>
 </div>
    </div>
</div>