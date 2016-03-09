<?php include 'include/DBConnection.php'; ?>
<?php if(isset($_REQUEST['shop'])){ $_SESSION['shop']=$_REQUEST['shop']; } ?>
<!DOCTYPE html>
<head>
  <title>Order Fulfillment App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:400,300,700">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <?php if(isset($_SESSION['shop'])) { ?>
  <script src="https://cdn.shopify.com/s/assets/external/app.js"></script>
  <script type="text/javascript">
    ShopifyApp.init({
      apiKey: '<?php echo $app_settings->api_key; ?>',
      shopOrigin: 'https://<?php echo $_SESSION["shop"]; ?>'
    });
  </script>
  <?php } ?>
  <script src="//tinymce.cachefly.net/4.3/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: 'textarea.tinymce',
      height: 500,
      plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      content_css: '//www.tinymce.com/css/codepen.min.css',
    });
  </script>
  <style>
    .ajaxLoader{display: none; position:fixed; width: 100%; height:100%; z-index:9999; background: rgba(255,255,255,.8);text-align: center; }
    .ajaxLoader img{width: 500px; }
    tfoot{font-family:'Oswald';font-weight: bold !important;}
  </style>
</head>
<body class="">
  <div id="wrapper">
    <div class="ajaxLoader"><img src="https://<?php echo $_SERVER['HTTP_HOST']; ?>/img/ajax-loader.gif" alt=""></div>