<?php

namespace Portal\Api;

use PhalApi\Api;
use Portal\Domain\AdminData as AdminDataDomain;

use function PHPSTORM_META\type;

/**
 * 管理员CURD
 */
class AdminData extends Api
{
  public function getRules()
  {
    return array(
      'add' => array(
        'username' => array('name' => 'username', 'require' => true, 'desc' => '账号'),
        'password' => array('name' => 'password', 'require' => true, 'desc' => '密码'),
      ),
      'delete' => array(
        'id' => array('name' => 'id', 'require' => true, 'desc' => 'id')
      ),
      'getTableList' => array(
        'page' => array('name' => 'page', 'require' => true, 'desc' => '第几页'),
        'perpage' => array('name' => 'perpage', 'require' => true, 'desc' => '页面大小'),
        'search' => array('name' => 'search', 'require' => false, 'desc' => '查询条件'),
      ),
      'getData' => array(
        'id' => array('name' => 'id', 'require' => true, 'desc' => 'id')
      ),
    );
  }

  /**
   * 增加管理员
   * @desc 增加普通管理员
   */
  public function add()
  {
    $adminDataDomain = new AdminDataDomain();
    return $adminDataDomain->add($this->username, $this->password);
  }
  /**
   * 获取管理员信息
   * @desc 一条
   */
  public function getData()
  {
    $adminDataDomain = new AdminDataDomain();
    return $adminDataDomain->getData($this->id);
  }

  /**
   * 删除
   * @desc
   */
  public function delete()
  {
    $adminDataDomain = new AdminDataDomain();
    return $adminDataDomain->delete($this->id);
  }


  /**
   * 获取管理员列表
   * @desc 全部列表
   */
  public function getTableList()
  {
    $adminDataDomain = new AdminDataDomain();
    $search = json_decode($this->search);
    $whereParams = array();
    $where = '';
    if ($search->id) {
      $where = $where ? $where.' and id = :id' : 'id = :id';
      $whereParams[':id'] = $search->id;
    }
    if ($search->username) {
      $where = $where ? $where.' and username = :username' : 'username = :username';
      $whereParams[':username'] = $search->username;
    }
    return $adminDataDomain->getTableList($this->page, $this->perpage, $where, $whereParams);
  }
}
