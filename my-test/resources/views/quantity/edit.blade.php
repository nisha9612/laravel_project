@extends('quantity.layout')
 
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Manage Page
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('quantity.update', $quantity->id) }}">
                @csrf
 
        @method('PUT')
 
        <div class="form-group">
                <strong>Material Category:</strong>
                <select name="category_id" class="form-control" id="category_id" required>
                    <option value="">--- Select Material Category ---</option>
                    @foreach ($category as $key => $value)
                        <option value="{{ $value->id }}" {{$material_list->category_id == $value->id  ? 'selected' : ''}}>{{ $value->raw_material }}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group">
                <strong>Material Name:</strong>
                <select name="material_id" class="form-control" id="material_id" required>
                    <option value="">--- Select Material Name ---</option>
                    @foreach ($material as $key => $value)
                        <option value="{{ $value->id }}" {{$material_list->material_id == $value->id  ? 'selected' : ''}}>{{ $value->material_name }}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group">
          <label for="spares">Opening Balance :</label>
          <input type="text" class="form-control" name="opening_bal" id="opening_bal" disabled value={{ $material_list->opening_bal }} />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Inwd Otwd Quantity:</strong>
                <input type="text" name="inwd_outwd_qty" class="form-control" id="inwd_outwd_qty" disabled value={{ $quantity->inwd_outwd_qty }}>
            </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection