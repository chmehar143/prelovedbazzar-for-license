@extends('user.layouts.app')

@section('content')

  <!-- Start of Main -->
  <main class="main cart">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="active"><a href="{{ route('cart') }}">Shopping Cart</a></li>
                        <li><a href="javascript:void(0)">Checkout</a></li>
                        <li><a href="javascript:void(0)">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            @livewire('userend.products.cart-view')

            <!-- End of PageContent -->
        </main>

@endsection
