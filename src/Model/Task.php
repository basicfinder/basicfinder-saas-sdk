<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Task extends BaseApi
{
    /**
     * 任务列表
     * @param $params
     * @return bool|mixed|string
     */
    public function taskList($params = array())
    {
        $default = ["limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->post('/task/list', $params);
    }

    /**
     * 任务详情
     * @param $params
     * @return bool|mixed|string
     */
    public function detail($params = array())
    {
        return $this->post('/task/detail', $params);
    }

    /**
     * 设置人员
     * @param $params
     * @return bool|mixed|string
     */
    public function assignUser($params = array())
    {
        return $this->post('/task/assign-user', $params);
    }

    /**
     * 任务绩效
     * @param $params
     * @return bool|mixed|string
     */
    public function statTask($params = array())
    {
        $default = ["limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->post('/stat/task', $params);
    }

    /**
     * 领取任务
     * @param $params
     * @return bool|mixed|string
     */
    public function execute($params = array())
    {
        return $this->post('/task/execute', $params);
    }

    /**
     * 执行任务
     * @param $params
     * @return bool|mixed|string
     */
    public function execute2($params = array())
    {
        return $this->post('/task/execute', $params);
    }

    /**
     * 提交任务
     * @param $params
     * @return bool|mixed|string
     */
    public function execute3($params = array())
    {
        $params = http_build_query($params);
        return $this->post('/task/execute', $params);
    }

    /**
     * 获取资源
     * @param $params
     * @return bool|mixed|string
     */
    public function resource($params = array())
    {
        return $this->post('/task/resource', $params);
    }

    /**
     * 作业列表
     * @param $params
     * @return bool|mixed|string
     */
    public function workList($params = array())
    {
        return $this->post('/work/list', $params);
    }

    /**
     * 作业操作记录
     * @param $params
     * @return bool|mixed|string
     */
    public function records($params = array())
    {
        return $this->post('/work/records', $params);
    }

    /**
     * 作业结果
     * @param $params
     * @return bool|mixed|string
     */
    public function result($params = array())
    {
        return $this->post('/work/result', $params);
    }

    /**
     * 众包首页的任务列表
     * @param $params
     * @return bool|mixed|string
     */
    public function getCrowdsourcingTaskList($params = array())
    {
        return $this->post('/site/get-crowdsourcing-task-list', $params);
    }

    /**
     * 我的任务列表
     * @param $params
     * @return bool|mixed|string
     */
    public function tasks($params = array())
    {
        return $this->post('/task/tasks', $params);
    }

    /**
     * 我的绩效列表
     * @param $params
     * @return bool|mixed|string
     */
    public function userStatList($params = array())
    {
        return $this->post('/stat/user-stat-list', $params);
    }

}
