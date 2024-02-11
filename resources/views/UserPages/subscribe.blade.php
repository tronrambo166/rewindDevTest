<!DOCTYPE html>
<html lang="en">

<head>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta name="keywords" content="bibimcart, ">
    <meta name="author" content="">
         <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
         <link rel="stylesheet" type="text/css" href="style.css">
    
   </head>



<body>
<div class="container">

@if(Session::has('Stripe_failed'))
        <!-- Pop up Modal -->
            <div class="success_message modal" style="display:block;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content popup_success">

                        <div class="modal-body">
                            <h2 class="my-4 modal-title text-center w-100" id="exampleModalLabel">Failed</h2>

                            <p class="text-center text-danger">{{Session::get('Stripe_failed')}} @php Session::forget('Stripe_failed'); @endphp</p>
                        </div>
                        <div class="modal-footer">
                            <button onclick="popupClose();" type="button" class="w-50 py-2 my-3 h5 m-auto btn text-white" style="background:red;font-size: 18px;" data-dismiss="modal">Ok</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Pop up Modal -->
        @endif
	
  <div class="col-sm-12">

         <div class="row py-4 w-100">

         <h5 class="text-center w-75">Pay with your Credit/Debit Card via Stripe 
          <i class="fab fa-cc-stripe"></i></h5>
          <a class="btn btn-primary w-25" href="{{route('home')}}">Back to home</a></div>

         <div class="row bg-light m-auto ">

            <div class="col-md-6 m-auto col-md-offset-3 py-2">
                
               <div class="panel m-auto panel-default credit-card-box">
                  <div class="panel-heading display-table" >
                     <div class="row display-tr" >
                        <div class="display-td" >                            
                           
                        </div>
                     </div>
                  </div>
                  <div class="panel-body">
                     @if (Session::has('success'))
                     <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                     </div>
                     @endif



                        <!-- Form Starts Here -->
                     <form     
                        role="form"
                        action="{{ route('subscribe') }}"
                        method="post"
                        class="require-validation m-auto"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="pk_test_51JFWrpJkjwNxIm6zf1BN9frgMmLdlGWlSjkcdVpgVueYK5fosCf1fAKlMpGrkfGoiXGMb0PpcMEOdINTEVcJoCNa00tJop21w6"
                        id="payment-form">
                        @csrf


                        <!-- Shipping address  starts -->

                         
                     <div class="row error mx-1 text-center collapse"><p style="color:#e31313; background: #cfcfcf82;font-weight: 600;" class="alert my-2 py-1 w-100"></p></div> 

                         
                        <div class='form-row row my-2'>
                           <div class='col-sm-6  form-group required'>
                              
                              <input class='pl-2 border w-100 rounded' size='4' name="price" id="price" value="${{$amount}}" readonly >

                              <input class='form-control pl-2' size='4' name="amountReal" id="amountReal" type='number' value="{{$amount}}" readonly hidden>

                           </div> 

                           <div class='col-sm-6  form-group required'> 
                              <input class='border w-100 rounded pl-2' size='4' placeholder="Email" name="email" value="{{$email}}" id="" 
                              type='email'  >
                           </div> 
                        </div>  




                        <div class='form-row row my-2'>
                           <div class='col-sm-6  form-group required'>
                                 <input class='border w-100 rounded pl-2' size='4' placeholder="Name on Card" name="name" value="{{$name}}" id="">
                           </div>

                           <div class='col-sm-6 form-group card required'>
                            <input autocomplete='on' style="border: none;" 
                                 autocomplete='off' placeholder="Card Number" class=' card-number w-100 rounded pl-2' size='20'
                                 type='text'>             
                           </div>
                        </div>


                        <div class='form-row row my-2'>
                           <div class='col-xs-12 col-md-4 form-group cvc required'>
                              <label class=' small'> CVC </label> <input autocomplete='off'
                                 class='w-100 rounded pl-2 border card-cvc' placeholder='ex. 311' size='4'
                                 type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'> Exp. Month </label> <input autocomplete='on'
                                 class='w-100 rounded pl-2 border card-expiry-month' placeholder='MM/Ex.  07' size='2'
                                 type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'> Exp. Year </label> <input autocomplete='on'
                                 class='w-100 rounded pl-2 border card-expiry-year' placeholder='YYYY/Ex. 2022' size='4'
                                 type='text'>
                           </div>
                        </div>
                        


                        <div class="privacy-wrp ">
                                            
                                                <input type="checkbox" required="" id="AND">
                                                <label for="AND" class="allterms d-inline"> 
                                                    <p class="d-inline small" style="font-size: 12px;">I HAVE READ AND AGREE TO THE WEBSITE <a class="text-light" href="#" disbaled> TERMS AND CONDITIONS</a></p>
                                                </label>  </div>


                        <div class="row my-4">
                           <div class="col-sm-12 text-center">
                              <button style="background: #222222;border-radius: 35px;" id ="pay_btn" class="py-1 font-weight-bold text-light btn m-auto btn-lg btn-block" type="submit" >Pay <span id="paynow"></span><span id="stripBtn"></span></button>
                           </div>
                        </div>

                     </form>


                  </div>
               </div>
            </div>

           <div class="col-md-6" id="info">
                <div class=" wrapper bg-white">
                    <div class="p-3">
                    <h5 class="p-2">Base Plan</h5>


                        <div class="px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Subtotal:</p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-weight:500;">${{round($amount,2)}}/mo</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="h6" style="font-weight:500;">Due Now:</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="h6" style="font-weight:500;">${{number_format((float)$amount, 2, '.', '');}}/mo</p>
                                </div>


                                @php $expire_date = date('d-m-Y', strtotime("+30 days")); @endphp
                                <div class="col-md-12 my-3">
                                    <div class="wrapper m-auto">
                                        <h6>Plan terms</h6> <hr>

                                        <p class="small"> <i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; Billing automatically starts after the period ends</p>
                                        <p class="small"> <i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; Cancel before {{date('d M',strtotime($expire_date)) }} to avoid getting billed</p>
                                        <p class="small"> <i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; We will remind you 7 days before the period ends</p>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

         </div>
      </div>

	
</div>








<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    

   <script type="text/javascript">


      $(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
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
                .removeClass('collapse')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});

      function popupClose() {
            $('.success_message').css('display', 'none');
        }
   </script>

</body>

</html>
