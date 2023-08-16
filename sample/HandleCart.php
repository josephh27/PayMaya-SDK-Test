<?php

    require __DIR__ . "/Checkout/User.php";

    use PayMaya\PayMayaSDK;
    use PayMaya\API\Checkout;
    use PayMaya\Model\Checkout\Item;
    use PayMaya\Model\Checkout\ItemAmount;
    use PayMaya\Model\Checkout\ItemAmountDetails;
   
    PayMayaSDK::getInstance()->initCheckout("pk-yaj6GVzYkce52R193RIWpuRR5tTZKqzBWsUeCkP9EAf", 
    "sk-VGDKY3P90NYZZ0kSWqBFaD1NTIXQCxtdS7SbQXvcA4g", 
    "SANDBOX");
   
    $allProducts = $_POST['allProducts'];


    $AllItemsAmountDetails = new ItemAmountDetails();
    $AllItemsAmountDetails->shippingFee = "14.00";
    $AllItemsAmountDetails->tax = "5.00";
    $AllItemsAmountDetails->subtotal = 0;
    $AllitemAmount = new ItemAmount();
    $AllitemAmount->currency = "PHP";
    $AllitemAmount->value = 14 + 5 + 0;
    $AllitemAmount->details = $AllItemsAmountDetails;

    // Item checkout init
    $itemCheckout = new Checkout();
    $user = new User();
    $itemCheckout->buyer = $user->buyerInfo();
    $itemCheckout->items = array();



    $allProducts = json_decode($allProducts, false);
    foreach($allProducts as $product => $info) {
        // echo $product;
        echo "<br>";
        foreach($info as $singleProduct => $singleProductInfo) {
            $itemAmountDetails = new ItemAmountDetails();
            $itemAmountDetails->shippingFee = "14.00";
            $itemAmountDetails->tax = "5.00";
            $itemAmountDetails->subtotal = 0;
            $itemAmount = new ItemAmount();
            $itemAmount->currency = "PHP";
            $itemAmount->value = $singleProductInfo->value;

            // Add single product price to total product amount
            $AllitemAmount->value = $AllitemAmount->value + $singleProductInfo->value;

            $itemAmount->details = $itemAmountDetails;
            $item = new Item();
            $item->name = $singleProductInfo->name;
            $item->code = $singleProductInfo->name;
            $item->description = "A Computer part";
            $item->quantity = "1";
            $item->amount = $itemAmount;
            $item->totalAmount = $itemAmount;
            array_push($itemCheckout->items, $item);
        }
        
        // Item
       
    }

     $itemCheckout->totalAmount = $AllitemAmount;
     $itemCheckout->requestReferenceNumber = "123456789";
     $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';
     $itemCheckout->redirectUrl = array(
     "success" =>  $base_url."Successful.php",
     "failure" =>  $base_url."Cancel.php",
     "cancel" =>   $base_url."Failed.php"
     );

    // Actual Checkout
    $itemCheckout->execute();
    $itemCheckout->retrieve();

    header('Location: '. $itemCheckout->url);
    // echo "Checkout ID: " . $itemCheckout->id . "\n";
    // echo "Checkout URL: " . $itemCheckout->url . "\n";

    
   
    

    
?>