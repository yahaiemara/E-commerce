
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
  @include('admin.css')
  <style>
    .center{
        font-size: 40px;
        padding-bottom: 40px;
        text-align: center;
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
                <h1 class="center">Update Product</h1>
                @if(session()->has('massege'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('massege')}}
                </div>
                @endif
                <form action="{{url('update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                     <div class="form-group">
                       <label >Product Title</label>
                       <input type="text" value="{{$product->title}}" class="form-control" id="" name="title" placeholder="Product Title" required>
                     </div>
                     <div class="form-group">
                         <label >Product description</label>
                         <input type="text" value="{{$product->description}}" class="form-control" id="" name="description" placeholder="Product description"required >
                       </div>
                       <div class="form-group">
                         <label >Product price</label>
                         <input type="nubmer" value="{{$product->price}}" class="form-control" id="" name="price" placeholder="Product price "required >
                       </div>
                       <div class="form-group">
                         <label >Product discount</label>
                         <input type="number" value="{{$product->discount_price}}" class="form-control" id="" name="discont" placeholder="Product discount "required >
                       </div>
                       <div class="form-group">
                         <label >Product quantity</label>
                         <input type="number" value="{{$product->quantity}}" class="form-control" id="" name="quantity" placeholder="Product quantity "required>
                       </div>
                       <div class="form-group">
                         <label >Product Category</label>
                         <select name="category" id="">
                             <option value="{{$product->category}}" selected>{{$product->category}}</option>
                          @foreach ($category as $category )
                   <option value="{{$category->Category_naem}}" selected>{{$category->Category_name}}</option>
                          @endforeach
                         </select>
                         <div class="form-group">
                             <label>current Product image:</label>
                               <img src="product/{{$product->image}}" width="40px" height="40px">
                            </div>

                           <div class="form-group">
                            <label >change Product image:</label>
                            <input type="file" class="form-control" id="" name="image" placeholder="Product image "required>
                          </div>
                       </div>
                     <button type="submit" value="Update_product" class="btn btn-primary">Submit</button>
                   </form>
            </div>
        </div>

        <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
