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
        $this->view->title = "放生";
        $this->view->pageJS = $this->app->getWebRoot() . "assets/js/afreeanimal.js";
        $this->display();
    }

    public function opAnimal() {
        if (!empty($_POST)) {
            $opinfo = null;
            $opinfo->uid        = $_POST["uid"];
            $opinfo->name       = $_POST["name"];
            $opinfo->num        = intval($_POST["num"]);
            $opinfo->total        = floatval($_POST["total"]);
            $opinfo->item_name  = $_POST["item_name"];
            $opinfo->is_buy     = intval($_POST["is_buy"]);//is_buy购买-1 放生-0

//            $opinfo->price      = floatval($_POST["price"]);
//            $opinfo->img_list   = $_POST["img_list"];
//            $opinfo->img_stand  = $_POST["img_stand"];
//            $opinfo->img_move   = $_POST["img_move"];

            $opinfo->time       = date(DATE_FORMAT);
            $this->dao->insert('bf_user_animal_op')->data($opinfo)->exec();
            $lastId = $this->dao->lastInsertID();
            $res = null;
            if ($lastId > 0) {
                // 更新用户金额
                
                $res->code = '100';
            } else {
                $res->code = '200';
            }
            echo json_encode($res);
        }
    }
}
