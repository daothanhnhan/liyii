<?php 
	$order = $_SESSION['order_ok'];
	$cart = $action->getDetail('cart', 'id_cart', $order);//var_dump($cart);
	$cart_detail = $action->getList('cartdetail', 'id_cart', $order, 'id_cartDetail', 'asc', '', '', '');//var_dump($cart_detail);
	$form_payment = array(
	    0 => '',
	    1 => 'Thanh toán khi giao hàng (COD)',
	    2 => 'Chuyển khoản qua ngân hàng',
	    3 => 'Nhận hàng tại cửa hàng',
	    4 => 'Thanh toán trực tuyến bằng ứng dụng Internet Banking với QR Code, thẻ ATM /Visa/Master Card/JCB'
	);
	///////////////
	$subtotal = 0; 
	foreach ($cart_detail as $item) { 
		$subtotal += $item['qyt_product'] * $item['price_product'];
	}
	$total = $subtotal + $cart['ship'] + $cart['sale'];
?>
<style type="text/css">
.gb-center {
	text-align: center;
}
.gb-bold {
	font-weight: bold;
}
</style>
<div class="container" id="thank-you" style="margin-top: 200px;">
	<div class="row">
		<div class="col-md-12">
			<div style="text-align: center;border: 3px solid #1daaa3;color: #1daaa3;border-style: dashed;padding: 20px;">
				<p>Cảm ơn bạn đã mua hàng!</p>
				<p>Số đơn hàng của bạn: #<?= $order ?>.</p>
				<p>Bạn sẽ nhận được email xác nhận đặt hàng trong đó có các thông tin chi tiết về đơn hàng của bạn, nhân viên chăm sóc sẽ gọi điện cho bạn để xác nhận đơn hàng ạ</p>
			</div>
		</div>
		<div class="col-md-12" style="height: 10px;">
			
		</div>
		<div class="col-md-3 gb-center">
			<p>Order number:</p>
			<p class="gb-bold">#<?= $order ?></p>
		</div>
		<div class="col-md-3 gb-center">
			<p>Date:</p>
			<p class="gb-bold"><?= date("F d, Y", strtotime($cart['date_cart'])) ?></p>
		</div>
		<div class="col-md-3 gb-center">
			<p>Total:</p>
			<p class="gb-bold"><?= number_format($total) ?> đ</p>
		</div>
		<div class="col-md-3 gb-center">
			<p>Payment method:</p>
			<p class="gb-bold"><?= $form_payment[$cart['payment']]; ?></p>
		</div>
		<div class="col-md-12" style="text-transform: uppercase;font-size: 34px;text-align: center;font-weight: bold;margin-top: 10px;">
			<p style="">Order Detail</p>
		</div>
		<div class="col-md-12" style="margin-top: 10px;">
			<span class="gb-bold">PRODUCT</span>
			<span class="gb-bold" style="float: right;">TOTAL</span>
		</div>
		<?php
		$subtotal = 0; 
		foreach ($cart_detail as $item) { 
			$subtotal += $item['qyt_product'] * $item['price_product'];
			$product = $action->getDetail('product', 'product_id', $item['id_product']);
		?>
		<div class="col-md-12" style="margin-top: 40px;">
			<span><?= $product['product_name'] . ' x ' . $item['qyt_product'] ?></span>
			<span style="float: right;"><?= number_format($item['qyt_product'] * $item['price_product']) ?> đ</span>
		</div>
		<?php } ?>
		<div class="col-md-12" style="margin-top: 40px;">
			<span class="gb-bold">SUBTOTAL:</span>
			<span class="" style="float: right;"><?= number_format($subtotal) ?> đ</span>
		</div>
		<div class="col-md-12" style="margin-top: 40px;">
			<span class="gb-bold">SHIPPING:</span>
			<span class="" style="float: right;"><?= number_format($cart['ship']) ?> đ</span>
		</div>
		<div class="col-md-12" style="margin-top: 40px;">
			<span class="gb-bold">SALE:</span>
			<span class="" style="float: right;"><?= number_format($cart['sale']) ?> đ</span>
		</div>
		<div class="col-md-12" style="margin-top: 40px;">
			<span class="gb-bold">PAYMENT METHOD:</span>
			<span class="" style="float: right;"><?= $form_payment[$cart['payment']]; ?></span>
		</div>
		<div class="col-md-12" style="margin-top: 40px;">
			<span class="gb-bold">TOTAL:</span>
			<span class="" style="float: right;"><?= number_format($cart['sale'] + $cart['ship'] + $subtotal) ?> đ</span>
		</div>
	</div>
</div>