@extends('quantity.layout')
 
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
 
  <div class="card uper">
 
  <div class="card-header">
    <a class="btn btn-primary" href="{{ route('quantity.create') }}"> Add New Quantity</a>
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
          <td>Material Category</td>
          <td>Material Name</td>
          <td>Opening Balance</td>
          <td>Current Balance</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>
    <tbody>
       
        @foreach ($material_list as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->raw_material }}</td>
            <td>{{ $value->material_name }}</td>
            <td>{{ $value->opening_bal }}</td>
            <td><?php 
                  if($value->inwd_outwd_qty > 0 ) {
                     echo (round( $value->opening_bal + $value->inwd_outwd_qty )); 
                   }
                  else if($value->inwd_outwd_qty < 0 ) {
                     echo (round( $value->opening_bal + $value->inwd_outwd_qty ));
                   }


             ?></td>
            <td>
                <form action="{{ route('quantity.destroy',$value->id) }}" method="POST">    
                    <a class="btn btn-primary" href="{{ route('quantity.edit',$value->id) }}">Edit</a>   
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