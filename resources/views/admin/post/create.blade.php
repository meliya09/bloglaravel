@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7 mx-auto">
        <div class="card">
            <div class="card-header bg-white">
                <h4>Tambah Posts</h4>
            </div>
            <div class="card-body">
                <form action='{{ url('admin/posts') }}' method='post' enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                        @error('title')<span class="invalid-feedback"
                            role="alert"><strong>{{message}}</strong></span>@enderror
                    </div>

                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $key => $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Author Name</label>
                        <input type="text" class="form-control @error('author_name') is-invalid @enderror"
                            name="author_name">
                        @error('author_name')<span class="invalid-feedback"
                            role="alert"><strong>{{message}}</strong></span>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content"></textarea>
                        @error('content')<span class="invalid-feedback"
                            role="alert"><strong>{{message}}</strong></span>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection