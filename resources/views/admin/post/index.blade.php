@extends('layouts.app')

@section('content')

<div class="container">
  @if(session('message'))
  <div class="alert alert-success">{{session('message')}}</div>
  @endif
<div class="card">
  <div class="card-header d-flex justify-content-between align-item-center">
    <h4>Post</h4>
    <a href="{{url('admin/posts/create')}}" class="btn btn-primary">Tambah</a>
  </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <!-- <th scope="col">Publication Date</th> -->
      <th scope="col">Content</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($posts as $key => $data)
    <tr>
      <th>{{$key+1}}</th>
      <td>{{$data->title}}</td>
      <td>{{$data->author_name}}</td>
      <!-- <td>{{$data->publication_date}}</td> -->
      <td>{{$data->content}}</td>
    <td>
      <a href="{{url('admin/posts/edit/'.$data->id)}}" class="btn btn-primary">Edit</a>
      @include('admin.post.delete')
    </td>
    </tr>
    @empty
    <td colspan="5" class="text-center">Tidak Ada Data Post</td>

    @endforelse

    
   
  </tbody>
</table>
</div>
</div>

@endsection