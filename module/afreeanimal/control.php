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

    // API 放生 与 购买
    public function opAnimal() {
        if (!empty($_POST)) {
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
            $res = (object)null;
            if ($lastId > 0) {
                // 更新用户金额

                # TODO 更新 gold

                $res->code = '100';
            } else {
                $res->code = '200';
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
            $model = (object)null;
            $model->uid     = $_POST['uid'];
            $model->bgid    = $_POST['bgid'];
            $model->gold    = $_POST['gold'];
            $this->insertBG($model);

            $res = (object)null;
            if (dao::isError()) {
                $res->code = '200';
            } else {
                // 更新 gold
                # TODO 更新 gold
                if (dao::isError()) {
                    $res->code = '200';
                } else {
                    $res->code = '100';
                }
            }
            echo json_encode($res);
        }
    }
    public function getMyBG() {
        if (!empty($_POST)) {
            $list = $this->dao->select('bgid')->from('bf_user_freebg')
                ->where('uid')->eq($_POST['uid'])
                ->fetchAll();
            echo json_encode($list);
        }
    }
    public function setBG() {
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
                echo json_encode($res);
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
