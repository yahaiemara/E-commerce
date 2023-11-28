
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('admin.nav')
        <!-- partial -->


 <div class="main-panel">
            <div class="content-wrapper">





                <div class="table-responsive">
                    <table class="table">

                        <tr>
                          <th scope="col">name</th>
                          <th scope="col">email</th>
                          <th scope="col">phone</th>
                          <th scope="col">address</th>
                          <th scope="col">product_title</th>
                          <th scope="col">price</th>
                          <th scope="col">quantity</th>
                          <th scope="col">pymant_status</th>
                          <th scope="col">delivery_status</th>
                          <th scope="col">img</th>
                          <th scope="col">Delivered</th>
                          <th scope="col">Printer</th>


                        </tr>


                        @foreach ($order as $order )


                        <tr>

                          <td>{{$order->name}}</td>
                          <td>{{$order->email}}</td>
                          <td>{{$order->phone}}</td>
                          <td>{{$order->address}}</td>
                          <td>{{$order->product_title}}</td>
                          <td>{{$order->price}}</td>
                          <td>{{$order->quantity}}</td>
                          <td>{{$order->pymant_status}}</td>
                          <td>{{$order->delivery_status}}</td>
                          <td>
                        <img src="product/{{$order->image}}" style="width: 150px;;">
                          </td>
                          <td>
                            @if($order->delivery_status=='processing')
                            <a class="btn btn-primary" onclick="return confirm('Are You Sure By This process')" href="{{url('delivered',$order->id)}}">Delivered</a>
                         @else
                         <p style="color: green">Delivered</p>
                         @endif

                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{url('print',$order->id)}}">Print Pdf</a>
                        </td>
                        </tr>

                        @endforeach


                  </div>




            </div>
 </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
