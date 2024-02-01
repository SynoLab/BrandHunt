@extends('layouts.admin_includes.app')

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Products</h3>
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
                                                href="{{ route('products.create') }}"
                                                class="btn btn-primary"><em
                                                    class="icon ni ni-plus"></em><span>Add Product</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner" style="overflow-x: auto; scrollbar-width: thin;">
                            <table class="datatable-init-export nowrap table" data-export-title="Export">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Cat Id</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Qty</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        {{-- <th>Short Description</th> --}}
                                        {{-- <th>SKU</th> --}}
                                        <th>Gallery Images</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                    @foreach($products as $product)
                                        <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                            <td class="table-td">{{ $product->id }}</td>
                                            <td class="table-td">{{ $product->category_id }}</td>
                                            <td class="table-td"><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 50px; max-height: 50px;"></td>
                                            <td class="table-td">{{ $product->name }}</td>
                                            <td class="table-td">{{ $product->quantity }}</td>
                                            <td class="table-td">{!! $product->description !!}</td>
                                            <td class="table-td">{{ $product->price }}</td>
                                            {{-- <td class="table-td">{!! $product->short_description !!}</td> --}}
                                            {{-- <td class="table-td">{{ $product->sku }}</td> --}}
                                            <td class="table-td">
                                                @foreach ($product->galleryImages as $galleryImage)
                                                    <img src="{{ asset('storage/' . $galleryImage->image_url) }}" alt="Gallery Image" style="max-width: 50px; max-height: 50px;">
                                                @endforeach
                                            </td>
                                            
                                            <td class="table-td">
                                                <a class="btn btn-info btn-sm" href="{{ route('products.show', $product) }}">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a class="btn btn-warning btn-sm" href="{{ route('products.edit', $product) }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
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
