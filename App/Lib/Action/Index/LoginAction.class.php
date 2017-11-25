<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action
{
    public function index(){

	    $this->display();
    }
    public function login()
    {
        $query = M()->query("select * from login where account = '%s'", I('uid'));
        if($query){
            if($query[0]['passwd'] == I('upasswd')){
                $data['status'] = 1;
                session('uid', I('uid'));
                if(!isset($_SESSION['page']))
                {
                    session('page', 1);
                }
                $this->ajaxReturn($data,'json');
            }
            else{
                $data['status'] = 2;
                $this->ajaxReturn($data,'json');
            }
        }
        $data['data'] = $query;
        $data['status'] = 0;
        $data['i'] = I('upasswd');
        $this->ajaxReturn($data,'json');

    }
}