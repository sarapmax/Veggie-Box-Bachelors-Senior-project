@extends('admin.layouts.master')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Category</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="index.html">Dashboard</a>
			</li>
			<li>
				<a href="#">Category</a>
			</li>
			<li class="active">
				<strong>Create Category</strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">

	         <div class="ibox">
                <div class="ibox-title">
                    <h5>Add Product Category</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/category') }}" class="btn btn-primary"><i class="fa fa-arrow-up"> </i> Add Category</a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form class="form-horizontal">
                        <div class="form-group">
                        	<label class="col-lg-2 control-label">Category Name</label>
                            <div class="col-lg-6">
                            	<input type="text" placeholder="Enter product name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                        	<label class="col-lg-2 control-label">Category Description</label>
                            <div class="col-lg-6">
                            	<textarea cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection