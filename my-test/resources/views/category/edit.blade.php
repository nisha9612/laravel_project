@extends('category.layout')
 
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Category
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
      <form method="post" action="{{ route('category.update', $category->id) }}">
                @csrf
 
        @method('PUT')
 
        <div class="form-group">
          <label for="raw_material">Raw Material:</label>
          <input type="text" class="form-control" name="raw_material" id="raw_material" value={{ $category->raw_material }} />
        </div>
        <div class="form-group">
          <label for="finish_goods">Finish Goods:</label>
          <input type="text" class="form-control" name="finish_goods" id="finish_goods" value={{ $category->finish_goods }} />
        </div>
        <div class="form-group">
          <label for="spares">Spares:</label>
          <input type="text" class="form-control" name="spares" id="spares" value={{ $category->spares }} />
        </div>
        <div class="form-group">
          <label for="machines">Machines:</label>
          <input type="text" class="form-control" name="machines" id="machines" value={{ $category->machines }} />
        </div>
        <div class="form-group">
          <label for="others">Others:</label>
          <input type="text" class="form-control" name="others" id="others" value={{ $category->others }} />
        </div>
        
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection