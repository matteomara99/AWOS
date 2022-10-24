<?php
	include "connection_open.php";
	include "query.php";
?>

    <body>
        <form action="awos.php" name="icaoSelect" method="POST">
            <?php
                $i = 0;
                $result = $conn->query($airports);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($i < 3) {
            ?>
                            <div>
                                <?php echo $i . " - " . $row['icaoCode'] ?>
                            </div>
                            <div>
                                <img src="..\images\<?php echo $row['icaoCode'] ?>.jpg">
                            </div>
            <?php
                            $i = $i + 1;
                        }
                        $i = 0;
                    }
                }
            ?>
        </form>
    </body>

<?php
	include 'connection_close.php';
?>