<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class MessageTest
{
    private $saas;

    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('liujianping@basicfinder.com', 'bf123456', 'pc-root', '1.0.0', 'Win32', '666');
    }

    private function authAdmin()
    {
        $this->saas->auth('1234566@qq.com', 'bf123456', 'pc-passport','1.0.0', 'Win32', '111');
    }

    private function authCrowdsourcing()
    {
        $this->saas->authCrowdsourcing('zhognbao1@126.com', 'bf123456', 'pc-crowdsourcing','1.0.0', 'Win32', '111');
    }

    /**
     *
     */
    public function noticeList()
    {
        $params = [
            "limit" => 5,
            "page" => 1
            /**
             * 可选参数
             * notice_type	    否	int	公告类型
                orderby	        否	String	排序字段
                type	        否	int	投放位置
                keyword	        否	string	关键字搜索
                sort	        否	int	排序方式（正序或倒序）
                show_time_limit	否	String	消息时间节点
             */
        ];
        return $this->saas->message->noticeList($params);
        /**
         * 返回结果
         * array ( 'data' => array ( 'list' => array ( 0 => array ( 'id' => '143', 'notice_type' => '1', 'site_id' => '0', 'user_id' => '38028', 'title' => '管理-公告', 'version' => '1.0', 'update_log' => '', 'content' => '
        797946461313

        ', 'link' => '', 'status' => '0', 'read_count' => '0', 'show_start_time' => '1577030400', 'show_end_time' => '1577203199', 'created_at' => '1577067687', 'updated_at' => '1577067687', 'sender' => array ( 'id' => '38028', 'email' => 'liujianping@basicfinder.com', 'avatar' => '', 'nickname' => 'liujianping', ), 'positions' => array ( 0 => array ( 'notice_id' => '143', 'type' => '1', ), ), ), ), 'count' => '1', 'type' => array ( 1 => '管理员', 2 => '团队', 5 => 'ROOT', ), 'notice_type' => array ( 1 => '普通公告', 2 => '更新公告', ), 'status' => array ( 0 => '正常', 1 => '删除', ), ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 发送公告
     * @return mixed
     */
    public function create()
    {
        $params = [
            "type" => 1,
            "title" => "管理-公告-2",
            "content" => "<p>管理-公告-2管理-公告-2</p>",
            "show_start_time" => "2019-12-23",
            "show_end_time" => "2019-12-24"
            /**
             * 可选参数
             *  notice_type	否	int	    公告类型
                version	    否	String	版本信息
                update_log	否	String	更新日志
             */
        ];
        return $this->saas->message->create($params);
        /**
         * 返回结果
         * array ( 'data' => array ( 'result' => '1', ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 编辑公告
     * @return mixed
     */
    public function update()
    {
        $params = [
            "notice_id" => 145,
            "type" => 1,
            "title" => "管理-公告-2-update",
            "content" => "<p>管理-公告-2管理-公告-2-update</p>",
            "show_start_time" => "2019-12-23",
            "show_end_time" => "2019-12-24"
            /**
             * 可选参数
             *  notice_type	否	int	    公告类型
            version	    否	String	版本信息
            update_log	否	String	更新日志
             */
        ];
        return $this->saas->message->update($params);
        /**
         * 返回结果
         *array ( 'data' => array ( 'result' => '1', ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 删除公告
     * @return mixed
     */
    public function delete()
    {
        $params = ["notice_id" => 145];
        return $this->saas->message->delete($params);
        /**
         * 返回结果
         *array ( 'data' => array ( 'result' => '1', ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 系统通知
     * @return mixed
     */
    public function messageList()
    {
        $params = [
            "limit" => 5,
            "page" => 1
            /**
             * 可选参数
             * date	否	int	消息时间
            keyword	否	string	关键字搜索
             */
        ];
        return $this->saas->message->messageList($params);
        /**
         * 返回结果
         * array ( 'data' => array ( 'date' => '1912', 'dates' => array ( 0 => '1904', 1 => '1905', 2 => '1906', 3 => '1907', 4 => '1908', 5 => '1909', 6 => '1910', 7 => '1911', 8 => '1912', ), 'type' => array ( 0 => '服务消息', 1 => '账户消息', 2 => '项目消息', 3 => '作业消息', 4 => '活动消息', 5 => '推送消息', ), 'status' => array ( 0 => '已启用', 2 => '已删除', 1 => '已撤销', ), 'list' => array ( 0 => array ( 'id' => '4816', 'site_id' => '0', 'user_id' => '0', 'type' => '2', 'status' => '0', 'read_count' => '0', 'content' => '{"action":"project_unpack_succ","content":"项目(id:15374)解包完成, 发布完成","trans_params":{"0":"项目(id:{project_id})解包完成, 发布完成","project_id":"15374"},"params":{"user_id":"38038"}}', 'link_word' => '', 'link_type' => '0', 'link_attribute' => '', 'table_suffix' => '1912', 'created_at' => '1577090346', 'updated_at' => '0', 'sender' => '', ), 1 => array ( 'id' => '4815', 'site_id' => '0', 'user_id' => '0', 'type' => '3', 'status' => '0', 'read_count' => '0', 'content' => '{"action":"task_execute","content":"您被添加到作业执行人员列表, %s点击执行任务%s","params":{"project_id":"15374","task_id":"17196"}}', 'link_word' => '', 'link_type' => '0', 'link_attribute' => '', 'table_suffix' => '1912', 'created_at' => '1577090322', 'updated_at' => '0', 'sender' => '', ), 2 => array ( 'id' => '4814', 'site_id' => '0', 'user_id' => '0', 'type' => '3', 'status' => '0', 'read_count' => '0', 'content' => '{"action":"task_execute","content":"您被添加到作业执行人员列表, %s点击执行任务%s","params":{"project_id":"15374","task_id":"17197"}}', 'link_word' => '', 'link_type' => '0', 'link_attribute' => '', 'table_suffix' => '1912', 'created_at' => '1577090322', 'updated_at' => '0', 'sender' => '', ), 3 => array ( 'id' => '4813', 'site_id' => '0', 'user_id' => '0', 'type' => '2', 'status' => '0', 'read_count' => '0', 'content' => '{"action":"project_unpack_succ","content":"项目(id:15373)解包完成, 发布完成","trans_params":{"0":"项目(id:{project_id})解包完成, 发布完成","project_id":"15373"},"params":{"user_id":"32382"}}', 'link_word' => '', 'link_type' => '0', 'link_attribute' => '', 'table_suffix' => '1912', 'created_at' => '1577090283', 'updated_at' => '0', 'sender' => '', ), 4 => array ( 'id' => '4812', 'site_id' => '0', 'user_id' => '0', 'type' => '5', 'status' => '0', 'read_count' => '0', 'content' => '{"action":"mytask_detail","content":"恭喜, 您的作业审核通过!","params":{"project_id":"15357","task_id":"17140","data_id":"7407","type":"3"}}', 'link_word' => '', 'link_type' => '0', 'link_attribute' => '', 'table_suffix' => '1912', 'created_at' => '1577090223', 'updated_at' => '0', 'sender' => '', ), ), 'count' => '4816', ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 发送通知
     * @return mixed
     */
    public function send()
    {
        $params = [
            "message" => "服务消息-系统通知-1",
            "type" => 0
        ];
        return $this->saas->message->send($params);
        /**
         * 返回结果
         *array ( 'data' => array ( 'result' => '1', ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 撤销通知
     * @return mixed
     */
    public function revoke()
    {
        $params = [
            "message_id" => 4821,
            "date" => 1912
        ];
        return $this->saas->message->revoke($params);
        /**
         * 返回结果
         * {"error":"","message":"","data":{"result":"1"}}
         */
    }

    /**
     * 我的消息列表
     * @return mixed
     */
    public function userMessages()
    {
        $this->authCrowdsourcing();
        $params = [
            /**
             * 可选参数
            date	否	String	日期，例如：1912
            page	否	int	页数
            limit	否	int	每页展示数据量
            orderby	否	String	排序字段
            sort	否	int	排序方式（正序asc或倒序desc）
            type	否	string	消息类型，多个以,号隔开
            user_id	否	int	用户ID
            site_id	否	String	租户ID
            start_time	否	String	开始时间,时间戳
            end_time	否	String	结束时间,时间戳
             */
        ];
        return $this->saas->message->userMessages($params);
        /**
         * 返回结果
         *array ( 'data' => array ( 'date' => '1912', 'list' => array ( 0 => array ( 'id' => '5227', 'message_id' => '4802', 'site_id' => '0', 'user_id' => '38030', 'type' => '1', 'is_read' => '0', 'status' => '0', 'created_at' => '1577074908', 'updated_at' => '0', 'message' => array ( 'id' => '4802', 'read_count' => '0', 'content' => array ( 'action' => 'user_update_email', 'content' => '您修改了资料', 'params' => array ( 'user_id' => '38030', ), ), 'link_word' => '', 'link_type' => '0', 'link_attribute' => '', ), 'user' => array ( 'id' => '38030', 'nickname' => '众包1', 'email' => 'zhognbao1@126.com', 'avatar' => '', ), ), 1 => array ( 'id' => '5218', 'message_id' => '4793', 'site_id' => '0', 'user_id' => '38030', 'type' => '1', 'is_read' => '0', 'status' => '0', 'created_at' => '1577074617', 'updated_at' => '0', 'message' => array ( 'id' => '4793', 'read_count' => '0', 'content' => array ( 'action' => 'user_update_email', 'content' => '您修改了资料', 'params' => array ( 'user_id' => '38030', ), ), 'link_word' => '', 'link_type' => '0', 'link_attribute' => '', ), 'user' => array ( 'id' => '38030', 'nickname' => '众包1', 'email' => 'zhognbao1@126.com', 'avatar' => '', ), ), 2 => array ( 'id' => '5217', 'message_id' => '4792', 'site_id' => '0', 'user_id' => '38030', 'type' => '1', 'is_read' => '0', 'status' => '0', 'created_at' => '1577074591', 'updated_at' => '0', 'message' => array ( 'id' => '4792', 'read_count' => '0', 'content' => array ( 'action' => 'user_update_email', 'content' => '您修改了资料', 'params' => array ( 'user_id' => '38030', ), ), 'link_word' => '', 'link_type' => '0', 'link_attribute' => '', ), 'user' => array ( 'id' => '38030', 'nickname' => '众包1', 'email' => 'zhognbao1@126.com', 'avatar' => '', ), ), 3 => array ( 'id' => '4165', 'message_id' => '3794', 'site_id' => '0', 'user_id' => '38030', 'type' => '0', 'is_read' => '0', 'status' => '0', 'created_at' => '1576470925', 'updated_at' => '0', 'message' => array ( 'id' => '3794', 'read_count' => '0', 'content' => array ( 'action' => 'user_qualification_auto_suc', 'content' => '恭喜，您的资历认证自动审核通过！', 'params' => array ( 'user_id' => '38030', ), ), 'link_word' => '', 'link_type' => '0', 'link_attribute' => '', ), 'user' => array ( 'id' => '38030', 'nickname' => '众包1', 'email' => 'zhognbao1@126.com', 'avatar' => '', ), ), 4 => array ( 'id' => '4164', 'message_id' => '3793', 'site_id' => '0', 'user_id' => '38030', 'type' => '1', 'is_read' => '0', 'status' => '0', 'created_at' => '1576469274', 'updated_at' => '0', 'message' => array ( 'id' => '3793', 'read_count' => '0', 'content' => array ( 'action' => 'user_signup_succ', 'content' => '恭喜您注册成功', 'params' => array ( 'user_id' => '38030', ), ), 'link_word' => '', 'link_type' => '0', 'link_attribute' => '', ), 'user' => array ( 'id' => '38030', 'nickname' => '众包1', 'email' => 'zhognbao1@126.com', 'avatar' => '', ), ), ), 'count' => '5', 'dates' => array ( 0 => '1904', 1 => '1905', 2 => '1906', 3 => '1907', 4 => '1908', 5 => '1909', 6 => '1910', 7 => '1911', 8 => '1912', ), 'types' => array ( 0 => '服务消息', 1 => '账户消息', 2 => '项目消息', 3 => '作业消息', 4 => '活动消息', 5 => '推送消息', ), ), 'error' => '', 'message' => '', )
         */
    }

}