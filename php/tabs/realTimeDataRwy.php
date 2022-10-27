<?php
    $result = $conn->query($runway);
    if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>
            <input type='radio' name='tabs' id='tabRealTimeDataRWY<?php echo $row['priRwyId']; ?>'>
            <label for='tabRealTimeDataRWY<?php echo $row['priRwyId'] ?>'>Real Data RWY <?php echo $row['priRwyId'] . " / " . $row['secRwyId']; ?></label>
            
            <div class='tab'>
                <h1>prova3</h1>
                <img src="..\images\rwymet<?php echo $_POST['icaoSelect'] . "" . $row['priRwyId']. "" . $row['secRwyId'] ?>.png">
            </div>
<?php
        }
    }
?>