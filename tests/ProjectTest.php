<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class ProjectTest
{
    private $saas;
    /**
     * project Driver 选择
     * ProjectTest constructor.
     */
    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('1234566@qq.com', 'bf123456', 'pc-passport',
            '1.0.0', 'Win32', '111');
    }

    /**
     * 项目列表
     * @return mixed
     */
    public function projects()
    {
        $params = [
            /**
             * 可选参数
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
             */
        ];
        return $this->saas->project->projects($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'count' => '1', 'list' => array ( 0 => array ( 'id' => '15241', 'site_id' => '363', 'name' => '图片标注-test-1', 'internal_name' => '', 'user_id' => '38032', 'category_id' => '11', 'template_id' => '0', 'step_process_id' => '0', 'type' => '2', 'status' => '1', 'amount' => '0', 'data_count' => '0', 'disk_space' => '0.000', 'table_suffix' => '1912', 'start_time' => '1576488618', 'end_time' => '1579080618', 'created_at' => '1576488618', 'updated_at' => '1576488779', 'site' => array ( 'id' => '363', 'name' => 'test-rent', ), 'user' => array ( 'id' => '38032', 'email' => '1234566@qq.com', 'nickname' => 'liu-admin', 'type' => '1', 'language' => '0', ), 'category' => array ( 'id' => '11', 'type' => '0', 'status' => '0', 'file_type' => '0', 'view' => 'image_label', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,tif', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'icon' => '/images/category/icon-small/image-labelling.png', 'thumbnail' => '/images/category/icon-big/image-labelling.png', 'video_as_frame' => '1', 'desc' => array ( 'id' => '61', 'category_id' => '11', 'language' => 'zh-CN', 'name' => '图片标注', 'keywords' => '图片，矩形框', 'description' => '在图片中将规定的品类用矩形框标出', 'instruction_url' => '/images/category/preview/rzbk.png', 'template_id' => '329', ), ), 'unpack' => '', 'batches' => array ( ), ), ), 'categories' => array ( 11 => '图片标注', ), 'types' => array ( 0 => '未选择(发布中)', 1 => '自有团队', 2 => '倍赛数据运营中心', ), 'statuses' => array ( 0 => '发布中', 1 => '审核中', 2 => '作业中', 3 => '已暂停', 5 => '完成', 7 => '已拒绝', ), 'unpack_statuses' => array ( 0 => '默认状态', 1 => '待解包', 2 => '解包中', 3 => '解包成功', 4 => '解包失败', ), ), )
         */
    }

    /**
     * 创建项目-选择分类
     * @return mixed
     */
    public function create()
    {
        $params = [
            "category_id" => 11, //分类id
        ];
        return $this->saas->project->create($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'project_id' => '15243', ), )
         */
    }

    /**
     * 发布项目-项目名称设置
     * @return mixed
     */
    public function submit()
    {
        $params = [
            "project_id" => 15242, //项目id
            "name" => '图片标注-test-2', //项目名称
            /**
             * 可选参数
            start_time	是	int	项目开始时间; Unix时间戳（Unix timestamp）; 示例:1533723498
            end_time	是	int	项目结束时间; Unix时间戳（Unix timestamp）; 示例:1533723498
            attachment	否	String	附件路径地址（需求文件）; json格式;如何上传文件请搜索:上传私有文件(upload-private-file)接口
            template_id	是	int	项目模板
            amount	否	int	作业总份数,采集任务时必传
            demand	否	string	基本要求
            explain	否	string	声明
            notice	否	string	提交须知
            tender[is_tender]	否	int	是否为竞标项目,0:否,1:是
            tender[end_time]	否	int	竞标项目结束时间戳,竞标项目时必传
            tender[description]	否	string	竞标产品描述
            tender[demand]	否	string	竞标要求
             */
        ];
        return $this->saas->project->submit($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'project_id' => '15242', ), )
         */
    }

    /**
     * 发布项目-文件上传-下一步
     * @return mixed
     */
    public function submitFileUploadNext()
    {
        $params = [
            "project_id" => 15242, //项目id
            "uploadfile_type" => 'web', //上传标注数据的方式;网页上传值为web,ftp上传方式值为ftp
        ];
        return $this->saas->project->submit($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'project_id' => '15242', ), )
         */
    }

    /**
     * 发布项目-最终发布
     * @return mixed
     */
    public function submitComplete()
    {
        $params = [
            "project_id" => 15242, //项目id
            "type" => 2, //项目类型;自有项目值为1,倍赛运营中心值为2;注意:发布到自有项目需要走配置项目流程;发布到倍赛运营中心项目不需要走配置项目流程(有运营人员操作)
        ];
        return $this->saas->project->submit($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'project_id' => '15242', ), )
         */
    }

    /**
     * 配置项目：获取数据文件信息
     * 通过获取zip信息接口，会返回zip包的目录结构和文件数量。用于分配批次。 因解析数据包用时较长, 我们使用轮询操作, 当返回值中的status值0时, 表示数据还在解析中, 需等待1秒后再次请求该接口(此时请求参数中的key为返回值中的key), 直到返回值中的status值1时, 请求完成。
     * @return mixed
     */
    public function getData()
    {
        $params = [
            "project_id" => 15242,
            /**
             * 可选参数
             * key   status为 0 时返回值   间隔一秒再次请求带上该参数。 status 为 1 时数据获取成功
             */
        ];
        return $this->saas->project->getData($params);
        /**
         * 返回数据
         * 结果1：
         * {
                "error":"",
                "message":"",
                "data":
                    {
                        "status":0,
                        "key":"L2Jhc2ljZmluZGVyL3d3dy9zYWFzLmJhc2ljZmluZGVyLmNvbS9hcGkvdXBsb2FkZmlsZS8xMjAwNzYvMTMxMzgvZG93bmxvYWRmaWxlL3VwbG9hZGZpbGVfc3RydWN0XzEzMTM4XzIwMTkxMTIxMTU1NjQxLmpzb24_c",
                        "data":{}
                    }
            }
         *
         * 结果2：
         * {
            "error":"",
            "message":"",
            "data":{
                "status":1,
                "key":"L2Jhc2ljZmluZGVyL3d3dy92My5iYXNpY2ZpbmRlci5jb20vYXBpL3VwbG9hZGZpbGUvMTEyLzEyMDMxL3VwbG9hZGZpbGVfc3RydWN0XzEyMDMxXzIwMTkwNjE5MTEzMTQwLmpzb24_c",
                "data":{
                    "count":6,
                    "size":"2.16 MB",
                    "size_number":2268802,
                    "files":[
                        {
                            "path":"MTEyLzEyMDMxL3RocmVlLnppcC8_c",
                            "name":"three.zip",
                            "children":[
                                    {
                                        "path":"MTEyLzEyMDMxL3RocmVlLnppcC90aHJlZS8_c",
                                        "name":"three",
                                        "children":[
                                        {
                                        "path":"MTEyLzEyMDMxL3RocmVlLnppcC90aHJlZS8xLw_c_c",
                                        "name":"1",
                                        "children":[

                                        ],
                                        "count":1,
                                        "size_number":378201,
                                        "size":"369.34 KB"
                                    },
                                    {
                                        "path":"MTEyLzEyMDMxL3RocmVlLnppcC90aHJlZS8yLw_c_c",
                                        "name":"2",
                                        "children":[

                                        ],
                                        "count":1,
                                        "size_number":378321,
                                        "size":"369.45 KB"
                                    },
                                    {
                                        "path":"MTEyLzEyMDMxL3RocmVlLnppcC90aHJlZS8zLw_c_c",
                                        "name":"3",
                                        "children":[

                                        ],
                                        "count":1,
                                        "size_number":377879,
                                        "size":"369.02 KB"
                                    }
                                ],
                                "count":6,
                                "size_number":2268802,
                                "size":"2.16 MB"
                                }
                            ],
                            "count":6,
                            "size_number":2268802,
                            "size":"2.16 MB"
                        }
                    ]
                }
            }
        }
         *
         */
    }

    /**
     * 设置批次
     * 将数据分为一个或多个批次。此接口有三种方式:1按照目录分配; 2按照作业量等量分配; 3按照作业量自由分配. 因第一个和第二个方式较复杂, 所以此处只说明第三种方式, 且只分配一个批次.
     * @return mixed
     */
    public function assignData()
    {
        $params = [
            "project_id" => 15242,
            "assign_type" => 2, //分配批次的方式（按目录值为0，按数量值为1，自由分配值为2）
            "key" => "L2Jhc2ljZmluZGVyL3d3dy9zYWFzLmJhc2ljZmluZGVyLmNvbS9hcGkvdXBsb2FkZmlsZS8zODAzMi8xNTI0Mi9kb3dubG9hZGZpbGUvdXBsb2FkZmlsZV9zdHJ1Y3RfMTUyNDJfMjAxOTEyMTYxODA3NTAuanNvbg_c_c", //getData 返回key
            "batches" => "[{\"count\":6,\"name\":\"批次1\"}]"
        ];
        return $this->saas->project->assignData($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => '1', )
         */
    }

    /**
     * 获取（初始）工序
     * @return mixed
     */
    public function getStep()
    {
        $params = [
            "project_id" => 15242 //项目id
        ];
        return $this->saas->project->getStep($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'stepGroupList' => array ( 0 => array ( 'id' => '6532', 'project_id' => '15242', 'status' => '0', 'sort' => '0', 'parent_id' => '0', 'steps' => array ( 0 => array ( 'id' => '12335', 'project_id' => '15242', 'step_group_id' => '6532', 'type' => '0', 'status' => '0', 'sort' => '0', ), ), ), 1 => array ( 'id' => '6533', 'project_id' => '15242', 'status' => '0', 'sort' => '0', 'parent_id' => '6532', 'steps' => array ( 0 => array ( 'id' => '12336', 'project_id' => '15242', 'step_group_id' => '6533', 'type' => '1', 'status' => '0', 'sort' => '0', ), ), ), 2 => array ( 'id' => '6534', 'project_id' => '15242', 'status' => '0', 'sort' => '0', 'parent_id' => '6533', 'steps' => array ( 0 => array ( 'id' => '12337', 'project_id' => '15242', 'step_group_id' => '6534', 'type' => '2', 'status' => '0', 'sort' => '0', ), ), ), 3 => array ( 'id' => '6535', 'project_id' => '15242', 'status' => '0', 'sort' => '0', 'parent_id' => '6534', 'steps' => array ( 0 => array ( 'id' => '12338', 'project_id' => '15242', 'step_group_id' => '6535', 'type' => '3', 'status' => '0', 'sort' => '0', ), ), ), ), 'step_types' => array ( 0 => '执行', 1 => '审核', 3 => '验收', ), ), )
         */
    }

    /**
     * 配置项目：设置工序
     * @return mixed
     */
    public function setStep()
    {
        $params = [
            "project_id" => 15241,
            "stepGroups" => [
                ["tempid" => "15bf516f-01cd-4f46-92a5-3ac98dad2352", "id" => 6600, "steps" => [["id" => 12403, "type" => 0]], "sort" => 0, "parent_id" => "0"],
                ["tempid" => "28e67e2e-2195-4b34-a0ce-2872a3247f47", "id" => 6601, "steps" => [["id" => 12404, "type" => 1]], "sort" => 1, "parent_id" => "15bf516f-01cd-4f46-92a5-3ac98dad2352"],
                ["tempid" => "27f6f062-c091-4738-aa9d-c1dd567b1ace", "id" => 6602, "steps" => [["id" => 12405, "type" => 2]], "sort" => 2, "parent_id" => "28e67e2e-2195-4b34-a0ce-2872a3247f47"],
                ["tempid" => "f156f830-a1e3-4cd3-bbfe-db91424104da", "id" => 6603, "steps" => [["id" => 12406, "type" => 3]], "sort" => 3, "parent_id" => "27f6f062-c091-4738-aa9d-c1dd567b1ace"]
            ]
        ];
        return $this->saas->project->setStep($params);
        /**
         * 返回数据
         * {"error":"","message":"","data":"1"}
         */
    }

    /**
     * 配置项目：获取初始任务
     * @return mixed
     */
    public function getTaskStep()
    {
        $params = ["project_id" => 15241];
        return $this->saas->project->getTaskStep($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'list' => array ( 0 => array ( 'id' => '16877', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6095', 'step_group_id' => '6600', 'step_id' => '12403', 'type' => '0', 'view_type' => '0', 'platform_type' => '0', 'platform_id' => '0', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次1-6-1-执行', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '3600', 'difficult_expire' => '3600', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576574277', 'batch' => array ( 'id' => '6095', 'project_id' => '15241', 'name' => '批次1-6-1', 'path' => '8574e415e014a03d2295a4d2f7e66f86', 'amount' => '6', 'status' => '1', 'sort' => '1', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12403', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6600', 'type' => '0', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'taskAttribute' => '', ), 1 => array ( 'id' => '16881', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6096', 'step_group_id' => '6600', 'step_id' => '12403', 'type' => '0', 'view_type' => '0', 'platform_type' => '0', 'platform_id' => '0', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次2-6-2-执行', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '3600', 'difficult_expire' => '3600', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576574277', 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12403', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6600', 'type' => '0', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'taskAttribute' => '', ), 2 => array ( 'id' => '16878', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6095', 'step_group_id' => '6601', 'step_id' => '12404', 'type' => '0', 'view_type' => '0', 'platform_type' => '0', 'platform_id' => '0', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次1-6-1-审核', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '3600', 'difficult_expire' => '3600', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576574277', 'batch' => array ( 'id' => '6095', 'project_id' => '15241', 'name' => '批次1-6-1', 'path' => '8574e415e014a03d2295a4d2f7e66f86', 'amount' => '6', 'status' => '1', 'sort' => '1', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12404', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6601', 'type' => '1', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'taskAttribute' => '', ), 3 => array ( 'id' => '16882', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6096', 'step_group_id' => '6601', 'step_id' => '12404', 'type' => '0', 'view_type' => '0', 'platform_type' => '0', 'platform_id' => '0', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次2-6-2-审核', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '3600', 'difficult_expire' => '3600', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576574277', 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12404', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6601', 'type' => '1', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'taskAttribute' => '', ), 4 => array ( 'id' => '16879', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6095', 'step_group_id' => '6602', 'step_id' => '12405', 'type' => '0', 'view_type' => '0', 'platform_type' => '3', 'platform_id' => '0', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次1-6-1-质检', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '3600', 'difficult_expire' => '3600', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576574277', 'batch' => array ( 'id' => '6095', 'project_id' => '15241', 'name' => '批次1-6-1', 'path' => '8574e415e014a03d2295a4d2f7e66f86', 'amount' => '6', 'status' => '1', 'sort' => '1', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12405', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6602', 'type' => '2', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'taskAttribute' => '', ), 5 => array ( 'id' => '16883', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6096', 'step_group_id' => '6602', 'step_id' => '12405', 'type' => '0', 'view_type' => '0', 'platform_type' => '3', 'platform_id' => '0', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次2-6-2-质检', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '3600', 'difficult_expire' => '3600', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576574277', 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12405', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6602', 'type' => '2', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'taskAttribute' => '', ), 6 => array ( 'id' => '16880', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6095', 'step_group_id' => '6603', 'step_id' => '12406', 'type' => '0', 'view_type' => '0', 'platform_type' => '4', 'platform_id' => '363', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次1-6-1-验收', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '3600', 'difficult_expire' => '3600', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576574277', 'batch' => array ( 'id' => '6095', 'project_id' => '15241', 'name' => '批次1-6-1', 'path' => '8574e415e014a03d2295a4d2f7e66f86', 'amount' => '6', 'status' => '1', 'sort' => '1', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12406', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6603', 'type' => '3', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'taskAttribute' => '', ), 7 => array ( 'id' => '16884', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6096', 'step_group_id' => '6603', 'step_id' => '12406', 'type' => '0', 'view_type' => '0', 'platform_type' => '4', 'platform_id' => '363', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次2-6-2-验收', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '3600', 'difficult_expire' => '3600', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576574277', 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12406', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6603', 'type' => '3', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'taskAttribute' => '', ), ), 'team_list' => array ( 0 => array ( 'id' => '1421', 'name' => '测试团队-1-update', 'keywords' => 'ceshituanduicstd-1-update测试团队-1-update', ), 1 => array ( 'id' => '1422', 'name' => '测试团队-1-1217-1644', 'keywords' => 'ceshituanduicstd-1-1217-1644测试团队-1-1217-1644', ), ), 'sites' => array ( 0 => array ( 'id' => '363', 'name' => 'test-rent', 'type' => '0', 'logo' => '/upload/2019/12/16/5df73e5c68218_1576484444.jpg', 'status' => '1', 'start_time' => '1576339200', 'end_time' => '1853596800', 'team_count_limit' => '7', 'user_count_limit' => '1000', 'data_count_limit' => '7', 'disk_space_limit' => '7', 'team_user_count_limit' => '27', 'contact_username' => 'rent-admin', 'contact_phone' => '', 'contact_email' => '', 'customer_id' => '0', 'created_by' => '38031', 'created_at' => '1576484457', 'updated_at' => '1576550463', 'quick_login' => '0', 'teams' => array ( 0 => array ( 'id' => '1422', 'site_id' => '363', 'name' => '测试团队-1-1217-1644', 'logo' => '', ), 1 => array ( 'id' => '1421', 'site_id' => '363', 'name' => '测试团队-1-update', 'logo' => '', ), ), ), ), 'crowdsourcing_list' => array ( 0 => array ( 'id' => '41', 'name' => '测试', ), ), 'aimodel_list' => array ( 0 => array ( 'id' => '1', 'name' => '语音测试', 'key' => 'ai_model_id1', 'tag' => '语音,识别', 'desc' => '语音识别是一门交叉学科。近二十年来，语音识别技术取得显著进步，开始从实验室走向市场。人们预计，未来10年内，语音识别技术将进入工业、家电、通信、汽车电子、医疗、家庭服务、消费电子产品等各个领域。 ', ), 1 => array ( 'id' => '37', 'name' => 'test', 'key' => 'ai_model_id37', ), 2 => array ( 'id' => '42', 'name' => 'test_80.1543544259', 'key' => 'ai_model_id42', 'tag' => '动物,画框', 'desc' => '针对80种动物画框打标签', ), 3 => array ( 'id' => '51', 'name' => '超像素demo', 'key' => 'ai_model_id51', ), 4 => array ( 'id' => '53', 'name' => 'test_80.1549961611', 'key' => 'ai_model_id53', 'tag' => '动物,画框', 'desc' => '针对80种动物画框打标签', ), 5 => array ( 'id' => '73', 'name' => '色差demo', 'key' => 'ai_model_id73', ), 6 => array ( 'id' => '74', 'name' => 'test.1550131804', 'key' => 'ai_model_id74', ), 7 => array ( 'id' => '75', 'name' => ' 色差demo2', 'key' => 'ai_model_id75', ), 8 => array ( 'id' => '76', 'name' => ' 色差demo3', 'key' => 'ai_model_id76', ), 9 => array ( 'id' => '77', 'name' => '色差demo4', 'key' => 'ai_model_id77', ), 10 => array ( 'id' => '78', 'name' => ' 色差demo3.1550133357', 'key' => 'ai_model_id78', ), 11 => array ( 'id' => '79', 'name' => ' 色差demo3.1550133357', 'key' => 'ai_model_id79', ), 12 => array ( 'id' => '80', 'name' => ' 色差demo4', 'key' => 'ai_model_id80', ), 13 => array ( 'id' => '81', 'name' => '超像素.吴昊', 'key' => 'ai_model_id81', ), 14 => array ( 'id' => '82', 'name' => '超像素.吴昊.1550636542', 'key' => 'ai_model_id82', ), 15 => array ( 'id' => '83', 'name' => '腾讯优图速算', 'key' => 'ai_model_id83', ), 16 => array ( 'id' => '84', 'name' => '百度ai语音', 'key' => 'ai_model_id84', ), 17 => array ( 'id' => '85', 'name' => '腾讯优图速算.1553833450', 'key' => 'ai_model_id85', ), 18 => array ( 'id' => '87', 'name' => '腾讯优图速算.1567136531', 'key' => 'ai_model_id87', ), 19 => array ( 'id' => '88', 'name' => '车轮图片识别', 'key' => 'ai_model_id88', ), 20 => array ( 'id' => '89', 'name' => '视频抽帧测试', 'key' => '', ), 21 => array ( 'id' => '90', 'name' => '人和车(MT)', 'key' => '', ), ), 'platform_types' => array ( 0 => '团队', 4 => '客户验收', ), 'step_types' => array ( 0 => '执行', 1 => '审核', 3 => '验收', ), ), )
         */
    }

    /**
     * 配置项目：分配任务
     * @return mixed
     */
    public function setTask()
    {

        $params = [
            "project_id" => 15241,
            "tasks" => [
                ["id" => 16877, "name" => "图片标注-test-1-批次1-6-1-执行", "platform_type" => 0, "platform_id" => 1421, "receive_count" => 5, "receive_expire" => 3600, "refuse_expire" => 0,
                        "difficult_expire" => 0, "is_load_result"=>0, "start_time" => 1576488618, "end_time" => 1579080618, "attr_description" => ""],
                ["id" => 16881, "name" => "图片标注-test-1-批次2-6-2-执行", "platform_type" => 0, "platform_id" => 1421, "receive_count" => 5, "receive_expire" => 3600, "refuse_expire" => 0,
                    "difficult_expire" => 0, "is_load_result"=>0, "start_time" => 1576488618, "end_time" => 1579080618, "attr_description" => ""],
                ["id" => 16878, "name" => "图片标注-test-1-批次1-6-1-审核", "platform_type" => 0, "platform_id" => 1421, "receive_count" => 5, "receive_expire" => 3600, "refuse_expire" => 0,
                    "difficult_expire" => 0, "is_load_result"=>0, "start_time" => 1576488618, "end_time" => 1579080618, "attr_description" => ""],
                ["id" => 16882, "name" => "图片标注-test-1-批次2-6-2-审核", "platform_type" => 0, "platform_id" => 1421, "receive_count" => 5, "receive_expire" => 3600, "refuse_expire" => 0,
                    "difficult_expire" => 0, "is_load_result"=>0, "start_time" => 1576488618, "end_time" => 1579080618, "attr_description" => ""],
                ["id" => 16879, "name" => "图片标注-test-1-批次1-6-1-质检", "platform_type" => 3, "platform_id" => '', "receive_count" => 5, "receive_expire" => 3600, "refuse_expire" => 0,
                    "difficult_expire" => 0, "is_load_result"=>0, "start_time" => 1576488618, "end_time" => 1579080618, "attr_description" => ""],
                ["id" => 16883, "name" => "图片标注-test-1-批次2-6-2-质检", "platform_type" => 3, "platform_id" => '', "receive_count" => 5, "receive_expire" => 3600, "refuse_expire" => 0,
                    "difficult_expire" => 0, "is_load_result"=>0, "start_time" => 1576488618, "end_time" => 1579080618, "attr_description" => ""],
                ["id" => 16880, "name" => "图片标注-test-1-批次1-6-1-验收", "platform_type" => 4, "platform_id" => 363, "receive_count" => 5, "receive_expire" => 3600, "refuse_expire" => 0,
                    "difficult_expire" => 0, "is_load_result"=>0, "start_time" => 1576488618, "end_time" => 1579080618, "attr_description" => ""],
                ["id" => 16884, "name" => "图片标注-test-1-批次2-6-2-验收", "platform_type" => 4, "platform_id" => 363, "receive_count" => 5, "receive_expire" => 3600, "refuse_expire" => 0,
                    "difficult_expire" => 0, "is_load_result"=>0, "start_time" => 1576488618, "end_time" => 1579080618, "attr_description" => ""]
            ]
        ];

        return $this->saas->project->setTask($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => '1', )
         */
    }

    /**
     * 项目详情
     * @return mixed
     */
    public function detail()
    {
        $params = [
            "project_id" => 15241,
            /**
             * 可选参数
              is_base	        否	int	是否仅获取基础数据,0:否(默认),1:是
              user_is_tender	否	int	是否获取租户已参与竞标信息,0:否(默认),1:是
             */
        ];
        return $this->saas->project->detail($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'project' => array ( 'id' => '15241', 'site_id' => '363', 'name' => '图片标注-test-1', 'internal_name' => '', 'user_id' => '38032', 'category_id' => '11', 'template_id' => '3329', 'step_process_id' => '0', 'type' => '2', 'status' => '2', 'amount' => '12', 'data_count' => '12', 'disk_space' => '0.009', 'table_suffix' => '1912', 'start_time' => '1576488618', 'end_time' => '1579080618', 'created_at' => '1576488618', 'updated_at' => '1576577844', 'site' => array ( 'id' => '363', 'name' => 'test-rent', ), 'attr' => array ( 'description' => '', 'uploadfile_type' => 'web', 'uploadfile_account' => '', 'batch_config' => '{"access_token":"TGhIVFA2N2c4NV81X3pxeEpJYjJ0cEc3RElDSUVRX3d8fHwzODAyOHx8fDE5Mi4xNjguMS4xN3x8fDE1NzU5NTkwNzM_c","project_id":"15241","assign_type":"2","key":"L2Jhc2ljZmluZGVyL3d3dy9zYWFzLmJhc2ljZmluZGVyLmNvbS9hcGkvdXBsb2FkZmlsZS8zODAzMi8xNTI0MS9kb3dubG9hZGZpbGUvdXBsb2FkZmlsZV9zdHJ1Y3RfMTUyNDFfMjAxOTEyMTcxNzE0NTkuanNvbg_c_c","batches":"[{\\"count\\":6,\\"name\\":\\"\\u6279\\u6b211\\"},{\\"count\\":6,\\"name\\":\\"\\u6279\\u6b212\\"}]"}', ), 'category' => array ( 'id' => '11', 'type' => '0', 'status' => '0', 'file_type' => '0', 'view' => 'image_label', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,tif', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'icon' => '/images/category/icon-small/image-labelling.png', 'thumbnail' => '/images/category/icon-big/image-labelling.png', 'video_as_frame' => '1', 'desc' => array ( 'id' => '61', 'category_id' => '11', 'language' => 'zh-CN', 'name' => '图片标注', 'keywords' => '图片，矩形框', 'description' => '在图片中将规定的品类用矩形框标出', 'instruction_url' => '/images/category/preview/rzbk.png', 'template_id' => '329', ), ), 'template' => array ( 'id' => '3329', 'name' => '图片标注.1566467932', 'config' => '[{"type":"show-text","id":"faf9c4ff-4ece-4dd0-9eaf-2afa575b195d","text":"• 请在清晰图片中，用矩形框标记出所有行人的朝向 如判断图片为不清晰，则无需标记。","scene":"edit"},{"type":"layout","column0":{"span":18,"children":[{"type":"task-file-placeholder","header":"图片文件占位符: ","tips":"","id":"6516ff92-952a-4d33-8a38-85a651558022","anchor":"image_url"},{"type":"image-label-tool","id":"8ae6092f-fc1a-43d1-b98e-42b64bf6165e","supportShapeType":["rect","polygon","trapezoid","point","bonepoint","cuboid","triangle","quadrangle","unclosedpolygon","line","closedcurve","pencilline","splinecurve"],"advanceTool":[]}]},"column1":{"span":6,"children":[{"type":"tag","header":"请选择合适的标签：","tips":"","subType":"single","data":[{"text":"正面","shortValue":"","color":"#13C2C2","minWidth":0,"minHeight":0,"maxWidth":0,"maxHeight":0,"exampleImageSrc":"","isRequired":0},{"text":"背面","shortValue":"","color":"#F14B2A","minWidth":0,"minHeight":0,"maxWidth":0,"maxHeight":0,"exampleImageSrc":"","isRequired":0}],"tagIsRequired":0,"tagIsUnique":0,"pointDistanceMin":0,"pointPositionNoLimit":false,"deepLevel":1,"id":"024b2ca0-4fd9-4a8d-9f9b-f9ec090d9838","tagIsSearchAble":true,"pointTagShapeType":[],"tagGroupOpen":false,"tagLayoutType":"list"}]},"id":"1213d376-3fe3-41e8-a5b0-04eaf8a55d5e","ratio":3,"scene":"edit"}]', ), 'batches' => array ( 0 => array ( 'id' => '6095', 'project_id' => '15241', 'name' => '批次1-6-1', 'path' => '8574e415e014a03d2295a4d2f7e66f86', 'amount' => '6', 'status' => '1', 'sort' => '1', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 1 => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), ), 'steps' => array ( 0 => array ( 'id' => '12403', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6600', 'type' => '0', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 1 => array ( 'id' => '12404', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6601', 'type' => '1', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 2 => array ( 'id' => '12405', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6602', 'type' => '2', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 3 => array ( 'id' => '12406', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6603', 'type' => '3', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), ), 'tasks' => array ( 0 => array ( 'id' => '16877', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6095', 'step_group_id' => '6600', 'step_id' => '12403', 'type' => '0', 'view_type' => '0', 'platform_type' => '0', 'platform_id' => '1421', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次1-6-1-执行', 'amount' => '6', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '0', 'difficult_expire' => '0', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576577844', 'team' => array ( 'id' => '1421', 'name' => '测试团队-1-update', ), 'crowdsourcing' => '', 'aimodel' => '', 'batch' => array ( 'id' => '6095', 'project_id' => '15241', 'name' => '批次1-6-1', 'path' => '8574e415e014a03d2295a4d2f7e66f86', 'amount' => '6', 'status' => '1', 'sort' => '1', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12403', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6600', 'type' => '0', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'stat' => array ( 'id' => '12652', 'project_id' => '15241', 'batch_id' => '6095', 'step_id' => '12403', 'task_id' => '16877', 'amount' => '6', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'label_count' => '0', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'sharepoint_count' => '0', 'polygon_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'received_count' => '0', 'received_clear_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'created_at' => '1576576035', 'updated_at' => '1576576035', ), ), 1 => array ( 'id' => '16881', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6096', 'step_group_id' => '6600', 'step_id' => '12403', 'type' => '0', 'view_type' => '0', 'platform_type' => '0', 'platform_id' => '1421', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次2-6-2-执行', 'amount' => '6', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '0', 'difficult_expire' => '0', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576577844', 'team' => array ( 'id' => '1421', 'name' => '测试团队-1-update', ), 'crowdsourcing' => '', 'aimodel' => '', 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12403', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6600', 'type' => '0', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'stat' => array ( 'id' => '12653', 'project_id' => '15241', 'batch_id' => '6096', 'step_id' => '12403', 'task_id' => '16881', 'amount' => '6', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'label_count' => '0', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'sharepoint_count' => '0', 'polygon_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'received_count' => '0', 'received_clear_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'created_at' => '1576576035', 'updated_at' => '1576576035', ), ), 2 => array ( 'id' => '16878', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6095', 'step_group_id' => '6601', 'step_id' => '12404', 'type' => '0', 'view_type' => '0', 'platform_type' => '0', 'platform_id' => '1421', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次1-6-1-审核', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '0', 'difficult_expire' => '0', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576577844', 'team' => array ( 'id' => '1421', 'name' => '测试团队-1-update', ), 'crowdsourcing' => '', 'aimodel' => '', 'batch' => array ( 'id' => '6095', 'project_id' => '15241', 'name' => '批次1-6-1', 'path' => '8574e415e014a03d2295a4d2f7e66f86', 'amount' => '6', 'status' => '1', 'sort' => '1', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12404', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6601', 'type' => '1', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'stat' => array ( 'id' => '12654', 'project_id' => '15241', 'batch_id' => '6095', 'step_id' => '12404', 'task_id' => '16878', 'amount' => '0', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'label_count' => '0', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'sharepoint_count' => '0', 'polygon_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'received_count' => '0', 'received_clear_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'created_at' => '1576576035', 'updated_at' => '1576576035', ), ), 3 => array ( 'id' => '16882', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6096', 'step_group_id' => '6601', 'step_id' => '12404', 'type' => '0', 'view_type' => '0', 'platform_type' => '0', 'platform_id' => '1421', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次2-6-2-审核', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '0', 'difficult_expire' => '0', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576577844', 'team' => array ( 'id' => '1421', 'name' => '测试团队-1-update', ), 'crowdsourcing' => '', 'aimodel' => '', 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12404', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6601', 'type' => '1', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'stat' => array ( 'id' => '12655', 'project_id' => '15241', 'batch_id' => '6096', 'step_id' => '12404', 'task_id' => '16882', 'amount' => '0', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'label_count' => '0', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'sharepoint_count' => '0', 'polygon_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'received_count' => '0', 'received_clear_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'created_at' => '1576576035', 'updated_at' => '1576576035', ), ), 4 => array ( 'id' => '16879', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6095', 'step_group_id' => '6602', 'step_id' => '12405', 'type' => '0', 'view_type' => '0', 'platform_type' => '3', 'platform_id' => '0', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次1-6-1-质检', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '0', 'difficult_expire' => '0', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576577844', 'team' => '', 'crowdsourcing' => '', 'aimodel' => '', 'batch' => array ( 'id' => '6095', 'project_id' => '15241', 'name' => '批次1-6-1', 'path' => '8574e415e014a03d2295a4d2f7e66f86', 'amount' => '6', 'status' => '1', 'sort' => '1', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12405', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6602', 'type' => '2', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'stat' => array ( 'id' => '12656', 'project_id' => '15241', 'batch_id' => '6095', 'step_id' => '12405', 'task_id' => '16879', 'amount' => '0', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'label_count' => '0', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'sharepoint_count' => '0', 'polygon_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'received_count' => '0', 'received_clear_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'created_at' => '1576576035', 'updated_at' => '1576576035', ), ), 5 => array ( 'id' => '16883', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6096', 'step_group_id' => '6602', 'step_id' => '12405', 'type' => '0', 'view_type' => '0', 'platform_type' => '3', 'platform_id' => '0', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次2-6-2-质检', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '0', 'difficult_expire' => '0', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576577844', 'team' => '', 'crowdsourcing' => '', 'aimodel' => '', 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12405', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6602', 'type' => '2', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'stat' => array ( 'id' => '12657', 'project_id' => '15241', 'batch_id' => '6096', 'step_id' => '12405', 'task_id' => '16883', 'amount' => '0', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'label_count' => '0', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'sharepoint_count' => '0', 'polygon_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'received_count' => '0', 'received_clear_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'created_at' => '1576576035', 'updated_at' => '1576576035', ), ), 6 => array ( 'id' => '16880', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6095', 'step_group_id' => '6603', 'step_id' => '12406', 'type' => '0', 'view_type' => '0', 'platform_type' => '4', 'platform_id' => '363', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次1-6-1-验收', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '0', 'difficult_expire' => '0', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576577844', 'team' => '', 'crowdsourcing' => '', 'aimodel' => '', 'batch' => array ( 'id' => '6095', 'project_id' => '15241', 'name' => '批次1-6-1', 'path' => '8574e415e014a03d2295a4d2f7e66f86', 'amount' => '6', 'status' => '1', 'sort' => '1', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12406', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6603', 'type' => '3', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'stat' => array ( 'id' => '12658', 'project_id' => '15241', 'batch_id' => '6095', 'step_id' => '12406', 'task_id' => '16880', 'amount' => '0', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'label_count' => '0', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'sharepoint_count' => '0', 'polygon_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'received_count' => '0', 'received_clear_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'created_at' => '1576576035', 'updated_at' => '1576576035', ), ), 7 => array ( 'id' => '16884', 'site_id' => '363', 'project_id' => '15241', 'batch_id' => '6096', 'step_group_id' => '6603', 'step_id' => '12406', 'type' => '0', 'view_type' => '0', 'platform_type' => '4', 'platform_id' => '363', 'status' => '0', 'sort' => '152410', 'name' => '图片标注-test-1-批次2-6-2-验收', 'amount' => '0', 'user_count' => '0', 'description' => '', 'start_time' => '1576488618', 'end_time' => '1579080618', 'receive_count' => '5', 'receive_expire' => '3600', 'refuse_expire' => '0', 'difficult_expire' => '0', 'max_times' => '0', 'unit_price' => '0.00', 'unit_price_type' => '0', 'is_load_result' => '0', 'created_at' => '1576574277', 'updated_at' => '1576577844', 'team' => '', 'crowdsourcing' => '', 'aimodel' => '', 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'step' => array ( 'id' => '12406', 'name' => '', 'project_id' => '15241', 'step_group_id' => '6603', 'type' => '3', 'status' => '0', 'sort' => '0', 'category_id' => '0', 'template_id' => '0', 'description' => '', 'condition' => '', 'is_load_result' => '0', 'ai_model_id' => '0', 'created_at' => '1576574168', 'updated_at' => '1576574168', ), 'stat' => array ( 'id' => '12659', 'project_id' => '15241', 'batch_id' => '6096', 'step_id' => '12406', 'task_id' => '16884', 'amount' => '0', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'label_count' => '0', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'sharepoint_count' => '0', 'polygon_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'received_count' => '0', 'received_clear_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'created_at' => '1576576035', 'updated_at' => '1576576035', ), ), ), 'user' => array ( 'id' => '38032', 'email' => '1234566@qq.com', 'nickname' => 'liu-admin', 'type' => '1', 'language' => '0', ), 'unpack' => array ( 'project_id' => '15241', 'status' => '0', 'unpack_status' => '3', 'unpack_message' => array ( ), 'unpack_start_time' => '1576574223', 'unpack_end_time' => '1576574223', 'unpack_progress' => '100', ), 'stat' => array ( 'people_count' => '0', 'work_time_count' => '0', ), ), 'attachments' => array ( 0 => array ( 'path' => 'l00.jpg', 'dir' => '/basicfinder/www/saas.basicfinder.com/api/uploadfile/38032/15241/attachment', 'name' => 'l00.jpg', 'ctime' => '1576488631', 'size' => '55534', 'size_format' => '54.23 KB', 'children' => array ( ), 'key' => 'MzgwMzIvMTUyNDEvYXR0YWNobWVudC9sMDAuanBn', ), ), 'uploadfiles' => array ( 0 => array ( 'path' => 'image.xlsx', 'dir' => '/basicfinder/www/saas.basicfinder.com/api/uploadfile/38032/15241/uploadfile', 'name' => 'image.xlsx', 'ctime' => '1576488743', 'size' => '9819', 'size_format' => '9.59 KB', 'children' => array ( ), 'key' => 'LzM4MDMyLzE1MjQxL2ltYWdlLnhsc3g_c', ), ), 'userftp' => '', 'uploadfileTypes' => array ( 'ftp' => 'FTP上传', 'web' => '网页上传', 'ssh' => 'SSH上传', ), 'attachmentExts' => array ( 0 => 'doc', 1 => 'docx', 2 => 'pdf', 3 => 'jpg', 4 => 'png', 5 => 'ppt', 6 => 'pptx', ), 'uploadfileExts' => array ( 0 => 'csv', 1 => 'cvs', 2 => 'xls', 3 => 'xlsx', 4 => 'zip', 5 => 'txt', 6 => '', 7 => 'mp4', 8 => 'avi', 9 => 'wma', 10 => 'wmv', 11 => 'mkv', ), 'unpack_statuses' => array ( 0 => '默认状态', 1 => '待解包', 2 => '解包中', 3 => '解包成功', 4 => '解包失败', ), 'types' => array ( 0 => '未选择(发布中)', 1 => '自有团队', 2 => '倍赛数据运营中心', ), 'statuses' => array ( 0 => '发布中', 1 => '审核中', 2 => '作业中', 3 => '已暂停', 5 => '完成', 7 => '已拒绝', ), 'templateLabels' => array ( 0 => 'rect', 1 => 'polygon', 2 => 'trapezoid', 3 => 'point', 4 => 'bonepoint', 5 => 'cuboid', 6 => 'triangle', 7 => 'quadrangle', 8 => 'unclosedpolygon', 9 => 'line', 10 => 'closedcurve', 11 => 'pencilline', 12 => 'splinecurve', ), 'stepTypes' => array ( 0 => '执行', 1 => '审核', 2 => '质检', 3 => '验收', ), ), )
         */
    }

    /**
     * 数据列表
     */
    public function dataList()
    {
        $params = [
            "project_id" => 15241,
            "limit" => 5,
            "page" => 1
            /**
             * 可选参数
            keyword	    否	String	关键字搜索
            status	    否	int	用户状态
            orderby	    否	String	排序字段
            sort	    否	int	排序方式（正序或倒序）
            batch_id	否	int	批次id
             */
        ];
        return $this->saas->project->dataList($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'list' => array ( 0 => array ( 'id' => '7200', 'data_manage_id' => '0', 'site_id' => '0', 'project_id' => '15241', 'batch_id' => '6096', 'name' => '12.jpg', 'sort' => '6', 'created_at' => '1576574223', 'updated_at' => '1576574223', 'project' => array ( 'id' => '15241', 'site_id' => '363', 'name' => '图片标注-test-1', 'internal_name' => '', 'user_id' => '38032', 'category_id' => '11', 'template_id' => '3329', 'step_process_id' => '0', 'type' => '2', 'status' => '2', 'amount' => '12', 'data_count' => '12', 'disk_space' => '0.009', 'table_suffix' => '1912', 'start_time' => '1576488618', 'end_time' => '1579080618', 'created_at' => '1576488618', 'updated_at' => '1576577844', ), 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'dataResult' => array ( 'id' => '7200', 'site_id' => '0', 'project_id' => '15241', 'batch_id' => '6096', 'data_id' => '7200', 'data' => '{"image_url":"http:\\/\\/saas.public.basicfinder.com\\/demo\\/image\\/images\\/12.jpg"}', 'result' => '', 'ai_result' => '', 'ai_time' => '0', 'stat' => '', ), 'stat' => array ( ), 'invalid_data_effective_count' => '0', ), 1 => array ( 'id' => '7199', 'data_manage_id' => '0', 'site_id' => '0', 'project_id' => '15241', 'batch_id' => '6096', 'name' => '11.jpg', 'sort' => '5', 'created_at' => '1576574223', 'updated_at' => '1576574223', 'project' => array ( 'id' => '15241', 'site_id' => '363', 'name' => '图片标注-test-1', 'internal_name' => '', 'user_id' => '38032', 'category_id' => '11', 'template_id' => '3329', 'step_process_id' => '0', 'type' => '2', 'status' => '2', 'amount' => '12', 'data_count' => '12', 'disk_space' => '0.009', 'table_suffix' => '1912', 'start_time' => '1576488618', 'end_time' => '1579080618', 'created_at' => '1576488618', 'updated_at' => '1576577844', ), 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'dataResult' => array ( 'id' => '7199', 'site_id' => '0', 'project_id' => '15241', 'batch_id' => '6096', 'data_id' => '7199', 'data' => '{"image_url":"http:\\/\\/saas.public.basicfinder.com\\/demo\\/image\\/images\\/11.jpg"}', 'result' => '', 'ai_result' => '', 'ai_time' => '0', 'stat' => '', ), 'stat' => array ( ), 'invalid_data_effective_count' => '0', ), 2 => array ( 'id' => '7198', 'data_manage_id' => '0', 'site_id' => '0', 'project_id' => '15241', 'batch_id' => '6096', 'name' => '10.jpg', 'sort' => '4', 'created_at' => '1576574223', 'updated_at' => '1576574223', 'project' => array ( 'id' => '15241', 'site_id' => '363', 'name' => '图片标注-test-1', 'internal_name' => '', 'user_id' => '38032', 'category_id' => '11', 'template_id' => '3329', 'step_process_id' => '0', 'type' => '2', 'status' => '2', 'amount' => '12', 'data_count' => '12', 'disk_space' => '0.009', 'table_suffix' => '1912', 'start_time' => '1576488618', 'end_time' => '1579080618', 'created_at' => '1576488618', 'updated_at' => '1576577844', ), 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'dataResult' => array ( 'id' => '7198', 'site_id' => '0', 'project_id' => '15241', 'batch_id' => '6096', 'data_id' => '7198', 'data' => '{"image_url":"http:\\/\\/saas.public.basicfinder.com\\/demo\\/image\\/images\\/10.jpg"}', 'result' => '', 'ai_result' => '', 'ai_time' => '0', 'stat' => '', ), 'stat' => array ( ), 'invalid_data_effective_count' => '0', ), 3 => array ( 'id' => '7197', 'data_manage_id' => '0', 'site_id' => '0', 'project_id' => '15241', 'batch_id' => '6096', 'name' => '09.jpg', 'sort' => '3', 'created_at' => '1576574223', 'updated_at' => '1576574223', 'project' => array ( 'id' => '15241', 'site_id' => '363', 'name' => '图片标注-test-1', 'internal_name' => '', 'user_id' => '38032', 'category_id' => '11', 'template_id' => '3329', 'step_process_id' => '0', 'type' => '2', 'status' => '2', 'amount' => '12', 'data_count' => '12', 'disk_space' => '0.009', 'table_suffix' => '1912', 'start_time' => '1576488618', 'end_time' => '1579080618', 'created_at' => '1576488618', 'updated_at' => '1576577844', ), 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'dataResult' => array ( 'id' => '7197', 'site_id' => '0', 'project_id' => '15241', 'batch_id' => '6096', 'data_id' => '7197', 'data' => '{"image_url":"http:\\/\\/saas.public.basicfinder.com\\/demo\\/image\\/images\\/09.jpg"}', 'result' => '', 'ai_result' => '', 'ai_time' => '0', 'stat' => '', ), 'stat' => array ( ), 'invalid_data_effective_count' => '0', ), 4 => array ( 'id' => '7196', 'data_manage_id' => '0', 'site_id' => '0', 'project_id' => '15241', 'batch_id' => '6096', 'name' => '08.jpg', 'sort' => '2', 'created_at' => '1576574223', 'updated_at' => '1576574223', 'project' => array ( 'id' => '15241', 'site_id' => '363', 'name' => '图片标注-test-1', 'internal_name' => '', 'user_id' => '38032', 'category_id' => '11', 'template_id' => '3329', 'step_process_id' => '0', 'type' => '2', 'status' => '2', 'amount' => '12', 'data_count' => '12', 'disk_space' => '0.009', 'table_suffix' => '1912', 'start_time' => '1576488618', 'end_time' => '1579080618', 'created_at' => '1576488618', 'updated_at' => '1576577844', ), 'batch' => array ( 'id' => '6096', 'project_id' => '15241', 'name' => '批次2-6-2', 'path' => '0f349d4b6f760812b462cb4eed8397b9', 'amount' => '6', 'status' => '1', 'sort' => '2', 'created_at' => '1576574168', 'updated_at' => '1576574223', ), 'dataResult' => array ( 'id' => '7196', 'site_id' => '0', 'project_id' => '15241', 'batch_id' => '6096', 'data_id' => '7196', 'data' => '{"image_url":"http:\\/\\/saas.public.basicfinder.com\\/demo\\/image\\/images\\/08.jpg"}', 'result' => '', 'ai_result' => '', 'ai_time' => '0', 'stat' => '', ), 'stat' => array ( ), 'invalid_data_effective_count' => '0', ), ), 'count' => '12', 'page' => '1', 'limit' => '5', 'sort' => 'desc', 'orderby' => 'id', 'keyword' => '', 'project_id' => '15241', 'batch_id' => '', 'batches' => array ( 6095 => '批次1-6-1', 6096 => '批次2-6-2', ), 'template_label_types' => array ( 0 => 'rect', 1 => 'polygon', 2 => 'trapezoid', 3 => 'point', 4 => 'bonepoint', 5 => 'cuboid', 6 => 'triangle', 7 => 'quadrangle', 8 => 'unclosedpolygon', 9 => 'line', 10 => 'closedcurve', 11 => 'pencilline', 12 => 'splinecurve', ), 'label_types' => array ( 'unknown' => '未知类型', 'circler' => '圆', 'ellipse' => '椭圆', 'unclosedpolygon' => '折线', 'rect' => '矩形', 'rectP' => '矩形+点', 'polygon' => '多边形', 'trapezoid' => '梯形', 'triangle' => '三角形', 'quadrangle' => '四边形', 'cuboid' => '长方体', 'line' => '线', 'point' => '点', 'bonepoint' => '标注有序关键点', 'closedcurve' => '闭合曲线', 'splinecurve' => '曲线', 'pencilline' => '钢笔', 'media_duration' => '原媒体文件总时长', 'effective_duration' => '媒体有效总时长', 'text_word' => '文本标注', 'file_text_word' => '原文本字符', '3d_cloudpoint' => '3D点云标注框', 'label_no' => '无效数据', 'label_yes' => '有效数据', 'label_unknown' => '未知数据', 'rectS' => '矩形印章总数', 'form' => '标注表单总数', 'text' => '标注文本总数', 'audio' => '标注语音总数', 'video' => '标注视频总数', '2d_cloudpoint' => '标注2D点云框总数', '2d_object' => '标注2D物体总数', '3d_object' => '标注3D物体总数', 'image' => '标注图片总数', 'pcl_segment' => '点云分割标注数', ), ), )
         */
    }

    /**
     * 项目绩效
     * @return mixed
     */
    public function statUser()
    {
        $params = [
            "project_id" => 15241,
            "limit" => 5,//	是	int	每页展示数据量
            "page" => 1 //	是	int	页数
            /**
             * 可选参数
                step_id	否	int	工序id
                task_id	否	int 任务id
                team_id	否	int	团队id
             */
        ];
        return $this->saas->project->statUser($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'count' => '4305', 'list' => array ( 0 => array ( 'id' => '6375', 'project_id' => '15268', 'batch_id' => '6094', 'step_id' => '12396', 'task_id' => '16873', 'user_id' => '14531', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'join_count' => '0', 'label_count' => '0', 'submit_stat' => '', 'allow_stat' => '', 'verify_stat' => '', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'polygon_count' => '0', 'sharepoint_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '1', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'money' => '0.000', 'money_expect' => '0.000', 'created_at' => '1576578065', 'updated_at' => '1576578065', 'task' => array ( 'id' => '16873', 'name' => '连续帧标注(5)-Stanford 2 - Food Trucks.zip-执行', 'status' => '0', ), 'user' => array ( 'id' => '14531', 'nickname' => 'yuyongshi', 'email' => 'yuyongshi@basicfinder.com', 'roles' => array ( 0 => array ( 'item_name' => 'team_manager', 'user_id' => '14531', 'created_at' => '1558437886', ), 1 => array ( 'item_name' => 'team_worker', 'user_id' => '14531', 'created_at' => '1558437886', ), ), ), 'project' => array ( 'id' => '15268', 'name' => '连续帧标注(5)', 'amount' => '1', 'category_id' => '41', 'user_id' => '14001', 'table_suffix' => '1912', 'category' => array ( 'id' => '41', 'type' => '0', 'status' => '0', 'file_type' => '3', 'view' => 'video-tail', 'draw_type' => '', 'file_extensions' => 'mp4,avi,wmv,mkv', 'upload_file_extensions' => 'zip,mp4,avi,wmv,mkv', 'icon' => '/images/category/icon-small/video-labelling.png', 'thumbnail' => '/images/category/icon-big/video-labelling.png', 'video_as_frame' => '1', 'desc' => array ( 'id' => '73', 'category_id' => '41', 'language' => 'zh-CN', 'name' => '连续帧标注', 'keywords' => '标记，视频', 'description' => '连续标记视频中出现的物体', 'instruction_url' => '/images/category/preview/gzbz.png', 'template_id' => '1840', ), ), ), 'accuracy' => '0', ), 1 => array ( 'id' => '6374', 'project_id' => '15267', 'batch_id' => '6093', 'step_id' => '12392', 'task_id' => '16869', 'user_id' => '14531', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'join_count' => '0', 'label_count' => '0', 'submit_stat' => '', 'allow_stat' => '', 'verify_stat' => '', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'polygon_count' => '0', 'sharepoint_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '1', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'money' => '0.000', 'money_expect' => '0.000', 'created_at' => '1576578065', 'updated_at' => '1576578065', 'task' => array ( 'id' => '16869', 'name' => '连续帧标注(4)-Stanford 1 - Cubberly Auditorium.zip-执行', 'status' => '0', ), 'user' => array ( 'id' => '14531', 'nickname' => 'yuyongshi', 'email' => 'yuyongshi@basicfinder.com', 'roles' => array ( 0 => array ( 'item_name' => 'team_manager', 'user_id' => '14531', 'created_at' => '1558437886', ), 1 => array ( 'item_name' => 'team_worker', 'user_id' => '14531', 'created_at' => '1558437886', ), ), ), 'project' => array ( 'id' => '15267', 'name' => '连续帧标注(4)', 'amount' => '1', 'category_id' => '41', 'user_id' => '14001', 'table_suffix' => '1912', 'category' => array ( 'id' => '41', 'type' => '0', 'status' => '0', 'file_type' => '3', 'view' => 'video-tail', 'draw_type' => '', 'file_extensions' => 'mp4,avi,wmv,mkv', 'upload_file_extensions' => 'zip,mp4,avi,wmv,mkv', 'icon' => '/images/category/icon-small/video-labelling.png', 'thumbnail' => '/images/category/icon-big/video-labelling.png', 'video_as_frame' => '1', 'desc' => array ( 'id' => '73', 'category_id' => '41', 'language' => 'zh-CN', 'name' => '连续帧标注', 'keywords' => '标记，视频', 'description' => '连续标记视频中出现的物体', 'instruction_url' => '/images/category/preview/gzbz.png', 'template_id' => '1840', ), ), ), 'accuracy' => '0', ), 2 => array ( 'id' => '6373', 'project_id' => '15273', 'batch_id' => '6101', 'step_id' => '12419', 'task_id' => '16900', 'user_id' => '14197', 'work_time' => '46', 'work_count' => '1', 'submit_count' => '1', 'join_count' => '1', 'label_count' => '0', 'submit_stat' => '', 'allow_stat' => '', 'verify_stat' => '', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'polygon_count' => '0', 'sharepoint_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '0', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'money' => '0.000', 'money_expect' => '0.000', 'created_at' => '1576576633', 'updated_at' => '1576576633', 'task' => array ( 'id' => '16900', 'name' => '连续帧标注(4)-0 - 副本.zip-执行', 'status' => '0', ), 'user' => array ( 'id' => '14197', 'nickname' => 'nalp', 'email' => 'tryglb42597@chacuo.net', 'roles' => array ( 0 => array ( 'item_name' => 'team_manager', 'user_id' => '14197', 'created_at' => '1574303436', ), 1 => array ( 'item_name' => 'team_worker', 'user_id' => '14197', 'created_at' => '1574303436', ), ), ), 'project' => array ( 'id' => '15273', 'name' => '连续帧标注(4)', 'amount' => '5', 'category_id' => '41', 'user_id' => '14196', 'table_suffix' => '1912', 'category' => array ( 'id' => '41', 'type' => '0', 'status' => '0', 'file_type' => '3', 'view' => 'video-tail', 'draw_type' => '', 'file_extensions' => 'mp4,avi,wmv,mkv', 'upload_file_extensions' => 'zip,mp4,avi,wmv,mkv', 'icon' => '/images/category/icon-small/video-labelling.png', 'thumbnail' => '/images/category/icon-big/video-labelling.png', 'video_as_frame' => '1', 'desc' => array ( 'id' => '73', 'category_id' => '41', 'language' => 'zh-CN', 'name' => '连续帧标注', 'keywords' => '标记，视频', 'description' => '连续标记视频中出现的物体', 'instruction_url' => '/images/category/preview/gzbz.png', 'template_id' => '1840', ), ), ), 'accuracy' => '0', ), 3 => array ( 'id' => '6372', 'project_id' => '15168', 'batch_id' => '6036', 'step_id' => '12248', 'task_id' => '16724', 'user_id' => '14045', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'join_count' => '0', 'label_count' => '0', 'submit_stat' => '', 'allow_stat' => '', 'verify_stat' => '', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'polygon_count' => '0', 'sharepoint_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '1', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'money' => '0.000', 'money_expect' => '0.000', 'created_at' => '1576569065', 'updated_at' => '1576569065', 'task' => array ( 'id' => '16724', 'name' => '图片标注(675)-2-质检', 'status' => '0', ), 'user' => array ( 'id' => '14045', 'nickname' => 'yongshi', 'email' => 'yongshi@root.com', 'roles' => array ( 0 => array ( 'item_name' => 'root_manager', 'user_id' => '14045', 'created_at' => '1545884214', ), 1 => array ( 'item_name' => 'root_worker', 'user_id' => '14045', 'created_at' => '1545884214', ), ), ), 'project' => array ( 'id' => '15168', 'name' => '图片标注(675)', 'amount' => '12', 'category_id' => '11', 'user_id' => '14001', 'table_suffix' => '1912', 'category' => array ( 'id' => '11', 'type' => '0', 'status' => '0', 'file_type' => '0', 'view' => 'image_label', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,tif', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'icon' => '/images/category/icon-small/image-labelling.png', 'thumbnail' => '/images/category/icon-big/image-labelling.png', 'video_as_frame' => '1', 'desc' => array ( 'id' => '61', 'category_id' => '11', 'language' => 'zh-CN', 'name' => '图片标注', 'keywords' => '图片，矩形框', 'description' => '在图片中将规定的品类用矩形框标出', 'instruction_url' => '/images/category/preview/rzbk.png', 'template_id' => '329', ), ), ), 'accuracy' => '0', ), 4 => array ( 'id' => '6371', 'project_id' => '15168', 'batch_id' => '6035', 'step_id' => '12248', 'task_id' => '16720', 'user_id' => '14045', 'work_time' => '0', 'work_count' => '0', 'submit_count' => '0', 'join_count' => '0', 'label_count' => '0', 'submit_stat' => '', 'allow_stat' => '', 'verify_stat' => '', 'point_count' => '0', 'line_count' => '0', 'rect_count' => '0', 'polygon_count' => '0', 'sharepoint_count' => '0', 'other_count' => '0', 'label_time' => '0', 'timeout_count' => '1', 'allow_count' => '0', 'refuse_count' => '0', 'refuse_revised_count' => '0', 'refuse_receive_count' => '0', 'reset_count' => '0', 'audited_count' => '0', 'allowed_count' => '0', 'refused_count' => '0', 'reseted_count' => '0', 'other_operated_count' => '0', 'refused_revise_count' => '0', 'difficult_count' => '0', 'difficult_revise_count' => '0', 'money' => '0.000', 'money_expect' => '0.000', 'created_at' => '1576569065', 'updated_at' => '1576569065', 'task' => array ( 'id' => '16720', 'name' => '图片标注(675)-1-质检', 'status' => '0', ), 'user' => array ( 'id' => '14045', 'nickname' => 'yongshi', 'email' => 'yongshi@root.com', 'roles' => array ( 0 => array ( 'item_name' => 'root_manager', 'user_id' => '14045', 'created_at' => '1545884214', ), 1 => array ( 'item_name' => 'root_worker', 'user_id' => '14045', 'created_at' => '1545884214', ), ), ), 'project' => array ( 'id' => '15168', 'name' => '图片标注(675)', 'amount' => '12', 'category_id' => '11', 'user_id' => '14001', 'table_suffix' => '1912', 'category' => array ( 'id' => '11', 'type' => '0', 'status' => '0', 'file_type' => '0', 'view' => 'image_label', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,tif', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'icon' => '/images/category/icon-small/image-labelling.png', 'thumbnail' => '/images/category/icon-big/image-labelling.png', 'video_as_frame' => '1', 'desc' => array ( 'id' => '61', 'category_id' => '11', 'language' => 'zh-CN', 'name' => '图片标注', 'keywords' => '图片，矩形框', 'description' => '在图片中将规定的品类用矩形框标出', 'instruction_url' => '/images/category/preview/rzbk.png', 'template_id' => '329', ), ), ), 'accuracy' => '0', ), ), 'total' => array ( ), 'label_stat' => array ( ), 'template_label_types' => array ( 0 => 'rect', 1 => 'polygon', 2 => 'trapezoid', 3 => 'point', 4 => 'bonepoint', 5 => 'cuboid', 6 => 'triangle', 7 => 'quadrangle', 8 => 'unclosedpolygon', 9 => 'line', 10 => 'closedcurve', 11 => 'pencilline', 12 => 'splinecurve', ), 'label_types' => array ( 'unknown' => '未知类型', 'circler' => '圆', 'ellipse' => '椭圆', 'unclosedpolygon' => '折线', 'rect' => '矩形', 'rectP' => '矩形+点', 'polygon' => '多边形', 'trapezoid' => '梯形', 'triangle' => '三角形', 'quadrangle' => '四边形', 'cuboid' => '长方体', 'line' => '线', 'point' => '点', 'bonepoint' => '标注有序关键点', 'closedcurve' => '闭合曲线', 'splinecurve' => '曲线', 'pencilline' => '钢笔', 'media_duration' => '原媒体文件总时长', 'effective_duration' => '媒体有效总时长', 'text_word' => '文本标注', 'file_text_word' => '原文本字符', '3d_cloudpoint' => '3D点云标注框', 'label_no' => '无效数据', 'label_yes' => '有效数据', 'label_unknown' => '未知数据', 'rectS' => '矩形印章总数', 'form' => '标注表单总数', 'text' => '标注文本总数', 'audio' => '标注语音总数', 'video' => '标注视频总数', '2d_cloudpoint' => '标注2D点云框总数', '2d_object' => '标注2D物体总数', '3d_object' => '标注3D物体总数', 'image' => '标注图片总数', 'pcl_segment' => '点云分割标注数', ), ), )
         */
    }

    /**
     *复制项目
     */
    public function copy()
    {
        $params = [
            "project_id" => 15241
        ];
        return $this->saas->project->copy($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'project_id' => '15274', ), )
         */
    }

    /**
     * 删除项目
     * @return mixed
     */
    public function delete()
    {
        $params = [
            "project_id" => 15274
        ];
        return $this->saas->project->delete($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'project_id' => '15274', ), )
         */
    }

    /**
     *暂停项目
     * @return mixed
     */
    public function pause()
    {
        $params = [
            "project_id" => 15241
        ];
        return $this->saas->project->pause($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'project_id' => '15241', ), )
         */
    }

    /**
     * 恢复项目
     * @return mixed
     */
    public function projectContinue()
    {
        $params = [
            "project_id" => 15241
        ];
        return $this->saas->project->projectContinue($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'project_id' => '15241', ), )
         */
    }

    /**
     * 完成项目
     * @return mixed
     */
    public function finish()
    {
        $params = [
            "project_id" => 15241
        ];
        return $this->saas->project->finish($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'project_id' => '15241', ), )
         */
    }

    /**
     *重启项目
     */
    public function recovery()
    {
        $params = [
            "project_id" => 15241
        ];
        return $this->saas->project->recovery($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'project_id' => '15241', ), )
         */
    }

    /**
     * 项目模板
     * @return mixed
     */
    public function form()
    {
        $params = [];
        return $this->saas->project->form($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'categories' => array ( 0 => array ( 'id' => '196', 'type' => '0', 'file_type' => '4', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => '3d_url', 'required_output_field' => '', 'sort' => '0', 'view' => 'pointcloud_segment', 'icon' => '/images/category/icon-small/pointcloud-segment.png', 'thumbnail' => '/images/category/icon-big/pointcloud-segment.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'pcd', 'upload_file_extensions' => 'zip,xls,xlsx,csv', 'video_as_frame' => '0', 'created_at' => '1562034809', 'updated_at' => '1575977947', 'desc' => array ( 'id' => '1286', 'category_id' => '196', 'language' => 'zh-CN', 'name' => '点云分割', 'keywords' => '点云,分割 语义识别', 'description' => '对点云数据文件进行分割标注', 'instruction_url' => '', 'template_id' => '0', ), ), 1 => array ( 'id' => '199', 'type' => '0', 'file_type' => '3', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'video_url', 'required_output_field' => '', 'sort' => '0', 'view' => 'video_segmentation', 'icon' => '/images/category/icon-small/video-segmentation.png', 'thumbnail' => '/images/category/icon-big/video-segmentation.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'mp4', 'upload_file_extensions' => 'zip', 'video_as_frame' => '0', 'created_at' => '1566962401', 'updated_at' => '1573044170', 'desc' => array ( 'id' => '1292', 'category_id' => '199', 'language' => 'zh-CN', 'name' => '视频分割', 'keywords' => '视频,分割', 'description' => '视频,分割', 'instruction_url' => '', 'template_id' => '0', ), ), 2 => array ( 'id' => '201', 'type' => '0', 'file_type' => '4', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => '3d_url', 'required_output_field' => '', 'sort' => '0', 'view' => 'pointcloud_tracking', 'icon' => '/images/category/icon-small/pointcloud-tracking.png', 'thumbnail' => '/images/category/icon-big/pointcloud-tracking.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,pcd', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'video_as_frame' => '0', 'created_at' => '1568601871', 'updated_at' => '0', 'desc' => array ( 'id' => '1296', 'category_id' => '201', 'language' => 'zh-CN', 'name' => '点云追踪', 'keywords' => '点云 追踪', 'description' => '点云追踪', 'instruction_url' => '', 'template_id' => '0', ), ), 3 => array ( 'id' => '204', 'type' => '0', 'file_type' => '3', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'video_url', 'required_output_field' => '', 'sort' => '0', 'view' => 'video_label', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'mp4', 'upload_file_extensions' => 'mp4,zip', 'video_as_frame' => '0', 'created_at' => '1573701274', 'updated_at' => '1576032520', 'desc' => array ( 'id' => '1302', 'category_id' => '204', 'language' => 'zh-CN', 'name' => '视频标注', 'keywords' => '视频标注', 'description' => '视频标注', 'instruction_url' => '', 'template_id' => '0', ), ), 4 => array ( 'id' => '205', 'type' => '1', 'file_type' => '0', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'collect_image', 'required_output_field' => '', 'sort' => '0', 'view' => 'collect_image', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,wav,mp3,v3,m4a,mp4,avi,wmv,mkv,txt,pcd,tif', 'upload_file_extensions' => 'txt,xls,xlsx,csv,zip,mp4,avi,wmv,mkv', 'video_as_frame' => '0', 'created_at' => '1575960208', 'updated_at' => '1576228886', 'desc' => array ( 'id' => '1304', 'category_id' => '205', 'language' => 'zh-CN', 'name' => '图片采集', 'keywords' => '采集，图片', 'description' => '采集，图片', 'instruction_url' => '', 'template_id' => '0', ), ), 5 => array ( 'id' => '207', 'type' => '1', 'file_type' => '3', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'collect_video', 'required_output_field' => '', 'sort' => '0', 'view' => 'collect_video', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'mp4,avi,wmv,mkv,wav', 'upload_file_extensions' => 'mp4,avi,wmv,mkv', 'video_as_frame' => '0', 'created_at' => '1576549058', 'updated_at' => '1576549520', 'desc' => array ( 'id' => '1308', 'category_id' => '207', 'language' => 'zh-CN', 'name' => '视频采集', 'keywords' => '采集，视频', 'description' => '视频采集', 'instruction_url' => '', 'template_id' => '0', ), ), 6 => array ( 'id' => '10', 'type' => '0', 'file_type' => '0', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'image_url', 'required_output_field' => '', 'sort' => '10', 'view' => 'image_transcription', 'icon' => '/images/category/icon-small/image-clean.png', 'thumbnail' => '/images/category/icon-big/image-clean.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,tif', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'video_as_frame' => '0', 'created_at' => '0', 'updated_at' => '1575458001', 'desc' => array ( 'id' => '47', 'category_id' => '10', 'language' => 'zh-CN', 'name' => '图片审核', 'keywords' => '表情，情绪，分析', 'description' => '根据人物展现的表情判断情绪分类', 'instruction_url' => '/images/category/preview/bqfx.png', 'template_id' => '318', ), ), 7 => array ( 'id' => '11', 'type' => '0', 'file_type' => '0', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'image_url', 'required_output_field' => '', 'sort' => '11', 'view' => 'image_label', 'icon' => '/images/category/icon-small/image-labelling.png', 'thumbnail' => '/images/category/icon-big/image-labelling.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,tif', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'video_as_frame' => '1', 'created_at' => '0', 'updated_at' => '1575457988', 'desc' => array ( 'id' => '61', 'category_id' => '11', 'language' => 'zh-CN', 'name' => '图片标注', 'keywords' => '图片，矩形框', 'description' => '在图片中将规定的品类用矩形框标出', 'instruction_url' => '/images/category/preview/rzbk.png', 'template_id' => '329', ), ), 8 => array ( 'id' => '20', 'type' => '0', 'file_type' => '2', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'subject', 'required_output_field' => '', 'sort' => '20', 'view' => 'text_analysis', 'icon' => '/images/category/icon-small/text-clean.png', 'thumbnail' => '/images/category/icon-big/text-clean.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'txt', 'upload_file_extensions' => 'xls,xlsx,csv,zip,txt', 'video_as_frame' => '0', 'created_at' => '0', 'updated_at' => '1550561432', 'desc' => array ( 'id' => '58', 'category_id' => '20', 'language' => 'zh-CN', 'name' => '文本审核', 'keywords' => '审核，内容，标签', 'description' => '审核给出的内容是否符合其标签或者描述', 'instruction_url' => '/images/category/preview/nrsh.png', 'template_id' => '319', ), ), 9 => array ( 'id' => '21', 'type' => '0', 'file_type' => '2', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'subject', 'required_output_field' => '', 'sort' => '21', 'view' => 'text_annotation', 'icon' => '/images/category/icon-small/text-labelling.png', 'thumbnail' => '/images/category/icon-big/text-labelling.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'txt', 'upload_file_extensions' => 'xls,xlsx,csv,zip,txt', 'video_as_frame' => '0', 'created_at' => '1529656649', 'updated_at' => '1550561440', 'desc' => array ( 'id' => '1254', 'category_id' => '21', 'language' => 'zh-CN', 'name' => '文本标注', 'keywords' => '文本 标注 ', 'description' => '文本标注', 'instruction_url' => '/images/category/preview/wzbz.png', 'template_id' => '1503', ), ), 10 => array ( 'id' => '30', 'type' => '0', 'file_type' => '1', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'voice_url', 'required_output_field' => '', 'sort' => '30', 'view' => 'voice_classify', 'icon' => '/images/category/icon-small/audio-clean.png', 'thumbnail' => '/images/category/icon-big/audio-clean.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'wav,mp3,v3,m4a', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'video_as_frame' => '0', 'created_at' => '1530169302', 'updated_at' => '1550116409', 'desc' => array ( 'id' => '1256', 'category_id' => '30', 'language' => 'zh-CN', 'name' => '语音审核', 'keywords' => '语音 分类', 'description' => '根据语音内容，分类', 'instruction_url' => '/images/category/preview/yyfx.png', 'template_id' => '1669', ), ), 11 => array ( 'id' => '31', 'type' => '0', 'file_type' => '1', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'voice_url', 'required_output_field' => '', 'sort' => '31', 'view' => 'voice_transcription', 'icon' => '/images/category/icon-small/audio-labelling.png', 'thumbnail' => '/images/category/icon-big/audio-labelling.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'wav,mp3,v3,m4a', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'video_as_frame' => '0', 'created_at' => '0', 'updated_at' => '1550116418', 'desc' => array ( 'id' => '74', 'category_id' => '31', 'language' => 'zh-CN', 'name' => '语音分割', 'keywords' => '语音，分割，截取', 'description' => '按要求从长音频中截取音频段', 'instruction_url' => '/images/category/preview/yyfg.png', 'template_id' => '1446', ), ), 12 => array ( 'id' => '40', 'type' => '0', 'file_type' => '3', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'video_url', 'required_output_field' => '', 'sort' => '40', 'view' => 'video_classify', 'icon' => '/images/category/icon-small/video-clean.png', 'thumbnail' => '/images/category/icon-big/video-clean.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'mp4', 'upload_file_extensions' => 'zip', 'video_as_frame' => '0', 'created_at' => '1541130786', 'updated_at' => '1567416761', 'desc' => array ( 'id' => '1270', 'category_id' => '40', 'language' => 'zh-CN', 'name' => '视频审核', 'keywords' => '视频 审核 分类', 'description' => '观看视频，根据内容将其分类', 'instruction_url' => '/images/category/preview/spsh.png', 'template_id' => '2122', ), ), 13 => array ( 'id' => '41', 'type' => '0', 'file_type' => '3', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'video_image_url', 'required_output_field' => '', 'sort' => '41', 'view' => 'video-tail', 'icon' => '/images/category/icon-small/video-labelling.png', 'thumbnail' => '/images/category/icon-big/video-labelling.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'mp4,avi,wmv,mkv', 'upload_file_extensions' => 'zip,mp4,avi,wmv,mkv', 'video_as_frame' => '1', 'created_at' => '0', 'updated_at' => '1576222098', 'desc' => array ( 'id' => '73', 'category_id' => '41', 'language' => 'zh-CN', 'name' => '连续帧标注', 'keywords' => '标记，视频', 'description' => '连续标记视频中出现的物体', 'instruction_url' => '/images/category/preview/gzbz.png', 'template_id' => '1840', ), ), 14 => array ( 'id' => '50', 'type' => '0', 'file_type' => '4', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => '3d_url', 'required_output_field' => '', 'sort' => '50', 'view' => '3d_pointcloud', 'icon' => '/images/category/icon-small/3d.png', 'thumbnail' => '/images/category/icon-big/3d.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'pcd,jpg,jpeg,png,bmp', 'upload_file_extensions' => 'zip,xls,xlsx,csv', 'video_as_frame' => '0', 'created_at' => '1547098452', 'updated_at' => '1566872955', 'desc' => array ( 'id' => '1272', 'category_id' => '50', 'language' => 'zh-CN', 'name' => '点云标注', 'keywords' => '点云标注', 'description' => '对点云中的物体进行标注', 'instruction_url' => '/images/category/preview/3dbiaozhu.png', 'template_id' => '0', ), ), ), 'types' => array ( 0 => '未选择(发布中)', 1 => '自有团队', 2 => '倍赛数据运营中心', ), 'statuses' => array ( 0 => '发布中', 1 => '审核中', 2 => '作业中', 3 => '已暂停', 5 => '完成', 7 => '已拒绝', ), ), )
         */
    }

    /**
     * 项目流标
     * @return mixed
     */
    public function failauction()
    {
        $params = [
            "project_id" => '15241' //项目id,多个以逗号(,)隔开
        ];
        return $this->saas->project->failauction($params);
        /**
         * 返回数据
         *{
            "error": "",
            "message": "",
            "data": {
                "projectIds": [
                    "15543"
                ]
            }
        }
         */
    }

}