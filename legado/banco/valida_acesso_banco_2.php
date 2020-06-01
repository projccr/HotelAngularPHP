<?php
$con=mysqli_connect("localhost","root","","legado");

//check connection
if (mysqli_connect_errno($con))
{
echo "Failed to connect to MySQL:" . mysqli_connect_error();
}


//Log para ver qual encondig
$name = 'log.txt';
$file = fopen($name, 'a');
fwrite($file, "Enconding atual de caracteres: " . $con->character_set_name() ."\n");
fclose($file);

$con->set_charset('utf8mb4');

//function getPosts() {
//$query = mysqli_query($con,"SELECT * FROM cliente");
//while($row = mysqli_fetch_array($query))
//    {
//        echo "<div class=\"blogsnippet\">";
//        echo "<h4>" . $row['Title'] . "</h4>" . $row['SubHeading'];
//        echo "</div>";
//    }
//}