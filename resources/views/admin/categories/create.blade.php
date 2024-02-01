@extends('layouts.admin_includes.app')

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Manage Category</h3>
                        </div>
                    </div>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                   data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt"><a href="{{ route('home') }}"
                                                                          class="btn btn-danger"><em
                                                    class="icon ni ni-arrow-left"></em><span>Go to
                                                                    Dashboard</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your
                                    input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">{{ isset($category) ? 'Edit' : 'Create' }} Category
                                        </h5>
                                    </div>
                                    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if (isset($category))
                                            @method('PUT')
                                        @endif
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="category_name">Category Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" placeholder="Category Name" id="category_name" name="category_name" value="{{ isset($category) ? $category->category_name : old('category_name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="category_image">Category Image</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" name="category_image" id="category_image" class="form-control" />
                                                        @if(isset($category) && $category->category_image)
                                                            <div class="mt-2">
                                                                <img src="{{ asset('storage/' . $category->category_image) }}" alt="Current Image" style="max-width: 200px;" />
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="category_description">Category Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" placeholder="Category Description" id="category_description" name="category_description">{{ isset($category) ? $category->category_description : old('category_description') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <div class="form-group">
                                                    <button type="submit" class="col-md-12 btn btn-lg btn-primary text-center" name="submit">
                                                        {{ isset($category) ? 'Update' : 'Save' }} Category
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-6">
                                                <div class="form-group">
                                                    <button type="reset" class="col-md-12 btn btn-lg btn-danger text-center">
                                                        Reset Category
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('category_description');
    </script>
@endsection
