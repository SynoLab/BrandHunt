@extends('layouts.admin_includes.app')

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Blogs</h3>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
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
                                        <li class="nk-block-tools-opt ml-auto"><a
                                                href="{{ route('blogs.create') }}"
                                                class="btn btn-primary"><em
                                                    class="icon ni ni-plus"></em><span>Add Blog</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Blog Name</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Gallery Images</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$blog->blog_name}}</td>
                                            <td>{{$blog->author}}</td>
                                            <td>{{$blog->date}}</td>
                                            <td>{!!$blog->description!!}</td>
                                            <td class="table-td">
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt="blog Image" style="max-width: 50px; max-height: 50px;">
                                            </td>


                                            <td class="table-td">
                                                @foreach ($blog->galleryImages as $galleryImage)
                                                    <img src="{{ asset('storage/' . $galleryImage->image_url) }}" alt="Gallery Image" style="max-width: 50px; max-height: 50px;">
                                                @endforeach
                                            </td>
                                            

                                            <td class="table-td">
                                                <a class="btn btn-info btn-sm" href="{{ route('blogs.edit', $blog->id) }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
    
                                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?')">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                        @php
                                            $no = $no +1;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
@endsection
