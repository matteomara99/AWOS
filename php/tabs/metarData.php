<!--test-->
<?php
    $qnh = 1011;
    $temp = 23;
    $dp = 20;
    $perc_um = (($dp/$temp)*100);
    $ta = 60;
    $tl = 0;

    if($qnh >= 1013){
        $tl = $ta + 10;
    }else if($qnh >= 995 && $qnh < 1013){
        $tl = $ta + 15;
    }else if($qnh >= 977 && $qnh < 995){
        $tl = $ta + 20;
    }else if($qnh < 977){
        $tl = $ta + 25;
    }
?>

<input type="radio" name="tabs" id="tabMetarData" checked="checked">
<label for="tabMetarData">Metar Data</label>

<div class="tab">
    <div class="d-flex">
        <div class="w-100">
            <div class="w-100" style="border-top:1px solid white; background-color:green;">
                <div class="d-flex text-center p-5p">
                    <div class="w-20 border-1sw p-5p">
                        <div class="m-auto w-50">
                            <div class="text-center text-white fw-bold"><small>QNH</small></div>
                            <div class="text-yellow bg-greybox m-20p fs-30p fw-bold"><?php echo $qnh ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="w-40 m-auto">
                                <div class="text-center text-white fw-bold"><small>Air Temp (°C)</small></div>
                                <div class="text-green bg-greybox w-70 m-auto fs-20p fw-bold"><?php echo $temp ?></div>
                            </div>
                            <div class="w-40 m-auto">
                                <div class="text-center text-white fw-bold"><small>Dew Point (°C)</small></div>
                                <div class="text-green bg-greybox w-70 m-auto fs-20p fw-bold"><?php echo $dp ?></div>
                            </div>
                        </div>
                        <div class="div-center">
                            <div class="text-center text-white fw-bold"><small>TL</small></div>
                            <div class="text-green bg-greybox m-20p fs-20p fw-bold"><?php echo $tl ?></div>
                        </div>
                    </div>
                    <div class="w-1">&nbsp</div>
                    <div class="w-58 border-1sw p-5p">
                        <div class="d-flex">
                            <div class="w-5">&nbsp</div>
                            <div class="m-auto w-27 fw-bold text-center">
                                <div class="text-white m-5p w-100"><small>VISIBILITY</small></div>
                                <div class="text-green bg-greybox m-5p w-100 div-center fs-30p" style="height:50px">>10KM</div>
                            </div>
                            <div class="w-5">&nbsp</div>
                            <div class="m-auto w-26 fw-bold text-center">
                                <div class="text-white m-5p w-100"><small>WX</small></div>
                                <div class="text-green bg-greybox m-5p w-100">FG</div>
                                <div class="text-green bg-greybox m-5p w-100">TSRA</div>
                                <div class="text-green bg-greybox m-5p w-100">SN</div>
                                <div class="text-green bg-greybox m-5p w-100">-RA</div>
                            </div>
                            <div class="w-5">&nbsp</div>
                            <div class="m-auto w-26 fw-bold text-center">
                                <div class="text-white m-5p w-100"><small>CLOUDS</small></div>
                                <div class="text-green bg-greybox m-5p w-100">OVC</div>
                                <div class="text-green bg-greybox m-5p w-100">BKN</div>
                                <div class="text-green bg-greybox m-5p w-100">SCT</div>
                                <div class="text-green bg-greybox m-5p w-100">FEW</div>
                            </div>
                            <div class="w-5">&nbsp</div>
                        </div>
                        <div class="m-5p w-90 m-auto fw-bold">
                            <div class="text-center text-white"><small>SUPPLEMENTARY INFO/TREND</small></div>
                            <div class="text-green bg-greybox">NOSIG</div>
                        </div>
                    </div>
                    <div class="w-1">&nbsp</div>
                    <div class="w-20 border-1sw p-5p">
                        <!-- Atis arr -->
                        <div class="w-100 p-5p text-center text-white fw-bold"">
                            <div class=""><small>ATIS DEP/ARR</small></div>
                            <div class="fs-90p">C</div>
                            <div class=""><small>10:20z</small></div>
                        </div>
                        <!-- Atis Dep -->
                        <!--
                        <div class="w-100 p-5p">
                            <div class="text-center"><small>ATIS DEPARTURE</small></div>
                            <div class="fs-30p fw-bold text-white">C</div>
                            <div class="text-center text-white fw-bold"><small>10:20z</small></div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
            <!-- runway datas-->
            <div class="w-100" style="background-color:black;">
                <div class="d-flex text-center p-5p">
                <?php
                    $result = $conn->query($runway);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                ?>
                            <div class="w-10">
                                <button class="buttonRwy" name="primary<?php echo $row["priRwyId"] ?>"><?php echo "RWY " . $row["priRwyId"] ?></button>
                            </div>
                            <div class="w-2">&nbsp</div>
                            <div class="w-76" style="background-color:grey">RWY</div>
                            <div class="w-2">&nbsp</div>
                            <div class="w-10">
                                <button class="buttonRwy" name="secondary<?php echo $row["secRwyId"] ?>"><?php echo "RWY " . $row["secRwyId"] ?></button>
                            </div>
                <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
        <!--
        <div class="border-white w-0">
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
        -->
    </div>
</div>