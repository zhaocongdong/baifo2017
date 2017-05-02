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
class buycart extends control
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
        if (!empty($_COOKIE[BUY_CART])) {
            $shop_list = explode('|', $_COOKIE[BUY_CART]);
            $cart_list = array();
            $a_sum = 0;
            foreach ($shop_list as $shop) {
                $a_list = explode(',', $shop);
                $ba = null;
                $ba->id = $a_list[0];
                $ba->name = $this->unescape($a_list[1]);
                $ba->num = $a_list[2];
                $ba->price = $a_list[3];
                $ba->img = $a_list[4];
                $ba->sum = $ba->num * $ba->price;

                array_push($cart_list, $ba);
                $a_sum += $ba->num * $ba->price;
            }
            $this->view->cart_list = $cart_list;
            $this->view->order_sum = $a_sum;
        }
        $this->view->title = "提交订单";
        $this->display();
    }
    function unescape($str)
    {
        $ret = '';
        $len = strlen($str);
        for ($i = 0; $i < $len; $i ++)
        {
            if ($str[$i] == '%' && $str[$i + 1] == 'u')
            {
                $val = hexdec(substr($str, $i + 2, 4));
                if ($val < 0x7f)
                    $ret .= chr($val);
                else
                    if ($val < 0x800)
                        $ret .= chr(0xc0 | ($val >> 6)) .
                            chr(0x80 | ($val & 0x3f));
                    else
                        $ret .= chr(0xe0 | ($val >> 12)) .
                            chr(0x80 | (($val >> 6) & 0x3f)) .
                            chr(0x80 | ($val & 0x3f));
                $i += 5;
            } else
                if ($str[$i] == '%')
                {
                    $ret .= urldecode(substr($str, $i, 3));
                    $i += 2;
                } else
                    $ret .= $str[$i];
        }
        return $ret;
    }
}
