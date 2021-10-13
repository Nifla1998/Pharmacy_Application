<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;

class CustomerController extends Controller
{
    public function add(Request $request, $user_id)
    {
        $user=User::find($user_id);
        if ($user->role_id==1) {
            $request->validate([
             
            'name' => 'required',
            'address' => 'required',
        ]);
        
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->address=$request->address;
            $customer->save();
            if ($customer) {
                return("Customer added");
            } else {
                return("Operation Failed");
            }
        } else {
            return ("Not Autherized");
        }
    }
   
    public function update(Request $request, $customer_id, $user_id)
    {
        $user=User::find($user_id);
        if ($user->role_id==1 || $user->role_id ==2) {
            $request->validate([
             
            'name' => 'required',
            'address' => 'required',
        ]);

            $customer =Customer::find($customer_id);
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->save();
            if ($customer) {
                return("Customer Updated");
            } else {
                return("Operation Failed");
            }
        } else {
            return("Not Autherized");
        }
    }
    public function remove($customer_id, $user_id)
    {
        $user=User::find($user_id);
        if ($user->role_id==1 || $user->role_id ==2) {
            $customer=Customer::destroy($customer_id);
            if ($customer) {
                return("Customer Deleted");
            } else {
                return("Operation Failed");
            }
        } else {
            return("Not Autherized");
        }
    }
}
