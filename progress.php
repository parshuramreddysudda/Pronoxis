<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">

<head>
    <title>Progress Bar</title>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


    <link rel="stylesheet" href="assets/css/loading-bar.css">
    
    <script src="assets/js/loading-bar.js"></script>
</head>

<body>
    <!-- Progress bar holder -->
    <div id="progress" style="width:500px;border:1px solid #ccc;"></div>
    <!-- Progress information -->


 
  
    <div class="center">
        <div class="radio-group">
            <input type="radio" name="rdo" id="rdo1">
            <label for="rdo1">Morning</label>
            <input type="radio" name="rdo" id="rdo2" checked>
            <label for="rdo2">Midday</label>
        </div>
    </div>
    <div
  data-preset="bubble"
  class="ldBar label-center"  style="width:50%;height:50%;margin:auto;font-size:30px"
  data-value="80"
></div>

 <style type="text/css">
  .ldBar-label:after 
     {
    
    color: #aaa;
    margin-left: 5px;
    font-family: courier new;
    
    font-weight: 900;
   
  }
</style>
<script>
  var bar1 = new ldBar("#myItem1");
  var bar2 = document.getElementById('myItem1').ldBar;
    
  bar1.set(80);
</script>
</body>

</html>
