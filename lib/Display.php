<?php
error_reporting(0);
@ini_set('display_errors', 0);
include'checkExtension.php';
include 'configuration.php';
include 'getFilesContent.php'; 

if(isset($_POST['projectName']))
{

$_SESSION['projectName']=$_POST['projectName'];
	
	
    
$projectName=$_POST['projectName'];
$_SESSION['search']=$_POST['search'];
	 
 
	
}

 
?>   
<html>
<head>
    <!-- Meta-Information -->
    <title>Pronoxis Partial Scan</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <!-- Vendor: Materialize Stylesheets  -->
        <link rel="stylesheet" href="../assets/customAssets/css/materialize.min.css" type="text/css">

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="../assets/customAssets/css/icons.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/customAssets/css/main.css" type="text/css">
    <link rel="stylesheet" href="../assets/customAssets/css/responsive.css" type="text/css">
    <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.css">

    <!-- Color Scheme -->
    <link rel="stylesheet" href="../assets/customAssets/css/color-schemes/color.css" type="text/css" title="color3">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color1.css" title="color1">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color2.css" title="color2">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color4.css" title="color4">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color5.css" title="color5">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/scanLoader/style.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
     <style >
/*
#load
{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("https://i.imgur.com/Gp6xPjs.gif") no-repeat center center rgba(1,0,0,0.73);
} 
*/
    </style>
    <style>
        code {
            background-color: #eff0f1;
            color: #cc0000;
            padding: 6px 0px;
            margin-bottom: 6px;

        } 

        .h3Head {
            color: black;
            margin-bottom: 30px;
            font-family: product;
        }

        red {
            color: crimson;
        }

        green {
            color: #4CAF50;
        }

        blue {
            color: #0074D9;
        }

        @font-face {
            font-family: "Product";
            src: url(../assets/fonts/product-sans/Product%20Sans%20Regular.ttf);

        }
        .card-text
        {
            color: black;
        }

        .counter { 

            @font-face {
                font-family: "Product";
                src: url(../assets/fonts/product-sans/Product%20Sans%20Regular.ttf) vertical-align: middle;
            }
        }
    </style>
</head>
    
<body class="panel-data expand-data  navbar-expand-md" style="font-family: 'Cabin', sans-serif;">
      <div id="load" style="background-color:#fffff"></div>
<div class="topbar">
  <div class="logo">
    <h1><a href="#" title=""><img  style="width:150px;margin-top:17px;" src="../assets/img/logo.png" alt=""/></a></h1>
  </div>
  <div class="topbar-data">
   
      
      
    <form class="topbar-search">
      <button type="submit"><i class="ion-ios-search-strong"></i></button>
      <input type="text" placeholder="Type and Hit Enter" />
    </form>
    <div class="usr-act">
      <span><img src="../assets/customAssets/images/resource/topbar-usr1.jpg" alt="" /><i class="sts away"></i></span>
      <div class="usr-inf">
        <div class="usr-thmb brd-rd50">
          <img class="brd-rd50" src="../assets/customAssets/images/resource/usr.jpg" alt="" />
          <i class="sts away"></i>
          <a class="green-bg brd-rd5" href="#" title=""><i class="fa fa-envelope"></i></a>
        </div>
        <h5><a href="#" title="">Ram</a></h5>
        <span>Co Worker</span>
        <i>8179940463</i>
        <div class="act-pst-lk-stm">
          <a class="brd-rd5 green-bg-hover" href="#" title=""><i class="ion-heart"></i> Love</a>
          <a class="brd-rd5 blue-bg-hover" href="#" title=""><i class="ion-forward"></i> Reply</a>
        </div>
        <div class="usr-ft">
          <a class="btn-danger" href="#" title=""><i class="fa fa-sign-out"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>
  <div class="topbar-bottom-colors" style="background-color: #2c3e50;">
    <i style="background-color: #2c3e50;"></i>
  </div>
