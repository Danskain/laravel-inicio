<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$product->title}} - ({{$product->id}})</h1>

    <p>{{$product->description}}</p>
    
    <p>{{$product->price}}</p>
    <p>{{$product->stock}}</p>
    <p>{{$product->status}}</p>
</body>
</html>