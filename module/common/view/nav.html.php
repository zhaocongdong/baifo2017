<div id='header' class='bg-primary with-shadow'>
<div class='container navbar navbar-default' role="navigation">
  <div class='navbar-header'>
          <?php echo html::a($this->createLink('index'),        "首页",       "class='navbar-brand' style='font-size:17px'");?>
          <?php echo html::a($this->createLink('aburnjoss'),    "烧香",       "class='navbar-brand' style='font-size:17px'");?>
          <?php echo html::a($this->createLink('afreeanimal'),  "放生",       "class='navbar-brand' style='font-size:17px'");?>
          <?php echo html::a($this->createLink('afostore'),     "拜佛商城",    "class='navbar-brand' style='font-size:17px'");?>
          <?php //echo html::a($this->createLink('blog'),         "blog",       "class='navbar-brand' style='font-size:17px'")?>
  </div>
  <div class='navbar-header' style="float: right;">
      <?php
      $session_flag = false;
      if (!empty($_SESSION[USER_ID])) {
          $session_flag = true;
      }
      if ($session_flag) {
          echo html::hidden(USER_ID, $_SESSION[USER_ID], "id='".USER_ID."'");
          echo html::a($this->createLink('auser', 'index'), $_SESSION[USER_NAME], "class='navbar-brand' style='font-size:17px'");
          echo html::a($this->createLink('auser','logout'), "注销", "class='navbar-brand' style='font-size:14px'");
      } else {
          echo html::a($this->createLink('auser','login'), "登录", "id='userlogin', class='navbar-brand' style='font-size:17px'");
          echo html::a($this->createLink('auser','register'), "注册", "class='navbar-brand' style='font-size:17px'");
      }

      $str_buy_cart = '购物车(0)';
      echo html::a($this->createLink('buycart','index'), $str_buy_cart, "id='buycart', class='navbar-brand' style='font-size:17px'");
      ?>
  </div>
<script type="text/javascript">
    $(function(){
        RefreshShopCar();
    });
</script>
  <div class="collapse navbar-collapse">
    <ul class='nav navbar-nav nav-reverce'>
      <?php
      /*
      foreach($lang->menu as $menuModule => $menuLabel)
      {
          $menuClass = $moduleName == $menuModule ? 'active' : '';
          echo "<li class='$menuClass'>";
          echo html::a($this->createLink($menuModule), $menuLabel);
          echo '</li>';
      }
      */
      ?>
    </ul>
     <ul class="nav navbar-nav navbar-right">
      <li>
        <div class='btn-group' style='margin-right:5px;margin-top:8px;'>
          <?php
          /*
          foreach($config->langs as $langCode => $langLabel)
          {
              $btnClass = $app->getClientLang() == $langCode ? 'btn-primary' : '';
              echo "<button class='btn btn-sm $btnClass lang-switcher' data-lang='$langCode' onclick='switchLang(this)'>$langLabel</button>";
          }
          */
          ?>
        </div>
      </li>
    </ul>
  </div>
</div>
</div>
<style>
#header{ background:#ff9;margin-bottom: 20px;}
#header .navbar{background:transparent; border:none;}
#header .navbar-header a{color:red;}
#header .navbar-header a:hover {color:purple;}
#header .nav > li > a{color:#fff;}
#header .nav > li.active > a{background:#444;}
</style>
