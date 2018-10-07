<?php


$time_start = microtime(true); //Create a variable for start time
$fh = fopen('Vulnerability.log', 'w');
$date = new DateTime();
$date = $date->format("y:m:d h:i:s");
//chdir('G:\xammp\htdocs\test');
fwrite($fh, $date);
$countTemp=0;  ///For Calculating Recurssion
$sqlDatabaseInput;
$sessionVar=0;        //To Calculate total no of var 
$sessionVulnVar=0;    //to Calculate total Vuln var
$sessionLineNo=0;       //To send the line number to detect vuln in the line variables
$tempVarVulnCkh=0; //To check if Var line is vulnerable to sql injetcion 
$workDir=getcwd();

$conFile = scandir($workDir);
print_r($conFile);
echo "<br>";

$sqlLines=0; //For Storing no of Sql lines
$sqlVulnLines=0; //For Storing no of Sql lines

$typeChkLines = file($conFile[22]);

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{
    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";


        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        checkline($trimmed_Sendline,$typeChkLine_num,$typeChkLines); //Send This line detect which type of line is this
//      echo htmlspecialchars($typeChkLine)


}




function multiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=","%","&gt;","&lt;","&#x27;"," &#x2F;",";",".","&quot");
    $data=str_replace('"', ',', $data);
    $quotedata=str_replace('"',"", $data);
	$MakeReady = str_replace($delimiters, $delimiters[0], $quotedata);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}

function checkline($sendLine,$lineno,$typeChkLines)
{

    include'checkWordlists.php';
    include'warmHole.php';


  
    $noofsendLine=count($sendLine);
    $noofsqlWarmhole=count($sqlWarmhole);
    $noofsqlDatabaseInput=count($sqlDatabaseInput);
    $foundSqlVuln=0;
//   echo "<br>Count for".$lineno."is".count($sendLine);
      
   for($i=0;$i<$noofsendLine;$i++)
   {
      if(strlen($sendLine[$i])>4)
       {   
        for($j=0;$j<$noofsqlDatabaseInput;$j++)
       {

        if(strcmp($sendLine[$i],$sqlDatabaseInput[$j])==0) //Compare line array with Input sql array list
          {
             echo "Sql Lines are <b> ".$sendLine[$i]." ";
             echo $sqlDatabaseInput[$j];
             echo " <br>  </b><br>";
            $GLOBALS['sqlLines']++;
            checkSqlForVuln($sendLine,$lineno,$typeChkLines);// Send the Sql line for Testing 
            $foundSqlVuln=1;
            break;
          }
         else if(strcmp($sendLine[$i],$sqlDatabaseInput[$j])==-1)
         {
               
               $temp =$sendLine[$i];
               $tempLen=strlen($sendLine[$i]);
               $temptrim = substr("$sendLine[$i]", 4, $tempLen);   //To Separate > mark from sql string. I got this at >sql_fetch_array :P
             
               $temptrim2 = substr("$sendLine[$i]", 6, $tempLen);  //To Separate " mark from sql string. I got this at >sql_fetch_array :P
               
             if(strcmp($temptrim,$sqlDatabaseInput[$j])==0||strcmp($temptrim2,$sqlDatabaseInput[$j])==0)
               {
               echo "Sql Lines are <b> ".$sendLine[$i]." ";
               echo $sqlDatabaseInput[$j];
               echo " <br> " .$lineno." </b><br>";
               $GLOBALS['sqlLines']++; 
               checkSqlForVuln($sendLine,$lineno,$typeChkLines); // Send the Sql line for Testing 
               $foundSqlVuln=1;
               break;
                }
         }

         else
         {
           $foundSqlVuln=0;
         }
         $GLOBALS['countTemp']++;



     }
     if($foundSqlVuln==1)
     {
       break;
     }
   }

   }

    for($i=0;$i<$noofsendLine;$i++)
    {
    if(strlen($sendLine[$i])>4)
    {
      for($j=0;$j<$noofsqlWarmhole;$j++)
      {

         if(strcmp($sendLine[$i],$sqlWarmhole[$j])==0) //Compare line array with possible  sqlInjection array list
           {
              echo "Sql Lines are <b> ".$sendLine[$i]." ";
              echo $sqlWarmhole[$j];
              echo " <br> " .$lineno." </b><br>";
             $GLOBALS['sqlLines']++;
             checkSqlForVuln($sendLine,$lineno,$typeChkLines);     // Send the Sql line for Testing  
               $foundSqlVuln=1;
               break;
           }
          else if(strcmp($sendLine[$i],$sqlWarmhole[$j])==-1)    //This is Optional 
          {

                $temp =$sendLine[$i];
                $tempLen=strlen($sendLine[$i]);
                $temptrim = substr("$sendLine[$i]", 4, $tempLen);   //To Separate '>' mark from sql string. I got this at >sql_fetch_array :P
                $temptrim2 = substr("$sendLine[$i]", 6, $tempLen);//To Separate " mark from sql string. I got this at "sql_fetch_array :P
               if(strcmp($temptrim,$sqlWarmhole[$j])==0)
                {
                echo "Sql Lines are <b> ".$sendLine[$i]." ";
                echo $sqlWarmhole[$j];
                echo " <br> HEller " .$lineno." </b><br>";
                $GLOBALS['sqlLines']++;
                checkSqlForVuln($sendLine,$lineno,$typeChkLines);   // Send the Sql line for Testing 
                $foundSqlVuln=1;
                break;

                 }
          }

          else
          {
            $foundSqlVuln=0;
          }
          $GLOBALS['countTemp']++;

      }
      if($foundSqlVuln==1)
      {
        break;
      }
    }

    }

    echo "<br>";
}

