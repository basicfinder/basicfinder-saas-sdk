<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Category extends BaseApi
{
    /**
     * 分类列表
     * @param $params
     * 可选参数
        site_id	否	int	租户id
        file_type	否	int	文件类型
        orderby	否	String	排序字段
        type	否	int	标注类型
        project_type	否	int	项目类型,1自有项目(默认),2倍赛运营中心项目
        keyword	否	string	关键字搜索
        sort	否	int	排序方式（正序或倒序）
        limit	是	int	每页展示数据量
        page	是	int	页数
     * @return bool|mixed|string
     */
    public function categories($params = array())
    {
        return $this->postWithAccessToken('/category/categories', $params);
    }

    /**
     * 创建分类
     * @param $params
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        $params = http_build_query($params);
        return $this->postWithAccessToken('/category/create', $params);
    }

    /**
     * 编辑分类
     * @param $params
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        $params = http_build_query($params);
        return $this->postWithAccessToken('/category/update', $params);
    }

    /**
     * 删除分类
     * @param $params
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->postWithAccessToken('/category/delete', $params);
    }

}