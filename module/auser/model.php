<?php
/**
 * The model file of blog module of ZenTaoPHP.
 *
 * The author disclaims copyright to this source code.  In place of
 * a legal notice, here is a blessing:
 * 
 *  May you do good and not evil.
 *  May you find forgiveness for yourself and forgive others.
 *  May you share freely, never taking more than you give.
 */
?>
<?php
class auserModel extends model
{

    /**
     * Get an article.
     * 
     * @param  int    $id 
     * @access public
     * @return object
     */
    public function getById($id)
    {
        return $this->dao->findById($id)->from('bf_user')->fetch();
    }
    public function getUserTitle($merit) {
        $list = $this->dao->select('tname as title')->from('bf_title')
            ->where('merit_start')->le($merit)
            ->andWhere('merit_end')->ge($merit)
            ->fetch();
        return $list;
    }
    /**
     * Create an article.
     * 
     * @access public
     * @return void
     */
    public function register()
    {
        $user = fixer::input('post')->specialchars('name, password')->add('register_time', date(DATE_FORMAT))->add('last_time', date(DATE_FORMAT))->get();
        $user->tid = 1;
        if (!empty($_SESSION[RMD_UID])) {
            $user->rmd_uid = $_SESSION[RMD_UID];
        }
        $user->merit_num = 0; // 功德
        $user->gold_num = 1000; // 银两默认1000
        $this->dao->insert('bf_user')->data($user)
            ->check('name', 'unique')
            ->exec();
        return $this->dao->lastInsertID();
    }

    public function update($user) {
        $this->dao->update('bf_user')->data($user)->where('id')->eq($user->id)->exec();
    }

    public function updateUserGold($user) {
        $this->dao->update('bf_user')->data($user)->where('id')->eq($user->id)->exec();
    }
    /**
     * Delete an article.
     * 
     * @param  int     $id 
     * @param  null    $table 
     * @access public
     * @return void
     */
    public function delete($id, $table = null)
    {
        $this->dao->delete()->from('blog')->where('id')->eq($id)->exec();
    }
}
