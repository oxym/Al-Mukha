<?php include 'includes/header.php'; ?>
<div class="main-page-content">
   <button class="btn btn-success mb-2" data-toggle="modal" data-target="#addNewProduct">Add Product</button>
   <div class="card">
      <div class="card-title">
         <div id="productTitle">
            <div id="productType">(Tea/Coffee)</div>
            Product Title
         </div>
         <div id="productPrice" class="col-md-4">$14.00</div>
      </div>
      <div class="row card-content">
         <ul class="list-group col-md-6">
            <li class="list-group-item product-detail-row">
               <div class="product-detail-row-title">Stock</div>
               <input id="stockVal" class="product-detail-row-value text-right" value="123"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Origin</div>
               <input id="originVal" class="product-detail-row-value text-right" value="Venezuela"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Expiry Date</div>
               <input id="expiryDateVal" class="product-detail-row-value text-right" value="May 9, 2018"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Shelve Date</div>
               <input id="shelveDateVal" class="product-detail-row-value text-right" value="April 9, 2018"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Store Name</div>
               <input id="storeName" class="product-detail-row-value text-right" value="Best Coffee Shop"></input>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Salesperson</div>
               <input id="salesperson" class="product-detail-row-value text-right" value="John Doe"></input>
            </li>
         </ul>
         <ul class="list-group col-md-6">
            <li id="beanType" class="list-group-item">
               <div class="product-detail-row-title">Bean Type</div>
               <input id="beanTypeVal" class="product-detail-row-value text-right" value="Large"></input>
            </li>
            <li id="roastType" class="list-group-item">
               <div class="product-detail-row-title">Roast Type</div>
               <input id="roastTypeVal" class="product-detail-row-value text-right" value="Light"></input>
            </li>
            <li id="teaType" class="list-group-item">
               <div class="product-detail-row-title">Tea Type</div>
               <input id="teaTypeVal" class="product-detail-row-value text-right" value="Green"></input> 
            </li>
            <li id="teaGrade" class="list-group-item">
               <div class="product-detail-row-title">Tea Grade</div>
               <input id="teaGradeVal" class="product-detail-row-value text-right" value="AAA"></input>
            </li>
            <li id="roastDate" class="list-group-item">
               <div class="product-detail-row-title">Roast Date</div>
               <input id="roastDateVal" class="product-detail-row-value text-right" value="April 2, 2018"></input>
            </li>
         </ul>
      </div>
      <div class="row card-content product-save-delete">
         <button type="button" class="btn btn-danger mr-1">Delete</button>
         <button type="button" class="btn btn-success">Save</button>
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
                        <div class="product-detail-row-title">Store Name</div>
                        <input name="storeName" class="product-detail-row-value text-right" value=""></input>
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