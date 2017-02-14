<?php
function connect_db(){
	$_SESSION['connect_db']=mysqli_connect("localhost","root","","mumfern") or die(mysqli_error($_SESSION['connect_db']));
	mysqli_query($_SESSION['connect_db'],"SET NAMES utf8");
}
function get_module($module,$action){
	if($module=="product"||$module=="webblog"||$module=="webboard"){
		include("module/$module/index.php");
	}else{
		$_SESSION['error']=1;
	}
}
function homepage(){
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
<?php
    $query_slide=mysqli_query($_SESSION['connect_db'],"SELECT * FROM slide ")or die("ERROR : backend slide line 29");;
    $row=mysqli_num_rows($query_slide);
    for($i=0;$i<$row;$i++){
        $active = ($i==0)?"class='active'":"";
    	echo "<li data-target='#carousel-example-generic' data-slide-to='$i' $active></li>";
    }
?>
  </ol>
  <div class="carousel-inner images_slide" role="listbox" style="margin:0px;">
<?php
    $number=0;
    while(list($slide_id,$slide_image,$header_slide,$slide_detail)=mysqli_fetch_row($query_slide)){
    	$active= ($number==0)?"active":"";
	    echo "<div class='item images_slide $active'>";
        	$header_slide = (!empty($header_slide))?$header_slide:"";
            $path =(empty($slide_image))?"icon/no-images.jpg":"slide/$slide_image";
            echo "<img src='images/$path' style='width:100%;height:100%' alt='...'>";
            echo "<div class='carousel-caption'>";
                echo "<h4 style='font-size:36px;'>$header_slide</h4><p>$slide_detail</p>";
            echo "</div>";
        echo "</div>";
        $number++;
    }
?>
  </div>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container-fluid home_intro">
	<center>
		<h3><b>MUMFERN SHOP</h3><h4>(ร้านมุมเฟิร์น)</b></h4>
		<p>ร้านมุมเฟิร์น เป็นร้านค้าขายต้นไม้ประเภทเฟิร์น เราจะขายสินค้าประเภทเฟิร์นเป็นหลัก ซึ่งมีหลายประเภท </p>
		<p>และร้านเรายังนำกระถางมาขายซึ่งมีหลากหลายรูปแบบให้เลือก ให้เหมาะสมกับเฟิร์นที่ทางร้านขาย</p>
	</center>
	<br>
</div>
<div class="container-fluid">
	<div class="col-md-12"><p class="header_listprov2"><b><font size='3'>สินค้ามาใหม่</font></b></p></div>
<?php
	$query_newpro = mysqli_query($_SESSION['connect_db'],"SELECT product.product_id,product.product_name,type.type_name_eng,product_image.product_image FROM product LEFT JOIN type ON product.product_type =type.product_type LEFT JOIN product_image ON product.product_id = product_image.product_id GROUP BY product_image.product_id ORDER BY product.product_id DESC LIMIT 0,4 ")or die(mysqli_error($_SESSION['connect_db']));
	$number=1;
	while (list($product_id,$product_name,$type_name_eng,$product_image)=mysqli_fetch_row($query_newpro)){
		$hiddenxs = ($number==4)?"hidden-xs":"col-xs-4";
		echo "<a href='index.php?module=product&action=product_detail&product_id=$product_id' style='text-decoration: none;'><div class='col-md-3 col-sm-3 $hiddenxs'>";
			echo "<div class='border_img'>";
				$path= (empty($product_image))?"icon/no-images.jpg":"$type_name_eng/$product_image";
				echo "<img src='images/$path'>";
				echo "<br><br><p align='center'>$product_name</p>";
			echo "</div>";
		echo "</div></a>";
		$number++;
	}
?>
</div>
<div class="container-fluid home_content">
	<div class="container-fluid">
		<div class="col-md-5 col-sm-5">
			<div class="home_showimg1"></div>
		</div>
		<div class="col-md-7 col-sm-7 hidden-xs">
			<p>ร้านมุมเฟิร์น เป็นร้านขายต้นไม้ประเภทเฟิร์น และขายกระถางหลากหลายรูปแบบ ร้านมุมเฟิร์นตั้งอยู่ที่ ตลาดคำเที่ยง จังหวัดเชียงใหม่ ร้านมุมเฟิร์นได้เปิดเป็นร้านขายเฟิร์นมาได้ 8 ปี โดยเริ่มจากกการขายเฟิร์น และเพิ่มการขายกระถางในเวลาต่อมา ภายในร้านมีเฟิร์นหลากหลายประเภทให้เลือกซื้อ เลือกหากันมากมาย</p>
		</div>
	</div>
	<div class="container-fluid">
		<div class="col-md-7 col-sm-7">
			<p>ทางร้านมุมเฟิร์นทำการขายทั้งขายปลีก และขายส่งเฟิร์นกับกระถางให้กับลูกค้าทั้งหน้าร้านที่ตลาดคำเที่ยงแล้ว ก็ยังมีบริการรับส่งสินค้าทั่วประเทศตามรายการสั่งซื้อ ซึ่งลูกค้าสามารถเยี่ยมชมสินค้าของร้านได้ในเว็บไซต์ หากท่านสนใจสินค้าใด ก็สามารถติดต่อสอบถามสินค้าตามที่อยู่ด้านล่างค่ะ และหากลูกค้าท่านใดมีขอสอบถามหรืออยากได้ความรู้เพิ่มเติมสามารถเข้าไปอ่านในหน้าบทความของเว็บไซต์ หรือฝากคำถามไว้ในกระทู้เพิ่มเติมได้ค่ะ</p>
		</div>
		<div class="col-md-5 col-sm-5 hidden-xs">
			<div class="home_showimg2"></div>
		</div>
	</div>
</div>
<?php	
}
function check_product($product_id_check){
	$product_new = array();		
	$product_sale = array();
	$product_best = array();
	$quality_sellstatus = mysqli_query($_SESSION['connect_db'],"SELECT sellproduct_status FROM web_page")or die(mysqli_error($_SESSION['connect_db']));
    list($sellstatus)=mysqli_fetch_row($quality_sellstatus);
    $status_product=0;
	$query_recom_new =mysqli_query($_SESSION['connect_db'],"SELECT product.product_id,product.product_name,type.type_name_eng FROM product LEFT JOIN type ON product.product_type =type.product_type ORDER BY product.product_id DESC LIMIT 0,4 ")or die(mysqli_error($_SESSION['connect_db']));
    while(list($product_id,$product_name,$type_name_eng)=mysqli_fetch_row($query_recom_new)){
      	$status_product = ($product_id==$product_id_check)?1:$status_product;
    }
    if($sellstatus==1){
	    $query_recom_sale =mysqli_query($_SESSION['connect_db'],"SELECT product.product_id,product.product_name,type.type_name_eng FROM product LEFT JOIN type ON product.product_type =type.product_type LEFT JOIN product_size ON product.product_id = product_size.product_id WHERE product_size.product_sprice_web !=0 GROUP BY product_name")or die(mysqli_error($_SESSION['connect_db']));
	    while(list($product_id,$product_name,$type_name_eng)=mysqli_fetch_row($query_recom_sale)){
	        $status_product = ($product_id==$product_id_check)?2:$status_product;
	    }
	    $query_recom_sale =mysqli_query($_SESSION['connect_db'],"SELECT product.product_id,product.product_name,type.type_name_eng,order_detail.product_id FROM product LEFT JOIN type ON product.product_type =type.product_type LEFT JOIN order_detail ON order_detail.product_id = product.product_id GROUP BY  order_detail.product_id ORDER BY COUNT(order_detail.product_id) DESC  LIMIT 0,4 ")or die(mysqli_error($_SESSION['connect_db']));
	    while(list($product_id,$product_name,$type_name_eng)=mysqli_fetch_row($query_recom_sale)){
	        $status_product = ($product_id==$product_id_check)?3:$status_product;
	    }
    }
	return $status_product;
}
?>