<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class InvitationTest
{
    private $saas;

    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('1234566@qq.com', 'bf123456', 'pc-passport', '1.0.0', 'Win32', '111');
    }

    /**
     * 生成邀请链接
     * @return mixed
     */
    public function create()
    {
        $params = [
            "user_type" => 2,
            "user_role" => "team_worker",
            "team_id" => 1421
            /**
             * 可选参数
             * site_id	否	int	租户id
                team_id	否	int	团队id
             */
        ];
        return $this->saas->invitation->create($params);
        /**
         * 返回结果
         * {"error":"","message":"","data":{"invitation":{"id":"222","site_id":"363","team_id":"1421","token":"MLHQD93iUssNZ2TNLQetKA9qgAso_N_0_1577171147","user_role":"team_worker","user_type":"2","status":"0","show_count":"","signup_count":"","created_by":"38032","created_at":"1577171147","updated_at":"1577171147"},"url":"http://devsaas.passport.basicfinder.com/signup-by-invitation/MLHQD93iUssNZ2TNLQetKA9qgAso_N_0_1577171147"}}
         */
    }

    /**
     * 邀请用户列表
     * @return mixed
     */
    public function userList()
    {
        $params = [
            /**
             * 可选参数
            orderby	否	String	排序字段
            sort	否	String	排序方式（正序或倒序）
            limit	否	int	每页展示数据量
            page	否	int	页数
            site_id	否	int	租户id
            team_id	否	int	团队id
            status	否	string	状态，多个以逗号(,)隔开
            invitation_id	否	int	邀请id
            user_type	否	string	用户类型，多个以逗号(,)隔开
             */
        ];
        return $this->saas->invitation->userList($params);
        /**
         * 返回结果
         * array ( 'data' => array ( 'list' => array ( 0 => array ( 'id' => '65', 'site_id' => '363', 'team_id' => '1421', 'invitation_id' => '219', 'user_id' => '38041', 'status' => '0', 'created_at' => '1576750509', 'updated_at' => '1576750509', 'user' => array ( 'id' => '38041', 'nickname' => 'zuoyeyuan-work', 'email' => 'zuoyeyuan@126.com', 'mobile' => '', 'status' => '1', 'roles' => array ( 0 => array ( 'item_name' => 'team_worker', 'user_id' => '38041', 'created_at' => '1577074387', ), ), ), ), 1 => array ( 'id' => '64', 'site_id' => '363', 'team_id' => '1421', 'invitation_id' => '207', 'user_id' => '38033', 'status' => '0', 'created_at' => '1576484737', 'updated_at' => '1576484737', 'user' => array ( 'id' => '38033', 'nickname' => 'test-worker', 'email' => 'teammanager@qq.com', 'mobile' => '', 'status' => '1', 'roles' => array ( 0 => array ( 'item_name' => 'team_manager', 'user_id' => '38033', 'created_at' => '1577074485', ), 1 => array ( 'item_name' => 'team_worker', 'user_id' => '38033', 'created_at' => '1577074485', ), ), ), ), ), 'count' => '2', 'statuses' => array ( 0 => '未激活', 1 => '已激活', ), 'roles' => array ( 'guest' => '访客', 'customer_manager' => '客户管理员', 'customer_worker' => '客户操作员', 'team_worker' => '团队作业员', 'team_manager' => '团队管理员', 'crowdsourcing_worker' => '众包作业员', 'crowdsourcing_manager' => '众包管理员', 'admin_worker' => '租户运营', 'admin_manager' => '管理员', 'admin_business' => '租户商务', 'root_manager' => 'ROOT管理', 'root_business' => 'ROOT商务', 'root_worker' => 'ROOT平台运营', 'root_produce_worker' => 'ROOT生产运营', ), ), 'error' => '', 'message' => '', )
         */
    }
}