<!DOCTYPE html>
<html>
<head>
    <!-- Meta-Information -->
    <title>Zawya Admin Panel</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor: Materialize Stylesheets  -->
    <link rel="stylesheet" href="../assets/customAssets/css/materialize.min.css" type="text/css">

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="../assets/customAssets/css/icons.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/customAssets/css/main.css" type="text/css">
    <link rel="stylesheet" href="../assets/customAssets/css/responsive.css" type="text/css">

    <!-- Color Scheme -->
    <link rel="stylesheet" href="../assets/customAssets/css/color-schemes/color.css" type="text/css" title="color3">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color1.css" title="color1">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color2.css" title="color2">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color4.css" title="color4">
    <link rel="alternate stylesheet" href="../assets/customAssets/css/color-schemes/color5.css" title="color5">
</head>
<body class="panel-data expand-data">
<div class="topbar">
  <div class="logo">
    <h1><a href="#" title=""><img  style="width:50%;" src="../assets/img/logo.png" alt=""/></a></h1>
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
        <h5><a href="#" title="">John Smith</a></h5>
        <span>Co Worker</span>
        <i>076 9477 4896</i>
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
  <div class="topbar-bottom-colors">
    <i style="background-color: #2c3e50;"></i>
    <i style="background-color: #9857b2;"></i>
    <i style="background-color: #2c81ba;"></i>
    <i style="background-color: #5dc12e;"></i>
    <i style="background-color: #feb506;"></i>
    <i style="background-color: #e17c21;"></i>
    <i style="background-color: #bc382a;"></i>
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
        <h4>Welcome to <strong>Pronoxis</strong><span></span> Project</h4>
        <span>Security at its basic Form</span>
    </div>
</div><!-- Page Top -->

