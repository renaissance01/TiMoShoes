<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\models\category;

class CategoryController extends Controller
{
    public function GetCategory()
    {
        $data['category'] = category::all();
        return view('backend.category.category', $data);
    }


    public function PostCategory(AddCategoryRequest $r)
    {
        $cate = new category;
        $cate->name = $r->name;
        $cate->parent = $r->parent;
        $cate->save();
        return redirect()->back()->with('thongbao', 'Đã thêm danh mục thành công!');
    }

    public function EditCategory($id)
    {
        $data['cate'] = category::find($id);
        $data['category'] = category::all();
        return view('backend.category.editcategory', $data);
    }

    public function PostEditCategory(EditCategoryRequest $r, $id)
    {
        $cate = category::find($id);
        $cate->name = $r->name;
        if($r->parent != $cate->id)
            $cate->parent = $r->parent;
        $cate->save();
        return redirect()->back()->with('thongbao', 'Đã sửa danh mục thành công!');
    }

    public function DelCategory($id)
    {
        category::destroy($id);
        return redirect()->back()->with('thongbao', 'Đã xóa danh mục thành công!');
    }
}
