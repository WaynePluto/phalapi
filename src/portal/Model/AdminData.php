<?php
namespace Portal\Model;
/**
 * 基于DataModel的admin表模型
 */
class AdminData extends Base {

    public function getTableName($id) {
        return 'phalapi_portal_admin';
    }
}
