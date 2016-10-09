@extends('layouts.inspinia_farmer')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>เพิ่มสินค้า</h2><br>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('farmer/') }}">หน้าแรก</a>
            </li>
            <li>
                <a href="{{ url('farmer/product') }}">สินค้า</a>
            </li>
            <li class="active">
                <strong>เพิ่มสินค้า</strong>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">

	         <div class="ibox">
                <div class="ibox-title">
                    <h5>เพิ่มสินค้า</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('farmer/product/') }}" class="btn btn-primary"><i class="fa fa-cubes"> </i> สินค้าทั้งหมด</a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ route('farmer.product.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                            <label class="col-lg-2 control-label">ประเภทสินค้า : </label>
                            <div class="col-lg-3">
                                <select id="category" name="category_id" class="form-control">
                                    <option value="">เลือกประเภทสินค้า</option>
                                    @foreach(App\Category::orderBy('created_at', 'DESC')->get() as $category)
                                    <option @if(old('category_id') == $category->id) selected="selected" @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('sub_category_id') ? 'has-error' : '' }}">
                            <label class="col-lg-2 control-label">ประเภทสินค้าย่อย : </label>
                            <div class="col-lg-3">
                                <select id="sub_category" class="form-control" name="sub_category_ids[]" multiple>
                                    <option value="">เลือกประเภทสินค้าย่อย</option>
                                </select>
                                @if($errors->has('sub_category_id'))
                                    <span class="help-block">{{ $errors->first('sub_category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">ชื่อสินค้า : </label>
                            <div class="col-lg-6">
                            	<input type="text" placeholder="กรอกชื่อสินค้า" name="name" class="form-control" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">สถานะสินค้า : </label>
                            <div class="col-lg-3">
                            	<select name="status" class="form-control">
                            		<option value="">เลือกสถานะสินค้า</option>
                            		<option @if(old('status') == 'release') selected="selected" @endif value="release">พร้อมขาย</option>
                                    <option @if(old('status') == 'growing') selected="selected" @endif value="growing">กำลังเติบโต</option>
                            	</select>
                                @if($errors->has('status'))
                                    <span class="help-block">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('unit') ? 'has-error' : '' }}">
                            <label class="col-lg-2 control-label">หน่วย : </label>
                            <div class="col-lg-3">
                                <select name="unit" class="form-control">
                                    <option value="">เลือกหน่วยของสินค้า</option>
                                    <option @if(old('unit') == 'gram') selected="selected" @endif  value="gram">กรัม</option>
                                    <option @if(old('unit') == 'kilogram') selected="selected" @endif  value="kilogram">กิโลกรัม</option>
                                    <option @if(old('unit') == 'piece') selected="selected" @endif  value="piece">ชิ้น</option>
                                    <option @if(old('unit') == 'lite') selected="selected" @endif  value="lite">ลิตร</option>
                                    <option @if(old('unit') == 'mililite') selected="selected" @endif  value="mililite">มิลิลิตร</option>
                                </select>
                                @if($errors->has('unit'))
                                    <span class="help-block">{{ $errors->first('unit') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">ราคา : </label>
                            <div class="col-lg-3">
                            	<input type="number" placeholder="กรอกราคาสินค้า" name="price" class="form-control" value="{{ old('price') }}">
                                @if($errors->has('price'))
                                    <span class="help-block">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('discount_price') ? 'has-error' : '' }}">
                            <label class="col-lg-2 control-label">ลดราคา : </label>
                            <div class="col-lg-3">
                                <input type="number" placeholder="กรอกลดราคาสินค้า" name="discount_price" class="form-control" value="{{ old('discount_price') }}">
                                @if($errors->has('discount_price'))
                                    <span class="help-block">{{ $errors->first('discount_price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">จำนวน : </label>
                            <div class="col-lg-3">
                            	<input type="number" placeholder="กรอกจำนวนสินค้า" name="quantity" class="form-control" value="{{ old('quantity') }}">
                                @if($errors->has('quantity'))
                                    <span class="help-block">{{ $errors->first('quantity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group {{ $errors->has('plant_date') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">วันที่ปลูก : </label>
                            <div class="col-lg-3">
                            	<input type="date" name="plant_date" class="form-control" value="{{ old('plant_date') }}">
                                @if($errors->has('plant_date'))
                                    <span class="help-block">{{ $errors->first('plant_date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('grow_estimate') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">ระยะเวลาปลูก (วัน) : </label>
                            <div class="col-lg-3">
                            	<input type="number" name="grow_estimate" placeholder="กรอกระยะเวลาการปลูก (หน่วยเป็นวัน)" class="form-control" value="{{ old('grow_estimate') }}">
                                @if($errors->has('grow_estimate'))
                                    <span class="help-block">{{ $errors->first('grow_estimate') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">รายละเอียดสินค้า : </label>
                            <div class="col-lg-5">
                            	<textarea class="form-control" cols="10" rows="4" name="description" placeholder="กรอกรายละเอียดสินค้า">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                    <span class="help-block">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('thumb_image') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">รูปภาพหลัก : </label>
                            <div class="col-lg-5">
                            	<input type="file" name="thumb_image" class="form-control">
                                @if($errors->has('thumb_image'))
                                    <span class="help-block">{{ $errors->first('thumb_image') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('images') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">รูปภาพเพิ่มเติม : </label>
                            <div class="col-lg-5">
                            	<input type="file" class="form-control" multiple name="images[]">
                                @if($errors->has('images'))
                                    <span class="help-block">{{ $errors->first('images') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('admin-js')
<script>
	$('#growing-product').DataTable();

    $(".chosen-select").chosen({max_selected_options: 5});

    $("select#category").change(function(){    
        $.get('{{ url('farmer/selectCategory') }}?category_id=' + $(this).val() , function(data) {
            $("select#sub_category").empty();
            $.each(data, function(index, subCatObj){
                $('select#sub_category').append($('<option>', {
                    value: subCatObj.id,
                    text: subCatObj.name
                }));
            });
        }); 
    });  
</script>
@endsection