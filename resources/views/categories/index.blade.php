@extends('categories.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1>Test Laravel 6</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New category</a>
            </div>
        </div>
    </div>
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
 
                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $categories->links() !!}
      
@endsection