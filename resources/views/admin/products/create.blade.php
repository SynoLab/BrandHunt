
@extends('layouts.admin_includes.app')

@section('content')
    <div class="container-xl wide-xl">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Add Product</h3>
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
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
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
                                        <h5 class="card-title">{{ isset($product) ? 'Edit' : 'Create' }} Product
                                        </h5>
                                    </div>
                                    <form id="productForm" action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if (isset($product))
                                            @method('PUT')
                                        @endif
                                        <div class="row g-4">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Product
                                                        Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" placeholder="Product Name" id="name" name="name" value="{{ isset($product) ? $product['name'] : old('name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Product
                                                        Image</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" name="image" value="{{isset($product) ? $product['image']:old('image')}}" id="image" class="form-control" />
                                                    @if(isset($product) && $product->image)
                                                            <div class="mt-2">
                                                                <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" style="max-width: 200px;" />
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Product Category</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-control js-example-basic-single" id="category" name="category_id">
                                                            <option>Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}" {{ isset($product->category_id) == $category->id ? 'selected' : '' }}>{{$category->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Product Qty</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="quantity" name="quantity" value="{{ isset($product) ? $product['quantity'] : old('quantity') }}">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="gallery_images">Gallery Images</label>
                                                    <div class="form-control-wrap">
                                                        <input type="file" id="gallery_images" name="gallery_images[]" multiple>
                                                        @if(isset($product) && $product->galleryImages->isNotEmpty())
                                                            <div class="mt-2" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
                                                                @foreach($product->galleryImages as $image)
                                                                    <img src="{{ asset('storage/' . $image->image_url) }}" alt="Gallery Image" style="max-width: 200px; margin-right: 10px;">
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            


                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="price">Price</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="price" name="price" value="{{ isset($product) ? $product['price'] : old('price') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="sku">SKU</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="sku" name="sku" value="{{ isset($product) ? $product['sku'] : old('sku') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Short Description</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="short_description" name="short_description" value="{{ isset($product) ? $product['short_description'] : old('short_description') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Product Description</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" id="product_description" name="description">{{isset($product) ? $product['description']:old('description')}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="form-group">
                                                <button type="button" id="addProductBtn"
                                                        class="col-md-12 btn btn-lg btn-primary text-center"
                                                        name="submit">
                                                    {{ isset($product) ? 'Update' : 'Save' }}
                                                    Product
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="form-group">
                                                <button type="reset"
                                                        class="col-md-12 btn btn-lg btn-danger text-center">Reset
                                                    Product</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card-preview -->
                </div> <!-- nk-block -->
            </div>
        </div>
    </div>
    <script>
        // CKEDITOR.replace('short_description');
        CKEDITOR.replace('product_description');

        $(document).ready(function () {
            $('#addProductBtn').on('click', function (event) {
                event.preventDefault(); // Prevent default form submission

                // Serialize form data
                var formData = new FormData($('#productForm')[0]);

                // Add CSRF token to formData
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                // Add method override for PUT requests
                formData.append('_method', '{{ isset($product) ? 'PUT' : 'POST' }}');

                // Make AJAX request
                $.ajax({
                    url: "{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response);
                        alert('Product {{ isset($product) ? 'Updated' : 'Added' }} successfully.');
                        window.location.href = "{{ route('products.index') }}";
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
