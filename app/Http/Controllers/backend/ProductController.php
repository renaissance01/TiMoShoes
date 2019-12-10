<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddAttrRequest;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\AddValueRequest;
use App\Http\Requests\EditAttrRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\EditValueRequest;
use App\models\attribute;
use App\models\category;
use App\models\product;
use App\models\values;
use App\models\variant;

class ProductController extends Controller
{
    public function ListProduct()
    {
        $data['products'] = product::paginate(10);
        return view('backend.product.listproduct', $data);
    }

    public function AddProduct()
    {
        $data['attrs'] = attribute::all();
        $data['category'] = category::all();
        return view('backend.product.addproduct', $data);
    }

    public function PostProduct(AddProductRequest $r)
    {
        ///dd($r->all());
        $product = new product;
        $product->product_code = $r->product_code;
        $product->name = $r->product_name;
        $product->slug = str_slug($r->product_name);
        $product->price = $r->product_price;
        $product->featured = $r->featured;
        $product->state = $r->product_state;
        $product->info = $r->info;
        $product->describe = $r->description;

        if($r->hasFile('product_img'))
        {
            $file=$r->product_img;
            $file_name=str_random(9).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img', $file_name);
            $product->img = $file_name;
        }
        else
        {
            $product->img = 'no-img.jpg';
        }

        $product->category_id = $r->category;
        $product->save();

        $mang = array();
        foreach($r->attr as $value)
        {
            foreach($value as $item)
            {
                $mang[] = $item;
            }
        }
        $product->values()->attach($mang);

        $variant = get_combinations($r->attr);
        foreach($variant as $var)
        {
            $vari = new variant;
            $vari->product_id = $product->id;
            $vari->save();
            $vari->values()->attach($var);
        }
        return redirect('/admin/product/add-variant/'.$product->id);
    }

    public function EditProduct(Request $r, $id)
    {
        $data['product'] = product::find($id);
        $data['category'] = category::all();
        $data['attrs'] = attribute::all();
        return view('backend.product.editproduct', $data);
    }

    public function PostEditProduct(EditProductRequest $r, $id)
    {
        $product = product::find($id);
        $product->product_code = $r->product_code;
        $product->name = $r->product_name;
        $product->slug = str_slug($r->product_name);
        $product->price = $r->product_price;
        $product->featured = $r->featured;
        $product->state = $r->product_state;
        $product->info = $r->info;
        $product->describe = $r->description;

        if($r->hasFile('product_img'))
        {
            if($product->img != 'no-img.jpg')
            {
                unlink('backend/img/'.$product->img);
            }
            $file=$r->product_img;
            $file_name=str_random(9).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img', $file_name);
            $product->img = $file_name;
        }

        $product->category_id = $r->category;
        $product->save();

        $mang = array();
        foreach($r->attr as $value)
        {
            foreach($value as $item)
            {
                $mang[] = $item;
            }
        }
        $product->values()->sync($mang);

        $variant = get_combinations($r->attr);
        foreach($variant as $var)
        {
            if(check_var($product, $var))
            {
                $vari = new variant;
                $vari->product_id = $product->id;
                $vari->save();
                $vari->values()->attach($var);
            }
        }
        return redirect()->back()->with('thongbao', 'Đã sửa sản phẩm thành công!');
    }

    public function DelProduct($id)
    {
        product::destroy($id);
        return redirect()->back()->with('thongbao', 'Đã xóa thành công sản phẩm');
    }

    public function AddAttr(AddAttrRequest $r)
    {
        $attr = new attribute;
        $attr->name = $r->attr_name;
        $attr->save();
        return redirect()->back()->with('thongbao', 'Đã thêm thành công thuộc tính: '.$r->attr_name);
    }

    public function DetailAttr()
    {
        $data['attrs'] = attribute::all();
        return view('backend.attr.attr', $data);
    }

    public function EditAttr($id)
    {
        $data['attr'] = attribute::find($id);
        return view('backend.attr.editattr', $data);
    }

    public function PostAttr(EditAttrRequest $r, $id)
    {
        $attr = attribute::find($id);
        $attr->name = $r->attr_name;
        $attr->save();
        return redirect()->back()->with('thongbao', 'Đã sửa thành công thuộc tính');
    }

    public function DelAttr($id)
    {
        attribute::destroy($id);
        return redirect()->back()->with('thongbao', 'Đã xóa thành công thuộc tính');
    }

    public function AddValue(AddValueRequest $r)
    {
        $attr = new values;
        $attr->attr_id = $r->attr_id;
        $attr->value = $r->value_name;
        $attr->save();
        return redirect()->back()->with('thongbao', 'Đã thêm thành công giá trị thuộc tính: '.$r->attr_name);

    }

    public function EditValue($id)
    {
        $data['value'] = values::find($id);
        return view('backend.attr.editvalue', $data);
    }

    public function PostEditValue(EditValueRequest $r, $id)
    {
        $value = values::find($id);
        $value->value = $r->value_name;
        $value->save();
        return redirect()->back()->with('thongbao', 'Đã sửa thành công giá trị: '.$r->value_name);
    }

    public function DelValue($id)
    {
        values::destroy($id);
        return redirect()->back()->with('thongbao', 'Đã xóa thành công giá trị thuộc tính!');
    }

    public function AddVariant($id)
    {
        $data['product'] = product::find($id);
        return view('backend.variant.addvariant', $data);
    }

    public function PostAddVariant(request $r, $id)
    {
        foreach($r->variant as $key => $value)
        {
            $vari = variant::find($key);
            $vari->price = $value;
            $vari->save();
        }
        return redirect('/admin/product/')->with('thongbao', 'Đã thêm sản phẩm thành công!');
    }

    public function EditVariant($id)
    {
        $data['product'] = product::find($id);
        return view('backend.variant.editvariant', $data);
    }

    public function PostEditVariant(request $r, $id)
    {
        foreach($r->variant as $key => $value)
        {
            $vari = variant::find($key);
            $vari->price = $value;
            $vari->save();
        }
        return redirect('/admin/product/')->with('thongbao', 'Đã sửa giá thành công!');

    }

    public function DelVariant($id)
    {
        variant::destroy($id);
        return redirect()->back()->with('thongbao', 'Đã xóa thành công!');
    }

}
