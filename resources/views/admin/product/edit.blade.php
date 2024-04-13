@extends('admin.layouts.master')
@section('show-product','show')
@section('active-product','active')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 ml-4 text-gray-800">Product</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
    </div>

    <div class="row justify-content-center">

        @include('alert')

        <div class="col-lg-10">
            <form action="{{route('product.update',[$product])}}" method="POST" enctype="multipart/form-data">@csrf
                @method('PUT')
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Product</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "
                                   id="" aria-describedby=""
                                   placeholder="Enter name of product">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id=""
                                      class="form-control @error('description') is-invalid @enderror "></textarea>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Price($)</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror "
                                   id="" aria-describedby="">
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Choose Category</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">select</option>
                                @foreach(App\Category::all() as $key=> $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="">Choose Subcategory</label>
                            <select name="sub_category_id"
                                    class="form-control @error('sub_category_id') is-invalid @enderror">
                                <option value="">select</option>
                            </select>
                            @error('sub_category_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror  "
                                       id="customFile" name="image">
                                <label class="custom-file-label  " for="customFile">Choose file</label>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                          </span>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript">
            $("document").ready(function () {
                $('select[name="category_id"]').on('change', function () {
                    let id = $(this).val();
                    if (id) {
                        $.ajax({

                            url: '/sub_categories/' + id,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                $('select[name="sub_category_id"]').empty();
                                $.each(data, function (key, value) {
                                    $('select[name="sub_category_id"]').append('<option value=" ' + key + '">' + value + '</option>');
                                })
                            }
                        })
                    } else {
                        $('select[name="sub_category_id"]').empty();
                    }
                });
            });
        </script>
    @endpush

@endsection