<!--test-->

<?php
    $qnh = 1015;
    $temp = 23;
    $dp = 20;
    $perc_um = (($dp/$temp)*100);
    $ta = 60;
    $tl = 0;

    $wind = 60;
    $speed = 10;
    $rwy = 67;

    if($qnh >= 1013){
        $tl = $ta + 10;
        $color = "rgb(0,250,0);";
    }else if($qnh >= 995 && $qnh < 1013){
        $tl = $ta + 15;
        $color = "rgb(250,250,0)";
    }else if($qnh >= 977 && $qnh < 995){
        $tl = $ta + 20;
        $color = "rgb(250,250,0)";
    }else if($qnh < 977){
        $tl = $ta + 25;
        $color = "red";
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
                        <div class="m-auto w-60 text-center">
                            <div class="text-white fw-bold"><small>QNH</small></div>
                            <div class="bg-greybox m-20p fs-30p fw-bold" style="color:<?php echo $color ?>"><?php echo $qnh ?></div>
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
                                <div class="text-green bg-greybox m-5p w-100">+TSRA</div>
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
                        <div class="w-100 p-5p text-center text-white fw-bold">
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
            <!-- runway display -->
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
            <!-- runway thr and vis datas -->
            <div>
                <!-- wind direction and velocity -->
                <div class="d-flex">
                    <!-- priRwy datas -->
                    <div class="m-auto w-50 border-1sw">
                        <div class="w-100">&nbsp</div>
                        <div class="d-flex">
                            <div class="w-20">&nbsp</div>   
                            <div class="w-20 bg-greybox text-green fw-bold fs-15p text-center">A</div> 
                            <div class="w-20">&nbsp</div>   
                            <div class="w-20 bg-greybox text-green fw-bold fs-15p text-center">B</div> 
                            <div class="w-20">&nbsp</div>   
                        </div>
                        <div class="w-100">&nbsp</div>
                        <div class="d-flex">
                            <div class="d-flex w-50">
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-15p text-center">C1</div>
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-15p text-center">C2</div>
                                <div class="w-20">&nbsp</div>
                            </div>
                            <div class="d-flex w-50">
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-15p text-center">C3</div>
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-15p text-center">C4</div>
                                <div class="w-20">&nbsp</div>
                            </div>
                        </div>
                        <div class="w-100">&nbsp</div>
                        <div class="d-flex w-100">
                            <div class="w-20">&nbsp</div>
                            <div class="w-20 bg-greybox text-green fw-bold fs-15p text-center">D1</div>
                            <div class="w-20">&nbsp</div>
                            <div class="w-20 bg-greybox text-green fw-bold fs-15p text-center">D2</div>
                            <div class="w-20">&nbsp</div>
                        </div>
                        <div class="w-100">&nbsp</div>
                    </div>
                    <!-- secRwy datas -->
                    <div class="m-auto w-50 border-1sw">
                        <div class="d-flex">
                            <div>A</div>
                            <div>B</div>
                        </div>
                        <div class="d-flex">
                            <div>C1</div>
                            <div>C2</div>
                            <div>D1</div>
                            <div>D2</div>
                        </div>
                        <div class="d-flex">
                            <div>E</div>
                            <div>F</div>
                        </div>
                    </div>
                </div>
                <!-- rvr -->
                <div class="m-auto w-100 border-1sw d-flex p-10p">
                    <div class="w-10">&nbsp</div>   
                    <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center">1500</div>
                    <div class="w-10">&nbsp</div>
                    <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center">1500</div>
                    <div class="w-10">&nbsp</div>
                    <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center">1500</div>
                    <div class="w-10">&nbsp</div>
                </div>
            </div>
        </div>
    </div>
</div>