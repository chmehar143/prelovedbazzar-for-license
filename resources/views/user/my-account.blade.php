@extends('user.layouts.app')
@section('content')
 <!-- Start of Main -->
 <main class="main">
            <!-- Start of Page Header -->
            <div class="page-header">
                <div class="container">
                    <h1 class="page-title mb-0">My Account</h1>
                </div>
            </div>
            <!-- End of Page Header -->

            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html">Home</a></li>
                        <li>My account</li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content pt-2">
                <div class="container">
                    <div class="tab tab-vertical row gutter-lg">
                        <ul class="nav nav-tabs mb-6" role="tablist">
                            <li class="nav-item">
                                <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-orders" class="nav-link">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-downloads" class="nav-link">Downloads</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-addresses" class="nav-link">Addresses</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-details" class="nav-link">Account details</a>
                            </li>
                            <li class="link-item">
                                <a href="{{ route('wishlist') }}" class="btn btn-link">Wishlist</a>
                            </li>
                            <li class="link-item">
                            <form action="{{ route('user.logout') }}" method="post" class="text-info">
                                <button class="btn btn-link " style="text-color: sky;">Logout</button>
                            </form>
                            </li>
                        </ul>

                        <div class="tab-content mb-6">
                            <div class="tab-pane active in" id="account-dashboard">                                   
                                <form action="{{ route('user.logout') }}" method="post">
                                    @csrf
                                    <p class="greeting">
                                    Hello
                                    <span class="text-dark font-weight-bold">{{ $user->name }}</span> 
                                    (not
                                    <span class="text-dark font-weight-bold">{{ $user->name }}</span>?
                                    <button type="submit" class="btn-link" style="cursor: pointer;">Log out</button>)
                                    </p>
                                </form>
                                <p class="mb-4">
                                    From your account dashboard you can view your <a href="#account-orders"
                                        class="text-primary link-to-tab">recent orders</a>,
                                    manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                        and billing
                                        addresses</a>, and
                                    <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                        account details.</a>
                                </p>

                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-orders" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Orders</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-downloads" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-download">
                                                    <i class="w-icon-download"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Downloads</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-addresses" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-address">
                                                    <i class="w-icon-map-marker"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Addresses</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="#account-details" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Account Details</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <a href="wishlist.html" class="link-to-tab">
                                            <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                                <div class="icon-box-content">
                                                    <p class="text-uppercase mb-0">Wishlist</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                        <form action="{{ route('user.logout') }}" method="post" class="link-to-tab " style="cursor: pointer; display: block; margin-bottom: 5px;">
                                            @csrf
                                            <div class="icon-box text-center" style="cursor: pointer; display: block; padding-bottom: 46px;">
                                                <button type="submit" class=" btn-link icon-box-icon icon-logout" style="cursor: pointer;" >
                                                    <i class="w-icon-logout"></i>
                                                </button>
                                                <div class="icon-box-content">
                                                    <button type="submit" class="btn-link text-uppercase " style="cursor: pointer;">Log out</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane mb-4" id="account-orders">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                    </div>
                                </div>

                                <table class="shop-table account-orders-table mb-6">
                                    <thead>
                                        <tr>
                                            <th class="order-id">Order</th>
                                            <th class="order-date">Date</th>
                                            <th class="order-status">Status</th>
                                            <th class="order-total">Total</th>
                                            <th class="order-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <?php $details = App\Models\OrderDetail::where('order_id', $order->id)->get(); ?>
                                        <tr>
                                            <td class="order-id">#{{$order->id}}</td>
                                            <td class="order-date">{{$order->created_at->format('d-m-Y')}}</td>
                                            <td class="order-status">{{$order->status}}</td>
                                            <td class="order-total">
                                                <span class="order-price">pkr{{$order->net_amount}}</span> for
                                                <span class="order-quantity">{{$details->sum('pro_qnty')}}</span> item
                                            </td>
                                            <td class="order-action">
                                                <a href="#"
                                                    class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                    Shop<i class="w-icon-long-arrow-right"></i></a>
                            </div>

                            <div class="tab-pane" id="account-downloads">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-downloads mr-2">
                                        <i class="w-icon-download"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title ls-normal">Downloads</h4>
                                    </div>
                                </div>
                                <p class="mb-4">No downloads available yet.</p>
                                <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                    Shop<i class="w-icon-long-arrow-right"></i></a>
                            </div>
                            @if($address != NULL)
                            <div class="tab-pane" id="account-addresses">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                                    </div>
                                </div>
                                <p>The following addresses will be used on the checkout page
                                    by default.</p>
                                <div class="row">
                                    <div class="col-sm-6 mb-6">
                                        <div class="ecommerce-address billing-address pr-lg-8">
                                            <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                            <address class="mb-4">
                                                <table class="address-table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Name:</th>
                                                            <td>{{$address->fname }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Company:</th>
                                                            <td>{{$address->company}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Address:</th>
                                                            <td>{{$address->street}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>City:</th>
                                                            <td>{{$address->city}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Country:</th>
                                                            <td>{{$country[$address->country]}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Postcode:</th>
                                                            <td>{{$address->zip}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone:</th>
                                                            <td>{{$address->phone}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </address>
                                            <a href="#"
                                                class="btn btn-link btn-underline btn-icon-right text-primary">Edit
                                                your billing address<i class="w-icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-6">
                                        <div class="ecommerce-address shipping-address pr-lg-8">
                                            <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                            <address class="mb-4">
                                                <table class="address-table">
                                                <tbody>
                                                        <tr>
                                                            <th>Name:</th>
                                                            <td>{{$address->s_fname }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Company:</th>
                                                            <td>{{$address->s_company}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Address:</th>
                                                            <td>{{$address->s_street}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>City:</th>
                                                            <td>{{$address->s_city}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Country:</th>
                                                            <td>{{$country[$address->s_country]}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Postcode:</th>
                                                            <td>{{$address->s_zip}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phone:</th>
                                                            <td>{{$address->s_phone}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </address>
                                            <a href="#"
                                                class="btn btn-link btn-underline btn-icon-right text-primary">Edit your
                                                shipping address<i class="w-icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="tab-pane" id="account-details">
                                <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                    </div>
                                </div>
                                <form class="form account-details-form" action="javascript:void(0)">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">First name *</label>
                                                <input type="text" id="firstname" name="firstname" placeholder="John" value="{{$user->name}}"
                                                    class="form-control form-control-md">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastname">Last name *</label>
                                                <input type="text" id="lastname" name="lastname" placeholder="Doe"
                                                    class="form-control form-control-md">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="display-name">Display name *</label>
                                        <input type="text" id="display-name" name="display_name" placeholder="John Doe"
                                            class="form-control form-control-md mb-0">
                                        <p>This will be how your name will be displayed in the account section and in reviews</p>
                                    </div>

                                    <div class="form-group mb-6">
                                        <label for="email_1">Email address *</label>
                                        <input type="email" id="email_1" name="email_1" value="{{$user->email}}"
                                            class="form-control form-control-md">
                                    </div>

                                    <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                                    <div class="form-group">
                                        <label class="text-dark" for="cur-password">Current Password leave blank to leave unchanged</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="current" name="current_password">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-dark" for="new-password">New Password leave blank to leave unchanged</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="new" name="new_password">
                                    </div>
                                    <div class="form-group mb-10">
                                        <label class="text-dark" for="conf-password">Confirm Password</label>
                                        <input type="password" class="form-control form-control-md"
                                            id="confirm" name="new_confirm_password">
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4" id="change_pass">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
   $("#change_pass").click(function(){
            var current_password = $("#current").val();
            var new_password = $("#new").val();
            var new_confirm_password = $("#confirm").val();
            // processing ajax request    
            $.ajax({
                url: "{{ route('user.change') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    "_token": "{{ csrf_token() }}",
                    current_password: current_password,
                    new_password: new_password,
                    new_confirm_password: new_confirm_password
                },
                success: function(data) {
                    // log response into console
                    alert("Password has been changed successfully!");
                }
            });   
        });
</script>
@endsection
