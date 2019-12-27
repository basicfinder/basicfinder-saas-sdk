<?php

namespace BasicfinderSaas\Model;

use BasicfinderSaas\Core\BaseApi;

class Team extends BaseApi
{
    /**
     * root和admin都可以创建团队，区别为root可以创建某个租户的团队，admin只能创建本租户的。
     * @param $params
     * @return bool|mixed|string
     */
    public function create($params = array())
    {
        return $this->post('/team/create', $params);
    }

    /**
     * 在编辑团队时，root平台可以编辑所有团队，admin平台可以编辑属于当前租户的团队，team平台只有团队管理员可以编辑团队管理员所属团队。
     * @param $params
     * @return bool|mixed|string
     */
    public function update($params = array())
    {
        return $this->post('/team/update', $params);
    }

    /**
     * 团队列表
     * @param $params
     * @return bool|mixed|string
     */
    public function teams($params = array())
    {
        return $this->post('/team/teams', $params);
    }

    /**
     * 禁用团队
     * @param $params
     * @return bool|mixed|string
     */
    public function delete($params = array())
    {
        return $this->post('/team/delete', $params);
    }

    /**
     * 恢复团队
     * @param $params
     * @return bool|mixed|string
     */
    public function restore($params = array())
    {
        return $this->post('/team/restore', $params);
    }

    /**
     * 团队绩效
     * @param $params
     * @return bool|mixed|string
     */
    public function statTeam($params = array())
    {
        return $this->post('/stat/team', $params);
    }

    /**
     * 团队成员列表
     * @param $params
     * @return bool|mixed|string
     */
    public function users($params = array())
    {
        return $this->post('/team/users', $params);
    }

    /**
     * 添加团队成员
     * @param $params
     * @return bool|mixed|string
     */
    public function userCreate($params = array())
    {
        return $this->post('/team/user-create', $params);
    }

    /**
     * 修改团队成员信息
     * @param $params
     * @return bool|mixed|string
     */
    public function userUpdate($params = array())
    {
        return $this->post('/team/user-update', $params);
    }

    /**
     * 移除团队成员
     * @param $params
     * @return bool|mixed|string
     */
    public function userDelete($params = array())
    {
        return $this->post('/team/user-delete', $params);
    }

    /**
     * 邀请token生成
     * @param $params
     * @return bool|mixed|string
     */
    public function invitationToken($params = array())
    {
        return $this->post('/invitation/create', $params);
    }

    /**
     * 邀请用户注册-发送验证码
     * @param $params
     * @return bool|mixed|string
     */
    public function signupByInvitation($params = array())
    {
        return $this->post('/site/signup-by-invitation', $params);
    }

    /**
     * 邀请用户注册-提交
     * @param $params
     * @return bool|mixed|string
     */
    public function submitSignupByInvitation($params = array())
    {
        return $this->post('/site/signup-by-invitation', $params);
    }

    /**
     * 导入解析excel
     * @param $params
     * @return bool|mixed|string
     */
    public function importParse($params = array())
    {
        return $this->post('/team/import-parse', $params);
    }

    /**
     * 用户导入提交
     * @param $params
     * @return bool|mixed|string
     */
    public function importSubmit($params = array())
    {
        return $this->post('/team/import-submit', $params);
    }

}