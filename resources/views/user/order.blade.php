@extends('user.layouts.app')
@section('content')
 <!-- Start of Main -->
 <main class="main order">
            <!-- Start of Breadcrumb -->
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb shop-breadcrumb bb-no">
                        <li class="passed"><a href="{{ route('cart')}}">Shopping Cart</a></li>
                        <li class="passed"><a href="{{ route('checkout')}}">Checkout</a></li>
                        <li class="active"><a href="{{ route('order-view')}}">Order Complete</a></li>
                    </ul>
                </div>
            </nav>
            <!-- End of Breadcrumb -->

            <!-- Start of PageContent -->
            <div class="page-content mb-10 pb-2">
                <div class="container">
                    @if ($message = Session::get('success'))
                    <div class="order-success text-center text-success font-weight-bolder text-dark" style="color: green;">
                        <i class="fas fa-check" style="color: green; font-size: 30px; ">{{$message}}.</i>
                    </div>
                    @endif
                    <!-- End of Order Success -->


                    <ul class="order-view list-style-none">
                        <li>
                            <label>Order number</label>
                            <strong>{{$order->id}}</strong>
                        </li>
                        <li>
                            <label>Status</label>
                            <strong>{{ $status[$order->status] }}</strong>
                        </li>
                        <li>
                            <label>Date</label>
                            <strong>{{$order->created_at->format('M d, Y')}}</strong>
                        </li>
                        <li>
                            <label>Total</label>
                            <strong>pkr{{$order->net_amount}}</strong>
                        </li>
                        <li>
                            <label>Payment method</label>
                            <strong>{{$order->pay_method}}</strong>
                        </li>
                    </ul>
                    <!-- End of Order View -->

                    <div class="order-details-wrapper mb-5">
                        <h4 class="title text-uppercase ls-25 mb-5">Order Details</h4>
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th style="font-size: 14px;">Product</th>
                                    <th style="font-size: 14px;">Vendor Shop</th>
                                    <th style="font-size: 14px;">Status</th>
                                    <th style="font-size: 14px;">Total</th>
                                    <th style="font-size: 14px; float: left;">Tracking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->order_detail as $detail)
                                <tr>
                                    <td>
                                        <a href="{{ route('product', $detail->pro_id) }}">{{$detail->item_name}}</a>&nbsp;<strong>x 1</strong><br>
                                    </td>
                                    <td><strong>jfgdkfgkd{{$detail->store_name}}</strong></td>
                                    <td>{{$detail->sub_status}}</td>
                                    <td>pkr{{$detail->subtotal}}</td>                                    
                                    <td>@if($detail->tracking == NULL) No traking yet @else {{$detail->tracking}} @endif</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Subtotal:</th>
                                    <td>pkr{{$order->order_detail->sum('subtotal')}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping:</th>
                                    <td>Flat rate</td>
                                </tr>
                                <tr>
                                    <th>Payment method:</th>
                                    <td>Direct bank transfor</td>
                                </tr>
                                <tr class="total">
                                    <th class="border-no">Total:</th>
                                    <td class="border-no">pkr{{$order->net_amount}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- End of Order Details -->

                    <!-- <div class="sub-orders mb-10">
                        <h4 class="title mb-5 font-weight-bold ls-25">Sub Orders</h4>
                        <div class="alert alert-icon alert-inline mb-5">
                            <i class="w-icon-exclamation-triangle"></i>
                            <strong>Note: </strong>This order has products from multiple vendors. So we divided this order into multiple vendor orders.
                            Each order will be handled by their respective vendor independently.
                        </div>
                        <table class="order-subtable">
                            <thead>
                                <tr>
                                    <th class="order">Order</th>
                                    <th class="date">Date</th>
                                    <th class="status">Status</th>
                                    <th class="total">Total</th>
                                    <th class="action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="order">950</td>
                                    <td class="date">April 23, 2021</td>
                                    <td class="status">On hold</td>
                                    <td class="total">$40.00 for 1 items</td>
                                    <td class="action"><a href="{{route('order-view')}}" class="btn btn-rounded">View</a></td>
                                </tr>
                                <tr>
                                    <td class="order">951</td>
                                    <td class="date">April 25, 2021</td>
                                    <td class="status">On hold</td>
                                    <td class="total">$60.00 for 1 items</td>
                                    <td class="action"><a href="{{route('order-view')}}" class="btn btn-rounded">View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->
                    <!-- End of Sub Orders-->

                    <div id="account-addresses">
                        <div class="row">
                            <div class="col-sm-6 mb-8">
                                <div class="ecommerce-address billing-address">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <td>{{ $order->fname." ".$order->lname }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->apart}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->street}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->state}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->country}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->zip}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->phone}}</td>
                                                </tr>
                                                <tr class="email">
                                                    <td>{{$order->email}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-8">
                                <div class="ecommerce-address shipping-address">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                            <tr>
                                                    <td>{{ $order->s_fname." ".$order->s_lname }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->s_apart}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->s_street}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->s_state}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->s_country}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{$order->s_zip}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Account Address -->

                    <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Back To List</a>
                </div>
            </div>
            <!-- End of PageContent -->
        </main>
        <!-- End of Main -->
@endsection
