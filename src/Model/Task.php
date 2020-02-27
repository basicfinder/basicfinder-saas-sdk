<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Task extends BaseApi
{
    /**
     * 任务列表
     * @param $params
     * 可选参数
        keyword	否	String	关键字搜索
        orderby	否	String	排序字段
        sort	否	String	排序方式（正序或倒序）
        limit	是	int	每页展示数据量
        page	是	int	页数
        category_id	string	可选	类别ID集合
     * @return bool|mixed|string
     */
    public function taskList($params = array())
    {
        $default = ["limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->postWithAccessToken('/task/list', $params);
    }

    /**
     * 任务详情
     * @param $params
     * 可选参数
        task_id	是	int	任务id
     * @return bool|mixed|string
     */
    public function detail($params = array())
    {
        return $this->postWithAccessToken('/task/detail', $params);
    }

    /**
     * 设置人员
     * @param $params
     * 可选参数
        task_id	是	int	任务id
        op	是	String	操作区分（add添加、delete删除）
        user_id	是	int	用户id
     * @return bool|mixed|string
     */
    public function assignUser($params = array())
    {
        return $this->postWithAccessToken('/task/assign-user', $params);
    }

    /**
     * 任务绩效
     * @param $params
     * 可选参数
        keyword	否	String	关键字搜索
        orderby	否	String	排序字段
        sort	否	String	排序方式（正序或倒序）
        limit	是	int	每页展示数据量
        page	是	int	页数
        task_id	否	int	任务id
        project_id	是	int	项目id
        step_id	否	int	工序id
     * @return bool|mixed|string
     */
    public function statTask($params = array())
    {
        $default = ["limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->postWithAccessToken('/stat/task', $params);
    }

    /**
     * 领取任务
     * @param $params
     * 可选参数
        project_id	是	int	项目id
        task_id	            是	int	任务id
        user_id	            否	int	作业所属用户id
        data_sort	否	int	yes否按顺序领取作业：0.是 1.否
        op	                         是	String	固定为:fetch
        data_ids	否	int	领取指定的作业id
     * @return bool|mixed|string
     */
    public function execute($params = array())
    {
        return $this->postWithAccessToken('/task/execute', $params);
    }

    /**
     * 执行任务
     * @param $params
     * 可选参数
        project_id	是	int	项目id
        task_id	是	int	任务id
        op	是	string	固定为execute
        data_id	是	int	作业id
        user_id	否	int	作业所属用户id
     * @return bool|mixed|string
     */
    public function execute2($params = array())
    {
        return $this->postWithAccessToken('/task/execute', $params);
    }

    /**
     * 提交任务
     * @param $params
     * 可选参数
        project_id	是	int	项目id
        task_id	是	int	任务id
        op	是	String	固定为submit
        data_id	是	int	作业id
        result	是	String	作业结果,必须保持 作业id=>作业结果 键值对
        user_id	否	int	user ID
     * @return bool|mixed|string
     */
    public function execute3($params = array())
    {
        return $this->postWithAccessToken('/task/execute', $params);
    }

    /**
     * 获取资源
     * @param $params
     * 可选参数
        project_id	是	int	项目id
        data_id	是	int	作业id
        type	是	int	操作类型
     * @return bool|mixed|string
     */
    public function resource($params = array())
    {
        return $this->postWithAccessToken('/task/resource', $params);
    }

    /**
     * 作业列表
     * @param $params
     * 可选参数
        keyword	否	String	关键字搜索
        orderby	否	String	排序字段
        sort	否	String	排序方式（正序或倒序）
        limit	是	int	每页展示数据量
        page	是	int	页数
        op	否	int	操作类型,-1:全部(默认),0:待领取,1:执行中,即作业中,2:已提交,3：已通过,4:已失效,6:被驳回，7:挂起，疑难作业,8:返回作业,9:执行中和挂起的
        task_id	是	int	任务id
        user_id	否	int	user ID（众包查询时不要传）
     * @return bool|mixed|string
     */
    public function workList($params = array())
    {
        return $this->postWithAccessToken('/work/list', $params);
    }

    /**
     * 作业操作记录
     * @param $params
     * 可选参数
        project_id	是	int	项目id
        data_id	是	int	作业id
     * @return bool|mixed|string
     */
    public function records($params = array())
    {
        return $this->postWithAccessToken('/work/records', $params);
    }

    /**
     * 作业结果
     * @param $params
     * @return bool|mixed|string
     */
    public function result($params = array())
    {
        return $this->postWithAccessToken('/work/result', $params);
    }

    /**
     * 众包首页的任务列表
     * @param $params
     * @return bool|mixed|string
     */
    public function getCrowdsourcingTaskList($params = array())
    {
        return $this->postWithAccessToken('/site/get-crowdsourcing-task-list', $params);
    }

    /**
     * 我的任务列表
     * @param $params
     * 可选参数
        keyword	否	String	关键字搜索
        orderby	否	String	排序字段
        sort	否	String	排序方式（正序或倒序）
        limit	是	int	每页展示数据量
        page	是	int	页数
        category_id	否	int	分类id
        category_type	否	int	分类类型,0:标注类,1:采集类
        view_type	否	string	展示渠道,多个以逗号,隔开,0:全部(默认),1:web,2:app
     * @return bool|mixed|string
     */
    public function tasks($params = array())
    {
        return $this->postWithAccessToken('/task/tasks', $params);
    }

    /**
     * 我的绩效列表
     * @param $params
     * 可选参数
        keyword	否	String	关键字搜索
        orderby	否	String	排序字段 可支持如下:id,task_id,work_time,work_count,join_count,allowed_count,refused_count,reseted_count,updated_at
        sort	否	String	排序方式（正序或倒序）
        limit	是	int	每页展示数据量
        page	是	int	页数
        category_type	否	int	分类类型,0:标注类,1:采集类
     * @return bool|mixed|string
     */
    public function userStatList($params = array())
    {
        return $this->postWithAccessToken('/stat/user-stat-list', $params);
    }

}
