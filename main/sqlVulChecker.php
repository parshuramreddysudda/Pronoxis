 <?php

function StartSql($address,$typeChkLines)
{
    
chdir($address); 
    
global $countTemp;  ///For Calculating Recurssion
global $sqlDatabaseInput;
global $sessionVar;        //To Calculate total no of var 
global $sessionVulnVar;    //to Calculate total Vuln var
global $sessionLineNo;       //To send the line number to detect vuln in the line variables
global $tempVarVulnCkh; //To check if Var line is vulnerable to sql injection 
global $sqlLines; //For Storing no of Sql lines
global $sqlVulnLines; //For Storing no of Sql lines
global $sno;
global $arrayTemp;


$sqlLines=0; //For Storing no of Sql lines
$sqlVulnLines=0; //For Storing no of Sql lines
$sno=1;
$arrayTemp=3;
$countTemp=0;  ///For Calculating Recurssion
$sqlDatabaseInput;
$sessionVar=0;        //To Calculate total no of var 
$sessionVulnVar=0;    //to Calculate total Vuln var
$sessionLineNo=0;       //To send the line number to detect vuln in the line variables
$tempVarVulnCkh=0; //To check if Var line is vulnerable to sql injetcion 

//Json Class for appending result
$Sqljson; 
$LogFileName=$_SESSION['LogFileName'];

$myfile = fopen("SqlVulnerability.json", "w") or die("Unable to open file!");
file_put_contents("SqlVulnerability.json","[",FILE_APPEND);
$Sqljson->AttackName='SqlVulnerability';




// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";
        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = Sqlmultiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
        Sqlcheckline($trimmed_Sendline,$typeChkLine_num,$typeChkLines,$Sqljson,$typeChkLine); //Send This line detect which type of line is this
//      echo htmlspecialchars($typeChkLine)
    

   


}
    

$infoSqlLines="No of SQL line are <b>".$sqlLines."</b> in this File";
$infoVulnSqlLines= "No of Vulnerable SQL line are <b>".$sqlVulnLines."</b> in this File";
                      
            
$SqljsonFinal->ForCorrection='String Added to Validate the Json';  
$SqljsonFinal->Total_lines="Total Number of Lines are " .$sqlLines;
$SqljsonFinal->Total_Vulnlines="Total Number of Vulnerable lines are " .$sqlVulnLines;
$myJSON = json_encode($SqljsonFinal);
$LogFileName=$GLOBALS['LogFileName'];
file_put_contents("SqlVulnerability.json", $myJSON,FILE_APPEND);
file_put_contents("SqlVulnerability.json","]",FILE_APPEND);

            
     
//echo "<p class='card-text'>No fo Lines are ".$GLOBALS['noSqlLines']."</p>";

//echo "<p class='card-text'>No of Vulnerable Lines are ".$GLOBALS['noSqlVulLines']."</p>";


//For calculating an reporting no of lines infected 
            
$_SESSION['TotalSqlLines']=$GLOBALS['noSqlLines']+$_SESSION['TotalSqlLines'];
$_SESSION['TotalSqlVulnLines']=$GLOBALS['noSqlVulLines']+$_SESSION['TotalSqlVulnLines'];


$_SESSION['SqlDone']=0;

}


function Sqlmultiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=","%","&gt;","&lt;","&#x27;"," &#x2F;",";",".","&quot");
    $data=str_replace('"', ',', $data);
    $data=stripslashes($data);
    $quotedata=str_replace('"',"", $data);
	$MakeReady = str_replace($delimiters, $delimiters[0], $quotedata);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}

