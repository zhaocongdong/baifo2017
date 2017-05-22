<?php
/**
 * The control file of blog module of ZenTaoPHP.
 *
 * The author disclaims copyright to this source code.  In place of
 * a legal notice, here is a blessing:
 * 
 *  May you do good and not evil.
 *  May you find forgiveness for yourself and forgive others.
 *  May you share freely, never taking more than you give.
 */
class lot extends control
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

    private $tableName_lot        = 'bf_lot'; //
    private $tableName_user_lot   = 'bf_user_lot'; //

    /**
     * The index page of blog module.
     * 
     * @access public
     * @return void
     */
    public function index($id = 0)
    {
        $id = 1;
        $this->view->title    = '解签';
        $lot = $this->dao->findById($id)->from($this->tableName_lot)->fetch();
        $this->view->lot      = $lot;
        $this->display();
    }

    /**
     * Create an article.
     *
     * @access public
     * @return void
     */
    public function create()
    {
        if(!empty($_POST))
        {
            $blogID = $this->blog->create();
            if(dao::isError()) die(js::error(dao::getError()) . js::locate('back'));
            die(js::locate(inlink('index')));
        }

        $this->view->title = $this->lang->blog->add;
        $this->display();
    }

   /**
     * Update an article.
     *
     * @param  int    $id
     * @access public
     * @return void
     */
    public function edit($id)
    {
        if(!empty($_POST))
        {
            $this->blog->update($id);
            $this->locate(inlink('index'));
        }
        else
        {
            $this->view->title   = $this->lang->blog->edit;
            $this->view->article = $this->blog->getByID($id);
            $this->display();
        }
    }

    /**
     * View an article.
     *
     * @param  int    $id
     * @access public
     * @return void
     */
    public function view($id)
    {
        $this->view->title   = $this->lang->blog->view;
        $this->view->article = $this->blog->getByID($id);
        $this->display();
    }

    /**
     * Delete an article.
     *
     * @param  int    $id
     * @access public
     * @return void
     */
    public function delete($id)
    {
        $this->blog->delete($id);
        $this->locate(inlink('index'));
    }
}
