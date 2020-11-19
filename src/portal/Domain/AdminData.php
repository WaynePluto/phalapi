<?php
namespace Portal\Domain;
use Portal\Model\AdminData as AdminDataModel;
use Portal\Domain\Admin as AdminDomain;
/**
 * 管理员表业务层
 */
class AdminData {
    /**
     * 创建管理员
     */
    public function add($username, $password, $role='admin')
    {
        $adminDomain = new AdminDomain();
        return $adminDomain->createAdmin($username, $password, $role);
    }
    /**
     * 
     */
    public function getData($id)
    {
        $adminDataDomain = new AdminDataModel();
        return $adminDataDomain->get($id, 'id,username');
    }
    
    /**
     * 获取数据表
     */
    public function getTableList($page, $perpage, $where, $whereParam)
    {
        $adminDataModel = new AdminDataModel();
        return $adminDataModel->getList($where, $whereParam, 'id, username, role, state', null, $page, $perpage);
    }
    /**
     * 
     */
    public function update()
    {
        # code...
    }
    /**
     * 
     */
    public function delete($id)
    {
        $adminDataModel = new AdminDataModel();
        return $adminDataModel->delete($id);
    }
    
    
    
}
