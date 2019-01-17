
<?php
 
function startUserInput($address,$typeChkLines)
{
chdir($address); 
    
global $serverInputValues;
global $UserVulnVar; //For Storing no of Sql lines 
global $userInputVulnLines; //For Storing no of Sql lines
global $sno;
    
  

$UserVulnVar=0; //For Storing no of Sql lines 
$userInputVulnLines=0; //For Storing no of Sql lines
    
$LogFileName=$_SESSION['LogFileName'];


//Json Class for appending result
$userInputjson;  
$myfile = fopen("UserInputVuln.json", "w") or die("Unable to open file!");
file_put_contents("UserInputVuln.json","[",FILE_APPEND);
$userInputjson->AttackName='UserInputVuln';

$sno=1;


// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";
    
        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = Usermultiexplode($sendLine);  //Gets the line by removing Delimiters
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        
        Usercheckline($trimmed_Sendline,$typeChkLine_num,$userInputjson,$typeChkLine); //Send This line detect which type of line is this 
        
//      echo htmlspecialchars($typeChkLine) 
   
     $GLOBALS['sno']=1;
}


$userInputjsonFinal->ForCorrection='String Added to Validate the Json';  
$userInputjsonFinal->Total_lines="Total Number of Lines are " .$GLOBALS['UserVulnVar'];
$userInputjsonFinal->Total_Vulnlines="Total Number of Vulnerable lines are " .$GLOBALS['userInputVulnLines'];
$myJSON = json_encode($userInputjsonFinal);
$LogFileName=$GLOBALS['LogFileName'];
file_put_contents("UserInputVuln.json", $myJSON,FILE_APPEND);
file_put_contents("UserInputVuln.json","]",FILE_APPEND);



//echo "<p class='card-text'>No fo Lines are ".$GLOBALS['UserVulnVar']."</p>";

//echo "<p class='card-text'>No of Vulnerable Lines are ".$GLOBALS['userInputVulnLines']."</p>";


//For calculating an reporting no of lines infected 
            
$_SESSION['TotalUserLines']=$GLOBALS['UserVulnVar']+$_SESSION['TotalUserLines'];
$_SESSION['TotalUserVulnLines']=$GLOBALS['userInputVulnLines']+$_SESSION['TotalUserVulnLines'];

$_SESSION['UserInpDone']=0;

}


function Usermultiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=","%","&gt;","&lt;","&#x27;"," &#x2F;",";",".","&quot");
    $data=str_replace('"', ',', $data);
    $data=stripslashes($data);
    $quotedata=str_replace('"',"", $data);
	$MakeReady = str_replace($delimiters, $delimiters[0], $quotedata);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}

function Usercheckline($sendLine,$lineno,$userInputjson,$Line)
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
             
       
//                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$lineno."</b> May be  Vulnerable</h3>";

                    
                $userInputjson->LineInfo="Line Number ".$lineno." May be  Vulnerable";  
                    
//                echo "<p class='card-text'>Vulnerable Code for User Input is  <br> <code>".htmlspecialchars($Line)."</code></p>"; 
                    
                $userInputjson->LineCode="Vulnerable Code ".htmlspecialchars($Line)." ";  
                    
//             echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']." . ".$serverInputValues[$j]."</red> This may rise Vulnerability</p>";
                    
                $userInputjson->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']." . ' ".$serverInputValues[$j]."' .This may rise Vulnerability";   
             
         
             $GLOBALS['UserVulnVar']++;
            
             checkUserInputForVuln($sendLine,$lineno,$userInputjson);
                //Json File for appending output Code 
                    
                $myJSON = json_encode($userInputjson);
                file_put_contents("UserInputVuln.json", $myJSON,FILE_APPEND);
                file_put_contents("UserInputVuln.json",",",FILE_APPEND);
             
           }
    
      }
        
    }
  
}

function checkUserInputForVuln($userInputVulnLine,$userInputVulnLineno,$userInputjson)
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
        
//        echo "<p class='card-text'>Line Number <red>".$userInputVulnLineno." is Vulnerable </red>to User Input Injection</p>";
        
       $userInputjson->Secure=" No Securing functions Found";
        $GLOBALS['userInputVulnLines']++;
        

    }
    else
    {
       
//                echo "<p class='card-text'>This Line is <green>Secured</green> with Input values ".$vulnChkLine[$i]."</p>";
                
                   $userInputjson->Secure="This Line is  Secure with  input values ".$vulnChkLine[$i]." ";
    }
    
         
    
}


    

?>
            
        