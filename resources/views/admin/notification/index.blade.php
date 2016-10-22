@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>การแจ้งเตือน</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>การแจ้งเตือน</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>การแจ้งเตือน</h5>
				</div>
				{{-- @if(Session::has('alert-success')) --}}
				
				{{-- @endif --}}
				<div class="ibox-content  inspinia-timeline">
					@foreach($notifications as $notification)
					<div class="timeline-item">
                        <div class="row">
                            <div class="col-xs-2">
                                {!! $notification->icon !!}<br/><br/>
                                
                                <small class="text-navy">{{ $notification->created_at->format('d/m/Y - H:i') }}</small>
                                <br/>
                                {{ $notification->created_at->diffForHumans() }}
                            </div>
                            <div class="col-xs-10 content no-top-border">
                                <p class="m-b-xs">{{ $notification->text }}</p>
                            </div>
                        </div>
                    </div><hr/>
                    @endforeach

                    @include('pagination.default', ['paginator' => $notifications])
				</div>
			</div>

		</div>
	</div>
</div>


@endsection

@section('admin-js')

@endsection
