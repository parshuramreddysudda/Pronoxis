<?php

include'checkExtension.php';
include 'configuration.php';
include 'getFilesContent.php'; 

if(isset($_POST['projectName']))
{
    
$projectName=$_POST['projectName'];
$_SESSION['projectName']=$projectName;
  

}


?>  

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pronoxis</title>
<!--    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="../assets/bootstrap/css/material-kit.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/material-kit.css.map">
    <link href="../assets/fonts/product-sans/Product%20Sans%20Regular.ttf" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="../assets/css/loading.css">
    
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
   
    
      <link rel="stylesheet" href="../assets/LoadingAssests/loading-bar.css">
    <script  type="text/javascript" src="../assets/LoadingAssests/loading-bar.js"></script>
<style>
.counter {
    
   @font-face {
font-family: "Product";
src: url(../assets/fonts/product-sans/Product%20Sans%20Regular.ttf)
  vertical-align: middle;
}
    }
    </style>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</head>

<body style="font:Product;">
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="background-image:url(&quot;../assets/img/logo.png&quot;);background-position:center;background-size:contain;background-repeat:no-repeat;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
            <button
                class="navbar-toggler" data-toggle="collapse" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-2">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(0,0,0);"><i class="fa fa-github"></i>&nbsp; Source code</a></li>
                    </ul>
                </div>
        </div>
    </nav>
    <div class="container" style="color:rgb(33,59,92);margin-top:23px;">
        <div class="card-group" style="padding-top:0px;margin-top:-31px;">
            <div class="card">
                <div class="card-body" style="padding-right:20px;">
                    <h4 class="card-title" style="font-size:12px;margin-top:5px;margin-bottom:6px;">&nbsp;  Total No of Lines</h4>
                    <h1 style="font-size:30px;margin-top:4px;">
  <div class="counter" data-count="<?php if(isset($totalNoFiles)){ echo $totalNoFiles;}?>">0</div></h1>
                    <p style="margin-bottom:0px;">Paragraph</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="padding-right:20px;">
                    <h4 class="card-title" style="font-size:12px;margin-top:5px;margin-bottom:6px;">&nbsp;  Total HTML Pages</h4>
                    <h1 style="font-size:30px;margin-top:4px;"><div class="counter" data-count="  <?php if(isset($html)){ echo $html;}?>">0</div></h1>
                    <p style="margin-bottom:0px;">Paragraph</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="padding-right:20px;">
                    <h4 class="card-title" style="font-size:12px;margin-top:5px;margin-bottom:6px;">&nbsp;  Total JS Files</h4>
                    <h1 style="font-size:30px;margin-top:4px;"><div class="counter" data-count="<?php if(isset($js)){ echo $js;}?>">0</div></h1>
                    <p style="margin-bottom:0px;">Paragraph</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="padding-right:20px;">
                    <h4 class="card-title" style="font-size:12px;margin-top:5px;margin-bottom:6px;">&nbsp;  Total CSS Files</h4>
                    <h1 style="font-size:30px;margin-top:4px;"><div class="counter" data-count="<?php if(isset($css)){ echo $css;}?>">0</div></h1>
                    <p style="margin-bottom:0px;">Paragraph</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="padding-right:20px;">
                    <h4 class="card-title" style="font-size:12px;margin-top:5px;margin-bottom:6px;">&nbsp;  Total PHP Files</h4>
                    <h1 style="font-size:30px;margin-top:4px;color:rgba(255,3,3,0.87);"><div class="counter" data-count=" <?php if(isset($totalNoFiles)){ echo $php;}?>">0</div></h1>
                    <p style="margin-bottom:0px;">Paragraph</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="padding-right:20px;">
                    <h4 class="card-title" style="font-size:12px;margin-top:5px;margin-bottom:6px;">&nbsp;  Total No Img Files</h4>
                    <h1 style="font-size:30px;margin-top:4px;"><div class="counter" data-count=" <?php if(isset($images)){ echo $images;}?>">0</div></h1>
                    <p style="margin-bottom:0px;">Paragraph</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
   <div class="card-group">
  <div class="card">
        <div class="card-body" >
       <div class="row">
            <div class="col">
           <p>Project Name</p><hr>
           <h2>Pronoxis</h2>
           </div>
            
            </div>
        </div>
        </div>
       <div class="card">
        <div class="card-body" >
       <div class="row">
            <div class="col">
 
          <p>Project Name</p><hr>
           <code> htpp://localhost</code>
           </div>
            
            </div>
        </div>
        </div>
       <div class="card">
        <div class="card-body" >
       <div class="row">

<div id="scanGroup">
    
    Complete Scan <input type="radio" name="typeScan" checked="checked" value="1"  /> 
    
  Partial Scan  <input type="radio" name="typeScan" value="2" />
    
    <div id="mainScan" class="desc">
       This is The Main Section
    </div>
