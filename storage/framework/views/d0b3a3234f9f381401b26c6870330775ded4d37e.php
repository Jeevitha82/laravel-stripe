<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>    
<div class="container">    
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-center">Product Details</h1>
            <h3 class="text-center">Product : <?php echo e($data->name); ?></h3>
            <h3 class="text-center">Price : <?php echo e($data->price); ?></h3>
            <h3 class="text-center">Description : <?php echo e($data->description); ?></h3>
        </div>
        <div class="col-md-6">
            <h1 class="text-center">Stripe Payment</h1>
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                        <h3 class="panel-title" >Payment Details</h3>
                </div>
                <div class="panel-body">    
                    <form role="form" action="<?php echo e(route('stripe.post')); ?>" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>" id="payment-form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name='prod_id' value="<?php echo e($data->id); ?>">
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name</label> 
                                <input type='text' class='form-control' size='4' >
                            </div>
                        </div>    
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> 
                                <input type='text' class='form-control card-number' maxlength="16">
                            </div>
                        </div>    
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> 
                                <input type='text' class='form-control card-cvc' placeholder='123' maxlength="3">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> 
                                <input type='text' class='form-control card-expiry-month' placeholder='MM' maxlength="2">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> 
                                <input type='text' class='form-control card-expiry-year' placeholder='YYYY' maxlength="4">
                            </div>
                        </div>    
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now </button>
                            </div>
                        </div>                            
                    </form>
                </div>
            </div>        
        </div>
    </div>        
</div>    
</body>
    
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>    
<script type="text/javascript">
  
$(function() {
  
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
    
            var token = response['id'];       
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
</html>
<?php /**PATH D:\XAMPP\htdocs\stripe\resources\views/stripe.blade.php ENDPATH**/ ?>