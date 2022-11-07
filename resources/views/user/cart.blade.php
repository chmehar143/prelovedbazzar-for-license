@extends('user.layouts.app')

@section('content')




  <!-- Start of Main -->
  <main class="main cart">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="active"><a href="cart.html">Shopping Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="order.html">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            @livewire('userend.products.cart-view')

            <!-- End of PageContent -->
        </main>

@endsection
