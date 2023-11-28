<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\product;
use App\Models\order;
use PDF;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $REQUEST){
$data=new Category;
$data->Category_name=$REQUEST->category;
$data->save();
return redirect()->back()->with('massege','Add Successfully');
    }
    public function delete_category($id){
        $data=Category::findorfail($id);
        $data->delete();
        return redirect()->back()->with('massege','Category Deleted Successfully');
    }
public function view_product(){
    $category=Category::all();
    return view('admin.product',compact('category'));
}





public function add_product(Request $REQUEST){
$product=new product;
$product->title=$REQUEST->title;
$product->description=$REQUEST->description;
$product->price=$REQUEST->price;
$product->discount_price=$REQUEST->discount;
$product->quantity=$REQUEST->quantity;
$product->category=$REQUEST->category;
$image=$REQUEST->image;
$imagename=time().'.'.$image->getClientOriginalExtension();
$REQUEST->image->move('product',$imagename);
$product->image=$imagename;

$product->save();
return redirect()->back()->with('massege','Product Add successfully');

}
public function show_product(){
$product=product::all();
    return view('admin.show_product',compact('product'));
}
public function delete_product($id){
$product=product::findorfail($id);
$product->delete();
return redirect()->back()->with('massege','Delete Product Successfully');
}
public function update_product($id){
$product=product::find($id);
$category=Category::all();
    return view('admin.update_product',compact('product','category'));
}
public function update(Request $REQUEST, $id){
 $product=product::findorfail($id);
 $product->title=$REQUEST->title;
 $product->description=$REQUEST->description;
 $product->price=$REQUEST->price;
 $product->discount_price=$REQUEST->discont;
 $product->category=$REQUEST->category;
 $product->quantity=$REQUEST->quantity;
 $image=$REQUEST->image;
 if($image){
 $imagename=time().'.'.$image->getClientOriginalExtension();
 $REQUEST->image->move('product',$imagename);
 $product->image=$imagename;
 }
 $product->save();
 return redirect()->back()->with('massege','Update Successfully');
}
public function order(){
    $order=order::all();
    return view('admin.order',compact('order'));
}
public function delivered($id){
    $delivered=order::find($id);
    $delivered->delivery_status='delivered';
    $delivered->pymant_status='Paid';
    $delivered->save();
    return back();
}
public function print($id){
    $order=order::find($id);
    $pdf=PDF::LoadView('admin.pdf',compact('order'));
    return $pdf->download('order_details.pdf');
}

}
