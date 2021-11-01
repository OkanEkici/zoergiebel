$(function(){
    new Checkout();
});


class Checkout {

    constructor () {
  
      this.init();
      this.handlePaymentOptions();
  
    }

    init() {
        var self = this;
        $('input:radio[name="shipping_type"]').change(function(){
            $('#shippingCostsVal').html($(this).attr('data-value').replace(/\./g, ',')+' €');
            
            var totalCost = $('#totalCostsVal');
            var shipCost = totalCost.attr('data-shipcost');
            var totalValue = totalCost.attr('data-value');
            var newTotal = parseFloat(totalValue) - parseFloat(shipCost) + parseFloat($(this).attr('data-value'));
            totalCost.attr('data-shipcost', parseFloat($(this).attr('data-value')).toFixed(2));
            totalCost.attr('data-value', newTotal.toFixed(2));
            totalCost.html(newTotal.toFixed(2).toString().replace(/\./g, ',')+' €');
        })

        // Hide Non-PayPal button by default
        document.querySelector('#paypal-button-container').style.display = 'none';

        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            env: 'production',
            style: {
                layout: 'horizontal'
            },
            onClick: function(data, actions) {
                //return true;
                var form = $('#checkoutForm');
                var request = $.ajax({
                    type: 'post',
                    url: '/checkout',
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data : {
                        data : form.serializeArray()
                    },
                    success: function (data) {
                        if(typeof(data.status) !== 'undefined' && data.status == 'error') {
                            return false;
                        }
                        else {
                            self.orderData = data;
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        return false;
                    }
                });
                var response = request.responseJSON;
                if(typeof(response) !== 'undefined' && typeof(response.status) !== 'undefined' && response.status == 'error') {
                    return false;
                }
                else {
                    return true;
                }
            },
            createOrder: function() {
                return fetch('/create-payment', {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }).then(function(res) {
                    return res.json();
                    }).then(function(data) {
                        let token;
                        if ('links' in data)
                        {
                            for(let link of data.links) {
                            if (link.rel === 'approval_url') {
                                token = link.href.match(/EC-\w+/)[0];
                                } 
                            }
                        }
                    return token;
                    });
                
            },
            onApprove : function(data) {
                return fetch('/execute-payment', {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      body: JSON.stringify({
                        orderID: data.orderID,
                        payerID: data.payerID,
                        paymentId: data.paymentID,
                        success: true
                      })
                }).then(function(res) {
                    return res.json();
                }).then(function(details) {
                    window.location.href = '/thankyou';
                })
                
            }
        }).render('#paypal-button-container');
    }

    handlePaymentOptions() {
        // Listen for changes to the radio fields
        document.querySelectorAll('input[name=payment_type]').forEach(function(el) {
            el.addEventListener('change', function(event) {
                console.log(event.target.value);
                // If PayPal is selected, show the PayPal button
                if (event.target.value === '1') {
                    document.querySelector('#card-button-container').style.display = 'none';
                    document.querySelector('#paypal-button-container').style.display = 'inherit';
                }

                // If Card is selected, show the standard continue button
                if (event.target.value === '2'
                || event.target.value === '3'
                || event.target.value === '4' ) 
                {
                    document.querySelector('#card-button-container').style.display = 'inherit';
                    document.querySelector('#paypal-button-container').style.display = 'none';
                }
            });
        });
    }

}