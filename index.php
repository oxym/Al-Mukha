<?php include_once 'includes/header.php'; ?>
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
