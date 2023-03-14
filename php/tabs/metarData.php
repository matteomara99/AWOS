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
            <div class="w-100" style="background-color:green;">
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
                            <div class="m-auto w-27">
                                <div class="text-center text-white fw-bold"><small>VISIBILITY</small></div>
                                <div class="text-green bg-greybox m-5p w-100">1013</div>
                            </div>
                            <div class="w-5">&nbsp</div>
                            <div class="m-auto w-26">
                                <div class="text-center text-white fw-bold"><small>WX</small></div>
                                <div class="text-green bg-greybox m-5p w-100">FG</div>
                                <div class="text-green bg-greybox m-5p w-100">TSRA</div>
                                <div class="text-green bg-greybox m-5p w-100">SN</div>
                                <div class="text-green bg-greybox m-5p w-100">-RA</div>
                            </div>
                            <div class="w-5">&nbsp</div>
                            <div class="m-auto w-26">
                                <div class="text-center text-white fw-bold"><small>CLOUDS</small></div>
                                <div class="text-green bg-greybox m-5p w-100">OVC</div>
                                <div class="text-green bg-greybox m-5p w-100">BKN</div>
                                <div class="text-green bg-greybox m-5p w-100">SCT</div>
                                <div class="text-green bg-greybox m-5p w-100">FEW</div>
                            </div>
                            <div class="w-5">&nbsp</div>
                        </div>
                        <div class="w-90 m-auto">
                            <div class="text-center text-white fw-bold"><small>VISIBILITY</small></div>
                            <div class="text-green bg-greybox m-5p w-">1013</div>
                        </div>
                    </div>
                    <div class="w-1">&nbsp</div>
                    <div class="w-20 border-1sw p-5p">
                        <!-- Atis arr -->
                        <div class="w-100 p-5p">
                            <div class="text-center text-white fw-bold"><small>ATIS ARRIVAL</small></div>
                            <div class="fs-90p fw-bold text-white">C</div>
                            <div class="text-center text-white fw-bold"><small>10:20z</small></div>
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