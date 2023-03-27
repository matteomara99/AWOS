<!--test-->

<?php
    $qnh = 1015;
    $temp = 23;
    $dp = 20;
    $perc_um = (($dp/$temp)*100);
    $ta = 60;
    $tl = 0;

    $direction = 45;
    $speed = 10;
    $rwy = 60;

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

    /*
    $windAngle = $direction - $rwy;

    echo "<br>direction: ". $direction;
    echo "<br>rwy: ". $rwy;
    echo "<br>angle: ". $windAngle;

    $tail = $speed * sin(deg2rad($windAngle));
    $cross = -$speed * cos(deg2rad($windAngle));

    echo "<br>tail: " . $tail;
    echo "<br>cross: " . $cross;*/
?>

<!-- test end -->

<input type="radio" name="tabs" id="tabMetarData" checked="checked">
<label for="tabMetarData">Metar Data</label>

<div class="tab">
    <div class="d-flex">
        <div class="w-100">
            <div class="w-100">
                <div class="d-flex text-center">
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
                            <?php if($atis == 1){ ?>
                                <div class=""><small>ATIS DEP/ARR</small></div>
                                <div class="fs-90p">C</div>
                                <div class=""><small>10:20z</small></div>
                            <?php } ?>
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
            <div class="bg-black w-100">
                <div class="d-flex text-center p-5p">
                <?php
                    $result = $conn->query($runway);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                ?>
                            <div class="w-10">
                                <button type="button" onclick="rwyOcc()" class="buttonRwy" name="primary<?php echo $row["priRwyId"] ?>"><?php echo "RWY " . $row["priRwyId"] ?></button>
                            </div>
                            <div class="w-2">&nbsp</div>
                            <div id="runway" class="w-76" style="background-color:grey">RWY</div>
                            <div class="w-2">&nbsp</div>
                            <div class="w-10">
                                <button type="button" onclick="rwyOcc()" class="buttonRwy" name="secondary<?php echo $row["secRwyId"] ?>"><?php echo "RWY " . $row["secRwyId"] ?></button>
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
                    <div class="m-auto w-50 border-1sw" style="height: 230px;">
                        <?php if($windPriRwy == 1){ ?>
                            <div class="w-100 h-5">&nbsp</div>
                            <div class="d-flex">
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 text-white fw-bold text-center"><small>DIR(°)</small></div> 
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 text-white fw-bold text-center"><small>SPEED (kt)</small></div> 
                                <div class="w-20">&nbsp</div>   
                            </div>
                            <div class="d-flex h-20">
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center">360</div> 
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center">05</div> 
                                <div class="w-20">&nbsp</div>   
                            </div>
                            <div class="w-100 h-5">&nbsp</div>
                            <div class="d-flex">
                                <div class="d-flex w-50">
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-60 text-white fw-bold text-center"><small>Extremes (°)</small></div>
                                    <div class="w-20">&nbsp</div>
                                </div>
                                <div class="d-flex w-50">
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-60 text-white fw-bold text-center"><small>Min (Kt)</small></div>
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-60 text-white fw-bold text-center"><small>Max (Kt)</small></div>
                                    <div class="w-20">&nbsp</div>
                                </div>
                            </div>
                            <div class="d-flex h-15">
                                <div class="d-flex w-50">
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center">350</div>
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center">080</div>
                                    <div class="w-20">&nbsp</div>
                                </div>
                                <div class="d-flex w-50">
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center">17</div>
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center">14</div>
                                    <div class="w-20">&nbsp</div>
                                </div>
                            </div>
                            <div class="w-100 h-5">&nbsp</div>
                            <div class="d-flex w-100">
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 text-white fw-bold text-center"><small>Cross (Kt)</small></div>
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 text-white fw-bold text-center"><small>Tail (Kt)</small></div>
                                <div class="w-20">&nbsp</div>
                            </div>
                            <div class="d-flex w-100 h-15">
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center">CROSS</div>
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center">TAIL</div>
                                <div class="w-20">&nbsp</div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- priRwy datas end -->
                    <!-- secRwy datas -->
                    <div class="m-auto w-50 border-1sw" style="height: 230px;">
                        <?php if($windSecRwy == 1){ ?>
                            <div class="w-100 h-5">&nbsp</div>
                            <div class="d-flex">
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 text-white fw-bold text-center"><small>DIR(°)</small></div> 
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 text-white fw-bold text-center"><small>SPEED (kt)</small></div> 
                                <div class="w-20">&nbsp</div>   
                            </div>
                            <div class="d-flex h-20">
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-35p text-center">360</div> 
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-35p text-center">05</div> 
                                <div class="w-20">&nbsp</div>   
                            </div>
                            <div class="w-100 h-5">&nbsp</div>
                            <div class="d-flex">
                                <div class="d-flex w-50">
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-60 text-white fw-bold text-center"><small>Extremes (°)</small></div>
                                    <div class="w-20">&nbsp</div>
                                </div>
                                <div class="d-flex w-50">
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-60 text-white fw-bold text-center"><small>Min (Kt)</small></div>
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-60 text-white fw-bold text-center"><small>Max (Kt)</small></div>
                                    <div class="w-20">&nbsp</div>
                                </div>
                            </div>
                            <div class="d-flex h-15">
                                <div class="d-flex w-50">
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-25p text-center">350</div>
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-25p text-center">080</div>
                                    <div class="w-20">&nbsp</div>
                                </div>
                                <div class="d-flex w-50">
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-25p text-center">17</div>
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-25p text-center">14</div>
                                    <div class="w-20">&nbsp</div>
                                </div>
                            </div>
                            <div class="w-100 h-5">&nbsp</div>
                            <div class="d-flex w-100">
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 text-white fw-bold text-center"><small>Cross (Kt)</small></div>
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 text-white fw-bold text-center"><small>Tail (Kt)</small></div>
                                <div class="w-20">&nbsp</div>
                            </div>
                            <div class="d-flex w-100 h-15">
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-25p text-center">CROSS</div>
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-25p text-center">TAIL</div>
                                <div class="w-20">&nbsp</div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- secRwu datas end -->
                </div>
                <!-- rvr -->
                <div class="m-auto w-100 border-1sw p-10p">
                    <div class="w-100 text-center fw-bold text-white"><small>RVR(m)</small></div>
                    <div class="m-auto w-100 border-1sw d-flex p-10p">
                        <div class="w-10">&nbsp</div>   
                        <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center"> <?php if($rvrRwyPri == 1){ echo "1500"; } ?> </div>
                        <div class="w-10">&nbsp</div>
                        <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center"> <?php if($rvrRwyCen == 1){ echo "1500"; } ?> </div>
                        <div class="w-10">&nbsp</div>
                        <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center"> <?php if($rvrRwySec == 1){ echo "1500"; } ?> </div>
                        <div class="w-10">&nbsp</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>