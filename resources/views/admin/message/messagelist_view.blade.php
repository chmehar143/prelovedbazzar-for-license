@extends('admin.layouts.app') @section('content')

<head>
	<style>
	.content-area {
		width: 100%;
		padding: 30px 30px 30px;
		overflow: hidden;
	}
	
	.mr-breadcrumb {
		padding: 0px 0px 25px;
	}
	
	.order-table-wrap {
		background: #fff;
		padding: 30px 30px 30px;
	}
	
	.support-ticket-wrapper .panel,
	.support-ticket-wrapper .panel-heading,
	.support-ticket-wrapper textarea,
	.support-ticket-wrapper button {
		border-radius: 0;
	}
	
	.support-ticket-wrapper .panel {
		border-color: #dddddd;
	}
	
	.support-ticket-wrapper .single-reply-area.user {
		padding: 20px 30px;
	}
	
	.single-reply-area.user {
		background-color: #ddd;
		padding: 10px;
	}
	
	.support-ticket-wrapper .single-reply-area.admin {
		padding: 20px 30px;
		background: #f1f1f1;
	}
	
	.support-ticket-wrapper .single-reply-area.admin .reply-area .left {
		text-align: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		margin-right: 30px;
	}
	
	.support-ticket-wrapper .single-reply-area.admin .reply-area .right {
		-webkit-box-flex: 1;
		-ms-flex: 1;
		flex: 1;
		text-align: right;
	}
	
	.support-ticket-wrapper .ticket-date {
		font-size: 14px;
		color: #737373;
		margin-bottom: 0px;
	}
	
	.support-ticket-wrapper .single-reply-area.admin .reply-area {
		display: -webkit-box;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-pack: justify;
		-ms-flex-pack: justify;
		justify-content: space-between;
	}
	
	.support-ticket-wrapper .panel-body img {
		height: 60px;
		width: 60px;
		border-radius: 100%;
	}
	
	.profile-btn {
		border-radius: 50px;
		float: right;
		background-color: #1f224f;
		-webkit-box-shadow: 0px 5px 10px 0px rgb(14 35 107 / 30%);
		box-shadow: 0px 5px 10px 0px rgb(14 35 107 / 30%);
		text-align: center;
		color: #fff;
		font-size: 14px;
		font-weight: 600;
		width: 120px;
		height: 30px;
		line-height: 30px;
		display: inline-block;
		-webkit-transition: all 0.3s ease-in;
		-o-transition: all 0.3s ease-in;
		transition: all 0.3s ease-in;
		position: relative;
	}
	
	.support-ticket-wrapper .single-reply-area.user .reply-area .right {
		text-align: end;
		-webkit-box-align: end;
		-ms-flex-align: end;
		align-items: end;
		margin-left: 30px;
	}
	
	.support-ticket-wrapper .single-reply-area.user .reply-area .left {
		-webkit-box-flex: 1;
		-ms-flex: 1;
		flex: 1;
	}
	
	.profile-btn::after {
		position: absolute;
		content: " ";
		height: 100%;
		width: 10%;
		top: 0;
		left: 0;
		background: rgba(255, 255, 255, 0.2);
		left: 50%;
		opacity: 0;
		-webkit-transform: translateX(-50%);
		-ms-transform: translateX(-50%);
		transform: translateX(-50%);
		-webkit-transition: all 0.3s ease-in;
		-o-transition: all 0.3s ease-in;
		transition: all 0.3s ease-in;
	}
	</style>
</head>
<div class="toolbar py-2" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
		<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
			<!--begin::Title-->
			<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3" style="margin-left:3pc"> Message list    </h1>
			<!--end::Title-->
			<!--begin::Separator--><span class="h-20px border-gray-200 border-start mx-3"></span>
			<!--end::Separator-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<!--begin::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item"> <span class="bullet bg-gray-200 w-5px h-2px"></span> </li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item text-muted"> Message </li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item"> <span class="bullet bg-gray-200 w-5px h-2px"></span> </li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item text-dark">Message list View</li>
				<!--end::Item-->
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--begin::Page title-->
		<div class="flex-grow-1 flex-shrink-0 me-5">
			<!--begin::Page title-->
			<!--end::Page title-->
		</div>
		<!--end::Page title-->
	</div>
