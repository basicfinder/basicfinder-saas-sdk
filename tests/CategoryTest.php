<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class CategoryTest
{
    private $saas;
    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('liujianping@basicfinder.com', 'bf123456', 'pc-root', '1.0.0', 'Win32', '666');
    }

    /**
     * 分类列表
     * @return mixed
     */
    public function categories()
    {
        $params = [
            "limit" => 5,
            "page" => 1
            /**
             * 可选参数
            file_type	否	int	文件类型
            orderby	否	String	排序字段
            type	否	int	标注类型
            keyword	否	string	关键字搜索
            sort	否	int	排序方式（正序或倒序）
             */
        ];
        return $this->saas->category->categories($params);
        /**
         * 返回数据
         *array ( 'data' => array ( 'list' => array ( 0 => array ( 'id' => '196', 'category_id' => '196', 'language' => 'zh-CN', 'name' => '点云分割', 'keywords' => '点云,分割 语义识别', 'description' => '对点云数据文件进行分割标注', 'instruction_url' => '', 'template_id' => '0', 'type' => '0', 'file_type' => '4', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => '3d_url', 'required_output_field' => '', 'sort' => '0', 'view' => 'pointcloud_segment', 'icon' => '/images/category/icon-small/pointcloud-segment.png', 'thumbnail' => '/images/category/icon-big/pointcloud-segment.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'pcd', 'upload_file_extensions' => 'zip,xls,xlsx,csv', 'video_as_frame' => '0', 'created_at' => '1562034809', 'updated_at' => '1575977947', 'type_name' => '标注类', ), 1 => array ( 'id' => '199', 'category_id' => '199', 'language' => 'zh-CN', 'name' => '视频分割', 'keywords' => '视频,分割', 'description' => '视频,分割', 'instruction_url' => '', 'template_id' => '0', 'type' => '0', 'file_type' => '3', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'video_url', 'required_output_field' => '', 'sort' => '0', 'view' => 'video_segmentation', 'icon' => '/images/category/icon-small/video-segmentation.png', 'thumbnail' => '/images/category/icon-big/video-segmentation.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'mp4', 'upload_file_extensions' => 'zip', 'video_as_frame' => '0', 'created_at' => '1566962401', 'updated_at' => '1573044170', 'type_name' => '标注类', ), 2 => array ( 'id' => '201', 'category_id' => '201', 'language' => 'zh-CN', 'name' => '点云追踪', 'keywords' => '点云 追踪', 'description' => '点云追踪', 'instruction_url' => '', 'template_id' => '0', 'type' => '0', 'file_type' => '4', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => '3d_url', 'required_output_field' => '', 'sort' => '0', 'view' => 'pointcloud_tracking', 'icon' => '/images/category/icon-small/pointcloud-tracking.png', 'thumbnail' => '/images/category/icon-big/pointcloud-tracking.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,pcd', 'upload_file_extensions' => 'xls,xlsx,csv,zip', 'video_as_frame' => '0', 'created_at' => '1568601871', 'updated_at' => '0', 'type_name' => '标注类', ), 3 => array ( 'id' => '204', 'category_id' => '204', 'language' => 'zh-CN', 'name' => '视频标注', 'keywords' => '视频标注', 'description' => '视频标注', 'instruction_url' => '', 'template_id' => '0', 'type' => '0', 'file_type' => '3', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'video_url', 'required_output_field' => '', 'sort' => '0', 'view' => 'video_label', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'mp4', 'upload_file_extensions' => 'mp4,zip', 'video_as_frame' => '0', 'created_at' => '1573701274', 'updated_at' => '1576032520', 'type_name' => '标注类', ), 4 => array ( 'id' => '205', 'category_id' => '205', 'language' => 'zh-CN', 'name' => '图片采集', 'keywords' => '采集，图片', 'description' => '采集，图片', 'instruction_url' => '', 'template_id' => '0', 'type' => '1', 'file_type' => '0', 'status' => '0', 'description_input' => '', 'description_output' => '', 'required_input_field' => 'collect_image', 'required_output_field' => '', 'sort' => '0', 'view' => 'collect_image', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'filter' => '', 'draw_type' => '', 'file_extensions' => 'jpg,jpeg,png,bmp,wav,mp3,v3,m4a,mp4,avi,wmv,mkv,txt,pcd,tif', 'upload_file_extensions' => 'txt,xls,xlsx,csv,zip,mp4,avi,wmv,mkv', 'video_as_frame' => '0', 'created_at' => '1575960208', 'updated_at' => '1576228886', 'type_name' => '采集类', ), ), 'count' => '16', 'page' => '1', 'limit' => '5', 'sort' => 'asc', 'orderby' => 'sort', 'keyword' => '', 'type' => '', 'types' => array ( 0 => '标注类', 1 => '采集类', 2 => '外部链接', ), 'file_type' => '', 'file_types' => array ( 0 => '图片类', 1 => '语音类', 2 => '文本类', 3 => '视频类', 4 => '3D类', ), ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 分类创建
     * @return mixed
     */
    public function create()
    {
        $params = [
            "category" => [
                "type" => "0",
                "video_as_frame" => "0",
                "icon" => "/images/category/icon-small/icon-default-image@2x.png",
                "thumbnail" => "/images/category/icon-big/icon-default-image@2x.png",
                "draw_type" => "",
                "property_type" => "0",
                "required_input_field" => "cate-unique-data-1",
                "view" => "cate-unique-template-1",
                "file_type" => "0",
                "upload_file_extensions" => "xls,xlsx,csv,zip,txt",
                "file_extensions" => "jpg,jpeg,png"
            ],
            "zhCategory" => [
                "language" => "zh-CN",
                "name" => "alibaba-ai-标注",
                "keywords" => "Alipay,alibaba,taobao",
                "description" => "阿里巴巴AI图片标注",
                "instruction_url" => "",
                "template_id" => ""
            ],
            "enCategory" => [
                "language" => "en",
                "name" => "alibaba-ai-tagging",
                "keywords" => "Alipay,alibaba,taobao",
                "description" => "alibaba-ai-tagging",
                "instruction_url" => "",
                "template_id" => ""
            ]
        ];
        return $this->saas->category->create($params);
        /**
         * 返回数据
         *{"error":"","message":"","data":{"category_id":"209"}}
         */
    }

    /**
     * 编辑分类
     * @return mixed
     */
    public function update()
    {
        $params = [
            "category_id" => 210,
            "category" => [
                "type" => "0",
                "video_as_frame" => "0",
                "icon" => "/images/category/icon-small/icon-default-image@2x.png",
                "thumbnail" => "/images/category/icon-big/icon-default-image@2x.png",
                "draw_type" => "",
                "property_type" => "0",
                "required_input_field" => "cate-unique-data-1-update",
                "view" => "cate-unique-template-1-update",
                "file_type" => "0",
                "upload_file_extensions" => "xls,xlsx,csv,zip,txt",
                "file_extensions" => "jpg,jpeg,png"
            ],
            "zhCategory" => [
                "language" => "zh-CN",
                "name" => "alibaba-ai-标注-update",
                "keywords" => "Alipay,alibaba,taobao",
                "description" => "阿里巴巴AI图片标注",
                "instruction_url" => "",
                "template_id" => ""
            ],
            "enCategory" => [
                "language" => "en",
                "name" => "alibaba-ai-tagging-update",
                "keywords" => "Alipay,alibaba,taobao",
                "description" => "alibaba-ai-tagging",
                "instruction_url" => "",
                "template_id" => ""
            ]
        ];
        return $this->saas->category->update($params);
        /**
         * 返回数据
         *array ( 'data' => array ( 'category_id' => '210', ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 删除分类
     * @return mixed
     */
    public function delete()
    {
        $params = [
            "category_id" => 210
        ];
        return $this->saas->category->delete($params);
        /**
         * 返回数据
         *array ( 'data' => array ( 'category_id' => '210', ), 'error' => '', 'message' => '', )
         */
    }
}