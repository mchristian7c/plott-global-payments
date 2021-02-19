<html>
    <head>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="<?= env('APP_URL') ?>/js/rxp-hpp.js"></script>

        <script type="text/javascript" src="<?php echo env('APP_URL') ?>/js/app.js"></script>
        <link rel="stylesheet" href="<?php echo env('APP_URL') ?>/css/style.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <script>
            $(document).ready(function() {
                let jsonFromRequestEndpoint = <?= $json ?>;
                // jsonFromRequestEndpoint.MERCHANT_ID = <?= env('GP_MERCHANT_ID') ?>;
                
                RealexHpp.setHppUrl("<?= env('GP_PAYMENT_URL') ?>");
                RealexHpp.embedded.init(
                    "paymentButton", 
                    "paymentWindow", 
                    "<?= env('APP_URL') ?>", 
                    jsonFromRequestEndpoint);

                if (window.addEventListener) {
                    window.addEventListener('message', receiveMessage, false);
                } else {
                    window.attachEvent('message', receiveMessage);
		}

		$('#paymentButton').click(function () {
			setTimeout(function () {
				$('#paymentButton').remove();
			}, 250);
		});
            });

            function receiveMessage (event) {
                console.log('message received', event);
            }
	</script>

        <?php
            if (isset($_POST['customer_name']))     { $customer_name     = $_POST['customer_name'];   }
            if (isset($_POST['customer_email']))    { $customer_email    = $_POST['customer_email'];  }
            if (isset($_POST['customer_phone']))    { $customer_phone    = $_POST['customer_phone'];  }
            if (isset($_POST['business_name']))     { $business_name     = $_POST['business_name'];   }
            if (isset($_POST['invoice_number']))    { $invoice_number    = $_POST['invoice_number'];  }
            if (isset($_POST['invoice_amount']))    { $invoice_amount    = $_POST['invoice_amount'];  }
            if (isset($_POST['shippingAddress']))   { $shippingAddress   = $_POST['shippingAddress']; }
            if (isset($_POST['billingAddress']))    { $billingAddress   = $_POST['billingAddress'];  }
        ?>
    </head>
    <body>
    <header>
        <div class="wrapper-width logo-wrap">
            <div class="logo">
                <a href="//www.freightport.co.uk/">
                    <img src="//www.freightport.co.uk/wp-content/themes/freightport/images/Retina_Freightport_Nav_Bar_Logo.png" class="hp_logo" alt="freightport logo" />
                </a>
            </div>
            <div class="home_button">
                <a href="//:freightport.co.uk"><span>&lsaquo;</span>back to home</a>
            </div>
        </div>
        <div class="wrapper">
            <div class="contact-header">
                <div class="wrapper wrapper-width phones">
                    <p><span>Birmingham</span>
                        <a href="tel:+44121314115">+ 44 (0) 121 314 1155</a></p>
                    <p><span>London</span>
                        <a href="tel:+442080498100">+ 44 (0) 20 8049 8100</a></p>
                    <p><span>Glasgow</span>
                        <a href="tel:+441414658490">+ 44 (0) 141 465 8490</a></p>
                    <p><span>Hull</span>
                        <a href="tel:+441482459020">+44 (0) 1482 459 020</a></p>
                </div>
            </div>
        </div>
    </header>
        
    <div class="banner_top">
        <div class="wrapper">
            <div class="banner_title">check your details</div>
        </div>
    </div>
        
    <form class="iframe-page">
        <header>
            <p>Please thoroughly check your details below before submission. Amend any errors with the button below the form.</p>
        </header>

        <div class="form-inner">
            <fieldset class="customer-details">
                <h3>Your Details</h3>

                <label>
                    Your Name:<br>
                    <input type="text" value="<?php echo $customer_name ?>" readonly />
                </label>

                <label>
                    Your Email:<br>
                    <input type="email" value="<?php echo $customer_email ?>" readonly />
                </label>

                <label>
                    Your Phone Number:<br>
                    <input type="text" value="<?php echo $customer_phone ?>" readonly />
                </label>

                <label>
                    Company:<br>
                    <input type="text" value="<?php echo $business_name ?>" readonly />
                </label>

                <label>
                    Invoice Number:<br>
                    <input type="text" value="<?php echo $invoice_number ?>" readonly />
                </label>

                <label>
                    Invoice Amount:<br>
                    <input type="number" value="<?php echo $invoice_amount ?>" readonly />
                </label>
            </fieldset>

            <fieldset class="company-address">
                <h3>Company Address:</h3>

                <label>
                    Address line 1:<br>
                    <input type="text" value="<?php echo $shippingAddress['address_line_1'] ?>" readonly />
                </label>

                <label>
                    Address line 2:<br>
                    <input type="text" value="<?php echo $shippingAddress['address_line_2'] ?>" readonly />
                </label>

                <label>
                    Address line 3:<br>
                    <input type="text" value="<?php echo $shippingAddress['address_line_3'] ?>" readonly />
                </label>

                <label>
                    Town/City:<br>
                    <input type="text" value="<?php echo $shippingAddress['town'] ?>" readonly />
                </label>

                <label>
                    Postcode:<br>
                    <input type="text" value="<?php echo $shippingAddress['postcode'] ?>" readonly />
                </label>
            </fieldset>

            <div class="billing-details--wrapper">
                <div class="billing-details--title">
                    <h3>Billing Address</h3>
                    <label>
                        Use the <strong>company address</strong> for billing address
                        <input type="checkbox" value="1" checked />
                    </label>
                </div>
                <fieldset class="billing-details hidden">
                    <label>
                        Billing Address line 1:<br>
                        <input class="optionallyRequired" type="text" value="<?php echo $billingAddress['address_line_1'] ?>" readonly />
                    </label>

                    <label>
                        Billing Address line 2:<br>
                        <input type="text" value="<?php echo $billingAddress['address_line_2'] ?>" readonly />
                    </label>

                    <label>
                        Billing Address line 3:<br>
                        <input type="text" value="<?php echo $billingAddress['address_line_3'] ?>" readonly />
                    </label>

                    <label>
                        Billing Town/City:<br>
                        <input class="optionallyRequired" type="text" value="<?php echo $billingAddress['town'] ?>" readonly />
                    </label>

                    <label>
                        Billing Postcode:<br>
                        <input class="optionallyRequired" type="text" value="<?php echo $billingAddress['postcode'] ?>" readonly />
                    </label>
                </fieldset>
            </div>
        </div>
    </form>
    <footer class="iframe-page--footer">
        <div class="footer-inner wrapper-width">
            <button class="iframe-page--amend-button" onclick="history.back(-1)"><span>&lsaquo;</span>amend details</button>
            <input class="iframe-page--checkout-button" type="submit" id="paymentButton" value="Checkout Now" />
        </div>
    </footer>
        <iframe id="paymentWindow"></iframe>
    <?php include('footScripts.php'); ?>

