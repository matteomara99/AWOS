<input type='radio' name='tabs' id='tabMetarData' checked='checked'>
<label for='tabMetarData'>Metar Data</label>

<div class='tab'>
    <div class="d-flex">
        <div style="width:20%;" class="border-white">A</div>
        <div class="border-white" style="width:80%;">
        <?php
            $result = $conn->query($runway);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
            <div class="">RWY <?php echo $row['priRwyId'] . "/" . $row['secRwyId'] ?>
                <div>A</div>
            </div>
        <?php
                }
            }
        ?>
        </div>
    </div>
</div>