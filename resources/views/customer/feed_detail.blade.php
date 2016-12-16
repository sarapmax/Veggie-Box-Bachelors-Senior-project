@extends('layouts.master')

@section('content')

<div class="col-lg-12">
	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
		<h3>{{ $feed->topic }}</h3><hr/>
		<div class="col-lg-12">
			<div>
				<p>{!! $feed->detail !!}</p>
				<p><i class="fa fa-user"> </i> {{ $feed->admin->fullname }} &nbsp;&nbsp;<i class="fa fa-clock-o"></i> {{ $feed->created_at->diffForHumans() }}, {{ $feed->created_at->format('d/m/Y H:i:s') }}</p>
			</div>
			<hr/>
		</div>
	</div>
</div>

@endsection