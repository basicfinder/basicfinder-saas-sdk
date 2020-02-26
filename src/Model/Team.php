<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Team extends BaseApi
{
    /**
     * root和admin都可以创建团队，区别为root可以创建某个租户的团队，admin只能创建本租户的。
     * @param $params
     * 可选参数
        name	是	String	团队名称
        phone	否	int	团队电话
        sort	否	int	排序
        site_id	否	int	租户id
        status	否	int	团队状态
        logo	否	string	头像
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->postWithAccessToken('/team/create', $params);
    }

    /**
     * 在编辑团队时，root平台可以编辑所有团队，admin平台可以编辑属于当前租户的团队，team平台只有团队管理员可以编辑团队管理员所属团队。
     * @param $params
     * 可选参数
        team_id	是	int	团队id
        name	是	String	团队名称
        phone	否	int	团队电话
        sort	否	int	排序
        site_id	否	int	租户id
        status	否	int	团队状态
        logo	否	string	头像
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        return $this->postWithAccessToken('/team/update', $params);
    }

    /**
     * 团队列表
     * @param $params
     * 可选参数
        keyword	否	String	关键字搜索
        status	否	int	团队状态
        orderby	否	String	排序字段
        sort	否	int	排序方式（正序或倒序）
        limit	否	int	每页展示数据量
        page	否	int	页数
        site_id	否	String	租户id
        user_id	否	String	用户id
        team_id	否	String	团队id
        team_name	否	String	团队名称,模糊查询
        create_time_beg	否	int	创建开始时间戳
        create_time_end	否	int	创建结束时间戳
     * @return bool|mixed|string
     */
    public function teams($params = array())
    {
        return $this->postWithAccessToken('/team/teams', $params);
    }

    /**
     * 禁用团队
     * @param $params
     * 可选参数
        team_id	是	int	团队id
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->postWithAccessToken('/team/delete', $params);
    }

    /**
     * 恢复团队
     * @param $params
     * 可选参数
        team_id	是	int	团队id
     * @return bool|mixed|string
     */
    public function restore($params = array())
    {
        return $this->postWithAccessToken('/team/restore', $params);
    }

    /**
     * 团队绩效
     * @param $params
     * 可选参数
        team_id	是	int	团队id
        page	否	int	页码,默认1
        limit	否	int	每页请求数
        orderby	否	string	排序字段
        sort	否	int	排序方式（正序或倒序）
     * @return bool|mixed|string
     */
    public function statTeam($params = array())
    {
        return $this->postWithAccessToken('/stat/team', $params);
    }

    /**
     * 团队成员列表
     * @param $params
     * 可选参数
        keyword	否	String	关键字搜索
        orderby	否	String	排序字段
        sort	否	int	排序方式（正序或倒序）
        limit	是	int	每页展示数据量
        page	是	int	页数
        team_id	是	int	团队id
        role_id	否	String	团队角色，多个以逗号(,)隔开
        user_id	否	int	用户id
        nick_name	否	string	昵称，模糊查询
        user_status	否	int	用户状态
        create_time_beg	否	int	加入时间的开始时间戳
        create_time_end	否	int	加入时间的结束时间戳
     * @return bool|mixed|string
     */
    public function users($params = array())
    {
        return $this->postWithAccessToken('/team/users', $params);
    }

    /**
     * 添加团队成员
     * @param $params
     * 可选参数
        team_id	是	int	团队id
        email	是	string	团队成员邮箱
        password	是	string	团队成员密码
        roles	是	string	团队成员在团队中的角色
        nickname	否	string	团队成员昵称
        phone	否	int	团队成员电话
        status	否	int	团队成员状态,0:未激活(默认)
        avatar	否	string	头像
     * @return bool|mixed|string
     */
    public function userCreate($params = array())
    {
        return $this->postWithAccessToken('/team/user-create', $params);
    }

    /**
     * 修改团队成员信息
     * @param $params
     * 可选参数
        team_id	是	int	团队id
        email	是	string	团队成员邮箱
        password	是	string	团队成员密码
        roles	是	string	团队成员在团队中的角色
        nickname	否	string	团队成员昵称
        phone	否	int	团队成员电话
        status	否	int	团队成员状态,0:未激活(默认)
        avatar	否	string	头像
     * @return bool|mixed|string
     */
    public function userUpdate($params = array())
    {
        return $this->postWithAccessToken('/team/user-update', $params);
    }

    /**
     * 移除团队成员
     * @param $params
     * 可选参数
        team_id	是	int	团队id
        user_id	是	int	团队成员id
     * @return bool|mixed|string
     */
    public function userDelete($params = array())
    {
        return $this->postWithAccessToken('/team/user-delete', $params);
    }

    /**
     * 邀请token生成
     * @param $params
     * @return bool|mixed|string
     */
    public function invitationToken($params = array())
    {
        return $this->postWithAccessToken('/invitation/create', $params);
    }

    /**
     * 邀请用户注册-发送验证码
     * @param $params
     * @return bool|mixed|string
     */
    public function signupByInvitation($params = array())
    {
        return $this->postWithAccessToken('/site/signup-by-invitation', $params);
    }

    /**
     * 邀请用户注册-提交
     * @param $params
     * @return bool|mixed|string
     */
    public function submitSignupByInvitation($params = array())
    {
        return $this->postWithAccessToken('/site/signup-by-invitation', $params);
    }

    /**
     * 导入解析excel
     * @param $params
     * @return bool|mixed|string
     */
    public function importParse($params = array())
    {
        return $this->postWithAccessToken('/team/import-parse', $params);
    }

    /**
     * 用户导入提交
     * @param $params
     * @return bool|mixed|string
     */
    public function importSubmit($params = array())
    {
        return $this->postWithAccessToken('/team/import-submit', $params);
    }

}