@extends('layouts.app')

@section('content')

<div class="container">
  @if(session('message'))
  <div class="alert alert-success">{{session('message')}}</div>
  @endif
<div class="card">
  <div class="card-header d-flex justify-content-between align-item-center">
    <h4>Category</h4>
    <a href="{{url('admin/categories/create')}}" class="btn btn-primary">Tambah</a>
  </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Slug</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($categories as $key => $data)
    <tr>
      <th>{{$key+1}}</th>
      <td>{{$data->name}}</td>
      <td>{{$data->slug}}</td>
    <td>
      <a href="{{url('admin/categories/edit/'.$data->id)}}"  class="btn btn-primary">Edit</a>
      @include('admin.category.delete')
    </td>
    </tr>
    @empty
    <td colspan="4" class="text-center">Tidak Ada Data Category</td>

    @endforelse

    
   
  </tbody>
</table>
</div>
</div>

@endsection