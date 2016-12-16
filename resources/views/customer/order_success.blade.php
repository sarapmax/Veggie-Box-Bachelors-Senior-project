@extends('layouts.master')

@section('content')

<div id="printableArea">
<div class="col-lg-12">
	<div style="margin-bottom: 10px;" class="row border-box ibox-content">
		<h3>เราได้รับรายการสั่งซื้อของคุณแล้ว</h3><hr/>

		<table class="table table-bordered">
			<tr>
				<td><strong>รหัสการสั่งซื้อ :</strong> {{ $order[0]->order_number }}</td>
				<td><strong>วันที่สั่งซื้อ :</strong> {{ $order[0]->created_at->format('d/m/Y') }}</td>
				<td><strong>ราคา :</strong> {{ viaCoin($total) }}</td>
				<td><strong>สถานะการสั่งซื้อ :</strong> {{ $order[0]->order_status }}</td>
			</tr>
		</table>

		<div class="row">
			<div class="col-lg-6">
				<h4>รายละเอียดสินค้า</h4><hr/>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>สินค้า</th>
							<th>ราคา</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order[0]->product as $product)
						<tr>
							<td>{{ $product->farm_product->name }} x {{ $product->pivot->quantity }} {{ $product->farm_product->unit }}</td>
							<td>{{ $product->pivot->sub_total }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-lg-6">
				<h4>ข้อมูลลูกค้า</h4><hr/>
				<table class="table table-bordered">
					<tr>
						<th>ชื่อ : </th>
						<td>{{ $order[0]->firstname }} {{ $order[0]->lastname }}</td>
					</tr>
					<tr>
						<th>อีเมล : </th>
						<td>{{ $order[0]->email }}</td>
					</tr>
					<tr>
						<th>เบอร์โทร : </th>
						<td>{{ $order[0]->phone }}</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				
				<h4>ข้อมูลการจัดส่ง</h4><hr/>
				{{ $order[0]->address }} ตำบล {{ $order[0]->sub_district }} อำเภอ {{ $order[0]->district }} จังหวัด {{ $order[0]->province }} {{ $order[0]->zipcode }} <br/><br/>

				<div id="map_canvas" style="width:580;height:400px;"></div>
			</div>
		</div>
		<br/><br/>
		<center>
		<button class="btn btn-primary" onClick="printDiv('printableArea')">พิมพ์ใบเสร็จ</button>
		</center>
	</div>
	
</div>
</div>

@endsection

@section('customer-js')

<script src="http://maps.google.com/maps/api/js?key=AIzaSyDpdWsxjo5HJOPsERUyqQnGkgCwdtlr0HI"></script>

<script type="text/javascript">
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
	}
    setupMap()

    function setupMap() { 
    	console.log()
        var myOptions = {
            zoom: 15,
            center: new google.maps.LatLng{{ $order[0]->latLng }},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'),
            myOptions);

        var marker = new google.maps.Marker({
            map:map,
            position: new google.maps.LatLng{{ $order[0]->latLng }},
            // draggable: true
        });


        var infowindow = new google.maps.InfoWindow({
            map:map,
            content: "ที่อยู่ในการจัดส่งสินค้า",
            position:  new google.maps.LatLng{{ $order[0]->latLng }}
        });
    }
</script>

@endsection