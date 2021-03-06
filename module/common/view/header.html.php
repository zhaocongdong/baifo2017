<?php
$webRoot = $this->app->getWebRoot();
$jsRoot  = $webRoot . 'assets/js/';
$cssRoot  = $webRoot . 'assets/styles/';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
 <?php
 if(isset($title)) echo html::title($title);

 echo html::meta('charset', 'utf-8');
 echo html::meta('viewport', 'width=device-width, initial-scale=1.0');

 css::import($cssRoot . 'theme/zui/css/zui.min.css');
 css::import($cssRoot . 'theme/my.css');
 css::import($cssRoot . 'com.css');
 css::import($cssRoot . 'theme/jqueryui.min.css');
 css::import($cssRoot . 'theme/artDialogDefault.css');
 if(isset($pageCss)) css::internal($pageCss);

 js::import($jsRoot . 'jquery.min.js');
 js::import($jsRoot . 'jqueryui.min.js');
 js::import($jsRoot . 'jquery.artDialog.min.js');
 js::import($jsRoot . 'zui.min.js');
 js::import($jsRoot . 'html5shiv.min.js', 'lt IE 9');
 js::import($jsRoot . 'my.js');

 js::import($jsRoot . 'jishanjs/pcasunzip.js');
 js::import($jsRoot . 'jishanjs/shop.js');
 js::exportConfigVars();
 echo html::favicon($webRoot . 'favicon.ico');
 if(isset($pageCSS)) css::internal($pageCSS);
 ?>
</head>
<body><div id='main'>
<?php include dirname(__FILE__) . '/nav.html.php';?>
