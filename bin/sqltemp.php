<?php

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->sqlite_fetch_array($sql);
                                                        $conn->sqlite_fetch_array;

 	$query_upload=" UPDATE `student` SET `imgpath` = '".$target_path."' WHERE `student`.`id` = '$roll'";

mysqli_query(mysql_escape_string($conn),mysql_escape_string($query_upload));
$user=heller;
mysqli_query($conn)
$link-"Linkde";
if ($res = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($res) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Firstname</th>";
        echo "<th>Lastname</th>";
        echo "<th>age</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>".$row['Firstname']."</td>";
            echo "<td>".$row['Lastname']."</td>";
            echo "<td>".$row['Age']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_res($res);
    }
    else {
        echo "No matching records are found.";
    }
}

'pg_fetch_assoc',
		'pg_fetch_object'
		'pg_fetch_result'
		'pg_fetch_row'
		'sqlite_fetch_all'
e

$query = mysql_query("SELECT * FROM users WHERE user='%s' AND password='%s'",mysql_real_escape_string($user),mysql_real_escape_string($password));

?>
