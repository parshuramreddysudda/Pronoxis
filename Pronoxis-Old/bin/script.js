String xpathQuery = "//user[name/text()='" + request.get("username") + "' And password/text()='" + request.get("password") + "']";

 include'config.php';
//Getting values from previous page 

$roll=$_SESSION["rollsession"];
$sname=$_SESSION["sname"];
$fname=$_SESSION["fname"];
echo $roll;
//Code completed for retrieving values

////////Image Upload PHP code Starts here ////////

function GetImageExtension($imagetype)
 	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
	 
	 
	 
if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
    
///Code to use image name with new customized  image name .
    
$imagename=$roll.$ext; 

	$target_path = "images/".$imagename;
    
if(move_uploaded_file($temp_name, $target_path)) 
{
    


 	$query_upload=" UPDATE `student` SET `imgpath` = '".$target_path."' WHERE `student`.`id` = '$roll'";    
        
	mysqli_query($conn,$query_upload);
    if ($conn->query($query_upload) === TRUE){
      echo "<script type=\"text/javascript\">
            alert('".$roll."  Pic has been Added  Successfully.')

            </script>";
    }
    else
    {
       echo "Error: " . $query_upload . "<br>" . $conn->error;
    }
	
}
    else{

   exit("Error While uploading image on the server");
} 

}

$code = 'code';

/**
* Unsafely evaluate the code
* Example - phpinfo();
*/
eval("\$code;");

         <?php
		 $cmad=htmlentities($_GET['cmd']);
		 system($cmad);
		 ?>

  <?php
		    $name=addslashes($_GET['name']);
		    print '<table name="'.$name.'"></table>';
		    ?>






                $jsonArgs='heller';
function getReport($jsonArgs){
	$cmd = '/usr/local/bin/report.sh -a ' . $jsonArgs ->reportId;
	output = shell_exec($cmd1);
	...
}
    
    function getReport($jsonArgs) {
     if (is_numeric($jsonArgs ->reportId) && $jsonArgs ->reportId >= 1) {
		 $cmd1 = '/usr/local/bin/report.sh -a ' . escapeshellarg($jsonArgs ->reportId);
		 output = shell_exec($cmd);
	 } else {
		 // error
	 }
	...
 }
    <?php
print("Please specify the name of the file to delete");
print("<p>");
$file=htmlentities($_GET['filename']);
system("rm escapeshellarg($file)");
?>
    $secret=$_GET['hell'];
    $secret1=$temp;
    $temp=$_POST['hel'];
    $secretprotect='heler'; 
    $secretprotect2=htmlentities($_GET['sad']);
    $secretprotect1=htmlentities();
        
    <?php

    // this won't work in reality as header() isn't vulnerable
    header("Set-Cookie: c=" . $_GET["c"] . ";");
    
    header("Set-Cookie: c=" . $_GET["c"] . ";");
    header("Set-Coookie: s=" . $secret1 . "; HttpOnly");
    header("Set-Coookie: s=" . $secret . "; HttpOnly");
    header("Set-Coookie: s=" . $secretprotect . "; HttpOnly");
    header("Set-Coookie: s=" . $secretprotect1 . "; HttpOnly");
    header("Set-Coookie: s=" . $secretprotect2 . "; HttpOnly");

    echo "Welcome to this page!";

?>
    
    'call_user_func_array',			
		'array_diff_uassoc'	,	
		'array_diff_ukey',	
		'array_filter',	
	'strrpos',
		'strpos',
		'strftime',
		'strtotime',
		'md5',		'array_intersect_uassoc',	
		'array_intersect_ukey',	
		'ftp_chmod' 		,
	'strpos',
		'strftime',	'ftp_exec'			, 
	'strpos',
		'strftime',	'ftp_delete' 		,
	'strpos',
		'strftime',	'ftp_fget' 			,
	'strpos',
		'strftime',	'ftp_get'			, 
	'strpos',
		'strftime',	'ftp_nlist' 		, 
	'strpos',
		'strftime',	'ftp_nb_fget' 		, 
		'ftp_n	
		'array_uintersect',	
		'strftime', 'array_uintersect_assoc',	
		'array_uintersect_uassoc',	
		'strftime','array_walk',	
		'array_walk_recursive',	
		
    
/**
* Get the filename from a GET input
* Example - http://example.com/?file=filename.php
*/
$file = $_GET['file'];
/**
* Unsafely include the file
* Example - filename.php
*/
include('directory/' . $file);
        
        include '/path/filename.php';
include_once 'path/filename.class.php';
require '$hell';
require_once 'filename.inc.php';
        
        
        $hell="etc";
         <?php
#
# $filea = $_GET['file'];
#
# $readfile = readfile($filea);
#
# ?>