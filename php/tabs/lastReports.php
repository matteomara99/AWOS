<input type='radio' name='tabs' id='tabLastReports'>
<label for='tabLastReports'>Last Reports</label>

<div class='tab'>
    <div>
    <?php
        $result = $conn->query($runway);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
    ?>
                <span><?php echo $row['report'] ?></span>
    <?php
            }
        }
    ?>
    </div>
</div>