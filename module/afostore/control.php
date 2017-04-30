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
class afostore extends control
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
    public function index($recTotal = 0, $recPerPage = 15, $pageID = 0)
    {
        $this->view->title = "拜佛商城";
        $this->app->loadClass('pager');
        $pager = new pager($recTotal, $recPerPage, $pageID);
        $s = $this->getList($pager);
        $this->view->all_goods = $s;
        $this->view->pager     = $pager;
        $this->display();
    }
    public function detail($id) {
        $this->view->goods           = $this->getGoodsById($id);
        $this->view->title           = $this->view->goods->goods_name;
        $this->view->all_goods_img   = $this->getGoodsImgByGId($id);
        $this->display();
    }

    public function getList($pager = null)
    {
        return $this->dao->select('*')->from('bf_goods')->orderBy('id desc')->page($pager)->fetchAll();
    }
    public function getGoodsById($id) {
        return $this->dao->findById($id)->from('bf_goods')->fetch();
    }
    public function getGoodsImgByGId($gid) {
        return $this->dao->select('*')->from('bf_img_goods')
            ->where('goods_id')->eq($gid)
            ->orderBy('id desc')->fetchAll();
    }
}
