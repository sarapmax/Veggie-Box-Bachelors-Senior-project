@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
    <div style="margin-bottom: 10px;" class="row ibox-content border-box">
        <h3> <i class="fa fa-inbox"> </i> ข้อความ</h3><hr/>
        {{-- <div class="col-lg-12"> --}}
            <div class="mail-box-header">
                <div class="pull-left">
                <h4>
                    ข้อความทั้งหมด ({{ App\CustomerInbox::count() }})
                </h4>
                </div>
                {{-- <div class="mail-tools tooltip-demo m-t-md"> --}}
                    <div class="btn-group pull-right">
                        <a href="{{ url('member/inbox/send') }}" class="btn btn-primary btn-sm"><i class="fa fa-reply"> </i> ส่งข้อความ</a>
                        <a class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> รีเฟรช</a>
                    </div>
                {{-- </div> --}}
                <div class="clearfix"></div>
            </div>

            <div class="mail-box">

            <table class="table table-hover table-mail">
            <tbody>
                @foreach($inboxes as $inbox)
                <tr class="{{ $inbox->read ? 'read' : 'unread' }}">
                    <td> {{ inboxStatus($inbox->status) }} </td>
                    <td class="mail-subject"><a href="{{ url('member/inbox/detail/'.$inbox->slug) }}"><i class="{{ $inbox->admin ? '' : 'fa fa-reply' }} "></i> {{ $inbox->topic }}</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">{{ $inbox->created_at->format('d/m/Y H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
            @include('pagination.default', ['paginator' => $inboxes])


            </div>
        {{-- </div> --}}
    </div>
</div>

@endsection
