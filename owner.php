<?php include 'includes/header.php'; ?>
<div class="main-page-content">
   <button class="btn btn-success mb-2" data-toggle="modal" data-target="#updateOwnerInfoModal">Update Owner</button>
   <button class="btn btn-success mb-2" data-toggle="modal" data-target="#addStore">Add Store</button>
   <?php 
      include 'includes/owner.inc.php';
      
      $owner = new Owner();   

      if ($_SESSION['account_type'] == "owner") {
         $stores = $owner->getOwnersStores($_SESSION['user_id']);     
      } else {
         $stores = $owner->getSalespersonStore($_SESSION['user_id']);
      }

      foreach($stores as $row):
      ?>
   <form class="card" action="includes/owner.inc.php" method="POST">
      <div class="card-title">
         <div id="productTitle">
            <?=$row['Name']?>
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
   <!-- Modal for profile update -->
   <div class="modal fade" id="updateOwnerInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Update Owner Account</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <ul class="list-group col-md-12 ml-2">
                     <li class="list-group-item">
                        <div class="product-detail-row-title">Company Name</div>
                        <input id="companyName" class="product-detail-row-value text-right" value="Best Coffee Shop"></input>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Save changes</button>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal for adding store -->
   <div class="modal fade" id="addStore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form class="modal-content" action="includes/owner.inc.php" method="POST">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add Store</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <ul class="list-group col-md-12 ml-2">
                     <li class="list-group-item">
                        <div class="product-detail-row-title">Name</div>
                        <input name="storeName" class="product-detail-row-value text-right"></input>
                     </li>
                     <li class="list-group-item">
                        <div class="product-detail-row-title">Description</div>
                        <input name="storeDescription" class="product-detail-row-value text-right"></input>
                     </li>
                     <li class="list-group-item">
                        <div class="product-detail-row-title">Opening Date</div>
                        <input name="storeOpeningDate" class="product-detail-row-value text-right"></input>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" name="addStore" class="btn btn-primary">Add Store</button>
            </div>
         </form>
      </div>
   </div>
</div>
</body>
</html>