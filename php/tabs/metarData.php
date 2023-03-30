<?php
    //inizio test
    $qnh = 1015;
    $temp = 23;
    $dp = 20;
    $perc_um = (($dp/$temp)*100);
    $ta = 60;
    $tl = 0;

    $visibility = 400;
    $dirPriRwy = 230;
    $spdPriRwy = 8;
    $gstPriRwy = 16;
    $dirSecRwy = 280;
    $spdSecRwy = 5;
    $gstSecRwy = 25;
    $rwy = 060;

    $rvrRwyPriVal = 1500;
    $rvrRwyCenVal = 1000;
    $rvrRwySecVal = 400;
    //fine test

    //QNH
    if($qnh >= 1013){
        $tl = $ta + 10;
        $colorQnh = "rgb(0,250,0);";
    }else if($qnh >= 995 && $qnh < 1013){
        $tl = $ta + 15;
        $colorQnh = "rgb(250,250,0)";
    }else if($qnh >= 977 && $qnh < 995){
        $tl = $ta + 20;
        $colorQnh = "rgb(250,250,0)";
    }else if($qnh < 977){
        $tl = $ta + 25;
        $color = "rgb(250,0,0)";
    }

    //Wind extremes
    $leftPriRwy = rand($dirPriRwy - 90, $dirPriRwy);
    $rightPriRwy = rand($dirPriRwy + 90, $dirPriRwy);
    $leftSecRwy = rand($dirSecRwy - 90, $dirSecRwy);
    $rightSecRwy = rand($dirSecRwy + 90, $dirSecRwy);

    if($leftPriRwy < 0){
        $leftPriRwy = $leftPriRwy + 360;
    }else if($leftPriRwy > 360){
        $leftPriRwy = $leftPriRwy - 360;
    }

    if($rightPriRwy < 0){
        $rightPriRwy = $rightPriRwy + 360;
    }else if($rightPriRwy > 360){
        $rightPriRwy = $rightPriRwy - 360;
    }

    if($leftSecRwy < 0){
        $leftSecRwy = $leftSecRwy + 360;
    }else if($leftSecRwy > 360){
        $leftSecRwy = $leftSecRwy - 360;
    }

    if($rightSecRwy < 0){
        $rightSecRwy = $rightSecRwy + 360;
    }else if($rightSecRwy > 360){
        $rightSecRwy = $rightSecRwy - 360;
    }

    //gusts
    $diffPriRwy = $gstPriRwy - $spdPriRwy;
    $diffSecRwy = $gstSecRwy - $spdSecRwy;

    $minGstPriRwy = round(rand(($gstPriRwy * (-20 / 100)) + $gstPriRwy, $gstPriRwy));
    $maxGstPriRwy = round(rand(($gstPriRwy * (20 / 100)) + $gstPriRwy, $gstPriRwy));

    //RVR
    if($visibility < 500){
        $rvrRwyPriVal = round(rand(($visibility * (50 / 100)) + $visibility, $visibility));
        $rvrRwyCenVal = round(rand(($visibility * (50 / 100)) + $visibility, $visibility));
        $rvrRwySecVal = round(rand(($visibility * (50 / 100)) + $visibility, $visibility));
    }

    if($rvrRwyPriVal > 1000){
        $colorRvrPriRwy = "rgb(0,250,0);";
    }else if($rvrRwyPriVal <= 1000 && $rvrRwyPriVal > 500){
        $colorRvrPriRwy = "rgb(250,250,0)";
    }else if($rvrRwyPriVal <= 500){
        $colorRvrPriRwy = "rgb(250,0,0)";
    }

    if($rvrRwyCenVal > 1000){
        $colorRvrCenRwy = "rgb(0,250,0);";
    }else if($rvrRwyCenVal <= 1000 && $rvrRwyCenVal > 500){
        $colorRvrCenRwy = "rgb(250,250,0)";
    }else if($rvrRwyCenVal <= 500){
        $colorRvrCenRwy = "rgb(250,0,0)";
    }

    if($rvrRwySecVal > 1000){
        $colorRvrSecRwy = "rgb(0,250,0);";
    }else if($rvrRwySecVal <= 1000 && $rvrRwySecVal > 500){
        $colorRvrSecRwy = "rgb(250,250,0)";
    }else if($rvrRwySecVal <= 500){
        $colorRvrSecRwy = "rgb(250,0,0)";
    }

    //cross & tail primary rwy
    $windAngle = $dirPriRwy - $rwy;
    $tailPriRwy = round($spdPriRwy * sin(deg2rad($windAngle)));
    $crossPriRwy = round(-$spdPriRwy * cos(deg2rad($windAngle)));
    
    //cross & tail secondary rwy
    $windAngle = $dirSecRwy - $rwy;
    $tailSecRwy = round($spdSecRwy * sin(deg2rad($windAngle)));
    $crossSecRwy = round(-$spdSecRwy * cos(deg2rad($windAngle)));
?>

<input type="radio" name="tabs" id="tabMetarData" checked="checked">
<label for="tabMetarData">Metar Data</label>

<div class="tab h-100">
    <div class="d-flex">
        <div class="w-100">
            <div class="w-100 h-35">
                <div class="d-flex text-center">
                    <div class="w-20 border-1sw p-5p">
                        <div class="m-auto w-60 text-center">
                            <div class="text-white fw-bold"><small>QNH</small></div>
                            <div class="bg-greybox m-20p fs-30p fw-bold" style="color:<?php echo $colorQnh ?>"><?php echo $qnh ?></div>
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
            <div class="bg-black w-100 h-10">
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
            <div class="h-55">
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
                                <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center"> <?php echo $dirPriRwy ?> </div> 
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center"> <?php echo $spdPriRwy ?> </div> 
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
                                    <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center"> <?php echo $leftPriRwy ?> </div>
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center"> <?php echo $rightPriRwy ?> </div>
                                    <div class="w-20">&nbsp</div>
                                </div>
                                <div class="d-flex w-50">
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center"> <?php echo $minGstPriRwy ?></div>
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center"> <?php echo $maxGstPriRwy ?></div>
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
                                <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center"> <?php echo $crossPriRwy ?> </div>
                                <div class="w-20">&nbsp</div>
                                <div class="w-20 bg-greybox text-green fw-bold fs-20p text-center"> <?php echo $tailPriRwy ?> </div>
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
                                    <div class="w-20 bg-greybox text-green fw-bold fs-25p text-center"> <?php echo $leftSecRwy ?> </div>
                                    <div class="w-20">&nbsp</div>
                                    <div class="w-20 bg-greybox text-green fw-bold fs-25p text-center"> <?php echo $rightSecRwy ?> </div>
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
                    <div class="m-auto w-100 border-1sw d-flex p-5p">
                        <div class="w-10">&nbsp</div>   
                        <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center" style="color:<?php echo $colorRvrPriRwy ?>"> <?php if($rvrRwyPri == 1){ echo $rvrRwyPriVal; } ?> </div>
                        <div class="w-10">&nbsp</div>
                        <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center" style="color:<?php echo $colorRvrCenRwy ?>"> <?php if($rvrRwyCen == 1){ echo $rvrRwyCenVal; } ?> </div>
                        <div class="w-10">&nbsp</div>
                        <div class="w-20 bg-greybox text-green fw-bold fs-30p text-center" style="color:<?php echo $colorRvrSecRwy ?>"> <?php if($rvrRwySec == 1){ echo $rvrRwySecVal; } ?> </div>
                        <div class="w-10">&nbsp</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>