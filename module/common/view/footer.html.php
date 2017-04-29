<?php if(isset($pageJS)) js::execute($pageJS);?>
<?php if($this->server->HTTP_X_PJAX == false):?>
  </div>
<?php

$webRoot = $this->app->getWebRoot();
$cssRoot  = $webRoot . 'assets/styles/';

js::import($jsRoot . 'com.js');
?>
</body>
</html>
<?php endif;?>
