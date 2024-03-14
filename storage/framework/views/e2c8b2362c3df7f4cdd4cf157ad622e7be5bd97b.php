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
			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="card text-center" style="width: 18rem;">
				<div class="card-body">
				<h5 class="card-title"><?php echo e($product->name); ?></h5>
				<p class="card-text">Price: <?php echo e($product->price); ?></p>
                <a href="<?php echo e(route('stripe.payment',$product->id)); ?>" class="btn btn-primary">Buy Now</a>
				</div>
			</div>
			<br>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
    </div>
</body>
</html><?php /**PATH D:\XAMPP\htdocs\stripe\resources\views/product.blade.php ENDPATH**/ ?>