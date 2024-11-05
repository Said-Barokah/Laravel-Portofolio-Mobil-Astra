<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Payment;

class ProfilController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('customer.Dashboard',compact('user'));
    }

    public function purchaseOrder($status = 'Pending')
    {
        $user = Auth::user();
        $customerId = Auth::id();
        // $customerId = 9; // Get the authenticated user's ID

        $payments = Payment::with(['booking', 'promoCode']) // Eager load relationships
        ->join('bookings', 'payments.booking_id', '=', 'bookings.id')
        ->where('payments.status', $status) // Check if payment is successful
        ->where('bookings.customer_id', $customerId) // Check if booking's customer_id matches the authenticated user
        ->select('payments.*') // Select the columns you need from payments
        ->get();
        return view('customer.purchaseOrder',compact('user','payments','status'));
    }

    public function serviceBooking(){
        $user = Auth::user();
        return view('customer.serviceBooking',compact('user'));
    }

    public function feedback(){
        $user = Auth::user();
        return view('customer.feedback',compact('user'));
    }


}
