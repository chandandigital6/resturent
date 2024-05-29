<!-- resources/views/menus/edit.blade.php -->
@extends('layouts.aap')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Menu</h1>
        <div class="card">
            <div class="card-header">
                <h3>Menu Details</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        @if($menu && $menu->image)
                            <img src="{{ asset('storage/' . $menu->image) }}" alt="Menu Image" class="img-thumbnail mt-3" width="200">
                        @else
                            <div class="mt-3">No image available</div>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="heading" class="form-label">Heading</label>
                        <input type="text" class="form-control" id="heading" name="heading" value="{{ old('heading', $menu->heading) }}">
                        @error('heading')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $menu->title) }}">
                        @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $menu->price) }}">
                        @error('price')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select form-control" id="category_id" name="category_id">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $menu->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Menu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
