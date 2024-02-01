@extends('layouts.admin_includes.app')

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Manage Blogs</h3>
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
                                        <h5 class="card-title">{{ isset($blog) ? 'Edit' : 'Create' }} Blog
                                        </h5>
                                    </div>
                                    <form action="{{ isset($blog) ? route('blogs.update', $blog->id) : route('blogs.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if (isset($blog))
                                            @method('PUT')
                                        @endif
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="blog_name">Blog Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" placeholder="Blog Name" id="blog_name" name="blog_name" value="{{ isset($blog) ? $blog->blog_name : old('blog_name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="author">Author</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" placeholder="Author" id="author" name="author" value="{{ isset($blog) ? $blog->author : old('author') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="date">Date</label>
                                                    <div class="form-control-wrap">
                                                        <input type="date" class="form-control" id="date" name="date" value="{{ isset($blog) ? $blog->date : old('date') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="description">Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" placeholder="Description" id="description" name="description">{{ isset($blog) ? $blog->description : old('description') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="image">Blog Image</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" name="image" id="image" class="form-control" />
                                                    </div>
                                                    @if(isset($blog) && $blog->image)
                                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="gallery_images">Gallery Images</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" name="gallery_images[]" id="gallery_images" class="form-control" multiple />
                                                        @if(isset($blog) && $blog->gallery_images)
                                                        <div class="mt-2" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                                                            @foreach(json_decode($blog->gallery_images) as $image)
                                                                <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" style="max-width: 200px; margin-right: 10px;">
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    </div>
                                                    <!-- You can add gallery images preview here if needed -->
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="col-md-12 btn btn-lg btn-primary text-center" name="submit">
                                                        {{ isset($blog) ? 'Update' : 'Save' }} Blog
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="reset" class="col-md-12 btn btn-lg btn-danger text-center">
                                                        Reset Blog
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
        CKEDITOR.replace('description');
    </script>
@endsection
