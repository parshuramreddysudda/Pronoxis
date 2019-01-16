<?php
$workDir=getcwd();

$conFile = scandir($workDir);
print_r($conFile);
echo "<br>";

$sqlLines=0; //For Storing no of Sql lines
$sqlVulnLines=0; //For Storing no of Sql lines

$typeChkLines = file($conFile[17]);

// Loop through our array, show HTML source as HTML source; and line numbers too.
foreach ($typeChkLines as $typeChkLine_num => $typeChkLine)
{
    
    if($typeChkLine_num==11)
    {
        
      echo "Line #<b>{$typeChkLine_num}</b> : " . htmlspecialchars($typeChkLine) . "<br />\n"; 
        $typeChkLine=htmlspecialchars($typeChkLine);
        $typeChkLine = multiexplode($typeChkLine);  //Gets the line by removing Delimiters 
        $typeChkLine=array_map('trim',$typeChkLine);
        echo "<br>After edit ";
        print_r($typeChkLine);
        removequot($typeChkLine);
        echo "<br><br>";
        print_r($typeChkLine);
    }
    
    
}
$string='<br>Heller# % & * % Therw " "how " ';


echo $string;
$replace=str_replace('"', "", $string);
echo "<br>".$replace;


$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

echo json_encode($arr);


function removequot($typeChkLine)
{
    $quotLineLength=count($typeChkLine);
    for($i=0;$i<$quotLineLength;$i++)
    {
       if($typeChkLine[$i]==0)
       {
           
       }
    }
 
    
}
        

function multiexplode($data)
{
    $delimiters=array(",","-","()","(",")",",","{","}","|",">","'"," ","=","%","`",'"');
    $quotedata=str_replace('"',"", $data);
	$MakeReady = str_replace($delimiters, $delimiters[0], $quotedata);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}


echo "mysqli_query(conn,query_upload)";
        $typeChkLine=htmlspecialchars($typeChkLine);
        $typeChkLine = multiexplode($typeChkLine);
print_r($typeChkLine);
?>