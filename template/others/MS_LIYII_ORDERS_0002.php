<?php 
	// var_dump($_SESSION['favorite']);
	if (!isset($_SESSION['favorite'])) {
		$_SESSION['favorite'] = array();
	}
	$product_all = $mshopkeeper->get_products_all_db();
?>
<style type="text/css">

</style>
<div class="container">
	<table class="table vertical-middle">
	    <thead>
	      <tr>
	        <th></th>
	        <th></th>
	        <th>Tên sản phẩm</th>
	        <th>Giá tiền</th>
	        <th>Tình trạng hàng</th>
	        <th></th>
	      </tr>
	    </thead>
	    <tbody>
	      <?php 
	      foreach ($_SESSION['favorite'] as $product_id) { 
	      	$row = $action->getDetail('product', 'product_id', $product_id);
	      	$item = $mshopkeeper->get_product($product_all, $row['mshopkeeper_id']);
	      	?>
	      <tr>
	      	<td><span style="" class="dot-favorite" onclick="remove_favorite('<?= $product_id ?>')">x</span></td>
	        <td>
	        	
	        	<img src="<?= $item['Picture'] ?>" alt="" height="100">
	        </td>
	        <td><?= $item['Name'] ?></td>
	        <td><?= number_format($item['SellingPrice']) ?> đ</td>
	        <td><span class="in_stock">IN STOCK</span></td>
	        <td><a href="/<?= $row['friendly_url'] ?>"><span class="select-options">Lựa chọn hàng</span></a></td>
	      </tr>
	      <?php } ?>
	    </tbody>
	</table>
</div>
<script type="text/javascript">
	function remove_favorite (product_id) {
		// alert(product_id);
		var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		     // document.getElementById("demo").innerHTML = this.responseText;
		     location.reload();
		    }
		  };
		  xhttp.open("GET", "/functions/ajax/remove_favorite.php?id="+product_id, true);
		  xhttp.send();
	}
</script>