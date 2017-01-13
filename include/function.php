<?php
function connect_db(){
	$_SESSION['connect_db']=mysqli_connect("localhost","root","","mumfern") or die($_SESSION['connect_db']);
	mysqli_query($_SESSION['connect_db'],"SET NAMES utf8");
}
function get_module($module,$action){
	include("module/$module/index.php");
}
function homepage(){
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner images_slide" role="listbox">
    <div class="item images_slide active">
      <img src="images/slide/20141013_113536.jpg" style="width:100%;height:100%;">
      <div class="carousel-caption">
        <!--ข้อความ-->
      </div>
    </div>
    <div class="item images_slide">
      <img src="images/slide/20160625_164133.jpg" style="width:100%;height:100%;">
      <div class="carousel-caption">
        <!--ข้อความ-->
      </div>
    </div>
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
<div class="container-fluid">
	<center>
		<h3>MOUMFERN SHOP</h3><h4>(ร้านมุมเฟิร์น)</h4>
		<p>ร้านมุมเฟิร์น เป็นร้านค้าขายต้นไม้ประเภทเฟิร์น เราจะขายสินค้าประเภทเฟิร์นเป็นหลัก ซึ่งมีหลายประเภท และร้านเรายังนำ</p>
		<p>กระถางมาขายซึ่งมีหลากหลายรูปแบบให้เลือก ให้เหมาะสมกับเฟิร์นที่ทางร้านขาย</p>
	</center>
</div>
<?php	
}
?>