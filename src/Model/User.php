<?php
namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class User extends BaseApi
{
    /**
     * 通过user_id字段获取对应的用户详情信息（用户的租户、团队、ftp、角色等）
     * @param $params
     * 可选参数
     *  user_id  是   int 用户id
     * @return bool|mixed|string
     */
    public function detail($params = array())
    {
        if (empty($params) or !isset($params["user_id"])) {
            $params['user_id'] = $this->getUserId();
        }
        return $this->postWithAccessToken('/user/detail', $params);
    }

    /**
     * 查询用户的操作记录列表
     * @param $params
     * 可选参数
        user_id	否	int	用户id
        keyword	否	String	关键字搜索
        orderby	否	String	排序字段
        sort	否	String	排序方式（正序或倒序）
        limit	否	int	每页展示数据量
        page	否	int	页数
        type	否	int	类型
     * @return bool|mixed|string
     */
    public function records($params = array())
    {
        $default = ["user_id" => $this->getUserId(), "limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->postWithAccessToken('/user/records', $params);
    }

    /**
     * 获取到用户的使用设备信息列表
     * @param $params
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
     * @return bool|mixed|string
     */
    public function devices($params = array())
    {
        $default = ["user_id" => $this->getUserId(), "limit" => 10, "page" => 1];
        $params = array_merge($default, $params);
        return $this->postWithAccessToken('/user/devices', $params);
    }

    /**
     * 用户提交资质审核
     * @param $params
     * @return bool|mixed|string
     */
    public function submitQualification($params = array())
    {
        return $this->postWithAccessToken('/user/submit-qualification', $params);
    }

    /**
     * 用户审核资质列表
     * @param $params
     * @return bool|mixed|string
     */
    public function qualifications($params = array())
    {
        return $this->postWithAccessToken('/user/qualifications', $params);
    }

    /**
     * 用户审核资质更新
     * @param $params
     * @return bool|mixed|string
     */
    public function updateQualification($params = array())
    {
        return $this->postWithAccessToken('/user/update-qualification', $params);
    }

    /**
     * 用户电子支付信息列表
     * @param $params
     * @return bool|mixed|string
     */
    public function epaies($params = array())
    {
        return $this->postWithAccessToken('/user/epaies', $params);
    }

    /**
     * 添加用户电子支付信息
     * @param $params
     * @return bool|mixed|string
     */
    public function createEpay($params = array())
    {
        return $this->postWithAccessToken('/user/create-epay', $params);
    }

    /**
     * 修改用户电子支付信息
     * @param $params
     * @return bool|mixed|string
     */
    public function updateEpay($params = array())
    {
        return $this->postWithAccessToken('/user/update-epay', $params);
    }

    /**
     * 用户统计
     * @param $params
     * @return bool|mixed|string
     */
    public function stat($params = array())
    {
        return $this->postWithAccessToken('/user/stat', $params);
    }

    /**
     * 获取配置信息
     * @param $params
     * @return bool|mixed|string
     */
    public function publicConfig($params = array())
    {
        return $this->postWithAccessToken('/site/public-config', $params);
    }

    /**
     * 用户注册
     *  可选参数
        email	是	        string	邮箱，唯一	=
        password	是	        string	密码，由数字和字母组成
        roles	    是	        string	角色,多个以逗号(,)隔开
        type	    是	        int	    用户平台类型
        status	    否	        int	    用户状态,0:未激活(默认),1:已激活,2:已禁用
        avatar	    否	        string	头像
        site_id	    否	        int	    租户id
        phone	    否	        string	手机号或电话，必须为5-20位
        nickname	否	        string	用户昵称，由字母、汉字、数字和点组成，2-16位
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->postWithAccessToken('/user/create', $params);
    }

    /**
     * 用户列表
     * @param $params
     * 可选参数
        keyword	    否	String	关键字搜索（检索"id，昵称，邮箱"三个字段）
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
     * @return bool|mixed|string
     */
    public function users($params = array())
    {
        return $this->postWithAccessToken('/user/users', $params);
    }

    /**
     * 用户表单
     * @param $params
     * @return bool|mixed|string
     */
    public function form($params = array())
    {
        return $this->postWithAccessToken('/user/form', $params);
    }

    /**
     * 编辑用户
     * @param $params
     * 可选参数
        email	否	string	邮箱，唯一，最大为254位
        password	否	string	没有值时不修改密码，有值会修改密码，密码由数字和字母组成
        roles	    否	string	角色,多个以逗号(,)隔开
        type	    否	int	用户平台类型
        status	    否	string	用户状态
        avatar	    否	string	头像
        site_id	    否	int	租户id
        phone	    否	string	手机号或电话，必须为5-20位
        nickname	否	string	用户昵称，由字母、汉字、数字和点组成，2-16位
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        return $this->postWithAccessToken('/user/update', $params);
    }

}
