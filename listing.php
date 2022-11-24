<?php
    require('header.php');
    displayList();
    require('footer.php');

// ------------------------------------------------

function displayList()
{
echo <<<HTMLBLOCK
    <table>
        <tr>
            <th>NAME</th>
            <th>PRODUCTION YEARS</th>
            <th>RANGE</th>
        </tr>
HTMLBLOCK;
    require('credentials.php');
    $db = mysqli_connect($hostname, $username, $password, $database);
    if(mysqli_connect_errno()){
        die('Unable to connect to database ' . mysqli_connect_error());
    }

    $cars = mysqli_query($db, 'Select name, productionYears, miles from cars order by productionYears');
    if(!$cars){
        die('Query failed: ' . mysqli_connect_error());
    }

    while($row = mysqli_fetch_array($cars)){
        $name = $row[0];
        $prodYear = $row[1];
        $range = $row[2];

        if($background++ %2 == 0){
            echo "  <tr style=\"background-color:white\">\n";
        } else {
            echo "  <tr style=\"background-color:lightgrey\">\n";
        }
        echo <<<TABLEDATA
            <td>$name</td>
            <td>$prodYear</td>
            <td>$range</td>
        </tr>

TABLEDATA;
    }
    echo "  </table>\n";

    mysqli_close();
}

?>