</div><!-- Topbar -->
    
    
<div class="option-panel">
  <span class="panel-btn"><i class="fa ion-android-settings fa-spin"></i></span>
  <div class="color-panel">
    <h4>Text Color</h4>
    <span class="color1" onclick="setActiveStyleSheet('color1'); return false;"><i></i></span>
    <span class="color2" onclick="setActiveStyleSheet('color2'); return false;"><i></i></span>
    <span class="color3" onclick="setActiveStyleSheet('color'); return false;"><i></i></span>
    <span class="color4" onclick="setActiveStyleSheet('color4'); return false;"><i></i></span>
    <span class="color5" onclick="setActiveStyleSheet('color5'); return false;"><i></i></span>
  </div>
  <div class="backgroundimg-panel">
    <h4>Background Image</h4>
    <span class="backgroundimg1-click" style="background-image: url(../assets/customAssets/images/resource/backgroundimg1.png);"></span>
    <span class="backgroundimg2-click" style="background-image: url(../assets/customAssets/images/resource/backgroundimg2.png);"></span>
    <span class="backgroundimg3-click" style="background-image: url(../assets/customAssets/images/resource/backgroundimg3.png);"></span>
    <span class="backgroundimg4-click" style="background-image: url(../assets/customAssets/images/resource/backgroundimg4.png);"></span>
    <span class="backgroundimg5-click" style="background-image: url(../assets/customAssets/images/resource/backgroundimg5.png);"></span>
  </div>
</div><!-- Options Panel -->
<div class="pg-tp">
    <i class="ion-cube"></i>
    <div class="pr-tp-inr">
        <h4>Pronoxis<span></span> </h4>
        <span>Security at its basic Form</span>
    </div>
</div><!-- Page Top -->

<div class="panel-content">
 
    
    
    
    
    
    <div class="filter-items">
        <div class="row grid-wrap mrg20">
            <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget" style="background-color:#ffffff;">
                 
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="fa fa-code" style="color:#13aaf9 "></i>
                    <div class="stat-box-innr">
                        <span><i class="counter" id='totalScan' style="color:black"><?php if(isset($totalNoFiles)){ echo $totalNoFiles;}?></i></span>
                        <h5 style="color:black">Total No Files</h5>
                    </div>
                </div>
            </div>
            <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget" style="background-color:#ffffff;" >
                   
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="ion-code" style="color:#e56262;"></i>
                    <div class="stat-box-innr">
                        <span><i class="counter" id="vulnLines" style="color:black"><?php if(isset($totalNoFiles)){ echo $php;}?> </i></span>
                        <h5 style="color:black">Total No of PHP Files</h5>
                    </div>
                </div>
            </div>
         <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget" style="color:#ffffff">
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="ion-code-working" style="color:#6dba7f"></i>
                    <div class="stat-box-innr">
                        <span><i class="counter" id="secureLines" style="color:black"> <?php if(isset($totalNoFiles)){ echo $html;}?></i></span>
                        <h5 style="color:black">Total No of HTML Files</h5>
                    </div>
                  
                </div>
            </div>
            <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget" style="background-color:#ffffff">
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="ion-code-download" style="color:#d3d3d3"></i>
                    <div class="stat-box-innr">
                        <span><i class="counter" id="totalScanedlines" style="color:black"><?php if(isset($totalNoFiles)){ echo $css;}?> </i></span>
                        <h5 style="color:black">No of CSS Files </h5>
                    </div>
                    
                </div>
            </div>
        </div><!-- Filter Items -->
    
    </div>

 <div class="widget pad50-40">
    <div class="timeline-wrp">
      <div class="timeline-innr">
        <div class="timeline-label"><span class="brd-rd5 blue-bg">  Salient Details </span></div>
		
      
        <div class="timeline-block">
          <span class="pst-tm"><i class="ion-clock"></i> Project Details</span>
          <i class="sts online"></i>
          <div class="brd-rd5 act-pst">
            <img class="brd-rd50" src="" alt="">
            <div class="act-pst-inf">
              <div class="act-pst-inr"><h5><a href="#" title="">Project Name</a></h5> Defined as  <a href="#" title=""><?php echo $_SESSION['projectName'];?></a></div>
              <div class="act-pst-dta">
                <p>This name is Used by pronoxis for Reports and files Storing process</p>
              </div>
            </div>
          </div>
        </div>
	<div class="timeline-block">
          <span class="pst-tm"><i class="ion-clock"></i>Report Details</span>
          <i class="sts away"></i>
          <div class="brd-rd5 act-pst">
            <img class="brd-rd50" src=" " alt="">
            <div class="act-pst-inf">
              <div class="act-pst-inr"><h5><a href="#" title="">Project Address</a></h5> &nbsp;is as <a href="#" title=""></a></div>
              <div class="act-pst-dta" style="margin-top:7px;">
			  <code class="code"  ><?php echo $_SESSION['search'];  ?></code>
                <p style="margin-top:7px;">Pronoxis Scans the file from the Above address and Generates Reports with  name of <?php echo $_SESSION['projectName'];?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="timeline-label"><span class="brd-rd5 dont-dstrb">Select Scan Type</span></div>
		
        <div class="timeline-block">
          <span class="pst-tm"><i class="ion-clock"></i> Scan by Page</span>
          <i class="sts dont-dstrb"></i>
          <div class="brd-rd5 act-pst">
            <img class="brd-rd50" src="" alt="">
            <div class="act-pst-inf">
              <div class="act-pst-inr"><h5><a href="#" title="">Partial Scan</a></h5>  <a href="#" title="">Page By Page</a></div>
              <div class="act-pst-dta">
			    <p>Scan Page by page and Get Detailed Report</p>
			   <button class="btn btn-primary" name="typeScan" checked="checked" value="2" >Partial Scan</button>  
              
              </div>
            </div>
          </div>
        </div>
        <div class="timeline-block">
          <span class="pst-tm"><i class="ion-clock"></i>Complete Scan</span>
          <i class="sts dont-dstrb"></i>
          <div class="brd-rd5 act-pst">
            <img class="brd-rd50" src="" alt="">
            <div class="act-pst-inf">
              <div class="act-pst-inr"><h5><a href="#" title="">Full Scan </a></h5> output formatted to <h6><a href="#" title="">JSON</a></h6> Files.</div>
              <div class="act-pst-dta">
			   <p>Scan full Website and get Details report  and Autosaves in  JSON Format</p>
			   <button class="btn btn-primary" name="typeScan" checked="checked" value="1" >Full Scan</button>  
               
              </div>
            </div>
          </div>
        </div>
        <div class="timeline-label"><a class="brd-rd5 blue-bg" href="#" title="">No Denouement </a></div>
      </div>
    </div>
  </div> 
	
 
	
