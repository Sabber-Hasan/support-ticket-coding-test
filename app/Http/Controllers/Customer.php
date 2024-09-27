<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Customer extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }

    public function ticket()
    {
        return view('customer.ticket');
    }

    public function status()
    {
        $status = Ticket::all();
        return view('customer.status', compact('status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:tickets',
            'description' => 'required|unique:tickets',
        ]);
        // dd($request);
        $data = $request->all();
        // $data['user_id'] = Auth::id();
        // dd($data);
        $ticket = Ticket::create($data);

        // $admins = User::where('role', 'admin')->get();
        $user = Auth::user()->name;
        $msg = "A new ticket has been submitted";
        $subject = "New Ticket from $user";
        $admin = 'sabberhasan042@gmail.com';

        Mail::to($admin)->send(new Welcome($msg, $subject, $ticket));


        return redirect()->route('cutomer.index')->with('success', 'Ticket created successfully and admins notified.');
    }
}
