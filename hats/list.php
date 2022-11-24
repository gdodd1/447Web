<?php
    require("header.php");

    displayHats();

    require("footer.php");

//----------------------------------------
function displayHats() {

    echo <<<HTMLBLOCK
    <table>
        <tr>
            <th>Color</th>
            <th>Size</th>
            <th>Type</th>
        </tr>
HTMLBLOCK;
    require('credentials.php');
    $db = mysqli_connect($hostname, $username, $password, $database);
    if(mysqli_connect_errno()){
        die('Unable to connect to database ' . mysqli_connect_error());
    }

    $hats = mysqli_query($db, 'Select color, size, type from Hats order by id');
    if(!$hats){
        die('Query failed: ' . mysqli_connect_error());
    }

    while($row = mysqli_fetch_array($hats)){

        if($background++ %2 == 0){
            echo "  <tr style=\"background-color:white\">\n";
        } else {
            echo "  <tr style=\"background-color:lightgrey\">\n";
        }
        echo <<<TABLEDATA
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
        </tr>

TABLEDATA;
    }
    echo "  </table>\n</div>\n";

    mysqli_close();
}
 
?>
