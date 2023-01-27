<input type="radio" name="tabs" id="tabLastReports">
<label for="tabLastReports">Last Reports</label>

<div class="tab">
    <div>
    <?php
        $result = $conn->query($lastReports);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
    ?>
                <span class="text-white bold"><?php echo strtoupper($row["metar"]) ?></span><br>
    <?php
            }
        }
    ?>
    </div>
</div>