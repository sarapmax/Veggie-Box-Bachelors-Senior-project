@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
    <div style="margin-bottom: 10px;" class="row ibox-content border-box">
        <h3> <i class="fa fa-reply"> </i> สิ่งข้อความให้แอดมิน</h3><hr/>
        <div class="col-lg-12">
            <form action="{{ url('member/inbox/send') }}" method="POST" role="form" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="" class="control-label col-md-2">ประเภทข้อความ</label>
                    <div class="col-md-10">
                        <select class="form-control" name="status">
                            <option value="">เลือกประเภทข้อความ</option>
                            <option value="general">ทั่วไป</option>
                            <option value="question">สอบถามปัญหา</option>
                            <option value="request">Request สินค้า</option>
                        </select>
                        @if($errors->has('status'))
                            <span class="help-block">{{ $errors->first('status') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('topic') ? 'has-error' : '' }}">
                    <label for="" class="control-label col-md-2">หัวข้อ</label>
                    <div class="col-md-10">
                        <input type="text" name="topic" class="form-control">
                        @if($errors->has('topic'))
                            <span class="help-block">{{ $errors->first('topic') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                    <label for="" class="control-label col-md-2">ข้อความ</label>
                    <div class="col-md-10">
                        <textarea name="message" id="message" class="form-control"></textarea>
                        @if($errors->has('message'))
                            <span class="help-block">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-reply"> </i> ส่งข้อความให้แอดมิน</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('customer-js')

<script type="text/javascript">
    $('#message').summernote({
        height: 300
    });
</script>

@endsection
