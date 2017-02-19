<?php
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    include("include/function.php");
    include("module/product/product_function.php");
    connect_db();
    $module=empty($_GET['module'])?"":$_GET['module'];
    $action=empty($_GET['action'])?"":$_GET['action'];
    $_SESSION['error']=(empty($_SESSION['error']))?"":$_SESSION['error'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MOUMFERN SHOP</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="keywords" content="ขายเฟิร์น,ขายต้นไม้,เฟิร์น,ต้นไม้,ขายเฟิร์น จังหวัดเชียงใหม่,ขายเฟิร์น รับส่งทั่วประเทศ,ร้านขายเฟิร์น,มุมเฟิร์น ขายส่งเฟิร์น,ขายเฟิร์น ตลาดคำเที่ยง,ขายต้นไม้ ตลาดคำเที่ยง">
 <link rel="shortcut icon" href="images/icon/logomumfern.png" />
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="css/mystyle.css">
 <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
 <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
 <script src="js/jquery-1.11.3.min.js"></script>
 <script src="js/jquery-ui.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/sweetalert.min.js"></script>
 <script>
    function goback(){
        window.history.back();
    }   
 </script>
</head>
<body>
<?php 
    include_once("analyticstracking.php");
?>
<div class="header">
    <div class="container-fluid">
        <div class="col-md-3 col-sm-3 col-xs-3 logo"><a href="index.php">MUMFERN</a></div>
        <div class="col-md-3 col-sm-5 col-xs-9 col-md-offset-6 col-sm-offset-4">
<?php
            switch ($module) {
                case 'product': $header_menu1='';$header_menu2='header_menu_active';$header_menu3='';$header_menu4=''; break;
                case 'webblog': $header_menu1='';$header_menu2='';$header_menu3='header_menu_active';$header_menu4=''; break;
                case 'webboard': $header_menu1='';$header_menu2='';$header_menu3='';$header_menu4='header_menu_active'; break;
                default: $header_menu1='header_menu_active';$header_menu2='';$header_menu3='';$header_menu4=''; break;
            }
?>
            <!--<a href="index.php?module=webboard&action=webboard"><div class="header_menu_webboard <?php //echo $header_menu4; ?>">
                <h4>เว็บบอร์ด</h4>
            </div></a>
            <a href="index.php?module=webblog&action=list_webblog"><div class="header_menu_news <?php //echo $header_menu3; ?>">
                <h4>ข่าวสาร</h4>
            </div></a>-->
            <a href="index.php?module=product&action=list_product&menu=1&cate=1"><div class="header_menu_product <?php echo $header_menu2; ?>">
                <h4>สินค้า</h4>
            </div></a>
            <a href="index.php"><div class="header_menu_home <?php echo $header_menu1; ?>">
                <h4>หน้าหลัก</h4>
            </div></a>
            
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="col-md-8 col-md-offset-2 main">
<?php
        if(empty($module)){
            homepage();
        }else{
            get_module($module,$action);
        }
?>
    </div>
</div>
<div class="footer">
    <p align="right"><b>ติดต่อร้านมุมเฟิร์น</b></p>
    <p align="right">ตลาดคำเที่ยง ล็อค f208-f209 ตำบลป่าตัน อำเภอเมือง จังหวัดเชียงใหม่ 50300 โทร.081-8055024</p>    
</div>
<?php
    if($_SESSION['error']==1){
        $_SESSION['error']="";
?>
            <style>
                .footer{
                    position: absolute;
                    bottom:0;
                }
                .header_menu_active{
                    background-color: inherit;
                    color: #287000;
                    border:0px;
                }
            </style>
            <script>
                swal({
                  title: "ข้อมูลพิดพลาด",
                  text: "ไม่พบข้อมูลหน้าที่ร้องขอ",
                  type: "warning",
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "ตกลง",
                },
                function(){
                  window.history.back();
                });
                
            </script>
<?php

    }
?>
</body>
</html>