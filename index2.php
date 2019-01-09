<!DOCTYPE html>
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
</head>

<body style="background-image:url(&quot;assets/img/mountain_bg.jpg&quot;);">
    <section></section>
    <nav class="navbar navbar-light navbar-expand-md">
        <div class="container-fluid"><a class="navbar-brand text-monospace" href="#" style="background-image:url(&quot;assets/img/logo.png&quot;);background-position:center;background-size:contain;background-repeat:no-repeat;margin-left:17px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
            <button
                class="navbar-toggler" data-toggle="collapse" data-target="#navcol-2"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-2">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(0,0,0);"><i class="fa fa-github"></i>&nbsp; Source code</a></li>
                    </ul>
                </div>
        </div>
    </nav>
    <div>
        <div class="header-dark" style="background-image:url(&quot;none&quot;);background-color:rgba(255,255,255,0);padding-bottom:0px;">
            <div class="container hero">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h1 class="text-center" style="margin-bottom:20px;">Pronoxis&nbsp;</h1>
                        <h1 class="text-center" style="margin-top:10px;">A Static Source Code Analyser</h1>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col"><button class="btn btn-dark center" data-toggle="modal" data-target="#getParamModel"type="button" style="background-color:rgb(0,0,0);">Get Started</button></div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card"></div>
        </div>
    </div>
    <div class="modal fade" id="getParamModel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"style="text-align:center;">Lets Start the main window now</h4>
        </div>
        <div class="modal-body">
         <div class="container">

                <div class="row">
                    <div class="col-md-12">
     <form class="form-inline " action="lib/Display.php" method="post" id="search">
<div class="row">
        <div class="col-lg-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Paste Address here</label>
                                    <input required name="search" type="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Enter Project name</label>
                                    <input type="name" required name="projectName" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <button class="btn btn-secondary" type="submit" value="submit" form="search">Submit</button>
                            </div>  
         </div>
         
                            
                        </form>


                    </div>

                    <div class="col-md-6">


                    </div>



                </div>


            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="features-boxed card">
        <div class="container">
            <div class="intro">
                <h2 class="text-center" style="margin-bottom:10px;">Features </h2>
            </div>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box card"><i class="fa fa-map-marker icon"></i>
                        <h3 class="name">Saves Report</h3>
                        <p class="description">Pronoxis Scans you file localy and save the report in JSON and PDF format separately for later use</p><a href="#" class="learn-more">Learn more »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box card"><i class="fa fa-clock-o icon"></i>
                        <h3 class="name">Faster and Accurate</h3>
                        <p class="description">Scans file at Faster rate of 0.003 sec for a single file and maintains Accurancy at high rate&nbsp;</p><a href="#" class="learn-more">Learn more »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box card"><i class="fa fa-list-alt icon"></i>
                        <h3 class="name">Need Not to be Compiled</h3>
                        <p class="description">Pronoxis scan file with out even Compilation of File which even cannot be compiled due to Errors</p><a href="#" class="learn-more">Learn more »</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>