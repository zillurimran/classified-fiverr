<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerAuthenticateController extends Controller
{
    public function loginView()
    {
        return view('customer.login');
    }

    public function loginAttempt(Request $request)
    {
        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])){

            return redirect('/ad-posts');
        }else{
            return redirect()->back();
        }
    }

    public function registerView()
    {
        return view('customer.register');
    }

    public function registerAttempt(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'password' => 'required|min:3',
            'password_confirmation' => 'required_with:password|same:password',
        ]);
            if (!$validator->fails())
            {
                $request['password'] = Hash::make($request->password);
                $validated_data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request['password'],
                ];
                $customer = new Customer();
                $customer->fill($validated_data);
                $customer->save();
                return redirect()->route('loginView');
            }
           else
            return $validator->errors();

    }
}
