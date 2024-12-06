<?php

namespace App\Http\Controllers;
use App\Models\OrganizationModel;
use Hash;
use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    public function showRegisterView()
    {
        return view('auth.register');
    }

    //Method to handle registration

    public function register(Request $request){
       
       $request->validate([
        'company_name'=>'required|string|max:255|unique:organizations',
        'full_name'=>'required|string|max:255',
        'email'=>'required|email|unique:organizations',
        
         'password' => [
                       'required',
                       'string',
                        'min:8',
       
                 ], 

        'phone'=>'required|string',
       
       ],
       [
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 8 characters.',
        'password.regex' => 'The password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
        //'password.confirmed' => 'The password confirmation does not match.',
    ],);

       $subdomain=OrganizationModel::generateUniqueSubdomain($request->company_name);
     

       $organization=OrganizationModel::create([
        'company_name'=>$request->company_name,
        'full_name'=>$request->full_name,
        'email'=>$request->email,
        'password' => Hash::make($request->password),
        
        'phone'=>$request->phone,
        'subdomain'=>$subdomain,
       ]);

       return redirect()->away("http://{$subdomain}.localhost");
    }

    public function login()
    {
        return view('auth.login');
    }
}



