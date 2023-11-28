
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')
  <style>
    .image{
        width: 150px;
        height:
    }
  </style>
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
                @if(session()->has('massege'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('massege')}}
                </div>
                @endif
                <table class="table">
                    <thead>
                      <tr>

                        <th scope="col">Title</th>
                        <th scope="col">description</th>
                        <th scope="col">Price</th>
                        <th scope="col">discount</th>
                        <th scope="col">category</th>
                        <th scope="col">quantity</th>
                        <th scope="col">image</th>
                        <th scope="col">Action</th>


                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $product)
                        <tr>
                            <th>{{$product->title}}</th>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <img class="image" src="/product/{{$product->image}}">
                            </td>
                            <td>
                      <a class="" href="{{url('delete_product',$product->id)}}">Delete</a>
                            </td>
                            <td>
                                <a class="delete" href="{{url('update_product',$product->id)}}">Update</a>

                            </td>
                          </tr>
                        @endforeach


                    </tbody>
                  </table>
            </div>
        </div>
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