<div class="panel-content">
    <div class="filter-items">
        <div class="row grid-wrap mrg20">
            <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget bg-clr1">
                 
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="ion-arrow-graph-up-right"></i>
                    <div class="stat-box-innr">
                        <span>$ <i class="counter">1,206,90</i></span>
                        <h5>All Files</h5>
                    </div>
                    <span><i class="ion-ios-stopwatch"></i> Updated: now</span>
                </div>
            </div>
            <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget bg-clr2">
                   
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="ion-android-desktop"></i>
                    <div class="stat-box-innr">
                        <span><i class="counter">975</i>k+</span>
                        <h5>All Php Files</h5>
                    </div>
                    <span><i class="ion-ios-stopwatch"></i> Updated now</span>
                </div>
            </div>
            <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget bg-clr3">
                   
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="ion-cube"></i>
                    <div class="stat-box-innr">
                        <span><i class="counter">4565</i></span>
                        <h5>All Js Files</h5>
                    </div>
                    <span><i class="ion-ios-stopwatch"></i> Updated: now</span>
                </div>
            </div>
            <div class="col m4 grid-item col s6 col l3">
                <div class="stat-box widget bg-clr4">
                   
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <i class="ion-android-upload"></i>
                    <div class="stat-box-innr">
                        <span>$ <i class="counter">2,206</i></span>
                        <h5>All Html </h5>
                    </div>
                    <span><i class="ion-ios-stopwatch"></i> Updated: now</span>
                </div>
            </div>
            <div class="col m12 grid-item col s12 col l12">
                <div class="traffic-src widget">
                   
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m5 col s12 col l5">
                            <div class="trfc-cnt">
                                <h4 class="widget-title">Traffic Source</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="rat-itms">
                                <div class="rat-itm">
                                    <div class="rat-itm-inf">
                                        <span><i class="counter">170,20</i></span>
                                        <i>Today</i>
                                    </div>
                                    <i class="ion-connection-bars blue-clr"></i>
                                </div>
                                <div class="rat-itm">
                                    <div class="rat-itm-inf">
                                        <span><i class="counter">19.91</i>%</span>
                                        <i>Last Month</i>
                                    </div>
                                    <i class="ion-arrow-graph-down-right green-clr"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col m7 col s12 col l7">
                            <div class="traffic-chart-wrp">
                                <div id="chrt1" style="height: 195px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m6 grid-item col s12 col l6">
                <div class="widget sales-summ pad50-40">
                    <div class="wdgt-opt">
                        <span class="wdgt-opt-btn"><i class="ion-android-more-vertical"></i></span>
                        <div class="wdgt-opt-lst brd-rd5">
                            <a class="delt-wdgt" href="#" title="">Delete</a>
                            <a class="expnd-wdgt" href="#" title="">Expand</a>
                            <a class="refrsh-wdgt" href="#" title="">Refresh</a>
                        </div>
                    </div>
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <h4 class="widget-title">Sales Summery</h4>
                    <div class="sales-charts">
                        <ul class="tabs">
                          <li class="tab"><a class="active" href="#today">Today</a></li>
                          <li class="tab"><a class="" href="#week">Week</a></li>
                          <li class="tab"><a class="" href="#month">Month</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="today">
                                <div id="chrt2" style="height: 270px;"></div>
                            </div>
                            <div class="tab-pane" id="week">
                                <div id="chrt3" style="height: 270px;"></div>
                            </div>
                            <div class="tab-pane" id="month">
                                <div id="chrt4" style="height: 270px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="sales-stat">
                        <div class="sales-stat-itm">
                            <span style="color: #13aaf9;"><i class="counter">760</i></span>
                            <i>Total Sales</i>
                        </div>
                        <div class="sales-stat-itm">
                            <span style="color: #968cec;">$ <i class="counter">4,219</i></span>
                            <i>Revenus</i>
                        </div>
                        <div class="sales-stat-itm">
                            <span style="color: #968cec;">$ <i class="counter">1,247</i></span>
                            <i>Expenses</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m6 grid-item col s12 col l6">
                <div class="widget recently-activ-proj pad50-40">
                    <div class="wdgt-opt">
                        <span class="wdgt-opt-btn"><i class="ion-android-more-vertical"></i></span>
                        <div class="wdgt-opt-lst brd-rd5">
                            <a class="delt-wdgt" href="#" title="">Delete</a>
                            <a class="expnd-wdgt" href="#" title="">Expand</a>
                            <a class="refrsh-wdgt" href="#" title="">Refresh</a>
                        </div>
                    </div>
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <h4 class="widget-title">Recently Active Projects <a class="add-proj brd-rd5" href="#" data-toggle="tooltip" title="Add Project" data-tooltip="Add Project">+</a></h4>
                    <div class="table-wrap">
                        <table class="table style1">
                            <thead><tr><th>#</th><th>Projects</th><th>Completion</th><th>Trend</th></tr></thead>
                            <tbody>
                                <tr>
                                    <td><span class="blue-bg indx">01</span></td>
                                    <td><div class="prj-tl"><h4>Angular2 Migration</h4><span><i class="ion-ios-stopwatch"></i> Created: 10 July</span></div></td>
                                    <td><span class="prcnt">80%</span></td>
                                    <td><i class="green-clr ion-arrow-graph-up-right"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="blue-bg indx">02</span></td>
                                    <td><div class="prj-tl"><h4>Totem app refactor</h4><span><i class="ion-ios-stopwatch"></i> Created: 22 June</span></div></td>
                                    <td><span class="prcnt">29%</span></td>
                                    <td><i class="blue-clr ion-arrow-graph-down-right"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="blue-bg indx">03</span></td>
                                    <td><div class="prj-tl"><h4>ReactJS implement</h4><span><i class="ion-ios-stopwatch"></i> Created: 15 June</span></div></td>
                                    <td><span class="prcnt">59%</span></td>
                                    <td><i class="green-clr ion-arrow-graph-up-right"></i></td>
                                </tr>
                                <tr>
                                    <td><span class="blue-bg indx">04</span></td>
                                    <td><div class="prj-tl"><h4>Release Totem v2.3</h4><span><i class="ion-ios-stopwatch"></i> Created: 09 June</span></div></td>
                                    <td><span class="prcnt">65%</span></td>
                                    <td><i class="green-clr ion-arrow-graph-up-right"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col m12 grid-item col s12 col l12">
                <div class="widget proj-order pad50-40">
                    <div class="wdgt-opt">
                        <span class="wdgt-opt-btn"><i class="ion-android-more-vertical"></i></span>
                        <div class="wdgt-opt-lst brd-rd5">
                            <a class="delt-wdgt" href="#" title="">Delete</a>
                            <a class="expnd-wdgt" href="#" title="">Expand</a>
                            <a class="refrsh-wdgt" href="#" title="">Refresh</a>
                        </div>
                    </div>
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <h4 class="widget-title">Projects Orders</h4>
                    <a class="add-proj brd-rd5" href="#" data-toggle="tooltip" title="Add Project" data-tooltip="Add Project">+</a>
                    <div class="slct-bx">
                        <i class="ion-android-funnel"> Sort By:</i>
                        <span>
                            <select>
                                <option>Date</option>
                                <option>Name</option>
                                <option>Category</option>
                                <option>Duration</option>
                            </select>
                        </span>
                    </div>
                    <div class="table-wrap">
                        <table class="table table-bordered style2">
                            <thead><tr><th>#</th><th>Date</th><th>Name</th><th>Phone No</th><th>Address</th><th>Action</th></tr></thead>
                            <tbody>
                                <tr>
                                    <td><span class="blue-bg indx">01</span></td>
                                    <td><span class="date">10 June 2017</span></td>
                                    <td><h4 class="name">Michael Baker</h4></td>
                                    <td><span class="ph#">076 9477 4896</span></td>
                                    <td><span class="addr">Some St. 77, LA</span></td>
                                    <td><div class="table-btns"><a href="#" title="" class="green-bg-hover">Accept</a><a href="#" title="" class="blue-bg-hover">Reject</a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="blue-bg indx">02</span></td>
                                    <td><span class="date">15 June 2017</span></td>
                                    <td><h4 class="name">Larisa Maskalyova</h4></td>
                                    <td><span class="ph#">0500 034548</span></td>
                                    <td><span class="addr">Another St. 456</span></td>
                                    <td><div class="table-btns"><a href="#" title="" class="green-bg-hover">Accept</a><a href="#" title="" class="blue-bg-hover">Reject</a></div></td>
                                </tr>
                                <tr>
                                    <td><span class="blue-bg indx">03</span></td>
                                    <td><span class="date">19 June 2017</span></td>
                                    <td><h4 class="name">Natasha Kim</h4></td>
                                    <td><span class="ph#">(01315) 27698</span></td>
                                    <td><span class="addr">294-318 Duis Ave</span></td>
                                    <td><div class="table-btns"><a href="#" title="" class="green-bg-hover">Accept</a><a href="#" title="" class="blue-bg-hover">Reject</a></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col m6 grid-item col s12 col l6">
                <div class="widget chat-wdgt pad50-40">
                    <div class="wdgt-opt">
                        <span class="wdgt-opt-btn"><i class="ion-android-more-vertical"></i></span>
                        <div class="wdgt-opt-lst brd-rd5">
                            <a class="delt-wdgt" href="#" title="">Delete</a>
                            <a class="expnd-wdgt" href="#" title="">Expand</a>
                            <a class="refrsh-wdgt" href="#" title="">Refresh</a>
                        </div>
                    </div>
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <h4 class="widget-title blue-bg">Live Chat</h4>
                    <div class="caht-wrp">
                        <div class="chat-lst">
                            <div class="chat-msg yur-msg">
                                <img class="brd-rd50" src="../assets/customAssets/images/resource/acti-thmb1.jpg" alt="" />
                                <div class="msg-inf2">
                                    <h5>John Doe</h5> <span class="msg-tm"><i class="ion-clock"></i> Today 2:10 pm</span>
                                    <p>Aenean massa. Cum sociis natoque penatibus et mag nis dis parturient montes, nascetur ridiculus mus. Do nec quam felis, ultricies nec.</p>
                                    <div class="snd-fl">
                                        <div class="fl-itm brd-rd5">
                                            <img class="brd-rd5" src="../assets/customAssets/images/resource/fl-img1.png" alt="" />
                                            <span>report-2013-web-development</span>
                                        </div>
                                    </div>
                                    <div class="act-pst-lk-stm">
                                        <a href="#" title="" class="brd-rd5 green-bg-hover">Save</a>
                                        <a href="#" title="" class="brd-rd5 blue-bg-hover">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-msg frnd-msg">
                                <img class="brd-rd50" src="../assets/customAssets/images/resource/acti-thmb2.jpg" alt="" />
                                <div class="msg-inf2">
                                    <h5>Kim Smith</h5> <span class="msg-tm"><i class="ion-clock"></i> Today 2:10 pm</span>
                                    <p>Aenean massa. Cum sociis natoque penatibus et mag nis dis parturient montes, nascetur ridiculus mus. Do nec quam felis, ultricies nec.</p>
                                </div>
                            </div>
                        </div>
                        <form class="chat-frm">
                            <textarea class="brd-rd5" placeholder="Message"></textarea>
                            <button class="brd-rd5 blue-bg">Send Message</button>
                            <ul class="snd-opts">
                                <li>
                                    <label class="fileContainer">
                                        <i class="ion-paperclip"></i>
                                        <input type="file" />
                                    </label>
                                </li>
                                <li>
                                    <label class="fileContainer">
                                        <i class="ion-android-camera"></i>
                                        <input type="file" />
                                    </label>
                                </li>
                                <li>
                                    <div class="snd-emjs brd-rd5">
                                        <a href="#" title=""><i class="ion-happy"></i></a>
                                        <div class="emj-lst brd-rd5">
                                            <a href="#" title=""><i class="ion-happy"></i></a>
                                            <a href="#" title=""><i class="ion-android-sad"></i></a>
                                            <a href="#" title=""><i class="ion-heart-broken"></i></a>
                                            <a href="#" title=""><i class="ion-icecream"></i></a>
                                            <a href="#" title=""><i class="ion-ios-americanfootball"></i></a>
                                            <a href="#" title=""><i class="ion-ios-baseball"></i></a>
                                            <a href="#" title=""><i class="ion-ios-bell"></i></a>
                                            <a href="#" title=""><i class="ion-ios-body"></i></a>
                                            <a href="#" title=""><i class="ion-ios-flame"></i></a>
                                            <a href="#" title=""><i class="ion-ios-flower"></i></a>
                                            <a href="#" title=""><i class="ion-ios-football"></i></a>
                                            <a href="#" title=""><i class="ion-ios-glasses"></i></a>
                                            <a href="#" title=""><i class="ion-ios-heart"></i></a>
                                            <a href="#" title=""><i class="ion-ios-lightbulb"></i></a>
                                            <a href="#" title=""><i class="ion-ios-location"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col m6 grid-item col s12 col l6">
                <div class="widget pad50-40">
                    <div class="wdgt-opt">
                        <span class="wdgt-opt-btn"><i class="ion-android-more-vertical"></i></span>
                        <div class="wdgt-opt-lst brd-rd5">
                            <a class="delt-wdgt" href="#" title="">Delete</a>
                            <a class="expnd-wdgt" href="#" title="">Expand</a>
                            <a class="refrsh-wdgt" href="#" title="">Refresh</a>
                        </div>
                    </div>
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <h4 class="widget-title">Activity <span class="green-bg badge">05 Messages</span></h4>
                    <div class="slct-bx">
                        <i>Added:</i>
                        <span>
                            <select>
                                <option>Any Date</option>
                                <option>15-9-2017</option>
                                <option>12-8-2017</option>
                                <option>08-7-2017</option>
                                <option>10-6-2017</option>
                            </select>
                        </span>
                    </div>
                    <div class="act-pst-lst">
                        <div class="act-pst">
                            <img class="brd-rd50" src="../assets/customAssets/images/resource/acti-thmb1.jpg" alt="" />
                            <div class="act-pst-inf">
                                <div class="act-pst-inr"><h5><a href="#" title="">Sadi Orlaf</a></h5> posted in <a href="#" title="">Material</a></div>
                                <span class="spnd-tm">5 Min Ago</span>
                                <div class="act-pst-dta">
                                    <p>That's awesome!</p>
                                </div>
                                <span class="pst-tm"><a href="#" title=""><i class="fa fa-trash-o"></i> Remove</a></span>
                                <div class="act-pst-lk-stm">
                                    <a class="brd-rd5 green-bg-hover" href="#" title=""><i class="ion-heart"></i> Love</a>
                                    <a class="brd-rd5 blue-bg-hover" href="#" title=""><i class="ion-thumbsup"></i> Like</a>
                                </div>
                            </div>
                        </div>
                        <div class="act-pst">
                            <img class="brd-rd50" src="../assets/customAssets/images/resource/acti-thmb2.jpg" alt="" />
                            <div class="act-pst-inf">
                                <div class="act-pst-inr"><h5><a href="#" title="">Overtunk</a></h5> posted in <a href="#" title="">New Blog</a></div>
                                <span class="spnd-tm">37 Min Ago</span>
                                <div class="act-pst-dta">
                                    <p>That's awesome!</p>
                                </div>
                                <span class="pst-tm"><a href="#" title=""><i class="fa fa-trash-o"></i> Remove</a></span>
                                <div class="act-pst-lk-stm">
                                    <a class="brd-rd5 green-bg-hover" href="#" title=""><i class="ion-heart"></i> Love</a>
                                    <a class="brd-rd5 blue-bg-hover" href="#" title=""><i class="ion-thumbsup"></i> Like</a>
                                </div>
                            </div>
                        </div>
                        <div class="act-pst">
                            <img class="brd-rd50" src="../assets/customAssets/images/resource/acti-thmb3.jpg" alt="" />
                            <div class="act-pst-inf">
                                <div class="act-pst-inr"><h5><a href="#" title="">Kim Smith</a></h5> add <a href="#" title="">1 photo</a></div>
                                <span class="spnd-tm">50 Min Ago</span>
                                <div class="act-pst-dta">
                                    <img src="../assets/customAssets/images/resource/act-pst-img1.jpg" alt="" />
                                </div>
                                <span class="pst-tm"><a href="#" title=""><i class="fa fa-trash-o"></i> Remove</a></span>
                                <div class="act-pst-lk-stm">
                                    <a class="brd-rd5 green-bg-hover" href="#" title=""><i class="ion-heart"></i> Love</a>
                                    <a class="brd-rd5 blue-bg-hover" href="#" title=""><i class="ion-thumbsup"></i> Like</a>
                                </div>
                            </div>
                        </div>
                        <div class="act-pst">
                            <img class="brd-rd50" src="../assets/customAssets/images/resource/acti-thmb4.jpg" alt="" />
                            <div class="act-pst-inf">
                                <div class="act-pst-inr"><h5><a href="#" title="">Chris Johnathan</a></h5> started following <h6><a href="#" title="">Monica Smith</a></h6> site.</div>
                                <span class="spnd-tm">1 Hour Ago</span>
                                <div class="act-pst-dta">
                                </div>
                                <span class="pst-tm"><a href="#" title=""><i class="fa fa-trash-o"></i> Remove</a></span>
                                <div class="act-pst-lk-stm">
                                    <a class="brd-rd5 green-bg-hover" href="#" title=""><i class="ion-heart"></i> Love</a>
                                    <a class="brd-rd5 blue-bg-hover" href="#" title=""><i class="ion-thumbsup"></i> Like</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- Activity Post List -->
                    <div class="vw-mr-act">
                        <a href="#" title="">View More Activity</a>
                    </div>
                </div>
            </div>
            <div class="col m12 grid-item col s12 col l12">
                <div class="totl-revnu widget pad50-40">
                    <div class="wdgt-opt">
                        <span class="wdgt-opt-btn"><i class="ion-android-more-vertical"></i></span>
                        <div class="wdgt-opt-lst brd-rd5">
                            <a class="delt-wdgt" href="#" title="">Delete</a>
                            <a class="expnd-wdgt" href="#" title="">Expand</a>
                            <a class="refrsh-wdgt" href="#" title="">Refresh</a>
                        </div>
                    </div>
                    <div class="wdgt-ldr">
                        <div class="ball-scale-multiple">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <h4 class="widget-title">Total Revenue</h4>
                    <div id="chart5"></div>
                </div>
            </div>
        </div><!-- Filter Items -->
    </div>
