<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class TemplateTest
{
    private $saas;
    private $user;

    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('1234566@qq.com', 'bf123456', 'pc-passport',
            '1.0.0', 'Win32', '111');
    }

    /**
     * 模板列表
     * @return mixed
     */
    public function templateList()
    {
        $params = [
            "limit" => 5, //	    是	int	每页展示数据量
            "page" => 1,  //	    是	int	页数
            /**
             * 可选参数
            keyword	    否	String	关键字搜索
            orderby	    否	String	排序字段
            sort	    否	String	排序方式（正序或倒序）
            status	    否	int	模板状态
            type	    否	int	模板类型
            category_id	否	int	分类id
             *
             */
        ];
        return $this->saas->template->templateList($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'count' => '19', 'list' => array ( 0 => array ( 'id' => '3925', 'category_id' => '50', 'name' => 'adsfadsf1234', 'user_id' => '14045', 'status' => '0', 'type' => '0', 'sort' => '1576486153', 'created_at' => '1576486153', 'updated_at' => '1576486153', 'user' => array ( 'id' => '14045', 'email' => 'yongshi@root.com', 'nickname' => 'yongshi', ), 'categorydesc' => array ( 'category_id' => '50', 'name' => '点云标注', ), ), 1 => array ( 'id' => '3913', 'category_id' => '205', 'name' => '采集模板001假的', 'user_id' => '32330', 'status' => '0', 'type' => '0', 'sort' => '1576136808', 'created_at' => '1576136808', 'updated_at' => '1576136808', 'user' => array ( 'id' => '32330', 'email' => 'wanghaokun@root.com', 'nickname' => '王昊坤', ), 'categorydesc' => array ( 'category_id' => '205', 'name' => '图片采集', ), ), 2 => array ( 'id' => '3910', 'category_id' => '205', 'name' => '采集快捷模板-无法使用002', 'user_id' => '32330', 'status' => '0', 'type' => '0', 'sort' => '1576125084', 'created_at' => '1576124730', 'updated_at' => '1576125084', 'user' => array ( 'id' => '32330', 'email' => 'wanghaokun@root.com', 'nickname' => '王昊坤', ), 'categorydesc' => array ( 'category_id' => '205', 'name' => '图片采集', ), ), 3 => array ( 'id' => '3909', 'category_id' => '205', 'name' => '采集快捷模板-无法使用001', 'user_id' => '32330', 'status' => '0', 'type' => '0', 'sort' => '1576124670', 'created_at' => '1576124670', 'updated_at' => '1576124670', 'user' => array ( 'id' => '32330', 'email' => 'wanghaokun@root.com', 'nickname' => '王昊坤', ), 'categorydesc' => array ( 'category_id' => '205', 'name' => '图片采集', ), ), 4 => array ( 'id' => '3833', 'category_id' => '20', 'name' => '测试001空模板不可用', 'user_id' => '32330', 'status' => '0', 'type' => '0', 'sort' => '1574929582', 'created_at' => '1574929582', 'updated_at' => '1574929582', 'user' => array ( 'id' => '32330', 'email' => 'wanghaokun@root.com', 'nickname' => '王昊坤', ), 'categorydesc' => array ( 'category_id' => '20', 'name' => '文本审核', ), ), ), 'page' => '1', 'limit' => '5', 'orderby' => 'sort', 'sort' => 'desc', 'projectId' => '', 'keyword' => '', 'types' => array ( 0 => '公共模板', 1 => '私有模板', ), 'categories' => array ( 0 => array ( 'id' => '10', 'type' => '0', 'file_type' => '0', 'icon' => '/images/category/icon-small/image-clean.png', 'thumbnail' => '/images/category/icon-big/image-clean.png', 'desc' => array ( 'id' => '47', 'category_id' => '10', 'language' => 'zh-CN', 'name' => '图片审核', 'keywords' => '表情，情绪，分析', 'description' => '根据人物展现的表情判断情绪分类', 'instruction_url' => '/images/category/preview/bqfx.png', 'template_id' => '318', ), ), 1 => array ( 'id' => '11', 'type' => '0', 'file_type' => '0', 'icon' => '/images/category/icon-small/image-labelling.png', 'thumbnail' => '/images/category/icon-big/image-labelling.png', 'desc' => array ( 'id' => '61', 'category_id' => '11', 'language' => 'zh-CN', 'name' => '图片标注', 'keywords' => '图片，矩形框', 'description' => '在图片中将规定的品类用矩形框标出', 'instruction_url' => '/images/category/preview/rzbk.png', 'template_id' => '329', ), ), 2 => array ( 'id' => '20', 'type' => '0', 'file_type' => '2', 'icon' => '/images/category/icon-small/text-clean.png', 'thumbnail' => '/images/category/icon-big/text-clean.png', 'desc' => array ( 'id' => '58', 'category_id' => '20', 'language' => 'zh-CN', 'name' => '文本审核', 'keywords' => '审核，内容，标签', 'description' => '审核给出的内容是否符合其标签或者描述', 'instruction_url' => '/images/category/preview/nrsh.png', 'template_id' => '319', ), ), 3 => array ( 'id' => '21', 'type' => '0', 'file_type' => '2', 'icon' => '/images/category/icon-small/text-labelling.png', 'thumbnail' => '/images/category/icon-big/text-labelling.png', 'desc' => array ( 'id' => '1254', 'category_id' => '21', 'language' => 'zh-CN', 'name' => '文本标注', 'keywords' => '文本 标注 ', 'description' => '文本标注', 'instruction_url' => '/images/category/preview/wzbz.png', 'template_id' => '1503', ), ), 4 => array ( 'id' => '30', 'type' => '0', 'file_type' => '1', 'icon' => '/images/category/icon-small/audio-clean.png', 'thumbnail' => '/images/category/icon-big/audio-clean.png', 'desc' => array ( 'id' => '1256', 'category_id' => '30', 'language' => 'zh-CN', 'name' => '语音审核', 'keywords' => '语音 分类', 'description' => '根据语音内容，分类', 'instruction_url' => '/images/category/preview/yyfx.png', 'template_id' => '1669', ), ), 5 => array ( 'id' => '31', 'type' => '0', 'file_type' => '1', 'icon' => '/images/category/icon-small/audio-labelling.png', 'thumbnail' => '/images/category/icon-big/audio-labelling.png', 'desc' => array ( 'id' => '74', 'category_id' => '31', 'language' => 'zh-CN', 'name' => '语音分割', 'keywords' => '语音，分割，截取', 'description' => '按要求从长音频中截取音频段', 'instruction_url' => '/images/category/preview/yyfg.png', 'template_id' => '1446', ), ), 6 => array ( 'id' => '40', 'type' => '0', 'file_type' => '3', 'icon' => '/images/category/icon-small/video-clean.png', 'thumbnail' => '/images/category/icon-big/video-clean.png', 'desc' => array ( 'id' => '1270', 'category_id' => '40', 'language' => 'zh-CN', 'name' => '视频审核', 'keywords' => '视频 审核 分类', 'description' => '观看视频，根据内容将其分类', 'instruction_url' => '/images/category/preview/spsh.png', 'template_id' => '2122', ), ), 7 => array ( 'id' => '41', 'type' => '0', 'file_type' => '3', 'icon' => '/images/category/icon-small/video-labelling.png', 'thumbnail' => '/images/category/icon-big/video-labelling.png', 'desc' => array ( 'id' => '73', 'category_id' => '41', 'language' => 'zh-CN', 'name' => '连续帧标注', 'keywords' => '标记，视频', 'description' => '连续标记视频中出现的物体', 'instruction_url' => '/images/category/preview/gzbz.png', 'template_id' => '1840', ), ), 8 => array ( 'id' => '50', 'type' => '0', 'file_type' => '4', 'icon' => '/images/category/icon-small/3d.png', 'thumbnail' => '/images/category/icon-big/3d.png', 'desc' => array ( 'id' => '1272', 'category_id' => '50', 'language' => 'zh-CN', 'name' => '点云标注', 'keywords' => '点云标注', 'description' => '对点云中的物体进行标注', 'instruction_url' => '/images/category/preview/3dbiaozhu.png', 'template_id' => '0', ), ), 9 => array ( 'id' => '196', 'type' => '0', 'file_type' => '4', 'icon' => '/images/category/icon-small/pointcloud-segment.png', 'thumbnail' => '/images/category/icon-big/pointcloud-segment.png', 'desc' => array ( 'id' => '1286', 'category_id' => '196', 'language' => 'zh-CN', 'name' => '点云分割', 'keywords' => '点云,分割 语义识别', 'description' => '对点云数据文件进行分割标注', 'instruction_url' => '', 'template_id' => '0', ), ), 10 => array ( 'id' => '199', 'type' => '0', 'file_type' => '3', 'icon' => '/images/category/icon-small/video-segmentation.png', 'thumbnail' => '/images/category/icon-big/video-segmentation.png', 'desc' => array ( 'id' => '1292', 'category_id' => '199', 'language' => 'zh-CN', 'name' => '视频分割', 'keywords' => '视频,分割', 'description' => '视频,分割', 'instruction_url' => '', 'template_id' => '0', ), ), 11 => array ( 'id' => '201', 'type' => '0', 'file_type' => '4', 'icon' => '/images/category/icon-small/pointcloud-tracking.png', 'thumbnail' => '/images/category/icon-big/pointcloud-tracking.png', 'desc' => array ( 'id' => '1296', 'category_id' => '201', 'language' => 'zh-CN', 'name' => '点云追踪', 'keywords' => '点云 追踪', 'description' => '点云追踪', 'instruction_url' => '', 'template_id' => '0', ), ), 12 => array ( 'id' => '204', 'type' => '0', 'file_type' => '3', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'desc' => array ( 'id' => '1302', 'category_id' => '204', 'language' => 'zh-CN', 'name' => '视频标注', 'keywords' => '视频标注', 'description' => '视频标注', 'instruction_url' => '', 'template_id' => '0', ), ), 13 => array ( 'id' => '205', 'type' => '1', 'file_type' => '0', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'desc' => array ( 'id' => '1304', 'category_id' => '205', 'language' => 'zh-CN', 'name' => '图片采集', 'keywords' => '采集，图片', 'description' => '采集，图片', 'instruction_url' => '', 'template_id' => '0', ), ), 14 => array ( 'id' => '207', 'type' => '1', 'file_type' => '3', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'desc' => array ( 'id' => '1308', 'category_id' => '207', 'language' => 'zh-CN', 'name' => '视频采集', 'keywords' => '采集，视频', 'description' => '视频采集', 'instruction_url' => '', 'template_id' => '0', ), ), ), ), )
         */
    }

    /**
     *模板表单
     * @return mixed
     */
    public function form()
    {
        $params = [];
        return $this->saas->template->form($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'types' => array ( 1 => '私有模板', ), 'categories' => array ( 0 => array ( 'id' => '10', 'type' => '0', 'file_type' => '0', 'icon' => '/images/category/icon-small/image-clean.png', 'thumbnail' => '/images/category/icon-big/image-clean.png', 'view' => 'image_transcription', 'desc' => array ( 'id' => '47', 'category_id' => '10', 'language' => 'zh-CN', 'name' => '图片审核', 'keywords' => '表情，情绪，分析', 'description' => '根据人物展现的表情判断情绪分类', 'instruction_url' => '/images/category/preview/bqfx.png', 'template_id' => '318', ), ), 1 => array ( 'id' => '11', 'type' => '0', 'file_type' => '0', 'icon' => '/images/category/icon-small/image-labelling.png', 'thumbnail' => '/images/category/icon-big/image-labelling.png', 'view' => 'image_label', 'desc' => array ( 'id' => '61', 'category_id' => '11', 'language' => 'zh-CN', 'name' => '图片标注', 'keywords' => '图片，矩形框', 'description' => '在图片中将规定的品类用矩形框标出', 'instruction_url' => '/images/category/preview/rzbk.png', 'template_id' => '329', ), ), 2 => array ( 'id' => '20', 'type' => '0', 'file_type' => '2', 'icon' => '/images/category/icon-small/text-clean.png', 'thumbnail' => '/images/category/icon-big/text-clean.png', 'view' => 'text_analysis', 'desc' => array ( 'id' => '58', 'category_id' => '20', 'language' => 'zh-CN', 'name' => '文本审核', 'keywords' => '审核，内容，标签', 'description' => '审核给出的内容是否符合其标签或者描述', 'instruction_url' => '/images/category/preview/nrsh.png', 'template_id' => '319', ), ), 3 => array ( 'id' => '21', 'type' => '0', 'file_type' => '2', 'icon' => '/images/category/icon-small/text-labelling.png', 'thumbnail' => '/images/category/icon-big/text-labelling.png', 'view' => 'text_annotation', 'desc' => array ( 'id' => '1254', 'category_id' => '21', 'language' => 'zh-CN', 'name' => '文本标注', 'keywords' => '文本 标注 ', 'description' => '文本标注', 'instruction_url' => '/images/category/preview/wzbz.png', 'template_id' => '1503', ), ), 4 => array ( 'id' => '30', 'type' => '0', 'file_type' => '1', 'icon' => '/images/category/icon-small/audio-clean.png', 'thumbnail' => '/images/category/icon-big/audio-clean.png', 'view' => 'voice_classify', 'desc' => array ( 'id' => '1256', 'category_id' => '30', 'language' => 'zh-CN', 'name' => '语音审核', 'keywords' => '语音 分类', 'description' => '根据语音内容，分类', 'instruction_url' => '/images/category/preview/yyfx.png', 'template_id' => '1669', ), ), 5 => array ( 'id' => '31', 'type' => '0', 'file_type' => '1', 'icon' => '/images/category/icon-small/audio-labelling.png', 'thumbnail' => '/images/category/icon-big/audio-labelling.png', 'view' => 'voice_transcription', 'desc' => array ( 'id' => '74', 'category_id' => '31', 'language' => 'zh-CN', 'name' => '语音分割', 'keywords' => '语音，分割，截取', 'description' => '按要求从长音频中截取音频段', 'instruction_url' => '/images/category/preview/yyfg.png', 'template_id' => '1446', ), ), 6 => array ( 'id' => '40', 'type' => '0', 'file_type' => '3', 'icon' => '/images/category/icon-small/video-clean.png', 'thumbnail' => '/images/category/icon-big/video-clean.png', 'view' => 'video_classify', 'desc' => array ( 'id' => '1270', 'category_id' => '40', 'language' => 'zh-CN', 'name' => '视频审核', 'keywords' => '视频 审核 分类', 'description' => '观看视频，根据内容将其分类', 'instruction_url' => '/images/category/preview/spsh.png', 'template_id' => '2122', ), ), 7 => array ( 'id' => '41', 'type' => '0', 'file_type' => '3', 'icon' => '/images/category/icon-small/video-labelling.png', 'thumbnail' => '/images/category/icon-big/video-labelling.png', 'view' => 'video-tail', 'desc' => array ( 'id' => '73', 'category_id' => '41', 'language' => 'zh-CN', 'name' => '连续帧标注', 'keywords' => '标记，视频', 'description' => '连续标记视频中出现的物体', 'instruction_url' => '/images/category/preview/gzbz.png', 'template_id' => '1840', ), ), 8 => array ( 'id' => '50', 'type' => '0', 'file_type' => '4', 'icon' => '/images/category/icon-small/3d.png', 'thumbnail' => '/images/category/icon-big/3d.png', 'view' => '3d_pointcloud', 'desc' => array ( 'id' => '1272', 'category_id' => '50', 'language' => 'zh-CN', 'name' => '点云标注', 'keywords' => '点云标注', 'description' => '对点云中的物体进行标注', 'instruction_url' => '/images/category/preview/3dbiaozhu.png', 'template_id' => '0', ), ), 9 => array ( 'id' => '196', 'type' => '0', 'file_type' => '4', 'icon' => '/images/category/icon-small/pointcloud-segment.png', 'thumbnail' => '/images/category/icon-big/pointcloud-segment.png', 'view' => 'pointcloud_segment', 'desc' => array ( 'id' => '1286', 'category_id' => '196', 'language' => 'zh-CN', 'name' => '点云分割', 'keywords' => '点云,分割 语义识别', 'description' => '对点云数据文件进行分割标注', 'instruction_url' => '', 'template_id' => '0', ), ), 10 => array ( 'id' => '199', 'type' => '0', 'file_type' => '3', 'icon' => '/images/category/icon-small/video-segmentation.png', 'thumbnail' => '/images/category/icon-big/video-segmentation.png', 'view' => 'video_segmentation', 'desc' => array ( 'id' => '1292', 'category_id' => '199', 'language' => 'zh-CN', 'name' => '视频分割', 'keywords' => '视频,分割', 'description' => '视频,分割', 'instruction_url' => '', 'template_id' => '0', ), ), 11 => array ( 'id' => '201', 'type' => '0', 'file_type' => '4', 'icon' => '/images/category/icon-small/pointcloud-tracking.png', 'thumbnail' => '/images/category/icon-big/pointcloud-tracking.png', 'view' => 'pointcloud_tracking', 'desc' => array ( 'id' => '1296', 'category_id' => '201', 'language' => 'zh-CN', 'name' => '点云追踪', 'keywords' => '点云 追踪', 'description' => '点云追踪', 'instruction_url' => '', 'template_id' => '0', ), ), 12 => array ( 'id' => '204', 'type' => '0', 'file_type' => '3', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'view' => 'video_label', 'desc' => array ( 'id' => '1302', 'category_id' => '204', 'language' => 'zh-CN', 'name' => '视频标注', 'keywords' => '视频标注', 'description' => '视频标注', 'instruction_url' => '', 'template_id' => '0', ), ), 13 => array ( 'id' => '205', 'type' => '1', 'file_type' => '0', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'view' => 'collect_image', 'desc' => array ( 'id' => '1304', 'category_id' => '205', 'language' => 'zh-CN', 'name' => '图片采集', 'keywords' => '采集，图片', 'description' => '采集，图片', 'instruction_url' => '', 'template_id' => '0', ), ), 14 => array ( 'id' => '207', 'type' => '1', 'file_type' => '3', 'icon' => '/images/category/icon-small/icon-default-image@2x.png', 'thumbnail' => '/images/category/icon-big/icon-default-image@2x.png', 'view' => 'collect_video', 'desc' => array ( 'id' => '1308', 'category_id' => '207', 'language' => 'zh-CN', 'name' => '视频采集', 'keywords' => '采集，视频', 'description' => '视频采集', 'instruction_url' => '', 'template_id' => '0', ), ), ), ), )
         */
    }

    /**
     * 创建模板
     * @return mixed
     */
    public function create()
    {
        $params = [
            //模板信息
            "config" => '[{"type":"layout","column0":{"span":18,"children":[{"type":"task-file-placeholder","header":"","tips":"","id":"99e930df-006a-41d7-9770-8a63135d81f1","anchor":"image_url"}]},"column1":{"span":6,"children":[{"type":"form-radio","header":"性别","tips":"","vertical":false,"data":[{"checked":false,"text":"男"},{"checked":true,"text":"女"}],"value":"女","required":true,"id":"891a411d-5caa-4bc9-829e-805b76ef67a4","rules":[]},{"type":"form-checkbox","header":"背景","tips":"","vertical":false,"data":[{"checked":false,"text":"树"},{"checked":false,"text":"花"},{"text":"草","checked":false}],"value":[],"required":true,"id":"370617c7-9205-451d-8bd5-70c99b2595f6","rules":[]}]},"id":"3ef5484f-fab4-4367-90bc-23c7f482a413","ratio":3,"scene":"edit"}]',
            //模板名称
            "name" => "test-rent-template-2",
            //模板类型
            "type" => 1,
            //模板分类id
            "category_id" => 10,
            /**
             * 可选参数
             * mode		int	模板模式,0:常规(默认),1:采集快捷模板
             */
        ];
        return $this->saas->template->create($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'template_id' => '3939', ), )
         */
    }

    /**
     * 模板详情
     * @return mixed
     */
    public function detail()
    {
        $params = ["template_id" => 3939];
        return $this->saas->template->detail($params);
        /**
         * 返回数据
         * array ( 'error' => '', 'message' => '', 'data' => array ( 'template' => array ( 'id' => '3939', 'site_id' => '363', 'category_id' => '10', 'name' => 'test-rent-template-2', 'parent_id' => '0', 'project_id' => '0', 'user_id' => '38032', 'sort' => '1576649703', 'status' => '0', 'type' => '1', 'mode' => '0', 'file_type' => '0', 'config' => array ( 0 => array ( 'type' => 'layout', 'column0' => array ( 'span' => 18, 'children' => array ( 0 => array ( 'type' => 'task-file-placeholder', 'header' => '', 'tips' => '', 'id' => '99e930df-006a-41d7-9770-8a63135d81f1', 'anchor' => 'image_url', ), ), ), 'column1' => array ( 'span' => 6, 'children' => array ( 0 => array ( 'type' => 'form-radio', 'header' => '性别', 'tips' => '', 'vertical' => false, 'data' => array ( 0 => array ( 'checked' => false, 'text' => '男', ), 1 => array ( 'checked' => true, 'text' => '女', ), ), 'value' => '女', 'required' => true, 'id' => '891a411d-5caa-4bc9-829e-805b76ef67a4', 'rules' => array ( ), ), 1 => array ( 'type' => 'form-checkbox', 'header' => '背景', 'tips' => '', 'vertical' => false, 'data' => array ( 0 => array ( 'checked' => false, 'text' => '树', ), 1 => array ( 'checked' => false, 'text' => '花', ), 2 => array ( 'text' => '草', 'checked' => false, ), ), 'value' => array ( ), 'required' => true, 'id' => '370617c7-9205-451d-8bd5-70c99b2595f6', 'rules' => array ( ), ), ), ), 'id' => '3ef5484f-fab4-4367-90bc-23c7f482a413', 'ratio' => 3, 'scene' => 'edit', ), ), 'created_at' => '1576649703', 'updated_at' => '1576649703', 'lastVersion' => array ( 'id' => '6621', 'template_id' => '3939', 'number' => '20191218141503545', 'user_id' => '38032', 'config' => '[{"type":"layout","column0":{"span":18,"children":[{"type":"task-file-placeholder","header":"","tips":"","id":"99e930df-006a-41d7-9770-8a63135d81f1","anchor":"image_url"}]},"column1":{"span":6,"children":[{"type":"form-radio","header":"性别","tips":"","vertical":false,"data":[{"checked":false,"text":"男"},{"checked":true,"text":"女"}],"value":"女","required":true,"id":"891a411d-5caa-4bc9-829e-805b76ef67a4","rules":[]},{"type":"form-checkbox","header":"背景","tips":"","vertical":false,"data":[{"checked":false,"text":"树"},{"checked":false,"text":"花"},{"text":"草","checked":false}],"value":[],"required":true,"id":"370617c7-9205-451d-8bd5-70c99b2595f6","rules":[]}]},"id":"3ef5484f-fab4-4367-90bc-23c7f482a413","ratio":3,"scene":"edit"}]', 'created_at' => '1576649703', 'updated_at' => '1576649703', ), ), 'projects' => array ( ), ), )
         */
    }

    /**
     * 编辑模板
     * @return mixed
     */
    public function update()
    {
        $params = $params = [
            "template_id" => 3939,
            //模板信息
            "config" => '[{"type":"layout","column0":{"span":18,"children":[{"type":"task-file-placeholder","header":"","tips":"","id":"99e930df-006a-41d7-9770-8a63135d81f1","anchor":"image_url"}]},"column1":{"span":6,"children":[{"type":"form-radio","header":"性别","tips":"","vertical":false,"data":[{"checked":false,"text":"男"},{"checked":true,"text":"女"}],"value":"女","required":true,"id":"891a411d-5caa-4bc9-829e-805b76ef67a4","rules":[]},{"type":"form-checkbox","header":"背景","tips":"","vertical":false,"data":[{"checked":false,"text":"树"},{"checked":false,"text":"花"},{"text":"草","checked":false}],"value":[],"required":true,"id":"370617c7-9205-451d-8bd5-70c99b2595f6","rules":[]}]},"id":"3ef5484f-fab4-4367-90bc-23c7f482a413","ratio":3,"scene":"edit"}]',
            //模板名称
            "name" => "test-rent-template-2-update",
            //模板类型
            "type" => 1,
            //模板分类id
            "category_id" => 10,
            /**
             * 可选参数
             * mode		int	模板模式,0:常规(默认),1:采集快捷模板
             */
        ];
        return $this->saas->template->update($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'template_id' => '3939', ), )
         */
    }

    /**
     * 复制模板
     * @return mixed
     */
    public function copy()
    {
        $params = [
            "template_id" => 3939
        ];
        return $this->saas->template->copy($params);
        /**
         * 返回数据
         *array ( 'error' => '', 'message' => '', 'data' => array ( 'info' => array ( 'id' => '3940', 'site_id' => '363', 'category_id' => '10', 'name' => 'test-rent-template-2-update.1576650603', 'parent_id' => '0', 'project_id' => '0', 'user_id' => '38032', 'sort' => '1576650603', 'status' => '0', 'type' => '1', 'mode' => '0', 'file_type' => '0', 'config' => '[{"type":"layout","column0":{"span":18,"children":[{"type":"task-file-placeholder","header":"","tips":"","id":"99e930df-006a-41d7-9770-8a63135d81f1","anchor":"image_url"}]},"column1":{"span":6,"children":[{"type":"form-radio","header":"性别","tips":"","vertical":false,"data":[{"checked":false,"text":"男"},{"checked":true,"text":"女"}],"value":"女","required":true,"id":"891a411d-5caa-4bc9-829e-805b76ef67a4","rules":[]},{"type":"form-checkbox","header":"背景","tips":"","vertical":false,"data":[{"checked":false,"text":"树"},{"checked":false,"text":"花"},{"text":"草","checked":false}],"value":[],"required":true,"id":"370617c7-9205-451d-8bd5-70c99b2595f6","rules":[]}]},"id":"3ef5484f-fab4-4367-90bc-23c7f482a413","ratio":3,"scene":"edit"}]', 'created_at' => '1576650603', 'updated_at' => '1576650603', ), ), )
         */
    }

    /**
     * 删除模板
     * @return mixed
     */
    public function delete()
    {
        $params = [
            "template_id" =>  4011
        ];
        return $this->saas->template->delete($params);
        /**
         * 返回数据
         *array(3) { ["data"]=> array(1) { ["template_id"]=> string(4) "4011" } ["error"]=> string(0) "" ["message"]=> string(0) "" }
         */
    }

    /**
     * 选择项目使用模板
     * @return mixed
     */
    public function useTemplate()
    {
        $params = [
            "template_id" =>  3939
        ];
        return $this->saas->template->useTemplate($params);
        /**
         * 返回结果
         * array(3) { ["data"]=> array(1) { ["info"]=> array(15) { ["id"]=> string(4) "3939" ["site_id"]=> string(3) "363" ["category_id"]=> string(2) "10" ["name"]=> string(27) "test-rent-template-2-update" ["parent_id"]=> string(1) "0" ["project_id"]=> string(1) "0" ["user_id"]=> string(5) "38032" ["sort"]=> string(10) "1576649941" ["status"]=> string(1) "0" ["type"]=> string(1) "1" ["mode"]=> string(1) "0" ["file_type"]=> string(1) "0" ["config"]=> string(753) "[{"type":"layout","column0":{"span":18,"children":[{"type":"task-file-placeholder","header":"","tips":"","id":"99e930df-006a-41d7-9770-8a63135d81f1","anchor":"image_url"}]},"column1":{"span":6,"children":[{"type":"form-radio","header":"性别","tips":"","vertical":false,"data":[{"checked":false,"text":"男"},{"checked":true,"text":"女"}],"value":"女","required":true,"id":"891a411d-5caa-4bc9-829e-805b76ef67a4","rules":[]},{"type":"form-checkbox","header":"背景","tips":"","vertical":false,"data":[{"checked":false,"text":"树"},{"checked":false,"text":"花"},{"text":"草","checked":false}],"value":[],"required":true,"id":"370617c7-9205-451d-8bd5-70c99b2595f6","rules":[]}]},"id":"3ef5484f-fab4-4367-90bc-23c7f482a413","ratio":3,"scene":"edit"}]" ["created_at"]=> string(10) "1576649703" ["updated_at"]=> string(10) "1576664149" } } ["error"]=> string(0) "" ["message"]=> string(0) "" }
         */
    }

}