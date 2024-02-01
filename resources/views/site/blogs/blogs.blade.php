@extends('layouts.site_includes.app')
@section('content')
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center mb-0">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Blog Fullwidth</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
	    <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="/" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Blog Fullwidth</span>
            </div>
        </div>
        <div class="container">
        	<div class="row">
                <!--Main Content-->
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<div class="custom-search">
                        <form action="http://annimexweb.com/search" method="get" class="input-group search-header search" role="search" style="position: relative;">
                            <input class="search-header__input search__input input-group__field" type="search" name="q" placeholder="Search" aria-label="Search" autocomplete="off">
                            <span class="input-group__btn"><button class="btnSearch" type="submit"> <i class="icon anm anm-search-l"></i> </button></span>
                        </form>
                    </div>
                    <div class="blog--list-view blog--grid-load-more">
                        @foreach($blogs as $blog)
                        <div class="article"> 
                            <!-- Article Image --> 
                            <a class="article_featured-image" href="#"><img class="blur-up lazyload" data-src="{{ asset('storage/' . $blog->image) }}" src="{{ asset('storage/' . $blog->image) }}" alt="It's all about how you wear"></a> 
                            <h2 class="h3"><a href="blog-left-sidebar.html">{{ $blog->title }}</a></h2>
                            <ul class="publish-detail">                      
                                <li><i class="anm anm-user-al" aria-hidden="true"></i>  {{ $blog->author }}</li>
                                <li><i class="icon anm anm-clock-r"></i> <time datetime="{{ $blog->created_at }}">{{ $blog->created_at->format('M d, Y') }}</time></li>
                                <li>
                                    <ul class="inline-list">   
                                        <li><i class="icon anm anm-comments-l"></i> <a href="#"> 0 comments</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="rte"> 
                                <p>{!! $blog->description !!}</p>
                            </div>
                            <p><a href="{{ route('site_blogs.show', $blog->id) }}" class="btn btn-secondary btn--small">Read more <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>

                        </div>
                        @endforeach
                        
                        
                        <div class="loadmore-post">	
                            <a href="#;" class="btn loadMorepost">Load More</a>
                        </div>
                    </div>
                </div>
                <!--End Main Content-->
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
@endsection