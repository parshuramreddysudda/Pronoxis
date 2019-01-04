<?php
//php file including strated

//session_start();
echo getcwd();
include 'config.php';
if(isset($_POST['projectName']))
{
    
$projectName=$_POST['projectName'];
    $_SESSION['projectName']=$projectName;
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Pronoxis By Decrypter
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="assets/fonts/product-sans/Product%20Sans%20Regular.ttf" rel="stylesheet">

    <link href="assets/helvetica/HELR45W.ttf" rel="stylesheet">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/docsearch.js/2/docsearch.min.css">

</head>

<body class="">

    <!-- Navbar -->
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="background-image:url(assets/img/logo.png);background-position: center;background-size: contain;background-repeat: no-repeat">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>

            <button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline ml-auto"><button class="btn btn-link" type="button" style="color: black;font-family: 'Product Sans', sans-serif;">Source Code &nbsp<i class="fa fa-github"></i></button></form>
            </div>
        </div>
    </nav>


    <!--    Alert docx decomment it       -->


    <!--    <div role="alert" class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="material-icons">close</i></span></button><span><strong>Please upload only 10 file per scan .</strong></span></div>-->

    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h3 style="font-family: 'Product Sans', sans-serif;">Report of
                    <?php  if(isset($projectName)){echo $projectName;} else {echo "Pronoxis";}?>
                </h3>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-md-6">


                        <form class="form-inline ml-auto " action="index.php" method="post" id="search">





                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Paste Address here</label>
                                    <input required name="search" type="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Enter Project name</label>
                                    <input type="name" required name="projectName" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <button class="btn btn-secondary" type="submit" value="submit" form="search">Submit</button>
                            </div>

                        </form>


                    </div>

                    <div class="col-md-6">


                    </div>



                </div>


            </div>



            <div class="float-none">

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">

                                <div class="card">
                                    <div class="card-header card-header-icon  card-header-rose" style="font-family: 'Product Sans', sans-serif;">
                                        <div class="card-icon">

                                            Total no of Files </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Total No of Files</p>
                                                <p>No of PHP Files are</p>
                                                <p>No of Html Files are</p>
                                                <p>No of Images Files are</p>
                                                <p>No of Css Files are</p>
                                                <p>No of Js Files are</p>
                                                <p>No of Font Files are</p>
                                            </div>

                                            <div class="col-md-4">
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($totalNoFiles)){ echo $totalNoFiles;}?>
                                                </p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($totalNoFiles)){ echo $php;}?>
                                                </p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($html)){ echo $html;}?>
                                                </p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($images)){ echo $images;}?>
                                                </p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($css)){ echo $css;}?>
                                                </p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($js)){ echo $js;}?>
                                                </p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($font)){ echo $font;}?>
                                                </p>



                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="card">
                                    <div class="card-header card-header-icon  card-header-rose" style="font-family: 'Product Sans', sans-serif;">
                                        <div class="card-icon">

                                            Description of Files </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>No of File Scanned</p>
                                                <p>No of Files Vulnerable </p>
                                                <p>No of File Secured</p>
                                                <p>No of Files ignored</p>
                                            </div>

                                            <div class="col-md-8">
                                                <p style="color:darkslategrey">: 342</p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($php)){ echo $php;}?>
                                                </p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($php)){ echo $php;}?>
                                                </p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($php)){ echo $php;}?>
                                                </p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($php)){ echo $php;}?>
                                                </p>
                                                <p style="color:darkslategrey">:
                                                    <?php if(isset($php)){ echo $php;}?>
                                                </p>


                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="col-md-8">

                            <div class="card text-center" data-bs-hover-animate="pulse">
                                <div class="card-header card-header-icon  card-header-rose">
                                    <div class="card-icon" style="font-family: 'Product Sans', sans-serif;">

                                        Observed Overall performance</div>
                                </div>
                                <div class="card-body">

                                    <div id="chartdiv" style="width:100%; height:400px; background-color: #282828;"></div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>








            </div>
            <div class=" container card">
                <div class="card-body">
                    <h3 style="font-family: 'Product Sans', sans-serif;">Pages to be Scanned</h3>
                    <a class="btn btn-primary float-right" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" role="button" href="#collapse-1" style="background-color: #DE2968;">&lt; Show/hide &gt;</a>
                    <div class="collapse" id="collapse-1">




                        <?php
        
        $lengthofFilearray=count($filesArray);
        for($i=0;$i<$lengthofFilearray;$i++)
        {
            
            
           echo "
        <div class='card'>
        
        <div class='row card-body'>
      
      <div class='col-md-4'>
            
        <h4 style='font-family: 'Product Sans', sans-serif;' >".$filesArray[$i]."</h4>
            </div>
      <div class='col-md-8'>
                      <form class='form-inline ml-auto ' action='displayConfig.php' method='post' id='page".$i."' target='_blank'>
               <input type='hidden'  name='page' value=".$filesArray[$i].">
          
            <button class='btn btn-secondary' type='submit' value='submit' form='page".$i."'  style='background-color: #DE2968;'>Submit</button>
            </form>
          
            </div>
      
      </div>
        </div>
        
        ";
          $i=++$i;
            
        }
        
//       for($i=0;$i<$lengthofFilearray;$i++)
//       {
//           echo $filesArray[$i];
//           
//       }
        
        
        ?>



                    </div>
                </div>

            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.primeuth.com">
                                Planus
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())

                    </script>, made with <i class="material-icons">favorite</i> by
                    <a href="https://www.primeauth.com" target="_blank">Planus</a>
                </div>
                <!-- your footer here -->
            </div>
        </footer>

        <!--   Core JS Files   -->
        <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
        <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
        <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chartist JS -->
        <script src="assets/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
</body>



<!--    Java script code for other resources Amcharts and etc-->



<!-- amCharts javascript sources -->
<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/chalk.js"></script>


<!-- amCharts javascript sources -->
<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/dark.js"></script>

<script>
    $('[data-toggle="popover"]').popover();

</script>
<!-- amCharts javascript code -->
<script type="text/javascript">
    AmCharts.makeChart("chartdiv", {
        "type": "pie",
        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
        "titleField": "attacktype",
        "valueField": "severity",
        "fontSize": 12,
        "theme": "dark",
        "allLabels": [],
        "balloon": {},
        "titles": [],
        "dataProvider": [{
                "attacktype": "Sql Injection",
                "severity": "356.9"
            },
            {
                "attacktype": "Code Execution",
                "severity": "101.1"
            },
            {
                "attacktype": "Cross Site Scripting",
                "severity": 115.8
            },
            {
                "attacktype": "Http Responce Splitting",
                "severity": 109.9
            },
            {
                "attacktype": "Session Fixation",
                "severity": 108.3
            },
            {
                "attacktype": "Reflection Injection",
                "severity": 65
            },
            {
                "attacktype": "File Inlcusion",
                "severity": "20"
            },
            {
                "attacktype": "File Disclosure",
                "severity": "10"
            },
            {
                "attacktype": "File Manipulation",
                "severity": "30"
            },
            {
                "attacktype": "Command Execution",
                "severity": "29"
            },
            {
                "attacktype": "Xpath Injection",
                "severity": "18"
            },
            {
                "attacktype": "LDAP Injection",
                "severity": "31"
            },
            {
                "attacktype": "Protocol Injection",
                "severity": "25"
            },
            {
                "attacktype": "Possible Flow Control",
                "severity": "0"
            },
            {
                "attacktype": "PHP Object Injection",
                "severity": "3"
            }
        ]
    });

</script>

</html>
