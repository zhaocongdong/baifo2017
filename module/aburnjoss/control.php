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
class aburnjoss extends control
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

        $this->view->title = "烧香";
        $this->view->pageJS = $this->app->getWebRoot() . "assets/js/aburnjoss.js";
        $this->display();
    }

    private $tableName_bj = 'bf_user_bj'; // 烧香信息表
    private $tableName_xy = 'bf_user_xy'; // 许愿信息表
    private $tableName_merit = 'bf_user_merit';// 功德箱捐赠信息表
    private $tableName_lot   = 'bf_lot'; //
    private $tableName_user_lot   = 'bf_user_lot'; //


    // -------- 以下 烧香 API -------
    public function initBJ() {
        if (!empty($_POST)) {
            $this->loadModel('auser');
            $uid = $_POST['uid'];
            $user = $this->auser->getById($uid);

            if (dao::isError()) {

            } else {
                $res_user = (object)null;
                $res_user->gold_num = $user->gold_num;

                $fields = 'id, wish, foid, foname';
                $wisht_list = $this->getWishList($uid, $fields);

                $list = $this->getFoGP($_POST['uid'], 'foid, gp_ids, wish_id, stay_time');

                $res = (object)null;
                $res->wish_list     = $wisht_list;
                $res->userinfo      = $res_user;
                $res->bj_list       = $list;
                echo json_encode($res);
            }
        }
    }
    public function burnjoss() {
        if (!empty($_POST)) {
            $res = (object)null;
            $this->loadModel('auser');
            $user = $this->auser->getById($_POST['uid']);
            if ($user->gold_num > $_POST['bj_gold']) {
                $xy = (object)null;
                if (empty($_POST['wish_id'])) { // 许愿
                    if (!empty($_POST['wish'])) {
                        $xy->foid           = $_POST['foid'];
                        $xy->foname         = $_POST['foname'];
                        $xy->uid            = $_POST['uid'];
                        $xy->wish           = $_POST['wish'];
                        $xy->is_private     = $_POST['is_private'];

                        $xy->create_time    = date(DATE_FORMAT);
                        $this->insert_xy($xy);
                    }
                } else {                        // 还愿
                    $xy->id           = $_POST['wish_id'];
                    $this->returnWish($xy->id);
                }

                if (dao::isError()) {

                } else {
                    $bj = (object)null;
                    $bj->gp_ids         = $_POST['gp_ids'];
                    $bj->foid           = $_POST['foid'];
                    $bj->foname         = $_POST['foname'];
                    $bj->uid            = $_POST['uid'];
                    $bj->bj_gold        = $_POST['bj_gold'];
                    $bj->stay_time      = (int)$_POST['stay_time'];

                    $bj->wish_id         = $xy->id;
                    $bj->bj_time        = time();
                    $this->insert_bj($bj);

                    if (dao::isError()) {

                    } else {
                        # TODO 更新用户银两
                        $user->gold_num     = $user->gold_num - (int)$bj->bj_gold;
                        $user->merit_num    = $user->merit_num + (int)$bj->bj_gold;
                        $this->auser->updateUserGold($user);
                        $res->code = '100';
                    }
                }
            } else {
                $res->error = '201';
                $res->msg   = '银两不足';
            }
            echo json_encode($res);
        }
    }

    public function meritBox() {
        if (!empty($_POST)) {
            $res = (object)null;
            $this->loadModel('auser');
            $user = $this->auser->getById($_POST['uid']);
            if ($user->gold_num > $_POST['total']) {
                $merit = (object)null;
                $merit->uid         = $_POST['uid'];
                $merit->total       = $_POST['total'];

                $merit->merit_time  = date(DATE_FORMAT);
                $this->merit($merit);
                if (dao::isError()) {

                } else {
                    $user->gold_num     = $user->gold_num - (int)$merit->total;
                    $user->merit_num    = $user->merit_num + (int)$merit->total;
                    $this->auser->updateUserGold($user);
                    $res->code = '100';
                }
            } else {
                $res->error = '201';
                $res->msg   = '银两不足';
            }
            echo json_encode($res);
        }
    }
    public function getGP() {
        if (!empty($_POST)) {
            $foid = 0;
            if (isset($_POST['foid']) && !empty($_POST['foid'])) {
                $foid = $_POST['foid'];
            }
            $list = $this->getFoGP($_POST['uid'], 'foid, gp_ids, wish_id, stay_time', $foid);
            $res = count($list) > 0 ? $list[0] : (object)null;
            echo json_encode($res);
        }
    }
    public function userLot() {
        if (!empty($_POST)) {
            $lot_id = $_POST['lot_id'];
            $uid    = $_POST['uid'];
            $lot    = $this->getLot(1);
            if (!empty($lot)) {
                $model = (object)null;
                $model->uid         = $uid;
                $model->lot_id      = $lot_id;
                $model->lot_time    = date(DATE_FORMAT);
                $this->insertUserLot($model);

                $lot->openUrl = APP_DOMAIN . $this->createLink('lot', 'index', array(id=>$lot_id));
            }
            echo json_encode($lot);
        }
    }

    public function getFoGP($uid, $fields = '*', $foid = 0) {
        if ($foid == 0) { // 单个fo 贡品
            $list = $this->dao->select($fields)->from($this->tableName_bj)
                ->where('uid')->eq($uid)
                ->andWhere('stay_time')->gt(time() + 15)
                ->orderBy('id desc')
                ->fetchAll();
            return $list;
        } else {
            $list = $this->dao->select($fields)->from($this->tableName_bj)
                ->where('uid')->eq($uid)
                ->andWhere('foid')->eq($foid)
                ->andWhere('stay_time')->gt(time() + 15)
                ->orderBy('id desc')
                ->fetchAll();
            return $list;
        }
    }
    public function insert_bj($model) {
        $this->dao->insert($this->tableName_bj)->data($model)->exec();
        $lastId = $this->dao->lastInsertID();
        $model->id = $lastId;
        return $model;
    }
    public function insert_xy($model) {
        $this->dao->insert($this->tableName_xy)->data($model)->exec();
        $lastId = $this->dao->lastInsertID();
        $model->id = $lastId;
        return $model;
    }
    public function returnWish($id) {
        $this->dao->update($this->tableName_xy)
            ->set('is_back_wish')->eq(1)
            ->set('back_time')->eq(date(DATE_FORMAT))
            ->where('id')->eq($id)
            ->exec();
    }
    public function getWishList($uid, $fields = '*') {
        $list = $this->dao->select($fields)->from($this->tableName_xy)
            ->where('uid')->eq($uid)
            ->andWhere('is_back_wish')->eq(0)
            ->orderBy('id desc')
            ->fetchAll();
        return $list;
    }
    public function merit($model) {
        $this->dao->insert($this->tableName_merit)->data($model)->exec();
        $lastId = $this->dao->lastInsertID();
        $model->id = $lastId;
        return $model;
    }

    public function getLot($id) {
        return $this->dao->findById($id)->from($this->tableName_lot)->fetch();
    }
    public function insertUserLot($model) {
        $this->dao->insert($this->tableName_user_lot)->data($model)->exec();
        $lastId = $this->dao->lastInsertID();
        $model->id = $lastId;
        return $model;
    }
}