</div><!-- Panel Content -->
<footer>
  <p>Copyright <a href="#" title="">Aiplus Company</a> &amp; 2017 - 2018</p>
  <span>10GB of 250GB Free.</span>
</footer>
<!-- Vendor: Javascripts -->
<script src="../assets/customAssets/js/jquery.min.js" type="text/javascript"></script>
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
<script type="text/javascript">
$(document).ready(function () {
    'use strict';

    Highcharts.chart('chrt1', {
        colors: ['#dadada','#67ba5f'],
        chart: {
            type: 'area',
            backgroundColor: "#FFFFFF",
            borderColor: "#335cad"
        },
        legend: {
            enabled: false
        },
        title: {
            text: 'Active users in current month (December)',
            style: { "color": "#444444", "fontSize": "12px" }
        },
        xAxis: {
            categories: ['1', '2', '3', '4', '5', '6', '7']
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
        },      
        plotOptions: {
            area: {
                categories: ['1', '2', '3', '4', '5', '6', '7'],
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            data: [18,45,35,10,85,25,90]
        }, {
            data: [45,50,25,85,55,65,70]
        }]
    });

    Highcharts.chart('chrt2', {
        colors: ['#dadada','#f89898'],
        chart: {
            type: 'area',
            backgroundColor: "#FFFFFF",
            borderColor: "#335cad"
        },
        legend: {
            enabled: false
        },
        title: {
            style: {
                display: 'none'
            }
        },
        xAxis: {
            categories: ['1', '2', '3', '4', '5', '6', '7']
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
        },      
        plotOptions: {
            area: {
                categories: ['1', '2', '3', '4', '5', '6', '7'],
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            data: [18,45,35,10,85,25,90]
        }, {
            data: [45,50,25,85,55,65,70]
        }]
    });

    $('#chrt3').highcharts({
        colors: ['#dadada','#f89898'],
        chart: {
            type: 'area',
            backgroundColor: "#FFFFFF",
            borderColor: "#335cad"
        },
        legend: {
            enabled: false
        },
        title: {
            style: {
                display: 'none'
            }
        },
        xAxis: {
            categories: ['1', '2', '3', '4', '5', '6', '7']
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
        },      
        plotOptions: {
            area: {
                categories: ['1', '2', '3', '4', '5', '6', '7'],
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            data: [18,45,35,10,85,25,90]
        }, {
            data: [45,50,25,85,55,65,70]
        }]
    });

    $('#chrt4').highcharts({
        colors: ['#dadada','#f89898'],
        chart: {
            type: 'area',
            backgroundColor: "#FFFFFF",
            borderColor: "#335cad"
        },
        legend: {
            enabled: false
        },
        title: {
            style: {
                display: 'none'
            }
        },
        xAxis: {
            categories: ['1', '2', '3', '4', '5', '6', '7']
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name} produced <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
        },      
        plotOptions: {
            area: {
                categories: ['1', '2', '3', '4', '5', '6', '7'],
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            data: [18,45,35,10,85,25,90]
        }, {
            data: [45,50,25,85,55,65,70]
        }]
    });

    Highcharts.chart('chart5', {
        colors: ['#fc4b6c', '#26c6da', '#1e88e5'],
        chart: {type: 'column'},
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec']
        },
        title: {text: null},
        yAxis: {min: 0},
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        plotOptions: {
            column: {stacking: 'percent'}

        },
        legend: {
              align: 'right',
              verticalAlign: 'top',
              symbolRadius: 0,
              itemStyle: {
                color: '#555555',
                fontSize: '13px',
                fontWeight: '300'
            },
        },
        series: [{
              name: '2017',
              data: [500, 750, 1000, 1250, 1500, 1750, 2000, 2250, 1700, 2100, 900, 800,]
          }, {
              name: '2016',
              data: [1500, 1750, 2000, 2250, 500, 750, 1000, 1250, 1700, 2100, 900, 800,]
          }, {
              name: '2015',
              data: [1700, 2100, 900, 800, 500, 750, 1000, 1250, 1500, 1750, 2000, 2250,]
          }]
    });

    //===== ToolTip =====//
    if ($.isFunction($.fn.tooltip)) {
        $('[data-toggle="tooltip"]').tooltip();
    }
});
</script>
</body>
</html>