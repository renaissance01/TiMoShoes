<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\models\users;

class UserController extends Controller
{
    function GetAddUser()
    {
        return view("backend.user.adduser");
    }

    function PostAddUser(AddUserRequest $r)
    {
        $user = new users;
        $user->email = $r->email;
        $user->password = bcrypt($r->password);
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->level = $r->level;
        $user->save();
        return redirect('/admin/user/')->with('thongbao', 'Đã thêm thành công!');
    }

    function GetEditUser($id)
    {
        $data['user'] = users::find($id);
        return view("backend.user.edituser", $data);
    }

    function PostEditUser(EditUserRequest $r, $id)
    {
        $user = users::find($id);
        $user->email = $r->email;
        if($r->password != '')
            $user->password = bcrypt($r->password);
        $user->full = $r->full;
        $user->address = $r->address;
        $user->phone = $r->phone;
        $user->level = $r->level;
        $user->save();
        return redirect()->back()->with('thongbao', 'Đã sửa thành công!');
    }

    function GetDelUser($id)
    {
        users::destroy($id);
        return redirect()->back()->with('thongbao', 'Đã xóa thành công!');

    }

    function GetListUser()
    {
        $data['users'] = users::paginate('3');
        return view("backend.user.listuser", $data);
    }
}
