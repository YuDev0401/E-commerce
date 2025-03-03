﻿<?php
   include_once('./includes/headerNav.php')
?>
<!-- Header End====================================================================== -->
<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
		  <div class="item active">
		  <div class="container">
			<img style="width:100%; height:315px" src="images/carousel/1ii.png" alt=""/>
				<div class="carousel-caption">
				
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container">
			<img style="width:100% ; height:315px;cursor:pointer" src="images/carousel/2i.png" alt=""/>
				<div class="carousel-caption">
				
				</div>
		  </div>
		  </div>
		  <div class="item">
		  <div class="container">
			<img style="width:100% ; height:315px;cusrsor:pointer" src="images/carousel/3i.png" alt=""/>
			<div class="carousel-caption">
				
				</div>
			
		  </div>
		  </div>
		   <div class="item">
		   <div class="container">
			<img style="width:100% ; height:315px;cusrsor:pointer" src="images/carousel/4i.png" alt=""/>
			<div class="carousel-caption">
				
				</div>
		   
		  </div>
		  </div>
		   <div class="item">
		   <div class="container">
			<img style="width:100% ; height:315px;cusrsor:pointer" src="images/carousel/5i.png" alt=""/>
			<div class="carousel-caption">
				
			</div>
		  </div>
		  </div>
		   <div class="item">
		   <div class="container">
			<img style="width:100% ; height:315px;cusrsor:pointer" src="images/carousel/6i.png" alt=""/>
			<div class="carousel-caption">
				
				</div>
		  </div>
		  </div>
		</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div> 
</div>
<div id="mainBody">
	<div class="container">
	<div class="row">

<!-- Sidebar ================================================== -->
	<div id="sidebar">
		<!-- <div class="well well-small"><a id="myCart" href="product_summary.php"><img src="images/ico-cart.png" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div> -->
		<ul style="margin-top:77px">
			<li class="electronic-menu"><a class='electronics'> ELECTRONICS</a>
				<ul class="product-menu">
				<li><a href="search.php?catag=laptop"><i class=""></i>Laptop</a></li>
				<li><a href="search.php?catag=mobile"><i class=""></i>Mobile</a></li>
				<li><a href="search.php?catag=mouse"><i class=""></i>Mouse</a></li>
				<li><a href="search.php?catag=keyboard"><i class=""></i>keyboard</a></li>
				</ul>
			</li>
		</ul>
	</div>
<!-- Sidebar end=============================================== -->
	
<div class="dynamic-data-container">
	<h3 class="latest-h">Latest Post</h3>
    
<?php
//this will dynamically fetch data from a database and show all the post from mysql
//and this will auto create product div as per no of post available in database
include "includes/config.php";
/* define how much data to show in a page from database*/
$limit = 8;
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}
//define from which row to start extracting data from database
$offset = ($page - 1) * $limit;

$product_left = array();

$sql10 = "SELECT * FROM products ORDER BY products.product_id DESC LIMIT {$offset},{$limit}";
$result10 = $conn->query($sql10);
if ($result10->num_rows > 0) {
// output data of each row
while($row10 = $result10->fetch_assoc()) {
?>

<a href="product.php?id=<?php echo $row10['product_id']?>"> <div class="product">
	<img class='image' src="admin/upload/<?php echo $row10['product_img'] ?>"  alt="product-img">
	<div class="detail-cont">
	<h5 class="title"><?php echo $row10['product_title'] ?> <p class="date"><?php echo $row10['product_date'] ?></p> </h5>
	<p class="description"><?php echo $row10['product_desc'] ?> 
	<p class="price"><b>Rs.<?php echo $row10['product_price'] ?></b><br><span class="discount"><strike>5000</strike> -8%</span></p>

	</div>
</div></a>



<?php }}else { echo "No Results Found"; }
             $conn->close(); 
             ?>


</div>


<!--Pagination-->
<div class="pag-cont">
<?php
                include "includes/config.php"; 
               // Pagination btn using php with active effects 

                $sql1 = "SELECT * FROM products";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_products = mysqli_num_rows($result1);
                  $total_page = ceil($total_products / $limit);

                  echo "<div class='pagination'>";
          
                  for($i=1; $i<=$total_page; $i++){

                    //important this is for active effects that denote in which page you are in current position
                    if($page==$i){
                      $active = "active";
                    }else{
                      $active = "";
                    }

                        echo "<a href='index.php?page={$i}' class='{$active}'>".$i."</a>";
                  }
            
                }
                echo "</div>";
                  ?>
	
</div>

<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="./js/jquery.js" type="text/javascript"></script>
	<script src="./js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./js/electricshop.js"></script>
	<script src="./js/main.js"></script>

</body>
</html>