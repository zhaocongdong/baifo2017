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
class afreeanimal extends control
{
    private $tableName = "bf_user_animal_op";

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->title = "放生";
        $this->view->pageJS = $this->app->getWebRoot() . "assets/js/afreeanimal.js";
        $this->display();
    }
    public function userInfo() {
        if (!empty($_SESSION)) {
            $uid = $_SESSION[USER_ID];
            $this->loadModel('auser');
            $user = $this->auser->getById($uid);
            var_dump($user);
        }
    }

    // API 放生 与 购买
    public function opAnimal() {
        if (!empty($_POST)) {
            $res = (object)null;
            $this->loadModel('auser');
            $user = $this->auser->getById($_POST['uid']);
            if ($user->gold_num > $_POST['total']) {
                $opinfo = (object)null;
                $opinfo->uid        = $_POST["uid"];
                $opinfo->name       = $_POST["name"];
                $opinfo->num        = intval($_POST["num"]);
                $opinfo->total      = floatval($_POST["total"]);
                $opinfo->item_name  = $_POST["item_name"];
                $opinfo->is_buy     = intval($_POST["is_buy"]);//is_buy购买-1 放生-0

                $opinfo->time       = date(DATE_FORMAT);
                $this->dao->insert('bf_user_animal_op')->data($opinfo)->exec();
                $lastId = $this->dao->lastInsertID();
                if ($lastId > 0) {
                    if ($opinfo->is_buy == '1') {
                        # TODO 更新 gold
                        $user->gold_num = $user->gold_num - (int)$opinfo->total;
                        $this->auser->updateUserGold($user);
                    }
                    $res->code = '100';
                } else {
                    $res->code = '200';
                }
            } else {
                $res->error = '201';
                $res->msg   = '银两不足';
            }
            echo json_encode($res);
        }
    }

    // API 获取用户购买的 Animals
    public function getAnimal() {
        if (!empty($_POST)) {
            $list = $this->dao->select("name, sum(num) num")
                ->from($this->tableName)
                ->where('uid')->eq($_POST['uid'])
                ->groupBy('name')
                ->fetchAll();
            echo json_encode($list);
        }
    }

    public function buyBG() {
        if (!empty($_POST)) {
            $res = (object)null;
            $this->loadModel('auser');
            $user = $this->auser->getById($_POST['uid']);
            if ($user->gold_num > $_POST['gold']) {
                $model = (object)null;
                $model->uid     = $_POST['uid'];
                $model->bgid    = $_POST['bgid'];
                $model->gold    = $_POST['gold'];
                $model->using   = 1;
                $model->time    = date(DATE_FORMAT);
                $this->insertBG($model);

                $res = (object)null;
                if (dao::isError()) {
                    $res->code = '200';
                } else {
                    # TODO 更新 gold
                    $user->gold_num = $user->gold_num - (int)$model->gold;
                    $this->auser->updateUserGold($user);
                    if (dao::isError()) {
                        $res->code = '200';
                    } else {
                        $res->code = '100';
                        $this->setBG(1);
                    }
                }
            } else {
                $res->error = '201';
                $res->msg   = '银两不足';
            }

            echo json_encode($res);
        }
    }
    public function getMyBG() {
        if (!empty($_POST)) {
            $list = $this->dao->select('bgid, `using`')->from('bf_user_freebg')
                ->where('uid')->eq($_POST['uid'])
                ->fetchAll();
            echo json_encode($list);
        }
    }
    public function setBG($f) {
        if (!empty($_POST)) {
            $this->dao->update('bf_user_freebg')
                ->set('using')->eq(0)
                ->where('uid')->eq($_POST['uid'])
                ->exec();
            $this->dao->update('bf_user_freebg')
                ->set('using')->eq(1)
                ->where('uid')->eq($_POST['uid'])
                ->andWhere('bgid')->eq($_POST['bgid'])
                ->exec();
            if (dao::isError()) {

            } else {
                $res = (object)null;
                $res->code = '100';
                if ($f == '_NOT_SET') {
                    echo json_encode($res);
                }
            }
        }
    }




    public function insertBG($model) {
        $this->dao->insert('bf_user_freebg')->data($model)->exec();
        $lastId = $this->dao->lastInsertID();
        $model->id = $lastId;
        return $model;
    }
}
