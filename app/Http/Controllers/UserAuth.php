<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserAuth extends Controller
{
    public function login(Request $req)
    {
        $username = $req->input('username');
        $password = $req->input('password');

        $user = DB::table('users')->where('username', $username)->first();

        //create UI for echoing
        if ($user) {
            if (Hash::check($password, $user->password)) {
                // Password matches
                if ($user->user_type === 'seller') {
                    // User is a seller
                    $req->session()->put('regno', $user->regno);
                    return redirect('sellerPage');
                } elseif ($user->user_type === 'customer') {
                    // User is a customer
                    $req->session()->put('regno', $user->regno);
                    return redirect('customerPage');
                } else {
                    // Role not specified or invalid
                    echo "Authentication successful! Invalid role specified!";
                }
            } else {
                // Password does not match
                echo 'Password does not match';
            }
        } else {
            // User record does not exist
            echo 'User does not exist';
        }
    }

    public function customerMyAccRoute()
    {
        return redirect()->route('MyAccountCustomer.index');
    }

    public function sellerMyAccRoute()
    {
        return redirect()->route('MyAccountSeller.index');
    }
}
