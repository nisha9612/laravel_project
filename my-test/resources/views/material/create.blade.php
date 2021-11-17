@extends('material.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Material</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('material.index') }}"> Back</a>
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

<form action="{{ route('material.store') }}" method="POST" enctype="multipart-data">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Material:</strong>
                <select name="category_id" class="form-control" id="category_id" required>
                    <option value="">--- Select Category ---</option>
                    @foreach ($category as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->raw_material }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Material Name:</strong>
                <input type="text" name="material_name" class="form-control" placeholder="Enter Material Name" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Opening Balance:</strong>
                <input type="text" name="opening_bal" class="form-control" placeholder="Enter Opening Balance" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection