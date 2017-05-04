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
    public function register()
    {
        var_dump($_GET);
        if (!empty($_GET)) {
            if (isset($_GET[RMD_UID]) && !empty($_GET[RMD_UID])) {
                $_SESSION[RMD_UID] = $_GET[RMD_UID];
            }
        }
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
            $exist_user = $this->getUserByName($_POST['name']);
            if (isset($exist_user) && !empty($exist_user)) {
                die(js::error("该用户名已被使用!"). js::locate('back'));
            }
            unset($_POST['repwd']);
            $uid = $this->auser->register();
            if(dao::isError() || $uid == 0) {
                die(js::error('注册失败!') . js::locate('back'));
            } else {
                $_SESSION[USER_ID]   = $uid;
                $_SESSION[USER_NAME] = $_POST["name"];
                die(js::locate(inlink('index')));
            }
        }
        $this->view->title = "注册";
        $this->display();
    }
    public function login() {
        if (!empty($_POST)) {
            if (empty($_POST['name'])) {
                die(js::error("请填写用户名!"). js::locate('back'));
            }
            if (empty($_POST["password"])) {
                die(js::error("请填写密码!"). js::locate('back'));
            }
            $user = $this->getUserByLogin($_POST['name'], $_POST['password']);
            if (!empty($user)) {
                $_SESSION[USER_ID]   = $user->id;
                $_SESSION[USER_NAME] = $_POST["name"];
                die(js::locate(inlink('index')));
            } else {
                die(js::error("用户名或密码错误!"). js::locate('back'));
            }
        }
        $this->view->title = "登录";
        $this->display();
    }
    public function logout() {
        $_SESSION[USER_ID] = "";
        $_SESSION[USER_NAME] = "";
        die(js::locate(inlink('login')));
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
}
