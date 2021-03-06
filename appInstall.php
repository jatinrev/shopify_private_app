<?php

include 'include/header.php';
use sandeepshetty\shopify_api;

if(!empty($_GET['shop'])){
  $shop = $_GET['shop'];
  $select_store = $db->query("SELECT store_name FROM tbl_usersettings WHERE store_name = '$shop'");
  if($select_store->num_rows > 0){
    if(shopify_api\is_valid_request($_GET, $app_settings->shared_secret)){
      $_SESSION['shopify_signature'] = $_GET['signature'];
      $_SESSION['shop'] = $shop;
      header('Location: https://'.$_SERVER['SERVER_NAME'].'/appArea.php');
    } else {
      $permissions = json_decode($app_settings->permissions, true);
      $permission_url = shopify_api\permission_url($_GET['shop'], $app_settings->api_key, $permissions);
      $permission_url .= '&redirect_uri=' . $app_settings->redirect_url;
      header('Location: ' . $permission_url);
    }
  } else {
    $permissions = json_decode($app_settings->permissions, true);
    $permission_url = shopify_api\permission_url($_GET['shop'], $app_settings->api_key, $permissions);
    $permission_url .= '&redirect_uri=' . $app_settings->redirect_url;
    header('Location: ' . $permission_url);
  }
}