@extends('admin.layouts.master')
@section('show-category','show')
@section('active-sub-category','active')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('admin.sub-category.index') }}" class="mr-3"><i class="fas fa-arrow-left"></i> Back</a>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.sub-category.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category</li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </div>
{{--    @dd($errors->all())--}}
    <div class="row justify-content-center">
        @include('alert')
        <div class="col-lg-10">
            <form action="{{route('admin.sub-category.update',$subCategory)}}" method="POST" enctype="multipart/form-data">@csrf
                @method('PUT')
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "
                                   id="" aria-describedby=""
                                   placeholder="Enter name of category" value="{{old('name',$subCategory->name)}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Main Category</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                                <option value="">select</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @selected($category->id == $subCategory->category_id)>{{$category->name}}</option>
                                @endforeach

                            </select>

                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('description') is-invalid @enderror"
                                       id="customFile" name="icon">
                                <label class="custom-file-label  " for="customFile">Choose file</label>
                                @error('icon')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Current Image</label><br>
                                <img src="{{ ($subCategory->icon()) }}" alt="Category Image" width="100">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection