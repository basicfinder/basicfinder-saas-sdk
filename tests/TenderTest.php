<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class TenderTest
{
    private $saas;

    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('liujianping@basicfinder.com', 'bf123456');
    }

    /**
     * 竞标更新
     * @return mixed
     */
    public function update()
    {
        $params = [
            /**
             *      参数	是否必须	    类型	说明
                    id	    是	        int	    竞标id
                end_time	否	        int	    竞标项目结束时间戳
                description	否	        string	竞标产品描述
                demand	    否	        string	竞标要求
             */
        ];
        return $this->saas->tender->update($params);
        /**
         * 返回结果
         * {
            "error": "",
            "message": "",
            "data": {
                "id": "27"
            }
        }
         */
    }

    /**
     * 提交竞标申请列表
     * @return mixed
     */
    public function applySubmit()
    {
        $params = [
            "project_id" => 123,//项目id
            "contact_name" => "张三",//联系人
            "contact_mobile" => "18654668954",//联系电话
            "price_info" => "100000",  //报价
            "accept_number" => 10,  //承接数量
            "message" => "竞标备注~"
        ];
        return $this->saas->tender->applySubmit($params);
        /**
         * 返回结果
         * {
            "error": "",
            "message": "",
            "data": {
                "id": "27"
            }
            }
         */
    }

    /**
     * 申请竞标列表
     * @return mixed
     */
    public function applyList()
    {
        $params = [
            "project_id" => 123,
            /**
             * 可选参数
            page	        否	int	页码,默认1
            limit	        否	int	每页请求数,默认10
            id	            否	int	申请竞标id
            site_id	        否	int	租户id
            status	        否	int	状态
            create_time_beg	否	int	申请开始时间戳
            create_time_end	否	int	申请结束时间戳
            contact_mobile	否	int	联系电话
             */
        ];
        return $this->saas->tender->applyList($params);
        /**
         * 返回结果
         * {
            "error": "",
            "message": "",
            "data": {
                "count": "1",
                "list": [
                    {
                        "id": "27",
                        "project_id": "15543",
                        "tender_id": "6",
                        "site_id": "266",
                        "status": "1",
                        "contact_name": "南岸",
                        "contact_mobile": "0271-234",
                        "accept_number": "123",
                        "price_info": "1000元/单",
                        "message": "",
                        "feedback": "1234123",
                        "created_by": "32328",
                        "created_at": "1576319695",
                        "updated_at": "1576479383",
                        "site": {
                            "id": "266",
                            "name": "cible测试租户-测试环境"
                        },
                        "siteUserCount": "8"
                    }
                ],
                "status": [
                    "已申请",
                    "已联系"
                ],
                "sites": [
                    {
                        "id": "384",
                        "name": "lyp",
                        "type": "0",
                        "logo": "/upload/2019/12/17/5df8a23caaf2b_1576575548.png",
                        "status": "1",
                        "quick_login": "0",
                        "start_time": "1576454400",
                        "end_time": "1711843200",
                        "team_count_limit": "3",
                        "user_count_limit": "1000",
                        "data_count_limit": "3",
                        "disk_space_limit": "3",
                        "team_user_count_limit": "20",
                        "contact_username": "lyp",
                        "contact_phone": "",
                        "contact_email": "",
                        "customer_id": "0",
                        "created_by": "32332",
                        "created_at": "1576575550",
                        "updated_at": "1576575662"
                    }
                ]
            }
        }
         */
    }

    /**
     * 申请竞标详细
     * @return mixed
     */
    public function applyDetail()
    {
        $params = [
            /**
             * 可选参数
             *  id	        否	int	申请竞标id
                site_id	    否	int	租户id
                project_id	否	int	项目id
             */
        ];
        return $this->saas->tender->applyDetail($params);
        /**
         * 返回结果
         * {
            "error": "",
            "message": "",
            "data": {
                "id": "27",
                "project_id": "15543",
                "tender_id": "6",
                "site_id": "266",
                "status": "1",
                "contact_name": "南岸",
                "contact_mobile": "0271-234",
                "accept_number": "123",
                "price_info": "1000元/单",
                "message": "",
                "feedback": "1234123",
                "created_by": "32328",
                "created_at": "1576319695",
                "updated_at": "1576479383"
            }
        }
         */
    }

    /**
     * 处理申请
     * @return mixed
     */
    public function applyUpdate()
    {
        $params = [
            /**
             *      参数	是否必须	    类型	说明
                      id	是	        int	    申请竞标id
                  status	是	        int	    状态
                feedback	否	        int	    联系备注
             */
        ];
        return $this->saas->tender->applyUpdate($params);
        /**
         * 返回结果
         * {
                "error": "",
                "message": "",
                "data": {
                    "id": "27"
                }
            }
         */
    }

}