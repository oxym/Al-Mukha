<?php include_once 'includes/header.php'; 
if (!isset($_SESSION['user_id'])) {
   Header("Location: 404.php");
   exit();
} else {
   if ($_SESSION['account_type'] != 'admin') {
      Header("Location: 404.php");
   exit();
   }
}
?>
<div class="main-page-content">

   <?php 
      include 'includes/homePage.inc.php';
     
      $owner = new HomePage();		
      $stores = $owner->getAllStores();

      foreach($stores as $row):
      ?>
   <form class="card" action="includes/owner.inc.php" method="POST">
      <div class="card-title">
         <div id="productTitle">
            <?=$row['Name']?>
         </div>
         <div>
         	Store ID <?=$row['SID']?>
         </div>
      </div>
      <div class="row card-content">
         <ul class="list-group col-md-6">
            <li class="list-group-item">
               <div class="product-detail-row-title">Description</div>
               <input id="description" class="product-detail-row-value text-right" value="<?=$row['Description']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Opening Date</div>
               <input id="expiryDateVal" class="product-detail-row-value text-right" value="<?=$row['Opening_Date']?>"></input>
            </li>
         </ul>
      </div>
      <div class="row card-content product-save-delete">
         <a class="btn btn-success mr-1" href="ownerStoresProducts.php?SID=<?=$row['SID']?>">View Products</a>
         <input type="hidden" name="storeID" value="<?=$row['SID']?>">
         <button type="submit" class="btn btn-danger mr-1" name="deleteStore">Delete</button>
         <button type="button" class="btn btn-success">Save</button>
      </div>
   </form>
   <?php endforeach;?>

</div>
</body>
</html>