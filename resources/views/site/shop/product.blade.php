@extends('layouts.site_includes.app')
@section('content')
<div id="page-content">
    <!--MainContent-->
    <div id="MainContent" class="main-content" role="main">
        <!--Breadcrumb-->
        {{-- <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Product Description</span>
            </div>
        </div> --}}
        <!--End Breadcrumb-->
        
        <div id="ProductSection-product-template" class="product-template__container prstyle2 container">
            <!--#ProductSection-product-template-->
            <div class="product-single product-single-1">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img product-single__photos bottom">
                            <div class="zoompro-wrap product-zoom-right pl-20">
                                <div class="zoompro-span">
                                    <img class="blur-up2 lazyload zoompro" data-zoom-image="{{ asset('storage/' . $product->image) }}" alt="" src="{{ asset('storage/' . $product->image) }}" />
                                </div>
                                <div class="product-labels"><span class="lbl on-sale">Sale</span><span class="lbl pr-label1">new</span></div>
                                <div class="product-buttons">
                                </div>
                            </div>
                            <div class="product-thumb product-thumb-1">
                                <div id="gallery" class="product-dec-slider-1 product-tab-left">
                                    @foreach ($product->galleryImages as $galleryImage)
                                        <a data-image="{{ asset('storage/' . $galleryImage->image_url) }}" data-zoom-image="{{ asset('storage/' . $galleryImage->image_url) }}" class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1">
                                            <img src="{{ asset('storage/' . $galleryImage->image_url) }}" alt="Gallery Image" class="blur-up lazyload">
                                        </a>
                                    @endforeach
                                </div>
                                
                            </div>

                            <div class="lightboximages">
                                <a href="{{ asset('site/assets/images/product-detail-page/camelia-reversible-big1.jpg') }}" data-size="1462x2048"></a>
                               
                                                               
                            </div>

                        </div>
                        <!--Product Feature-->
                        <div class="prFeatures">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 feature">
                                    {{-- <img src="assets/images/credit-card.png" alt="Safe Payment" title="Safe Payment" /> --}}
                                    <img src="{{ asset('site/assets/images/credit-card.png') }}" alt="Safe Payment" title="Safe Payment" />

                                    <div class="details"><h3>Safe Payment</h3>Pay with the world's most payment methods.</div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 feature">
                                    {{-- <img src="assets/images/shield.png" alt="Confidence" title="Confidence" /> --}}
                                    <img src="{{ asset('site/assets/images/shield.png') }}" alt="Confidence" title="Confidence" />

                                    <div class="details"><h3>Confidence</h3>Protection covers your purchase and personal data.</div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 feature">
                                    {{-- <img src="assets/images/worldwide.png" alt="Worldwide Delivery" title="Worldwide Delivery" /> --}}
                                    <img src="{{ asset('site/assets/images/worldwide.png') }}"  alt="Worldwide Delivery" title="Worldwide Delivery" />

                                    <div class="details"><h3>Worldwide Delivery</h3>FREE &amp; fast shipping to over 200+ countries &amp; regions.</div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6 feature">
                                    {{-- <img src="assets/images/phone-call.png" alt="Hotline" title="Hotline" /> --}}
                                    <img src="{{ asset('site/assets/images/phone-call.png') }}"  alt="Hotline" title="Hotline" />

                                    <div class="details"><h3>Hotline</h3>Talk to help line for your question on 4141 456 789, 4125 666 888</div>
                                </div>
                            </div>
                        </div>
                        <!--End Product Feature-->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-single__meta">
                            <h1 class="product-single__title">Product Description</h1>
                            <div class="product-nav clearfix">					
                                <a href="#" class="next" title="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                            <div class="prInfoRow">
                                <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                                <div class="product-sku">SKU: <span class="variant-sku">{{ $product->sku }}</span></div>
                                {{-- <div class="product-review"><a class="reviewLink" href="#tab2"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6 reviews</span></a></div> --}}
                            </div>
                            <p class="product-single__price product-single__price-product-template">
                                <span class="visually-hidden">Regular price</span>
                                {{-- <s id="ComparePrice-product-template"><span class="money">$900.00</span></s> --}}
                                <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                    <span id="ProductPrice-product-template"><span class="money">${{ $product->price }}</span></span>
                                </span>
                                {{-- <span class="discount-badge"> <span class="devider">|</span>&nbsp;
                                    <span>You Save</span>
                                    <span id="SaveAmount-product-template" class="product-single__save-amount">
                                    <span class="money">$100.00</span>
                                    </span>
                                    <span class="off">(<span>16</span>%)</span>
                                </span>   --}}
                            </p>
                        <div class="product-single__description rte">
                        <p>{!! $product->short_description !!}</p>
                        </div>
                        <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
            {{-- Color Removed  --}}
                            <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                <div class="product-form__item">
                                  <label class="header">Size: <span class="slVariant">XS</span></label>
                                  <div data-value="XS" class="swatch-element xs available">
                                    <input class="swatchInput" id="swatch-1-xs" type="radio" name="option-1" value="XS">
                                    <label class="swatchLbl small" for="swatch-1-xs" title="XS">XS</label>
                                  </div>
                                  <div data-value="S" class="swatch-element s available">
                                    <input class="swatchInput" id="swatch-1-s" type="radio" name="option-1" value="S">
                                    <label class="swatchLbl small" for="swatch-1-s" title="S">S</label>
                                  </div>
                                  <div data-value="M" class="swatch-element m available">
                                    <input class="swatchInput" id="swatch-1-m" type="radio" name="option-1" value="M">
                                    <label class="swatchLbl small" for="swatch-1-m" title="M">M</label>
                                  </div>
                                </div>
                            </div>
                            {{-- <p class="infolinks"><a href="#sizechart" class="sizelink btn"> Size Guide</a> <a href="#productInquiry" class="emaillink btn"> Ask About this Product</a></p> --}}
                            <!-- Product Action -->
                            <div class="product-action clearfix">
                                <div class="product-form__item--quantity">
                                    <div class="wrapQtyBtn">
                                        <div class="qtyField">
                                            <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                            <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                            <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="product-form__item--submit">
                                    <button type="button" name="add" class="btn product-form__cart-submit">
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                            <!-- End Product Action -->
                        </form>
                        <div class="display-table shareRow">
                                <div class="display-table-cell medium-up--one-third">
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                    </div>
                                </div>
                                <div class="display-table-cell text-right">
                                    <div class="social-sharing">
                                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                                            <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                        </a>
                                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                        </a>
                                        <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share" >
                                            <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google+</span>
                                        </a>
                                        <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Pin on Pinterest">
                                            <i class="fa fa-pinterest" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Pin it</span>
                                        </a>
                                        <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                                            <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
                                        </a>
                                     </div>
                                </div>
                            </div>
                    </div>
                        <!--Product Tabs-->
                        <div class="tabs-listing">
                            <div class="tab-container">
                                <h3 class="acor-ttl active" rel="tab1">Product Details</h3>
                                <div id="tab1" class="tab-content">
                                    <div class="product-description rte">
                                        <p>{!! $product->description !!}</p>

                                    </div>
                                </div>
                                <h3 class="acor-ttl" rel="tab2">Product Reviews</h3>
                                <div id="tab2" class="tab-content">
                                    <div id="shopify-product-reviews">
                                        <div class="spr-container">
                                            <div class="spr-header clearfix">
                                                <div class="spr-summary">
                                                    <span class="product-review"><a class="reviewLink"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i> </a><span class="spr-summary-actions-togglereviews">Based on 6 reviews456</span></span>
                                                    <span class="spr-summary-actions">
                                                        <a href="#" class="spr-summary-actions-newreview btn">Write a review</a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="spr-content">
                                                <div class="spr-form clearfix">
                                                    <form method="post" action="#" id="new-review-form" class="new-review-form">
                                                        <h3 class="spr-form-title">Write a review</h3>
                                                        <fieldset class="spr-form-contact">
                                                            <div class="spr-form-contact-name">
                                                              <label class="spr-form-label" for="review_author_10508262282">Name</label>
                                                              <input class="spr-form-input spr-form-input-text " id="review_author_10508262282" type="text" name="review[author]" value="" placeholder="Enter your name">
                                                            </div>
                                                            <div class="spr-form-contact-email">
                                                              <label class="spr-form-label" for="review_email_10508262282">Email</label>
                                                              <input class="spr-form-input spr-form-input-email " id="review_email_10508262282" type="email" name="review[email]" value="" placeholder="john.smith@example.com">
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="spr-form-review">
                                                          <div class="spr-form-review-rating">
                                                            <label class="spr-form-label">Rating</label>
                                                            <div class="spr-form-input spr-starrating">
                                                              <div class="product-review"><a class="reviewLink" href="#"><i class="fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i></a></div>
                                                            </div>
                                                          </div>
                                                    
                                                          <div class="spr-form-review-title">
                                                            <label class="spr-form-label" for="review_title_10508262282">Review Title</label>
                                                            <input class="spr-form-input spr-form-input-text " id="review_title_10508262282" type="text" name="review[title]" value="" placeholder="Give your review a title">
                                                          </div>
                                                    
                                                          <div class="spr-form-review-body">
                                                            <label class="spr-form-label" for="review_body_10508262282">Body of Review <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                            <div class="spr-form-input">
                                                              <textarea class="spr-form-input spr-form-input-textarea " id="review_body_10508262282" data-product-id="10508262282" name="review[body]" rows="10" placeholder="Write your comments here"></textarea>
                                                            </div>
                                                          </div>
                                                        </fieldset>
                                                        <fieldset class="spr-form-actions">
                                                            <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                                                        </fieldset>
                                                    </form>
                                                </div>
                                                <div class="spr-reviews">
                                                    <div class="spr-review">
                                                        <div class="spr-review-header">
                                                            <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i></span></span>
                                                            <h3 class="spr-review-header-title">Lorem ipsum dolor sit amet</h3>
                                                            <span class="spr-review-header-byline"><strong>dsacc</strong> on <strong>Apr 09, 2019</strong></span>
                                                        </div>
                                                        <div class="spr-review-content">
                                                            <p class="spr-review-content-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <h3 class="acor-ttl" rel="tab3">Size Chart</h3>
                                <div id="tab3" class="tab-content">
                                    <h3>WOMEN'S BODY SIZING CHART</h3>
                                    <table>
                                      <tbody>
                                        <tr>
                                          <th>Size</th>
                                          <th>XS</th>
                                          <th>S</th>
                                          <th>M</th>
                                          <th>L</th>
                                          <th>XL</th>
                                        </tr>
                                        <tr>
                                          <td>Chest</td>
                                          <td>31" - 33"</td>
                                          <td>33" - 35"</td>
                                          <td>35" - 37"</td>
                                          <td>37" - 39"</td>
                                          <td>39" - 42"</td>
                                        </tr>
                                        <tr>
                                          <td>Waist</td>
                                          <td>24" - 26"</td>
                                          <td>26" - 28"</td>
                                          <td>28" - 30"</td>
                                          <td>30" - 32"</td>
                                          <td>32" - 35"</td>
                                        </tr>
                                        <tr>
                                          <td>Hip</td>
                                          <td>34" - 36"</td>
                                          <td>36" - 38"</td>
                                          <td>38" - 40"</td>
                                          <td>40" - 42"</td>
                                          <td>42" - 44"</td>
                                        </tr>
                                        <tr>
                                          <td>Regular inseam</td>
                                          <td>30"</td>
                                          <td>30½"</td>
                                          <td>31"</td>
                                          <td>31½"</td>
                                          <td>32"</td>
                                        </tr>
                                        <tr>
                                          <td>Long (Tall) Inseam</td>
                                          <td>31½"</td>
                                          <td>32"</td>
                                          <td>32½"</td>
                                          <td>33"</td>
                                          <td>33½"</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <h3>MEN'S BODY SIZING CHART</h3>
                                    <table>
                                      <tbody>
                                        <tr>
                                          <th>Size</th>
                                          <th>XS</th>
                                          <th>S</th>
                                          <th>M</th>
                                          <th>L</th>
                                          <th>XL</th>
                                          <th>XXL</th>
                                        </tr>
                                        <tr>
                                          <td>Chest</td>
                                          <td>33" - 36"</td>
                                          <td>36" - 39"</td>
                                          <td>39" - 41"</td>
                                          <td>41" - 43"</td>
                                          <td>43" - 46"</td>
                                          <td>46" - 49"</td>
                                        </tr>
                                        <tr>
                                          <td>Waist</td>
                                          <td>27" - 30"</td>
                                          <td>30" - 33"</td>
                                          <td>33" - 35"</td>
                                          <td>36" - 38"</td>
                                          <td>38" - 42"</td>
                                          <td>42" - 45"</td>
                                        </tr>
                                        <tr>
                                          <td>Hip</td>
                                          <td>33" - 36"</td>
                                          <td>36" - 39"</td>
                                          <td>39" - 41"</td>
                                          <td>41" - 43"</td>
                                          <td>43" - 46"</td>
                                          <td>46" - 49"</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <div class="text-center">
                                        <img src="assets/images/size.jpg" alt="" />
                                    </div>
                              </div>
                                <h3 class="acor-ttl" rel="tab4">Shipping &amp; Returns</h3>
                                <div id="tab4" class="tab-content">
                                    <h4>Returns Policy</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros justo, accumsan non dui sit amet. Phasellus semper volutpat mi sed imperdiet. Ut odio lectus, vulputate non ex non, mattis sollicitudin purus. Mauris consequat justo a enim interdum, in consequat dolor accumsan. Nulla iaculis diam purus, ut vehicula leo efficitur at.</p>
                                    <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In blandit nunc enim, sit amet pharetra erat aliquet ac.</p>
                                    <h4>Shipping</h4>
                                    <p>Pellentesque ultrices ut sem sit amet lacinia. Sed nisi dui, ultrices ut turpis pulvinar. Sed fringilla ex eget lorem consectetur, consectetur blandit lacus varius. Duis vel scelerisque elit, et vestibulum metus.  Integer sit amet tincidunt tortor. Ut lacinia ullamcorper massa, a fermentum arcu vehicula ut. Ut efficitur faucibus dui Nullam tristique dolor eget turpis consequat varius. Quisque a interdum augue. Nam ut nibh mauris.</p>
                                </div>
                            </div>
                        </div>
                        <!--End Product Tabs-->
                    </div>
                </div>
            <!--End-product-single-->
            
                <!--Related Product Slider-->
                <div class="related-product grid-products">
                    <header class="section-header">
                        <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
                        <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin.</p>
                    </header>
                    <div class="productPageSlider">
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image1.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image1.jpg') }}" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image1-1.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image1-1.jpg') }}" alt="image" title="product">
                                    <!-- End hover image -->
                                    <!-- product label -->
                                    <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->

                                <!-- Start product button -->
                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Select Options</button>
                                </form>
                                <div class="button-set">
                                    <a href="#" title="Quick View" class="quick-view" tabindex="0">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- end product image -->
                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">Edna Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="old-price">$500.00</span>
                                    <span class="price">$600.00</span>
                                </div>
                                <!-- End product price -->
                                
                                <div class="product-review">
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star-o"></i>
                                    <i class="font-13 fa fa-star-o"></i>
                                </div>

                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image2.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image2.jpg') }}" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image2-1.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image2-1.jpg') }}" alt="image" title="product">
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->

                                <!-- Start product button -->
                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Select Options</button>
                                </form>
                                <div class="button-set">
                                    <a href="#" title="Quick View" class="quick-view" tabindex="0">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">Elastic Waist Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="price">$748.00</span>
                                </div>
                                <!-- End product price -->
                                <div class="product-review">
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                </div>

                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image3.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image3.jpg') }}" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image3-1.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image3-1.jpg') }}" alt="image" title="product">
                                    <!-- End hover image -->
                                    <!-- product label -->
                                    <div class="product-labels rectangular"><span class="lbl pr-label2">Hot</span></div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->

                                <!-- Start product button -->
                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Select Options</button>
                                </form>
                                <div class="button-set">
                                    <a href="#" title="Quick View" class="quick-view" tabindex="0">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">3/4 Sleeve Kimono Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="price">$550.00</span>
                                </div>
                                <!-- End product price -->
                                
                                <div class="product-review">
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star"></i>
                                    <i class="font-13 fa fa-star-o"></i>
                                </div>

                            </div>
                            <!-- End product details -->
                        </div>
                        
                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="#">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image6.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image6.jpg') }}" alt="image" title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image6-1.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image6-1.jpg') }}" alt="image" title="product">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Select Options</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="#" title="Quick View" class="quick-view" tabindex="0">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->

                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="#">Zipper Jacket</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="price">$788.00</span>
                                                </div>
                                                <!-- End product price -->
                                                
                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <!-- End product details -->
                                        </div>
                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="#">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image7.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image7.jpg') }}" alt="image" title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image7-1.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image7-1.jpg') }}" alt="image" title="product">
                                                    <!-- End hover image -->
                                                </a>
                                                <!-- end product image -->

                                                <!-- Start product button -->
                                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Select Options</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="#" title="Quick View" class="quick-view" tabindex="0">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->

                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="#">Zipper Jacket</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="price">$748.00</span>
                                                </div>
                                                <!-- End product price -->
                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                </div>
                                            </div>
                                            <!-- End product details -->
                                        </div>
                    </div>
                    </div>
                <!--End Related Product Slider-->
            
                    <!--Recently Product Slider-->
                    <div class="related-product grid-products">
                        <header class="section-header">
                            <h2 class="section-header__title text-center h2"><span>Recently Viewed Product</span></h2>
                            <p class="sub-heading">You can manage this section from store admin as describe in above section</p>
                        </header>
                        <div class="productPageSlider">
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="#">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image6.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image6.jpg') }}" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image6-1.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image6-1.jpg') }}" alt="image" title="product">
                                        <!-- End hover image -->
                                        <!-- product label -->
                                        <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                        <!-- End product label -->
                                    </a>
                                    <!-- end product image -->
                                </div>
                                <!-- end product image -->

                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="#">Zipper Jacket</a>
                                    </div>
                                    <!-- End product name -->
                                </div>
                                <!-- End product details -->
                            </div>
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="#">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image7.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image7.jpg') }}" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image7-1.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image7-1.jpg') }}" alt="image" title="product">
                                        <!-- End hover image -->
                                    </a>
                                    <!-- end product image -->
                                </div>
                                <!-- end product image -->

                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="#">Zipper Jacket</a>
                                    </div>
                                    <!-- End product name -->
                                </div>
                                <!-- End product details -->
                            </div>
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="#">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image8.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image8.jpg') }}" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image8-1.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image8-1.jpg') }}" alt="image" title="product">
                                        <!-- End hover image -->
                                    </a>
                                    <!-- end product image -->
                                </div>

                                <!-- end product image -->

                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="#">Workers Shirt Jacket</a>
                                    </div>
                                    <!-- End product name -->
                                </div>
                                <!-- End product details -->
                            </div>
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="#">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image9.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image9.jpg') }}" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="{{ asset('site/assets/images/product-images/product-image9-1.jpg') }}" src="{{ asset('site/assets/images/product-images/product-image9-1.jpg') }}" alt="image" title="product">
                                        <!-- End hover image -->
                                    </a>
                                    <!-- end product image -->
                                </div>
                                <!-- end product image -->

                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="#">Watercolor Sport Jacket in Brown/Blue</a>
                                    </div>
                                    <!-- End product name -->
                                </div>
                                <!-- End product details -->
                            </div>

                        </div>
                    </div>
                <!--End Recently Product Slider-->

            
            </div>
            <!--#ProductSection-product-template-->
        </div>
    <!--MainContent-->
</div>
<!--End Body Content-->
</div>
<script>
    $(function(){
        var $pswp = $('.pswp')[0],
            image = [],
            getItems = function() {
                var items = [];
                $('.lightboximages a').each(function() {
                    var $href   = $(this).attr('href'),
                        $size   = $(this).data('size').split('x'),
                        item = {
                            src : $href,
                            w: $size[0],
                            h: $size[1]
                        }
                        items.push(item);
                });
                return items;
            }
        var items = getItems();
    
        $.each(items, function(index, value) {
            image[index]     = new Image();
            image[index].src = value['src'];
        });
        $('.prlightbox').on('click', function (event) {
            event.preventDefault();
          
            var $index = $(".active-thumb").parent().attr('data-slick-index');
            $index++;
            $index = $index-1;
    
            var options = {
                index: $index,
                bgOpacity: 0.9,
                showHideOpacity: true
            }
            var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
            lightBox.init();
        });
    });
    
    </script>
</div>

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button><button class="pswp__button pswp__button--share" title="Share"></button><button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div>
    </div>
@endsection