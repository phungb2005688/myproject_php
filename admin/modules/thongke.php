<?php
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    include("../config/connect.php");
    require("../../carbon/autoload.php");

    if(isset($_POST['thoigian'])){
        $thoigian = $_POST['thoigian'];
    } else{
        $thoigian = '';
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }
    
    if($thoigian == '7ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    } else if($thoigian == '28ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(28)->toDateString();
    } else if($thoigian == '90ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(90)->toDateString();
    } else if($thoigian == '365ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    }

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $sql = "SELECT * FROM thongke WHERE ngaydat BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC";
    $sql_query = mysqli_query($mysqli, $sql);

    while($val = mysqli_fetch_array($sql_query)){
        $chart_data[] = array(
            'date' => $val['ngaydat'],
            'order' => $val['donhang'],
            'sales' => $val['doanhthu'],
            'quantity' => $val['soluongban']
        );
    }
    // print_r($chart_data); 
    echo $data = json_encode($chart_data);
?>