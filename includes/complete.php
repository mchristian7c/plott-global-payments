<html>
<head>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="<?= env('APP_URL') ?>/js/rxp-hpp.js"></script>

    <script type="text/javascript" src="<?php echo env('APP_URL') ?>/js/app.js"></script>
    <link rel="stylesheet" href="<?php echo env('APP_URL') ?>/css/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

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
            <div class="banner_title">
                <?php if (isset($response->responseCode)): ?>
                    <?php if (stristr($response->responseMessage, 'AUTHORISED')): ?>
                        Authorised
                    <?php elseif (stristr($response->responseMessage, 'DECLINED')): ?>
                        Declined
                    <?php else: ?>
                        Your payment responded with: <?php echo $response->responseMessage ?>
                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

		<div class="complete-wrapper">
            <div class="wrapper-width">
                <?php if (isset($response->responseCode)): ?>
                    <?php if (stristr($response->responseMessage, 'AUTHORISED')): ?>
                        <h1>Thank you</h1>
                        <p>Your payment has been approved and confirmed. Your payment reference is <strong><?php echo $response->transactionReference->transactionId ?></strong></p>
                    <?php elseif (stristr($response->responseMessage, 'DECLINED')): ?>
                        <h1>Attention</h1>
                        <p>Your card details for this payment have been declined. <a href="<?php echo env('APP_URL') ?>">Please try again</a>.
                    <?php else: ?>
                        <h1>Attention</h1>
                        <p>Your payment responded with: <?php echo $response->responseMessage ?>. <a href="<?php echo env('APP_URL') ?>">Please try again</a>.
                    <?php endif; ?>
                <?php else: ?>
                    <div>
                        <h1>Attention</h1>
                        <p><?php echo $response->getMessage(); ?></p>
                        <a href="<?php echo env('APP_URL') ?>">Try Again</a>
                    </div>
                <?php endif; ?>
            </div>
		</div>
        <?php include('footScripts.php'); ?>
