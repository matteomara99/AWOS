<input type="radio" name="tabs" id="tabMetarData" checked="checked">
<label for="tabMetarData">Metar Data</label>

<div class="tab">
    <div class="d-flex">
        
        <!-- left menu -->
        <div class="border-white" style="width:20%;">
            <div style="width:100%;">
                <div style="width:100%;">
                    <div style="text-align: center;"><small>PRESSURE</small></div>
                    <div style="background-color: black; color: green;">1013</div>
                </div>
                <div class="d-flex">
                    <div>°C</div>
                    <div>DP</div>
                    <div>%</div>
                </div>
            </div>
            <div class="d-flex" style="width:100%;">
                <!-- Atis Arr -->
                <div style="padding:5px; width:45%;">
                    <div style="color: yellow">C</div>
                    <div><small>10:20</small></div>
                </div>
                <div style="padding:5px; width:10%;">&nbsp</div>
                <!-- Atis Dep -->
                <div style="padding:5px; width:45%;">
                    <div style="color: yellow">C</div>
                    <div><small>10:20</small></div>
                </div>
            </div>
            <div>ATIS</div>
            <div>Dati ATIS</div>
        </div>

        <!--right menu -->
        <div class="border-white" style="width:80%;">
        <?php
            $result = $conn->query($runway);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>
            <div class="">RWY <?php echo $row["priRwyId"] . "/" . $row["secRwyId"] ?> </div>
        <?php
                }
            }
        ?>
        </div>
    </div>
</div>