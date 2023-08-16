<?php

require __DIR__ . "/../autoload.php";

use PayMaya\PayMayaSDK;
use PayMaya\API\Webhook;

PayMayaSDK::getInstance()->initCheckout("pk-yaj6GVzYkce52R193RIWpuRR5tTZKqzBWsUeCkP9EAf", 
"sk-VGDKY3P90NYZZ0kSWqBFaD1NTIXQCxtdS7SbQXvcA4g", 
"SANDBOX");

$successWebhook = new Webhook();
$successWebhook->name = Webhook::CHECKOUT_SUCCESS;
$successWebhook->callbackUrl = "http://shop.someserver.com/success";
$successWebhook->register();

$failureWebhook = new Webhook();
$failureWebhook->name = Webhook::CHECKOUT_FAILURE;
$failureWebhook->callbackUrl = "http://shop.someserver.com/failure";
$failureWebhook->register();

$webhooks = Webhook::retrieve();
print_r($webhooks);

$webhook = $webhooks[0];
$webhook->callbackUrl .= "Updated";
$webhook->update();
print_r(Webhook::retrieve());

$webhookCopy = clone $webhook;
echo $webhook->delete();

print_r(Webhook::retrieve());

$webhookCopy->register();

print_r(Webhook::retrieve());