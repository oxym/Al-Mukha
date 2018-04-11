<?php include 'includes/header.php'; 

if (!isset($_SESSION['user_id'])) {
   Header("Location: 404.php");
   exit();
} else {
   if ($_SESSION['account_type'] != 'owner') {
      Header("Location: 404.php");
   exit();
   }
}
?>
<div class="main-page-content">
   <button class="btn btn-success mb-2" data-toggle="modal" data-target="#updateOwnerInfoModal">Update Store Name</button>
   <button class="btn btn-success mb-2" data-toggle="modal" data-target="#addNewProduct">Add Product</button>
   <button class="btn btn-success mb-2" data-toggle="modal" data-target="#addPromotion">Add Promotion</button>

   <?php
      $_SESSION['sid'] = $_GET['SID'];
      
      include 'includes/owner.inc.php';
      
      $owner = new Owner();      
      $storeCoffees = $owner->getStoreCoffees($_GET['SID']);
      
      foreach($storeCoffees as $row):
      ?>
   <form class="card" action="includes/owner.inc.php" method="POST">
      <div class="card-title">
         <div id="productTitle">
            <div id="productType"><?=$row['Product_Type']?></div>
            <?= $row['Name']?>
         </div>
         <input name="priceVal" class="col-md-4" value="<?= $row['Price']?>"></input>
      </div>
      <div class="row card-content">
         <ul class="list-group col-md-6">
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Stock</div>
               <input name="stockVal" class="product-detail-row-value text-right" value="<?= $row['Stock']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Origin</div>
               <input name="originVal" class="product-detail-row-value text-right" value="<?=$row['Origin']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Expiry Date</div>
               <input name="expiryDateVal" class="product-detail-row-value text-right" value="<?=$row['Expiry_Date']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Shelve Date</div>
               <input name="shelveDateVal" class="product-detail-row-value text-right" value="<?=$row['Shelving_Date']?>"></input>
            </li>
         </ul>
         <ul class="list-group col-md-6">
            <li id="beanType" class="list-group-item">
               <div class="product-detail-row-title">Bean Type</div>
               <input name="beanTypeVal" class="product-detail-row-value text-right" value="<?=$row['Bean_Type']?>"></input>
            </li>
            <li id="roastType" class="list-group-item">
               <div class="product-detail-row-title">Roast Type</div>
               <input name="roastTypeVal" class="product-detail-row-value text-right" value="<?=$row['Roast_Type']?>"></input>
            </li>
            <li id="roastDate" class="list-group-item">
               <div class="product-detail-row-title">Roast Date</div>
               <input name="roastDateVal" class="product-detail-row-value text-right" value="<?=$row['Roast_Date']?>"></input>
            </li>
         </ul>
      </div>
      <div class="row card-content product-save-delete">
         <input type="hidden" name="nameVal" value="<?= $row['Name']?>">
         <button type="submit" class="btn btn-danger mr-1" name="deleteProduct">Delete</button>
         <button type="submit" class="btn btn-success" name="updateCoffee">Save</button>
      </div>
   </form>
   <?php endforeach;?>

   <?php
      $storeTeas = $owner->getStoreTeas($_GET['SID']);
      
      foreach($storeTeas as $row):
      ?>
   <form class="card" class="card" action="includes/owner.inc.php" method="POST">
      <div class="card-title">
         <div id="productTitle">
            <div><?=$row['Product_Type']?></div>
            <?= $row['Name']?>
         </div>
         <div name="priceVal" class="col-md-4" value="<?= $row['Price']?>"></div>
      </div>
      <div class="row card-content">
         <ul class="list-group col-md-6">
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Stock</div>
               <input name="stockVal" class="product-detail-row-value text-right" value="<?= $row['Stock']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Origin</div>
               <input name="originVal" class="product-detail-row-value text-right" value="<?=$row['Origin']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Expiry Date</div>
               <input name="expiryDateVal" class="product-detail-row-value text-right" value="<?=$row['Expiry_Date']?>"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Shelve Date</div>
               <input name="shelveDateVal" class="product-detail-row-value text-right" value="<?=$row['Shelving_Date']?>"></input>
            </li>
         </ul>
         <ul class="list-group col-md-6">
            <li id="teaType" class="list-group-item">
               <div class="product-detail-row-title">Tea Type</div>
               <input name="teaTypeVal" class="product-detail-row-value text-right" value="<?=$row['Tea_Type']?>"></input> 
            </li>
            <li id="teaGrade" class="list-group-item">
               <div class="product-detail-row-title">Tea Grade</div>
               <input name="teaGradeVal" class="product-detail-row-value text-right" value="<?=$row['Grade']?>"></input>
            </li>
         </ul>
      </div>
      <div class="row card-content product-save-delete">
         <input type="hidden" name="nameVal" value="<?= $row['Name']?>">
         <button type="submit" class="btn btn-danger mr-1" name="deleteProduct">Delete</button>
         <button type="submit" class="btn btn-success" name="updateTea">Save</button>
      </div>
   </form>
   <?php endforeach;?>




    <!-- Modal for adding Promotion -->
   <div class="modal fade" id="addPromotion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form class="modal-content" action="includes/owner.inc.php" method="POST">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add New Promotion</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row card-content">
                  <ul class="list-group col-md-6">
                     <li class="list-group-item product-detail-row">
                        <div class="product-detail-row-title">Promo Code</div>
                        <input name="promoVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li class="list-group-item product-detail-row">
                        <div class="product-detail-row-title">Start Date</div>
                        <input name="startVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li class="list-group-item product-detail-row">
                        <div class="product-detail-row-title">End Date</div>
                        <input name="endVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li class="list-group-item">
                        <div class="product-detail-row-title">Percentage Off</div>
                        <input name="percentVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" name="addPromotion" class="btn btn-primary">Add Promotion</button>
            </div>
         </form>
      </div>
   </div>

   <!-- Modal for profile update -->
   <div class="modal fade" id="updateOwnerInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <form class="modal-content" action="includes/owner.inc.php" method="POST">
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
                           <input name="companyName" class="product-detail-row-value text-right" value=""></input>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="summit" name= "updateOwnerInfoModal" class="btn btn-primary">Save changes</button>
               </div>
            </form>   
         </div>
      </div>
   </div>

   <!-- Modal for adding new product -->
   <div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form class="modal-content" action="includes/owner.inc.php" method="POST">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row card-content">
                  <ul class="list-group col-md-6">
                     <li class="list-group-item product-detail-row">
                        <div class="product-detail-row-title">Name</div>
                        <input name="nameVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li class="list-group-item product-detail-row">
                        <div class="product-detail-row-title">Stock</div>
                        <input name="stockVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li class="list-group-item product-detail-row">
                        <div class="product-detail-row-title">Price</div>
                        <input name="priceVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li class="list-group-item">
                        <div class="product-detail-row-title">Origin</div>
                        <input name="originVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li class="list-group-item">
                        <div class="product-detail-row-title">Expiry Date</div>
                        <input name="expiryDateVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li class="list-group-item">
                        <div class="product-detail-row-title">Shelve Date</div>
                        <input name="shelveDateVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li class="list-group-item">
                        <div class="product-detail-row-title">Salesperson</div>
                        <input name="salesperson" class="product-detail-row-value text-right" value=""></input>
                     </li>
                  </ul>
                  <ul class="list-group col-md-6">
                     <li id="beanType" class="list-group-item">
                        <div class="product-detail-row-title">Bean Type</div>
                        <input name="beanTypeVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li id="roastType" class="list-group-item">
                        <div class="product-detail-row-title">Roast Type</div>
                        <input name="roastTypeVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li id="teaType" class="list-group-item">
                        <div class="product-detail-row-title">Tea Type</div>
                        <input name="teaTypeVal" class="product-detail-row-value text-right" value=""></input> 
                     </li>
                     <li id="teaGrade" class="list-group-item">
                        <div class="product-detail-row-title">Tea Grade</div>
                        <input name="teaGradeVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                     <li id="roastDate" class="list-group-item">
                        <div class="product-detail-row-title">Roast Date</div>
                        <input name="roastDateVal" class="product-detail-row-value text-right" value=""></input>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" name="addCoffee" class="btn btn-primary">Add Coffee</button>
               <button type="submit" name="addTea" class="btn btn-primary">Add Tea</button>
            </div>
         </form>
      </div>
   </div>

  
</div>
</body>
</html>