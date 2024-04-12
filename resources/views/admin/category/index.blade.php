@extends('admin.layouts.master')
@section('show-category','show')
@section('active-category','active')
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category Tables</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active" aria-current="page">category Tables</li>
            </ol>
        </div>
        @include('alert')
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                        <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-primary">Create New</a>

                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>SN</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($categories)>0)
                                @foreach($categories as $key=> $category)
                                    <tr>

                                        <td><a href="#">{{$key+1}}</a></td>
                                        <td><img src="{{$category->icon()}}" width="100"></td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>

                                        <td class="align-middle">
                                            <div style="display: inline-block;">
                                                <a href="{{route('admin.category.edit',$category)}}"
                                                   class="btn btn-sm btn-icon btn-secondary">
                                                    <i class="fa fa-pencil-alt"></i> <span
                                                            class="sr-only">Edit</span>
                                                </a>
                                            </div>
                                            <div style="display: inline-block;">
                                                <form id="deleteForm_{{ $category->id }}" method="POST" action="{{ route('admin.category.destroy', $category) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-icon btn-secondary inline delete-btn" data-id="{{ $category->id }}">
                                                        <i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            @else
                                <td>No category created yet!</td>
                            @endif



                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$categories->links()}}
                    </div>

                </div>
            </div>
        </div>
        <!--Row-->
    </div>
{{--    Delete Modal--}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this category?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            // Attach click event handler to delete button
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const categoryId = this.getAttribute('data-id');
                    $('#deleteModal').modal('show');

                    // Handle delete confirmation
                    $('#confirmDelete').on('click', function() {
                        $('#deleteForm_' + categoryId).submit();
                    });
                });
            });
        </script>
    @endpush
@endsection