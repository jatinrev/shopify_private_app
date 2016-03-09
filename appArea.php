<?php
include 'include/header.php';
use sandeepshetty\shopify_api;

$select_settings = $db->query("SELECT * FROM tbl_usersettings WHERE store_name = '".$_SESSION['shop']."'");
$shop_data = $select_settings->fetch_object();

$shopify = shopify_api\client(
	$shop_data->store_name, $shop_data->access_token, $app_settings->api_key, $app_settings->shared_secret
	);


// Count number of unfulfilled products
$count = $shopify('GET', '/admin/orders/count.json?fulfillment_status=unfulfilled&financial_status=paid', '');
// Get number of pages based on product count
$totalPages = ceil($count/50);

$pageCounter=0;
$counter=0;
while($totalPages!=$pageCounter){
	$pageNo = $pageCounter+1;
    // Getting Products for Shopify using REST API
    $products = $shopify('GET', '/admin/orders.json?page='.$pageNo.'&fulfillment_status=unfulfilled&financial_status=paid', '');
    foreach ($products as $product) {
       $allProducts[] = $product;
       $counter++;
	}
	$pageCounter++;
}

foreach ($allProducts as $value) {
    $productID = $value['id'];
    $lineitemID = $value['line_items'][0]['id'];

    $payload = array(
        "fulfillment" => array(
            "tracking_number" => null,
            "line_items" => array(
                array(
                    "id" => $lineitemID
                )
            )
        )
    );

    $fulfillments = $shopify('POST', '/admin/orders/'.$productID.'/fulfillments.json', $payload);
}

// Ajax Method

/*
$payload = array(
    "fulfillments" => array(array(
        "line_items" => array(
            array(
                "id" => $lineitemID
            )
        ),
        "fulfillment_method" => "fulfill_only",
        "shipping_options" => array(
            "shipping_method" => "Standard"
        )
    ))
);

$jsonp = json_encode($payload);

?>

<script>
    jQuery(document).ready(function(){
        jQuery.ajax({
            type:"POST",
            dataType:"jsonp",
            crossDomain: true,
            header : '{"Access-Control-Allow-Origin": "<?php echo $_SERVER['HTTP_ORIGIN']; ?>","Access-Control-Allow-Methods":"GET, PUT, POST, DELETE, OPTIONS","Access-Control-Max-Age":"1000","Access-Control-Allow-Headers":"Content-Type, Authorization, X-Requested-With"}',
            url:"https://divineviewer.myshopify.com/admin/orders/<?php echo $productID?>/fulfillments/fulfill_and_ship",
            data:'<?php echo $jsonp; ?>',
            beforeSend:function(){
                jQuery('.ajaxLoader').fadeIn(500);
            },
            success:function(msg){
                jQuery('.ajaxLoader').fadeOut(500);
                jQuery('.ajaxDetailsArea').append(msg);
            },
            error: function (responseData, textStatus, errorThrown) {
                jQuery('.ajaxLoader').fadeOut(500);
                console.log(responseData);
            }
        });
    });
</script>
<div class="ajaxDetailsArea"></div>

<?php
*/

include 'include/footer.php';