function checkSqlForVuln($sqlVulnLine,$sqlVulnLineNo,$typeChkLines)
{
    include'vulnWordlist.php';
    
    $noofsqlVulnLine=count($sqlVulnLine);
    $noofsqlDatabaseSecureVuln=count($sqlDatabaseSecureVuln);
    $tempVulnCkh=0;
    $tempcheckSqlForVuln=0;

    for($i=0;$i<$noofsqlVulnLine;$i++)
    {
      
          
      for($j=0;$j<$noofsqlDatabaseSecureVuln;$j++)
      {
           if(strcmp($sqlVulnLine[$i],$sqlDatabaseSecureVuln[$j])==0) //Compare line array with protected sql array list
           {
              $tempcheckSqlForVuln=0;
            
              break;

           }
          else if(strcmp($sqlVulnLine[$i],$sqlDatabaseSecureVuln[$j])==-1)
          {

                
                $tempLen=strlen($sqlVulnLine[$i]);
                $temptrim = substr("$sqlVulnLine[$i]", 4, $tempLen);   //To Separate > mark from sql string. I got this at >sql_fetch_array :P
                if(strcmp($temptrim,$sqlDatabaseSecureVuln[$j])==0)
                {
                $tempcheckSqlForVuln=0;
                break;
                }
                else
                {
                     $tempcheckSqlForVuln=1;
                     break;
                }
           }
          else
          {
             $tempcheckSqlForVuln=1;
          }
          $GLOBALS['countTemp']++;
      }
        if($tempcheckSqlForVuln==1)
        {
            $tempVulnCkh++;
        }
    
    }

//    echo $tempVulnCkh;
//    echo "<br>";
//    echo $noofsqlVulnLine;
    if($tempVulnCkh==$noofsqlVulnLine) 
    {
        echo "Line Number ".$sqlVulnLineNo."May be Vulnerable to SQL Injection";
//        include'Tokenizer.php';
//Used to print the php varibales Declaration in the injection line
        $GLOBALS['sessionLineNo']=$noofsqlVulnLine;
        $sessionLineNo=$sqlVulnLineNo;
        checkifVaribles($sqlVulnLine,$typeChkLines,$sqlVulnLineNo,$sessionLineNo);
        
        echo "No of Variables are "; 
        echo $GLOBALS['sessionVar']-1;
        echo "No of Vulnerable".$GLOBALS['sessionVulnVar'];
        if($GLOBALS['sessionVar']-1==$GLOBALS['sessionVulnVar']&&$GLOBALS['sessionVulnVar']!=0) //To say that if no variables are there then it is protected
        {
            $vulninfofile="Line Number ".$sqlVulnLineNo."is Vulnerable to SQL Injection Risk Level is High";
              fwrite($GLOBALS['fh'],$vulninfofile);
              $GLOBALS['sqlVulnLines']++;
             echo $vulninfofile;
        }
        else if($GLOBALS['sessionVar']-1||$GLOBALS['sessionVulnVar']==0)
        {
            echo "<br>This Line is Protected";
        }
        else if($GLOBALS['sessionVar']-1>=$GLOBALS['sessionVulnVar'])
        {
            $vulninfofile="Line Number ".$sqlVulnLineNo."is Vulnerable to SQL Injection .Risk Level is Less";
              fwrite($GLOBALS['fh'],$vulninfofile);
              $GLOBALS['sqlVulnLines']++;
             echo $vulninfofile;
        }
        else
        {
            echo "This Var is Protected";
        }
      $GLOBALS['sessionVulnVar']=0;
      $GLOBALS['sessionVar']=0;
    }
    else
    {
        echo "This SQl string is Protected";
    }
}
function  checkifVaribles($chkVarSendline,$chkVarLines,$chkSendDecLine_num,$sessionLineNo)
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
                printDeclaration($chkVarSendline[$i],$chkVarLines,$chkSendDecLine_num,$sessionLineNo);
        }
        
         else
           {
            $tempCutQuot1=substr($chkVarSendline[$i],7,-7);  //Substr for getting values in db ".$value." => to $value trimming both sides symbols
             $tempCut=substr($tempCutQuot1,0,1);
             
             if($tempCut=='$')
             {
//                 echo $tempCutQuot1;
               
            printDeclaration($tempCutQuot1,$chkVarLines,$chkSendDecLine_num,$sessionLineNo);  //Send the value decleared in th sql string since it has uni characters like " ' . they are trimmed first and then sent
             }
             
            
           }
        
        
        $GLOBALS['countTemp']++;
    }
    
     $GLOBALS['sessionVar']++;
      
    echo "<br>";   
}


