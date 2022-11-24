<?php
    require("header.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        processForm();
    } else {
        displayForm();
    }

    require("footer.php");

//----------------------------------------
function displayForm() {

    echo <<<HTMLFORM
	<p style="text-align: left;"><a href="index.html">Back</a></p>

	<form method="POST" action="add.php">
	    <label for="color">Hat color:</label>
	    <input type="input" name="color" required><br>
	    <label for="size">Hat size:</label>
	    <input type="input" name="size" required><br>
	    <label for="type">Hat type:</label>
	    <input type="input" name="type" required><p>
	    <input type="submit" value="Add Hat">
	</form>
HTMLFORM;

}

//----------------------------------------
function processForm() {

    // ADD YOUR CODE HERE
    // -----------------------
    // Connect to the database
    // Run your query
    // Display (echo) a status message. For example "OK" or "Error"
    // Display a link back to index.html
    // Disconnect (close) the database connection

    require('credentials.php');
    $db = mysqli_connect($hostname, $username, $password, $database);
    if(mysqli_connect_errno()){
        die('Unable to connect to database ' . mysqli_connect_error());
    }

    $color = $_POST['color'];
    $size = $_POST['size'];
    $type = $_POST['type'];
    
    $query = "Insert into Hats (color, size, type) values ('$color', '$size', '$type')";

    if(mysqli_query($db, $query)){
        echo "<h1>Record inserted successfully</h1>\n<br>\n<a href='index.html'><p>back</p></a>\n";
    }
    if($db->errno){
        echo "<h1>Record could not be inserted</h1>";
    }
    mysqli_close();
}
 
?>