</div>
            </div>
        </div>
        </div>
        
        
        </div>
    </div>
    
<div id="Scan1" class="container desc" style="display: none;">
   <div class="card-group">
  <div class="card">
        <div class="card-body" >
       <div class="row">
            <div class="col">
           <p>Project Name</p><hr>
           <h2>Pronoxis</h2>
           </div>
            
            </div>
        </div>
        </div>
       <div class="card">
        <div class="card-body" >
       <div class="row">
           <div class="col-md-4">
           
           
           
           </div>
            <div class="col-md-4">
 
       
           </div>
            <div class="col-md-4">
           
           <div
  class="ldBar label-center"
  style="width:25%;height:25%;margin:auto"
  data-value="35"
 data-preset="circle"
></div>
           
           </div>
            </div>
        </div>
        </div>
       <div class="card">
        <div class="card-body" >
       <div class="row">
 
       <div class="row">
            <div class="col">
                <div class="card-title">Running Scan of</div>
                <div class="card-text">
                <b>Page Name</b>  <label>Index.php</label><br>
                <b>Vulnerability Name</b> <label>SQL Injection</label>
                </div>
           </div>
            
        </div>
            </div>
        </div>
        </div>
        
        
        </div>
    </div>
  
    <div id="Scan2" class="container desc" style="display: none;" >
                  <?php
        
        $lengthofFilearray=count($filesArray);
        for($i=0;$i<$lengthofFilearray;$i++)
        {
            echo    "<div class='row'>";
                  if(!isset( $filesArray[$i]))
            {
                break;
            }
            
           echo "
           
         <div class='col-md-4'>
        <div class='card'>
        
        <div class='card-body'>
      
   <img src='https://i.imgur.com/OvUJsP1.png' class='img-fluid center' style='margin-left:auto;margin-right:auto;width:25%;display:block;' />
   
         <h3 class='text-monospace text-truncate text-center' style='font-weight:bold;margin-top:40px;'>".$filesArray[$i]."</h3>
         
  
                      <form class='form-inline ml-auto ' action='displayConfig.php' method='post' id='page".$i."' target='_blank' style='float:right;'>
               <input type='hidden'  name='page' value=".$filesArray[$i].">
          
            <button class='btn btn-secondary' type='submit' value='submit' form='page".$i."' style='background-color: #2B2B2B;color:white;float:right;'>Submit</button>
            </form>
          
      
      </div>
      </div>
        </div>
        
        ";
          $i=$i+2;
                if(!isset( $filesArray[$i]))
            {
                break;
            }
         echo "
         <div class='col-md-4'>
        <div class='card'>
        
        <div class='card-body'>
      
   <img src='https://i.imgur.com/OvUJsP1.png' class='img-fluid center' style='margin-left:auto;margin-right:auto;width:25%;display:block;' />
            
         <h3 class='text-monospace text-truncate text-center' style='font-weight:bold;margin-top:40px;'>".$filesArray[$i]."</h3>
     
   
                      <form class='form-inline ml-auto ' action='displayConfig.php' method='post' id='page".$i."' target='_blank' style='float:right;'>
               <input type='hidden'  name='page' value=".$filesArray[$i].">
          
            <button class='btn btn-secondary' type='submit' value='submit' form='page".$i."' style='background-color: #2B2B2B;color:white;float:right;'>Submit</button>
            </form>
      
      </div>
        </div></div>
        
        ";
          $i=$i+2;
             if(!isset( $filesArray[$i]))
            {
                break;
            }
                    echo "
                    <div class='col-md-4'>
        <div class='card'>
        
        <div class='card-body'>
      
    <img src='https://i.imgur.com/OvUJsP1.png' class='img-fluid center' style='margin-left:auto;margin-right:auto;width:25%;display:block;' />
            
          <h3 class='text-monospace text-truncate text-center' style='font-weight:bold;margin-top:40px;'>".$filesArray[$i]."</h3>
          
                      <form class='form-inline ml-auto ' action='displayConfig.php' method='post' id='page".$i."' target='_blank' style='float:right;'>
               <input type='hidden'  name='page' value=".$filesArray[$i].">
          
            <button class='btn btn-secondary' type='submit' value='submit' form='page".$i."' style='background-color: #2B2B2B;color:white;float:right;'>Submit</button>
            </form>
      
      </div>
        </div>        </div>
        
        ";
          $i=++$i;
           
           echo "</div> ";
            
        }
        
//       for($i=0;$i<$lengthofFilearray;$i++)
//       {
//           echo $filesArray[$i];
//           
//       }
        
        
        ?>

    
    </div>
 
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/material-dashboard.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script  src="../assets/js/index.js"></script>
    <script>
$(document).ready(function() {
    $("input[name$='typeScan']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#Scan" + test).show();
        $("$mainScan").hide();
    });
});
</script>

</body>

</html>