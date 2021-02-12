<div>
<?if(isset($response->responseCode)){?>
	<div style="padding: 20px; border: 1px solid #ccc; margin: auto; max-width: 500px">
		Message: <?= $response->responseMessage ?><br />
		Amount: <?= $response->authorizedAmount;?>
	</div>
	<div><code><? print_r($response); ?></code></div>
<?} else {?>
	<div style="padding: 20px; border: 1px solid red; margin: auto;max-width: 500px">
		<? print_r($response->getMessage()); ?>
		<a href="/" style="text-align: center; display:block">Try Again</a>
	</div>
<?}?>
<div> 