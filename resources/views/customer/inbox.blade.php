@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
    <div style="margin-bottom: 10px;" class="row ibox-content border-box">
        <h3> <i class="fa fa-inbox"> </i> ข้อความ</h3><hr/>
        {{-- <div class="col-lg-12"> --}}
            <div class="mail-box-header">
                <h4>
                    ข้อความทั้งหมด (16)
                </h4>
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                        <a class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></a>
                        <a class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></a>

                    </div>
                    <a href="{{ url('member/inbox/send') }}" class="btn btn-primary btn-sm"><i class="fa fa-reply"> </i> ส่งข้อความ</a>
                    <a class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> รีเฟรช</a>
                </div>
            </div>

            <div class="mail-box">

            <table class="table table-hover table-mail">
            <tbody>
                <tr class="unread">
                    <td><span class="label label-warning label-table">สอบถามปัญหา</span> </td>
                    <td class="mail-subject"><a href="mail_detail.html">Many desktop publishing packages and web page editors.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Jan 16</td>
                </tr>
                <tr class="unread">
                    <td><span class="label label-success label-table">Request สินค้า</span> </td>
                    <td class="mail-subject"><a href="mail_detail.html">Many desktop publishing packages and web page editors.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Jan 16</td>
                </tr>
                <tr class="read">
                    <td><span class="label label-primary label-table">ทั่วไป</span> </td>
                    <td class="mail-subject"><a href="mail_detail.html">Many desktop publishing packages and web page editors.</a></td>
                    <td class=""></td>
                    <td class="text-right mail-date">Jan 16</td>
                </tr>
                
            </tbody>
            </table>


            </div>
        {{-- </div> --}}
    </div>
</div>

@endsection
