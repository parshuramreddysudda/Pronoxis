<?php

include 'configuration.php';
$countTemp=0;  ///For Calculating Recurssion
$sqlDatabaseInput;
$sessionVar=0;        //To Calculate total no of var 
$sessionVulnVar=0;    //to Calculate total Vuln var
$sessionLineNo=0;       //To send the line number to detect vuln in the line variables
$tempVarVulnCkh=0; //To check if Var line is vulnerable to sql injetcion 

$sqlLines=0; //For Storing no of Sql lines
$sqlVulnLines=0; //For Storing no of Sql lines


//Json Class for appending result
$json;  
$typeChkLines = $SERVER['checkFileName'];
$LogFileName=$SERVER['LogFileName'];

$myfile = fopen("SqlVulnerability.json", "w") or die("Unable to open file!");
file_put_contents("SqlVulnerability.json","[",FILE_APPEND);
$json->AttackName='SqlVulnerability';

$sno=1;

$sql_array=array();
$sqlrepeat=array();

?>


 

<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sql Vulnerability Details</h4>
            
<?php
// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{
    
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";
     $json=$GLOBALS['json'];
$countTemp=0;  ///For Calculating Recurssion
$sessionVar=0;        //To Calculate total no of var 
$sessionVulnVar=0;    //to Calculate total Vuln var
$sessionLineNo=0;       //To send the line number to detect vuln in the line variables
$tempVarVulnCkh=0; //To check if Var line is vulnerable to sql injetcion 

$sqlLines=0; //For Storing no of Sql lines
$sqlVulnLines=0; //For Storing no of Sql lines


        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        checkline($trimmed_Sendline,$typeChkLine_num,$typeChkLines,$typeChkLine,$json); //Send This line detect which type of line is this
//      echo htmlspecialchars($typeChkLine)
  


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

function checkline($sendLine,$lineno,$typeChkLines,$typeChkLine,$json)
{

    include'checkWordlists.php';
    include'warmHole.php';


  
    $noofsendLine=count($sendLine);
    $noofsqlWarmhole=count($sqlWarmhole);
    $noofSqlInput=count($sqlDatabaseInput);
    $foundSqlVuln=0;
//   echo "<br>Count for".$lineno."is".count($sendLine);
      
   for($i=0;$i<$noofsendLine;$i++)
   {
      if(strlen($sendLine[$i])>4)
       {   
        for($j=0;$j<$noofsqlWarmhole;$j++)
       {

        if(strcmp($sendLine[$i],$sqlWarmhole[$j])==0) //Compare line array with Input sql array list
          {
             
                echo "<hr><br>";
                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$lineno."</b> May be  Vulnerable</h3>";

                    
                $json->LineInfo="Line Number ".$lineno." May be  Vulnerable";  
                    
                echo "<p class='card-text'>Vulnerable Code <br> <code>".htmlspecialchars($typeChkLine)."</code></p>"; 
                    
                $json->LineCode="Vulnerable Code ".htmlspecialchars($typeChkLine)." ";  
                    
                echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']." . ".$sqlWarmhole[$j]."</red> This may rise Vulnerability</p>";
                    
                $json->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']." . ' ".$sqlWarmhole[$j]."' .This may rise Vulnerability";   
                    
          
           checkforSinks($sendLine,$typeChkLines,$lineno,$json);
      
//             echo " <br>  </b><br>";
            $GLOBALS['sqlLines']++;
            checkSqlForVuln($sendLine,$lineno,$typeChkLines,$typeChkLine,$json);// Send the Sql line for Testing 
            $foundSqlVuln=1;
            //Json File for appending output Code 
                    
                $myJSON = json_encode($json);
                file_put_contents("SqlVulnerability.json", $myJSON,FILE_APPEND);
                file_put_contents("SqlVulnerability.json",",",FILE_APPEND);
            break;
          }
        }
      }
   }
    
    
    for($i=0;$i<$noofsendLine;$i++)
   {
      if(strlen($sendLine[$i])>4)
       {   
        for($j=0;$j<$noofSqlInput;$j++)
       {

        if(strcmp($sendLine[$i],$sqlDatabaseInput[$j])==0) //Compare line array with Input sql array list
          {
             
            echo "<hr><br>";
                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$lineno."</b> May be  Vulnerable</h3>";

                    
                $json->LineInfo="Line Number ".$lineno." May be  Vulnerable";  
                    
                echo "<p class='card-text'>Vulnerable Code <br> <code>".htmlspecialchars($typeChkLine)."</code></p>"; 
                    
                $json->LineCode="Vulnerable Code ".htmlspecialchars($typeChkLine)." ";  
                    
                echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']." . ".$sqlDatabaseInput[$j]."</red> This may rise Vulnerability</p>";
                    
                $json->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']." . ' ".$sqlDatabaseInput[$j]."' .This may rise Vulnerability";   
          
           checkforSinks($sendLine,$typeChkLines,$lineno,$json);
            
              
        
//          
            $GLOBALS['sqlLines']++;
            checkSqlForVuln($sendLine,$lineno,$typeChkLines,$typeChkLine,$json);// Send the Sql line for Testing 
            $foundSqlVuln=1;
            //Json File for appending output Code 
                    
                $myJSON = json_encode($json);
                file_put_contents("SqlVulnerability.json", $myJSON,FILE_APPEND);
                file_put_contents("SqlVulnerability.json",",",FILE_APPEND);
            break;
          }
        }
      }
   }
    
    
  
}



