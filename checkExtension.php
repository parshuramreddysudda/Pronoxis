<?php

session_start();
 $_SESSION['$php'] = 0;
$php   =0;
$html  =0;
$images=0;
$css   =0;
$js    =0;
$font  =0;

function FileExtensionlist($dir)
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
        getFileExtension($ff);
        
        if(is_dir($dir.'/'.$ff)) FileExtensionlist($dir.'/'.$ff);
        echo '</li>';
    }
    echo '</ol>';
}
$Mdir=getcwd();

echo $Mdir;
$a = scandir($Mdir);

print_r($a);

function getFileExtension($fileEx)
{
    
    $info = new SplFileInfo($fileEx);
     if($info->getExtension()=='php')
     {
    
         $GLOBALS['php']++;
     }
    if($info->getExtension()=='css')
     {
    
         $GLOBALS['css']++;
    }
    if($info->getExtension()=='js')
     {
    
         $GLOBALS['js']++;
    }
    if($info->getExtension()=='eot')
     {
     
         $GLOBALS['font']++;
    }
     if($info->getExtension()=='ttf')
     {
      
         $GLOBALS['font']++;
     }
     if($info->getExtension()=='woff')
     {
       
         $GLOBALS['font']++;    
     }
    if($info->getExtension()=='jpg')
     {

         $GLOBALS['images']++;
     }
    if($info->getExtension()=='png')
     {
    
         $GLOBALS['images']++;
    }
    if($info->getExtension()=='html')
     {
  
         $GLOBALS['html']++;
    }
}
FileExtensionlist('G:\xammp\htdocs\dept');
echo "<h3> No of PHP Files are ".$php."<h3>";
echo "<h3> No of Html Files are ".$html."<h3>";
echo "<h3> No of Images Files are ".$images."<h3>";
echo "<h3> No of Css Files are ".$css."<h3>";
echo "<h3> No of Js Files are ".$js."<h3>";
echo "<h3> No of Font Files are ".$font."<h3>";  
?>



