<div class="widget pad50-40">
    	
   
<div id="Scan1" class="container desc" style="display: none;">

    
    <?php 
    
        echo "
        <div class='card'>
        
        <div class='card-body'>
      
   <img src='https://i.imgur.com/OvUJsP1.png' class='img-fluid center' style='margin-left:auto;margin-right:auto;width:25%;display:block;' />
   
         <h3 class='text-monospace text-truncate text-center' style='font-weight:bold;margin-top:40px;'>Start Scan</h3>
         
  
                      <form action='../main/configuration.php'class='form-inline ml-auto' method='post' style='float:right;'>
                 
  <input type='hidden' name='ProjectName' value='".$_POST['projectName']."'>
    <input type='hidden' name='Search' value='".$_POST['search']."'>
          
            <button class='btn btn-secondary' type='submit' value='submit' style='background-color: #2B2B2B;color:white;float:right;'>Submit</button>
            </form>
          
      
      </div>
      </div>";
    ?>
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
		
  </div>   


</div><!-- Panel Content -->
<script>
$(document).ready(function() {
    $("button[name$='typeScan']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#Scan" + test).show();
        $("$mainScan").hide();
    });
});
</script>
<footer>
  <p>Copyright <a href="#" title="">Aiplus Company</a> &amp; 2017 - 2018</p>
  <span>Security at Tips</span>
</footer>
<!-- Vendor: Javascripts -->
	
<script src="../assets/customAssets/js/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Vendor: Followed by our custom Javascripts -->
<script src="../assets/customAssets/js/materialize.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/select2.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/slick.min.js" type="text/javascript"></script>
<!-- Our Website Javascripts -->
<script src="../assets/customAssets/js/isotope.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/isotope-int.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.counterup.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/waypoints.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/highcharts.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/exporting.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/highcharts-more.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/moment.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.circliful.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/fullcalendar.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.downCount.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.formtowizard.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/form-validator.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/form-validator-lang-en.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/cropbox-min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/ion.rangeSlider.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/jquery.poptrox.min.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/styleswitcher.js" type="text/javascript"></script>
<script src="../assets/customAssets/js/main.js" type="text/javascript"></script>  
<!-- Resources -->
 
 
</body>
</html>
