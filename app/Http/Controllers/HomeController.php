<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Coupon;
use App\Models\History;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function vongquaymayman(){
        $histories = History::where('user_id', Auth::id())->get();
        return view('vongquaymayman', ['histories' => $histories]);
    }

    public function saveDataRoll(Request $request){
        $coupons = Coupon::get()->toArray();
        $user = Auth::user();
        if(isset($request->data)){
            $history = new History;
            $history->rolls = Auth::user()->rolls;
            switch($request->data){
                case '1 coin':
                    $history->coupon_id = NULL;
                    $history->detail = '1 coin';
                    $user->coins = $user->coins + 1;
                    $user->rolls = $user->rolls - 1;
                    $user->save();
                    break;
                case '3 coin':
                    $history->coupon_id = NULL;
                    $history->detail = '3 coin';
                    $user->coins = $user->coins + 3;
                    $user->rolls = $user->rolls - 1;
                    $user->save();
                    break;
                case 'Túi quà':
                    $rand = rand(1, count($coupons));
                    $history->coupon_id = $rand;
                    $history->detail = $coupons[$rand]['detail'];
                    $user->rolls = $user->rolls - 1;
                    $user->save();
                    break;
                case 'Thêm 3 lượt':
                    $history->coupon_id = NULL;
                    $history->detail = 'Thêm 3 lượt';
                    $user->rolls = $user->rolls + 3;
                    $user->save();
                    break;
                case 'Mất lượt':
                    $history->coupon_id = NULL;
                    $history->detail = 'Mất lượt';
                    $user->rolls = $user->rolls - 1;
                    $user->save();
                    break;
            }

            $history->user_id = Auth::id();
            $history->created_at = date("Y-m-d H:i:s");
            $history->updated_at = date("Y-m-d H:i:s");
            $history->save();
        }
        return response()->json(['status' => 200, 'message' => 'success', 'coin' => $user->coins, 'roll' => $user->rolls, 'history' => $history]); 
    }

    public function dashboard(){
        return view('dashboard');
    }
}
