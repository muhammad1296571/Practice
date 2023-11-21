<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_wallets;
use App\Models\contect;
use App\Models\transition;
use App\Models\wallet;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class homecontroller extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $type = Auth()->user()->type;
            $role_user = Auth()->user()->role;



            $user_send_or_recive = transition::where('sender', Auth::id())->
                where('status', 'normal')->latest()->get();
            $user_remove = transition::where('status', 'remove')->latest()->get();
            
            

            //admin check user status
            $user = user::where('role', 'pending')->where('type', 'user')->get()->all();


            if ($type == 'user') {


                if ($role_user == 'approved') {
                 
                  return view('dashboard', compact('user_send_or_recive', 'role_user', 'user_remove'));

                } 
                elseif ($role_user == 'pending') 
                {

                    return view('dashboard', compact('role_user'));

                }
                 elseif ($role_user == 'declined') 
                {

                  return view('website.declined_user');
                }

                } elseif ($type == 'admin') {

                 return view('admin', compact('user'));
               }
        }
    }

    public function post()
    {

        return view('post');
    }

    public function future()
    {

        return view('website.future');
    }



    public function price()
    {

        return view('website.price');
    }
    //contects page

    public function contect()
    {
        $user = Auth::user();

        return view('website.contect',compact('user'));
    }

    public function contect_store(Request $request)
    {
        try{

            Contect::create($request->all());
            return back()->with('success', 'your connected our team !');


        } catch (Exception $e) {
            return back()->with('failed', 'some thing went wrong !', $e->getMessage());
        }

      
    }


    public function send_money()

    {


        $users = user::where('type', 'user')->get();
        // $users = user::find(1,['name']);



        return view('website.user_send_money', compact('users'));
    }

    public function money_store(Request $request)
    {
        // dd($request->all());
        $role_user = Auth()->user()->role;




        try {

            DB::beginTransaction();

            transition::create($request->all());


            if (Auth()->user()->balance < $request->amount) {
                return back()->with('failed', 'Your Balance is Low !');
            }
            if ($request->amount < 50) {
                return back()->with('failed', 'Amount must Be 50 PKR or + ');
            }


            User::find(auth()->id())->decrement('balance', $request->amount);
            User::find($request->user_id)->increment('balance', $request->amount);

            DB::commit();

            return back()->with('success', 'Money Transfer SuccessFully !');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('failed', 'Amount Sending failed !', $e->getMessage());
        }


        // }
    }


    //user check

    public function declined()
    {

        $user = user::where('role', 'declined')->where('type', 'user')->get()->all();

        return view('declined', compact('user'));
    }
    public function approved()
    {

        $user = user::where('role', 'approved')->where('type', 'user')->get()->all();

        return view('approved', compact('user'));
    }
    //admin trancation and profite
    

    public function Transaction(){

        $users = transition::with('user')->latest()->get();
        return view('user_Transaction',compact('users'));

    }


    public function u_tax()
    {

        $users = transition::with('user')->latest()->get();
        return view('user_tax', compact('users'));
    }


    //admin can chang status users


    public function approved_user($id)
    {
        $user = user::find($id);
        $user->role = 'approved';
        $user->save();
        return redirect()->back();
    }


    public function declined_user($id)
    {
        $user = user::find($id);
        $user->role = 'declined';
        $user->save();
        return redirect()->back();
    }

    public function destory($id)
    {
        $check_status = transition::find($id);
        $check_status->delete();

        return redirect()->back();

        

    }

    public function remove($id)
    {
        $check_status = transition::find($id);
        $check_status->status = 'remove';
        $check_status->save();

        return redirect()->back();
    }
    public function change_status($id)
    {
        $check_status = transition::find($id);
        $check_status->status = 'normal';
        $check_status->save();

        return redirect()->back();
    }


    
}
