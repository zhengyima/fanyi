<?php
// 本类由系统自动生成，仅供测试用途
class MainAction extends CommonAction
{
    public function index(){

        $num = 5 * I('page');
        $query = M()->query("select * from caption where cno between %d and %d", $num - 4, $num);
        $this->caption = $query;
        $uid = session('uid');
        $this->uid = $uid;
	    $this->display();
    }
}