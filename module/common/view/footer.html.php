<?php if($this->server->HTTP_X_PJAX == false):?>
  </div>

  <div style="margin: 0 auto;padding: 20px 0;text-align: center; color: grey;font-size: 15px;">
    <p>拜佛网欢迎您.</p>
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
