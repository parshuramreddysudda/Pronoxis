<?php

  function main1( )
    {
     $address=$_SESSION['addresss'];
echo "<div class='container'>
  <h2>Responsive Embed</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/tgbNymZ7vqY'></iframe>
  </div>
</div>";
      echo "My Address".$address;
    }
        function main2( )
    {
        
    $address=$_SESSION['addresss'];
echo "<div class='container'>
  <h2>Responsive Embed</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/tgbNymZ7vqY'></iframe>
  </div>
</div>";
     echo "My Address".$address;
    }
        function main3( )
    {
        
    $address=$_SESSION['addresss'];
echo "<div class='container'>
  <h2>Responsive Embed</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/tgbNymZ7vqY'></iframe>
  </div>
</div>";
echo "My Address".$address;
    }
        function main4( )
    {
        $address=$_SESSION['addresss'];
    
echo "<div class='container'>
  <h2>Responsive Embed</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/tgbNymZ7vqY'></iframe>
  </div>
</div>";
echo "My Address".$address;
    }
        function main5( )
    {
        
    $address=$_SESSION['addresss'];
echo "<div class='container'>
  <h2>Responsive Embed</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/tgbNymZ7vqY'></iframe>
  </div>
</div>";
 echo "My Address".$address;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <?php 
    
for($i=0;$i<5;$i++)
{
    $_SESSION['addresss']=$i;
    main1();   
    main1();  
    main1();   
    main1();   
    main1();   
}

      ?>

</body>
</html>
