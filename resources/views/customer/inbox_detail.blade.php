@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
    <div style="margin-bottom: 10px;" class="row ibox-content border-box">
        <h3> <i class="fa fa-inbox"> </i> อ่านข้อความ</h3><hr/>
        <div class="col-lg-12">
            <h3>หัวข้อ : {{ $inbox->topic }}</h3>
            @if($inbox->admin)
            <small>จาก : แอดมิน ถึง : {{ auth()->guard('customer')->user()->email }} </small><br/><br/>
            @else
            <small>จาก : {{ auth()->guard('customer')->user()->email }} ถึง : แอดมิน</small><br/><br/>
            @endif
            <small>เมื่อวันที่ : {{ $inbox->created_at->format('d/m/Y H:i:s') }}</small>
            <hr/>
            <p>
                {!! $inbox->message !!}
            </p>
        </div>
    </div>
</div>

@endsection
