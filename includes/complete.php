<div>
	<? if (isset($response->responseCode)): ?>
		<? if (stristr($response->responseMessage, 'AUTHORISED')): ?>
			<h1>Thank you</h1>
			<p>Your payment has been approved and confirmed. Your payment reference is <strong><?= $response->transactionReference->transactionId ?></strong></p>
		<? elseif (stristr($response->responseMessage, 'DECLINED')): ?>
			<h1>Attention</h1>
			<p>Your card details for this payment have been declined. <a href="<?php echo env('APP_URL') ?>">Please try again</a>.
		<? else: ?>
			<h1>Attention</h1>
			<p>Your payment responded with: <?= $response->responseMessage ?>. <a href="<?php echo env('APP_URL') ?>">Please try again</a>.
		<? endif; ?>
	<? else: ?>
		<div>
			<h1>Attention</h1>
			<p><?= $response->getMessage(); ?></p>
			<a href="<?php echo env('APP_URL') ?>">Try Again</a>
		</div>
	<? endif; ?>
<div> 