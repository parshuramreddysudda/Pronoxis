
<?php
function listFolderFiles($dir)
{
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    echo '<ol>';

    foreach($ffs as $ff)
    {
        echo '<li>'.$ff;
//        getFileContents($ff);

        if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
        echo '</li>';
    }
    echo '</ol>';
}


$Mdir=getcwd();
echo $Mdir;
listFolderFiles('/Applications/MAMP/htdocs/Pronoxsis-Started');


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
        print_r($gFCline);
    } 
    
}
?>