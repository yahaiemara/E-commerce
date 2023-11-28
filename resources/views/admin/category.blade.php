
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
    .font{
        font-size: 40px;
        padding-bottom: 40px;
    }
    .input_color{
        color: black;
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
                    <h2 class="font">Add Category</h2>
                    <form action="{{url('/add_category')}}" method="post">
                        @csrf
                        @method('post')
                        <input type='text' name='category' class="input_color" placeholder="Add Category">
                        <input type="submit" class="btn btn-primary" name='submit' value="Add Category">
                    </form>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category_name</th>
                        <th scope="col">Action</th>


                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)


                      <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->Category_name}}</td>
                        <td>
                            <a onclick="return confirm('Are Your Shore Delete This')" type="button" href="{{url('delete_category',$data->id)}}" class="btn btn-danger" >Delete</a>
                        </td>


                      </tr>
                      @endforeach
                    </tbody>
                  </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
