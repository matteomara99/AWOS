<?php
    $result = $conn->query($logo);
    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
            if($row['typeAirport'] == 0){
                $logo = "technosky.svg";
            }else{
                $logo = "logoAM.jpg";
            }
        }
    }
?>

<div class="d-flex fw-bold bg-white" style="height:20px; width:100%; font-size:15px; padding-left:5px;">AWOS MET Client</div>
<div class="d-flex bg-white" style="height:20px; width:100%; font-size:10px;">
    <div class="text-center menu" style="height:15px; width:35px;">Login</div>
    <div class="text-center menu" style="height:15px; width:35px;">Alarms</div>
    <div class="text-center menu" style="height:15px; width:35px;">Sound</div>
    <div class="text-center menu" style="height:15px; width:35px;">Help</div>
    <div class="text-center menu" style="height:15px; width:35px;">Lifts</div>
    <div class="text-center menu" style="height:15px; width:35px;">Exit</div>
</div>

<div style="height:50px; width:100%;" class="d-flex bg-white">
    <div class="w-20"><img src="../images/load.gif" style="height:50px;"><img src="..\images\<?php echo $logo ?>" style="height:35px; margin:5px;"/></div>
    <div class="fw-bold text-center" style="width:22%; font-size:20px; padding:10px;">AWOS MET - <?php echo $_POST["airport"] ?></div>
    <div class="d-flex text-center" style="width:30%;">
        <div style="width:17%;"></div>
        <div style="width:25%;">
            <div style="border:1px solid black; height:80%; margin:5%;">Tec. Alarms</div>
        </div>
        <div style="width:16%;"></div>
        <div style="width:25%;">
            <div style="border:1px solid black; height:80%; margin:5%;">Met. Alarms</div>
        </div>
        <div style="width:17%;"></div>
    </div>
</div>