//This function checks for sinks in the source lines
function checkforSinks($sinkChkLine,$typeChkLines,$chkLineNo,$json)
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
                  
                   
               checkSecure($sinkChkLine,$json);
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
        
         $json->InputChk="Input Values <green>Not found </green> Cheking  Variables If "; checkifVaribles($sinkChkLine,$typeChkLines,$chkLineNo,$json);
    }
    
}


//This function checks whether sinks  i.e get and post are protected or not
function checkSecure($vulnChkLine,$json)
{
    $vuln=0;
    $vuln1=0;
    include'vulnWordlist.php';
    include 'checkWordlists.php';
        $listCount=count($xssSecureVuln);
        $varCount=count($vulnChkLine);
        $fileList=count($sqlDatabaseSecureVuln);
    
    for($i=0;$i<$varCount;$i++)
    {
        for($j=0;$j<$listCount;$j++)
        {
            
            if(strlen($vulnChkLine[$i])>1)
            {
                
            if(strcmp($vulnChkLine[$i],$xssSecureVuln[$j])==0)
               {
               
                 echo "<p class='card-text'>This Line is <green>Secured</green> with Input values ".$vulnChkLine[$i]."</p>";
                
                   $json->Secure="This Line is  Secure with  input values ".$vulnChkLine[$i]." ";
                
                 $vuln=1;
                  break;
               }
                
            }
               
        }
         for($j=0;$j<$fileList;$j++)
        {
            
            if(strlen($vulnChkLine[$i])>1)
            {
                
            if(strcmp($vulnChkLine[$i],$sqlDatabaseSecureVuln[$j])==0)
               {
               
                 echo "<p class='card-text'>This Line is <green>Secured</green> with Database Input values ".$vulnChkLine[$i]."</p>";
                
                   $json->DbSecure="This Line is  Secure with Database input values ".$vulnChkLine[$i]." ";
                
                 
                
                 $vuln=1;
                  break;
               }
                
            }
               
        }
        
    }
    if($vuln==0)
    {
       echo "<p class='card-text'><red>No Secur</red>ing functions Found  Input Values</p>";
        
        $json->Functions=" No Securing functions Found";
        
        echo "<p class='card-text'>This line is <red> Vulnerable </red>. It doesn't <red>no</red>t have <red>Securing</red> Functions</p>";
        
        $json->SinksInfo="This line is Vulnerable . It doesn't not have Securing Functions with Input values";
        
        $GLOBALS['noVulLines']++;
         
       
    }
    
//    Checking the File input Strings  (sinks)
    

     
    for($i=0;$i<$varCount;$i++)
    {
        for($j=0;$j<$fileList;$j++)
        {
            
            if(strlen($vulnChkLine[$i])>1)
            {
                
            if(strcmp($vulnChkLine[$i],$fileInputValues[$j])==0)
               {
               
                echo "<p class='card-text'>Sinks Found they are  ".$vulnChkLine[$i]."</p>";
                
                   $json->SinksInfo="Sinks Found they are ".$vulnChkLine[$i]." ";
                 
                 $vuln1=1; 
                  break;
               }
            }
               
        }
    }
    if($vuln1==0)
    {
       echo "<p class='card-text'>No Sinks Found </p>";
                
        $json->SinkSecure="No Sinks Found ";
                 
        $GLOBALS['noVulLines']++;
    }
    
    
}



