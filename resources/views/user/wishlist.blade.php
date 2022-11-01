@extends('user.layouts.app')

@section('content')
 <!-- Start of Main -->
 <main class="main wishlist-page">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">Wishlist</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav mb-10">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html">Home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content">
                <div>
                    @livewire('userend.wishlist.index', ['wishes' => $wishes])
                </div>                
            </div>
            <!-- End of PageContent -->
            
        </main>
        <!-- End of Main -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">

function deleteProduct(id){
            // processing ajax request    
            $.ajax({
                url: "{{ url('delwish') }}" +'/' + id,
            success: function() {
                    $("#setup_" +id).remove();
                }
            });   
        }


function addcart(id){
    var id = id;
    var size = $("input[name='size']:checked").val();
    var quantity = $("#qnty_" +id).val();
    if(!quantity){
            var quantity = 1;
        }
        if(!size){
            var size = 'medium';
        }
        // processing ajax request
        $.ajax({
        url: "{{ route('addcart') }}",
        type: 'POST',
        dataType: "json",
        data: {
            "_token": "{{ csrf_token() }}",
            id: id,
            quantity: quantity,
            size: size
        },
        success: function(data) {
            // log response into console
            console.log(data);
        }
    });
}

//https://www.youtube.com/watch?v=eblMZxwP1eY
//for update quantity...
</script>

@endsection
