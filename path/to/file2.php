<?php 

include 'file.php';
include 'file3.php';

for($i=0;$i<4;$i++)
{
  $b = new ClassB();
   $b->callA();
   $b->callC();
    
}

   class ClassB
   {
       
   

     function __construct()
     {
         
     }

     function callA()
     {
       $classA = new ClassA();
       $name = $classA->getName();
//       echo $name;    //Prints John

     }     
    function callC()
     {
       $b = new ClassB();
       $b->call();
       $C= new ClassC();
       $name = $C->getName();
//       echo $name;    //Prints John
     }
       function call()
       {
           echo "Called";
       }
   }

$json='heller';
function start()
{
    echo $GLOBALS['json'];
}
start();
   
?>