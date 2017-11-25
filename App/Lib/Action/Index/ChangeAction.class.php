<?php
// 本类由系统自动生成，仅供测试用途
class ChangeAction extends Action
{
    public function index(){

	    $this->display();
    }
    
    public function change()
    {

        $query = M()->execute("update caption set ch = '%s' where cno = '%s'", I('new_ch'), I('cno'));
        if($query == 1){
            $log = M()->execute("insert into log(cno, uid, ch_old, ch_new) values('%s', '%s', '%s', '%s')", I('cno'), session('uid'), I('old_ch'), I('new_ch'));
            if($log == 1)
                $data['log'] = 1;
            $data['status'] = 1;
            $data['old'] = I('old_ch');
            $this->ajaxReturn($data,'json');
        }
        $data['old'] = I('old_ch');
        $data['data'] = $query;
        $data['status'] = 0;
        $this->ajaxReturn($data,'json');  
    }
}