<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="<?= env('APP_URL') ?>/js/rxp-hpp.js"></script>
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
            });

            function receiveMessage (event) {
                console.log('message received', event);
            }
        </script>
    </head>
    <body>
        <input type="submit" id="paymentButton" value="Checkout Now" />
        <iframe id="paymentWindow"></iframe>
    </body>
</html>