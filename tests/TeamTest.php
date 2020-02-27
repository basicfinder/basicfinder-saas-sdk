<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class TeamTest
{
    private $saas;
    /**
     * Team Driver 选择
     * TeamTest constructor.
     */
    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('1234566@qq.com', 'bf123456', 'pc-passport',
            '1.0.0', 'Win32', '111');
    }

    /**
     * 创建团队
     * @return mixed
     */
    public function create()
    {
        $params = [
            "name" => "测试团队-1-1217-1644",
            "sort" => 2,
            "status" => 1,  //0 未通过   1 通过   2 禁用
            "site_id" => 245  //租户id root用户比传， admin用户非必传
            /**
             * 可选参数
            phone	否	int	团队电话
             */
        ];
        return $this->saas->team->create($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'info' => array ( 'user_id' => '38028', 'created_at' => '1576479311', 'name' => '测试团队-1', 'sort' => '2', 'status' => '1', 'site_id' => '245', 'member_count' => '0', 'open_payment' => '0', 'keywords' => 'ceshituanduicstd-1测试团队-1', 'address' => '', 'logo' => '', 'domain' => '', 'phone' => '', 'updated_at' => '1576479311', 'id' => '1421', ), ), )
         */
    }

    /**
     * 缺少团队id参数
     * 编辑团队
     * @return mixed
     */
    public function update()
    {
        $params = [
            "name" => "测试团队-1-update",
            "sort" => 3,
            "status" => 1, //0 未通过   1 通过   2 禁用
            "team_id" => 1421,  //团队id root admin 用户必填
            "site_id" => 361  //租户id
            /**
             *
             * 可选参数
             * phone 团队电话
             * site_id 租户id
             */
        ];
        return $this->saas->team->update($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'info' => array ( 'id' => 1421, 'site_id' => 245, 'user_id' => 38028, 'keywords' => 'ceshituanduicstd-1-update测试团队-1-update', 'name' => '测试团队-1-update', 'logo' => '', 'address' => '', 'phone' => '', 'mobile' => '', 'sort' => '3', 'type' => 0, 'status' => '2', 'open_payment' => 0, 'domain' => '', 'member_count' => 0, 'created_at' => 1576479311, 'updated_at' => 1576481121, ), ), )
         */
    }

    /**
     * 团队列表
     * @return mixed
     */
    public function teams()
    {
        $params = [
            "limit" => 5,
            "page" => 1
            /**
             * 可选参数
            keyword	否	String	关键字搜索
            status	否	int	团队状态
            orderby	否	String	排序字段
            sort	否	int	排序方式（正序或倒序）
            site_id	否	String	租户id
            user_id	否	String	用户id
             */
        ];
        return $this->saas->team->teams($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'list' => array ( 0 => array ( 'id' => '1385', 'site_id' => '266', 'user_id' => '32328', 'keywords' => 'ceshituanduiciblecstd2cible测试团队02', 'name' => 'cible测试团队02', 'logo' => '', 'address' => '', 'phone' => '', 'mobile' => '', 'sort' => '1', 'type' => '0', 'status' => '1', 'open_payment' => '0', 'domain' => '', 'member_count' => '0', 'created_at' => '1566815516', 'updated_at' => '1574335673', 'site' => array ( 'id' => '266', 'name' => 'cible测试租户-测试环境', ), 'creater' => array ( 'id' => '32328', 'nickname' => '791****17*qq.com', 'email' => '791426617@qq.com', 'avatar' => '/upload/2019/09/17/5d80b0d14d794_1568714961.jpg', 'type' => '1', 'status' => '1', 'company' => '', 'created_at' => '1574309187', ), ), 1 => array ( 'id' => '1374', 'site_id' => '266', 'user_id' => '32328', 'keywords' => 'ceshituanduiciblecstdcible测试团队', 'name' => 'cible测试团队', 'logo' => '', 'address' => '', 'phone' => '', 'mobile' => '', 'sort' => '0', 'type' => '0', 'status' => '1', 'open_payment' => '0', 'domain' => '', 'member_count' => '4', 'created_at' => '1566368854', 'updated_at' => '1576477736', 'site' => array ( 'id' => '266', 'name' => 'cible测试租户-测试环境', ), 'creater' => array ( 'id' => '32328', 'nickname' => '791****17*qq.com', 'email' => '791426617@qq.com', 'avatar' => '/upload/2019/09/17/5d80b0d14d794_1568714961.jpg', 'type' => '1', 'status' => '1', 'company' => '', 'created_at' => '1574309187', ), ), ), 'count' => '2', 'statuses' => array ( 0 => '未审核', 1 => '通过', 2 => '禁用', ), ), )
         */
    }

    /**
     * 禁用团队
     * @return mixed
     */
    public function delete()
    {
        $params = ["team_id" => 1421];
        return $this->saas->team->delete($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'team_id' => '1421', ), )
         */
    }

    /**
     * 恢复团队
     * @return mixed
     */
    public function restore()
    {
        $params = ["team_id" => 1421];
        return $this->saas->team->restore($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'team_id' => '1421', ), )
         */
    }

    /**
     * 团队绩效
     * @return mixed
     */
    public function statTeam()
    {
        $params = ["team_id" => 1421];
        return $this->saas->team->statTeam($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'count' => '0', 'list' => array ( ), ), )
         */
    }

    /**
     * 团队成员列表
     * @return mixed
     */
    public function users()
    {
        $params = [
            "limit" => 5,
            "page" => 1,
            "team_id" => 1374,
            /**
             * 可选参数
            keyword	否	String	关键字搜索
            status	否	int	团队状态
            orderby	否	String	排序字段
            sort	否	int	排序方式（正序或倒序）
            role_id	否	String	团队角色
             */
        ];
        return $this->saas->team->users($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'list' => array ( 0 => array ( 'id' => '13178', 'team_id' => '1374', 'team_group_id' => '0', 'user_id' => '38016', 'created_by' => '0', 'status' => '0', 'remark' => '', 'created_at' => '1575535278', 'updated_at' => '0', 'user' => array ( 'id' => '38016', 'nickname' => 'test001', 'email' => 'cible001@team.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '2', 'status' => '1', 'access_token' => '', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '32330', 'created_at' => '1574858359', 'roles' => array ( 0 => array ( 'item_name' => 'team_manager', 'user_id' => '38016', 'created_at' => '1575535278', ), 1 => array ( 'item_name' => 'team_worker', 'user_id' => '38016', 'created_at' => '1575535278', ), ), 'tagUser' => array ( ), 'tags' => array ( ), ), 'creater' => '', 'group' => '', ), 1 => array ( 'id' => '13175', 'team_id' => '1374', 'team_group_id' => '0', 'user_id' => '32383', 'created_by' => '0', 'status' => '0', 'remark' => '', 'created_at' => '1575442294', 'updated_at' => '0', 'user' => array ( 'id' => '32383', 'nickname' => 'cible作业员01', 'email' => '13700000000@test.com', 'mobile' => '13700000000', 'phone' => '', 'avatar' => '', 'type' => '2', 'status' => '1', 'access_token' => 'bkNvY0VXb1BMdHZKeHdwdjVEcXZPSUtHcTlXWWZqMTJ8fHwzMjM4M3x8fDE5Mi4xNjguMS4xN3x8fDE1NzE2MjYwNjU_c', 'company' => '', 'language' => '0', 'created_from' => '5', 'created_by' => '0', 'created_at' => '1566369511', 'roles' => array ( 0 => array ( 'item_name' => 'team_manager', 'user_id' => '32383', 'created_at' => '1575442341', ), 1 => array ( 'item_name' => 'team_worker', 'user_id' => '32383', 'created_at' => '1575442341', ), ), 'tagUser' => array ( ), 'tags' => array ( ), ), 'creater' => '', 'group' => '', ), 2 => array ( 'id' => '13174', 'team_id' => '1374', 'team_group_id' => '0', 'user_id' => '38017', 'created_by' => '0', 'status' => '0', 'remark' => '', 'created_at' => '1574858629', 'updated_at' => '0', 'user' => array ( 'id' => '38017', 'nickname' => 'cible002', 'email' => 'cible002@team.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '2', 'status' => '1', 'access_token' => '', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '32330', 'created_at' => '1574858393', 'roles' => array ( 0 => array ( 'item_name' => 'team_manager', 'user_id' => '38017', 'created_at' => '1574858629', ), 1 => array ( 'item_name' => 'team_worker', 'user_id' => '38017', 'created_at' => '1574858629', ), ), 'tagUser' => array ( ), 'tags' => array ( ), ), 'creater' => '', 'group' => '', ), 3 => array ( 'id' => '13124', 'team_id' => '1374', 'team_group_id' => '0', 'user_id' => '32527', 'created_by' => '0', 'status' => '0', 'remark' => '', 'created_at' => '1571631284', 'updated_at' => '0', 'user' => array ( 'id' => '32527', 'nickname' => '32527', 'email' => '13700000000@qq.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '2', 'status' => '1', 'access_token' => 'VjhZYkxrd0FxeDJxdGpqQ29yd3VlLWNIN1BnMGNKbkZ8fHwzMjUyN3x8fDEyNy4wLjAuMXx8fDE1NzU2MjY3NzM_c', 'company' => '测试公司', 'language' => '0', 'created_from' => '5', 'created_by' => '0', 'created_at' => '1574308766', 'roles' => array ( 0 => array ( 'item_name' => 'team_manager', 'user_id' => '32527', 'created_at' => '1575433607', ), 1 => array ( 'item_name' => 'team_worker', 'user_id' => '32527', 'created_at' => '1575433607', ), ), 'tagUser' => array ( ), 'tags' => array ( ), ), 'creater' => '', 'group' => '', ), ), 'count' => '4', 'team' => array ( 'id' => '1374', 'site_id' => '266', 'user_id' => '32328', 'keywords' => 'ceshituanduiciblecstdcible测试团队', 'name' => 'cible测试团队', 'logo' => '', 'address' => '', 'phone' => '', 'mobile' => '', 'sort' => '0', 'type' => '0', 'status' => '1', 'open_payment' => '0', 'domain' => '', 'member_count' => '0', 'created_at' => '1566368854', 'updated_at' => '1576477736', ), 'tags' => array ( ), 'groups' => array ( 0 => array ( 'id' => '0', 'name' => '非小组成员', ), 1 => array ( 'id' => '37', 'name' => 'test', ), ), 'roles' => array ( 'team_worker' => '团队作业员', 'team_manager' => '团队管理员', ), 'step_types' => array ( 0 => '执行', 1 => '审核', 2 => '质检', 3 => '验收', ), 'statuses' => array ( 0 => '未激活', 1 => '已激活', 2 => '已禁用', ), ), )
         */
    }

    /**
     * 添加团队成员
     * @return mixed
     */
    public function userCreate()
    {
        $params = [
            "team_id" => 1421,
            "nickname" => "标注1",
            "email" => "123456@qq.com",
            "password" => "aa123456",
            "roles" => "team_worker",     //角色
//            "phone" => "" // 可选参数
            /**
             * 角色：
             * 管理：租户运营[admin_worker], 管理员[admin_manager], 租户商户[admin_business]
             * 团队：团队作业员[team_worker], 团队管理员[team_manager]
             * 众包：众包作业员[crowdsourcing_worker]
             * ROOT: root管理[root_manager],root商务[root_business],root平台运营[root_worker],root生产运营[root_produce_worker]
             */
        ];
        return $this->saas->team->userCreate($params);
        /**
         * 返回数据
         * {
            "error":"",
            "message":"",
            "data":{
                "user_id":"14237"
            }
         }
         */
    }

    /**
     * 修改团队成员信息
     * @return mixed
     */
    public function userUpdate()
    {
        $params = [
            "team_id" => 1421,
            "user_id" => 38033,
            "nickname" => "作业员",
            "email" => "112233@qq.com",
            "roles" => "team_worker",
            /**
             * 可选参数
             password	否	String	团队成员密码（没有不会修改密码）
             phone	    否	int	团队成员手机号
             */
        ];
        return $this->saas->team->userUpdate($params);
        /**
         * 返回数据
         * {
            "error":"",
            "message":"",
            "data":{
                "user_id":"14237"
            }
        }
         */
    }

    /**
     * 移除团队成员
     * @return mixed
     */
    public function userDelete()
    {
        $params = [
            "team_id" => 1421,
            "user_id" => 38033
        ];
        return $this->saas->team->userDelete($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'result' => '1', ), )
         */
    }

    /**
     * 邀请token生成
     * @return mixed
     */
    public function invitationToken()
    {
        $params = [
            "team_id" => 1421,
            "user_type" => 2,
            "user_role" => 'team_worker'
        ];
        return $this->saas->team->invitationToken($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'invitation' => array ( 'id' => '210', 'site_id' => '363', 'team_id' => '1421', 'token' => '3n7J9s7RwYknEZbAMwYWnchlo-g0V3QS_1576487364', 'user_role' => 'team_worker', 'user_type' => '2', 'status' => '0', 'show_count' => '', 'signup_count' => '', 'created_by' => '38032', 'created_at' => '1576487364', 'updated_at' => '1576487364', ), 'url' => 'http://devsaas.passport.basicfinder.com/signup-by-invitation/3n7J9s7RwYknEZbAMwYWnchlo-g0V3QS_1576487364', ), )
         */
    }

    /**
     * 邀请用户注册-发送验证码
     * @return mixed
     */
    public function signupByInvitation()
    {
        $params = [
            "op" => "sendEmailCode", //sendMobileCode 发短信   sendEmailCode 发邮箱
            "email" => "123456yyuu@qq.com", //手机号 和邮箱 根据 op参数传
//            "mobile" => "18634567845",
            "token" => "C01mN3cBTsWFEFmiMMgJNYAlzDKznZZe_1576486264", //邀请token
            "language" => 0, // 0 中文  1 英文
        ];
        return $this->saas->team->signupByInvitation($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'email' => '123456yyuu@qq.com', ), )
         */
    }

    /**
     * 邀请用户注册-提交注册
     * @return mixed
     */
    public function submitSignupByInvitation()
    {
        $params = [
            "nickname" => "test-name",
            "emailCode" => "685421", //验证码 type 1 必填
            "email" => "12345641@qq.com", // email type 1 必填
//            "mobile" => "",  //type 0 是必填
//            "mobileCode" => "", // type 0 是必填
            "type" => 1, //0 手机号   1 邮箱
            "password" => "aa123456",
            "token" => "C01mN3cBTsWFEFmiMMgJNYAlzDKznZZe_1576486264", //邀请token
            "language" => 0, // 0 中文  1 英文
        ];
        return $this->saas->team->submitSignupByInvitation($params);
        /**
         * 返回数据
         * {
            "error": "",
            "message": "",
            "data": {
                "id": "32547"
            }
         }
         */
    }

    /**
     * 导入解析excel
     * @return mixed
     */
    public function importParse()
    {
        $params = [
            "url" => "/user_import/1576656639/demo.xlsx" //相对路径,eg:/user_import/1576656639/demo.xlsx
        ];
        return $this->saas->team->importParse($params);
        /**
         * 返回结果
         *{
            "error": "",
            "message": "",
            "data": {
                "list": [
                    {
                        "nickname": "rednng00001",
                        "password": "rednng00001",
                        "email": "rednng00001@ceshi.com",
                        "phone": ""
                    },
                    {
                        "nickname": "rednng00002",
                        "password": "rednng00002",
                        "email": "rednng00002@ceshi.com",
                        "phone": ""
                    }
                ]
            }
        }
         */
    }

    /**
     * 用户导入提交
     * @return mixed
     */
    public function importSubmit()
    {
        $params = [
            /**
             * 参数	    是否必须	    类型	说明
            team_id	        是	    int	    团队id
            email	        是	    string	邮箱
            password	    是	    string	密码
            nickname	    否	    string	昵称
            phone	        否	    string	电话
             */
        ];
        return $this->saas->team->importSubmit($params);
        /**
         * 返回结果
         * {
            "error":"",
            "message":"",
            "data":{
                "user_id":"14237"
            }
        }
         */
    }

}