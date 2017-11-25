<?php
// 本类由系统自动生成，仅供测试用途
class PagejumpAction extends Action
{
    public function index(){

	    $this->display();
    }
    
    public function jump()
    {
        if(I('jumpnum') >= 1 && I('jumpnum') <= 123286){
            $data['status'] = 1;
            session('page', I('jumpnum'));
            $this->ajaxReturn($data,'json');
        }
        $data['status'] = 0;
        $this->ajaxReturn($data,'json');
    }

    public function prev()
    {
        if(I('prevnum') >= 1){
            $data['status'] = 1;
            session('page', I('prevnum'));
            $this->ajaxReturn($data,'json');
        }
        $data['status'] = 0;
        $this->ajaxReturn($data,'json');
    }

    public function next()
    {
        if(I('nextnum') <= 123286){
            $data['status'] = 1;
            session('page', I('nextnum'));
            $this->ajaxReturn($data,'json');
        }
        $data['status'] = 0;
        $this->ajaxReturn($data,'json');
    }
}