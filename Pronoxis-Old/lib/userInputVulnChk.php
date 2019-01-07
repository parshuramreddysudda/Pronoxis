
<?php

include 'configuration.php';


$time_start = microtime(true); //Create a variable for start time
$fh = fopen('VulnerabilityuserInput.log', 'w');
$date = new DateTime();
$date = $date->format("y:m:d h:i:s");
//chdir('G:\xammp\htdocs\test');
fwrite($fh, $date);

$serverInputValues;

$typeChkLines = $SERVER['checkFileName'];
$LogFileName=$SERVER['LogFileName'];


//Json Class for appending result
$json;  
$myfile = fopen("UserInputVuln.json", "w") or die("Unable to open file!");
file_put_contents("UserInputVuln.json","[",FILE_APPEND);
$json->AttackName='UserInputVuln';

$sno=1;


$UserVulnVar=0; //For Storing no of Sql lines 
$userInputVulnLines=0; //For Storing no of Sql lines

?>


 

<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">FileInclusionVuln Vulnerability Details</h4>
            
<?php
// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";
         $json=$GLOBALS['json'];
    
        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        
        checkline($trimmed_Sendline,$typeChkLine_num,$json,$typeChkLine); //Send This line detect which type of line is this 
        
//      echo htmlspecialchars($typeChkLine) 
   
     $GLOBALS['sno']=1;
}




function multiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=");
	$MakeReady = str_replace($delimiters, $delimiters[0], $data);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}

function checkline($sendLine,$lineno,$json,$Line)
{
  
    include'checkWordlists.php'; 
    
    $noofsendLine=count($sendLine);
    $noofserverInputValues=count($serverInputValues);
    
    for($i=0;$i<$noofsendLine;$i++)
    {
      for($j=0;$j<$noofserverInputValues;$j++)
      {
        
         if(strcmp($sendLine[$i],$serverInputValues[$j])==0) //Compare line array with protected sql array list
           {
             
             echo "<hr><br>";
                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$lineno."</b> May be  Vulnerable</h3>";

                    
                $json->LineInfo="Line Number ".$lineno." May be  Vulnerable";  
                    
                echo "<p class='card-text'>Vulnerable Code for User Input is  <br> <code>".htmlspecialchars($Line)."</code></p>"; 
                    
                $json->LineCode="Vulnerable Code ".htmlspecialchars($Line)." ";  
                    
             echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']." . ".$serverInputValues[$j]."</red> This may rise Vulnerability</p>";
                    
                $json->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']." . ' ".$serverInputValues[$j]."' .This may rise Vulnerability";   
             
         
             $GLOBALS['UserVulnVar']++;
             
             
             checkUserInputForVuln($sendLine,$lineno,$json);
             
             
                //Json File for appending output Code 
                    
                $myJSON = json_encode($json);
                file_put_contents("UserInputVuln.json", $myJSON,FILE_APPEND);
                file_put_contents("UserInputVuln.json",",",FILE_APPEND);
             
           }
    
      }
        
    }
  
}

function checkUserInputForVuln($userInputVulnLine,$userInputVulnLineno,$json)
{
    include'vulnWordlist.php'; 
    
    $noofuserInputVulnLine=count($userInputVulnLine);
    $noofsqlDatabaseVuln=count($sqlDatabaseSecureVuln);
    $tempVulnCkh=0;
    $tempcheckUserInputForVuln=0;
    
    for($i=0;$i<$noofuserInputVulnLine;$i++)
    {
      for($j=0;$j<$noofsqlDatabaseVuln;$j++)
      {
           if(strcmp($userInputVulnLine[$i],$sqlDatabaseSecureVuln[$j])==0) //Compare line array with protected sql array list
           {
              $tempcheckUserInputForVuln=0;
               
           }
          else if(strcmp($userInputVulnLine[$i],$sqlDatabaseSecureVuln[$j])==-1)
          { 
                  
                $temp =$userInputVulnLine[$i];
                $tempLen=strlen($userInputVulnLine[$i]);
                $temptrim = substr("$userInputVulnLine[$i]", 4, $tempLen);   //To Separate > mark from sql string. I got this at >sql_fetch_array :P    
                if(strcmp($temptrim,$sqlDatabaseSecureVuln[$j])==0)
                {
                    $tempcheckUserInputForVuln=0;
                
                }
               $tempcheckUserInputForVuln=1;
           }  
          else
          { 
             $tempcheckUserInputForVuln=1;
             
          }
               
          
      }
        if($tempcheckUserInputForVuln==1)
        {
            $tempVulnCkh++;
        }
        
        
        
    }
       

    if($tempVulnCkh==$noofuserInputVulnLine)
    {
        $vulninfofile="Line Number ".$userInputVulnLineno."is Vulnerable to User Input Injection";
        
        echo "<p class='card-text'>Line Number <red>".$userInputVulnLineno." is Vulnerable </red>to User Input Injection</p>";
        
       $json->Secure=" No Securing functions Found";
        $GLOBALS['userInputVulnLines']++;
        

    }
    else
    {
       
                echo "<p class='card-text'>This Line is <green>Secured</green> with Input values ".$vulnChkLine[$i]."</p>";
                
                   $json->Secure="This Line is  Secure with  input values ".$vulnChkLine[$i]." ";
    }
    
         
    
}

//Create a variable for end time
$time_end = microtime(true);
//Subtract the two times to get seconds
 
$time = $time_end - $time_start;

echo 'Execution time : '.$time.' seconds';

    
    

$jsonFinal->ForCorrection='String Added to Validate the Json';  
$jsonFinal->Total_lines="Total Number of Lines are " .$GLOBALS['UserVulnVar'];
$jsonFinal->Total_Vulnlines="Total Number of Vulnerable lines are " .$GLOBALS['userInputVulnLines'];
$myJSON = json_encode($jsonFinal);
$LogFileName=$GLOBALS['LogFileName'];
file_put_contents("UserInputVuln.json", $myJSON,FILE_APPEND);
file_put_contents("UserInputVuln.json","]",FILE_APPEND);



echo "<p class='card-text'>No fo Lines are ".$GLOBALS['UserVulnVar']."</p>";

echo "<p class='card-text'>No of Vulnerable Lines are ".$GLOBALS['userInputVulnLines']."</p>";


//For calculating an reporting no of lines infected 
            
$_SESSION['TotalUserLines']=$GLOBALS['noLines'];
$_SESSION['TotalUserVulnLines']=$GLOBALS['noVulLines'];



?>
            
                   </div>
    </div>
</div>            
            
             