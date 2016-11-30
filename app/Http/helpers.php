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

function slug($str) {
    $str = strtolower(trim($str));
    $str = preg_replace('~[^a-z0-9_ก-๙]~ui', '-', $str);
    $str = preg_replace('/-+/', "-", $str);
    return $str;
}

function adminOrderStatus($status) {
	if($status == 'paid') {
		echo '<label class="label label-success"><i class="fa fa-check"> </i> จ่ายเงินแล้ว</label>';
	}else if($status == 'shipped') {
		echo '<label class="label label-primary"><i class="fa fa-truck"> </i> จัดส่งแล้ว</label>';
	}else if($status == 'cancel'){
		echo '<label class="label label-default"><i class="fa fa-close"> </i> ยกเลิก</label>';
	}
}

function inboxStatus($status) {
	if($status == 'general') {
		echo '<span class="label label-primary"> ทั่วไป</span>';
	}
	if($status == 'question') {
		echo '<span class="label label-warning"> สอบถามปัญหา</span>';
	}
	if($status == 'request') {
		echo '<span class="label label-success"> Request สินค้า</span>';
	}
}

function customerInboxStatus($status) {
	if($status == 'general') {
		echo '<i class="fa fa-circle text-navy"></i>';
	}
	if($status == 'question') {
		echo '<i class="fa fa-circle text-warning"></i>';
	}
	if($status == 'request') {
		echo ' <i style="color:#1c84c6;" class="fa fa-circle text-primary"></i>';
	}
}