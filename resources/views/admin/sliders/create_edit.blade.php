@extends('layouts.admin_includes.app')

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Manage Sliders</h3>
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
                                        <h5 class="card-title">{{ isset($slider) ? 'Edit' : 'Create' }} Slider
                                        </h5>
                                    </div>
                                    <form action="{{ isset($slider) ? route('sliders.update', $slider->id) : route('sliders.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if (isset($slider))
                                            @method('PUT')
                                        @endif
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="title">Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="{{ isset($slider) ? $slider->title : old('title') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="description">Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" placeholder="Description" id="description" name="description">{{ isset($slider) ? $slider->description : old('description') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="image">Slider Image</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" name="image" id="image" class="form-control" />
                                                    </div>
                                                    @if(isset($slider) && $slider->image)
                                                        <img src="{{ asset('slider_images/' . $slider->image) }}" alt="Slider Image" width="100">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="col-md-12 btn btn-lg btn-primary text-center" name="submit">
                                                        {{ isset($slider) ? 'Update' : 'Save' }} Slider
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="reset" class="col-md-12 btn btn-lg btn-danger text-center">
                                                        Reset Slider
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
