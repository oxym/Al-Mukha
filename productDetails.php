<?php include_once 'includes/header.php'; ?>
<div class="main-page-content">
   <?php
      $_SESSION['sid'] = $_GET['SID'];
      
      include 'includes/product.inc.php';
      
      $product = new Product($_GET['SID'], $_GET['Name']);      
      $coffeeDetails = $product->getCoffeeProductDetails();
      
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
   </form>
   <?php endforeach;?>
   <?php
      $storeTeas = $product->getTeaProductDetails();
      
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
   </form>
   <?php endforeach;
      if (isset($_SESSION['account_type'])) {
         if ($_SESSION['account_type'] == 'customer') {
            echo ' <form class="card" action="includes/purchase.inc.php" method=POST>
            <div class="purchase-section">';
            echo '<input value ="1" class="purchase-input" type="number" name="amount"/>';
            echo '<input type="hidden" name="sid" value ="'.$_GET['SID'].'" />';
            echo '<input type="hidden" name="name" value ="'.$_GET['Name'].'" />';
            echo '<button class="btn btn-success mr-1" type="submit" name="submit">Buy</button>
            </div> 
            </form>';
         }
      }
      ?>
   <div id="comments" class="card">
      <h4>Comments</h4>
      <div class="average-rating">
         <div>Average Rating</div>
            <?php
               $rating = $product->getAverageRating();
            ?>
         <div class="font-weight-bold">
            <?php echo round($rating[0], 2) ?>
         </div>

      </div>
   </div>
   <?php
      $comments = $product->getAllComments();
      foreach ($comments as $comment): 
         if (!empty($comment['Comment'])) {
      ?>
   <div class="card">
      <div class="row">
         <ul class="list-group col-md-12 mb-2">
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">User</div>
               <div id="commenterFirst" class="product-detail-row-value"><?=$comment['FirstName']?></div>
            </li>
            <li class="list-group-item">
               <div id="commentText"><?=$comment['Comment']?>
            </li>
            <li class="list-group-item product-detail-row"> 
               <div class="product-detail-row-title">Comment Time</div>
               <div id="commentTime" class="product-detail-row-value"><?=$comment['Comment_Time']?></div>
            </li>
         </ul>
      </div>
   </div>
   <?php }endforeach;?>
</div>
</body>
</html>