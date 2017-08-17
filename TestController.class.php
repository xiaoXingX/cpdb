<?php

namespace CRM\Controller;

class WorkPlanController extends BaseController {
    protected $requestNeedKey = array(
        'follow_customs' => '0',
        'add_customs' => '0',
        'add_registers' => '0',
    );
      /**
     * 详情
     */
    public function detail() {
        //@todo:判断是否是系统的
        $id = empty($_GET['id']) ? 0 : intval($_GET['id']);
        if (empty($id)) {
            $this->renderError('参数不能为空');
        }
        $where = array('id' => $id, 'is_deleted' => NOT_DELETED);
        //@todo: 检查是否有关联数据
        $data = M('work_plan')->where($where)->find();
        $this->format($data);
        if (empty($data)) {
            $this->renderError('数据不存在');
        }
        $this->assign('data', $data);
        $this->display('detail');
    }
    /**
     * 编辑
     */
    public function edit() {
        //@todo:判断是否是系统的
        $id = empty($_GET['id']) ? 0 : intval($_GET['id']);
        if (empty($id)) {
            $this->renderError('参数不能为空');
        }
        $where = array('id' => $id, 'is_deleted' => NOT_DELETED);
        //@todo: 检查是否有关联数据
        $data = M('work_plan')->where($where)->find();
        $this->format($data);
        if (empty($data)) {
            $this->renderError('数据不存在');
        }
        $this->assign('data', $data);
        $this->display('add');
    }
    public function index() {
        //@todo:判断是否是系统的
        $Model = M('work_plan'); // 实例化User对象
        $start = empty($_GET['start']) ? 0 : intval($_GET['start']);
        $word = empty($_GET['word']) ? '' : $_GET['word'];
        $state = isset($_GET['state']) ? intval($_GET['state']) : null;
        $limit = empty($_GET['limit']) ? 10 : intval($_GET['limit']);
        $page = empty($_GET['p']) ? 1 : intval($_GET['p']);
        $datetime = empty($_GET['datetime']) ? 4 : intval($_GET['datetime']);
        $this->assign('datetime',$datetime);
        $beginTime = I('get.begin_date');
        $endTime = I('get.end_date');
        $this->assign('begin_date',$beginTime);
        $this->assign('end_date',$endTime);
        $endTime = empty($endTime) ? '' : date('Y-m-d',(strtotime($endTime) + 86400));
        $where = "is_deleted=0 AND sales_id={$this->salesId}";
        if (!empty($beginTime)) {
            $where .= " AND create_time>='{$beginTime}' ";
        }
        if (!empty($endTime)) {
            $where .= " AND create_time<='{$endTime}' ";
        }
        if ($state !== null) {
            $where .= " AND state={$state}";
        }
        if (!empty($word)) {
            $where .= " AND name LIKE '%{$word}%'";
        }
        $list = $Model->where($where)
                ->order('id DESC')
                ->page($page . ',' . $limit)
                ->select();
        foreach ($list as $key => &$value) {
            $this->format($value);
        }
        $count = $Model->where($where)->count();
        $data = array(
            'count' => $count,
            'list' => $list,
        );
        $Page = new \Think\Page($count, $limit);
        $show = $Page->show();
        $this->assign('page', $show);
        $this->assign('list', $list);
        $this->display('index');
    }
    public function format(&$data) {
     
        
    }
    public function add() {
        $this->display('add');
    }
    //添加或修改
    public function save() {
        $rules = array(
            array(
                'follow_customs',
                'require',
                '不能为空',
                1
            ),
        );
        $Model = M('work_plan');
        if (!$Model->validate($rules)->create()) {
            $this->renderError($Model->getError());
        }
        $_POST['id']= empty($_POST['id'])?0:$_POST['id'];
        $_POST['sales_id'] = $this->salesId;
        $this->initRequestValue($_POST, $this->requestNeedKey);
        if (!empty($_POST['id'])) {
            $_POST['update_time'] = date("Y-m-d H:i:s");
            $where = array('id' => intval($_POST['id']));
            $Model->where($where)->save($_POST);
        } else {
            $id = $Model->add($_POST);
            $_POST['id'] = $id;
        }
        
        $this->render($_POST);
    }
    /**
     * 屏蔽
     */
    public function block() {
        //@todo:判断是否是系统的
        $id = empty($_POST['id']) ? 0 : intval($_POST['id']);
        if (empty($id)) {
            $this->renderError('参数不能为空');
        }
        $data = array(
            'state' => STATE_BLOCKED
        );
        M('work_plan')->where(array('id' => $id))->save($data);
        $this->render("");
    }
 public function unblock() {
        //@todo:判断是否是系统的
        $id = empty($_POST['id']) ? 0 : intval($_POST['id']);
        if (empty($id)) {
            $this->renderError('参数不能为空');
        }
        $data = array(
            'state' => STATE_NORMAL
        );
        M('work_plan')->where(array('id' => $id))->save($data);
        $this->render("");
    }
    /**
     * 删除
     */
    public function delete() {
        $id = empty($_POST['id']) ? 0 : intval($_POST['id']);
        if (empty($id)) {
            $this->renderError('参数不能为空');
        }
        $data = array(
            'is_deleted' => DELETED,
            'state' => STATE_BLOCKED
        );
        M('work_plan')->where(array('id' => $id))->save($data);
        $this->render("");
    }
}
