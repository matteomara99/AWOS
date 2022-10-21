<?php
	include "connection_open.php";
	include "query.php";
?>

    <body>
        <form action="awos.php" method="POST">
            <?php
                $result = $conn->query($airports);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                        <div>
                            <?php echo $row['icao'] ?>
                        </div>
                        <div>
                            <img src="..\images\<?php echo $row['icao'] ?>.jpg">
                        </div>
            <?php
                    }
                }
            ?>
        </form>
    </body>

<?php
	include 'connection_close.php';
?>