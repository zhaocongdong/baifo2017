<?php if($this->server->HTTP_X_PJAX == false):?>
  </div>
<?php

$webRoot = $this->app->getWebRoot();
$cssRoot  = $webRoot . 'assets/styles/';

js::import($jsRoot . 'com.js');
if(isset($pageJS)) js::import($pageJS);
?>
</body>
</html>
<?php endif;?>
