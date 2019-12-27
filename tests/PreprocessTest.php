<?php
namespace BasicfinderSaas\Test;

use BasicfinderSaas\BasicfinderSaas;

class PreprocessTest
{
    private $saas;
    public function __construct()
    {
        $this->saas = new BasicfinderSaas();
        $this->saas->auth('liujianping@basicfinder.com', 'bf123456', 'pc-root', '1.0.0', 'Win32', '666');
    }

    /**
     * 已接入的外部模型列表
     * @return mixed
     */
    public function modelList()
    {
        $params = [];
        return $this->saas->preprocess->modelList($params);
        /**
         * 返回数据
         *array ( 'data' => array ( 'list' => array ( 0 => array ( 'id' => '91', 'name' => '视频抽帧测试.1576722440', 'key' => '', 'category_id' => '42', 'status' => '1', 'sort' => '0', 'url' => 'http://', 'tag' => '', 'desc' => '', 'request_config' => '{}', 'request_fields_relation' => '{}', 'response_config' => '{}', 'response_fields_relation' => '{}', 'response_item_config' => '', 'created_at' => '1576722440', 'updated_at' => '1576722440', 'category' => array ( 'id' => '42', 'name' => '视频抽帧', 'key' => '', 'script' => 'video/frame', 'status' => '0', 'sort' => '0', 'icon' => '', 'desc' => '1111', 'doc' => '', 'request_fields' => '{}', 'response_fields' => '{}', 'created_at' => '1572610381', 'updated_at' => '1572610409', ), ), 1 => array ( 'id' => '90', 'name' => '人和车(MT)', 'key' => '', 'category_id' => '2', 'status' => '1', 'sort' => '0', 'url' => 'http://192.168.1.115:9061', 'tag' => '', 'desc' => '', 'request_config' => ' { "data": "/9j/4AAQSk......C/c6//2Q==", "type": "jpg", "filename": "xxxx.jpg" } ', 'request_fields_relation' => '{"$binary": "data","$type": "type","$filename": "filename"} ', 'response_config' => '{ "ret": 0, "errmsg": "", "result": [ { "clsid": 0, "class": "front", "score": 0.998887300491333, "left": 0.2942097026604069, "top": 0.20094562647754138, "right": 0.43661971830985913, "bottom": 0.9196217494089834 }, { "clsid": 1, "class": "inside", "score": 0.9971734285354614, "left": 0.621283255086072, "top": 0.32387706855791965, "right": 0.9577464788732394, "bottom": 0.817966903073286 } ] } ', 'response_fields_relation' => ' {"$error":"ret","$message":"errmsg","$data":"result","$label":"class","$score":"score","$left": "left","$top": "top","$right": "right","$bottom": "bottom"} ', 'response_item_config' => '', 'created_at' => '1574841517', 'updated_at' => '0', 'category' => array ( 'id' => '2', 'name' => '图片画框', 'key' => 'ai_model_category_id2', 'script' => 'image\\rect', 'status' => '0', 'sort' => '0', 'icon' => '/images/category/preview/qxfx.png', 'desc' => '', 'doc' => '', 'request_fields' => '{"$binary": "图片base64值","$type": "图片类型","$filename": "图片名称"}', 'response_fields' => '{"$error":"错误号","$message":"提示信息","$data":"数据列表","$label":"标签","$score":"正确率","$left": "左边值","$top": "上边值","$right": "右边值","$bottom": "底边值"}', 'created_at' => '1532404427', 'updated_at' => '1547197766', ), ), 2 => array ( 'id' => '89', 'name' => '视频抽帧测试', 'key' => '', 'category_id' => '42', 'status' => '1', 'sort' => '0', 'url' => 'http://', 'tag' => '', 'desc' => '', 'request_config' => '{}', 'request_fields_relation' => '{}', 'response_config' => '{}', 'response_fields_relation' => '{}', 'response_item_config' => '', 'created_at' => '1572610820', 'updated_at' => '0', 'category' => array ( 'id' => '42', 'name' => '视频抽帧', 'key' => '', 'script' => 'video/frame', 'status' => '0', 'sort' => '0', 'icon' => '', 'desc' => '1111', 'doc' => '', 'request_fields' => '{}', 'response_fields' => '{}', 'created_at' => '1572610381', 'updated_at' => '1572610409', ), ), 3 => array ( 'id' => '88', 'name' => '车轮图片识别', 'key' => 'ai_model_id88', 'category_id' => '2', 'status' => '1', 'sort' => '0', 'url' => 'http://192.168.1.115:9060/', 'tag' => '', 'desc' => '', 'request_config' => '{ "data": "/9j/4AAQSk......C/c6//2Q==", "type": "jpg", "filename": "xxxx.jpg" }', 'request_fields_relation' => '{"$binary": "data","$type": "type","$filename": "filename"}', 'response_config' => '{ "ret": 0, "errmsg": "", "result": [ { "clsid": 0, "class": "front", "score": 0.998887300491333, "left": 0.2942097026604069, "top": 0.20094562647754138, "right": 0.43661971830985913, "bottom": 0.9196217494089834 }, { "clsid": 1, "class": "inside", "score": 0.9971734285354614, "left": 0.621283255086072, "top": 0.32387706855791965, "right": 0.9577464788732394, "bottom": 0.817966903073286 } ] }', 'response_fields_relation' => '{"$error":"ret","$message":"errmsg","$data":"result","$label":"class","$score":"score","$left": "left","$top": "top","$right": "right","$bottom": "bottom"}', 'response_item_config' => '', 'created_at' => '1567589051', 'updated_at' => '1575357158', 'category' => array ( 'id' => '2', 'name' => '图片画框', 'key' => 'ai_model_category_id2', 'script' => 'image\\rect', 'status' => '0', 'sort' => '0', 'icon' => '/images/category/preview/qxfx.png', 'desc' => '', 'doc' => '', 'request_fields' => '{"$binary": "图片base64值","$type": "图片类型","$filename": "图片名称"}', 'response_fields' => '{"$error":"错误号","$message":"提示信息","$data":"数据列表","$label":"标签","$score":"正确率","$left": "左边值","$top": "上边值","$right": "右边值","$bottom": "底边值"}', 'created_at' => '1532404427', 'updated_at' => '1547197766', ), ), 4 => array ( 'id' => '87', 'name' => '腾讯优图速算.1567136531', 'key' => 'ai_model_id87', 'category_id' => '36', 'status' => '1', 'sort' => '0', 'url' => '0', 'tag' => '', 'desc' => '', 'request_config' => '{}', 'request_fields_relation' => '{}', 'response_config' => '{}', 'response_fields_relation' => '{}', 'response_item_config' => '', 'created_at' => '1567136531', 'updated_at' => '1567136531', 'category' => array ( 'id' => '36', 'name' => '腾讯优图速算', 'key' => 'ai_model_category_id36', 'script' => 'image/tencentYoutu', 'status' => '0', 'sort' => '0', 'icon' => '', 'desc' => '腾讯优图速算接口', 'doc' => '', 'request_fields' => '', 'response_fields' => '', 'created_at' => '0', 'updated_at' => '0', ), ), 5 => array ( 'id' => '85', 'name' => '腾讯优图速算.1553833450', 'key' => 'ai_model_id85', 'category_id' => '36', 'status' => '1', 'sort' => '0', 'url' => '0', 'tag' => '', 'desc' => '', 'request_config' => '{}', 'request_fields_relation' => '{}', 'response_config' => '{}', 'response_fields_relation' => '{}', 'response_item_config' => '', 'created_at' => '1553833450', 'updated_at' => '1560738730', 'category' => array ( 'id' => '36', 'name' => '腾讯优图速算', 'key' => 'ai_model_category_id36', 'script' => 'image/tencentYoutu', 'status' => '0', 'sort' => '0', 'icon' => '', 'desc' => '腾讯优图速算接口', 'doc' => '', 'request_fields' => '', 'response_fields' => '', 'created_at' => '0', 'updated_at' => '0', ), ), 6 => array ( 'id' => '84', 'name' => '百度ai语音', 'key' => 'ai_model_id84', 'category_id' => '37', 'status' => '1', 'sort' => '0', 'url' => '', 'tag' => '', 'desc' => '', 'request_config' => '{}', 'request_fields_relation' => '{}', 'response_config' => '{}', 'response_fields_relation' => '{}', 'response_item_config' => '', 'created_at' => '0', 'updated_at' => '0', 'category' => array ( 'id' => '37', 'name' => '百度语音', 'key' => 'ai_model_category_id37', 'script' => 'audio/baiduAudio', 'status' => '0', 'sort' => '0', 'icon' => '', 'desc' => '百度ai语音', 'doc' => '', 'request_fields' => '{"error":"","message":"","data":{"category_id":"41"}}', 'response_fields' => '{"error":"","message":"","data":{"category_id":"41"}}', 'created_at' => '0', 'updated_at' => '1568793146', ), ), 7 => array ( 'id' => '83', 'name' => '腾讯优图速算', 'key' => 'ai_model_id83', 'category_id' => '36', 'status' => '1', 'sort' => '0', 'url' => '0', 'tag' => '', 'desc' => '', 'request_config' => '{}', 'request_fields_relation' => '{}', 'response_config' => '{}', 'response_fields_relation' => '{}', 'response_item_config' => '', 'created_at' => '1551411349', 'updated_at' => '1553833449', 'category' => array ( 'id' => '36', 'name' => '腾讯优图速算', 'key' => 'ai_model_category_id36', 'script' => 'image/tencentYoutu', 'status' => '0', 'sort' => '0', 'icon' => '', 'desc' => '腾讯优图速算接口', 'doc' => '', 'request_fields' => '', 'response_fields' => '', 'created_at' => '0', 'updated_at' => '0', ), ), 8 => array ( 'id' => '82', 'name' => '超像素.吴昊.1550636542', 'key' => 'ai_model_id82', 'category_id' => '34', 'status' => '1', 'sort' => '0', 'url' => 'http://61.149.7.84:7700/superpixel', 'tag' => '', 'desc' => '', 'request_config' => '{ "data": "/9j/4AAQSk......C/c6//2Q==", "type": "jpg", "filename": "filename", "tolerance": "20 " }', 'request_fields_relation' => '{ "$binary": "data", "$type": "type", "$filename": "filename","$tolerance":"tolerance"}', 'response_config' => '{ "error": "", "message": "", "data": [ {"type":"polygon","editable":false,"points":[{"x":0,"y":0},{"x":0,"y":0.02819237112999},{"x":0,"y":0.026533996686339},{"x":0.0080482894554734,"y":0.026533996686339},{"x":0.010060362517834,"y":0.024875622242689},{"x":0.016096578910947,"y":0.024875622242689},{"x":0.018108651041985,"y":0.023217247799039},{"x":0.024144869297743,"y":0.023217247799039},{"x":0.028169013559818,"y":0.021558871492743},{"x":0.028169013559818,"y":0.0099502485245466},{"x":0.026156941428781,"y":0.0082918740808964},{"x":0.026156941428781,"y":0}],"color":"#000000"},{"type":"polygon","editable":false,"points":[{"x":0.028169013559818,"y":0},{"x":0.028169013559818,"y":0.0082918740808964},{"x":0.030181085690856,"y":0.0099502485245466},{"x":0.030181085690856,"y":0.023217247799039},{"x":0.032193157821894,"y":0.023217247799039},{"x":0.038229376077652,"y":0.02819237112999},{"x":0.058350101113319,"y":0.019900497049093},{"x":0.058350101113319,"y":0}],"color":"#000000"} ] }', 'response_fields_relation' => '{ "$error": "error", "$message": "message", "$data": "data","$points":"points" }', 'response_item_config' => '', 'created_at' => '1550636542', 'updated_at' => '1550636542', 'category' => array ( 'id' => '34', 'name' => '超像素', 'key' => 'ai_model_category_id34', 'script' => 'image/superpixel', 'status' => '0', 'sort' => '0', 'icon' => '/upload/2019/02/14/5c652e34d4ad8_1550134836.jpg', 'desc' => '根据超像素算法获取图片的区域划分', 'doc' => '', 'request_fields' => '{"$binary": "图片base64值","$type": "图片类型","$filename": "图片名称","tolerance":"20"}', 'response_fields' => '{"$error":"错误号","$message":"提示信息","$data":"数据列表","$data.$points":"点阵"}', 'created_at' => '1549953347', 'updated_at' => '1550636614', ), ), 9 => array ( 'id' => '81', 'name' => '超像素.吴昊', 'key' => 'ai_model_id81', 'category_id' => '34', 'status' => '1', 'sort' => '0', 'url' => 'http://61.149.7.84:7700/superpixel', 'tag' => '', 'desc' => '', 'request_config' => '{ "data": "/9j/4AAQSk......C/c6//2Q==", "type": "jpg", "filename": "filename", "region_size": "55" }', 'request_fields_relation' => '{ "$binary": "data", "$type": "type", "$filename": "filename","$tolerance":"region_size"}', 'response_config' => '{ "ret": "", "errmsg": "", "result": [ {"type":"polygon","editable":false,"points":[{"x":0,"y":0},{"x":0,"y":0.02819237112999},{"x":0,"y":0.026533996686339},{"x":0.0080482894554734,"y":0.026533996686339},{"x":0.010060362517834,"y":0.024875622242689},{"x":0.016096578910947,"y":0.024875622242689},{"x":0.018108651041985,"y":0.023217247799039},{"x":0.024144869297743,"y":0.023217247799039},{"x":0.028169013559818,"y":0.021558871492743},{"x":0.028169013559818,"y":0.0099502485245466},{"x":0.026156941428781,"y":0.0082918740808964},{"x":0.026156941428781,"y":0}],"color":"#000000"},{"type":"polygon","editable":false,"points":[{"x":0.028169013559818,"y":0},{"x":0.028169013559818,"y":0.0082918740808964},{"x":0.030181085690856,"y":0.0099502485245466},{"x":0.030181085690856,"y":0.023217247799039},{"x":0.032193157821894,"y":0.023217247799039},{"x":0.038229376077652,"y":0.02819237112999},{"x":0.058350101113319,"y":0.019900497049093},{"x":0.058350101113319,"y":0}],"color":"#000000"} ] }', 'response_fields_relation' => '{ "$error": "ret", "$message": "errmsg", "$data": "result","$points":"points" }', 'response_item_config' => '', 'created_at' => '1550632464', 'updated_at' => '1550655553', 'category' => array ( 'id' => '34', 'name' => '超像素', 'key' => 'ai_model_category_id34', 'script' => 'image/superpixel', 'status' => '0', 'sort' => '0', 'icon' => '/upload/2019/02/14/5c652e34d4ad8_1550134836.jpg', 'desc' => '根据超像素算法获取图片的区域划分', 'doc' => '', 'request_fields' => '{"$binary": "图片base64值","$type": "图片类型","$filename": "图片名称","tolerance":"20"}', 'response_fields' => '{"$error":"错误号","$message":"提示信息","$data":"数据列表","$data.$points":"点阵"}', 'created_at' => '1549953347', 'updated_at' => '1550636614', ), ), ), 'count' => '26', 'categories' => array ( 1 => '语音识别', 2 => '图片画框', 33 => 'adsa', 34 => '超像素', 35 => '色差', 36 => '腾讯优图速算', 37 => '百度语音', 38 => '测试', 39 => '测试1', 41 => 'test', 42 => '视频抽帧', ), ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 接入外部模型
     * @return mixed
     */
    public function create()
    {
        $params = [
            /**
             * 请求示例：
            {
                "aimodel_id": "88",
                "name": "车轮图片识别",
                "category_id": "2",
                "url": "http://192.168.1.115:9060/",
                "tag": "",
                "desc": "",
                "request_config": "{\"data\":\"/9j/4AAQSk......C/c6//2Q==\",\"type\":\"jpg\",\n\t\"filename\":\"xxxx.jpg\"\n}",
                "request_fields_relation": "{\"$binary\":\"data\",\"$type\":\"type\",\"$filename\":\"filename\"}",
                "response_config": "{\"ret\":0,\"errmsg\":\"\",\"result\":[{\"clsid\":0,\"class\":\"front\",\"score\":0.998887300491333,\"left\":0.2942097026604069,\"top\":0.20094562647754138,\"right\":0.43661971830985913,\"bottom\":0.9196217494089834},{\"clsid\":1,\"class\":\"inside\",\"score\":0.9971734285354614,\"left\":0.621283255086072,\"top\":0.32387706855791965,\"right\":0.9577464788732394,\"bottom\":0.817966903073286}]\n}",
                "response_fields_relation": "{\"$error\":\"ret\",\"$message\":\"errmsg\",\"$data\":\"result\",\"$label\":\"class\",\"$score\":\"score\",\"$left\":\"left\",\"$top\":\"top\",\"$right\":\"right\",\"$bottom\":\"bottom\"}"
            }
             */
        ];
        return $this->saas->preprocess->create($params);
        /**
         * 返回结果 示例
         * {
                "error": "",
                "message": "",
                "data": {
                    "aimodel_id": "41"
                }
            }
         */
    }

    /**
     * 编辑已接入的外部模型
     * @return mixed
     */
    public function update()
    {
        $params = [
            /**
             * 请求结果 示例：
             * {
                    "aimodel_id": "88",
                    "name": "车轮图片识别",
                    "category_id": "2",
                    "url": "http://192.168.1.115:9060/",
                    "tag": "",
                    "desc": "",
                    "request_config": "{\"data\":\"/9j/4AAQSk......C/c6//2Q==\",\"type\":\"jpg\",\n\t\"filename\":\"xxxx.jpg\"\n}",
                    "request_fields_relation": "{\"$binary\":\"data\",\"$type\":\"type\",\"$filename\":\"filename\"}",
                    "response_config": "{\"ret\":0,\"errmsg\":\"\",\"result\":[{\"clsid\":0,\"class\":\"front\",\"score\":0.998887300491333,\"left\":0.2942097026604069,\"top\":0.20094562647754138,\"right\":0.43661971830985913,\"bottom\":0.9196217494089834},{\"clsid\":1,\"class\":\"inside\",\"score\":0.9971734285354614,\"left\":0.621283255086072,\"top\":0.32387706855791965,\"right\":0.9577464788732394,\"bottom\":0.817966903073286}]\n}",
                    "response_fields_relation": "{\"$error\":\"ret\",\"$message\":\"errmsg\",\"$data\":\"result\",\"$label\":\"class\",\"$score\":\"score\",\"$left\":\"left\",\"$top\":\"top\",\"$right\":\"right\",\"$bottom\":\"bottom\"}"
                }
             */
        ];
        return $this->saas->preprocess->update($params);
        /**
         * 返回结果 示例：
         * {
                "error": "",
                "message": "",
                "data": {
                "aimodel_id": "41"
                }
            }
         */
    }

    /**
     * 删除已接入的外部模型
     * @return mixed
     */
    public function delete()
    {
        $params = [
            "aimodel_id" => 41,
        ];
        return $this->saas->preprocess->delete($params);
        /**
         * 返回结果：
         * {
                "error": "",
                "message": "",
                "data": {
                    "aimodel_id": "41"
                }
            }
         */
    }

    /**
     * 接入脚本列表
     * @return mixed
     */
    public function aimodelCategoryList()
    {
        $params = [];
        return $this->saas->preprocess->aimodelCategoryList($params);
        /**
         * 返回结果
         *array ( 'data' => array ( 'list' => array ( 0 => array ( 'id' => '42', 'name' => '视频抽帧', 'key' => '', 'script' => 'video/frame', 'status' => '0', 'sort' => '0', 'icon' => '', 'desc' => '1111', 'doc' => '', 'request_fields' => '{}', 'response_fields' => '{}', 'created_at' => '1572610381', 'updated_at' => '1572610409', ), 1 => array ( 'id' => '37', 'name' => '百度语音', 'key' => 'ai_model_category_id37', 'script' => 'audio/baiduAudio', 'status' => '0', 'sort' => '0', 'icon' => '', 'desc' => '百度ai语音', 'doc' => '', 'request_fields' => '{"error":"","message":"","data":{"category_id":"41"}}', 'response_fields' => '{"error":"","message":"","data":{"category_id":"41"}}', 'created_at' => '0', 'updated_at' => '1568793146', ), 2 => array ( 'id' => '36', 'name' => '腾讯优图速算', 'key' => 'ai_model_category_id36', 'script' => 'image/tencentYoutu', 'status' => '0', 'sort' => '0', 'icon' => '', 'desc' => '腾讯优图速算接口', 'doc' => '', 'request_fields' => '', 'response_fields' => '', 'created_at' => '0', 'updated_at' => '0', ), 3 => array ( 'id' => '35', 'name' => '色差', 'key' => 'ai_model_category_id35', 'script' => 'image/colordifference', 'status' => '0', 'sort' => '0', 'icon' => '/upload/2019/02/14/5c6528fab8ef1_1550133498.jpg', 'desc' => '', 'doc' => '', 'request_fields' => '{"$binary": "图片base64值","$type": "图片类型","$filename": "图片名称","$point": "指定点","tolerance":"20","mode":"","smooth":""}', 'response_fields' => '{"$error":"错误号","$message":"提示信息","$data":"数据列表","$data.$points":"点阵"}', 'created_at' => '0', 'updated_at' => '1550133500', ), 4 => array ( 'id' => '34', 'name' => '超像素', 'key' => 'ai_model_category_id34', 'script' => 'image/superpixel', 'status' => '0', 'sort' => '0', 'icon' => '/upload/2019/02/14/5c652e34d4ad8_1550134836.jpg', 'desc' => '根据超像素算法获取图片的区域划分', 'doc' => '', 'request_fields' => '{"$binary": "图片base64值","$type": "图片类型","$filename": "图片名称","tolerance":"20"}', 'response_fields' => '{"$error":"错误号","$message":"提示信息","$data":"数据列表","$data.$points":"点阵"}', 'created_at' => '1549953347', 'updated_at' => '1550636614', ), 5 => array ( 'id' => '2', 'name' => '图片画框', 'key' => 'ai_model_category_id2', 'script' => 'image\\rect', 'status' => '0', 'sort' => '0', 'icon' => '/images/category/preview/qxfx.png', 'desc' => '', 'doc' => '', 'request_fields' => '{"$binary": "图片base64值","$type": "图片类型","$filename": "图片名称"}', 'response_fields' => '{"$error":"错误号","$message":"提示信息","$data":"数据列表","$label":"标签","$score":"正确率","$left": "左边值","$top": "上边值","$right": "右边值","$bottom": "底边值"}', 'created_at' => '1532404427', 'updated_at' => '1547197766', ), 6 => array ( 'id' => '1', 'name' => '语音识别', 'key' => 'ai_model_category_id1', 'script' => 'audio\\translate', 'status' => '0', 'sort' => '0', 'icon' => '/images/category/preview/qxfx.png', 'desc' => '', 'doc' => '', 'request_fields' => '{"$binary": "图片base64值","$type": "图片类型","$filename": "图片名称"}', 'response_fields' => '{"model_name":"asr_cvte","reqdata":{"data": "$binary","type": "$type","filename": "$filename"}}', 'created_at' => '0', 'updated_at' => '1547198121', ), ), 'count' => '7', ), 'error' => '', 'message' => '', )
         */
    }

    /**
     * 二次开发接入脚本
     * @return mixed
     */
    public function create2()
    {
        $params = [
            /**
            name	是	String	模型名称
            icon	否	String	图标
            desc	否	String	模型描述
            script	是	String	程序脚本
            request_fields	是	json	请求字段, 如果是定制脚本, 无需配置, 如果是通用脚本则必须按照接入脚本的变量进行配置
            response_fields	是	json	响应字段, 如果是定制脚本, 无需配置, 如果是通用脚本则必须按照接入脚本的变量进行配置
             */
        ];
        return $this->saas->preprocess->create2($params);
        /**
         * 返回结果
         * {
                "error": "",
                "message": "",
                "data": {
                    "category_id": "41"
                }
            }
         */
    }

    /**
     * 图片类常见物品识别
        接口说明：借助模型对图片进行常见物品识别. 返回打框结果.
     */
    public function execute()
    {
        $params = [
            /**
            project_id	是	int	项目id
            task_id	是	int	任务id
            user_id	否	int	用户id
            op	是	String	固定为:aimodel
            data_id	是	int	作业id
            aimodel_id	是	int	ai模型id:固定为39
             */
        ];
        return $this->saas->preprocess->execute($params);
        /**
         * 返回结果
         *
         */
    }

    /**
     * 辅助工具文本切分
    接口说明：借助模型对文本进行切分. 返回切分后的片段.
     * @return mixed
     */
    public function execute2()
    {
        $params = [
            /**
            project_id	是	int	项目id
            task_id	是	int	任务id
            user_id	否	int	用户id
            op	是	String	固定为:aimodel
            data_id	是	int	作业id
            aimodel_id	是	int	ai模型id:固定为86
             */
        ];
        return $this->saas->preprocess->execute2($params);
        /**
         * 返回结果
         *{
        "error": "",
        "message": "",
        "data": {
        "12817": [
        {
        "id": "5dd7c1139a16c",
        "type": "keywords",
        "positionstart": 0,
        "positionend": 2,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "离离",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a1aa",
        "type": "keywords",
        "positionstart": 2,
        "positionend": 4,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "原上",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a1e4",
        "type": "keywords",
        "positionstart": 4,
        "positionend": 5,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "草",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a238",
        "type": "keywords",
        "positionstart": 5,
        "positionend": 6,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "，",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a27d",
        "type": "keywords",
        "positionstart": 6,
        "positionend": 10,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "一岁一枯",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a2bf",
        "type": "keywords",
        "positionstart": 10,
        "positionend": 11,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "荣",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a303",
        "type": "keywords",
        "positionstart": 11,
        "positionend": 12,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "。",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a349",
        "type": "keywords",
        "positionstart": 12,
        "positionend": 17,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "野火烧不尽",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a391",
        "type": "keywords",
        "positionstart": 17,
        "positionend": 18,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "，",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a3dc",
        "type": "keywords",
        "positionstart": 18,
        "positionend": 23,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "春风吹又生",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a482",
        "type": "keywords",
        "positionstart": 23,
        "positionend": 24,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "。",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a4d3",
        "type": "keywords",
        "positionstart": 24,
        "positionend": 27,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "远芳侵",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a526",
        "type": "keywords",
        "positionstart": 27,
        "positionend": 29,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "古道",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a57b",
        "type": "keywords",
        "positionstart": 29,
        "positionend": 30,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "，",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a5d4",
        "type": "keywords",
        "positionstart": 30,
        "positionend": 33,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "晴翠接",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a630",
        "type": "keywords",
        "positionstart": 33,
        "positionend": 35,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "荒城",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a68e",
        "type": "keywords",
        "positionstart": 35,
        "positionend": 36,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "。",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a6ee",
        "type": "keywords",
        "positionstart": 36,
        "positionend": 37,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "又",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a751",
        "type": "keywords",
        "positionstart": 37,
        "positionend": 38,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "送",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a7b6",
        "type": "keywords",
        "positionstart": 38,
        "positionend": 40,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "王孙",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a824",
        "type": "keywords",
        "positionstart": 40,
        "positionend": 41,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "去",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a890",
        "type": "keywords",
        "positionstart": 41,
        "positionend": 42,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "，",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a8fd",
        "type": "keywords",
        "positionstart": 42,
        "positionend": 43,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "萋",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a96c",
        "type": "keywords",
        "positionstart": 43,
        "positionend": 44,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "萋",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139a9de",
        "type": "keywords",
        "positionstart": 44,
        "positionend": 45,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "满",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139aa53",
        "type": "keywords",
        "positionstart": 45,
        "positionend": 47,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": "别情",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        },
        {
        "id": "5dd7c1139aac9",
        "type": "keywords",
        "positionstart": 47,
        "positionend": 48,
        "label": [],
        "category": [],
        "code": [
        ""
        ],
        "text": ".",
        "tags": {
        "color": "#ccc",
        "text": [
        ""
        ],
        "category": [
        ""
        ],
        "code": [
        ""
        ]
        },
        "cBy": "0",
        "cTime": 1574420755,
        "score": 0,
        "is_ai": 1
        }
        ]
        }
        }
         */
    }

    /**
     * 辅助工具文本意图
        接口说明：执行任务时的操作，对文本推荐意图列表。
     * @return mixed
     */
    public function execute3()
    {
        $params = [
            /**
            project_id	是	int	项目id
            task_id	是	int	任务id
            user_id	否	int	用户id
            op	是	String	固定为:text-intention
            data_id	否	int	作业id
             */
        ];
        return $this->saas->preprocess->execute3($params);
        /**
         * 返回结果
         *{
            "error": "",
            "message": "",
            "data": {
            "12817": [
                {
                    "id" => "1"
                    "type": "text-intention",
                    "category": "全保",
                    "intention": "什么是分红1",
                    "answer": '分红是股份公司在赢利中每年按股票份额的一定比例支付给投资者的红利1',
                    "text": "请问分红是什么",
                    "cBy": "0",
                    "cTime": 1574420755,
                    "score": 0,
                    "is_ai": 1
                },
            ]
            }
        }
         */
    }

}