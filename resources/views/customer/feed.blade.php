@extends('layouts.master')

@section('content')

<div class="col-lg-12">
	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
		<h3>ข่าวสารทั้งหมด</h3><hr/>
		@foreach($feeds as $feed)
		<div class="col-lg-12">
			<div>
				<a class="link" href="{{ url('feed/'.$feed->slug) }}"><h4>{{ $feed->topic }}</h4></a>
				<p>{!! str_limit(strip_tags($feed->detail), 400) !!}</p>
				<p><i class="fa fa-user"> </i> {{ $feed->admin->fullname }} &nbsp;&nbsp;<i class="fa fa-clock-o"></i> {{ $feed->created_at->diffForHumans() }}, {{ $feed->created_at->format('d/m/Y H:i:s') }}</p>
			</div>
			<hr/>
		</div>
		@endforeach
	</div>
</div>

@endsection