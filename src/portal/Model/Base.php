<?php
namespace Portal\Model;

/**
 * 连接其他数据库
 * - 当需要连接和操作其他数据库时，请在Model继续此基类，以便切换数据库
 * - 或在此基类进行通用操作的封装
 */
class Base extends \PhalApi\Model\DataModel {

    /**
     * 切换数据库
     * @return \PhalApi\Database\NotORMDatabase
     */
    protected function getNotORM() {
        return \PhalApi\DI()->notorm;
    }
}
