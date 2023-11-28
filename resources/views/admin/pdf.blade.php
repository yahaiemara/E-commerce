<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 Customer Name:<h3>{{$order->name}}</h3>
 Customer Email:<h3>{{$order->email}}</h3>
Customer Phone:<h3>{{$order->phone}}</h3>
Customer Address:<h3>{{$order->address}}</h3>
Product_Title :<h3>{{$order->product_title}}</h3>
Price:<h3>{{$order->price}}</h3>
Pymant_status:<h3>{{$order->pymant_status}}</h3>
Image:
<img src="product/{{$order->image}}">

</body>
</html>
