<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\product;
use App\Models\cart;
use App\Models\order;
use App\Models\comment;
use App\Models\reply;


use Session;
use Stripe;


class HomeController extends Controller
{
public function redirect(){
$usertype=Auth::user()->usertype;
if($usertype=='1'){
    $total_product=product::all()->count();
    $total_order=order::all()->count();
    $total_user=User::all()->count();
    $order=order::all();
    $total_revenue=0;
  foreach ($order as $order) {
$total_revenue=$total_revenue + $order->price;
  }
  $total_delivered=order::where('delivery_status','=','delivered')->get()->count();
  $total_processing=order::where('delivery_status','=','processing')->get()->count();


    return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
}else{
    $product =product::paginate(3);
    $comment=comment::all();
    $reply=reply::all();
    return view('home.userpage',compact('product','comment','reply'));
}
}
public function index(){
    $product =product::paginate(3);
    $comment=comment::all();
    $reply=reply::all();

    return view('home.userpage',compact('product','comment','reply'));
}
public function details($id){
    $product=product::find($id);
    return view('home.product_details',compact('product'));
}
public function add_cart(request $REQUEST,$id){
if(Auth::id()){
    $user=Auth::User();
    $userid=$user->id;
    $product=product::find($id);
    $product_exists=cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();



if($product_exists){
$cart=cart::find($product_exists)->first();
$quantity=$cart->quantity;
$cart->quantity= $quantity+$REQUEST->quantity;
if($product->discount_price!=null){
    $cart->price=$product->discount_price * $cart->quantity;
}
else{
    $cart->price=$product->price *  $cart->quantity;

}
$cart->save();
return back();
}else{

    $cart=new cart;
     $cart->name=$user->name;
     $cart->email=$user->email;
     $cart->phone=$user->phone;
     $cart->address=$user->address;
     $cart->user_id=$user->id;
     $cart->product_title=$product->title;
     $cart->product_id=$product->id;
if($product->discount_price!=null){
    $cart->price=$product->discount_price * $REQUEST->quantity;
}
else{
    $cart->price=$product->price *  $REQUEST->quantity;

}
$cart->quantity=$REQUEST->quantity;
     $cart->image=$product->image;

     $cart->save();
     return redirect()->back();
}




}else{
    return redirect ('login');
}
}
public function show_cart(){
    if(Auth::id()){
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        return view('home.show_cart',compact('cart'));
    }else{
        return redirect('login');
    }

}
public function delete_cart($id){
    $cart=cart::findorfail($id);
    $cart->delete();
    return redirect()->back();
}
public function cash_order(){
    $user=Auth::user();
    $userid=$user->id;
    $data=cart::where('user_id','=',$userid)->get();
    foreach($data as $data){
        $order=new order;
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->product_id=$data->product_id;
        $order->product_title=$data->product_title;
        $order->image=$data->image;
        $order->price=$data->price;
        $order->user_id=$data->user_id;
        $order->quantity=$data->quantity;
        $order->pymant_status='cash on delivery';
        $order->delivery_status='processing';
        $order->save();

        $cart_id=$data->id;
        $cart=cart::find($cart_id);
        $cart->delete();
    }
return redirect()->back()->with('massege','تم شحن الاوردر');
}
public function stripe($totalprice){
    return view('home.stripe',compact('totalprice'));
}
public function stripePost(Request $request,$totalprice)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
    ]);
    $user=Auth::user();
    $userid=$user->id;
    $data=cart::where('user_id','=',$userid)->get();
    foreach($data as $data){
        $order=new order;
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->product_id=$data->product_id;
        $order->product_title=$data->product_title;
        $order->image=$data->image;
        $order->price=$data->price;
        $order->user_id=$data->user_id;
        $order->quantity=$data->quantity;
        $order->pymant_status='Paid';
        $order->delivery_status='processing';
        $order->save();

        $cart_id=$data->id;
        $cart=cart::find($cart_id);
        $cart->delete();
    }
    Session::flash('success', 'Payment successful!');

    return back();
}
public function show_order(){
    if(auth::id()){
        $user=auth::user();
        $user_id=$user->id;
        $order=order::where('user_id','=',$user_id)->get();

        return view('home.order',compact('order'));
    }else{
        return redirect('login');
    }
}
public function cancel($id){
$order=order::find($id);
$order->delivery_status='you cancel the order';
$order->save();
return redirect()->back();

}
public function comment(Request $request){
if(auth::id()){
$comment=new comment;
$comment->name=Auth::user()->name;
$comment->user_id=auth::user()->id;
$comment->comment=$request->comment;
$comment->save();
return back();

}else{
    return redirect('login');
}
}
public function add_reply(Request $request){
    if(Auth::id()){
$reply=new reply;
$reply->name=Auth::user()->name;
$reply->user_id=Auth::user()->id;
$reply->comment_id=$request->commentId;
$reply->reply=$request->reply;
$reply->save();
return back();


    }else{
        return redirect('login');
    }
}
public function show_product(){
    $product =product::paginate(3);
    $comment=comment::all();
    $reply=reply::all();
    $cart=cart::all();
    return view('home.all_product',compact('product','comment','reply','cart'));
}
public function authpage(){
    return socialite::driver('google')->redirect();
}
public function authcallback(){
    try {

        $user = Socialite::driver('google')->user();

        $finduser = User::where('google_id', $user->id)->first();

        if($finduser)

        {

            Auth::login($finduser);

             return redirect()->intended('/redirect');

        }

        else

        {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'password' => encrypt('123456dummy')
            ]);

            Auth::login($newUser);

             return redirect()->intended('/redirect');
        }

    } catch (Exception $e) {
        dd($e->getMessage());
  }
}
}
