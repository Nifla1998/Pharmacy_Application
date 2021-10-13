<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use  App\Models\User;

use Illuminate\Http\Request;
use Auth;
use DB;

class InventoryController extends Controller
{
    public function add(Request $request, $user_id)
    {
        $user=User::find($user_id);
        if ($user->role_id==1) {
            $request->validate([
             
            'name' => 'required',
            'price' => 'required',
        ]);
        
            $inventory = new Inventory();
            $inventory->name = $request->name;
            $inventory->price=$request->price;
            $inventory->save();
            if ($inventory) {
                return("Inventory added");
            } else {
                return("Operation Failed");
            }
        } else {
            return ("Not Autherized");
        }
    }
   
    public function update(Request $request, $inventory_id, $user_id)
    {
        $user=User::find($user_id);
        if ($user->role_id==1 || $user->role_id ==3) {
            $request->validate([
             
            'name' => 'required',
            'price' => 'required',
        ]);

            $inventory =Inventory::find($inventory_id);
            $inventory->name = $request->name;
            $inventory->price = $request->price;
            $inventory->save();
            if ($inventory) {
                return("Inventory Updated");
            } else {
                return("Operation Failed");
            }
        } else {
            return("Not Autherized");
        }
    }
    public function remove($inventory_id, $user_id)
    {
        $user=User::find($user_id);
        if ($user->role_id==1 || $user->role_id ==3) {
            $inventory=Inventory::destroy($inventory_id);
            if ($inventory) {
                return("Inventory Deleted");
            } else {
                return("Operation Failed");
            }
        } else {
            return("Not Autherized");
        }
    }
}
