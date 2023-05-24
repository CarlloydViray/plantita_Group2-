<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserAuth extends Controller
{
    function login(Request $req)
    {



        $username = $req->input('username');
        $password = $req->input('password');

        $data = $req->input();


        $user = DB::table('registration')->where('username', $username)->first();
        $req->session()->put('regno', $user->regno);

        if ($user) {



            // if (Hash::check($password, $user->password)) {
            //     // Password matches
            //     echo "Authentication successful!";
            // } else {
            //     // Password does not match
            //     echo "Authentication failed: Invalid password!";
            //     return dd($password, $user->password);
            // }


            if ($password == $user->password) {
                // Password matches
                if ($user->user_type === 'seller') {
                    // User is a seller
                    return redirect('sellerPage');
                } elseif ($user->user_type === 'customer') {
                    // User is a customer
                    return redirect('customerPage');
                } else {
                    // Role not specified or invalid
                    echo "Authentication successful! Invalid role specified!";
                }
            } else {
                // Password does not match
                echo 'password dont match';
            }
        } else {
            // User record does not exist
            echo 'user does not exist';
        }
    }
}
