<?php

namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class UserTest
{
    private $saas;

    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('liujianping@basicfinder.com', 'bf123456');
    }

    /**
     * admin login
     */
    public function adminLogin()
    {
        $this->saas->auth('1234566@qq.com', 'bf123456', 'pc-passport',
            '1.0.0', 'Win32', '111');
    }

    /**
     * worker login
     */
    public function workerLogin()
    {
        $this->saas->auth('teammanager@qq.com', 'bf123456', 'pc-passport',
            '1.0.0', 'Win32', '111');
    }

    /**
     * 众包登录 login
     */
    public function crowdsourcingLogin()
    {
        $this->saas->authCrowdsourcing('zhognbao1@126.com', 'bf123456');
    }


    /**
     * root 登录
     * 用户登录后再调用其它接口可以不用传access_token，SDK会自动带上。
     * @return mixed
     */
    public function login($args = null)
    {
        $params = [
            'username' => 'liujianping@basicfinder.com',
            'password' => 'bf123456',
            'device_name' => 'Win32',
            'device_number' => '666',
            'app_key' => 'pc-root',
            'app_version' => '1.0.0'
//            'system_version' => '13.2.3',
        ];
        if (!empty($args)) {
            $params = $args;
        }
        return $this->saas->user->login($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'id' => '38028', 'access_token' => 'TGhIVFA2N2c4NV81X3pxeEpJYjJ0cEc3RElDSUVRX3d8fHwzODAyOHx8fDE5Mi4xNjguMS4xN3x8fDE1NzU5NTkwNzM_c', 'type' => '5', ), )
         */
    }

    /**
     * 用户详情
     * @return mixed
     */
    public function detail()
    {
        $this->login();
        $params = ["user_id" => 38028];
        return $this->saas->user->detail($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'user' => array ( 'id' => '38028', 'nickname' => '刘建平', 'email' => 'liujianping@basicfinder.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '5', 'status' => '1', 'access_token' => 'TGhIVFA2N2c4NV81X3pxeEpJYjJ0cEc3RElDSUVRX3d8fHwzODAyOHx8fDE5Mi4xNjguMS4xN3x8fDE1NzU5NTkwNzM_c', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '32330', 'created_at' => '1575959032', 'siteUser' => '', 'site' => '', 'teamUser' => '', 'team' => '', 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'root_manager', 'user_id' => '38028', 'created_at' => '1575959044', ), ), 'tagUser' => array ( ), 'tags' => array ( ), 'createdByUser' => array ( 'id' => '32330', 'nickname' => '王昊坤', 'email' => 'wanghaokun@root.com', 'avatar' => '', 'type' => '5', 'status' => '1', 'company' => '', 'created_at' => '1563520707', ), 'money' => '', 'userQualification' => '', 'permisstions' => array ( 0 => 'work/result', 1 => 'work/records', 2 => 'work/list', 3 => 'user/users', 4 => 'user/update-qualification', 5 => 'user/update-phone-new', 6 => 'user/update-phone', 7 => 'user/update-password-new', 8 => 'user/update-password', 9 => 'user/update-mobile', 10 => 'user/update-epay', 11 => 'user/update-email-new', 12 => 'user/update-email', 13 => 'user/update', 14 => 'user/submit-qualification', 15 => 'user/stat', 16 => 'user/send-phone-code', 17 => 'user/send-email-code', 18 => 'user/records', 19 => 'user/qualifications', 20 => 'user/open-ftp', 21 => 'user/index', 22 => 'user/import-submit', 23 => 'user/import-parse', 24 => 'user/import', 25 => 'user/form', 26 => 'user/epaies', 27 => 'user/devices', 28 => 'user/detail', 29 => 'user/delete', 30 => 'user/create-epay', 31 => 'user/create', 32 => 'user/auth', 33 => 'unpack/list', 34 => 'thirdparty/user-update', 35 => 'thirdparty/user-merge', 36 => 'thirdparty/user-list', 37 => 'thirdparty/user-fetch', 38 => 'thirdparty/user-detail', 39 => 'thirdparty/user-add', 40 => 'thirdparty/update', 41 => 'thirdparty/team-fetch', 42 => 'thirdparty/detail', 43 => 'thirdparty-user/list', 44 => 'template/use', 45 => 'template/update', 46 => 'template/list', 47 => 'template/form', 48 => 'template/detail', 49 => 'template/delete', 50 => 'template/create', 51 => 'template/copy', 52 => 'team/users', 53 => 'team/user-update', 54 => 'team/user-import', 55 => 'team/user-delete', 56 => 'team/user-create', 57 => 'team/user-all', 58 => 'team/update-group', 59 => 'team/update', 60 => 'team/teams', 61 => 'team/restore', 62 => 'team/parse-users-excel', 63 => 'team/multiple-moves-team-user', 64 => 'team/move-team-user', 65 => 'team/move-group-user', 66 => 'team/import-submit', 67 => 'team/import-parse', 68 => 'team/group-list', 69 => 'team/form', 70 => 'team/detail', 71 => 'team/delete-group-user', 72 => 'team/delete-group', 73 => 'team/delete', 74 => 'team/create-group', 75 => 'team/create', 76 => 'task/tasks', 77 => 'task/resources', 78 => 'task/resource', 79 => 'task/project-price-configs', 80 => 'task/mask', 81 => 'task/mark', 82 => 'task/list', 83 => 'task/execute', 84 => 'task/detail', 85 => 'task/batch-execute', 86 => 'task/assigned-userids', 87 => 'task/assign-user-list', 88 => 'task/assign-user', 89 => 'tag/update-tag-user', 90 => 'tag/update', 91 => 'tag/tags', 92 => 'tag/tag-users', 93 => 'tag/delete', 94 => 'tag/create', 95 => 'step/group-update', 96 => 'step/group-open', 97 => 'step/group-list', 98 => 'step/group-form', 99 => 'step/group-detail', 100 => 'step/group-delete', 101 => 'step/group-create', 102 => 'step/group-close', 103 => 'stat/user-stat-list', 104 => 'stat/user-by-day', 105 => 'stat/user', 106 => 'stat/team-by-day', 107 => 'stat/team', 108 => 'stat/task', 109 => 'stat/operation-export', 110 => 'stat/list', 111 => 'stat/export', 112 => 'site/upload-resource-file', 113 => 'site/upload-public-image', 114 => 'site/upload-public-file', 115 => 'site/upload-private-file', 116 => 'site/update', 117 => 'site/system-info', 118 => 'site/stat', 119 => 'site/signup-user', 120 => 'site/signup-team', 121 => 'site/signup-site', 122 => 'site/signup-list', 123 => 'site/signup-by-invitation', 124 => 'site/signup', 125 => 'site/send-phone-code', 126 => 'site/send-email-code', 127 => 'site/refresh-auth', 128 => 'site/recovery', 129 => 'site/records', 130 => 'site/open', 131 => 'site/logs', 132 => 'site/login-quick', 133 => 'site/login-huicui', 134 => 'site/login', 135 => 'site/list', 136 => 'site/init', 137 => 'site/get-online-users', 138 => 'site/form', 139 => 'site/forget-password-new', 140 => 'site/forget-password', 141 => 'site/fetch-private-file', 142 => 'site/error', 143 => 'site/download-resource-file', 144 => 'site/download-public-file', 145 => 'site/download-private-file', 146 => 'site/download-log-file', 147 => 'site/detail', 148 => 'site/delete-private-file', 149 => 'site/delete', 150 => 'site/create', 151 => 'site/close', 152 => 'site/categorylist', 153 => 'site/captcha', 154 => 'setting/update', 155 => 'setting/list', 156 => 'setting/delete', 157 => 'setting/create', 158 => 'project/submit', 159 => 'project/stop', 160 => 'project/stat-export', 161 => 'project/set-task', 162 => 'project/set-step', 163 => 'project/restart', 164 => 'project/refuse', 165 => 'project/recovery', 166 => 'project/records', 167 => 'project/projects', 168 => 'project/pause', 169 => 'project/get-task', 170 => 'project/get-step', 171 => 'project/get-data', 172 => 'project/form', 173 => 'project/finish', 174 => 'project/detail', 175 => 'project/delete', 176 => 'project/create', 177 => 'project/copy', 178 => 'project/continue', 179 => 'project/assign-team', 180 => 'project/assign-data', 181 => 'pack/update-sort', 182 => 'pack/top', 183 => 'pack/stop', 184 => 'pack/repack', 185 => 'pack/renew', 186 => 'pack/regain', 187 => 'pack/pause', 188 => 'pack/list', 189 => 'pack/get-ftp', 190 => 'pack/form', 191 => 'pack/end', 192 => 'pack/delete', 193 => 'pack/dataset-list', 194 => 'pack/build', 195 => 'notice/update', 196 => 'notice/list', 197 => 'notice/delete', 198 => 'notice/create', 199 => 'money/works', 200 => 'money/withdrawals', 201 => 'money/withdrawal-update', 202 => 'money/withdrawal-form', 203 => 'money/withdrawal-create', 204 => 'money/tasks', 205 => 'money/moneys', 206 => 'money/money-detail', 207 => 'message/user-read', 208 => 'message/user-messages', 209 => 'message/user-delete', 210 => 'message/send', 211 => 'message/revoke', 212 => 'message/messages', 213 => 'message/list', 214 => 'message/form', 215 => 'message/detail', 216 => 'invitation/user-list', 217 => 'invitation/update', 218 => 'invitation/list', 219 => 'invitation/form', 220 => 'invitation/detail', 221 => 'invitation/delete-user', 222 => 'invitation/create', 223 => 'invitation/active-user', 224 => 'followup/update', 225 => 'followup/record-list', 226 => 'followup/list', 227 => 'followup/detail', 228 => 'followup/create-record', 229 => 'followup/create', 230 => 'file-pack/list', 231 => 'file-pack/build', 232 => 'email/send', 233 => 'email/recover', 234 => 'email/pause', 235 => 'email/list', 236 => 'email/form', 237 => 'email/detail', 238 => 'email/delete', 239 => 'email/create', 240 => 'deployment/update', 241 => 'deployment/redeploy-form', 242 => 'deployment/redeploy', 243 => 'deployment/list', 244 => 'deployment/form', 245 => 'deployment/detail', 246 => 'deployment/deploy', 247 => 'deployment/delete', 248 => 'deployment/create-form', 249 => 'deployment/create', 250 => 'delivery/list', 251 => 'delivery/form', 252 => 'delivery/detail', 253 => 'delivery/create', 254 => 'datamanage/upload-type', 255 => 'datamanage/list', 256 => 'datamanage/get-amazon-config', 257 => 'datamanage/form', 258 => 'datamanage/detail', 259 => 'datamanage/delete', 260 => 'datamanage/create', 261 => 'datamanage/check-camera-param-file', 262 => 'datadeployment/list', 263 => 'data/list', 264 => 'customer/user-list', 265 => 'customer/update-user', 266 => 'customer/update', 267 => 'customer/statistics', 268 => 'customer/receive', 269 => 'customer/new-register', 270 => 'customer/list', 271 => 'customer/ignore', 272 => 'customer/detail', 273 => 'customer/delete-user', 274 => 'customer/delete', 275 => 'customer/create-user', 276 => 'customer/create', 277 => 'crowdsourcing/users', 278 => 'crowdsourcing/user-update', 279 => 'crowdsourcing/user-delete', 280 => 'crowdsourcing/user-add', 281 => 'crowdsourcing/update', 282 => 'crowdsourcing/list', 283 => 'crowdsourcing/detail', 284 => 'crowdsourcing/create', 285 => 'category/update', 286 => 'category/form', 287 => 'category/detail-with-language', 288 => 'category/detail', 289 => 'category/delete', 290 => 'category/create', 291 => 'category/categories-with-language', 292 => 'category/categories', 293 => 'batch/detail', 294 => 'batch/batchs', 295 => 'auth/user-delete', 296 => 'auth/user-create', 297 => 'auth/roles', 298 => 'auth/role-users', 299 => 'auth/role-update', 300 => 'auth/role-detail', 301 => 'auth/role-delete', 302 => 'auth/role-create', 303 => 'auth/permissions-to-group', 304 => 'auth/permissions', 305 => 'auth/permission-update', 306 => 'auth/permission-delete', 307 => 'auth/permission-create', 308 => 'auth/move-user', 309 => 'aimodel/update', 310 => 'aimodel/list', 311 => 'aimodel/detail', 312 => 'aimodel/delete', 313 => 'aimodel/create', 314 => 'aimodel/copy', 315 => 'aimodel/category-update', 316 => 'aimodel/category-list', 317 => 'aimodel/category-detail', 318 => 'aimodel/category-delete', 319 => 'aimodel/category-create', ), 'ftp' => '', 'language_key' => 'zh-CN', ), 'types' => array ( 0 => '待核实', 2 => '团队', 3 => '众包', 1 => '管理', 5 => 'ROOT', ), 'statuses' => array ( 0 => '未激活', 1 => '已激活', 2 => '已禁用', ), 'languages' => array ( 0 => '简体中文', 1 => 'English', ), 'language_keys' => array ( 0 => 'zh-CN', 1 => 'en', ), 'roles' => array ( 'root_manager' => 'ROOT管理', 'root_business' => 'ROOT商务', 'root_worker' => 'ROOT平台运营', 'root_produce_worker' => 'ROOT生产运营', ), 'qualification_status' => array ( 0 => '待审核', 1 => '人工通过', 2 => '未通过', 3 => '自动通过', ), 'settings' => array ( 'open_development' => '1', 'open_aimodel' => '0', 'open_collection' => '0', 'open_crowdsourcing' => '1', 'open_customer' => '0', 'open_external' => '0', 'open_ftp' => '1', 'open_image_label' => '1', 'open_audio_label' => '1', 'open_template_diy' => '1', 'open_text_label' => '1', 'open_video_label' => '1', 'site_logo' => '/images/logo_full.png', 'site_name' => '倍赛标注系统', 'site_favicon' => '/images/favicon.ico', 'open_audit_self' => '0', 'open_mustbe_verify_mobile' => '1', 'open_mobile' => '1', 'open_languages' => 'zh-CN,en', 'last_running_time' => '1573020365', 'site_name_crowdsourcing' => '荟萃众包任务平台', ), ), )
         */
    }

    /**
     * 用户操作记录
     * @return mixed
     */
    public function records()
    {
        $this->login();
        $params = [
            "user_id" => 38028,
            "limit" => 5,
            "page" => 1
            /**
             * 可选参数
            user_id	否	int	用户id
            keyword	否	String	关键字搜索
            orderby	否	String	排序字段
            sort	否	String	排序方式（正序或倒序）
            limit	否	int	每页展示数据量
            page	否	int	页数
            type	否	int	类型
             */
        ];
        return $this->saas->user->records($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'list' => array ( 0 => array ( 'id' => '24089', 'user_id' => '38028', 'type' => '3', 'ip' => '192.168.1.22', 'message' => '登录', 'created_by' => '38028', 'created_at' => '1576468666', 'updated_at' => '1576468666', 'operateUser' => array ( 'id' => '38028', 'nickname' => '刘建平', ), ), 1 => array ( 'id' => '24085', 'user_id' => '38028', 'type' => '3', 'ip' => '192.168.1.22', 'message' => '登录', 'created_by' => '38028', 'created_at' => '1576468487', 'updated_at' => '1576468487', 'operateUser' => array ( 'id' => '38028', 'nickname' => '刘建平', ), ), 2 => array ( 'id' => '24080', 'user_id' => '38028', 'type' => '3', 'ip' => '192.168.1.22', 'message' => '登录', 'created_by' => '38028', 'created_at' => '1576468222', 'updated_at' => '1576468222', 'operateUser' => array ( 'id' => '38028', 'nickname' => '刘建平', ), ), 3 => array ( 'id' => '24078', 'user_id' => '38028', 'type' => '3', 'ip' => '192.168.1.22', 'message' => '登录', 'created_by' => '38028', 'created_at' => '1576468203', 'updated_at' => '1576468203', 'operateUser' => array ( 'id' => '38028', 'nickname' => '刘建平', ), ), 4 => array ( 'id' => '24066', 'user_id' => '38028', 'type' => '3', 'ip' => '192.168.1.22', 'message' => '登录', 'created_by' => '38028', 'created_at' => '1576467633', 'updated_at' => '1576467633', 'operateUser' => array ( 'id' => '38028', 'nickname' => '刘建平', ), ), ), 'keyword' => '', 'orderby' => 'id', 'sort' => 'desc', 'count' => '35', 'dates' => array ( 0 => '1905', 1 => '1906', 2 => '1907', 3 => '1908', 4 => '1909', 5 => '1910', 6 => '1911', 7 => '1912', ), 'date' => '1912', 'types' => array ( 1 => '注册', 2 => '注册验证', 3 => '登录', 4 => '编辑', 5 => '删除', 6 => '修改密码', 7 => '修改邮箱', 8 => '修改手机号', 9 => '导入', 10 => '修改用户', 11 => '删除用户', 12 => '发送邮件成功', 13 => '发送邮件失败', 14 => '发送短信', 15 => '激活用户', ), ), )
         */
    }

    /**
     * 用户使用设备
     * @return mixed
     */
    public function devices()
    {
        $this->login();
        $params = [
            "user_id" => 38028,
            "limit" => 5,
            "page" => 1
            /**
             * 可选参数
            keyword	否	String	关键字搜索
            orderby	否	String	排序字段
            sort	否	String	排序方式（正序或倒序）
            limit	否	int	每页展示数据量
            page	否	int	页数
            device_name	否	string	设备名称
            app_key	否	string	app_key
            create_time_beg	否	int	创建开始时间戳
            create_time_end	否	int	创建结束时间戳
             */
        ];
        return $this->saas->user->devices($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'list' => array ( 0 => array ( 'id' => '706', 'user_id' => '38028', 'status' => '0', 'device_type' => '0', 'device_name' => 'Win32', 'device_number' => '666', 'device_token' => '', 'app_key' => 'pc-root', 'app_version' => '1.0.0', 'system_version' => '', 'access_token' => '', 'request_count' => '34', 'created_at' => '1575959073', 'updated_at' => '1576468855', ), ), 'keyword' => '', 'orderby' => 'id', 'sort' => 'desc', 'count' => '1', ), )
         */
    }

    /**
     * 众包注册
     * @return mixed
     */
    public function signupCrowdsourcing()
    {
        $params = [
            "password" => '123456',   //密码
            "type" => 3,                //固定值
            "mobileCode" => 112564,   //验证码
            "mobile" => '1xxxxxxxxxx', //手机号
            "op" => "",                //空 是注册， "sendMobile" 发送短信验证码
            "isAgreeProtocol" => true
        ];
        return $this->saas->user->signupCrowdsourcing($params);
        /**
         * 返回数据
         * {"error":"","message":"","data":{"mobile":"1xxxxxxxxxx"}}
         */
    }

    /**
     * 众包登录
     * 登录后续调用众包接口，不需要传access_token，SDK会自动带上
     * @return mixed
     */
    public function loginCrowdsourcing()
    {
        $params = [
            "username" => 'zhognbao1@126.com', //注册手机号或邮箱
            "password" => 'bf123456',
            "device_name" => 'Win32',
            "device_number" => '111',
            "app_key" => "pc-crowdsourcing",
            "app_version" => "1.0.0",
            "language" => 0
        ];
        return $this->saas->user->loginCrowdsourcing($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'id' => '38030', 'type' => '3', 'access_token' => 'aHd3TUZoakhUOFNlZkNQWFlkT2swb0VqUlBSWmFWOTh8fHwzODAzMHx8fDE5Mi4xNjguMS4yMnx8fDE1NzY0NjkyNzQ_c', ), )
         */
    }

    /**
     * 众包用户提交资质审核
     * @return mixed
     */
    public function submitQualification()
    {
        $this->loginCrowdsourcing();
        $params = [
            "user_id" => '38030',
            "id_card_no" => "53************61",
            "real_name" => "**然",
            "id_card_fornt" => "/user_idcard/38030/idcard_1576470907.png",
            "id_card_back" => "/user_idcard/38030/idcard-back_1576470910.png"
        ];
        return $this->saas->user->submitQualification($params);
        /**
         * 返回数据
         * {"error":"","message":"","data":"1"}
         */
    }

    /**
     * 用户审核资质列表
     * @return mixed
     */
    public function qualifications()
    {
        $this->login();
        $params = [
            "page" => 1
            /**
            可选参数
            keyword	string	false	用户名关键词
            orderby	string	false	排序字段
            sort	string	false	排序方式
            limit	int	    false	每页条数
            status	int	    false	审核状态。0.未审核。1.审核通过。2.审核未通过。3.自动通过
             */
        ];
        return $this->saas->user->qualifications($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'list' => array ( 0 => array ( 'user_id' => '38030', 'id_card_no' => '530121198903119561', 'real_name' => '伍欣然', 'id_card_fornt' => '/user_idcard/38030/idcard_1576470907.png', 'id_card_back' => '/user_idcard/38030/idcard-back_1576470910.png', 'operator_id' => '0', 'operated_at' => '0', 'status' => '3', 'refuse_reason' => '', 'created_at' => '1576470925', 'updated_at' => '0', 'user' => array ( 'id' => '38030', 'username' => '', 'email' => '', 'mobile' => '13532445678', 'phone' => '', 'auth_key' => '_8kIPVJoG5KHw7tKtOiOLcgiWuFTup84', 'password_hash' => '$2y$13$zTEdBW20RM8JunIt7IMRQ.FCTvMHgk8dGP0eq.1WL3rcaYgJFC7VK', 'payment_password' => '', 'access_token' => 'aHd3TUZoakhUOFNlZkNQWFlkT2swb0VqUlBSWmFWOTh8fHwzODAzMHx8fDE5Mi4xNjguMS4yMnx8fDE1NzY0NjkyNzQ_c', 'verify_token' => '', 'is_verify_email' => '0', 'is_verify_mobile' => '1', 'avatar' => '', 'type' => '3', 'status' => '1', 'nickname' => '131****9185', 'realname' => '伍欣然', 'company' => '', 'sex' => '0', 'city' => '', 'province' => '', 'country' => '', 'position' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '0', 'created_at' => '1576469273', 'updated_at' => '1576475813', ), 'id_card_fornt_url' => 'site/download-private-file?file=L3VzZXJfaWRjYXJkLzM4MDMwL2lkY2FyZF8xNTc2NDcwOTA3LnBuZw_c_c', 'id_card_back_url' => 'site/download-private-file?file=L3VzZXJfaWRjYXJkLzM4MDMwL2lkY2FyZC1iYWNrXzE1NzY0NzA5MTAucG5n', ), 1 => array ( 'user_id' => '36702', 'id_card_no' => '513436200011295308', 'real_name' => '众包七零二', 'id_card_fornt' => '/user_idcard/36702/n1_1575008195.jpg', 'id_card_back' => '/user_idcard/36702/n3_1575008197.jpg', 'operator_id' => '0', 'operated_at' => '0', 'status' => '3', 'refuse_reason' => '', 'created_at' => '1575008204', 'updated_at' => '0', 'user' => array ( 'id' => '36702', 'username' => '', 'email' => '', 'mobile' => '13717830579', 'phone' => '', 'auth_key' => 'oIvtOecoEtXWriPxUF-AIu8yIIKcb1qI', 'password_hash' => '$2y$13$7Gatkqr8Uw/JznpllJx4Ne/gpYREuLFcQ.roly/oU/8jd5ohWGUyK', 'payment_password' => '', 'access_token' => 'aXlOYzhSUHZvb2Z1emwycC02NVdDY1ZkZVVtTkxPNHN8fHwzNjcwMnx8fDEyNy4wLjAuMXx8fDE1NzU4Nzk0ODg_c', 'verify_token' => '', 'is_verify_email' => '0', 'is_verify_mobile' => '1', 'avatar' => '', 'type' => '3', 'status' => '1', 'nickname' => 'c众包36702', 'realname' => '众包七零二', 'company' => '', 'sex' => '2', 'city' => '', 'province' => '', 'country' => '', 'position' => '', 'language' => '0', 'created_from' => '3', 'created_by' => '0', 'created_at' => '1574739994', 'updated_at' => '1575894466', ), 'id_card_fornt_url' => 'site/download-private-file?file=L3VzZXJfaWRjYXJkLzM2NzAyL24xXzE1NzUwMDgxOTUuanBn', 'id_card_back_url' => 'site/download-private-file?file=L3VzZXJfaWRjYXJkLzM2NzAyL24zXzE1NzUwMDgxOTcuanBn', ), 2 => array ( 'user_id' => '32502', 'id_card_no' => '330781198509074838', 'real_name' => '沙箱庆余年', 'id_card_fornt' => '/user_idcard/32502/l01_1574831271.jpg', 'id_card_back' => '/user_idcard/32502/l02_1574831272.jpg', 'operator_id' => '32330', 'operated_at' => '1574831301', 'status' => '3', 'refuse_reason' => '111111111', 'created_at' => '1574831098', 'updated_at' => '1575008296', 'user' => array ( 'id' => '32502', 'username' => '', 'email' => 'cible01@cd.com', 'mobile' => '13700000001', 'phone' => '', 'auth_key' => 'v0MXQV5yZxnk3yL4DIELrNVkdYYQEdKS', 'password_hash' => '$2y$13$od/H6U0n7e6hJS2J/fNEEOV/p2wW7.EB7V0IDUPPWRAX8dBj9EsW2', 'payment_password' => '', 'access_token' => 'ZTFuZEFndFpQUHhzM3FfZVlqczdYZjFIVUkyZWwyd3F8fHwzMjUwMnx8fDE5Mi4xNjguMS4yN3x8fDE1NzQyNDgyMzk_c', 'verify_token' => '', 'is_verify_email' => '0', 'is_verify_mobile' => '1', 'avatar' => '', 'type' => '3', 'status' => '1', 'nickname' => 'cible01', 'realname' => '沙箱庆余年', 'company' => '', 'sex' => '0', 'city' => '', 'province' => '', 'country' => '', 'position' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '0', 'created_at' => '1574249144', 'updated_at' => '1575459991', ), 'id_card_fornt_url' => 'site/download-private-file?file=L3VzZXJfaWRjYXJkLzMyNTAyL2wwMV8xNTc0ODMxMjcxLmpwZw_c_c', 'id_card_back_url' => 'site/download-private-file?file=L3VzZXJfaWRjYXJkLzMyNTAyL2wwMl8xNTc0ODMxMjcyLmpwZw_c_c', ), ), 'keyword' => '', 'orderby' => 'created_at', 'sort' => 'desc', 'count' => '3', 'status' => array ( 0 => '待审核', 1 => '人工通过', 2 => '未通过', 3 => '自动通过', ), ), )
         */
    }

    /**
     * 用户审核资质更新
     * @return mixed
     */
    public function updateQualification()
    {
        $this->login();
        $params = [
            "user_id" => 38030,
            "status" => 3 //审核状态：0.未审核。1.审核通过。2.审核未通过。3.自动通过
            /**
             * 可选参数
            id_card_no	    string	false	用户身份证号
            refuse_reason	string	false	拒绝理由
             */
        ];
        return $this->saas->user->updateQualification($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'user_id' => '38028', ), )
         */
    }

    /**
     * 用户电子支付信息列表
     * @return mixed
     */
    public function epaies()
    {
        $this->login();
        $params = [
            "page" => 1,
            /**
             * 可选参数
            keyword	string	false	用户名关键词
            orderby	string	false	排序字段
            sort	string	false	排序方式
            limit	int	    false	每页条数
            status	int	    false	审核状态。0.未绑定。1.已绑定
            type	string	false	支付类型：0未知。1.支付宝。2.微信
             */
        ];
        return $this->saas->user->epaies($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'list' => array ( 0 => array ( 'id' => '27', 'user_id' => '38019', 'account' => '13711112222', 'real_name' => '测试', 'status' => '0', 'type' => '1', 'operator_id' => '32330', 'operated_at' => '1575009759', 'created_at' => '1575009636', 'updated_at' => '1575009636', ), 1 => array ( 'id' => '26', 'user_id' => '32502', 'account' => '791426617@qq.com', 'real_name' => '沙箱庆余年', 'status' => '1', 'type' => '1', 'operator_id' => '32502', 'operated_at' => '1575008393', 'created_at' => '1575008393', 'updated_at' => '1575008393', ), 2 => array ( 'id' => '17', 'user_id' => '38011', 'account' => '17600395460', 'real_name' => '丁东方', 'status' => '1', 'type' => '1', 'operator_id' => '38011', 'operated_at' => '1574674128', 'created_at' => '1574674128', 'updated_at' => '1574674128', ), 3 => array ( 'id' => '16', 'user_id' => '32640', 'account' => 'elmkor3450@sandbox.com', 'real_name' => '沙箱环境', 'status' => '1', 'type' => '1', 'operator_id' => '32640', 'operated_at' => '1574420590', 'created_at' => '1574420590', 'updated_at' => '1574420590', ), ), 'keyword' => '', 'orderby' => 'created_at', 'sort' => 'desc', 'count' => '4', ), )
         */
    }

    /**
     * 添加用户电子支付信息
     * @return mixed
     */
    public function createEpay()
    {
        $this->login();
        $params = [
            "user_id" => 38030,
            "type"  => 1, //支付类型：0未知。1.支付宝。2.微信
            "account" => "1xxxxxxxxxx",  //账号名
            "real_name" => "张三"      //真是姓名
        ];
        return $this->saas->user->createEpay($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => '1', )
         */
    }

    /**
     * 修改用户电子支付信息
     * @return mixed
     */
    public function updateEpay()
    {
        $this->login();
        $params = [
            "id" => 27,        //用户电子支付信息列表获取的 id
            "user_id"  => 38030, //用户ID
            /**
             * 可选参数
            real_name	string	false	真实姓名
            account	    string	false	账号名
            type	    string	false	支付类型：0未知。1.支付宝。2.微信
            status	    string	false	状态。0.未绑定。1.已绑定
             */
        ];
        return $this->saas->user->updateEpay($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'user_id' => '38028', ), )
         */
    }

    /**
     * 用户统计
     * @return mixed
     */
    public function stat()
    {
        $this->login();
        $params = [];
        return $this->saas->user->stat($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'new_message_count' => '4', 'notice' => '', ), )
         */
    }

    /**
     * 获取配置信息
     * @return mixed
     */
    public function publicConfig()
    {
        $this->login();
        $params = [];
        return $this->saas->user->publicConfig($params);
        /**
         * 返回数据
         *{
        "error": "",
        "message": "",
        "data": {
        "domainApi": "http://www.api.saas.com",
        "domainStatic": "http://devsaas.public.basicfinder.com",
        "home": {
        "categories": {
        "label": [
        {
        "id": "10",
        "name": "图片审核",
        "type": "0",
        "file_type": "0",
        "icon": "/images/category/icon-small/image-clean.png",
        "thumbnail": "/images/category/icon-big/image-clean.png"
        },
        {
        "id": "11",
        "name": "图片标注",
        "type": "0",
        "file_type": "0",
        "icon": "/images/category/icon-small/image-labelling.png",
        "thumbnail": "/images/category/icon-big/image-labelling.png"
        },
        {
        "id": "20",
        "name": "文本审核",
        "type": "0",
        "file_type": "2",
        "icon": "/images/category/icon-small/text-clean.png",
        "thumbnail": "/images/category/icon-big/text-clean.png"
        },
        {
        "id": "21",
        "name": "文本标注",
        "type": "0",
        "file_type": "2",
        "icon": "/images/category/icon-small/text-labelling.png",
        "thumbnail": "/images/category/icon-big/text-labelling.png"
        },
        {
        "id": "30",
        "name": "语音审核",
        "type": "0",
        "file_type": "1",
        "icon": "/images/category/icon-small/audio-clean.png",
        "thumbnail": "/images/category/icon-big/audio-clean.png"
        },
        {
        "id": "31",
        "name": "语音分割",
        "type": "0",
        "file_type": "1",
        "icon": "/images/category/icon-small/audio-labelling.png",
        "thumbnail": "/images/category/icon-big/audio-labelling.png"
        },
        {
        "id": "40",
        "name": "视频审核",
        "type": "0",
        "file_type": "3",
        "icon": "/images/category/icon-small/video-clean.png",
        "thumbnail": "/images/category/icon-big/video-clean.png"
        },
        {
        "id": "41",
        "name": "跟踪标注",
        "type": "0",
        "file_type": "3",
        "icon": "/images/category/icon-small/video-labelling.png",
        "thumbnail": "/images/category/icon-big/video-labelling.png"
        },
        {
        "id": "50",
        "name": "点云标注",
        "type": "0",
        "file_type": "4",
        "icon": "/images/category/icon-small/3d.png",
        "thumbnail": "/images/category/icon-big/3d.png"
        },
        {
        "id": "196",
        "name": "点云分割",
        "type": "0",
        "file_type": "4",
        "icon": "/images/category/icon-small/pointcloud-segment.png",
        "thumbnail": "/images/category/icon-big/pointcloud-segment.png"
        },
        {
        "id": "199",
        "name": "视频分割",
        "type": "0",
        "file_type": "3",
        "icon": "/images/category/icon-small/video-segmentation.png",
        "thumbnail": "/images/category/icon-big/video-segmentation.png"
        },
        {
        "id": "201",
        "name": "点云追踪",
        "type": "0",
        "file_type": "4",
        "icon": "/images/category/icon-small/pointcloud-tracking.png",
        "thumbnail": "/images/category/icon-big/pointcloud-tracking.png"
        },
        {
        "id": "204",
        "name": "视频标注",
        "type": "0",
        "file_type": "3",
        "icon": "/images/category/icon-small/icon-default-image@2x.png",
        "thumbnail": "/images/category/icon-big/icon-default-image@2x.png"
        }
        ],
        "collection": [
        {
        "id": "205",
        "name": "图片采集",
        "type": "1",
        "file_type": "0",
        "icon": "/images/category/icon-small/icon-default-image@2x.png",
        "thumbnail": "/images/category/icon-big/icon-default-image@2x.png"
        },
        {
        "id": "206",
        "name": "音频采集",
        "type": "1",
        "file_type": "1",
        "icon": "/upload/2019/12/10/5def40dba9f80_1575960795.png",
        "thumbnail": "/upload/2019/12/10/5def40e86b41c_1575960808.png"
        }
        ]
        }
        }
        }
        }
         */
    }

    /**
     * 用户注册
     * @return mixed
     */
    public function create()
    {
        $params = [
            "email" => "12345e@qq.com",
            "password" => 'bf123456',
            "roles" => 'team_worker',
            "type" => 2,
            "site_id" => 363,
            "team_id" => 1421
            /**
             *  参数	是否必须	    类型	说明
                email	是	        string	邮箱，唯一	=
            password	是	        string	密码，由数字和字母组成
            roles	    是	        string	角色,多个以逗号(,)隔开
            type	    是	        int	    用户平台类型
            status	    否	        int	    用户状态,0:未激活(默认),1:已激活,2:已禁用
            avatar	    否	        string	头像
            site_id	    否	        int	    租户id
            phone	    否	        string	手机号或电话，必须为5-20位
            nickname	否	        string	用户昵称，由字母、汉字、数字和点组成，2-16位
             */
        ];
        return $this->saas->user->create($params);
        /**
         * 返回结果
         *array ( 'data' => array ( 'user_id' => '38043', ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 用户列表
     * @return mixed
     */
    public function users()
    {
        $params = [
            /**
             * 可选参数
             * keyword	    否	String	关键字搜索（检索"id，昵称，邮箱"三个字段）
            status	        否	int	    用户状态
            orderby	        否	String	排序字段
            sort	        否	String	排序方式（正序或倒序）
            limit	        否	int	    每页展示数据量
            page	        否	int	    页数
            type	        否	int	    平台类型
            site_id	        否	int	    租户id
            role_id	        否	string	角色
            user_id	        否	int	    用户id
            nick_name	    否	string	昵称，模糊查询
            email	        否	string	邮箱
            create_time_beg	否	int	    创建时间的开始时间戳
            create_time_end	否	int	    创建时间的结束时间戳
             */
        ];
        return $this->saas->user->users($params);
        /**
         * 返回结果
         * array ( 'data' => array ( 'keyword' => '', 'status' => '', 'orderby' => 'id', 'sort' => 'desc', 'count' => '8946', 'list' => array ( 0 => array ( 'id' => '38043', 'nickname' => '', 'email' => '12345e@qq.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '2', 'status' => '0', 'access_token' => '', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '38028', 'created_at' => '1577177059', 'teamUser' => array ( 'id' => '13186', 'team_id' => '1421', 'team_group_id' => '0', 'user_id' => '38043', 'created_by' => '0', 'group' => '', ), 'team' => array ( 'id' => '1421', 'name' => '测试团队-1-update', 'logo' => '', 'status' => '1', ), 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'team_worker', 'user_id' => '38043', 'created_at' => '1577177060', ), ), 'siteUser' => array ( 'id' => '16773', 'site_id' => '363', 'user_id' => '38043', 'created_by' => '0', ), 'site' => array ( 'id' => '363', 'name' => 'test-rent', 'logo' => '/upload/2019/12/16/5df73e5c68218_1576484444.jpg', 'team_count_limit' => '7', 'status' => '1', ), ), 1 => array ( 'id' => '38042', 'nickname' => 'new-user', 'email' => '123231@qq.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '2', 'status' => '1', 'access_token' => '', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '38028', 'created_at' => '1577176620', 'teamUser' => array ( 'id' => '13185', 'team_id' => '1421', 'team_group_id' => '0', 'user_id' => '38042', 'created_by' => '0', 'group' => '', ), 'team' => array ( 'id' => '1421', 'name' => '测试团队-1-update', 'logo' => '', 'status' => '1', ), 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'team_worker', 'user_id' => '38042', 'created_at' => '1577176621', ), ), 'siteUser' => array ( 'id' => '16772', 'site_id' => '363', 'user_id' => '38042', 'created_by' => '0', ), 'site' => array ( 'id' => '363', 'name' => 'test-rent', 'logo' => '/upload/2019/12/16/5df73e5c68218_1576484444.jpg', 'team_count_limit' => '7', 'status' => '1', ), ), 2 => array ( 'id' => '38041', 'nickname' => 'zuoyeyuan-work', 'email' => 'zuoyeyuan@126.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '2', 'status' => '1', 'access_token' => 'UEVWVGVXYVJpRkdfRV9aMHhOY01TY3p4RF9LajBLQkF8fHwzODA0MXx8fDE5Mi4xNjguMS4yMnx8fDE1NzY4MzgwNjY_c', 'company' => '', 'language' => '0', 'created_from' => '5', 'created_by' => '0', 'created_at' => '1576750508', 'teamUser' => array ( 'id' => '13184', 'team_id' => '1421', 'team_group_id' => '0', 'user_id' => '38041', 'created_by' => '0', 'group' => '', ), 'team' => array ( 'id' => '1421', 'name' => '测试团队-1-update', 'logo' => '', 'status' => '1', ), 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'team_worker', 'user_id' => '38041', 'created_at' => '1577074387', ), ), 'siteUser' => array ( 'id' => '16771', 'site_id' => '363', 'user_id' => '38041', 'created_by' => '0', ), 'site' => array ( 'id' => '363', 'name' => 'test-rent', 'logo' => '/upload/2019/12/16/5df73e5c68218_1576484444.jpg', 'team_count_limit' => '7', 'status' => '1', ), ), 3 => array ( 'id' => '38040', 'nickname' => '张美娜root', 'email' => 'zhangmeina@root.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '5', 'status' => '1', 'access_token' => 'MUpLME5reWx1Ri1xYXR1dzhNYll0cC0waDNVcTdUS1R8fHwzODA0MHx8fDE5Mi4xNjguMS4xMTJ8fHwxNTc2NzI5NTg5', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '14171', 'created_at' => '1576729555', 'teamUser' => '', 'team' => '', 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'root_business', 'user_id' => '38040', 'created_at' => '1576729556', ), 1 => array ( 'item_name' => 'root_manager', 'user_id' => '38040', 'created_at' => '1576729556', ), 2 => array ( 'item_name' => 'root_produce_worker', 'user_id' => '38040', 'created_at' => '1576729556', ), 3 => array ( 'item_name' => 'root_worker', 'user_id' => '38040', 'created_at' => '1576729556', ), ), 'siteUser' => '', 'site' => '', ), 4 => array ( 'id' => '38039', 'nickname' => '张美娜作业员1', 'email' => 'zhangmeina@team.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '2', 'status' => '1', 'access_token' => 'Yy1kWEdHeExVRDdsNGhCVTNlMkM2bGdQOVJPdDNGMV98fHwzODAzOXx8fDE5Mi4xNjguMS4xNDZ8fHwxNTc2NzI5MTc4', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '14171', 'created_at' => '1576728904', 'teamUser' => array ( 'id' => '13183', 'team_id' => '1423', 'team_group_id' => '0', 'user_id' => '38039', 'created_by' => '0', 'group' => '', ), 'team' => array ( 'id' => '1423', 'name' => '张美娜团队1', 'logo' => '', 'status' => '1', ), 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'team_manager', 'user_id' => '38039', 'created_at' => '1576728905', ), 1 => array ( 'item_name' => 'team_worker', 'user_id' => '38039', 'created_at' => '1576728905', ), ), 'siteUser' => array ( 'id' => '16770', 'site_id' => '365', 'user_id' => '38039', 'created_by' => '0', ), 'site' => array ( 'id' => '365', 'name' => '张美娜', 'logo' => '', 'team_count_limit' => '3', 'status' => '1', ), ), 5 => array ( 'id' => '38038', 'nickname' => '张美娜', 'email' => 'zhangmeina@admin.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '1', 'status' => '1', 'access_token' => 'WGpiMDVzQVRYbkhqN0ZseEhhcFVtdUIwZlh6Sms3ZGV8fHwzODAzOHx8fDE5Mi4xNjguMS4xNDZ8fHwxNTc2NzI4NzI3', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '14171', 'created_at' => '1576728484', 'teamUser' => '', 'team' => '', 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'admin_business', 'user_id' => '38038', 'created_at' => '1576728682', ), 1 => array ( 'item_name' => 'admin_manager', 'user_id' => '38038', 'created_at' => '1576728682', ), 2 => array ( 'item_name' => 'admin_worker', 'user_id' => '38038', 'created_at' => '1576728682', ), ), 'siteUser' => array ( 'id' => '16769', 'site_id' => '365', 'user_id' => '38038', 'created_by' => '0', ), 'site' => array ( 'id' => '365', 'name' => '张美娜', 'logo' => '', 'team_count_limit' => '3', 'status' => '1', ), ), 6 => array ( 'id' => '38037', 'nickname' => '12123123123', 'email' => '4t74161y@11.com', 'mobile' => '', 'phone' => '123456123', 'avatar' => '', 'type' => '1', 'status' => '0', 'access_token' => '', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '14171', 'created_at' => '1576728401', 'teamUser' => '', 'team' => '', 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'admin_business', 'user_id' => '38037', 'created_at' => '1576728401', ), 1 => array ( 'item_name' => 'admin_manager', 'user_id' => '38037', 'created_at' => '1576728401', ), 2 => array ( 'item_name' => 'admin_worker', 'user_id' => '38037', 'created_at' => '1576728401', ), ), 'siteUser' => array ( 'id' => '16768', 'site_id' => '364', 'user_id' => '38037', 'created_by' => '0', ), 'site' => array ( 'id' => '364', 'name' => '123123123', 'logo' => '/upload/2019/12/19/5dfaf604f2d58_1576728068.jpg', 'team_count_limit' => '3', 'status' => '4', ), ), 7 => array ( 'id' => '38036', 'nickname' => 'liujianping', 'email' => 'liujianping@basicfinder.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '3', 'status' => '1', 'access_token' => 'SVlSN3YtUnJYSlI1OFJxcXA2RlVKR096ZXpoTXp4U0p8fHwzODAzNnx8fDE5Mi4xNjguMS4yMnx8fDE1NzY3MjUyMjE_c', 'company' => '', 'language' => '0', 'created_from' => '4', 'created_by' => '0', 'created_at' => '1576725220', 'teamUser' => '', 'team' => '', 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'crowdsourcing_worker', 'user_id' => '38036', 'created_at' => '1576725220', ), ), 'siteUser' => '', 'site' => '', ), 8 => array ( 'id' => '38035', 'nickname' => '企业用户002', 'email' => 'test002@admin.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '1', 'status' => '1', 'access_token' => '', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '32330', 'created_at' => '1576565969', 'teamUser' => '', 'team' => '', 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'admin_business', 'user_id' => '38035', 'created_at' => '1576565971', ), ), 'siteUser' => array ( 'id' => '16767', 'site_id' => '266', 'user_id' => '38035', 'created_by' => '0', ), 'site' => array ( 'id' => '266', 'name' => 'cible测试租户-测试环境', 'logo' => '', 'team_count_limit' => '99', 'status' => '1', ), ), 9 => array ( 'id' => '38034', 'nickname' => '企业用户001', 'email' => 'test001@admin.com', 'mobile' => '', 'phone' => '', 'avatar' => '', 'type' => '1', 'status' => '1', 'access_token' => '', 'company' => '', 'language' => '0', 'created_from' => '0', 'created_by' => '32330', 'created_at' => '1576565933', 'teamUser' => '', 'team' => '', 'crowdsourcingUser' => '', 'crowdsourcing' => '', 'roles' => array ( 0 => array ( 'item_name' => 'admin_worker', 'user_id' => '38034', 'created_at' => '1576565934', ), ), 'siteUser' => array ( 'id' => '16766', 'site_id' => '266', 'user_id' => '38034', 'created_by' => '0', ), 'site' => array ( 'id' => '266', 'name' => 'cible测试租户-测试环境', 'logo' => '', 'team_count_limit' => '99', 'status' => '1', ), ), ), 'types' => array ( 0 => '待核实', 2 => '团队', 3 => '众包', 1 => '管理', 5 => 'ROOT', ), 'statuses' => array ( 0 => '未激活', 1 => '已激活', 2 => '已禁用', ), 'roles' => array ( 'guest' => '访客', 'customer_manager' => '客户管理员', 'customer_worker' => '客户操作员', 'team_worker' => '团队作业员', 'team_manager' => '团队管理员', 'crowdsourcing_worker' => '众包作业员', 'crowdsourcing_manager' => '众包管理员', 'admin_worker' => '租户运营', 'admin_manager' => '管理员', 'admin_business' => '租户商务', 'root_manager' => 'ROOT管理', 'root_business' => 'ROOT商务', 'root_worker' => 'ROOT平台运营', 'root_produce_worker' => 'ROOT生产运营', ), ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 用户表单
     * @return mixed
     */
    public function form()
    {
        $params = [];
        return $this->saas->user->form($params);
        /**
         * 返回结果
         *{
        "error": "",
        "message": "",
        "data": {
        "statuses": [
        "未激活",
        "已激活",
        "已禁用"
        ],
        "languages": [
        "简体中文",
        "English"
        ],
        "types": {
        "2": "团队",
        "3": "众包",
        "1": "管理",
        "5": "ROOT"
        },
        "sites": [{
        "id": "384",
        "name": "lyp的工作室",
        "type": "0",
        "logo": "/upload/2019/12/17/5df8a23caaf2b_1576575548.png",
        "status": "1",
        "quick_login": "0",
        "start_time": "1576454400",
        "end_time": "1711843200",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "联系人lyp",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32332",
        "created_at": "1576575550",
        "updated_at": "1576649816",
        "teams": [{
        "id": "1422",
        "site_id": "384",
        "name": "lyp的小分队",
        "logo": ""
        }]
        },
        {
        "id": "383",
        "name": "ceshi1",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1576454400",
        "end_time": "1577750400",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "ceshi",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "14045",
        "created_at": "1576476391",
        "updated_at": "1576476391",
        "teams": []
        },
        {
        "id": "382",
        "name": "测试租户创建者",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1576454400",
        "end_time": "1577750400",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "13111111111",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "38036",
        "created_at": "1576471455",
        "updated_at": "1576471455",
        "teams": []
        },
        {
        "id": "358",
        "name": "qweqweqw",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1574812800",
        "end_time": "1577404800",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "1233423",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "38012",
        "created_at": "1574820832",
        "updated_at": "1574820832",
        "teams": []
        },
        {
        "id": "357",
        "name": "客户端组",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1573488000",
        "end_time": "1698940800",
        "team_count_limit": "100",
        "user_count_limit": "1000",
        "data_count_limit": "100",
        "disk_space_limit": "100",
        "team_user_count_limit": "100",
        "contact_username": "renconghui",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32624",
        "created_at": "1573548770",
        "updated_at": "1573548770",
        "teams": [{
        "id": "1415",
        "site_id": "357",
        "name": "客户端团队",
        "logo": ""
        }]
        },
        {
        "id": "348",
        "name": "chaolu1",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1572796800",
        "end_time": "1576771200",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "chaolu",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32596",
        "created_at": "1572863348",
        "updated_at": "1572863348",
        "teams": [{
        "id": "1418",
        "site_id": "348",
        "name": "chao_zhongbao",
        "logo": ""
        }]
        },
        {
        "id": "344",
        "name": "saas标注众包-test-ddf",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1572278400",
        "end_time": "1759593600",
        "team_count_limit": "15",
        "user_count_limit": "1000",
        "data_count_limit": "1000000",
        "disk_space_limit": "10000",
        "team_user_count_limit": "1000",
        "contact_username": "dingdongfang",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32576",
        "created_at": "1572321274",
        "updated_at": "1574149515",
        "teams": []
        },
        {
        "id": "343",
        "name": "chaolu_en",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1572192000",
        "end_time": "1603728000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "cl",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32566",
        "created_at": "1572242456",
        "updated_at": "1572247837",
        "teams": [{
        "id": "1412",
        "site_id": "343",
        "name": "No.1",
        "logo": "/upload/2019/11/04/5dbfed0d4cdb0_1572859149.jpg"
        },
        {
        "id": "1413",
        "site_id": "343",
        "name": "No.2",
        "logo": "/upload/2019/11/04/5dbfc589d82ee_1572849033.png"
        }
        ]
        },
        {
        "id": "342",
        "name": "zhangnan",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1571846400",
        "end_time": "1665158400",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zhangna",
        "contact_phone": "+16-8546452",
        "contact_email": "zhanf1@adf.com",
        "customer_id": "164",
        "created_by": "32560",
        "created_at": "1571903842",
        "updated_at": "1571903906",
        "teams": []
        },
        {
        "id": "341",
        "name": "123123123123123",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1571846400",
        "end_time": "1665072000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "123123123",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32559",
        "created_at": "1571903462",
        "updated_at": "1571903972",
        "teams": []
        },
        {
        "id": "328",
        "name": "cdhwei21839@chacuo.net",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1571587200",
        "end_time": "1603123200",
        "team_count_limit": "0",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "测试12345",
        "contact_phone": "15621215252",
        "contact_email": "cdhwei21839@chacuo.net",
        "customer_id": "162",
        "created_by": "32530",
        "created_at": "1571641460",
        "updated_at": "1571641460",
        "teams": []
        },
        {
        "id": "327",
        "name": "ffff",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1571241600",
        "end_time": "1603123199",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "ffff",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32512",
        "created_at": "1571285572",
        "updated_at": "1571286143",
        "teams": []
        },
        {
        "id": "325",
        "name": "测试租户cible001",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1571155200",
        "end_time": "2046182399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "cible001",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32511",
        "created_at": "1571285544",
        "updated_at": "1571291478",
        "teams": []
        },
        {
        "id": "323",
        "name": "李昊测试",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1571155200",
        "end_time": "1602950399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "233",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32510",
        "created_at": "1571221852",
        "updated_at": "1571221852",
        "teams": [{
        "id": "1405",
        "site_id": "323",
        "name": "重名团队2",
        "logo": ""
        }]
        },
        {
        "id": "321",
        "name": "chaolu_tenant",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1569859200",
        "end_time": "1604332799",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "chaolu",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32503",
        "created_at": "1571033755",
        "updated_at": "1571033755",
        "teams": [{
        "id": "1407",
        "site_id": "321",
        "name": "q1",
        "logo": ""
        },
        {
        "id": "1408",
        "site_id": "321",
        "name": "q2",
        "logo": ""
        },
        {
        "id": "1411",
        "site_id": "321",
        "name": "q3",
        "logo": ""
        }
        ]
        },
        {
        "id": "319",
        "name": "Kate",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1570723200",
        "end_time": "1602691199",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "21",
        "contact_username": "Kate",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32499",
        "created_at": "1570775441",
        "updated_at": "1570870802",
        "teams": [{
        "id": "1401",
        "site_id": "319",
        "name": "Kate",
        "logo": ""
        }]
        },
        {
        "id": "309",
        "name": "lihaotest",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1568044800",
        "end_time": "1600617599",
        "team_count_limit": "3",
        "user_count_limit": "2",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "lihao",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32442",
        "created_at": "1568084095",
        "updated_at": "1570674519",
        "teams": []
        },
        {
        "id": "306",
        "name": "测试新租户",
        "type": "0",
        "logo": "/upload/2019/09/17/5d80af221a2f0_1568714530.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1567699200",
        "end_time": "1758124799",
        "team_count_limit": "0",
        "user_count_limit": "2",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "1",
        "contact_username": "丁东方新租户测试",
        "contact_phone": "131313131313131313",
        "contact_email": "3435989898@yopmail.com",
        "customer_id": "183",
        "created_by": "32434",
        "created_at": "1567740088",
        "updated_at": "1569740384",
        "teams": []
        },
        {
        "id": "303",
        "name": "租户--状态",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1567008000",
        "end_time": "1598976000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "租户--状态",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32429",
        "created_at": "1567058224",
        "updated_at": "1572838235",
        "teams": [{
        "id": "1389",
        "site_id": "303",
        "name": "团队--状态",
        "logo": ""
        },
        {
        "id": "1406",
        "site_id": "303",
        "name": "手机号验证",
        "logo": ""
        }
        ]
        },
        {
        "id": "302",
        "name": "test租户",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1566921600",
        "end_time": "1597507199",
        "team_count_limit": "5",
        "user_count_limit": "1000",
        "data_count_limit": "1000",
        "disk_space_limit": "1024",
        "team_user_count_limit": "20",
        "contact_username": "test测试联系人",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32426",
        "created_at": "1566982317",
        "updated_at": "1571128571",
        "teams": [{
        "id": "1388",
        "site_id": "302",
        "name": "test-team",
        "logo": "/upload/2019/10/08/5d9c084e1dc36_1570506830.jpg"
        },
        {
        "id": "1390",
        "site_id": "302",
        "name": "test1",
        "logo": ""
        }
        ]
        },
        {
        "id": "300",
        "name": "test_zh_yizhe",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1566835200",
        "end_time": "1598716799",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "gly",
        "contact_phone": "",
        "contact_email": "gly@admin.com",
        "customer_id": "0",
        "created_by": "32421",
        "created_at": "1566893146",
        "updated_at": "1566893398",
        "teams": [{
        "id": "1386",
        "site_id": "300",
        "name": "team_yizhe",
        "logo": ""
        }]
        },
        {
        "id": "294",
        "name": "root租户2",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1566489600",
        "end_time": "1598284799",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "root租户2",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32410",
        "created_at": "1566526606",
        "updated_at": "1566526606",
        "teams": [{
        "id": "1382",
        "site_id": "294",
        "name": "root团队2",
        "logo": ""
        }]
        },
        {
        "id": "292",
        "name": "租户2次",
        "type": "0",
        "logo": "/upload/2019/08/22/5d5e73239d581_1566470947.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1566403200",
        "end_time": "1599407999",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "租户2次",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32405",
        "created_at": "1566471029",
        "updated_at": "1569740216",
        "teams": [{
        "id": "1380",
        "site_id": "292",
        "name": "租户团队2次",
        "logo": ""
        }]
        },
        {
        "id": "289",
        "name": "测试租户2018",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1566403200",
        "end_time": "1599062399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "测试租户2018",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32397",
        "created_at": "1566464278",
        "updated_at": "1566464278",
        "teams": []
        },
        {
        "id": "283",
        "name": "测试租户2019",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1566403200",
        "end_time": "1630684799",
        "team_count_limit": "100",
        "user_count_limit": "1000",
        "data_count_limit": "1212",
        "disk_space_limit": "1212",
        "team_user_count_limit": "200",
        "contact_username": "测试租户2019",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32393",
        "created_at": "1566461160",
        "updated_at": "1566461224",
        "teams": [{
        "id": "1376",
        "site_id": "283",
        "name": "we are  团队",
        "logo": ""
        }]
        },
        {
        "id": "278",
        "name": "前端--常凯-租户",
        "type": "0",
        "logo": "/upload/2019/11/26/5ddced4d1f9e3_1574759757.jpg",
        "status": "1",
        "quick_login": "1",
        "start_time": "1566086400",
        "end_time": "1785801600",
        "team_count_limit": "100",
        "user_count_limit": "10000",
        "data_count_limit": "1000000",
        "disk_space_limit": "10000",
        "team_user_count_limit": "200",
        "contact_username": "CK--租户",
        "contact_phone": "18562122962",
        "contact_email": "changkai@basicfinder.com",
        "customer_id": "181",
        "created_by": "32379",
        "created_at": "1566196679",
        "updated_at": "1575944353",
        "teams": [{
        "id": "1375",
        "site_id": "278",
        "name": "常凯团队",
        "logo": "/upload/2019/08/21/5d5d1c64c2607_1566383204.png"
        },
        {
        "id": "1372",
        "site_id": "278",
        "name": "CK团队",
        "logo": "/upload/2019/12/14/5df498f7c231c_1576311031.png"
        }
        ]
        },
        {
        "id": "277",
        "name": "银河系",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1566057600",
        "end_time": "1598111999",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "yizhe",
        "contact_phone": "12345678901",
        "contact_email": "jinyizhe@admin.com",
        "customer_id": "176",
        "created_by": "32378",
        "created_at": "1566183304",
        "updated_at": "1566183950",
        "teams": [{
        "id": "1371",
        "site_id": "277",
        "name": "地球",
        "logo": "/upload/2019/08/19/5d5a129b1f761_1566184091.jpg"
        },
        {
        "id": "1373",
        "site_id": "277",
        "name": "火星",
        "logo": "/upload/2019/08/19/5d5a508960ace_1566199945.jpg"
        }
        ]
        },
        {
        "id": "274",
        "name": "beisai",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1565539200",
        "end_time": "1691942399",
        "team_count_limit": "100",
        "user_count_limit": "10000",
        "data_count_limit": "1000000",
        "disk_space_limit": "10000",
        "team_user_count_limit": "200",
        "contact_username": "丁东方",
        "contact_phone": "17600353535",
        "contact_email": "343593362@yopmail.com",
        "customer_id": "180",
        "created_by": "32370",
        "created_at": "1565665791",
        "updated_at": "1565665791",
        "teams": [{
        "id": "1368",
        "site_id": "274",
        "name": "测试团队1",
        "logo": ""
        }]
        },
        {
        "id": "273",
        "name": "倍赛",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1565539200",
        "end_time": "1628438399",
        "team_count_limit": "100",
        "user_count_limit": "1000",
        "data_count_limit": "1000000",
        "disk_space_limit": "10000",
        "team_user_count_limit": "200",
        "contact_username": "丁东方",
        "contact_phone": "17600395461",
        "contact_email": "bleqcd17506@chacuo.net",
        "customer_id": "179",
        "created_by": "32369",
        "created_at": "1565665580",
        "updated_at": "1565665580",
        "teams": []
        },
        {
        "id": "270",
        "name": "yongshi",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1563897600",
        "end_time": "1894032000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "yongshi",
        "contact_phone": "13111111111",
        "contact_email": "test1@test.com",
        "customer_id": "178",
        "created_by": "32346",
        "created_at": "1563940859",
        "updated_at": "1571976860",
        "teams": [{
        "id": "1366",
        "site_id": "270",
        "name": "yongshi_team",
        "logo": ""
        }]
        },
        {
        "id": "269",
        "name": "lqp",
        "type": "0",
        "logo": "/upload/2019/12/10/5def75bad85cc_1575974330.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1563753600",
        "end_time": "1866585600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "lqp",
        "contact_phone": "13400000001",
        "contact_email": "lqp@admin.com",
        "customer_id": "0",
        "created_by": "32333",
        "created_at": "1563779242",
        "updated_at": "1575974357",
        "teams": [{
        "id": "1360",
        "site_id": "269",
        "name": "307工作室",
        "logo": "/upload/2019/07/22/5d35654acc022_1563780426.png"
        }]
        },
        {
        "id": "266",
        "name": "cible测试租户-测试环境",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1567296000",
        "end_time": "1862352000",
        "team_count_limit": "99",
        "user_count_limit": "10000",
        "data_count_limit": "1000000",
        "disk_space_limit": "10000",
        "team_user_count_limit": "200",
        "contact_username": "cibleAdmin001",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32328",
        "created_at": "1563435759",
        "updated_at": "1576570642",
        "teams": [{
        "id": "1374",
        "site_id": "266",
        "name": "cible测试团队",
        "logo": ""
        },
        {
        "id": "1385",
        "site_id": "266",
        "name": "cible测试团队02",
        "logo": ""
        }
        ]
        },
        {
        "id": "257",
        "name": "rina",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1563379200",
        "end_time": "1594915200",
        "team_count_limit": "9",
        "user_count_limit": "1000",
        "data_count_limit": "9",
        "disk_space_limit": "9",
        "team_user_count_limit": "20",
        "contact_username": "rina",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "32325",
        "created_at": "1563418980",
        "updated_at": "1563418980",
        "teams": [{
        "id": "1359",
        "site_id": "257",
        "name": "rinateam",
        "logo": "/upload/2019/07/30/5d3ffa443b387_1564473924.jpg"
        },
        {
        "id": "1369",
        "site_id": "257",
        "name": "Nanateam",
        "logo": ""
        }
        ]
        },
        {
        "id": "256",
        "name": "zhoumin",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1562774400",
        "end_time": "1581264000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zhoumin",
        "contact_phone": "",
        "contact_email": "zhoumin@admin.com",
        "customer_id": "0",
        "created_by": "32282",
        "created_at": "1562837216",
        "updated_at": "1562837364",
        "teams": [{
        "id": "1334",
        "site_id": "256",
        "name": "zhoumin",
        "logo": ""
        }]
        },
        {
        "id": "247",
        "name": "UI测试",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1560268800",
        "end_time": "1591804800",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "UI",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "14612",
        "created_at": "1560325345",
        "updated_at": "1560325345",
        "teams": [{
        "id": "1326",
        "site_id": "247",
        "name": "UI测试",
        "logo": ""
        }]
        },
        {
        "id": "245",
        "name": "shaozhiming",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1560096000",
        "end_time": "1591632000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "志明",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "14607",
        "created_at": "1560138630",
        "updated_at": "1560138630",
        "teams": [{
        "id": "1402",
        "site_id": "245",
        "name": "志明团队11",
        "logo": ""
        }]
        },
        {
        "id": "242",
        "name": "fnhz9ki1s@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559577600",
        "end_time": "1591113600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "basic ai",
        "contact_phone": "18301660961",
        "contact_email": "fnhz9kis@bccto.me",
        "customer_id": "151",
        "created_by": "14602",
        "created_at": "1559616833",
        "updated_at": "1559616833",
        "teams": []
        },
        {
        "id": "239",
        "name": "9bheq0gy@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559491200",
        "end_time": "1591027200",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zhenjie zhenjie",
        "contact_phone": "12311122",
        "contact_email": "9bheq0gy@bccto.me",
        "customer_id": "149",
        "created_by": "14600",
        "created_at": "1559553990",
        "updated_at": "1559553990",
        "teams": []
        },
        {
        "id": "237",
        "name": "9al0jq0j@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559491200",
        "end_time": "1591027200",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "9al0jq0j@bccto.me",
        "contact_phone": "12312312311",
        "contact_email": "9al0jq0j@bccto.me",
        "customer_id": "143",
        "created_by": "14599",
        "created_at": "1559538096",
        "updated_at": "1559538096",
        "teams": [{
        "id": "1324",
        "site_id": "237",
        "name": "worker1",
        "logo": ""
        }]
        },
        {
        "id": "236",
        "name": "0c3cklgp@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559491200",
        "end_time": "1591027200",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "0c3cklgp@bccto.me",
        "contact_phone": "123123123",
        "contact_email": "0c3cklgp@bccto.me",
        "customer_id": "142",
        "created_by": "14598",
        "created_at": "1559537855",
        "updated_at": "1559537855",
        "teams": []
        },
        {
        "id": "235",
        "name": "0c3cklgp@mail.bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559491200",
        "end_time": "1591027200",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "0c3cklgp@mail.bccto.me",
        "contact_phone": "1232221123",
        "contact_email": "0c3cklgp@mail.bccto.me",
        "customer_id": "141",
        "created_by": "14597",
        "created_at": "1559537713",
        "updated_at": "1559537713",
        "teams": []
        },
        {
        "id": "234",
        "name": "935xcws8@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559491200",
        "end_time": "1591027200",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "935xcws8@bccto.me",
        "contact_phone": "1231123123",
        "contact_email": "935xcws8@bccto.me",
        "customer_id": "140",
        "created_by": "14596",
        "created_at": "1559535777",
        "updated_at": "1559535777",
        "teams": []
        },
        {
        "id": "233",
        "name": "zc0szngk@mail.bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559318400",
        "end_time": "1590854400",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zc0szngk@mail.bccto.me",
        "contact_phone": "12341234",
        "contact_email": "zc0szngk@mail.bccto.me",
        "customer_id": "139",
        "created_by": "14595",
        "created_at": "1559359484",
        "updated_at": "1559359484",
        "teams": []
        },
        {
        "id": "232",
        "name": "9l1knc60@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "9l1knc60@bccto.me",
        "contact_phone": "123123",
        "contact_email": "9l1knc60@bccto.me",
        "customer_id": "125",
        "created_by": "14594",
        "created_at": "1559300723",
        "updated_at": "1559300723",
        "teams": []
        },
        {
        "id": "231",
        "name": "wq921xja@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "wq921xja@bccto.me",
        "contact_phone": "123123",
        "contact_email": "wq921xja@bccto.me",
        "customer_id": "121",
        "created_by": "14593",
        "created_at": "1559294060",
        "updated_at": "1559294060",
        "teams": []
        },
        {
        "id": "230",
        "name": "4zmr9s1o@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "4zmr9s1o@bccto.me",
        "contact_phone": "231231231",
        "contact_email": "4zmr9s1o@bccto.me",
        "customer_id": "120",
        "created_by": "14592",
        "created_at": "1559291127",
        "updated_at": "1559291127",
        "teams": []
        },
        {
        "id": "229",
        "name": "z9lgdrfd@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "z9lgdrfd@bccto.me",
        "contact_phone": "123123",
        "contact_email": "z9lgdrfd@bccto.me",
        "customer_id": "119",
        "created_by": "14591",
        "created_at": "1559290983",
        "updated_at": "1559290983",
        "teams": []
        },
        {
        "id": "228",
        "name": "56yohvy4@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "56yohvy4@bccto.me",
        "contact_phone": "1231231",
        "contact_email": "56yohvy4@bccto.me",
        "customer_id": "118",
        "created_by": "14590",
        "created_at": "1559290877",
        "updated_at": "1559290877",
        "teams": []
        },
        {
        "id": "227",
        "name": "aj4q3474@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "aj4q3474@bccto.me",
        "contact_phone": "123123",
        "contact_email": "aj4q3474@bccto.me",
        "customer_id": "117",
        "created_by": "14589",
        "created_at": "1559290760",
        "updated_at": "1559290760",
        "teams": []
        },
        {
        "id": "226",
        "name": "pqfb9oo3@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "pqfb9oo3@bccto.me",
        "contact_phone": "123123123123",
        "contact_email": "pqfb9oo3@bccto.me",
        "customer_id": "116",
        "created_by": "14588",
        "created_at": "1559290065",
        "updated_at": "1559290065",
        "teams": []
        },
        {
        "id": "225",
        "name": "bfsd",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zsdfsd",
        "contact_phone": "15652145214",
        "contact_email": "zhangnan@asdf.com",
        "customer_id": "107",
        "created_by": "14587",
        "created_at": "1559288277",
        "updated_at": "1559288277",
        "teams": []
        },
        {
        "id": "221",
        "name": "tqs5vg59@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "tqs5vg59@bccto.me",
        "contact_phone": "1234123",
        "contact_email": "tqs5vg59@bccto.me",
        "customer_id": "112",
        "created_by": "14583",
        "created_at": "1559286902",
        "updated_at": "1559286902",
        "teams": []
        },
        {
        "id": "220",
        "name": "q89ddwez@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "q89ddwez@bccto.me",
        "contact_phone": "123423123",
        "contact_email": "q89ddwez@bccto.me",
        "customer_id": "111",
        "created_by": "14582",
        "created_at": "1559286784",
        "updated_at": "1559286784",
        "teams": []
        },
        {
        "id": "219",
        "name": "xcj4q8m4@bccto.me",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "xcj4q8m4@bccto.me",
        "contact_phone": "1234123",
        "contact_email": "xcj4q8m4@bccto.me",
        "customer_id": "110",
        "created_by": "14581",
        "created_at": "1559286485",
        "updated_at": "1559286485",
        "teams": []
        },
        {
        "id": "217",
        "name": "qweqwe",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "qweqwe",
        "contact_phone": "1234123",
        "contact_email": "qwe@qeq2.com",
        "customer_id": "109",
        "created_by": "14580",
        "created_at": "1559284284",
        "updated_at": "1559284284",
        "teams": []
        },
        {
        "id": "216",
        "name": "yongshi3",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590768000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "yuyongshi@basicfinder.com",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "14579",
        "created_at": "1559271185",
        "updated_at": "1559271185",
        "teams": []
        },
        {
        "id": "212",
        "name": "yongshi1",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559232000",
        "end_time": "1590940799",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "yongshi",
        "contact_phone": "13111111111",
        "contact_email": "yuyongshi@basicfinder.com",
        "customer_id": "108",
        "created_by": "14576",
        "created_at": "1559270039",
        "updated_at": "1563940851",
        "teams": []
        },
        {
        "id": "204",
        "name": "zzj20190530",
        "type": "0",
        "logo": "/upload/2019/05/30/5cef5183eb700_1559187843.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559145600",
        "end_time": "1590681600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zzj20190530",
        "contact_phone": "20190530",
        "contact_email": "zzj20190530@bccto.me",
        "customer_id": "102",
        "created_by": "14565",
        "created_at": "1559187845",
        "updated_at": "1559187845",
        "teams": []
        },
        {
        "id": "202",
        "name": "zzj0530",
        "type": "0",
        "logo": "/upload/2019/05/30/5cef40b6445cd_1559183542.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1559145600",
        "end_time": "1590681600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zzj0530",
        "contact_phone": "13022001221",
        "contact_email": "zzj0530@zzj.com",
        "customer_id": "99",
        "created_by": "14559",
        "created_at": "1559183569",
        "updated_at": "1559281251",
        "teams": [{
        "id": "1318",
        "site_id": "202",
        "name": "team secret",
        "logo": "/upload/2019/05/30/5cef44fb2aa4f_1559184635.jpg"
        },
        {
        "id": "1319",
        "site_id": "202",
        "name": "team liquid",
        "logo": "/upload/2019/05/30/5cef454840b25_1559184712.jpg"
        },
        {
        "id": "1320",
        "site_id": "202",
        "name": "team boy",
        "logo": "/upload/2019/05/30/5cef743a6654a_1559196730.jpg"
        }
        ]
        },
        {
        "id": "200",
        "name": "21",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558540800",
        "end_time": "1590076800",
        "team_count_limit": "0",
        "user_count_limit": "0",
        "data_count_limit": "0",
        "disk_space_limit": "0",
        "team_user_count_limit": "0",
        "contact_username": "1",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "14546",
        "created_at": "1558607735",
        "updated_at": "1559036457",
        "teams": [{
        "id": "1315",
        "site_id": "200",
        "name": "团队",
        "logo": ""
        }]
        },
        {
        "id": "193",
        "name": "dfw",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558454400",
        "end_time": "1589990400",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "latowiya",
        "contact_phone": "888-6666",
        "contact_email": "basicfinder@wqd.com",
        "customer_id": "77",
        "created_by": "14537",
        "created_at": "1558505662",
        "updated_at": "1558521144",
        "teams": []
        },
        {
        "id": "192",
        "name": "<?php exit;?>",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558454400",
        "end_time": "1589990400",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "撒旦法",
        "contact_phone": "13311229543",
        "contact_email": "jxnswi05192@chacuo.net",
        "customer_id": "0",
        "created_by": "14536",
        "created_at": "1558497009",
        "updated_at": "1558497009",
        "teams": []
        },
        {
        "id": "180",
        "name": "gchangdu*teshufuhaoyoumuou",
        "type": "0",
        "logo": "/upload/2019/05/22/5ce4bd08527a9_1558494472.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558454400",
        "end_time": "1589990400",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "ngchang*oiwqe22",
        "contact_phone": "132-0000-0000",
        "contact_email": "",
        "customer_id": "76",
        "created_by": "14533",
        "created_at": "1558494482",
        "updated_at": "1558606982",
        "teams": [{
        "id": "1313",
        "site_id": "180",
        "name": "团队1",
        "logo": "/upload/2019/05/29/5cee4ef32c682_1559121651.png"
        },
        {
        "id": "1314",
        "site_id": "180",
        "name": "团队二二二二二21",
        "logo": ""
        }
        ]
        },
        {
        "id": "177",
        "name": "公<script>alert(12)</script>",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558454400",
        "end_time": "1589990400",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "公<script>alert(2)</script>",
        "contact_phone": "132-0000-0000",
        "contact_email": "efanwei@s123.com",
        "customer_id": "75",
        "created_by": "14532",
        "created_at": "1558493691",
        "updated_at": "1558493691",
        "teams": []
        },
        {
        "id": "163",
        "name": "卫栖梧",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558281600",
        "end_time": "1589817600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "1",
        "contact_phone": "",
        "contact_email": "",
        "customer_id": "0",
        "created_by": "14525",
        "created_at": "1558350763",
        "updated_at": "1558350763",
        "teams": []
        },
        {
        "id": "159",
        "name": "pwusfj28350",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558281600",
        "end_time": "1589817600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "pwusfj28350",
        "contact_phone": "13311229543",
        "contact_email": "pwusfj28350@chacuo.net",
        "customer_id": "0",
        "created_by": "14523",
        "created_at": "1558350435",
        "updated_at": "1558350435",
        "teams": []
        },
        {
        "id": "155",
        "name": "uodtbe59617",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558281600",
        "end_time": "1589817600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "uodtbe596171",
        "contact_phone": "13311229543",
        "contact_email": "uodtbe59617@chacuo.net",
        "customer_id": "0",
        "created_by": "14520",
        "created_at": "1558349910",
        "updated_at": "1558349961",
        "teams": []
        },
        {
        "id": "154",
        "name": "阿萨德发的1",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558281600",
        "end_time": "1589817600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "帅群1123",
        "contact_phone": "1331122953",
        "contact_email": "lmaxnj74513@chacuo.net",
        "customer_id": "0",
        "created_by": "14519",
        "created_at": "1558347708",
        "updated_at": "1558347708",
        "teams": []
        },
        {
        "id": "152",
        "name": "租户1814",
        "type": "0",
        "logo": "/upload/2019/05/20/5ce27dba99279_1558347194.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558281600",
        "end_time": "1589817600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "租户1814",
        "contact_phone": "",
        "contact_email": "qwse@qswe.com",
        "customer_id": "0",
        "created_by": "14517",
        "created_at": "1558347278",
        "updated_at": "1558349898",
        "teams": []
        },
        {
        "id": "151",
        "name": "s沙发12311",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558281600",
        "end_time": "1589817600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "阿凤123wq",
        "contact_phone": "13311229543",
        "contact_email": "qokblx87149@chacuo.net",
        "customer_id": "0",
        "created_by": "14516",
        "created_at": "1558347070",
        "updated_at": "1558347070",
        "teams": []
        },
        {
        "id": "138",
        "name": "日志租户",
        "type": "0",
        "logo": "/upload/2019/05/20/5ce24d077cea3_1558334727.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558281600",
        "end_time": "1589817600",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "日志租户",
        "contact_phone": "",
        "contact_email": "rizhi@rizhi.com",
        "customer_id": "0",
        "created_by": "14396",
        "created_at": "1558334679",
        "updated_at": "1558334803",
        "teams": []
        },
        {
        "id": "136",
        "name": "s沙发222",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558108800",
        "end_time": "1589644800",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "阿凤112",
        "contact_phone": "164987416312322",
        "contact_email": "juqbdw81045@chacuo.net",
        "customer_id": "0",
        "created_by": "14505",
        "created_at": "1558178238",
        "updated_at": "1558333643",
        "teams": []
        },
        {
        "id": "135",
        "name": "s沙发123",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558108800",
        "end_time": "1589644800",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "阿凤213",
        "contact_phone": "1649874163123",
        "contact_email": "rhkmeo54327@chacuo.net",
        "customer_id": "0",
        "created_by": "14503",
        "created_at": "1558177834",
        "updated_at": "1558333793",
        "teams": []
        },
        {
        "id": "134",
        "name": "s沙发111",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558108800",
        "end_time": "1589644800",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "阿凤11",
        "contact_phone": "1612123123",
        "contact_email": "calise72361@chacuo.net",
        "customer_id": "0",
        "created_by": "14502",
        "created_at": "1558177389",
        "updated_at": "1558177484",
        "teams": []
        },
        {
        "id": "131",
        "name": "zzjsina",
        "type": "0",
        "logo": "/upload/2019/05/18/5cdfe44279433_1558176834.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558022400",
        "end_time": "1589558400",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zzjsina",
        "contact_phone": "18633524121",
        "contact_email": "zhangzhenjiexl@sina.com",
        "customer_id": "0",
        "created_by": "14501",
        "created_at": "1558176790",
        "updated_at": "1558176845",
        "teams": [{
        "id": "1308",
        "site_id": "131",
        "name": "zzjsinna-team-1",
        "logo": "/upload/2019/05/18/5cdfe85ecaf59_1558177886.jpg"
        }]
        },
        {
        "id": "128",
        "name": "s沙发",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558108800",
        "end_time": "1589644800",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "阿凤",
        "contact_phone": "1649874163153546",
        "contact_email": "giekud27453@chacuo.net",
        "customer_id": "0",
        "created_by": "14063",
        "created_at": "1558172850",
        "updated_at": "1558177262",
        "teams": []
        },
        {
        "id": "124",
        "name": "www0",
        "type": "0",
        "logo": "/upload/2019/05/18/5cdfc6d6889b4_1558169302.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558108800",
        "end_time": "1589644800",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zzj1",
        "contact_phone": "1234221",
        "contact_email": "sq11@183.com",
        "customer_id": "0",
        "created_by": "14396",
        "created_at": "1558169749",
        "updated_at": "1558333036",
        "teams": []
        },
        {
        "id": "123",
        "name": "55555",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558108800",
        "end_time": "1589644800",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "55555@rrr.com",
        "contact_phone": "5555555",
        "contact_email": "55555@rrr.com",
        "customer_id": "0",
        "created_by": "14063",
        "created_at": "1558169715",
        "updated_at": "1558176619",
        "teams": []
        },
        {
        "id": "122",
        "name": "9997",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1558108800",
        "end_time": "1589644800",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "999",
        "contact_phone": "999-333",
        "contact_email": "9997@diszz.com",
        "customer_id": "0",
        "created_by": "14496",
        "created_at": "1558168740",
        "updated_at": "1558176748",
        "teams": []
        },
        {
        "id": "100",
        "name": "测试添加",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1557936000",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "测试添加",
        "contact_phone": "18566154433",
        "contact_email": "55@q11.com",
        "customer_id": "0",
        "created_by": "14396",
        "created_at": "1557995459",
        "updated_at": "0",
        "teams": []
        },
        {
        "id": "99",
        "name": "帅帅租户一二三四五六七八九十",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1557936000",
        "end_time": "1589472000",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "帅群",
        "contact_phone": "13311229511",
        "contact_email": "jiashuaiqun@basicfinder.com",
        "customer_id": "0",
        "created_by": "14396",
        "created_at": "1557995287",
        "updated_at": "1559197607",
        "teams": [{
        "id": "1307",
        "site_id": "99",
        "name": "帅群租户1",
        "logo": ""
        },
        {
        "id": "1310",
        "site_id": "99",
        "name": "团队2",
        "logo": ""
        },
        {
        "id": "1311",
        "site_id": "99",
        "name": "团队3",
        "logo": ""
        }
        ]
        },
        {
        "id": "98",
        "name": "zzj租户",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1557936000",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zzj租户",
        "contact_phone": "18677221133",
        "contact_email": "www@qq1.com",
        "customer_id": "0",
        "created_by": "14396",
        "created_at": "1557995090",
        "updated_at": "0",
        "teams": []
        },
        {
        "id": "92",
        "name": "mldfcs58630",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1556553600",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "mldfcs58630",
        "contact_phone": "15632526396",
        "contact_email": "mldfcs58630@chacuo.net",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1556612891",
        "updated_at": "1556614638",
        "teams": [{
        "id": "1299",
        "site_id": "92",
        "name": "测试",
        "logo": ""
        }]
        },
        {
        "id": "91",
        "name": "DFDFDF",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1556380800",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "DFDFDF",
        "contact_phone": "13565656565",
        "contact_email": "jibzkp03649@chacuo.net",
        "customer_id": "0",
        "created_by": "14171",
        "created_at": "1556440882",
        "updated_at": "0",
        "teams": []
        },
        {
        "id": "90",
        "name": "kmunsa28710@chacuo.net",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1556380800",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "去玩",
        "contact_phone": "15600213789",
        "contact_email": "kmunsa28710@chacuo.net",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1556439851",
        "updated_at": "0",
        "teams": []
        },
        {
        "id": "89",
        "name": "倍赛数据--测试-0428",
        "type": "0",
        "logo": "/upload/2019/04/28/5cc5480bd339d_1556432907.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1556294400",
        "end_time": "1589558399",
        "team_count_limit": "1",
        "user_count_limit": "1000",
        "data_count_limit": "1",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "丁东方-测试-0428",
        "contact_phone": "17600395460",
        "contact_email": "dingdongfang@basicfinder.com",
        "customer_id": "0",
        "created_by": "14171",
        "created_at": "1556433206",
        "updated_at": "1556438836",
        "teams": [{
        "id": "1295",
        "site_id": "89",
        "name": "团队测试",
        "logo": ""
        },
        {
        "id": "1297",
        "site_id": "89",
        "name": "测试",
        "logo": ""
        }
        ]
        },
        {
        "id": "88",
        "name": "zzjcompany",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1556380800",
        "end_time": "1588003199",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zzj",
        "contact_phone": "13211112222",
        "contact_email": "zhangzhenjie@basicfinder.com",
        "customer_id": "0",
        "created_by": "14396",
        "created_at": "1556433037",
        "updated_at": "1556433054",
        "teams": [{
        "id": "1294",
        "site_id": "88",
        "name": "作业团队1",
        "logo": "/upload/2019/04/28/5cc549358bbca_1556433205.jpg"
        },
        {
        "id": "1309",
        "site_id": "88",
        "name": "审核团队1",
        "logo": "/upload/2019/05/20/5ce20efc7b67f_1558318844.jpg"
        }
        ]
        },
        {
        "id": "86",
        "name": "张公司",
        "type": "0",
        "logo": "/upload/2019/04/30/5cc7c51992015_1556595993.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1556380800",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "张姓名",
        "contact_phone": "13562523652",
        "contact_email": "tycivn61453@chacuo.net",
        "customer_id": "0",
        "created_by": "14000",
        "created_at": "1556422160",
        "updated_at": "1556596004",
        "teams": [{
        "id": "1304",
        "site_id": "86",
        "name": "测试",
        "logo": ""
        }]
        },
        {
        "id": "85",
        "name": "公司名称test1",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1555862400",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "公司名称test1",
        "contact_phone": "15623252563",
        "contact_email": "cawmfk05472@chacuo.net",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1555904572",
        "updated_at": "1557200115",
        "teams": [{
        "id": "1305",
        "site_id": "85",
        "name": "在测试一下",
        "logo": ""
        }]
        },
        {
        "id": "83",
        "name": "点击两次测试1",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1555862400",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "点击两次测试",
        "contact_phone": "15236252145",
        "contact_email": "iwolhr07628@chacuo.net",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1555902985",
        "updated_at": "1557200118",
        "teams": []
        },
        {
        "id": "82",
        "name": "点击两次测试",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1555862400",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "点击两次测试",
        "contact_phone": "15263252632",
        "contact_email": "woqtui15603@chacuo.net",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1555902600",
        "updated_at": "1557200123",
        "teams": []
        },
        {
        "id": "81",
        "name": "点两次连接测试",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1555862400",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "点两次连接测试",
        "contact_phone": "13252632563",
        "contact_email": "dianliangci@test.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1555902472",
        "updated_at": "1557200145",
        "teams": []
        },
        {
        "id": "80",
        "name": "123qwd12",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1555603200",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "cj123",
        "contact_phone": "15214103021",
        "contact_email": "xbpomw48712@chacuo.net",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1555670483",
        "updated_at": "0",
        "teams": []
        },
        {
        "id": "79",
        "name": "123qwd1",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1555603200",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "cj123",
        "contact_phone": "14785462541",
        "contact_email": "xbpomw48712@027168.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1555670229",
        "updated_at": "0",
        "teams": []
        },
        {
        "id": "67",
        "name": "荟萃倍赛",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1554652800",
        "end_time": "1776527999",
        "team_count_limit": "100",
        "user_count_limit": "10000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "200",
        "contact_username": "荟萃倍赛租户",
        "contact_phone": "18201011111",
        "contact_email": "huicuibeisai@qq.com",
        "customer_id": "0",
        "created_by": "14206",
        "created_at": "1554715854",
        "updated_at": "1563954835",
        "teams": [{
        "id": "1290",
        "site_id": "67",
        "name": "zhangzhenjie.20190416155535",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_948.jpg"
        },
        {
        "id": "1291",
        "site_id": "67",
        "name": "cible团队测试.20190416155722",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        },
        {
        "id": "1293",
        "site_id": "67",
        "name": "团队测试-PHP开发人员专用1",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        },
        {
        "id": "1303",
        "site_id": "67",
        "name": "谷宁(团队）(1)",
        "logo": ""
        },
        {
        "id": "1328",
        "site_id": "67",
        "name": "saas验证1",
        "logo": ""
        },
        {
        "id": "1332",
        "site_id": "67",
        "name": "团队测试-PHP开发人员专用5",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        },
        {
        "id": "1333",
        "site_id": "67",
        "name": "团队测试-PHP开发人员专用(1)",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        },
        {
        "id": "1335",
        "site_id": "67",
        "name": "团队测试-PHP开发人员专用11",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        },
        {
        "id": "1336",
        "site_id": "67",
        "name": "saas验证111",
        "logo": ""
        },
        {
        "id": "1337",
        "site_id": "67",
        "name": "saas验证1111",
        "logo": ""
        },
        {
        "id": "1338",
        "site_id": "67",
        "name": "团队测试-PHP开发人员专用111",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        },
        {
        "id": "1339",
        "site_id": "67",
        "name": "saas验证11",
        "logo": ""
        },
        {
        "id": "1340",
        "site_id": "67",
        "name": "团队测试-PHP开发人员专用1112",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        },
        {
        "id": "1341",
        "site_id": "67",
        "name": "saas验证11112",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10017_449.jpg"
        },
        {
        "id": "1342",
        "site_id": "67",
        "name": "团队测试-PHP开发人员专用1111",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        },
        {
        "id": "1343",
        "site_id": "67",
        "name": "荟萃官方2232",
        "logo": ""
        },
        {
        "id": "1344",
        "site_id": "67",
        "name": "今天测试311",
        "logo": ""
        },
        {
        "id": "1345",
        "site_id": "67",
        "name": "荟萃官方11111",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10017_694.jpg"
        },
        {
        "id": "1346",
        "site_id": "67",
        "name": "同步saas",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10017_429.jpg"
        },
        {
        "id": "1347",
        "site_id": "67",
        "name": "同步saas01",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10017_402.jpg"
        },
        {
        "id": "1348",
        "site_id": "67",
        "name": "同步saas041",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10017_423.jpg"
        },
        {
        "id": "1349",
        "site_id": "67",
        "name": "荟萃官方荟萃官方官方",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10017_663.jpg"
        },
        {
        "id": "1350",
        "site_id": "67",
        "name": "saas验证1112",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10017_841.jpg"
        },
        {
        "id": "1351",
        "site_id": "67",
        "name": "团队测试-PHP开发人员专用",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        },
        {
        "id": "1353",
        "site_id": "67",
        "name": "saas团队信息测试df123",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10017_126.jpg"
        },
        {
        "id": "1355",
        "site_id": "67",
        "name": "测试saas0719",
        "logo": ""
        },
        {
        "id": "1356",
        "site_id": "67",
        "name": "测试saas071701ddd",
        "logo": "http://test.app.huicui.me"
        },
        {
        "id": "1357",
        "site_id": "67",
        "name": "测测测",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10007_767.jpg"
        },
        {
        "id": "1358",
        "site_id": "67",
        "name": "测试saas19-01-17",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10007_767.jpg"
        },
        {
        "id": "1361",
        "site_id": "67",
        "name": "团队1",
        "logo": "/upload/2019/07/30/5d40054bcfc11_1564476747.jpg"
        },
        {
        "id": "1362",
        "site_id": "67",
        "name": "测试1",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10007_767.jpg"
        },
        {
        "id": "1363",
        "site_id": "67",
        "name": "saas验证",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10017_325.jpg"
        },
        {
        "id": "1364",
        "site_id": "67",
        "name": "测试团队勾选",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10017_841.jpg"
        },
        {
        "id": "1367",
        "site_id": "67",
        "name": "前端-常凯",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10021_426.jpg"
        },
        {
        "id": "1277",
        "site_id": "67",
        "name": "cible团队测试",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        }
        ]
        },
        {
        "id": "65",
        "name": "荟萃众包",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1554220800",
        "end_time": "1860336000",
        "team_count_limit": "20",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "荟萃众包昵称",
        "contact_phone": "18111111111",
        "contact_email": "huicuizhongbao@qq.com",
        "customer_id": "0",
        "created_by": "14206",
        "created_at": "1554272912",
        "updated_at": "1563243268",
        "teams": [{
        "id": "1280",
        "site_id": "65",
        "name": "荟萃官方.20190416104955",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        },
        {
        "id": "1281",
        "site_id": "65",
        "name": "荟萃官方.20190416110828",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        },
        {
        "id": "1282",
        "site_id": "65",
        "name": "荟萃官方.20190416112433",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        },
        {
        "id": "1283",
        "site_id": "65",
        "name": "荟萃官方.20190416114517",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        },
        {
        "id": "1284",
        "site_id": "65",
        "name": "荟萃官方.20190416114820",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        },
        {
        "id": "1285",
        "site_id": "65",
        "name": "荟萃官方.20190416124246",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        },
        {
        "id": "1286",
        "site_id": "65",
        "name": "荟萃官方.20190416124507",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        },
        {
        "id": "1287",
        "site_id": "65",
        "name": "荟萃官方.20190416125408",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        },
        {
        "id": "1288",
        "site_id": "65",
        "name": "荟萃官方.20190416141111",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        },
        {
        "id": "1292",
        "site_id": "65",
        "name": "荟萃官方11222",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        },
        {
        "id": "1352",
        "site_id": "65",
        "name": "商家测试-PHP开发人员专用",
        "logo": "http://test.app.huicui.me/staticfile/userpic/qr_10007_767.jpg"
        },
        {
        "id": "1219",
        "site_id": "65",
        "name": "荟萃众包01",
        "logo": ""
        },
        {
        "id": "1220",
        "site_id": "65",
        "name": "荟萃众包02",
        "logo": ""
        },
        {
        "id": "1278",
        "site_id": "65",
        "name": "cible商家测试",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_787.jpg"
        },
        {
        "id": "1279",
        "site_id": "65",
        "name": "荟萃官方1",
        "logo": "https://app.huicui.me/staticfile/userpic/qr_10007_910.jpg"
        }
        ]
        },
        {
        "id": "64",
        "name": "测试ldh",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1553616000",
        "end_time": "1819727999",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "ldh",
        "contact_phone": "18210292222",
        "contact_email": "lidthl@126.com",
        "customer_id": "0",
        "created_by": "14206",
        "created_at": "1553768547",
        "updated_at": "1554088942",
        "teams": [{
        "id": "1216",
        "site_id": "64",
        "name": "测试团队1",
        "logo": ""
        },
        {
        "id": "1217",
        "site_id": "64",
        "name": "测试团队2",
        "logo": ""
        }
        ]
        },
        {
        "id": "63",
        "name": "ccccccc",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1553702400",
        "end_time": "1585324799",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "ccccccc",
        "contact_phone": "15623252365",
        "contact_email": "ccccccc@11.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1553753640",
        "updated_at": "0",
        "teams": [{
        "id": "1215",
        "site_id": "63",
        "name": "123123",
        "logo": ""
        }]
        },
        {
        "id": "62",
        "name": "ceshi.lihui",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1553702400",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "lihui.ceshi",
        "contact_phone": "1112222222",
        "contact_email": "lihui.root@bf.com",
        "customer_id": "0",
        "created_by": "14043",
        "created_at": "1553753210",
        "updated_at": "0",
        "teams": [{
        "id": "1214",
        "site_id": "62",
        "name": "11",
        "logo": ""
        }]
        },
        {
        "id": "61",
        "name": "绩效测试专用租户",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "1",
        "start_time": "1553616000",
        "end_time": "1585843200",
        "team_count_limit": "10",
        "user_count_limit": "1000",
        "data_count_limit": "999",
        "disk_space_limit": "99",
        "team_user_count_limit": "20",
        "contact_username": "绩效root",
        "contact_phone": "15622112233",
        "contact_email": "jixiaotest@admin.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1553668132",
        "updated_at": "1575604655",
        "teams": [{
        "id": "1302",
        "site_id": "61",
        "name": "绩效测试专用团队123",
        "logo": ""
        },
        {
        "id": "1317",
        "site_id": "61",
        "name": "1的2d",
        "logo": ""
        },
        {
        "id": "1213",
        "site_id": "61",
        "name": "团队名称",
        "logo": "/upload/2019/05/29/5cedfaae0dbcc_1559100078.jpg"
        },
        {
        "id": "1300",
        "site_id": "61",
        "name": "绩效测试专用团队1",
        "logo": ""
        }
        ]
        },
        {
        "id": "60",
        "name": "张砚可租户",
        "type": "0",
        "logo": "/upload/2019/03/13/5c88a98e82fc6_1552460174.jpeg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1552320000",
        "end_time": "1583942399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "张砚可",
        "contact_phone": "15625325625",
        "contact_email": "zhangyanke@admin.com",
        "customer_id": "0",
        "created_by": "14185",
        "created_at": "1552379922",
        "updated_at": "1552460176",
        "teams": [{
        "id": "1210",
        "site_id": "60",
        "name": "测试团队-zyk",
        "logo": ""
        }]
        },
        {
        "id": "59",
        "name": "许春生租户",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1551888000",
        "end_time": "1583510399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "许春生",
        "contact_phone": "15625841256",
        "contact_email": "xuchunsheng@admin.com",
        "customer_id": "0",
        "created_by": "14180",
        "created_at": "1551925886",
        "updated_at": "1552377498",
        "teams": [{
        "id": "1209",
        "site_id": "59",
        "name": "许春生测试团队",
        "logo": ""
        }]
        },
        {
        "id": "58",
        "name": "丁东方租户",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "1",
        "start_time": "1551830400",
        "end_time": "1583884800",
        "team_count_limit": "12",
        "user_count_limit": "1000",
        "data_count_limit": "1000000",
        "disk_space_limit": "10000",
        "team_user_count_limit": "20",
        "contact_username": "丁东方",
        "contact_phone": "15623256327",
        "contact_email": "dingdongfang@admin.com",
        "customer_id": "0",
        "created_by": "14000",
        "created_at": "1551839768",
        "updated_at": "1575959373",
        "teams": [{
        "id": "1409",
        "site_id": "58",
        "name": "1231231233333",
        "logo": ""
        },
        {
        "id": "1208",
        "site_id": "58",
        "name": "丁东方测试团队",
        "logo": "/upload/2019/03/06/5c7f466eeb4cd_1551844974.jpg"
        }
        ]
        },
        {
        "id": "56",
        "name": "删除项目测试租户名称",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1551283200",
        "end_time": "1582905599",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "删除项目测试工作昵称",
        "contact_phone": "15623256311",
        "contact_email": "shanchu@bf.com",
        "customer_id": "0",
        "created_by": "14000",
        "created_at": "1551344967",
        "updated_at": "1551758299",
        "teams": [{
        "id": "1190",
        "site_id": "56",
        "name": "测试团队123",
        "logo": ""
        }]
        },
        {
        "id": "54",
        "name": "租户我",
        "type": "0",
        "logo": "/upload/2019/02/22/5c6f9c1e914c2_1550818334.png",
        "status": "1",
        "quick_login": "0",
        "start_time": "1550764800",
        "end_time": "1582387199",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "租户我",
        "contact_phone": "15623256246",
        "contact_email": "zuhu112@admin.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1550818347",
        "updated_at": "0",
        "teams": []
        },
        {
        "id": "53",
        "name": "租户2123",
        "type": "0",
        "logo": "/upload/2019/03/28/5c9c9a66cab7e_1553767014.png",
        "status": "1",
        "quick_login": "0",
        "start_time": "1549468800",
        "end_time": "1581177599",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "租户2",
        "contact_phone": "15623562563",
        "contact_email": "123dvargv@asd.com",
        "customer_id": "0",
        "created_by": "14206",
        "created_at": "1550818020",
        "updated_at": "1553767107",
        "teams": []
        },
        {
        "id": "52",
        "name": "测试租户11",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1549296000",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "测试租户11",
        "contact_phone": "12365456545",
        "contact_email": "etst@11c.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1550817174",
        "updated_at": "1550817621",
        "teams": []
        },
        {
        "id": "51",
        "name": "123123",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1548604800",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "123123",
        "contact_phone": "1563256254",
        "contact_email": "fldk@11.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1550574141",
        "updated_at": "0",
        "teams": []
        },
        {
        "id": "50",
        "name": "租户2",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1550505600",
        "end_time": "1582127999",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "租户2",
        "contact_phone": "15623256236",
        "contact_email": "zuhu2@admin.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1550573386",
        "updated_at": "1550573386",
        "teams": []
        },
        {
        "id": "48",
        "name": "11",
        "type": "0",
        "logo": "/upload/2019/02/14/5c64df349537a_1550114612.png",
        "status": "1",
        "quick_login": "0",
        "start_time": "1550073600",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "2.14测试",
        "contact_phone": "15600223311",
        "contact_email": "bf123456@root.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1550114445",
        "updated_at": "1550114613",
        "teams": []
        },
        {
        "id": "47",
        "name": "测试活跃团队",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1549900800",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "活跃",
        "contact_phone": "12354368432",
        "contact_email": "bf123456@admin.com",
        "customer_id": "0",
        "created_by": "14000",
        "created_at": "1549961525",
        "updated_at": "1554188816",
        "teams": [{
        "id": "1207",
        "site_id": "47",
        "name": "凡芃团队",
        "logo": ""
        }]
        },
        {
        "id": "46",
        "name": "cesss",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1548259200",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "测试",
        "contact_phone": "1346465132",
        "contact_email": "ceshi@bf.com",
        "customer_id": "0",
        "created_by": "14000",
        "created_at": "1548321532",
        "updated_at": "1548321532",
        "teams": [{
        "id": "1198",
        "site_id": "46",
        "name": "aaa",
        "logo": ""
        }]
        },
        {
        "id": "45",
        "name": "zu1",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1546876800",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zu1",
        "contact_phone": "123456123456",
        "contact_email": "zu1@bf.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1548320237",
        "updated_at": "1548320237",
        "teams": []
        },
        {
        "id": "44",
        "name": "zuzu",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1548172800",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "zuzu",
        "contact_phone": "4524532452",
        "contact_email": "zuzu@bf.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1548318849",
        "updated_at": "1548319062",
        "teams": []
        },
        {
        "id": "43",
        "name": "住住住",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1546358400",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "住住住住",
        "contact_phone": "123451243",
        "contact_email": "zu@bf.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1548318364",
        "updated_at": "1548318364",
        "teams": []
        },
        {
        "id": "42",
        "name": "测试租户",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1546963200",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "测试租户",
        "contact_phone": "12486415641864",
        "contact_email": "ceshizuhu@bf.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1548315895",
        "updated_at": "1548316429",
        "teams": []
        },
        {
        "id": "41",
        "name": "qwewqe",
        "type": "0",
        "logo": "/upload/2019/01/21/5c45847525c5e_1548059765.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1548172800",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "wqewr",
        "contact_phone": "15346532423",
        "contact_email": "weqwfhtg@q.com",
        "customer_id": "0",
        "created_by": "14000",
        "created_at": "1548059386",
        "updated_at": "1548059830",
        "teams": [{
        "id": "1203",
        "site_id": "41",
        "name": "111",
        "logo": ""
        }]
        },
        {
        "id": "40",
        "name": "asdasdas",
        "type": "0",
        "logo": "/upload/2019/01/21/5c45850eb1111_1548059918.jpg",
        "status": "1",
        "quick_login": "0",
        "start_time": "1548086400",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "asdasd",
        "contact_phone": "143542355234",
        "contact_email": "wrewtr@qq.com",
        "customer_id": "0",
        "created_by": "14000",
        "created_at": "1548059290",
        "updated_at": "1548059921",
        "teams": []
        },
        {
        "id": "39",
        "name": "CHAMPION",
        "type": "0",
        "logo": "/upload/2019/11/25/5ddb945c5fab4_1574671452.png",
        "status": "1",
        "quick_login": "1",
        "start_time": "1547164800",
        "end_time": "1580256000",
        "team_count_limit": "20",
        "user_count_limit": "1000",
        "data_count_limit": "120",
        "disk_space_limit": "10000",
        "team_user_count_limit": "20",
        "contact_username": "张南鹏管理",
        "contact_phone": "15632563256",
        "contact_email": "zuhujixiao@admin.com",
        "customer_id": "0",
        "created_by": "14000",
        "created_at": "1547195179",
        "updated_at": "1575974943",
        "teams": [{
        "id": "1",
        "site_id": "39",
        "name": "basicfinder",
        "logo": "/upload/2019/05/27/5ceba3c0b6b7b_1558946752.jpg"
        },
        {
        "id": "1197",
        "site_id": "39",
        "name": "Niubility",
        "logo": "/upload/2019/10/23/5db01b94ac8c4_1571822484.jpg"
        },
        {
        "id": "1202",
        "site_id": "39",
        "name": "第三个团队",
        "logo": ""
        }
        ]
        },
        {
        "id": "38",
        "name": "test111",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1547136000",
        "end_time": "1589558399",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "test111",
        "contact_phone": "111114",
        "contact_email": "root111@root.com",
        "customer_id": "0",
        "created_by": "14080",
        "created_at": "1547172202",
        "updated_at": "1547174044",
        "teams": [{
        "id": "1195",
        "site_id": "38",
        "name": "team1",
        "logo": ""
        }]
        },
        {
        "id": "37",
        "name": "王晓露的公司",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1546876800",
        "end_time": "1578412800",
        "team_count_limit": "3",
        "user_count_limit": "1000",
        "data_count_limit": "3000",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "王晓露",
        "contact_phone": "18519930113",
        "contact_email": "wangxiaolu@saas.com",
        "customer_id": "0",
        "created_by": "14000",
        "created_at": "1546999265",
        "updated_at": "1572950897",
        "teams": [{
        "id": "1194",
        "site_id": "37",
        "name": "王晓露的团队",
        "logo": ""
        }]
        },
        {
        "id": "36",
        "name": "授权时间租户测试",
        "type": "0",
        "logo": "",
        "status": "1",
        "quick_login": "0",
        "start_time": "1546876800",
        "end_time": "1589558399",
        "team_count_limit": "1",
        "user_count_limit": "1000",
        "data_count_limit": "999",
        "disk_space_limit": "3",
        "team_user_count_limit": "20",
        "contact_username": "授权时间租户测试",
        "contact_phone": "15623256523",
        "contact_email": "zuhushijian@root.com",
        "customer_id": "0",
        "created_by": "14048",
        "created_at": "1546842737",
        "updated_at": "1547194186",
        "teams": []
        },
        {
        "id": "35",
        "name": "这是一个测试+-/。，,.<>！@#!@#12qqwAd",
    "type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1546790400",
				"end_time": "1589558399",
				"team_count_limit": "3",
				"user_count_limit": "1000",
				"data_count_limit": "3",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "这是一个字符串的测试！@#!@#12qqwAd",
				"contact_phone": "15623256253",
				"contact_email": "test001@root.com",
				"customer_id": "0",
				"created_by": "14048",
				"created_at": "1546834613",
				"updated_at": "1546834692",
				"teams": []
			},
{
"id": "34",
"name": "cesssssss",
"type": "0",
"logo": "",
"status": "1",
"quick_login": "0",
"start_time": "1546531200",
"end_time": "1578153599",
"team_count_limit": "3",
"user_count_limit": "1000",
"data_count_limit": "3",
"disk_space_limit": "3",
"team_user_count_limit": "20",
"contact_username": "asda",
"contact_phone": "12343423344",
"contact_email": "asdasdw@qq.com",
"customer_id": "0",
"created_by": "14000",
"created_at": "1546589369",
"updated_at": "1547189685",
"teams": []
},
{
    "id": "33",
				"name": "shuaiqun",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1546531200",
				"end_time": "1578153599",
				"team_count_limit": "3",
				"user_count_limit": "1400",
				"data_count_limit": "10000",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "shuaiqungongzuo",
				"contact_phone": "1235468962",
				"contact_email": "shuaiqun@root.23.com",
				"customer_id": "0",
				"created_by": "14063",
				"created_at": "1546585731",
				"updated_at": "1548499216",
				"teams": [{
    "id": "1192",
						"site_id": "33",
						"name": "丑群",
						"logo": "/upload/2019/01/10/5c36afb4ab7df_1547087796.jpg"
					},
					{
                        "id": "1206",
						"site_id": "33",
						"name": "凡芃团队1",
						"logo": ""
					}
				]
			},
{
    "id": "32",
				"name": "八九十1234",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1546272000",
				"end_time": "1577894399",
				"team_count_limit": "3",
				"user_count_limit": "1000",
				"data_count_limit": "3",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "一八一二三四六七八九十1234",
				"contact_phone": "15632589654",
				"contact_email": "/*25ddfdf@root.com",
				"customer_id": "0",
				"created_by": "14048",
				"created_at": "1546498186",
				"updated_at": "1553826676",
				"teams": [{
    "id": "1191",
					"site_id": "32",
					"name": "吧啦啦啦小魔仙",
					"logo": ""
				}]
			},
{
    "id": "31",
				"name": "znptest2",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1546444800",
				"end_time": "1589558399",
				"team_count_limit": "999",
				"user_count_limit": "1000",
				"data_count_limit": "999",
				"disk_space_limit": "999",
				"team_user_count_limit": "20",
				"contact_username": "znptest2",
				"contact_phone": "15635896585",
				"contact_email": "znptest2@root.com",
				"customer_id": "0",
				"created_by": "14048",
				"created_at": "1546424303",
				"updated_at": "1553064269",
				"teams": []
			},
{
    "id": "30",
				"name": "test123",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1546358400",
				"end_time": "1577980799",
				"team_count_limit": "999",
				"user_count_limit": "1000",
				"data_count_limit": "999",
				"disk_space_limit": "999",
				"team_user_count_limit": "20",
				"contact_username": "test111123",
				"contact_phone": "15622589658",
				"contact_email": "znptest@root.com",
				"customer_id": "0",
				"created_by": "14048",
				"created_at": "1546422718",
				"updated_at": "1553064254",
				"teams": []
			},
{
    "id": "29",
				"name": "王晓露",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1546358400",
				"end_time": "1577894400",
				"team_count_limit": "9999",
				"user_count_limit": "9999",
				"data_count_limit": "9999",
				"disk_space_limit": "9999",
				"team_user_count_limit": "20",
				"contact_username": "王晓露",
				"contact_phone": "12562563256",
				"contact_email": "wangxiaolu@root.com",
				"customer_id": "0",
				"created_by": "14048",
				"created_at": "1546417235",
				"updated_at": "1554368431",
				"teams": []
			},
{
    "id": "28",
				"name": "啦啦啦啦",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1546358400",
				"end_time": "1577980799",
				"team_count_limit": "3",
				"user_count_limit": "1000",
				"data_count_limit": "99",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "啦啦啦啦啦啦",
				"contact_phone": "123456578901",
				"contact_email": "cckcckcck1@admin.com",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1546399606",
				"updated_at": "1551149505",
				"teams": [{
    "id": "1188",
					"site_id": "28",
					"name": "aaaaaaaaaaaaaaaaaaaaa",
					"logo": ""
				}]
			},
{
    "id": "27",
				"name": "jin_test",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1546012800",
				"end_time": "1589558399",
				"team_count_limit": "3",
				"user_count_limit": "1000",
				"data_count_limit": "3",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "jin_test",
				"contact_phone": "13012456356",
				"contact_email": "jin@1.com",
				"customer_id": "0",
				"created_by": "14044",
				"created_at": "1546064480",
				"updated_at": "1554368428",
				"teams": []
			},
{
    "id": "26",
				"name": "adas",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1545235200",
				"end_time": "1576771200",
				"team_count_limit": "3",
				"user_count_limit": "1000",
				"data_count_limit": "3",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "asdad",
				"contact_phone": "1543423435",
				"contact_email": "adada@qq.com",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545278514",
				"updated_at": "1545638306",
				"teams": [{
    "id": "1421",
					"site_id": "26",
					"name": "1234",
					"logo": ""
				}]
			},
{
    "id": "25",
				"name": "中国耶鸡科技研究所",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1546099200",
				"end_time": "1589558399",
				"team_count_limit": "3",
				"user_count_limit": "1000",
				"data_count_limit": "3",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "1232342",
				"contact_phone": "13567323757",
				"contact_email": "12432s@qq.com",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545191352",
				"updated_at": "1546073968",
				"teams": []
			},
{
    "id": "24",
				"name": "丑露",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1545128358",
				"end_time": "1589558399",
				"team_count_limit": "3",
				"user_count_limit": "1000",
				"data_count_limit": "3",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "aaa",
				"contact_phone": "12324354353",
				"contact_email": "aaaaaa1@qq.com",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545117974",
				"updated_at": "1554368424",
				"teams": []
			},
{
    "id": "23",
				"name": "ceshi4",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1545118985",
				"end_time": "1589558399",
				"team_count_limit": "3",
				"user_count_limit": "1000",
				"data_count_limit": "3",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "ceshi4",
				"contact_phone": "14254578644",
				"contact_email": "ceshi4@qq.com",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545041718",
				"updated_at": "1545118985",
				"teams": []
			},
{
    "id": "22",
				"name": "丑群",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1545128371",
				"end_time": "1589558399",
				"team_count_limit": "3",
				"user_count_limit": "1000",
				"data_count_limit": "3",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "ceshi33",
				"contact_phone": "14354524324",
				"contact_email": "ceshi33@qq.com",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545040897",
				"updated_at": "1554368412",
				"teams": []
			},
{
    "id": "21",
				"name": "ceshi3",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1544976000",
				"end_time": "1589558399",
				"team_count_limit": "3",
				"user_count_limit": "1000",
				"data_count_limit": "3",
				"disk_space_limit": "3",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545026706",
				"updated_at": "1554368421",
				"teams": []
			},
{
    "id": "20",
				"name": "ceshi2",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "0",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545026599",
				"updated_at": "1554368415",
				"teams": []
			},
{
    "id": "19",
				"name": "ceshi",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "0",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545026433",
				"updated_at": "1554368417",
				"teams": []
			},
{
    "id": "18",
				"name": "测试",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "0",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545015920",
				"updated_at": "1554368382",
				"teams": []
			},
{
    "id": "17",
				"name": "admin8",
				"type": "0",
				"logo": "/upload/2019/01/26/5c4bce92ddde4_1548471954.jpg",
				"status": "1",
				"quick_login": "0",
				"start_time": "1545235200",
				"end_time": "1576857599",
				"team_count_limit": "30",
				"user_count_limit": "30",
				"data_count_limit": "30",
				"disk_space_limit": "30",
				"team_user_count_limit": "20",
				"contact_username": "admin8",
				"contact_phone": "13122223333",
				"contact_email": "admin@admin8.com",
				"customer_id": "0",
				"created_by": "14043",
				"created_at": "1545014835",
				"updated_at": "1548496556",
				"teams": [{
    "id": "1186",
						"site_id": "17",
						"name": "我的团",
						"logo": ""
					},
					{
                        "id": "1187",
						"site_id": "17",
						"name": "我的团队啊1223daf",
						"logo": ""
					}
				]
			},
{
    "id": "16",
				"name": "admin7",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "0",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545014635",
				"updated_at": "1553073577",
				"teams": []
			},
{
    "id": "14",
				"name": "admin5",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "0",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545014389",
				"updated_at": "1553073569",
				"teams": []
			},
{
    "id": "13",
				"name": "admin4",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "0",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545014298",
				"updated_at": "1553073567",
				"teams": []
			},
{
    "id": "12",
				"name": "admin3",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "0",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545014104",
				"updated_at": "1553073564",
				"teams": []
			},
{
    "id": "11",
				"name": "admin2",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "0",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545014002",
				"updated_at": "1553073561",
				"teams": []
			},
{
    "id": "10",
				"name": "admin1",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "0",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1545013802",
				"updated_at": "1553073558",
				"teams": []
			},
{
    "id": "9",
				"name": "耶鸡大酒店",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1544784225",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1544784225",
				"updated_at": "1544784225",
				"teams": []
			},
{
    "id": "7",
				"name": "test5",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1544784052",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1544784052",
				"updated_at": "1554368402",
				"teams": []
			},
{
    "id": "6",
				"name": "中国耶鸡科技有限公司",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1545235200",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1544783294",
				"updated_at": "1553073541",
				"teams": []
			},
{
    "id": "3",
				"name": "test2",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1544156179",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1544157502",
				"updated_at": "1554368397",
				"teams": []
			},
{
    "id": "2",
				"name": "test1",
				"type": "0",
				"logo": "",
				"status": "1",
				"quick_login": "0",
				"start_time": "1544156179",
				"end_time": "1589558399",
				"team_count_limit": "0",
				"user_count_limit": "0",
				"data_count_limit": "0",
				"disk_space_limit": "0",
				"team_user_count_limit": "20",
				"contact_username": "",
				"contact_phone": "",
				"contact_email": "",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "1544156179",
				"updated_at": "1554368407",
				"teams": []
			},
{
    "id": "1",
				"name": "BasicFinder",
				"type": "0",
				"logo": "/upload/2019/04/12/5cb061acb39dd_1555063212.jpg",
				"status": "1",
				"quick_login": "1",
				"start_time": "1545177600",
				"end_time": "1609372800",
				"team_count_limit": "100",
				"user_count_limit": "5000",
				"data_count_limit": "400",
				"disk_space_limit": "100",
				"team_user_count_limit": "200",
				"contact_username": "哦啦啦",
				"contact_phone": "13242321321",
				"contact_email": "olala@qq.com",
				"customer_id": "0",
				"created_by": "14000",
				"created_at": "0",
				"updated_at": "1576633418",
				"teams": [{
    "id": "1312",
						"site_id": "1",
						"name": "yongshi",
						"logo": ""
					},
					{
                        "id": "1325",
						"site_id": "1",
						"name": "lxxftest",
						"logo": ""
					},
					{
                        "id": "1354",
						"site_id": "1",
						"name": "测试团队头像",
						"logo": ""
					},
					{
                        "id": "1365",
						"site_id": "1",
						"name": "liuweilong",
						"logo": ""
					},
					{
                        "id": "1398",
						"site_id": "1",
						"name": "B1",
						"logo": ""
					},
					{
                        "id": "1399",
						"site_id": "1",
						"name": "B2",
						"logo": ""
					},
					{
                        "id": "1403",
						"site_id": "1",
						"name": "Kate",
						"logo": ""
					},
					{
                        "id": "1416",
						"site_id": "1",
						"name": "dusong.team",
						"logo": ""
					},
					{
                        "id": "1170",
						"site_id": "1",
						"name": "若水团队",
						"logo": ""
					},
					{
                        "id": "1171",
						"site_id": "1",
						"name": "焦作团队",
						"logo": ""
					},
					{
                        "id": "1172",
						"site_id": "1",
						"name": "郑州团队",
						"logo": ""
					},
					{
                        "id": "1176",
						"site_id": "1",
						"name": "这是测试测试",
						"logo": ""
					},
					{
                        "id": "1177",
						"site_id": "1",
						"name": "专业质检团队",
						"logo": ""
					},
					{
                        "id": "1178",
						"site_id": "1",
						"name": "test110",
						"logo": ""
					},
					{
                        "id": "1180",
						"site_id": "1",
						"name": "张南鹏测试团队",
						"logo": ""
					},
					{
                        "id": "1181",
						"site_id": "1",
						"name": "张鑫测试团队",
						"logo": ""
					},
					{
                        "id": "17",
						"site_id": "1",
						"name": "帅帅租户1",
						"logo": "http://www.yii-china.com/themes/yiicn/images/logo/small.png"
					},
					{
                        "id": "1149",
						"site_id": "1",
						"name": "basicfinder1",
						"logo": "/images/register/logo@2x.png"
					},
					{
                        "id": "1157",
						"site_id": "1",
						"name": "山东鑫诚网络",
						"logo": ""
					},
					{
                        "id": "1159",
						"site_id": "1",
						"name": "夏天团队",
						"logo": ""
					},
					{
                        "id": "1160",
						"site_id": "1",
						"name": "河北团队",
						"logo": ""
					},
					{
                        "id": "1162",
						"site_id": "1",
						"name": "BF089",
						"logo": ""
					},
					{
                        "id": "1164",
						"site_id": "1",
						"name": "静",
						"logo": ""
					},
					{
                        "id": "1166",
						"site_id": "1",
						"name": "烟台团队",
						"logo": ""
					},
					{
                        "id": "1167",
						"site_id": "1",
						"name": "临沂团队",
						"logo": ""
					},
					{
                        "id": "1168",
						"site_id": "1",
						"name": "保定团队",
						"logo": ""
					},
					{
                        "id": "1165",
						"site_id": "1",
						"name": "商城",
						"logo": ""
					},
					{
                        "id": "1001",
						"site_id": "1",
						"name": "欣博友",
						"logo": ""
					}
				]
			}
],
"roles": {
    "4": {
        "customer_manager": "客户管理员",
				"customer_worker": "客户操作员"
			},
			"3": {
        "crowdsourcing_worker": "众包作业员",
				"crowdsourcing_manager": "众包管理员"
			},
			"2": {
        "team_worker": "团队作业员",
				"team_manager": "团队管理员"
			},
			"1": {
        "admin_manager": "管理员",
				"admin_worker": "企业运营",
				"admin_business": "企业商务"
			},
			"5": {
        "root_manager": "ROOT管理",
				"root_business": "ROOT商务",
				"root_worker": "ROOT平台运营",
				"root_produce_worker": "ROOT生产运营"
			}
		},
		"crowdsourcings": [{
    "id": "41",
			"name": "测试",
			"logo": "//devv2.public.basicfinder.com/2018/05/31/5b0fd3a5adb19_1527763877.png"
		}]
	}
}
         */
    }

    /**
     * 编辑用户
    接口说明：创建用户后，可以通过编辑用户接口，来修改用户的状态和用户的其他信息。并向被修改的用户，发送站内消息，提醒用户已修改信息。
     * @return mixed
     */
    public function update()
    {
        $params = [
            "user_id" => 38043,
            "nickname" => "update-name"
            /**
             * 可选参数
             * email	否	string	邮箱，唯一，最大为254位
            password	否	string	没有值时不修改密码，有值会修改密码，密码由数字和字母组成
            roles	    否	string	角色,多个以逗号(,)隔开
            type	    否	int	用户平台类型
            status	    否	string	用户状态
            avatar	    否	string	头像
            site_id	    否	int	租户id
            phone	    否	string	手机号或电话，必须为5-20位
            nickname	否	string	用户昵称，由字母、汉字、数字和点组成，2-16位
             */
        ];
        return $this->saas->user->update($params);
        /**
         * 返回结果
         *{
            "error":"",
            "message":"",
            "data":"1"
        }
         */
    }

}