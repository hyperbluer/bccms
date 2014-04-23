<?php
/**
 * index.php 后台留言板模块控制器
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-16 16:42:36
 */
 
class Controller_guestbook_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Guestbook = $this->loader->model('guestbook');
    }

    public function index()
    {
		$where = array('reply_id' => 0, 'site_id' => $this->session->get('site_id'));
		$dataList = $this->Model_Guestbook->getAll($where);
		
        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('guestbook/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
			$defaultData = array(
				'type_id' => 0,
                'guestname' => '',
                'email' => '',
                'tel' => '',
                'mobile' => '',
                'address' => '',
                'content' => '',
                'status' => 0
            );
			
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
			$data['status'] = 0;
			(isset($info['status']) && $info['status'] == 'on') && $data['status'] = 1;
            $data['add_time'] = BC_SYS_TIME;
            $data['type_id'] = 0;
            $data['user_id'] = 0;
            $data['reply_id'] = 0;
			$data['site_id'] = $this->session->get('site_id');
            
            $result = $this->Model_Guestbook->insert($data);
            if ($result[0])
            {
                $this->message('', '', 1);
            }
            else
            {
                $this->message('', '', 0);
            }
        }
        else
        {
            $this->tpl->display('guestbook/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
			$defaultData = array(
				'type_id' => 0,
                'guestname' => '',
                'email' => '',
                'tel' => '',
                'mobile' => '',
                'address' => '',
                'content' => '',
                'status' => 0
            );
			
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
			$data['status'] = 0;
			(isset($info['status']) && $info['status'] == 'on') && $data['status'] = 1;

            $where = array('guestbook_id' => $id, 'site_id' => $this->session->get('site_id'));
            $result = $this->Model_Guestbook->update($data, $where);
            if ($result)
            {
				$where = array('reply_id' => $id, 'site_id' => $this->session->get('site_id'));
				$replyResult = $this->Model_Guestbook->getOne($where);
				$reply = $this->request->post->get('reply');
				$data = array_intersect_key($reply,$defaultData);
				$data['user_id'] = $this->session->get('user_id');
				if (isset($replyResult['guestbook_id'])) //修改
				{
					$where = array('guestbook_id' => $replyResult['guestbook_id']);
					$result = $this->Model_Guestbook->update($data, $where);
				}
				else //添加
				{
					$data['reply_id'] = $id;
					$data['add_time'] = BC_SYS_TIME;
					$data['site_id'] = $this->session->get('site_id');
					$result = $this->Model_Guestbook->insert($data);
				}
			
                $this->message('', '', 1);
            }
            else
            {
                $this->message('', '', 0);
            }
        }
        else
        {
            $where = array('guestbook_id' => $id, 'site_id' => $this->session->get('site_id'));
            $result = $this->Model_Guestbook->getOne($where);
			
			$where = array('reply_id' => $result['guestbook_id']);
			$replyResult = $this->Model_Guestbook->getOne($where);

            $this->tpl->assign('item', $result);
            $this->tpl->assign('replyItem', $replyResult);
            $this->tpl->display('guestbook/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('guestbook_id' => $id, 'site_id' => $this->session->get('site_id'));
        if ($id && $this->Model_Guestbook->delete($where))
        {
            $this->message('', _url('guestbook/index'), 1);
        }
        else
        {
            $this->message('', _url('guestbook/index'), 0);
        }
    }
}
