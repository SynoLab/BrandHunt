

@extends('layouts.admin_includes.app')

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">All Sliders</h3>
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
                                                href="{{ route('sliders.create') }}"
                                                class="btn btn-primary"><em
                                                    class="icon ni ni-plus"></em><span>Add Slider</span></a>
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
                                        <th scope="col" class="table-th">ID</th>
                                        <th scope="col" class="table-th">Title</th>
                                        <th scope="col" class="table-th">Description</th>
                                        <th scope="col" class="table-th">Image</th>
                                        <th scope="col" class="table-th">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($sliders as $slider)
                                    <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                        <td class="table-td">{{ $slider->id }}</td>
                                        <td class="table-td">{{ $slider->title }}</td>
                                        <td class="table-td">{!! $slider->description !!}</td>
                                        <td class="table-td">
                                            <img src="{{ asset('slider_images/' . $slider->image) }}" alt="Slider Image" style="max-width: 50px; max-height: 50px;">
                                        </td>
                                        
                                        <td class="table-td">
                                            <a class="btn btn-info btn-sm" href="{{ route('sliders.edit', $slider->id) }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this slider?')">
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

