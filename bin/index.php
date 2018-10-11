<html>
<head>
<title>Pronoxsis</title>
    
    
   
   <script type="text/javascript">
function selectFolder(e) 
{
    var theFiles = e.target.files;
    var relativePath = theFiles[0].webkitRelativePath;
    var folder = relativePath.split("/");
    alert(folder[0]);
}
</script>
     
</head>
<body>
        <input type="file" id="FileUpload" onchange="selectFolder(event)" webkitdirectory mozdirectory msdirectory odirectory directory multiple />
    </body>
</html>