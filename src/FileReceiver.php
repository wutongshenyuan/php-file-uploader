<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace wutongshenyuan\phpfileuploader;

class FileReceiver
{
    /**
     * 当前FILE参数
     * @var array
     */
    protected $file = [];

    private static $instance=null;

    /**
     * 架构函数
     * @access public

     */
    private function __construct()
    {

    }

    public static function getInstance(){
        if(self::$instance==null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 获取上传的文件信息
     * @access public
     * @param  string   $name 名称
     * @return array|mixed|void
     */
    public function file($name = '')
    {
        if (empty($this->file)) {
            $this->file = isset($_FILES) ? $_FILES : [];
        }

        $files = $this->file;
        if (!empty($files)) {
            // 处理上传文件
            $array = $this->dealUploadFile($files);

            if (strpos($name, '.')) {
                list($name, $sub) = explode('.', $name);
            }

            if ('' === $name) {
                // 获取全部文件
                return $array;
            } elseif (isset($sub) && isset($array[$name][$sub])) {
                return $array[$name][$sub];
            } elseif (isset($array[$name])) {
                return $array[$name];
            }
        }

        return;
    }

    protected function dealUploadFile($files)
    {
        $array = [];
        foreach ($files as $key => $file) {
            if (is_array($file['name'])) {
                $item  = [];
                $keys  = array_keys($file);
                $count = count($file['name']);

                for ($i = 0; $i < $count; $i++) {
                    if (empty($file['tmp_name'][$i]) || !is_file($file['tmp_name'][$i])) {
                        continue;
                    }

                    $temp['key'] = $key;

                    foreach ($keys as $_key) {
                        $temp[$_key] = $file[$_key][$i];
                    }

                    $item[] = (new File($temp['tmp_name']))->setUploadInfo($temp);
                }

                $array[$key] = $item;
            } else {
                if ($file instanceof File) {
                    $array[$key] = $file;
                } else {
                    if (empty($file['tmp_name']) || !is_file($file['tmp_name'])) {
                        continue;
                    }

                    $array[$key] = (new File($file['tmp_name']))->setUploadInfo($file);
                }
            }
        }

        return $array;
    }
}
