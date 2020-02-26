<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Template extends BaseApi
{
    /**
     * 模板列表
     * @param $params
     * 可选参数
        keyword	    否	String	关键字搜索
        orderby	    否	String	排序字段
        sort	    否	String	排序方式（正序或倒序）
        status	    否	int	模板状态
        type	    否	int	模板类型
        category_id	否	int	分类id
        limit    是     int 每页数量
        page     是     int 页数
     * @return bool|mixed|string
     */
    public function templateList($params = array())
    {
        $default = ["limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->postWithAccessToken('/template/list', $params);
    }

    /**
     * 模板表单
     * @param $params
     * @return bool|mixed|string
     */
    public function form($params = array())
    {
        return $this->postWithAccessToken('/template/form', $params);
    }

    /**
     * 创建模板
     * @param $params
     * 可选参数
        config	是	json	模板信息
        name	是	String	模板名称
        type	是	int	模板类型
        category_id	是	int	模板分类id
        site_id	是	int	所属租户id
        mode	是	int	模板模式,0:常规(默认),1:采集快捷模板
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->postWithAccessToken('/template/create', $params);
    }

    /**
     * 模板详情
     * @param $params
     * 可选参数
        template_id	是	int	模板id
     * @return bool|mixed|string
     */
    public function detail($params = array())
    {
        return $this->postWithAccessToken('/template/detail', $params);
    }

    /**
     * 编辑模板
     * @param $params
     * 可选参数
        template_id	是	int	模板id
        config	是	json	模板信息
        name	是	String	模板名称
        type	是	int	模板类型
        category_id	是	int	模板分类id
        site_id	是	int	所属租户id
        mode	是	int	模板模式,0:常规(默认),1:采集快捷模板
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        return $this->postWithAccessToken('/template/update', $params);
    }

    /**
     * 复制模板
     * @param $params
     * 可选参数
        template_id	是	int	模板id
     * @return bool|mixed|string
     */
    public function copy($params = array())
    {
        return $this->postWithAccessToken('/template/copy', $params);
    }

    /**
     * 删除模板
     * @param $params
     * 可选参数
        template_id	是	int	模板id
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->postWithAccessToken('/template/delete', $params);
    }

    /**
     * 选择项目使用模板
     * @param $params
     * 可选参数
        template_id	是	int	模板id
     * @return bool|mixed|string
     */
    public function useTemplate($params = array())
    {
        return $this->postWithAccessToken('/template/use', $params);
    }


}