<!DOCTYPE html>
<html>
   <head>
    <style>
    .totalprice{
margin:auto;
padding: 20px;
        }
        .price{
            color: red;
            font-size: 20px;
            padding: 10px;
            letter-spacing: 2px;
        }
    </style>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         <!-- end slider section -->
         <table class="table">
            <thead>
              <tr>
                <th scope="col">Product_title</th>
                <th scope="col">Product_quantity</th>
                <th scope="col">Product_price</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
        <?php $totalprice=0; ?>
                @foreach ($cart as $cart )
              <tr>
                <th>{{$cart->product_title}}</th>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->price}}</td>
                <td>
                    <img src="product/{{$cart->image}}" style="width: 100px;height:100px;">
                </td>
                <td>
                    <a class="btn btn-primary" onclick="return confirm('Are You Sure')" href="{{url('delete_cart',$cart->id)}}" type="submit">Delete</a>
                </td>
              </tr>
              <?php $totalprice=$totalprice + $cart->price ?>
              @endforeach

            </tbody>
          </table>
          <div class="totalprice">
            <h1 class="price">TotalPrice:${{$totalprice;}}</h1>

        </div>
      <!-- why section -->
      <!-- end why section -->
      @if(session()->has('massege'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('massege')}}
                </div>
                @endif
      <!-- arrival section -->

      <!-- end arrival section -->
      <div style="margin: auto">


        <a href="{{url('stripe',$totalprice)}}" class="btn btn-primary"  style="">Pay Useing Card</a>
        <a href="{{url('cash_order')}}" class="btn btn-primary" >Cash On Delivary</a>


      </div>
      <!-- product section -->
      <!-- end product section -->

      <!-- subscribe section -->
      <!-- end subscribe section -->
      <!-- client section -->
      <!-- end client section -->
      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
