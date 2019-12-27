<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class FinanceTest
{
    private $saas;

    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('liujianping@basicfinder.com', 'bf123456', 'pc-root', '1.0.0', 'Win32', '666');
    }

    /**
     * 众包登录
     */
    public function loginCrowdsourcing()
    {
        $this->saas->authCrowdsourcing('zhognbao1@126.com', 'bf123456');
    }

    /**
     * 收入列表
     * @return mixed
     */
    public function moneys()
    {
        $params = [
            'limit' => 2,
            /**
             * 可选参数
             * page	否	int	页码,默认1
            limit	否	int	每页请求数,默认10
            keyword	否	int	关键字
            orderby	否	string	排序字段
            sort	否	string	排序方式
            type	否	int	搜索类型，0:所有,1:列表区只展示累计收入或预期收入不为0的用户信息
             */
        ];
        return $this->saas->finance->moneys($params);
        /**
         * 返回结果
         * array ( 'data' => array ( 'orderby' => 'income_total', 'sort' => 'desc', 'count' => '5378', 'list' => array ( 0 => array ( 'user_id' => '32620', 'money' => '3090.000', 'money_lock' => '2110.000', 'income_total' => '5200.000', 'money_expect' => '1804.827', 'withdrawal_total' => '0.00', 'money_taxes' => '0.00', 'withdrawal_count' => '15', 'verify_token' => 'rc+8VSITo+qR2pwUlqUONleaBNeOhl5lLtB9sJ4hegMI81YE8LInn8NHFYoHvRm6cY0DTLe8dCPtRZbxg1OqqMvnqX30qtLYMw', 'created_at' => '1573700631', 'updated_at' => '1574307736', 'user' => array ( 'id' => '32620', 'nickname' => '22222', 'realname' => '沙箱环境', 'mobile' => '17600395460', ), 'userEpay' => array ( ), ), 1 => array ( 'user_id' => '32502', 'money' => '760.980', 'money_lock' => '350.000', 'income_total' => '1200.980', 'money_expect' => '509.310', 'withdrawal_total' => '90.00', 'money_taxes' => '0.00', 'withdrawal_count' => '12', 'verify_token' => 'rc+8VSITo+qR2s4QxqkNMgqbBdWGhw4wKNV5tpc/bQsInDoD8a0ngcMoFOcCvwezZ41sSdi0YiDoW/H6hCKqtsuIqQz0tNI', 'created_at' => '1573700599', 'updated_at' => '1575025455', 'user' => array ( 'id' => '32502', 'nickname' => 'cible01', 'realname' => '沙箱庆余年', 'mobile' => '13700000001', ), 'userEpay' => array ( 0 => array ( 'id' => '26', 'user_id' => '32502', 'account' => '791426617@qq.com', 'real_name' => '沙箱庆余年', 'status' => '1', 'type' => '1', 'operator_id' => '32502', 'operated_at' => '1575008393', 'created_at' => '1575008393', 'updated_at' => '1575008393', ), ), ), ), 'keyword' => '', 'type' => '', 'sumMoney' => array ( 'cur_page' => array ( 'income_total' => '6400.98', 'money_expect' => '2314.14', 'money' => '3850.98', 'money_taxes' => '0.00', ), 'total_page' => array ( 'income_total' => '7311.08', 'money_expect' => '4019.52', 'money' => '4551.08', 'money_taxes' => '0.00', ), ), 'epay_types' => array ( 1 => '支付宝', ), ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 金额详细
     * @return mixed
     */
    public function moneyDetail()
    {
        $params = [
            "user_id" => 32620
        ];
        return $this->saas->finance->moneyDetail($params);
        /**
         * 返回结果
         *array ( 'data' => array ( 'money' => array ( 'user_id' => '32620', 'money' => '3090.000', 'money_lock' => '2110.000', 'income_total' => '5200.000', 'money_expect' => '1804.827', 'withdrawal_total' => '0.00', 'money_taxes' => '0.00', 'withdrawal_count' => '15', 'verify_token' => 'rc+8VSITo+qR2pwUlqUONleaBNeOhl5lLtB9sJ4hegMI81YE8LInn8NHFYoHvRm6cY0DTLe8dCPtRZbxg1OqqMvnqX30qtLYMw', 'created_at' => '1573700631', 'updated_at' => '1574307736', 'withdrawalCountMonth' => array ( 'count' => '0', ), 'user' => array ( 'id' => '32620', 'nickname' => '22222', 'realname' => '沙箱环境', 'mobile' => '17600395460', ), 'userEpay' => array ( ), ), 'epay_types' => array ( 1 => '支付宝', ), ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 提现列表
     * @return mixed
     */
    public function withdrawals()
    {
        $params = [
            "limit" => 2,
            /**
             * 可选参数
             * user_id	        否	int	用户id
                page	        否	int	页码,默认1
                limit	        否	int	每页请求数,默认10
                create_time_beg	否	int	申请时间的开始时间戳
                create_time_end	否	int	申请时间的结束时间戳
             */
        ];
        return $this->saas->finance->withdrawals($params);
        /**
         * 返回结果
         *array ( 'data' => array ( 'list' => array ( 0 => array ( 'id' => '65', 'user_id' => '32502', 'money' => '10.00', 'money_taxes' => '0.00', 'money_real' => '10.00', 'money_before' => '770.980', 'money_after' => '760.980', 'status' => '1', 'message' => '111111111111', 'payment_key' => '201911291904155de0fb2f3a1dd', 'payment_type' => '1', 'payment_account' => '791426617@qq.com', 'payment_username' => '沙箱庆余年', 'payment_id' => '', 'pay_callback' => '', 'payment_start_time' => '0', 'payment_end_time' => '0', 'operator_id' => '32330', 'verify_token' => 'rc+8VSITo+qR2s5CxKZZZFXMBtGMhQhiLdd/sIkhZANn8ycG8bNIgMNZFeUC0B69b5MKRNjSeyXpRZf7hFOtv8rjqxTytdWocrJCndeyBHp2GYnl7E6pgwuKhsTog4s+', 'created_at' => '1575025455', 'updated_at' => '1575025503', 'operation_times_month' => '12', 'email' => 'cible01@cd.com', 'nickname' => 'cible01', 'mobile' => '13700000001', ), 1 => array ( 'id' => '64', 'user_id' => '32502', 'money' => '10.00', 'money_taxes' => '0.00', 'money_real' => '10.00', 'money_before' => '780.980', 'money_after' => '770.980', 'status' => '3', 'message' => '', 'payment_key' => '201911291856335de0f961bfb15', 'payment_type' => '1', 'payment_account' => '791426617@qq.com', 'payment_username' => '沙箱庆余年', 'payment_id' => '', 'pay_callback' => '{"code":"40004","msg":"Business Failed","sub_code":"PAYEE_NOT_EXIST","sub_msg":"收款账号不存在","out_biz_no":"201911291856335de0f961bfb15"}', 'payment_start_time' => '1575025105', 'payment_end_time' => '1575025106', 'operator_id' => '32330', 'verify_token' => 'rc+8VSITo+qR2pkWwvUON1HMA42H0gxjfNN/sIkhZANn8ycG8bNIgMNZFeUC0B6yb5MKRNjSeyTpRZf7hFOtv8rjqxTytdWocrJCndeyBHp2GYnl7E6pgwuKhsTog4s8', 'created_at' => '1574058501', 'updated_at' => '1575025106', 'operation_times_month' => '12', 'email' => 'cible01@cd.com', 'nickname' => 'cible01', 'mobile' => '13700000001', ), ), 'count' => '38', 'statuses' => array ( 0 => '申请中', 1 => '审核不通过', 2 => '审核通过', 3 => '提现失败', 4 => '提现成功', 5 => '挂起', ), 'payment_types' => array ( 1 => '支付宝', ), 'orderby' => 'id', 'sort' => 'desc', 'keyword' => '', 'status' => '', 'payment_type' => '', ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 提现表单
     * @return mixed
     */
    public function withdrawalForm()
    {
        $params = [];
        return $this->saas->finance->withdrawalForm($params);
        /**
         * 返回结果
         * array ( 'data' => array ( 'money' => array ( 'user_id' => '38028', 'money' => '0.000', 'money_lock' => '0.000', 'income_total' => '0.000', 'money_expect' => '0.000', 'withdrawal_total' => '0.00', 'money_taxes' => '0.00', 'withdrawal_count' => '0', 'verify_token' => 'rc+8VSITo+qR2s0RkKRfNwKeUYKPglNhLYV+rpchZGwI7TkG8dwnn8NHFYoCoRm6b+IDUti9fEzpRZ7zhA', 'created_at' => '1577093270', 'updated_at' => '0', ), 'money_taxes' => array ( 10 => '0', 30 => '0', 50 => '0', 100 => '0', 200 => '0', 500 => '0', ), 'curMonthWithdrawalMoney' => '0.00', 'user_epay' => array ( ), 'user_qualification' => '', 'payment_types' => array ( 1 => '支付宝', ), 'money_range' => array ( 0 => '10', 1 => '30', 2 => '50', 3 => '100', 4 => '200', 5 => '500', ), 'qualification_statuses' => array ( 0 => '待审核', 1 => '人工通过', 2 => '未通过', 3 => '自动通过', ), ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 申请提现
     * @return mixed
     */
    public function withdrawalCreate()
    {
        $this->loginCrowdsourcing();
        $params = [
            "money" => 10,
            "money_taxes" => 0,
            "money_real" => 10,
            "payment_type" => 1,
            "payment_account" => 'zhognbao1@126.com',
            "payment_username" => "伍欣然"
        ];
        return $this->saas->finance->withdrawalCreate($params);
        /**
         * 返回数据
         *{"error":"","message":"","data":{"user_id":"38030","money":"10"}}
         */
    }

    /**
     * 提现审核
     * @return mixed
     */
    public function withdrawalUpdate()
    {
        $params = [
            "withdrawal_id" => 66,
            "upd_status" => 2 // 欲处理的状态：1不通过,2通过,5挂起
            /**
             * 可选参数
             * message	否	string	不通过时原因
             */
        ];
        return $this->saas->finance->withdrawalUpdate($params);
        /**
         * 返回结果
         * {
                "error": "",
                "message": "",
                "data": {
                    "withdrawal_id": "66"
                }
            }
         */
    }

    /**
     * 用户任务财务列表
     * @return mixed
     */
    public function tasks()
    {
        $this->loginCrowdsourcing();
        $params = [
            /**
             * 可选参数
            user_id	否	int	用户id
            page	否	int	页码,默认1
            limit	否	int	每页请求数,默认10
            orderby	否	string	排序字段,支持id(默认),task_id
            sort	否	int	排序方式,asc升序,desc降序(默认)
            step_id	否	int	工序id
            task_id	否	int	任务id
             */
        ];
        return $this->saas->finance->tasks($params);
        /**
         * 返回结果
         * array ( 'data' => array ( 'count' => '2', 'list' => array ( 0 => array ( 'id' => '6501', 'project_id' => '15400', 'batch_id' => '6220', 'step_id' => '12694', 'task_id' => '17270', 'user_id' => '38030', 'work_time' => '14', 'work_count' => '1', 'submit_count' => '1', 'join_count' => '1', 'label_count' => '0', 'submit_stat' => '', 'allow_stat' => '', 'verify_stat' => '', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'polygon_count' => '0', 'sharepoint_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'audited_count' => '1', 'allowed_count' => '1', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'money' => '100.000', 'money_expect' => '0.000', 'created_at' => '1577155799', 'updated_at' => '1577155846', 'project' => array ( 'id' => '15400', 'name' => '图片审核-众包-rent-2', 'amount' => '1', 'category_id' => '10', 'user_id' => '38032', 'table_suffix' => '1912', 'category' => array ( 'id' => '10', 'type' => '0', 'status' => '0', 'file_type' => '0', 'view' => 'image_transcription', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,tif', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'icon' => '/images/category/icon-small/image-clean.png', 'thumbnail' => '/images/category/icon-big/image-clean.png', 'video_as_frame' => '0', 'desc' => array ( 'id' => '47', 'category_id' => '10', 'language' => 'zh-CN', 'name' => '图片审核', 'keywords' => '表情，情绪，分析', 'description' => '根据人物展现的表情判断情绪分类', 'instruction_url' => '/images/category/preview/bqfx.png', 'template_id' => '318', ), ), ), 'task' => array ( 'id' => '17270', 'name' => '图片审核-众包-rent-2-1-执行', 'status' => '0', ), 'taskAttribute' => array ( 'task_id' => '17270', 'attr_description' => '
        100块大任务----加急

        ', 'price_config' => '{"id":"0","price":[{"name":"crowdsourcing_label_name_4","label_name":"","price":"100","amount":"crowdsourcing_amount_whole"}]}', 'created_at' => '1577155741', 'updated_at' => '1577155741', ), 'statUser' => array ( ), 'priceInfoList' => array ( 0 => array ( 'name' => '整份', 'pre_price' => '100', 'number' => '1', 'money_expect' => '0', 'money_account' => '100.000', 'money_total' => '100.000', ), ), ), 1 => array ( 'id' => '6489', 'project_id' => '14989', 'batch_id' => '5856', 'step_id' => '11786', 'task_id' => '16058', 'user_id' => '38030', 'work_time' => '272', 'work_count' => '8', 'submit_count' => '8', 'join_count' => '8', 'label_count' => '0', 'submit_stat' => '', 'allow_stat' => '', 'verify_stat' => '', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'polygon_count' => '0', 'sharepoint_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'money' => '0.000', 'money_expect' => '178.640', 'created_at' => '1577081409', 'updated_at' => '1577081610', 'project' => array ( 'id' => '14989', 'name' => '图片标注(9)', 'amount' => '9', 'category_id' => '11', 'user_id' => '32328', 'table_suffix' => '1912', 'category' => array ( 'id' => '11', 'type' => '0', 'status' => '0', 'file_type' => '0', 'view' => 'image_label', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,tif', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'icon' => '/images/category/icon-small/image-labelling.png', 'thumbnail' => '/images/category/icon-big/image-labelling.png', 'video_as_frame' => '1', 'desc' => array ( 'id' => '61', 'category_id' => '11', 'language' => 'zh-CN', 'name' => '图片标注', 'keywords' => '图片，矩形框', 'description' => '在图片中将规定的品类用矩形框标出', 'instruction_url' => '/images/category/preview/rzbk.png', 'template_id' => '329', ), ), ), 'task' => array ( 'id' => '16058', 'name' => '图片标注(9)-所有9张03.zip-执行', 'status' => '0', ), 'taskAttribute' => array ( 'task_id' => '16058', 'attr_description' => '
        33333333333333

        ', 'price_config' => '{"id":"0","price":[{"name":"crowdsourcing_label_name_4","label_name":"","price":"22.33","amount":"crowdsourcing_amount_whole"}]}', 'created_at' => '1575279882', 'updated_at' => '1575282630', ), 'statUser' => array ( 0 => array ( 'id' => '3232', 'project_id' => '11976', 'batch_id' => '2846', 'step_id' => '5386', 'task_id' => '6489', 'user_id' => '14407', 'work_time' => '565', 'work_count' => '5', 'submit_count' => '8', 'join_count' => '0', 'label_count' => '0', 'submit_stat' => '', 'allow_stat' => '', 'verify_stat' => '', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'polygon_count' => '0', 'sharepoint_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '5', 'refuse_count' => '1', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '2', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '1', 'difficult_revise_count' => '1', 'money' => '0.000', 'money_expect' => '0.000', 'created_at' => '1558337340', 'updated_at' => '1558339772', ), ), 'priceInfoList' => array ( 0 => array ( 'name' => '整份', 'pre_price' => '22.33', 'number' => '8', 'money_expect' => '178.64', 'money_account' => '0', 'money_total' => '178.64', ), ), ), ), 'sumMoney' => array ( 'cur_page' => array ( 'money_total' => '278.640', 'money_account' => '100.000', ), 'total_page' => array ( 'money_total' => '278.64', 'money_account' => '100.000', ), ), ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 用户任务作业财务列表
     * @return mixed
     */
    public function works()
    {
        $params = [
            "task_id" => 123, // 任务id
            /**
             * 可选参数
            user_id	否	int	用户id
            page	否	int	页码,默认1
            limit	否	int	每页请求数,默认10
            orderby	否	string	排序字段,支持id(默认),data_id,start_time,end_time
            sort	否	int	排序方式,asc升序,desc降序(默认)
            type	否	int	类型,多个以,号隔开
             */
        ];
        return $this->saas->finance->works($params);
        /**
         * 返回结果
         *{
            "error": "",
            "message": "",
            "data": {
                "count": "1",
                "list": [
                    {
                        "id": "3955",
                        "project_id": "14401",
                        "batch_id": "5333",
                        "step_id": "10472",
                        "task_id": "0",
                        "data_id": "2486",
                        "status": "4",
                        "type": "10",
                        "user_id": "32502",
                        "submit_count": "1",
                        "start_time": "1573701672",
                        "end_time": "1573701680",
                        "delay_times": "0",
                        "delay_time": "3600",
                        "is_effective": "0",
                        "is_refused": "0",
                        "label_count": "0",
                        "point_count": "0",
                        "line_count": "0",
                        "rect_count": "0",
                        "polygon_count": "0",
                        "sharepoint_count": "0",
                        "other_count": "0",
                        "label_time": "0",
                        "correct_rate": "0",
                        "is_correct": "1",
                        "money": "100.000",
                        "pay_status": "3",
                        "verify_token": "rc+8VSITo+qR2spLkKFdNgOcU4CHhVhjKoN/sJc/ZAMInDpp8LYggsRHFOMCvA",
                        "created_at": "1573701603",
                        "updated_at": "1573702150",
                        "workResult": {
                            "id": "1962",
                            "project_id": "0",
                            "data_id": "0",
                            "task_id": "0",
                            "work_id": "3955",
                            "result":"{\"info\":[{\"id\":\"89jvtkvsf17\",\"type\":\"form-radio\",\"value\":\"\愤\怒\",\"header\":\"wwwww\",\"required\":false,\"cBy\":\"32502\",\"cTime\":1573701726,\"mBy\":\"32502\",\"mTime\":1573701732},{\"id\":\"4b893011-dda3-4a48-bf04-0b7f7edb671c\",\"type\":\"form-radio\",\"value\":\"\选\项\一\",\"header\":\"\请\在\下\列\选\项\中\选\择\一\个\合\适\的\选\项: \",\"required\":false,\"cBy\":\"32502\",\"cTime\":1573701726,\"mBy\":\"\",\"mTime\":\"\"}],\"is_difficult\":0}",
                            "feedback": "",
                            "stat": "",
                            "price_info": "[{\"label\":\"\",\"name\":\"crowdsourcing_label_name_4\",\"price\":\"100\",\"number\":\"1\"}]"
                        }
                    }
                ],
                "statuses": {
                    "0": "待领取",
                    "1": "领取",
                    "2": "执行中",
                    "3": "已提交",
                    "4": "通过",
                    "5": "已失效",
                    "6": "被驳回",
                    "8": "待复审",
                    "7": "挂起中"
                },
                "types": {
                    "11": "驳回",
                    "12": "重置",
                    "18": "忽略",
                    "7": "超时",
                    "14": "被驳回",
                    "15": "被重置",
                    "19": "被忽略",
                    "41": "父工序修改",
                    "50": "被管理员驳回",
                    "51": "被管理员重置",
                    "53": "父工序重置",
                    "21": "驳回作业重置",
                    "23": "返工作业重置",
                    "9": "挂起",
                    "6": "放弃",
                    "60": "疑难作业重做",
                    "61": "疑难作业重置"
                },
                "payTypeStatus": [
                    "无收入变动",
                    "预期收入",
                    "扣除预期收入",
                    "已转入账户"
                ],
                "priceConfigLabelNames": {
                    "crowdsourcing_label_name_4": "整份"
                }
            }
        }
         */
    }

}