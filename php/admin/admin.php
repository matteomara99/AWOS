<?php
	include "conn\connection_open.php";
	include "sql\query.php";
?>

<body>
    <div>
        <span>Admin Page</span>
    </div>
    <table>
        <tr>
            <td>ICAO</td>
            <td>City</td>
            <td>Name</td>
            <td>Number runways</td>
            <td>Civil/Military</td>
        </tr>
        <?php
            $result = $conn->query($runway);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td> <?php echo $row["icaoCode"] ?> </td>
                    <td> <?php echo $row["city"] ?> </td>
                    <td> <?php echo $row["name"] ?> </td>
                    <td> <?php echo $row["numRwy"] ?> </td>
                    <td> <?php echo $row["typeAirport"] ?> </td>
                    <td> <img src="" name="modify" onclick=""> </td>
                    <td> <img src="" name="delete" onclick=""> </td>
                </tr>
        <?php
                }
            }
        ?>
    </table>
</body>

<?php
	include "conn\connection_close.php";
?>