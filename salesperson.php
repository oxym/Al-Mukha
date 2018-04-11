<?php include 'includes/header.php'; 
	if (!isset($_SESSION['user_id'])) {
	   Header("Location: 404.php");
	   exit();
	} else {
	   if ($_SESSION['account_type'] != 'sales') {
	      Header("Location: 404.php");
	   exit();
	   }
	}

	?>

   <div class="main-page-content">
   <button class="btn btn-success mb-2" data-toggle="modal" data-target="#updateSalespersonModal">Update Profile</button>

	   <?php
	      
	      include 'includes/salesPerson.inc.php';
	      
	      $sales = new Sales();
	      if ($_SESSION['account_type'] == "sales") {
         	    $stores = $sales->getSalespersonStore($_SESSION['user_id']); 
      		}      
	      
	      
	      foreach($stores as $row):
	      ?>
	    <form class="card" action="includes/salesPerson.inc.php" method="POST">
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
               <div id="description" class="product-detail-row-value text-right"><?=$row['Description']?></div>
            </li>
            <li class="list-group-item">
               <div class="product-detail-row-title">Opening Date</div>
               <div id="expiryDateVal" class="product-detail-row-value text-right"><?=$row['Opening_Date']?></div>
            </li>
         </ul>
      </div>
      <div class="row card-content product-save-delete">
         <a class="btn btn-success mr-1" href="salesPersonStoreProducts.php?SID=<?=$row['SID']?>">View Products</a>
         <input type="hidden" name="storeID" value="<?=$row['SID']?>">
         <button type="submit" class="btn btn-danger mr-1" name="deleteStore">Delete</button>
         <button type="button" class="btn btn-success">Save</button>
      </div>
   </form>
   <?php endforeach;?>

		

		<!-- Modal for profile update -->
		<div class="modal fade" id="updateSalespersonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form class="modal-content" action="includes/salesPerson.inc.php" method="POST">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Update Salesperson Account </h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<ul class="list-group col-md-12 ml-2">
									<li class="list-group-item">
										<div class="product-detail-row-title">Specialization</div>
										<input name="specialization" class="product-detail-row-value text-right" value=""></input>
									</li>
								</ul>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="summit" name="updateSaleInfoModal" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>


		<!-- Modal for adding promotion -->
		<div class="modal fade" id="addPromotion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add New Promotion</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<ul class="list-group col-md-12 ml-2">
								
								<li class="list-group-item">
									<div class="product-detail-row-title">Product ID</div>
									<input id="productId" class="product-detail-row-value text-right" value=""></input>
								</li>	
								<li class="list-group-item">
									<div class="product-detail-row-title">Start Date</div>
									<input id="startDate" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">End Date</div>
									<input id="endDate" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Percent Off</div>
									<input id="percentOff" class="product-detail-row-value text-right" value=""></input>
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


		<!-- Modal for adding new product -->
		<div class="modal fade" id="addNewProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
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
									<div class="product-detail-row-title">Stock</div>
									<input id="stockVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Origin</div>
									<input id="originVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Expiry Date</div>
									<input id="expiryDateVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Shelve Date</div>
									<input id="shelveDateVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li class="list-group-item">
									<div class="product-detail-row-title">Salesperson</div>
									<input id="salesperson" class="product-detail-row-value text-right" value=""></input>
								</li>
							</ul>

							<ul class="list-group col-md-6">
								<li id="beanType" class="list-group-item">
									<div class="product-detail-row-title">Bean Type</div>
									<input id="beanTypeVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li id="roastType" class="list-group-item">
									<div class="product-detail-row-title">Roast Type</div>
									<input id="roastTypeVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li id="teaType" class="list-group-item">
									<div class="product-detail-row-title">Tea Type</div>
									<input id="teaTypeVal" class="product-detail-row-value text-right" value=""></input> 
								</li>
								<li id="teaGrade" class="list-group-item">
									<div class="product-detail-row-title">Tea Grade</div>
									<input id="teaGradeVal" class="product-detail-row-value text-right" value=""></input>
								</li>
								<li id="roastDate" class="list-group-item">
									<div class="product-detail-row-title">Roast Date</div>
									<input id="roastDateVal" class="product-detail-row-value text-right" value=""></input>
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
	</div>
</body>
</html>
