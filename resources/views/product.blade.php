<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="text-center">Products</h1>
    <div class="container">
        <div class="card-columns">
			@foreach($products as $product)
			<div class="card text-center" style="width: 18rem;">
				<div class="card-body">
				<h5 class="card-title">{{ $product->name }}</h5>
				<p class="card-text">Price: {{ $product->price }}</p>
                <a href="{{route('stripe.payment',$product->id)}}" class="btn btn-primary">Buy Now</a>
				</div>
			</div>
			<br>
			@endforeach
		</div>
    </div>
</body>
</html>