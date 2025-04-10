<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class VipController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('user.vip.index', compact('subscriptions'));
    }

    public function subscribe($id)
    {
        $user = Auth::user();
        $user->subscription_id = $id;
        $user->save();

        return redirect()->route('vip.index')->with('success', 'Đăng ký VIP thành công!');
    }
}
