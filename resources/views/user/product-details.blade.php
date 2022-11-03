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
<div>

@livewire('userend.products.view', [
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
            'allreview' => $allreview
      ])
  <!-- 03016817533 -->
</div>
@endsection