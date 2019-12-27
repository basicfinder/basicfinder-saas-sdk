<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Template extends BaseApi
{
    /**
     * 模板列表
     * @param $params
     * @return bool|mixed|string
     */
    public function templateList($params = array())
    {
        $default = ["limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->post('/template/list', $params);
    }

    /**
     * 模板表单
     * @param $params
     * @return bool|mixed|string
     */
    public function form($params = array())
    {
        return $this->post('/template/form', $params);
    }

    /**
     * 创建模板
     * @param $params
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->post('/template/create', $params);
    }

    /**
     * 模板详情
     * @param $params
     * @return bool|mixed|string
     */
    public function detail($params = array())
    {
        return $this->post('/template/detail', $params);
    }

    /**
     * 编辑模板
     * @param $params
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        return $this->post('/template/update', $params);
    }

    /**
     * 复制模板
     * @param $params
     * @return bool|mixed|string
     */
    public function copy($params = array())
    {
        return $this->post('/template/copy', $params);
    }

    /**
     * 删除模板
     * @param $params
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->post('/template/delete', $params);
    }

    /**
     * 选择项目使用模板
     * @param $params
     * @return bool|mixed|string
     */
    public function useTemplate($params = array())
    {
        return $this->post('/template/use', $params);
    }


}