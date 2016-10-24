<?php

function productCheckQuantity($quantity, $unit) {
	if($quantity == 0) {
		echo '<p style="color:#a94442;">สินค้าหมด</p>';
	}else {
		echo $quantity.' '.$unit;
	}
}

function discountPrice($price, $discount_price, $unit) {
	if($discount_price) {
		echo '<p style="color: #999;text-decoration: line-through;"> ' . number_format($price) . '  บาท / '  . $unit . '</p><p> ' . number_format($discount_price) . ' บาท / ' . $unit . '</p>';
	}else {
	 	echo number_format($price) . ' บาท / ' . $unit;
	}
}

function sellStatus($product_activated) {
	if($product_activated) {
		echo '<label class="label label-success"><i class="fa fa-check"> </i> ถูกนำไปขายหน้าร้านแล้ว</label>';
	}else {
		echo '<label class="label label-warning"><i class="fa fa-spinner fa-spin"> </i> รอการเลือกสรรจากแอดมิน</label>';
	}
}

function productStatus($product_status) {
	if($product_status == 'release') {
		echo '<label class="label label-success"><i class="fa fa-check"> </i> พร้อมขาย</label>';
	}else {
		echo '<label class="label label-warning"><i class="fa fa-spinner fa-spin"> </i> กำลังเติบโต</label>';
	}
}

function timeAgo($time) {
	echo $time->diffForHumans() . ' at ' . $time->format('H:i') .' - '. $time->format('d/m/Y');
}

function farmerNotification($user, $text, $icon) {
	$farmer_notification = new App\FarmerNotification;;
	
	$farmer_notification->farmer_id = $user;
    $farmer_notification->text = $text;
    $farmer_notification->icon = $icon;
    $farmer_notification->save();
}

function adminNotification($text, $icon) {
	$admin_notification = new App\AdminNotification;;
	
    $admin_notification->text = $text;
    $admin_notification->icon = $icon;
    $admin_notification->save();
}

function getRealPrice($price, $discount_price) {
	if($discount_price) {
		echo $discount_price;
	}else {
		echo $price;
	}
}

function bahtToCoin($baht) {
	$coin = $baht * 10;

	return $coin;
}

function coinToBaht($coin) {
	$baht = $coin / 10;

	return $baht;
}

function discountCoinPrice($price, $discount_price, $unit) {
	if($discount_price) {
		echo '<p style="color: #999;text-decoration: line-through;"> ' . number_format(bahtToCoin($price)) . '  <i class="fa fa-viacoin"></i> / '  . $unit . '</p><p> ' . number_format(bahtToCoin($discount_price)) . ' <i class="fa fa-viacoin"></i> / ' . $unit . '</p>';
	}else {
	 	echo number_format(bahtToCoin($price)) . ' <i class="fa fa-viacoin"></i> / ' . $unit;
	}
}

function viaCoin($coin) {
	echo number_format($coin). ' <i class="fa fa-viacoin"></i>';
}