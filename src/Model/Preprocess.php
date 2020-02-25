<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Preprocess extends BaseApi
{
    /**
     * 已接入的外部模型列表
     * @param $params
     * @return bool|mixed|string
     */
    public function modelList($params = array())
    {
        return $this->postWithAccessToken('/aimodel/list', $params);
    }

    /**
     * 接入外部模型
     * @param $params
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->postWithAccessToken('/aimodel/create', $params);
    }

    /**
     * 编辑已接入的外部模型
     * @param $params
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        return $this->postWithAccessToken('/aimodel/update', $params);
    }

    /**
     * 删除已接入的外部模型
     * @param $params
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->postWithAccessToken('/aimodel/delete', $params);
    }

    /**
     * 接入脚本列表
     * @param $params
     * @return bool|mixed|string
     */
    public function aimodelCategoryList($params = array())
    {
        return $this->postWithAccessToken('/aimodel/category-list', $params);
    }

    /**
     * 二次开发接入脚本
    接口说明: 对于私有化部署的客户, 可以选择二次开发接入脚本. 对于平台的客户若有接入外部模型接口的需求, 需要联系客服, 由本公司技术人员定制开发.
     * @param $params
     * @return bool|mixed|string
     */
    public function create2($params = array())
    {
        return $this->postWithAccessToken('/aimodel/create', $params);
    }

    /**
     * 图片类常见物品识别
     * @param $params
     * @return bool|mixed|string
     */
    public function execute($params = array())
    {
        $params["op"] = "aimodel";
        $params["aimodel_id"] = 39;
        return $this->postWithAccessToken('/task/execute', $params);
    }

    /**
     * 辅助工具文本切分
     * @param $params
     * @return bool|mixed|string
     */
    public function execute2($params = array())
    {
        $params["op"] = "aimodel";
        $params["aimodel_id"] = 86;
        return $this->postWithAccessToken('/task/execute', $params);
    }

    /**
     * 辅助工具文本意图
     * @param $params
     * @return bool|mixed|string
     */
    public function execute3($params = array())
    {
        $params["op"] = "text-intention";
        return $this->postWithAccessToken('/task/execute', $params);
    }


}