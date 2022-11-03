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
        <!-- End of Main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">


function clearall(){

        $.ajax({
            url: "{{ route('clear_cart') }}",
        success: function() {
                $(".data_row").remove();
            }
        });
}
//https://www.youtube.com/watch?v=eblMZxwP1eY
//for update quantity...
</script>

@endsection
