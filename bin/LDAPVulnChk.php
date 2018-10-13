<?php


$time_start = microtime(true); //Create a variable for start time
$fh = fopen('Vulnerability.log', 'w');
$date = new DateTime();
$date = $date->format("y:m:d h:i:s");
//chdir('G:\xammp\htdocs\test');
fwrite($fh, $date);
$workDir=getcwd();
$conFile = scandir($workDir);
print_r($conFile);
echo "<br>";

$LDAP_array=array();


//print_r($LDAP_array);



$httpTotalLines=0;  //to count no of lines
$noLines=0;         //To count no of lines
$noVulLines=0;       //TO count no of Vuln varaibles

$typeChkLines = file($conFile[25]); 

$superArray=array(); //For Storing all lines 
//$superSinkLines=array();    //For storing line number where xss is possible 

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{ 
    $superArray=$typeChkLines;
//    echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n";

        
        $sendLine=htmlspecialchars($typeChkLine);
        $trimSendline = multiexplode($sendLine);  //Gets the line by removing Delimiters 
        $trimmed_Sendline=array_map('trim',$trimSendline);//To remove White Spaces from Array
    checkSources($trimmed_Sendline,$typeChkLine_num,$typeChkLines,$typeChkLine);

    
    $GLOBALS['httpTotalLines']++;
    

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


function checkSources($chkLine,$chkLineNo,$typeChkLines,$typeChkLine)
{
    
    include'warmHole.php'; 
    $varLenth=count($chkLine);
    $listLen=count($ldapWarmhole); 
    
    for($i=0;$i<$varLenth;$i++)
    {
        
        for($j=0;$j<$listLen;$j++)
        {
            if(strlen($chkLine[$i])>1)
            {
                if(strcmp($chkLine[$i],$ldapWarmhole[$j])==0)
                {
//                    This if conditions confirms for sinks 
//                 echo "<br>This Line No <b> ".$chkLineNo." </b>may be Vulnerable to File Inclusion";
                    
                    
                $string="This Line No <b> ".$chkLineNo." </b>may be Vulnerable to File Inclusion";
                    
                     push($string);
                    
//                   echo "<br>Line is ".$typeChkLine;
                 $string="Line is ".$typeChkLine."";
                   push($string);
                  checkforSinks($chkLine,$typeChkLines,$chkLineNo);
                  $GLOBALS['noLines']++; 
                    push('new');
                    break;
                }
            }
            
        }
    }  
    
}






//This function checks for sinks in the source lines
function checkforSinks($sinkChkLine,$typeChkLines,$chkLineNo)
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
//                  echo "<br>Input Values found Checking for its Secure<br>";
                    
                    $string="Input Values found Checking for its Secure";
                    
                 push($string);
                  checkSecure($sinkChkLine);
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
//        echo "<br>Input Values not found This may be Secure Search Vars  ";
           
       $string="<br>Input Values not found This may be Secure Search Vars ";
        
      push($string);
        
        checkifVaribles($sinkChkLine,$typeChkLines,$chkLineNo);
    }
    
}


//This function checks whether sinks  i.e get and post are protected or not
function checkSecure($vulnChkLine)
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
               
//                 echo "<br>This Line is Secure with  ".$vulnChkLine[$i];
                
                $string=" This Line is Secure with  ".$vulnChkLine[$i];
                
        
                push($string);
                
                 $vuln=1;
                  break;
               }
            }
               
        }
    }
    if($vuln==0)
    {
//        echo "<br>This is Not secured with Input Values";
        
         $string=" This is Not secured with Input Values";
         push($string);
        
        $GLOBALS['noVulLines']++;
    }
    
    //Checking the File input Strings  (sinks)
    

//     
//    for($i=0;$i<$varCount;$i++)
//    {
//        for($j=0;$j<$fileList;$j++)
//        {
//            
//            if(strlen($vulnChkLine[$i])>1)
//            {
//                
//            if(strcmp($vulnChkLine[$i],$fileInputValues[$j])==0)
//               {
//               
//                 echo "<br>Sinks found  ".$vulnChkLine[$i];
//                 $vuln1=1; 
//                  break;
//               }
//            }
//               
//        }
//    }
//    if($vuln1==0)
//    {
//        echo "<br>No Sinks Found";
//        $GLOBALS['noVulLines']++;
//    }
//    
    
}




//This functiuons checks for the variables in the vuln lines !

function checkifVaribles($chkVarSendline,$chkVarLines,$chkSendDecLine_num)
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
                printDeclaration($chkVarSendline[$i],$chkVarLines,$chkSendDecLine_num);
        }
        
         else
           {
            $tempCutQuot1=substr($chkVarSendline[$i],7,-7);  //Substr for getting values in db ".$value." => to $value trimming both sides symbols
             $tempCut=substr($tempCutQuot1,0,1);
             
             if($tempCut=='$')
             {
//                 echo $tempCutQuot1;
               
            printDeclaration($tempCutQuot1,$chkVarLines,$chkSendDecLine_num);  //Send the value decleared in th sql string since it has uni characters like " ' . they are trimmed first and then sent
             }
             
            
           }
        
        
//        $GLOBALS['countTemp']++;
    }
    
//     $GLOBALS['sessionVar']++;
      
//    echo "<br>";   
}



function printDeclaration($prtDecVar,$prtDecLines,$prtDecLine_num)   //Dec==Declaration
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
//                 echo $chkprtDecLine;
                
                
                
                  push($chkprtDecLine);
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = multiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
                 checkSecure($chkprtDecLine); checkifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num);
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
//                    echo $chkprtDecLine;
                    
                    push($chkprtDecLine);
                    
                    $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                    $chkprtDecLine = multiexplode($chkprtDecLine);
                    $chkprtDecLine=array_map('trim',$chkprtDecLine);
//                    print_r($chkprtDecLine);
//                  $Token = new Tokenizer();
//            $Token->
                checkSecure($chkprtDecLine); 
                checkifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num);
                }
            }
       
            
        
       } 
//        $GLOBALS['countTemp']++;
    }

}


echo "<br>No fo Lines are ".$GLOBALS['noLines'];

echo "<br>No of Vulnerable Lines are ".$GLOBALS['noVulLines'];




function push($string)
{
         array_push($GLOBALS['LDAP_array'],htmlspecialchars($string));
}


//echo "<br>".$LDAP_array[0];
$length=count($LDAP_array);



//for($i=1;$i<$length-1;$i++)
//{
//    
//    
//    echo "<br>".htmlspecialchars($LDAP_array[$i])." ".htmlspecialchars($LDAP_array[++$i]);
//    if($length==$i)
//    {
//        break;
//    }
//   $i=$i++;
//    
//    if(strcmp($LDAP_array[$i],'new')==0)
//    {
//        echo "<br>Line is <br>".htmlspecialchars($LDAP_array[$i]);
//        $i=$i++;
//    
//    }
//}
//
//
//

for($i=0;$i<$length;$i++)
{
    if($LDAP_array[$i]=='new')
    {
//        echo "<br>occured";
    }
    else
    {
        echo "<br>".$LDAP_array[$i];
    }
}







?>