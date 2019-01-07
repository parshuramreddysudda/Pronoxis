
<?php
    
  session_start(); 
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
//Checking is seesion is hod or not 

  if (!isset($_SESSION['username'])||$_SESSION['username']!='Hod') 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";
$conn = new mysqli($servername, $username, $password, $dbname);
    
               

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
    
$imagename="16d41a05j6".$ext; 

	$target_path = "images/".$imagename;
    
if(move_uploaded_file($temp_name, $target_path)) 
{
    


 	$query_upload=" UPDATE `student` SET `imgpath` = '".$target_path."' WHERE `student`.`id` = '15d41a05j6'";    
        
	mysqli_query($conn,$query_upload);
    if ($conn->query($query_upload) == TRUE){
        echo "New record created successfully";
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

////////Image upload PHP code ends here ////////

?>


<!DOCTYPE html>
