<?php
/**
 * The control file of index module of ZenTaoPHP.
 *
 * The author disclaims copyright to this source code.  In place of
 * a legal notice, here is a blessing:
 * 
 *  May you do good and not evil.
 *  May you find forgiveness for yourself and forgive others.
 *  May you share freely, never taking more than you give.
 */
class auser extends control
{
    /**
     * The construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * The index page.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $this->view->title = "我的信息";
        $this->view->user = $this->auser->getById($_SESSION[USER_ID]);
        $this->display();
    }
    public function register() {
        if(!empty($_POST)) {
            if (empty($_POST['name'])) {
                die(js::error("请填写用户名!"). js::locate('back'));
            }
            if (empty($_POST["password"])) {
                die(js::error("请填写密码!"). js::locate('back'));
            }
            if ($_POST["password"] != $_POST["repwd"]) {
                die(js::error("密码不一致!"). js::locate('back'));
            }
            if (strtolower($_POST['ckb_agree']) != 'on') {
                die(js::error("请同意注册协议!"). js::locate('back'));
            }
            $exist_user = $this->getUserByName($_POST['name']);
            if (isset($exist_user) && !empty($exist_user)) {
                die(js::error("该用户名已被使用!"). js::locate('back'));
            }
            unset($_POST['repwd']);
            unset($_POST['ckb_agree']);
            $uid = $this->auser->register();
            if(dao::isError() || $uid == 0) {
                die(js::error('注册失败!') . js::locate('back'));
            } else {
                // 设置默认放生场景 bg_id=1
                $model = (object)null;
                $model->uid     = $uid;
                $model->bgid    = 1;
                $model->gold    = 0;
                $model->using   = 1;
                $model->time    = date(DATE_FORMAT);
                $this->insertBG($model);

                $_SESSION[USER_ID]   = $uid;
                $_SESSION[USER_NAME] = $_POST["name"];

                if (!empty($_GET)) {
                    $rmd_user = $this->auser->getById($_GET[RMD_UID]);
                    if (isset($rmd_user) && !empty($rmd_user)) {
                        $rmd_user->gold_num = $rmd_user->gold_num + RMD_GOLD;
                        $this->auser->updateUserGold($rmd_user);
                    }
                }
                die(js::locate(inlink('index')));
            }
        }
        $this->view->title = "注册";
        $this->display();
    }
    public function login($backurl = '') {
        if (!empty($_POST)) {
            if (empty($_POST['name'])) {
                die(js::error("请填写用户名!"). js::locate('back'));
            }
            if (empty($_POST["password"])) {
                die(js::error("请填写密码!"). js::locate('back'));
            }
            $user = $this->getUserByLogin($_POST['name'], $_POST['password']);
            if (!empty($user)) {
                $_SESSION[USER_ID] = $user->id;
                $_SESSION[USER_NAME] = $_POST["name"];
                // remember_me
                if (strtolower($_POST['remember_me']) == 'on') {
                    setcookie(USER_ID  , $user->id  , time()+3600 * 24 * 30);
                    setcookie(USER_NAME, $user->name, time()+3600 * 24 * 30);
                }
                if (!empty($_POST['backurl'])){
                    if ($_POST['backurl'] == 'aburnjoss' || $_POST['backurl'] == 'afreeanimal') {
                        die(js::locate($this->createLink($_POST['backurl'])));
                    } else  {
                        die(js::locate($_POST['backurl']));
                    }
                } else {
                    die(js::locate(inlink('index')));
                }
            } else {
                die(js::error("用户名或密码错误!"). js::locate('back'));
            }
        }
        $this->view->backurl = $backurl;
        $this->view->title = "登录";
        $this->display();
    }
    public function logout() {
        $_SESSION[USER_ID] = "";
        $_SESSION[USER_NAME] = "";
        die(js::locate(inlink('login')));
//        die(js::locate('back'));
    }
    public function resetpwd() {
        $res = (object)null;
        $name = $_GET["name"];
        $user = $this->getUserByName($name);
        if (empty($user)) {
            $res->code = '201';
            $res->msg  = '不存在此用户!';
        } else {
            $user->password = $this->getRandChar(6);
            $this->auser->update($user);
            if (dao::isError()) {
                $res->code = '202';
                $res->msg  = '重置失败!';
            } else {
                $res->code = '100';
                $res->msg  = $user->password . '为您的最新密码!';
            }
        }
        echo json_encode($res);
    }

    public function getUserByName($name) {
        $user_list = $this->dao->select()->from('bf_user')->where('name')->eq($name)->fetch();
        return $user_list;
    }
    public function getUserByLogin($name, $pwd) {
        $user = $this->dao->select()->from('bf_user')
            ->where('name')->eq($name)
            ->andWhere('password')->eq($pwd)
            ->fetch();
        return $user;
    }

    public function getRandChar($length){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;
        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        return $str;
    }

    public function insertBG($model) {
        $this->dao->insert('bf_user_freebg')->data($model)->exec();
        $lastId = $this->dao->lastInsertID();
        $model->id = $lastId;
        return $model;
    }
}
