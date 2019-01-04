<?php

include'lib/checkExtension.php';
include 'lib/configuration.php';

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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
.counter {
  background-image: url(assets/fonts/product-sans/Product%20Sans%20Regular.ttf)
  vertical-align: middle;
}
    </style>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="background-image:url(&quot;assets/img/logo.png&quot;);background-position:center;background-size:contain;background-repeat:no-repeat;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
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
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Pages to be Scanned</h2>
                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p><a class="card-link" href="#">Link</a><a class="card-link" href="#">Link</a></div>
        </div>
    </div>
    <div class="container" style="font:product">
    <div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Full Scan</h4>
                <h6 class="text-muted card-subtitle mb-2">Sit back and relax</h6>
                <p class="card-text">This Scans check Vuln in all your pages of website . This may take time depending on the size of your website </p>
                <a href="#" class="card-link">Link</a><a href="#" class="card-link">Link</a></div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Page Scan</h4>
                <h6 class="text-muted card-subtitle mb-2">Quick and separate</h6>
                <p class="card-text">This Scan helps for scanning page by page for clear and separate report.This is faster thank full scan</p><a class="card-link" href="#">Link</a><a class="card-link" href="#">Link</a></div>
        </div>
    </div>
</div>
        <div class="container">
        <div class="card">
           <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="lib/cmdExeVulnChecker.php" allowfullscreen></iframe>
</div>
            
            </div>
        
        
        
        </div>
    
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    

    <script  src="assets/js/index.js"></script>

</body>

</html>