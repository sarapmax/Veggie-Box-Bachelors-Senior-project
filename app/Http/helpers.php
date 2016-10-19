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