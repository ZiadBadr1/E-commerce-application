@extends('admin.layouts.master')
@section('show-category','show')
@section('active-category','active')
@section('content')
{{--    @dd($errors->all())--}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('admin.category.index') }}" class="mr-3"><i class="fas fa-arrow-left"></i> Back</a>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Category</li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>

    <div class="row justify-content-center">
        @include('alert')
        <div class="col-lg-10">
            <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "
                                   id="" aria-describedby=""
                                   placeholder="Enter name of category" value="{{old('name')}}">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description"
                                      class="form-control @error('description') is-invalid @enderror ">{{old('description')}}</textarea>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
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
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </form>

        </div>
    </div>
    @push('script')
        <script>
            document.getElementById('customFile').addEventListener('change', function (e) {
                var fileName = document.getElementById('customFile').files[0].name;
                var nextSibling = e.target.nextElementSibling;
                nextSibling.innerText = fileName;
            });
        </script>
    @endpush
@endsection