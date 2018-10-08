

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