<?php 
include_once 'includes/header.php';


function showProduct($rows) {
	foreach($rows as $row):?>
	<div class="promotion-card card w-50">
      <div class="row">
         <ul class="list-group col-md-6">
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Store Name</div>
               <div id="storeName" class="product-detail-row-value"><?=$row['store_name']?></div>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Product Name</div>
               <div class="product-detail-row-value"><?=$row['product_name']?></div>
            </li>
         </ul>
         <ul class="list-group col-md-6">
         	<li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Price</div>
               <div id="storeName" class="product-detail-row-value"><?=$row['price']?></div>
            </li>
            <li class="list-group-item">
               <?php echo '<a href="productDetails.php?SID='.$row['store_id'].'&Name='.$row['product_name'].'">View Product Details</a>';?>
            </li>
         </ul>
      </div>
   </div>
	<?php endforeach;

}

function showStore($rows) {
	foreach($rows as $row):?>
	<div class="promotion-card card w-50">
      <div class="row">
         <ul class="list-group col-md-6">
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Store Name</div>
               <div id="storeName" class="product-detail-row-value"><?=$row['store_name']?></div>
            </li>
          </ul>
          <ul>
          	<li class="list-group-item">
               <?php echo '<a href="products.php?SID='.$row['store_id'].'">View Store Details</a>';?>
            </li>      	
          </ul>
      </div>
   </div>
	<?php endforeach;

}

function showOwner($rows) {
	foreach($rows as $row):?>
	<div class="promotion-card card w-50">
      <div class="row">
         <ul class="list-group col-md-6">
         	<li class="list-group-item">
               <div class="product-detail-row-title">Owner</div>
               <div class="product-detail-row-value"><?=$row['first_name']?> <?=$row['last_name']?></div>
            </li>
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Store Name</div>
               <div id="storeName" class="product-detail-row-value"><?=$row['store_name']?></div>
            </li>
         </ul>
         <ul class="list-group col-md-6">
         	<li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Company Name</div>
               <div id="storeName" class="product-detail-row-value"><?=$row['company_name']?></div>
            </li>
            <li class="list-group-item">
               <?php echo '<a href="products.php?SID='.$row['store_id'].'">View Store Details</a>';?>
            </li>
         </ul>
      </div>
   </div>
	<?php endforeach;

}

$like = $_GET['like'];
$searchType = $_GET['searchType'];
$result;
switch($searchType) {
			case 'product':
				include_once 'includes/product.inc.php';
				$product = new Product();
				$result = $product->search($like);
				showProduct($result);
				break;
			case 'store':
				include_once 'includes/store.inc.php';
				$store = new Store();
				$result = $store->search($like);
				showStore($result);
				break;
			case 'owner':
				include_once 'includes/owner.inc.php';
				$owner = new Owner();
				$result = $owner->search($like);
				showOwner($result);
				break;
			default:
				Header("Location: 404.php");
				exit();			
}
?>







</body>
</html>
