@extends('category.layout')
 
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
 
  <div class="card uper">
 
  <div class="card-header">
    <a class="btn btn-primary" href="{{ route('category.create') }}"> Create New Category</a>
  </div>
 
  <div class="card-body">
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
     <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Raw Materials</td>
          <td>Finish Goods</td>
          <td>Spares</td>
          <td>Machines</td>
          <td>Others</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody>
         @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->raw_material }}</td>
            <td>{{ $value->finish_goods }}</td>
            <td>{{ $value->spares }}</td>
            <td>{{ $value->machines }}</td>
            <td>{{ \Str::limit($value->others, 100) }}</td>
            <td>
                <form action="{{ route('category.destroy',$value->id) }}" method="POST">    
                    <a class="btn btn-primary" href="{{ route('category.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
  
@endsection