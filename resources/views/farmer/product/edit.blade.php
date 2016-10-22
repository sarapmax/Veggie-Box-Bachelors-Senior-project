@extends('layouts.inspinia_farmer')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>แก้ไขสินค้า</h2><br>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('farmer/') }}">หน้าแรก</a>
            </li>
            <li>
                <a href="{{ url('farmer/product') }}">สินค้า</a>
            </li>
            <li class="active">
                <strong>แก้ไขสินค้า</strong>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">

	         <div class="ibox">
                <div class="ibox-title">
                    <h5>แก้ไขสินค้า</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('farmer/product/') }}" class="btn btn-primary"><i class="fa fa-cubes"> </i> สินค้าทั้งหมด</a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ route('farmer.product.update', $farm_product->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                            <label class="col-lg-2 control-label">ประเภทสินค้า : </label>
                            <div class="col-lg-3">
                                <select id="category" name="category_id" class="form-control">
                                    <option value="">เลือกประเภทสินค้า</option>
                                    @foreach(App\Category::orderBy('created_at', 'DESC')->get() as $category)
                                    <option @if(old('category_id') == $category->id) selected="selected" @endif @if($farm_product->sub_category->category_id == $category->id) selected="selected" @endif value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <select id="sub_category" class="form-control" name="sub_category_id">
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
                            	<input type="text" placeholder="กรอกชื่อสินค้า" name="name" class="form-control" value="{{ old('name', $farm_product->name) }}">
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">สถานะสินค้า : </label>
                            <div class="col-lg-3">
                            	<select name="status" id="status" class="form-control">
                            		<option value="">เลือกสถานะสินค้า</option>
                            		<option @if($farm_product->status == 'release') selected="selected" @endif @if(old('status') == 'release') selected="selected" @endif value="release">พร้อมขาย</option>
                                    <option @if($farm_product->status == 'growing') selected="selected" @endif @if(old('status') == 'growing') selected="selected" @endif value="growing">กำลังเติบโต</option>
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
                                    <option @if($farm_product->unit == 'กรัม') selected="selected" @endif @if(old('unit') == 'กรัม') selected="selected" @endif  value="กรัม">กรัม</option>
                                    <option @if($farm_product->unit == 'กิโลกรัม') selected="selected" @endif @if(old('unit') == 'กิโลกรัม') selected="selected" @endif  value="กิโลกรัม">กิโลกรัม</option>
                                    <option @if($farm_product->unit == 'ชิ้น') selected="selected" @endif @if(old('unit') == 'ชิ้น') selected="selected" @endif  value="ชิ้น">ชิ้น</option>
                                    <option @if($farm_product->unit == 'ลิตร') selected="selected" @endif @if(old('unit') == 'ลิตร') selected="selected" @endif  value="ลิตร">ลิตร</option>
                                    <option @if($farm_product->unit == 'มิลลิลิตร') selected="selected" @endif @if(old('unit') == 'มิลลิลิตร') selected="selected" @endif  value="มิลลิลิตร">มิลิลิตร</option>
                                </select>
                                @if($errors->has('unit'))
                                    <span class="help-block">{{ $errors->first('unit') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">ราคา : </label>
                            <div class="col-lg-3">
                            	<input type="number" placeholder="กรอกราคาสินค้า" name="price" class="form-control" value="{{ old('price', $farm_product->price) }}">
                                @if($errors->has('price'))
                                    <span class="help-block">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('discount_price') ? 'has-error' : '' }}">
                            <label class="col-lg-2 control-label">ลดราคา : </label>
                            <div class="col-lg-3">
                                <input type="number" placeholder="กรอกลดราคาสินค้า" name="discount_price" class="form-control" value="{{ old('discount_price', $farm_product->discount_price) }}">
                                @if($errors->has('discount_price'))
                                    <span class="help-block">{{ $errors->first('discount_price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">จำนวน : </label>
                            <div class="col-lg-3">
                            	<input type="number" placeholder="กรอกจำนวนสินค้า" name="quantity" class="form-control" value="{{ old('quantity', $farm_product->quantity) }}">
                                @if($errors->has('quantity'))
                                    <span class="help-block">{{ $errors->first('quantity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group {{ $errors->has('plant_date') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">วันที่ปลูก : </label>
                            <div class="col-lg-3">
                            	<input @if($farm_product->plant_date == '0000-00-00') disabled="disabled" @endif type="date" id="plant_date" name="plant_date" class="form-control" value="{{ old('plant_date', $farm_product->plant_date) }}">
                                @if($errors->has('plant_date'))
                                    <span class="help-block">{{ $errors->first('plant_date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('grow_estimate') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">ระยะเวลาปลูก (วัน) : </label>
                            <div class="col-lg-3">
                            	<input @if($farm_product->plant_date == 0) disabled="disabled" @endif type="number" id="grow_estimate" name="grow_estimate" placeholder="กรอกระยะเวลาการปลูก (หน่วยเป็นวัน)" class="form-control" value="{{ old('grow_estimate', $farm_product->grow_estimate) }}">
                                @if($errors->has('grow_estimate'))
                                    <span class="help-block">{{ $errors->first('grow_estimate') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">รายละเอียดสินค้า : </label>
                            <div class="col-lg-9">
                            	<textarea id="description" class="form-control" cols="10" rows="4" name="description" placeholder="กรอกรายละเอียดสินค้า">{!! old('description', $farm_product->description) !!}</textarea>
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
                                @if($farm_product->thumb_image) 
                                <div><br/>
                                    <img style="width:100px;" src="{{ asset('thumb_image_thumb/'.$farm_product->thumb_image) }}" />
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('images') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label">รูปภาพเพิ่มเติม : </label>
                            <div class="col-lg-5">
                            	<input type="file" class="form-control" multiple name="images[]">
                                @if($errors->has('images'))
                                    <span class="help-block">{{ $errors->first('images') }}</span>
                                @endif
                                @if($farm_product->images) 
                                <div><br/>
                                    <?php $images = explode("|",$farm_product->images); ?>
                                    @foreach(array_slice($images ,1) as $image)
                                        <img style="width:100px;" src="{{ asset('images_thumb/'.$image) }}">
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">ยืนยัน</button>
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
    var category_id = '{{ old('category_id', $farm_product->sub_category->category->id) }}';
    var sub_category_id = '{{ old('sub_category_id', $farm_product->sub_category_id) }}';
    
    $('select#category').val(category_id).prop('selected', true);

    subCategoryUpdate(category_id);

    $("select#category").change(function(e){  
        var category_id = e.target.value;
        sub_category_id = false;
        subCategoryUpdate(category_id);
    });

    function subCategoryUpdate(categoryId) {
        $.get('{{ url('farmer/selectCategory') }}?category_id=' + categoryId , function (data) {
            $('select#sub_category').empty();
            $.each(data, function (index, subCatObj) {
                $('select#sub_category').append($('<option>', {
                    value: subCatObj.id,
                    text: subCatObj.name
                }));
            });
            if (sub_category_id) {
                $('select#sub_category').val(sub_category_id).prop('selected', true);
            }
        });
    }

    $('select#status').change(function() {

        $('#plant_date').prop('disabled', false);
        $('#grow_estimate').prop('disabled', false);

        if($(this).val() == 'release') {
            $('#plant_date').prop('disabled', true);
            $('#grow_estimate').prop('disabled', true);
        }
    });

    $('#description').summernote({
        height: 300,
        callbacks: {
            onImageUpload: function(files, editor, $editable) {
                // alert('evoked');
                sendFile(files[0],editor,$editable);
            }
        }
    });
    function sendFile(file,editor,welEditable) {
        data = new FormData();
        data.append("file", file);
        data.append("_token", "{{ csrf_token() }}");
        $.ajax({
            url: "{{ url('upload/image') }}",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(s){
                $('#description').summernote("insertImage", s);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus+" "+errorThrown);
            }
        });
    }  
</script>
@endsection