
<?php


$time_start = microtime(true); //Create a variable for start time
$fh = fopen('VulnerabilityuserInput.log', 'w');
$date = new DateTime();
$date = $date->format("y:m:d h:i:s");
//chdir('G:\xammp\htdocs\test');
fwrite($fh, $date);

$serverInputValues;

echo "<br>";
$workDir=getcwd();

$conFile = scandir($workDir);
print_r($conFile);
echo "<br>";

$sqlLines=0; //For Storing no of Sql lines 
$userInputVulnLines=0; //For Storing no of Sql lines

$typeChkLines = file($conFile[12]);

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{
    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";
    
    
        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        
        checkline($trimmed_Sendline,$typeChkLine_num); //Send This line detect which type of line is this 
        
//      echo htmlspecialchars($typeChkLine) 
   
    
}




function multiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=");
	$MakeReady = str_replace($delimiters, $delimiters[0], $data);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}

function checkline($sendLine,$lineno)
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
              echo "User Input  Lines are <b> ".$sendLine[$i]." ";
              echo $serverInputValues[$j];
              echo " <br> " .$lineno." </b><br>";
             
             $GLOBALS['sqlLines']++;
             
             checkUserInputForVuln($sendLine,$lineno);
             
           }
          else if(strcmp($sendLine[$i],$serverInputValues[$j])==-1)
          { 
                  
                $temp =$sendLine[$i];
                $tempLen=strlen($sendLine[$i]);
                $temptrim = substr("$sendLine[$i]", 4, $tempLen);   //To Separate > mark from sql string. I got this at >sql_fetch_array :P    
                if(strcmp($temptrim,$serverInputValues[$j])==0)
                {
                echo "User Input Lines are <b> ".$sendLine[$i]." ";
                echo $serverInputValues[$j];
                echo " <br> " .$lineno." </b><br>";
                $GLOBALS['sqlLines']++;
                checkUserInputForVuln($sendLine,$lineno);
                 }
          }
          
    
      }
        
    }
  
    echo "<br>";
}

function checkUserInputForVuln($userInputVulnLine,$userInputVulnLineno)
{
    include'vulnWordlist.php'; 
    
    $noofuserInputVulnLine=count($userInputVulnLine);
    $noofsqlDatabaseVuln=count($sqlDatabaseVuln);
    $tempVulnCkh=0;
    $tempcheckUserInputForVuln=0;
    
    for($i=0;$i<$noofuserInputVulnLine;$i++)
    {
      for($j=0;$j<$noofsqlDatabaseVuln;$j++)
      {
           if(strcmp($userInputVulnLine[$i],$sqlDatabaseVuln[$j])==0) //Compare line array with protected sql array list
           {
              $tempcheckUserInputForVuln=0;
               
           }
          else if(strcmp($userInputVulnLine[$i],$sqlDatabaseVuln[$j])==-1)
          { 
                  
                $temp =$userInputVulnLine[$i];
                $tempLen=strlen($userInputVulnLine[$i]);
                $temptrim = substr("$userInputVulnLine[$i]", 4, $tempLen);   //To Separate > mark from sql string. I got this at >sql_fetch_array :P    
                if(strcmp($temptrim,$sqlDatabaseVuln[$j])==0)
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
       
    echo $tempVulnCkh;
    echo "<br>";
    echo $noofuserInputVulnLine;
    if($tempVulnCkh==$noofuserInputVulnLine)
    {
        $vulninfofile="Line Number ".$userInputVulnLineno."is Vulnerable to User Input Injection";
        fwrite($GLOBALS['fh'],$vulninfofile);
        $GLOBALS['userInputVulnLines']++;
        echo $vulninfofile;
        

    }
    else
    {
        echo "This is Protected";
    }
    
         
    
}

//Create a variable for end time
$time_end = microtime(true);
//Subtract the two times to get seconds
 


$infoUserLines="No of User Input lines are <b>".$sqlLines."</b> in this File"; 
$infoVulnUserLines= "<br>No of Vulnerable User Input lines are <b>".$userInputVulnLines."</b> in this File";

fwrite($fh,$infoUserLines);
fwrite($fh,$infoVulnUserLines);
echo $infoUserLines;
echo $infoVulnUserLines;
$time = $time_end - $time_start;

echo 'Execution time : '.$time.' seconds';





// Change directory
chdir('G:\xammp\htdocs\test');
// Get current directory
echo getcwd();


// Get array of all source files
$files = scandir('G:\xammp\htdocs\test');
// Identify directories

?>