function checkifVaribles($chkVarSendline,$chkVarLines,$chkSendDecLine_num,$json)
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
                printDeclaration($chkVarSendline[$i],$chkVarLines,$chkSendDecLine_num,$json);
        }
        
         else
           {
            $tempCutQuot1=substr($chkVarSendline[$i],7,-7);  //Substr for getting values in db ".$value." => to $value trimming both sides symbols
             $tempCut=substr($tempCutQuot1,0,1);
             
             if($tempCut=='$')
             {
//                 echo $tempCutQuot1;
               
            printDeclaration($tempCutQuot1,$chkVarLines,$chkSendDecLine_num,$json);  //Send the value decleared in th sql string since it has uni characters like " ' . they are trimmed first and then sent
             }
             
            
           }
        
        
//        $GLOBALS['countTemp']++;
    }
    
//     $GLOBALS['sessionVar']++;
      
//    echo "<br>";   
}



function printDeclaration($prtDecVar,$prtDecLines,$prtDecLine_num,$json)   //Dec==Declaration
{
    $sqlrepeat=array();
   
    foreach ($prtDecLines as $chkprtDecLine_num => $chkprtDecLine)
    {   
        $sendprtDecLine=htmlspecialchars($chkprtDecLine);
        $trimDecprtSendline = multiexplode($sendprtDecLine); 
        $trimmed_DecprtSendline=array_map('trim',$trimDecprtSendline);
      
//        echo $chkprtDecLine_num."<br>";
//        print_r($trimmed_DecprtSendline);
//        echo "<br>";
        $i=0;
        if(in_array($chkprtDecLine,$sqlrepeat))
        {
            
        }
        else
        {
            
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
                echo "<p class='card-text'>Input Values are found in 
                <code>".$chkprtDecLine." </code></p>";
                 
                 $json->InputValChkforVulnVar=" Input Values are found in ".$chkprtDecLine." ";
                 
                
                 
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = multiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
                 checkSecure($chkprtDecLine,$json); 
                checkifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$json);
               
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
                   echo "<p class='card-text'>Input Values are found in 
                <code>".$chkprtDecLine." </code></p>";
                 
                 $json->InputValChkforVulnVar=" Input Values are found in ".$chkprtDecLine." ";
                 
                    
                   
                    $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                    $chkprtDecLine = multiexplode($chkprtDecLine);
                    $chkprtDecLine=array_map('trim',$chkprtDecLine);
//                    print_r($chkprtDecLine);
//                  $Token = new Tokenizer();
//            $Token->
                checkSecure($chkprtDecLine,$json); 
                checkifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$json);
               
                }
            }
       
            
        
       } 
//        $GLOBALS['countTemp']++;
    }
    }
        

}


$jsonFinal->ForCorrection='String Added to Validate the Json';  
$jsonFinal->Total_lines="Total Number of Lines are " .$GLOBALS['noLines'];
$jsonFinal->Total_Vulnlines="Total Number of Vulnerable lines are " .$GLOBALS['noVulLines'];
$myJSON = json_encode($jsonFinal);
$LogFileName=$GLOBALS['LogFileName'];
file_put_contents("HttpResponce.json", $myJSON,FILE_APPEND);
file_put_contents("HttpResponce.json","]",FILE_APPEND);



echo "<p class='card-text'>No fo Lines are ".$GLOBALS['noLines']."</p>";

echo "<p class='card-text'>No of Vulnerable Lines are ".$GLOBALS['noVulLines']."</p>";


?>
       </div>
    </div>
</div>            
            
     