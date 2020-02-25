<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Project extends BaseApi
{
    /**
     * 项目列表只展示正常状态（发布中，配置中，作业中，已暂停，完成）的项目信息列表。
     * @param $params
     *
        keyword	        否	String	关键字搜索
        type	        否	String	项目类型
        name	        否	String	项目名称
        start_time	    否	String	项目开始时间
        end_time	    否	String	项目结束时间
        status	        否	String	项目状态
        orderby	        否	String	排序字段
        sort	        否	int	排序方式（正序或倒序）
        page	        否	int	页数
        limit	        否	int	每页展示数据量
        category_id	    否	int	项目类型id
        user_id	        否	int	创建者id
        project_id	    否	int	项目id
        file_type	    否	int	项目标注类型（0标注类，1采集类，2外部标注）
        is_base	        否	int	是否仅获取基础数据,0:否(默认),1:是
        user_is_tender	否	int	是否获取租户已参与竞标信息,0:否(默认),1:是

     * @return bool|mixed|string
     */
    public function projects($params = array())
    {
        return $this->postWithAccessToken('/project/projects', $params);
    }

    /**
     * 发布项目: 第一步
     * 此接口是发布项目的第一步, 将根据指定的分类创建一个空的项目。
     * @param $params
     /* 可选参数
        category_id	是	int	项目分类id
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->postWithAccessToken('/project/create', $params);
    }

    /**
     * 发布项目: 第二步
     * 此接口将设置项目的名称,标注需求文件,项目数据文件等信息
     * @param $params
     * @return bool|mixed|string
     */
    public function submit($params = array())
    {
        return $this->postWithAccessToken('/project/submit', $params);
    }

    /**
     * 配置项目：获取数据文件信息
     * 通过获取zip信息接口，会返回zip包的目录结构和文件数量。用于分配批次。 因解析数据包用时较长, 我们使用轮询操作, 当返回值中的status值0时, 表示数据还在解析中, 需等待1秒后再次请求该接口(此时请求参数中的key为返回值中的key), 直到返回值中的status值1时, 请求完成。
     * @param $params
     * @return bool|mixed|string
     */
    public function getData($params = array())
    {
        return $this->postWithAccessToken('/project/get-data', $params);
    }

    /**
     * 配置项目：设置批次
     * 将数据分为一个或多个批次。此接口有三种方式:1按照目录分配; 2按照作业量等量分配; 3按照作业量自由分配. 因第一个和第二个方式较复杂, 所以此处只说明第三种方式, 且只分配一个批次.
     * @param $params
     * @return bool|mixed|string
     */
    public function assignData($params = array())
    {
        return $this->postWithAccessToken('/project/assign-data', $params);
    }

    /**
     * 配置项目：获取初始工序
     * 工序包含工序组和子工序两个概念;一个工序组可以包含多个子工序(目前只开放一个子工序)。
     * @param $params
     * @return bool|mixed|string
     */
    public function getStep($params = array())
    {
        return $this->postWithAccessToken('/project/get-step', $params);
    }

    /**
     * 配置项目：设置工序
     * 设置好批次后，会设置工序，一个批次会有三个工序，分别是执行工序，审核工序，质检工序，可以自定义工序（加减工序），也可以通过选择流程，使用流程中的设置的工序（自定义流程）。在此步骤要选择一个标注时使用的模板（可修改编辑模板）。
     * @param $params
     * @return bool|mixed|string
     */
    public function setStep($params = array())
    {
        $params = http_build_query($params);
        return $this->postWithAccessToken('/project/set-step', $params);
    }

    /**
     * 配置项目：获取初始任务
     * 获取任务列表, 一个批次和一个工序将建立一个任务。
     * @param $params
     * @return bool|mixed|string
     */
    public function getTaskStep($params = array())
    {
        return $this->postWithAccessToken('/project/get-task', $params);
    }

    /**
     * 配置项目：分配任务
     * 设置好工序后，下一步会分配任务，一个批次会有三个任务，分别是执行任务，审核任务，质检任务，此接口把不同的任务分配给不同的团队（分配是自定义的）。
     * @param $params
     * @return bool|mixed|string
     */
    public function setTask($params = array())
    {
        $params = http_build_query($params);
        return $this->postWithAccessToken('/project/set-task', $params);
    }

    /**
     * 调用项目详情接口，返回项目分类、批次、标注模板、上传的数据包和批次绩效和项目等信息。
     * @param $params
     * @return bool|mixed|string
     */
    public function detail($params = array())
    {
        return $this->postWithAccessToken('/project/detail', $params);
    }

    /**
     * 数据列表
     * @param $params
     * @return bool|mixed|string
     */
    public function dataList($params = array())
    {
        $default = ["limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->postWithAccessToken('/data/list', $params);
    }

    /**
     * 项目绩效
     * @param $params
     * @return bool|mixed|string
     */
    public function statUser($params = array())
    {
        $default = ["limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->postWithAccessToken('/stat/user', $params);
    }

    /**
     * 复制项目
     * @param $params
     * @return bool|mixed|string
     */
    public function copy($params = array())
    {
        return $this->postWithAccessToken('/project/copy', $params);
    }

    /**
     * 删除项目
     * @param $params
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->postWithAccessToken('/project/delete', $params);
    }

    /**
     * 暂停项目
     * @param $params
     * @return bool|mixed|string
     */
    public function pause($params = array())
    {
        return $this->postWithAccessToken('/project/pause', $params);
    }

    /**
     * 恢复项目
     * @param $params
     * @return bool|mixed|string
     */
    public function projectContinue($params = array())
    {
        return $this->postWithAccessToken('/project/continue', $params);
    }

    /**
     * 完成项目
     * @param $params
     * @return bool|mixed|string
     */
    public function finish($params = array())
    {
        return $this->postWithAccessToken('/project/finish', $params);
    }

    /**
     * 重启项目
     * @param $params
     * @return bool|mixed|string
     */
    public function recovery($params = array())
    {
        return $this->postWithAccessToken('/project/recovery', $params);
    }

    /**
     * 项目模板
     * @param $params
     * @return bool|mixed|string
     */
    public function form($params = array())
    {
        return $this->postWithAccessToken('/project/form', $params);
    }

    /**
     * 项目流标
     * @param $params
     * @return bool|mixed|string
     */
    public function failauction($params = array())
    {
        return $this->postWithAccessToken('/project/failauction', $params);
    }


}