function Sqlcheckline($sendLine,$lineno,$typeChkLines,$Sqljson,$Line)
{

    include'checkWordlists.php';
    include'warmHole.php';

    $variables=array();
    $noofsendLine=count($sendLine);
    $noofsqlWarmhole=count($sqlWarmhole);
    $noofsqlDatabaseInput=count($sqlDatabaseInput);
    $foundSqlVuln=0;
//   echo "Count for".$lineno."is".count($sendLine);
      
   for($i=0;$i<$noofsendLine;$i++)
   {
      
      if(strlen($sendLine[$i])>4)
       {   
        for($j=0;$j<$noofsqlDatabaseInput;$j++)
       {
            

        if(strcmp($sendLine[$i],$sqlDatabaseInput[$j])==0) //Compare line array with Input sql array list
          {
             $GLOBALS['noSqlLines']++;
            
//             echo "<hr>";
//                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$lineno."</b> May be  Vulnerable</h3>";

                    
                $Sqljson->LineInfo="Line Number ".$lineno." May be  Vulnerable";  
                    
//                echo "<p class='card-text'>Vulnerable Code  <code>".htmlspecialchars($Line)."</code></p>"; 
                    
                $Sqljson->LineCode="Vulnerable Code ".htmlspecialchars($Line)." ";  
                    
//                echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']." . ".$sendLine[$i]."</red> This may rise Vulnerability</p>";
                    
                $Sqljson->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']." . ' ".$sendLine[$i]."' .This may rise Vulnerability";   
                    
            $GLOBALS['sqlLines']++;
            $variables=checkSqlForVuln($sendLine,$lineno,$typeChkLines,$variables,$Sqljson);// Send the Sql line for Testing 
            $foundSqlVuln=1;
            //Json File for appending output Code 
                    
                $myJSON = json_encode($Sqljson);
                file_put_contents("SqlVulnerability.json", $myJSON,FILE_APPEND);
                file_put_contents("SqlVulnerability.json",",",FILE_APPEND);
            
               
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
              $GLOBALS['noSqlLines']++;
//                echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$lineno."</b> May be  Vulnerable</h3>";

                    
                $Sqljson->LineInfo="Line Number ".$lineno." May be  Vulnerable";  
                    
//                echo "<p class='card-text'>Vulnerable Code  <code>".htmlspecialchars($Line)."</code></p>"; 
                    
                $Sqljson->LineCode="Vulnerable Code ".htmlspecialchars($Line)." ";  
                    
//                echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']." . ".$sqlDatabaseInput[$i]."</red> This may rise Vulnerability</p>";
                    
                $Sqljson->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']." . ' ".$sqlDatabaseInput[$i]."' .This may rise Vulnerability"; 
               $GLOBALS['sqlLines']++; 
               $variables=checkSqlForVuln($sendLine,$lineno,$typeChkLines,$variables,$Sqljson); // Send the Sql line for Testing 
               $foundSqlVuln=1;
            //Json File for appending output Code 
                    
                $myJSON = json_encode($Sqljson);
                file_put_contents("SqlVulnerability.json", $myJSON,FILE_APPEND);
                file_put_contents("SqlVulnerability.json",",",FILE_APPEND);
               
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
              $GLOBALS['noSqlLines']++;
                    
//               echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$lineno."</b> May be  Vulnerable</h3>";

                    
                $Sqljson->LineInfo="Line Number ".$lineno." May be  Vulnerable";  
                    
//                echo "<p class='card-text'>Vulnerable Code  <code>".htmlspecialchars($Line)."</code></p>"; 
                    
                $Sqljson->LineCode="Vulnerable Code ".htmlspecialchars($Line)." ";  
                    
//                echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']." . ".$sqlWarmhole[$j]."</red> This may rise Vulnerability</p>";
                    
                $Sqljson->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']++." . ' ".$sqlWarmhole[$j]."' .This may rise Vulnerability"; 
  
//             $GLOBALS['sqlLines']++;
             
             
             
             
             $variables=checkSqlForVuln($sendLine,$lineno,$typeChkLines,$variables,$Sqljson);     // Send the Sql line for Testing  
               $foundSqlVuln=1;
             
             
               //Json File for appending output Code 
                    
                $myJSON = json_encode($Sqljson);
                file_put_contents("SqlVulnerability.json", $myJSON,FILE_APPEND);
                file_put_contents("SqlVulnerability.json",",",FILE_APPEND);
               
        
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
//              echo "<div style='font-family:product;'> <h3 class='text-muted card-subtitle mb-2 h3Head'>Line Number <b>".$lineno."</b> May be  Vulnerable</h3>";
 $GLOBALS['noSqlLines']++;
                    
                $Sqljson->LineInfo="Line Number ".$lineno." May be  Vulnerable";  
                    
//                echo "<p class='card-text'>Vulnerable Code  <code>".htmlspecialchars($Line)."</code></p>"; 
                    
                $Sqljson->LineCode="Vulnerable Code ".htmlspecialchars($Line)." ";  
                    
//                echo "<p class='card-text'>Vulnerable Variables are <red> ".$GLOBALS['sno']++." . ".$sqlWarmhole[$j]."</red> This may rise Vulnerability</p>";
                    
                $Sqljson->VulnVar="Vulnerable Variables are ".$GLOBALS['sno']." . ' ".$sqlWarmhole[$j]."' .This may rise Vulnerability"; 
                   
//                $GLOBALS['sqlLines']++;
                   
                   
                   
                   
               $variables= checkSqlForVuln($sendLine,$lineno,$typeChkLines,$variables,$Sqljson);   // Send the Sql line for Testing 
                $foundSqlVuln=1;
                   //Json File for appending output Code 
                   
                    
                $myJSON = json_encode($Sqljson);
                file_put_contents("SqlVulnerability.json", $myJSON,FILE_APPEND);
                file_put_contents("SqlVulnerability.json",",",FILE_APPEND);
               
             
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

    
    $GLOBALS['sno']=1;
    
    
    
   
}

function checkSqlForVuln($sqlVulnLine,$sqlVulnLineNo,$typeChkLines,$variables,$Sqljson)
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
//    echo "";
//    echo $noofsqlVulnLine;
    if($tempVulnCkh==$noofsqlVulnLine) 
    {
//        echo "Line Number ".$sqlVulnLineNo." May be Vulnerable to SQL Injection";
        
 
        
        
//        include'Tokenizer.php';
//Used to print the php varibales Declaration in the injection line
        $GLOBALS['sessionLineNo']=$noofsqlVulnLine;
        $sessionLineNo=$sqlVulnLineNo;
       $variables= SqlcheckifVaribles($sqlVulnLine,$typeChkLines,$sqlVulnLineNo,$sessionLineNo,$variables,$Sqljson);
    
 
     
        $tempSession=$GLOBALS['sessionVar'];
        $tempSession=$tempSession-1;
//         echo "<p class='card-text'>No of Var ".$tempSession;
      
        
        
        $Sqljson->NoofVar="No of Var ".$tempSession;
        
        
//        echo "<p class='card-text'>No of Vulnerable Var ".$GLOBALS['sessionVulnVar']."</p>";
        $Sqljson->NoofVulnVar="No of Vulnerable Var ".$GLOBALS['sessionVulnVar'];
     
    
        
        if($GLOBALS['sessionVar']-1==$GLOBALS['sessionVulnVar']&&$GLOBALS['sessionVulnVar']!=0) 
            //To say that if no variables are there then it is protected
        {
          
//            echo "<p class='card-text'>Line Number ".$sqlVulnLineNo."is <red>Vulnerable to SQL Injection</red> Risk Level is <red>High</red></p>";
        
        $Sqljson->LineSecureLevel="Line Number ".$sqlVulnLineNo."is Vulnerable to SQL Injection Risk Level is High";
    
            
        
              $GLOBALS['sqlVulnLines']++;
            
        }
        else if($GLOBALS['sessionVar']-1||$GLOBALS['sessionVulnVar']==0)
        {
            
//                   echo "<p class='card-text'>This Line is <green>Secured</green> with Securing Functions ".$vulnChkLine[$i]."</p>";
                
                    $Sqljson->LineSecureLevel="This Line is  Secure with  Securing Functions".$vulnChkLine[$i]." ";
                
            
            
            
            
        }
        else if($GLOBALS['sessionVar']-1>=$GLOBALS['sessionVulnVar'])
        {
            
//            echo "<p class='card-text'>Line Number ".$sqlVulnLineNo."is <red>Vulnerable to SQL Injection</red> Risk Level is <red>Low</red></p>";
        
            $Sqljson->LineSecureLevel="Line Number ".$sqlVulnLineNo."is Vulnerable to SQL Injection Risk Level is Low";
    
            
              fwrite($GLOBALS['fh'],$vulninfofile);
              $GLOBALS['sqlVulnLines']++;
             echo $vulninfofile;
        }
        else
        {
//             echo "<p class='card-text'>This Line is <green>Secured</green> with Securing Functions ".$vulnChkLine[$i]."</p>";
                
                    $Sqljson->LineSecureLevel="This Line is  Secure with  Securing Functions".$vulnChkLine[$i]." ";
                
        }
      $GLOBALS['sessionVulnVar']=0;
      $GLOBALS['sessionVar']=0;
    }
    else
    {
//        echo "<p class='card-text'>This Line is <green>Secured</green> with Securing Functions ".$vulnChkLine[$i]."</p>";
                
                    $Sqljson->LineSecureLevel="This Line is  Secure with  Securing Functions".$vulnChkLine[$i]." ";
                
    return $variables;
     }
}
function  SqlcheckifVaribles($chkVarSendline,$chkVarLines,$chkSendDecLine_num,$sessionLineNo,$variables,$Sqljson)
{
   
//    print_r($chkVarSendline);
   $variableschk=0;
    $noofelelments=count($chkVarSendline);
   
    
    for($i=1;$i<$noofelelments;$i++)
    {
        $tempCut=substr($chkVarSendline[$i],0,1);
        
        if(strcmp($tempCut,'$')==0)
        {
//            echo "Trimmed Var ".$chkVarSendline[$i];
//            $Token = new Tokenizer();
//            $Token->
               $variableschk= SqlprintDeclaration($chkVarSendline[$i],$chkVarLines,$chkSendDecLine_num,$sessionLineNo,$variables,$Sqljson);
          
            if($GLOBALS['arrayTemp']==3||$GLOBALS['arrayTemp']==2)
            {
                $GLOBALS['arrayTemp']--;
               
            }
    
       
        }
        
         else
           {
            $tempCutQuot1=substr($chkVarSendline[$i],7,-7);  //Substr for getting values in db ".$value." => to $value trimming both sides symbols
             $tempCut=substr($tempCutQuot1,0,1);
             
             if($tempCut=='$')
             {
//                 echo $tempCutQuot1;
               
            $variableschk=SqlprintDeclaration($tempCutQuot1,$chkVarLines,$chkSendDecLine_num,$sessionLineNo,$variables,$Sqljson);  //Send the value decleared in th sql string since it has uni characters like " ' . they are trimmed first and then sent
//                 print_r($variables);
                
            if($GLOBALS['arrayTemp']==3||$GLOBALS['arrayTemp']==2)
            {
                $GLOBALS['arrayTemp']--;
            }
                 
            }
             
            
           }
        
        
        $GLOBALS['countTemp']++;
    }
    
     $GLOBALS['sessionVar']++;
      
  return $variableschk;
}


            
//This function checks whether sinks  i.e get and post are protected or not
function SqlcheckSecure($vulnChkLine,$Sqljson)
{
    $vuln=0;
    $VulnLineArray=explode(" ",$vulnChkLine);
    include'vulnWordlist.php';
        $listCount=count($xssSecureVuln);
    
        $varCount=count($VulnLineArray);
    
    for($i=0;$i<$varCount;$i++)
    {
        for($j=0;$j<$listCount;$j++)
        {
            
            if(strlen($VulnLineArray[$i])>1)
            {
                
            if(strcmp($VulnLineArray[$i],$xssSecureVuln[$j])==0)
               {
            
//                echo "<p class='card-text'>This Line is <green>Secured</green> with Input values ".$VulnLineArray[$i]."</p>";
                
                   $Sqljson->Secure="This Line is  Secure with  input values ".$VulnLineArray[$i]." ";
                
                $_SESSION['Secured']++;
                 $vuln=1;
                  break;
               }
            }
               
        }
    }
    if($vuln==0)
    {
//        echo "<p class='card-text'><red>No Secur</red>ing functions  Found  Input Values</p>";
        
        $Sqljson->Functions=" No Securing functions Found";
        
//        echo "<p class='card-text'>This line is <red> Vulnerable </red>. It doesn't <red>no</red>t have <red>Securing</red> Functions</p>";
        
        $Sqljson->SinksInfo="This line is Vulnerable . It doesn't not have Securing Functions with Input values";
        $GLOBALS['noSqlVulLines']++;
    }
    
}


function SqlprintDeclaration($prtDecVar,$prtDecLines,$prtDecLine_num,$sessionLineNo,$variables,$Sqljson)   //Dec==Declaration
{
    
   
    foreach ($prtDecLines as $chkprtDecLine_num => $chkprtDecLine)
    {   
        $sendprtDecLine=htmlspecialchars($chkprtDecLine);
        $trimDecprtSendline = Sqlmultiexplode($sendprtDecLine); 
        $trimmed_DecprtSendline=array_map('trim',$trimDecprtSendline);
      
//        echo $chkprtDecLine_num."";
//        print_r($trimmed_DecprtSendline);
//        echo "";
        
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
//                    echo "<p class='card-text'>Variable <code>".$prtDecVar."</code> of the above  Line  is declared as  <code>".$chkprtDecLine." </code></p>";
                 
                 $Sqljson->InputVarDec=" Variable Declaration  Line is  ".$chkprtDecLine." ";
                
                 SqlcheckSecure($chkprtDecLine,$Sqljson);
               
                 array_push($variables,$chkprtDecLine);
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = Sqlmultiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
                 SqlCheckVarVuln($chkprtDecLine,$variables,$Sqljson); SqlcheckifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$sessionLineNo,$variables,$Sqljson);
            }
        }
        else if(count($trimmed_DecprtSendline)>1)     //To check the Variable declared after a space or in the a[1] from starting .
        {
            
            $tempCutDec=substr($prtDecVar,0,1);   //To print only php variables in the analyzer
           
//               echo $prtDecVar;
            if(strcmp($prtDecVar,$trimmed_DecprtSendline[1])==0&&($trimmed_DecprtSendline[2]==" "||$trimmed_DecprtSendline[1]="NULL"||$trimmed_DecprtSendline[2]==" "||$trimmed_DecprtSendline[2]="NULL"||$trimmed_DecprtSendline[3]==" "||$trimmed_DecprtSendline[3]="NULL")) //To print variables declared after two spaces or three
            { 
//                echo "Lines  Compared ".$prtDecVar." are ".$trimmed_DecprtSendline[0];
//                echo " Same Declared Element Called ".$prtDecVar;
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
//                   echo "<p class='card-text'>Variable <code>".$prtDecVar."</code> of the above  Line  is declared as <code>".$chkprtDecLine." </code></p>";
                 
                 $Sqljson->InputVarDec=" Variable Declaration of Line is  ".$chkprtDecLine." ";
               
                     SqlcheckSecure($chkprtDecLine,$Sqljson);
                    array_push($variables,$chkprtDecLine);
                    $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                    $chkprtDecLine = Sqlmultiexplode($chkprtDecLine);
                    $chkprtDecLine=array_map('trim',$chkprtDecLine);
//                    print_r($chkprtDecLine);
//                  $Token = new Tokenizer();
//            $Token->
                SqlCheckVarVuln($chkprtDecLine,$Sqljson); 
                SqlcheckifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num,$sessionLineNo,$variables,$Sqljson);
                }
            }
       
            
        
       } 
        $GLOBALS['countTemp']++;
    }
return $variables;
}


function SqlCheckVarVuln($varVulnLine,$Sqljson)
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
//         echo "<p class='card-text'>This Line is <green>Secured</green> with Input values ".$vulnChkLine[$i]."</p>";
                
                   $Sqljson->Secure="This Line is  Secure with  Database  values ".$varVulnLine[$i]." ";
                
              break;

           }
          else if(strcmp($varVulnLine[$i],$sqlDatabaseSecureVuln[$j])==-1)
          {

                
                $tempLen=strlen($varVulnLine[$i]);
                $temptrim = substr("$varVulnLine[$i]", 4, $tempLen);   //To Separate > mark from var string. I got this at >var_fetch_array :P
                if(strcmp($temptrim,$sqlDatabaseSecureVuln[$j])==0)
                {
                $tempcheckvarForVuln=0;
//                   echo "<p class='card-text'>This Line is <green>Secured</green> with Input values ".$vulnChkLine[$i]."</p>";
                
                   $Sqljson->Secure="This Line is  Secure with  Database values ".$varVulnLine[$i]." ";
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
//    echo "";
//    echo $noofvarVulnLine;
    if($tempVarVulnCkh==$noofvarVulnLine)
    {
        $GLOBALS['sessionVulnVar']++;
    }
}


?>
