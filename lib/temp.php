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
    <button onClick='start(1)'>Frame1</button>
    <button onClick='start(2)'>Frame2</button>
    <button onClick='start(3)'>Frame3</button>
    <button onClick='start(4)'>Frame4</button>

<div class="container popUp" id='frame1' style="display:none">
  <h2>Responsive Embed Frame1</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kQ_A_Q24-hU"></iframe>
  </div>
</div>
<div class="container popUp"  style="display:none" id="frame2">
  <h2>Responsive Embed Frame12</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kQ_A_Q24-hU"></iframe>
  </div>
</div>
<div class="container popUp" style="display:none" id="frame3">
  <h2>Responsive Embed Frame13</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kQ_A_Q24-hU"></iframe>
  </div>
</div>
<div class="container popUp" style="display:none" id="frame4">
  <h2>Responsive Embed Frame14</h2>
  <p>Create a responsive video and scale it nicely to the parent element with an 16:9 aspect ratio</p>
  <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kQ_A_Q24-hU"></iframe>
  </div>
</div>
   

    <script>
     
    function start12(idVal)
        {
            var i=5;
            var size=5;
            for(i=1;i<size;i++)
                {
                    if(i==idVal)
                        {
                           document.getElementById('frame'+i).style.display='block';  
                            continue;
                        }
                    document.getElementById('frame'+i).style.display='none';
                }
          
        }
        function start(idVal)
        {
            var i=5;
            var size=5;
             var frameVal=document.getElementById('frame1');
            var height=frameVal.clientHeight;
            var width=frameVal.clientWidth;
            for(i=1;i<size;i++)
                {
                    if(i==idVal)
                        {
//                           document.getElementById('frame'+i).style.display='block'; 
                 document.getElementById('frame'+i).style.visibility = 'visible';
                 document.getElementById('frame'+i).style.opacity = '0';
                 document.getElementById('frame'+i).style.height = height + 'px';
                 document.getElementById('frame'+i).style.width = width + 'px';
                 document.getElementById('frame'+i).style.padding = '.5em';
                            
                        
                            continue;
                        }
//                 document.getElementById('frame'+i).style.display='none';
                 document.getElementById('frame'+i).style.visibility = 'hidden';
                 document.getElementById('frame'+i).style.opacity = '0';
                 document.getElementById('frame'+i).style.height = '0';
                 document.getElementById('frame'+i).style.width = '0';
                 document.getElementById('frame'+i).style.padding = '0';
                }
          
        }
    
    </script>
    <style>
    .popUp{
  background: black;
  color: white;
  padding: .5em;
  box-sizing: border-box;
  overflow: hidden;

  font-weight: bold;
  transition: height 1s, width 1s, padding 1s, visibility 1s, opacity 0.5s ease-out;
}
    
    
    </style>
</body>
</html>
