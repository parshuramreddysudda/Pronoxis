<?php

$workDir=getcwd();
echo "<h5>Printing &quot".$workDir." &quot Files </h5><br>";

//Arranging Directory Structure in ordered way 

$currentDirFiles = scandir($workDir);

$nofLines=count($currentDirFiles);
echo "<h5>Number of Files and Folders are  &quot".$nofLines." &quot  </h5><br>";

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

echo "<br>";
echo "<h1>Printing  Files </h1><br>";
print_r($currentDirFiles);

echo "<br>";


FileContentslist($workDir);



echo count($currentDirFiles); //To get  The nof of files in the Folder 
//echo file_get_contents($a[4]);
$data = htmlentities(file_get_contents($currentDirFiles[3]));



function getFileContents($contDir)
{
    if(is_dir ($contDir))
    {
        echo "<h1>Printing ".$contDir." Files </h1><br>";
        return;
    }
    $gFClines = file($contDir);
    
    echo "<h1>Printing ".$contDir." Files </h1><br>";
// Loop through our array, show HTML source as HTML source; and line numbers too.
    foreach ($gFClines as $gFCline_num => $gFCline) 
    {
    echo "Line #<b>{$gFCline_num}</b> : " . htmlspecialchars($gFCline) . "<br />\n";
    } 
    
}

?>
