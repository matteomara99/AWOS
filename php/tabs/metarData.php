<!--test-->
<?php 
    $temp = 23;
    $dp = 20;
    $perc_um = (($dp/$temp)*100);
?>

<input type="radio" name="tabs" id="tabMetarData" checked="checked">
<label for="tabMetarData">Metar Data</label>

<div class="tab">
    <div class="d-flex">
        
        <!-- left menu -->
        <div class="border-white w-20">
            <div class="w-100">
                <div class="w-100">
                    <div class="text-center"><small>PRESSURE</small></div>
                    <div class="text-green bg-greybox m-30p">1013</div>
                </div>
                <div class="d-flex w-100">
                    <div>
                        <div><small>°C</small></div>
                        <div class="text-green bg-greybox"><?php echo $temp ?></div>
                    </div>
                    <div>
                        <div><small>DP</small></div>
                        <div class="text-green bg-greybox"><?php echo $dp ?></div>
                    </div>
                    <div>
                        <div><small>%</small></div>
                        <div class="text-green bg-greybox"><?php echo $perc_um ?></div>
                    </div>
                </div>
            </div>
            <div class="d-flex w-100">
                <!-- Atis Arr -->
                <div class="w-45 p-5p">
                    <div class="text-yellow">C</div>
                    <div><small>10:20z</small></div>
                </div>
                <div class="w-10 p-5p">&nbsp</div>
                <!-- Atis Dep -->
                <div class="w-45 p-5p">
                    <div class="text-yellow">C</div>
                    <div><small>10:20z</small></div>
                </div>
            </div>
            <div>ATIS</div>
            <div>Dati ATIS</div>
        </div>

        <!--right menu -->
        <div class="border-white w-80">
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