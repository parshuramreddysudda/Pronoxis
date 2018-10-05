
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
$file=$_GET['filename'];
system("rm escapeshellarg($file)");
?>