</div>
<div class="content-area" id="modalEdit">
	<div class="mr-breadcrumb">
		<div class="row">
			<div class="col-lg-12" style="margin-left:5pc;margin-top:4pc">
				<br>
				<br>
				<Br>
				<br>
				<h1> Order Number: 1254</h1>
				<h3>Conversation with User </h3> </div>
		</div>
	</div>
	<div class="order-table-wrap support-ticket-wrapper ">
		<div class="panel panel-primary">
			<div class="gocover" style="background: url(https://royalscripts.com/demo/kingcommerce/assets/images/1564224329loading3.gif) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
			<div class="alert alert-success validation" style="display: none;">
				<button type="button" class="close alert-close"><span>×</span></button>
				<p class="text-left"></p>
			</div>
			<div class="alert alert-danger validation" style="display: none;">
				<button type="button" class="close alert-close"><span>×</span></button>
				<ul class="text-left"> </ul>
			</div>
			<div class="panel-body" id="messages">
				<div class="single-reply-area user">
					<div class="row">
						<div class="col-lg-12">
							<div class="reply-area">
								<div class="left">
									<p>Dispute</p>
								</div>
								<div class="right"> <img class="img-circle" src="https://royalscripts.com/demo/kingcommerce/assets/images/noimage.png" alt="">
									<br>
									<Br> <a class="d-block profile-btn" href="{{url('admin/message_view')}}">View Profile</a>
									<br>
									<Br>
									<p class="ticket-date">1 year ago</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="single-reply-area admin">
					<div class="row">
						<div class="col-lg-12">
							<div class="reply-area">
								<div class="left"> <img class="img-circle" src="https://royalscripts.com/demo/kingcommerce/assets/images/admins/1556780563user.png" alt="">
									<p class="ticket-date">1 year ago</p>
								</div>
								<div class="right">
									<p>Thank you</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="single-reply-area admin">
					<div class="row">
						<div class="col-lg-12">
							<div class="reply-area">
								<div class="left"> <img class="img-circle" src="https://royalscripts.com/demo/kingcommerce/assets/images/admins/1556780563user.png" alt="">
									<p class="ticket-date">1 year ago</p>
								</div>
								<div class="right">
									<p>trthjtdjtyij</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="single-reply-area admin">
					<div class="row">
						<div class="col-lg-12">
							<div class="reply-area">
								<div class="left"> <img class="img-circle" src="https://royalscripts.com/demo/kingcommerce/assets/images/admins/1556780563user.png" alt="">
									<p class="ticket-date">1 year ago</p>
								</div>
								<div class="right">
									<p>Mais Oui c'est clair</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="single-reply-area user">
					<div class="row">
						<div class="col-lg-12">
							<div class="reply-area">
								<div class="left">
									<p>cbcbc</p>
								</div>
								<div class="right"> <img class="img-circle" src="https://royalscripts.com/demo/kingcommerce/assets/images/noimage.png" alt="">
									<br>
									<br> <a class="d-block profile-btn" href="{{url('admin/message_view')}}">View Profile</a>
									<br>
									<br>
									<p class="ticket-date">10 months ago</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="single-reply-area admin">
					<div class="row">
						<div class="col-lg-12">
							<div class="reply-area">
								<div class="left"> <img class="img-circle" src="https://royalscripts.com/demo/kingcommerce/assets/images/admins/1556780563user.png" alt="">
									<p class="ticket-date">7 months ago</p>
								</div>
								<div class="right">
									<p>dssfksdfl</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="single-reply-area admin">
					<div class="row">
						<div class="col-lg-12">
							<div class="reply-area">
								<div class="left"> <img class="img-circle" src="https://royalscripts.com/demo/kingcommerce/assets/images/admins/1556780563user.png" alt="">
									<p class="ticket-date">7 months ago</p>
								</div>
								<div class="right">
									<p>hello</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br> </div>
			<div class="panel-footer">
				<form id="messageform" action="https://royalscripts.com/demo/kingcommerce/admin/message/post" data-href="https://royalscripts.com/demo/kingcommerce/admin/message/load/19" method="POST">
					<input type="hidden" name="_token" value="lFHoySt93K8P0lSCTM0KjnHmOOF5JBxNTnswUSmG">
					<div class="form-group">
						<input type="hidden" name="conversation_id" value="19">
						<textarea class="form-control" name="message" id="wrong-invoice" rows="5" required="" placeholder="Message"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="mybtn1"> Add Reply </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> @endsection