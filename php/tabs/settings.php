<input type="radio" name="tabs" id="tabSettings">
<label for="tabSettings">Settings</label>

<div class="tab">
    <div class="border-1sw">    
        <div></div>
        <div>
            <?php
                $result = $conn->query($runway);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
            ?>
                        <div class="d-flex text-center h-10" style="background-color:grey">
                            <div class="w-10">
                                <?php echo "RWY " . $row["priRwyId"] ?>
                            </div>
                            <div class="w-2">&nbsp</div>
                            <div id="runway" class="w-76">RWY</div>
                            <div class="w-2" >&nbsp</div>
                            <div class="w-10">
                                <?php echo "RWY " . $row["secRwyId"] ?>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
        <div class="d-flex">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>