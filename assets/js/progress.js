document.addEventListener("DOMContentLoaded", function() {
  
  var progress-barCustom = document.querySelectorAll(".progress-bar");
  var time = 1500;
  

  progress-barCustom.forEach(function(i) {
    let label = i.children[0];
    let line = i.children[1];
    let count = 0;
    let dataCount = label.getAttribute("data-count");
    let lineCount = line.children[0];
 
    let runTime = time/dataCount;
    
    let animationLineCount = setInterval(function(){
      if(count < dataCount){
        count++;
        label.innerHTML = count + '%';
        lineCount.style.width = count + '%';
      }
    },runTime);
  });
});