<?php include_once 'includes/header.php'; ?>
<h4 class="mr-4 ml-4 mt-2">Promotions</h4>

<div class="promotions mr-4 ml-4 mt-2">

   <?php
   require_once("includes/promotion.inc.php");
   $promotion = new Promotion();
   $rows = $promotion->all();
   foreach($rows as $row):
   ?>

   <div class="promotion-card card w-50">
      <div class="row">
         <ul class="list-group col-md-6">
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Store Name</div>
               <div id="storeName" class="product-detail-row-value"><?=$row['Name']?></div>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Percent Off</div>
               <div class="product-detail-row-value"><?=$row['Percent_Off']?>%</div>
            </li>
         </ul>
         <ul class="list-group col-md-6">
         	<li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Promo</div>
               <div id="storeName" class="product-detail-row-value"><?=$row['Promo_Code']?></div>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">End</div>
               <div class="product-detail-row-value"><?=$row['End_Date']?></div>
            </li>
            <li class="list-group-item">
               <?php 
               echo '<a href="products.php?SID='.$row['SID'].'">Check Out</a>';?>
            </li>
         </ul>
      </div>
   </div>
   <?php
   endforeach;?>
</div>

<div class="main-page-content">
   <?php 
      include 'includes/homePage.inc.php';
      
      $owner = new HomePage();		
      $stores = $owner->getAllStores();
      
      foreach($stores as $row):
      ?>
   <div class="card">
      <div class="row card-content">
         <ul class="list-group col-md-12 mb-5">
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Store Name</div>
               <div id="storeName" class="product-detail-row-value"><?=$row['Name']?></div>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Store Description</div>
               <div class="product-detail-row-value"><?=$row['Description']?></div>
            </li>
         </ul>
         <div class="card-content more-info-store-owner">
            <a class="btn btn-success" href="products.php?SID=<?=$row['SID']?>">View Products</a>
         </div>
      </div>
   </div>
   <?php endforeach;?>
</div>
</body>
</html>