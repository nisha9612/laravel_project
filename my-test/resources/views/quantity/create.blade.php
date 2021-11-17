@extends('quantity.layout')
 
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Inward Outward Quantity</h2>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('quantity.store') }}" method="POST" enctype="multipart-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Material Category:</strong>
                <select name="category_id" class="form-control" id="category_id" required>
                    <option value="">--- Select Material Category ---</option>
                    @foreach ($category as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->raw_material }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Material Name:</strong>
                <select name="material_id" class="form-control" id="material_id" required>
                    <option value="">--- Select Material ---</option>
                    @foreach ($material as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->material_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" name="date" class="form-control" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Inwd Otwd Quantity:</strong>
                <input type="text" name="inwd_outwd_qty" class="form-control" id="inwd_outwd_qty" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection