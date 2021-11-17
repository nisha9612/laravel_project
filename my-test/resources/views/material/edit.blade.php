@extends('material.layout')
 
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Material
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
      <form method="post" action="{{ route('material.update', $material->id) }}">
                @csrf
 
        @method('PUT')
 
        <div class="form-group">
                <strong>Material Category:</strong>
                <select name="category_id" class="form-control" id="category_id" required>
                    <option value="">--- Select Material Category ---</option>
                    @foreach ($category as $key => $value)
                        <option value="{{ $material->category_id }}" {{$material->category_id == $value->id  ? 'selected' : ''}}>{{ $value->raw_material }}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
          <label for="finish_goods">Material Name :</label>
          <input type="text" class="form-control" name="material_name" id="material_name" value={{ $material->material_name }} />
        </div>
        <div class="form-group">
          <label for="spares">Opening Balance :</label>
          <input type="text" class="form-control" name="opening_bal" id="opening_bal" value={{ $material->opening_bal }} />
        </div>
        
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection