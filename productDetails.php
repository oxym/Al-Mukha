<?php include_once 'includes/header.php'; ?>
<div class="main-page-content">
   <?php
      $_SESSION['sid'] = $_GET['SID'];
      
      include 'includes/product.inc.php';
      
      $product = new Product();      
      $coffeeDetails = $product->getCoffeeProductDetails($_GET['SID'], $_GET['Name']);
      
      foreach($coffeeDetails as $row):
      ?>


   <form class="card" action="includes/owner.inc.php" method="POST">
      <div class="card-title">
         <div id="productTitle">
            <div id="productType"><?=$row['Product_Type']?></div>
            <?= $row['Name']?>
         </div>
         <div id="productPrice" class="col-md-4"><?= $row['Price']?></div>
      </div>
      <div class="row card-content">
         <ul class="list-group col-md-6">
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Stock</div>
               <input class="product-detail-row-value text-right" value="<?= $row['Stock']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Origin</div>
               <input class="product-detail-row-value text-right" value="<?=$row['Origin']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Expiry Date</div>
               <input class="product-detail-row-value text-right" value="<?=$row['Expiry_Date']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Shelve Date</div>
               <input class="product-detail-row-value text-right" value="<?=$row['Shelving_Date']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Salesperson</div>
               <input class="product-detail-row-value text-right" value="John Doe"></input>
            </li>
         </ul>
         <ul class="list-group col-md-6">
            <li id="beanType" class="list-group-item">
               <div class="product-detail-row-title">Bean Type</div>
               <input class="product-detail-row-value text-right" value="<?=$row['Bean_Type']?>"></input>
            </li>
            <li id="roastType" class="list-group-item">
               <div class="product-detail-row-title">Roast Type</div>
               <input class="product-detail-row-value text-right" value="<?=$row['Roast_Type']?>"></input>
            </li>
            <li id="roastDate" class="list-group-item">
               <div class="product-detail-row-title">Roast Date</div>
               <input class="product-detail-row-value text-right" value="<?=$row['Roast_Date']?>"></input>
            </li>
         </ul>
      </div>
      <div class="row card-content product-save-delete">
         <input type="hidden" name="nameVal" value="<?= $row['Name']?>">
         <button type="submit" class="btn btn-danger mr-1" name="deleteProduct">Delete</button>
         <button type="button" class="btn btn-success">Save</button>
      </div>
   </form>
   <?php endforeach;?>


   <?php
      $storeTeas = $product->getTeaProductDetails($_GET['SID'], $_GET['Name']);
      
      foreach($storeTeas as $row):
      ?>
   <form class="card" class="card" action="includes/owner.inc.php" method="POST">
      <div class="card-title">
         <div id="productTitle">
            <div><?=$row['Product_Type']?></div>
            <?= $row['Name']?>
         </div>
         <div class="col-md-4"><?= $row['Price']?></div>
      </div>
      <div class="row card-content">
         <ul class="list-group col-md-6">
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Stock</div>
               <input class="product-detail-row-value text-right" value="<?= $row['Stock']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Origin</div>
               <input class="product-detail-row-value text-right" value="<?=$row['Origin']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Expiry Date</div>
               <input i class="product-detail-row-value text-right" value="<?=$row['Expiry_Date']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Shelve Date</div>
               <input i class="product-detail-row-value text-right" value="<?=$row['Shelving_Date']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Salesperson</div>
               <input id="salesperson" class="product-detail-row-value text-right" value="John Doe"></input>
            </li>
         </ul>
         <ul class="list-group col-md-6">
            <li id="teaType" class="list-group-item">
               <div class="product-detail-row-title">Tea Type</div>
               <input class="product-detail-row-value text-right" value="<?=$row['Tea_Type']?>"></input> 
            </li>
            <li id="teaGrade" class="list-group-item">
               <div class="product-detail-row-title">Tea Grade</div>
               <input class="product-detail-row-value text-right" value="<?=$row['Grade']?>"></input>
            </li>
         </ul>
      </div>
      <div class="row card-content product-save-delete">
         <input type="hidden" name="nameVal" value="<?= $row['Name']?>">
         <button type="submit" class="btn btn-danger mr-1" name="deleteProduct">Delete</button>
         <button type="button" class="btn btn-success">Save</button>
      </div>
   </form>
   <?php endforeach;?>


   <div id="comments" class="card">
      <h4>Comments</h4>
   </div>
</div>
</body>
</html>