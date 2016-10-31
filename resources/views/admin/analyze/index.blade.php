@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>หน้าแรก</h2><br>
        <ol class="breadcrumb">
            <li class="active">
                <strong>หน้าแรก</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>สินค้าที่ถูกสั่งซื้อเยอะที่สุด <span style="color:#1ab394;" id="date_text"></span></h5>
                    <div class="pull-right">
                        <span id="date_text"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="btn-group">
                            <a onClick="topProductByDate('{{ Carbon\Carbon::now()->startOfWeek() }}', '{{ Carbon\Carbon::now()->endOfWeek() }}', 'สัปดาห์นี้')" class="btn btn-xs btn-white cickDate">สัปดาห์นี้</a>
                            <a onClick="topProductByDate('{{ Carbon\Carbon::now()->startOfMonth() }}', '{{ Carbon\Carbon::now()->endOfMonth() }}', 'เดือนนี้')" class="btn btn-xs btn-white cickDate">เดือนนี้</a>
                            <a onClick="topProductByDate('{{ Carbon\Carbon::now()->subMonths(3) }}', '{{ Carbon\Carbon::now() }}', '3 เดือนที่ผ่านมานี้')" class="btn btn-xs btn-white cickDate">3 เดือนที่ผ่านมา</a>
                            <a onClick="topProductByDate('{{ Carbon\Carbon::now()->startOfYear() }}', '{{ Carbon\Carbon::now()->endOfYear() }}', 'ปีนี้')" class="btn btn-xs btn-white cickDate">ปีนี้</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-9">
                            <canvas id="barChart" height="140"></canvas>
                        </div>
                        <div class="col-lg-3">
                            <ul class="stat-list">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('admin-js')

<script type="text/javascript">
    topProductByDate('{{ Carbon\Carbon::now()->startOfWeek() }}', '{{ Carbon\Carbon::now()->endOfWeek() }}', 'สัปดาห์นี้')

    function topProductByDate($start, $end, $d) {
        $('#date_text').empty();
        $('#date_text').append($d);
        $.get('analyze/get_top_product_seller/' + $start + '/'+ $end, function(data) {
            $('ul.stat-list').empty();
            $.each(data.product_top_details, function(index, data) {
                $('ul.stat-list').append('<li><h4 class="no-margins">อันดับ '+ ++index +' '+ data.product_name +' <a target="_blank" href="admin/product/'+data.id+'" }}"><i class="fa fa-external-link"></i></a></h4><small>'+ data.category_name +' >> '+ data.sub_category_name +'</small><div class="stat-percent">'+ data.product_top_seller +' '+ data.unit +' </div></li>');
            });
             
            var barData = {
            labels: data.name,
            datasets: [
                {
                    label: 'จำนวนสินค้าที่ขายได้มากที่สุด '+$d+' วันที่ ' +date_format($start)+ ' ถึง '+date_format($end),
                    backgroundColor:'rgba(26,179,148, 0.7)',
                    borderColor: 'rgba(26,179,148, 0.5)',
                    data: data.count
                },
            ]
            };

            var barOptions = {
            tooltips : {
                enabled: true      
            },
            scales: {
                    xAxes: [{
                        beginAtZero: true,
                        stacked: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'สินค้า'
                        }
                    }],
                    yAxes: [{
                        beginAtZero: true,
                        stacked: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'จำนวนที่ขายได้'
                        }
                    }]
                }
            }


            var ctx = document.getElementById("barChart").getContext("2d");
            var myNewChart = new Chart(ctx, {type: 'bar', data: barData, options: barOptions});
        });
    }

    function date_format(input){
        var d = new Date(Date.parse(input.replace(/-/g, "/")));
        var month = d.getMonth() + 1;
        // return (date);  
        return (d.getDate()+'/'+month+'/'+d.getFullYear());
    };


   
</script>

@endsection