<?php

require __DIR__ . "/../autoload.php";

use PayMaya\PayMayaSDK;
use PayMaya\API\Customization;

PayMayaSDK::getInstance()->initCheckout("pk-yaj6GVzYkce52R193RIWpuRR5tTZKqzBWsUeCkP9EAf", 
"sk-VGDKY3P90NYZZ0kSWqBFaD1NTIXQCxtdS7SbQXvcA4g", 
"SANDBOX");

// $shopCustomization = new Customization();
// $shopCustomization->get();

// $shopCustomization->logoUrl = asset('logo.jpg');
// $shopCustomization->iconUrl = asset('favicon.ico');
// $shopCustomization->appleTouchIconUrl = asset('favicon.ico');
// $shopCustomization->customTitle = 'PayMaya Payment Gateway';
// $shopCustomization->colorScheme = '#f3dc2a';

// $shopCustomization->set();




$shopCustomization = new Customization();
$shopCustomization->logoUrl = 'maya.png';
$shopCustomization->get();
echo "Logo URL: " . $shopCustomization->logoUrl . "\n";
echo "Icon URL: " . $shopCustomization->iconUrl . "\n";
echo "Apple Touch Icon URL: " . $shopCustomization->appleTouchIconUrl . "\n";
echo "Custom Title: " . $shopCustomization->customTitle . "\n";
echo "Color Scheme: " . $shopCustomization->colorScheme . "\n";

$oldShopCustomization = clone $shopCustomization;

$shopCustomization->remove();
echo "Logo URL: " . $shopCustomization->logoUrl . "\n";
echo "Icon URL: " . $shopCustomization->iconUrl . "\n";
echo "Apple Touch Icon URL: " . $shopCustomization->appleTouchIconUrl . "\n";
echo "Custom Title: " . $shopCustomization->customTitle . "\n";
echo "Color Scheme: " . $shopCustomization->colorScheme . "\n";

$oldShopCustomization->set();
echo "Logo URL: " . $oldShopCustomization->logoUrl . "\n";
echo "Icon URL: " . $oldShopCustomization->iconUrl . "\n";
echo "Apple Touch Icon URL: " . $oldShopCustomization->appleTouchIconUrl . "\n";
echo "Custom Title: " . $oldShopCustomization->customTitle . "\n";
echo "Color Scheme: " . $oldShopCustomization->colorScheme . "\n";
