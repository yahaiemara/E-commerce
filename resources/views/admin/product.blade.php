
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  @include('admin.css')
<style>
    .div_center{
        text-align: center;
        padding-top: 40px;
    }
    .center{
     font-size: 40px;
     padding-bottom: 40px;
    }
    .color{
        color: black;
    }
.form-control{
    width: 200px;
   margin-left: 38%;


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


<div class="div_center">
    <h1 class="center">Add Product</h1>
    {{-- <form>
        <label>Product name:</label>
        <input class="color" type="text" name="title" placeholder="Product Title">
        <label>Product description:</label>
        <input class="color" type="text" name="description" placeholder="Product description">
        <label>Product price:</label>
        <input class="color" type="number" name="price" placeholder="Product price">
        <label>Product discount:</label>
        <input class="color" type="number" name="discount" placeholder="Product discount">
        <label>Product quntity:</label>
        <input class="color" type="number" name="quantity" min="0" placeholder="Product discount">
        <label>Product Category:</label>
        <select class="color" name="category" id="" value="Category">
         <option value="">realme c21</option>
        </select>
        <label>Product image:</label>
        <input class="color" type="file" name="image" placeholder="Product image">
         <button type="submit">submit</button>

    </form> --}}


    <form action="{{url('add_product')}}" method="post" enctype="multipart/form-data">
       @csrf
        <div class="form-group">
          <label >Product Title</label>
          <input type="text" class="form-control" id="" name="title" placeholder="Product Title" required>
        </div>
        <div class="form-group">
            <label >Product description</label>
            <input type="text" class="form-control" id="" name="description" placeholder="Product description"required >
          </div>
          <div class="form-group">
            <label >Product price</label>
            <input type="nubmer" class="form-control" id="" name="price" placeholder="Product price "required >
          </div>
          <div class="form-group">
            <label >Product discount</label>
            <input type="number" class="form-control" id="" name="discount" placeholder="Product discount " >
          </div>
          <div class="form-group">
            <label >Product quantity</label>
            <input type="number" class="form-control" id="" name="quantity" placeholder="Product quantity "required>
          </div>
          <div class="form-group">
            <label >Product Category</label>
            <select name="category" id="">
                <option value="" selected>Add Category Here</option>
                @foreach ($category as $category )
                <option value="{{$category->Category_name}}">{{$category->Category_name}}</option>

                @endforeach
            </select>
            <div class="form-group">
                <label >Product image:</label>
                <input type="file" class="form-control" id="" name="image" placeholder="Product image "required>
              </div>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>


            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
