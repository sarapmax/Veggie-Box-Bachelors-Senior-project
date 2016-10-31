@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
	<div class="row ibox-content border-box">
		<h3> บัญชีของฉัน</h3><hr/>
	
		<table class="table table-bordered">
			<tr>
				<th>อีเมล</th>
				<td>{{ $member->email }}</td>
			</tr>
			<tr>
				<th>ชื่อ</th>
				<td>{{ $member->firstname }} {{ $member->lastname }}</td>
			</tr>
			<tr>
				<th>เบอร์โทร</th>
				<td>{{ $member->phone }}</td>
			</tr>
			<tr>
				<th><strong>จำนวน VeggieCoin</strong></th>
				<td><p style="color:#f7a54a;font-weight: bold;">{{ viaCoin($member->coins) }}</p></td>
			</tr>
			<tr>
				<th>ที่อยู่</th>
				<td>{{ $member->address }} ตำบล {{ $member->sub_district }} อำเภอ {{ $member->district }}</td>
			</tr>
			<tr>
				<th>จังหวัด</th>
				<td>{{ $member->province }}</td>
			</tr>
			<tr>
				<th>รหัสไปรษณีย์</th>
				<td>{{ $member->zipcode }}</td>
			</tr>
			<tr>
				<th>ที่อยู่ของคุณ</th>
				<td><div id="map_canvas" style="width:400;height:300px;"></div></td>
			</tr>
		</table>
	</div>
</div>


@endsection

@section('customer-js')

<script src="http://maps.google.com/maps/api/js?key=AIzaSyDpdWsxjo5HJOPsERUyqQnGkgCwdtlr0HI"></script>

<script type="text/javascript">
    setupMap()

    function setupMap() { 
    	console.log()
        var myOptions = {
            zoom: 13,
            center: new google.maps.LatLng{{ $member->latLng }},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'),
            myOptions);

        var marker = new google.maps.Marker({
            map:map,
            position: new google.maps.LatLng{{ $member->latLng }},
            // draggable: true
        });


        var infowindow = new google.maps.InfoWindow({
            map:map,
            content: "ที่อยู่ของคุณ",
            position:  new google.maps.LatLng{{ $member->latLng }}
        });
    }
</script>

@endsection