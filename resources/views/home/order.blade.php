<!DOCTYPE html>
<html>
   <head>
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

         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->

      <!-- why section -->

      <!-- end why section -->

      <!-- arrival section -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Product_title</th>
            <th scope="col">quantity</th>
            <th scope="col">price</th>
            <th scope="col">pymant_status</th>
            <th scope="col">delivery_status</th>
            <th scope="col">image</th>
            <th scope="col">Action</th>


          </tr>
        </thead>
        <tbody>
            @foreach ($order as $order )
          <tr>
            <th>{{$order->product_title}}</th>
            <td>{{$order->quantity}}</td>
            <td>{{$order->price}}</td>
            <td>{{$order->pymant_status}}</td>
            <td>{{$order->delivery_status}}</td>
            <td>
            <img src="product/{{$order->image}}" style="width: 50px;">
            </td>

            <td>
                @if($order->delivery_status=='processing')
                <a href="{{url('cancel_order',$order->id)}}" class="btn btn-primary">Cancel Order</a>
            @else
            <a href="" class="btn btn-outline-primary">canceled</a>
                @endif

            </td>
          </tr>
          @endforeach


        </tbody>
      </table>
      <!-- end arrival section -->

      <!-- product section -->

      <!-- end product section -->

      <!-- subscribe section -->

      <!-- end subscribe section -->
      <!-- client section -->

      <!-- end client section -->
      <!-- footer start -->

      <!-- footer end -->

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
