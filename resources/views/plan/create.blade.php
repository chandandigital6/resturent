@extends('layouts.aap')
@section('content')
    <div class="container mt-5">
        <h1>Create plans</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('plan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" id="price" required>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="msg">Massage</label>
                <input type="text" class="form-control" name="msg" id="fe_1">
            </div>

            <div class="form-group">
                <label for="fe_2">Feature 2</label>
                <input type="text" class="form-control" name="fe_2" id="fe_2">
            </div>

            <div class="form-group">
                <label for="fe_3">Feature 3</label>
                <input type="text" class="form-control" name="fe_3" id="fe_3">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