function printDeclaration($prtDecVar,$prtDecLines,$prtDecLine_num,$sessionLineNo)   //Dec==Declaration
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
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = multiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
                CheckVarVuln($chkprtDecLine);  checkifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$sessionLineNo);
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
                  echo "<br>";
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
                    echo $chkprtDecLine;
                    $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                    $chkprtDecLine = multiexplode($chkprtDecLine);
                    $chkprtDecLine=array_map('trim',$chkprtDecLine);
//                    print_r($chkprtDecLine);
//                  $Token = new Tokenizer();
//            $Token->
                CheckVarVuln($chkprtDecLine); 
                checkifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$sessionLineNo);
                }
            }
       
            
        
       } 
        $GLOBALS['countTemp']++;
    }

}


function checkVarVuln($varVulnLine)
{
    include'vulnWordlist.php';
    
    $noofvarVulnLine=count($varVulnLine);
    $noofvarDatabaseSecureVuln=count($sqlDatabaseSecureVuln);
    $tempVarVulnCkh=0;
    $tempcheckvarForVuln=0;

    for($i=0;$i<$noofvarVulnLine;$i++)
    {
      for($j=0;$j<$noofvarDatabaseSecureVuln;$j++)
      {
           if(strcmp($varVulnLine[$i],$sqlDatabaseSecureVuln[$j])==0) //Compare line array with protected var array list
           {
              $tempcheckvarForVuln=0;
              echo "Protected";
              break;

           }
          else if(strcmp($varVulnLine[$i],$sqlDatabaseSecureVuln[$j])==-1)
          {

                
                $tempLen=strlen($varVulnLine[$i]);
                $temptrim = substr("$varVulnLine[$i]", 4, $tempLen);   //To Separate > mark from var string. I got this at >var_fetch_array :P
                if(strcmp($temptrim,$sqlDatabaseSecureVuln[$j])==0)
                {
                $tempcheckvarForVuln=0;
                echo "Protected";
                break;
                }
                else
                {
                     $tempcheckvarForVuln=1;
                     break;
                }
           }
          else
          {
             $tempcheckvarForVuln=1;
          }
      }
        if($tempcheckvarForVuln==1)
        {
            $tempVarVulnCkh++;
        }
    
    }

//    echo $tempVulnCkh;
//    echo "<br>";
//    echo $noofvarVulnLine;
    if($tempVarVulnCkh==$noofvarVulnLine)
    {
        $GLOBALS['sessionVulnVar']++;
    }
}

//Create a variable for end time
$time_end = microtime(true);
//Subtract the two times to get seconds



$infoSqlLines="No of SQL line are <b>".$sqlLines."</b> in this File";
$infoVulnSqlLines= "<br>No of Vulnerable SQL line are <b>".$sqlVulnLines."</b> in this File";

fwrite($fh,$infoSqlLines);
fwrite($fh,$infoVulnSqlLines);
echo $infoSqlLines;
echo $infoVulnSqlLines;
$time = $time_end - $time_start;

echo 'Execution time : '.$time.' seconds';





// Change directory
chdir('G:\xammp\htdocs\test');
// Get current directory
echo getcwd();


// Get array of all source files
$files = scandir('G:\xammp\htdocs\test');
// Identify directories
echo $countTemp;

?>
