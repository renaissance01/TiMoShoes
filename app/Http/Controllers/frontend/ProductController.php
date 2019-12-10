<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\models\attr;
use App\models\category;
use App\models\product;
use App\models\attribute;
use App\models\customer;
use App\models\order;
use App\models\values;
use Cart;

class ProductController extends Controller
{
    public function ListProduct(Request $r)
    {
        if($r->category)
        {
            $data['products'] = category::find($r->category)->product()->where('img', '<>', 'no-img.jpg')->paginate(9);
        }
        else if($r->start)
        {
            $data['products'] = product::whereBetween('price', [$r->start, $r->end])->where('img', '<>', 'no-img.jpg')->paginate(9);
        }
        else if($r->value)
        {
            $data['products'] = values::find($r->value)->product()->where('img', '<>', 'no-img.jpg')->paginate(9);
        }
        else if($r->search)
        {
            $data['products'] = product::where('name', 'LIKE', '%'.$r->search.'%')->paginate(9);
        }
        else
        {
            $data['products'] = product::where('img', '<>', 'no-img.jpg')->paginate(9);
        }
        $data['category'] = category::all();

        //tìm kiếm sp theo màu sắc, kích thước...
        $data['attrs'] = attribute::all();

        return view('frontend.product.shop', $data);
    }

    public function DetailProduct($slug)
    {
        $data['product'] = product::where('slug', $slug)->first();
        $data['product_new'] = product::where('img', '<>', 'no-img.jpg')->orderby('created_at', 'DESC')->take(6)->get();

        $data['category'] = category::all();
        $data['attrs'] = attribute::all();
        return view('frontend.product.detail', $data);
    }

    public function AddCart(Request $r)
    {
        $product = product::find($r->id_product);
        Cart::add(['id' => $product->product_code,
        'name' => $product->name,
        'qty' => $r->quantity,
        'price' => getprice($product, $r->attr),
        'weight' => 0,
        'options' => ['img' => $product->img, 'attr' => $r->attr]]);
        return redirect('/product/cart');
    }

    public function Cart()
    {
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0, "", ".");
        return view('frontend.product.cart', $data);
    }

    public function RemoveCart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function UpdateCart($rowId, $qty)
    {
        Cart::update($rowId, $qty);
    }

    public function CheckOut()
    {
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0, "", ".");
        return view('frontend.checkout.checkout', $data);
    }

    public function Complete($id_customer)
    {
        $data['customer'] = customer::find($id_customer);
        return view('frontend.product.complete', $data);
    }
    public function PostCheckOut(CheckoutRequest $r)
    {
        $customer = new customer;
        $customer->full_name = $r->name;
        $customer->address = $r->address;
        $customer->email = $r->email;
        $customer->phone = $r->phone;
        $customer->total = Cart::total(0, "", "");
        $customer->state = 0; //biểu đồ doanh thu danh số: 0 là chưa thanh toán
        $customer->save();

        foreach(Cart::content() as $product)
        {
            $order = new order;
            $order->name = $product->name;
            $order->price = $product->price;
            $order->quantity = $product->qty;
            $order->img = $product->options->img;
            $order->customer_id = $customer->id;
            $order->save();

            foreach($product->options->attr as $key => $value)
            {
                $attr = new attr;
                $attr->name = $key;
                $attr->value = $value;
                $attr->order_id = $order->id;
                $attr->save();
            }
        }
        Cart::destroy();
        return redirect('/product/complete/'.$customer->id);
    }


}
