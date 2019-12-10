<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\models\customer;
use App\models\users;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function GetLogin()
    {
        return view('backend.login.login');
    }

    public function PostLogin(LoginRequest $r)
    {
        $email = $r->email;
        $password = $r->password;
        $remember = $r->has('remember') ? true : false;
        if(Auth::attempt(['email' => $email, 'password' => $password], $remember))
        {
            return redirect('admin');
        }
        else
        {
            return redirect('login')->withInput()->with('thongbao', 'Tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function GetLogout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function GetIndex()
    {
        $year_n = Carbon::now()->format('Y');
        $month_n = Carbon::now()->format('m');
        for($i=1; $i<=$month_n; $i++)
        {
            $monthjs[$i] = 'Tháng '.$i;
            $numberjs[$i] = customer::where('state', 1)->whereMonth('updated_at', $i)->whereYear('updated_at', $year_n)->sum('total');
        }
        $data['monthjs'] = $monthjs;
        $data['numberjs'] = $numberjs;
        $data['order'] = customer::where('state', 0)->whereMonth('updated_at', $month_n)->whereYear('updated_at', $year_n)->count();
        return view('backend.index', $data);
    }

}
