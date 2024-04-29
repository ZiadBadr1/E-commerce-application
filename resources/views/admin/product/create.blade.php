@extends('admin.layouts.master')
@section('show-product','show')
@section('active-product','active')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('admin.product.index') }}" class="mr-3"><i class="fas fa-arrow-left"></i> Back</a>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>
    <div class="row justify-content-center">
        @include('alert')

        <div class="col-lg-10 mb-5" id="app">
            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">@csrf
                <div class="card mb-6">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Create Product</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "
                                   id="" aria-describedby=""
                                   placeholder="Enter name of product" value="{{old('name')}}">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id=""
                                      class="form-control @error('description') is-invalid @enderror ">{{old('description')}}</textarea>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Price($)</label>
                            <input type="number" step="any" name="price"
                                   class="form-control @error('price') is-invalid @enderror "
                                   id="" aria-describedby="" value="{{old('price')}}">
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="">quantity</label>
                            <input type="number" name="quantity"
                                   class="form-control @error('quantity') is-invalid @enderror "
                                   id="" aria-describedby="" value="{{old('quantity')}}"
                            >
                            @error('quantity')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="">Choose Category</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">select</option>
                                @foreach($categories as $key=> $category)
                                    <option value="{{$category->id}}" @selected(old('category_id') == $category->id)>{{$category->name}}</option>
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
            $(document).ready(function () {
                // Cache the category dropdown
                var categoryDropdown = $('select[name="category_id"]');

                // Cache the sub-category dropdown
                var subCategoryDropdown = $('select[name="sub_category_id"]');
                var oldSubCategoryId = '{{ old('sub_category_id') }}';


                // Function to fetch sub-categories
                function fetchSubCategories(id) {
                    if (id) {
                        $.ajax({
                            url: '/admin/sub_categories/' + id,
                            type: "GET",
                            dataType: "json",
                            success: function (data) {
                                subCategoryDropdown.empty();
                                $.each(data, function (key, value) {
                                    subCategoryDropdown.append('<option value="' + key + '">' + value + '</option>');
                                });
                                if (oldSubCategoryId !== '') {
                                    subCategoryDropdown.val(oldSubCategoryId);
                                }
                            }
                        });
                    } else {
                        subCategoryDropdown.empty();
                    }
                }

                // Trigger fetchSubCategories function on page load
                fetchSubCategories(categoryDropdown.val());

                // Event handler for category dropdown change
                categoryDropdown.on('change', function () {
                    var id = $(this).val();
                    fetchSubCategories(id);
                });
            });
        </script>

        <script>
            document.getElementById('customFile').addEventListener('change', function (e) {
                var fileName = document.getElementById('customFile').files[0].name;
                var nextSibling = e.target.nextElementSibling;
                nextSibling.innerText = fileName;
            });
        </script>
    @endpush

@endsection


