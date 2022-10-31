@extends('user.layouts.app')
@section('content')

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
   $("#postbutton").click(function(){
         var id = $("#product_id").val();
         var quantity = $("#qnty").val();
            if(!quantity){
                var quantity = 1;
            }
            var size = $("input[name='size']:checked").val();
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
        });
   
        $("#add_review").click(function(){
            var id = $("#id").val();
            var rating = $("#rating").val();
            var review = $("#review").val();
            var author = $("#author").val();
            var email_1 = $("#email_1").val();
            // processing ajax request
            $.ajax({
                url: "{{ route('add_review') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    rating: rating,
                    review: review,
                    author: author,
                    email_1: email_1
                },
                success: function(data) {
                    // log response into console
                    console.log(data);
                    alert('A reviw has been added!');
                }
            });
        });
   
</script>
@endsection