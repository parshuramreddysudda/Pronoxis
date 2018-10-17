<?php


$phpFiles=0;

$filesArray=array();





if(isset($_SESSION['search']))
{
    
   $currentDirFiles = scandir($_SESSION['search']); 
$nofLines=count($_SESSION['search']);
function FileContentslist($dir)
{

    $Present= scandir($dir);

    unset($Present[array_search('.', $Present, true)]);
    unset($Present[array_search('..', $Present, true)]);

    // prevent empty ordered elements
    if (count($Present) < 1)
        return;

    echo '<ol>';

    foreach($Present as $Sub)
    {
        echo '<li>'.$Sub;
        getFileContents($Sub);
        
        if(is_dir($dir.'/'.$Sub)) 
        {
            FileContentslist($dir.'/'.$Sub);
        }
        echo '</li>';
    }
    echo '</ol>';
}

//echo "<br>";
//print_r($currentDirFiles[2]);

//echo "<br>";

//echo "Php Files and address are ";

$lengthofDir=count($currentDirFiles);

for($i=0;$i<$lengthofDir;$i++)
{
    
 $name = $currentDirFiles[$i];
$ext = end((explode(".", $name))); # extra () to prevent notice

if($ext=='php')
{
    
    $fileName=$currentDirFiles[$i];
    $lineNo=array_search($fileName,$currentDirFiles);
    
 array_push($filesArray,$fileName,$lineNo);
    
    
    
}
    
    
    
}
    
    
}


?>
