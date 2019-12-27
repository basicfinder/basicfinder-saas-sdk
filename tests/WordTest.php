<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class WordTest
{
    private $saas;
    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('liujianping@basicfinder.com', 'bf123456', 'pc-root', '1.0.0', 'Win32', '666');
    }

    /**
     * 词库列表
     * @return mixed
     */
    public function dictList()
    {
        $params = [
            /**
             * 可选参数
            page	否	int	页码,默认1
            limit	否	int	每页请求数,默认10
            orderby	否	string	排序字段,支持id(默认),created_at,updated_at
            sort	否	int	排序方式,asc升序,desc降序(默认)
            dict_id	否	int	词库id
            dict_name	否	string	词库名称
            created_by	否	int	创建人id
            is_exist_tag	否	int	标签
            type	否	int	类型
            create_time_beg	否	int	创建开始时间戳
            create_time_end	否	int	创建结束时间戳
            site_id	否	int	租户id
            keyword	否	string	搜索,词库id,词库名，创建人
             */
        ];
        return $this->saas->word->dictList($params);
        /**
         * 返回结果
         *{
            "error": "",
            "message": "",
            "data": {
                "count": "1",
                "list": [
                    {
                        "id": "1025",
                        "name": "excel词库001",
                        "count": "5",
                        "is_exist_tag": "1",
                        "path": "/dict/14338//dictTextDemo.xlsx",
                        "type": "1",
                        "created_by": "14338",
                        "site_id": "86",
                        "parent_id": "0",
                        "status": "0",
                        "created_at": "1573283182",
                        "updated_at": "0",
                        "user": {
                            "id": "14338",
                            "email": "wanghaokun@admin.com",
                            "nickname": "cible测试租户"
                        },
                        "site": {
                            "id": "86",
                            "name": "cible测试租户"
                        },
                        "key": "L2RpY3QvMTQzMzgvL2RpY3RUZXh0RGVtby54bHN4"
                    }
                ],
                "page": "1",
                "limit": "10",
                "orderby": "id",
                "sort": "desc",
                "types": [
                    "公共模板",
                    "私有模板"
                ],
                "statuses": [
                    "启用",
                    "删除"
                ],
                "isExistTags": [
                    "无标签",
                    "有标签"
                ]
            }
        }
         */
    }

    /**
     * 词库表单
     * @return mixed
     */
    public function form()
    {
        $params = [];
        return $this->saas->word->form($params);
        /**
         * 返回结果
         *{
            "error": "",
            "message": "",
            "data": {
                "types": [
                    "公共模板",
                    "私有模板"
                ],
                "userIds": [
                {
                    "id": "14338",
                    "nickname": "cible测试租户"
                }
                ],
                "sites": [
                    {
                        "id": "86",
                        "name": "cible测试租户"
                    }
                ],
                "isExistTags": [
                    "无标签",
                    "有标签"
                ]
            }
        }
         */
    }

    /**
     * 创建词库
     * @return mixed
     */
    public function create()
    {
        $params = [
            /**
             *      参数	是否必须	    类型	说明
            site_id	        否	        int	    租户id
            name	        是	        string	词库名称
            path	        是	        string	词库相对路径,调用site/upload-private-file获取的urlpath
             */
        ];
        return $this->saas->word->create($params);
        /**
         * 返回结果
         * {
            "error": "",
            "message": "",
            "data": {
                "dict_id": "1026"
            }
         }
         */
    }

    /**
     * 删除词库
     * @return mixed
     */
    public function delete()
    {
        $params = [
            "dict_id" => 1027
        ];
        return $this->saas->word->delete($params);
        /**
         * 返回结果
         * {
            "error": "",
            "message": "",
            "data": {
                "dict_id": "1027"
            }
        }
         */
    }
}