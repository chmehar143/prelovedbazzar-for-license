@extends('user.layouts.app')
@section('content')
<head>
   <style>
      .w-icon-minus:before {
      content: "";
      margin-left: 5px;
      }
      .w-icon-plus:before {
      content: "";
      margin-left: 5px;
      margin-bottom: 1;
      }
   </style>
</head>


<main class="main mb-10 pb-1">
   <!-- Start of Breadcrumb -->
   <nav class="breadcrumb-nav container">
      <ul class="breadcrumb bb-no">
         <li><a href="{{ route('index') }}">Home</a></li>
         <li><a href="{{ route('shop') }}">Products</a></li>
         <li>{{$product->p_name}}</li>
      </ul>
      <ul class="product-nav list-style-none">
         <li class="product-nav-prev">
            <a href="javascript:void(0)" >
            <i class="w-icon-angle-left"></i>
            </a>
            <span class="product-nav-popup">
            <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Product" width="110"
               height="110" />
            <span class="product-name">{{$product->p_name}}</span>
            </span>
         </li>
         <li class="product-nav-next">
            <a href="javascript:void(0)" >
            <i class="w-icon-angle-right"></i>
            </a>
            <span class="product-nav-popup">
            <img src="{{asset('storage/uploads/products/'.$product->p_image)}}" alt="Product" width="110"
               height="110" />
            <span class="product-name">{{$product->p_name}}</span>
            </span>
         </li>
      </ul>
   </nav>
   <!-- End of Breadcrumb -->
   <!-- Start of Page Content -->
   <div class="page-content">

   @livewire('userend.products.view', [
            'id' => Route::current()->parameter('id'),
            'product' => $product,
            'vendor'=>$vendor,
            'category' => $category,
            'subcategory' => $subcategory,
            'childcategory' => $childcategory,
            'moreproducts' => $moreproducts,
            'related_products' => $related_products,
            'five' => $five,
            'four' => $four,
            'three' => $three,
            'two' => $two,
            'one' => $one,
            'allreview' => $allreview,
            'helppositive' => $helppositive,
            'helpnegative' => $helpnegative, 
            'highrate' => $highrate,
            'lowrate' => $lowrate
      ]) 
      
   </div>
   
   
   
   <!-- End of Page Content -->
</main>
@endsection