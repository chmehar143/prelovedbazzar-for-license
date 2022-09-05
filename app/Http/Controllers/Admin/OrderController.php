<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{

//all orrder

    public  function  allorder()
    {
        return view('admin.order.allorder');
    }

    public  function  allorderdetails()
    {
        return view('admin.order.allorderdetails');
    }

    public  function  allorderinvoice()
    {
        return view('admin.order.allorderinvoice');
    }

    public  function  allorderdelivery()
    {
        return view('admin.order.allorderdelivery');
    }





//complete orrder


    public  function  completedorder()
    {
        return view('admin.order.complete.completedorder');
    } 


    
    public  function  completeorderdetails()
    {
        return view('admin.order.complete.completeorderdetails');
    }

    public  function  completeorderinvoice()
    {
        return view('admin.order.complete.completeorderinvoice');
    }



    public  function  completeorderdelivery()
    {
        return view('admin.order.complete.completeorderdelivery');
    }


//declined orrder

    public  function  declineorder()
    {
        return view('admin.order.decline.declinedorder');
    }

    public  function  declineorderdetails()
    {
        return view('admin.order.decline.declineorderdetails');
    }

    public  function  declineorderinvoice()
    {
        return view('admin.order.decline.declineorderinvoice');
    }

    public  function  declineorderdelivery()
    {
        return view('admin.order.decline.declineorderdelivery');
    }



//pending orrder
 
    public  function  pendingorder()
    {
        return view('admin.order.pending.pendingorder');
    }

    public  function  pendingorderdetails()
    {
        return view('admin.order.pending.pendingorderdetails');
    }

    public  function  pendingorderinvoice()
    {
        return view('admin.order.pending.pendingorderinvoice');
    }

  

    public  function  pendingorderdelivery()
    {
        return view('admin.order.pending.pendingorderdelivery');
    }


    public  function  processingorder()
    {
        return view('admin.order.processing.processingorder');
    }

    public  function  processingorderdetails()
    {
        return view('admin.order.processing.processingorderdetails');
    }

    public  function  processingorderinvoice()
    {
        return view('admin.order.processing.processingorderinvoice');
    }

    public  function  processingorderdelivery()
    {
        return view('admin.order.processing.processingorderdelivery');
    }
}
