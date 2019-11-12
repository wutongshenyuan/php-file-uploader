<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/30
 * Time: 13:49
 */

namespace wutongshenyuan\phpfileuploader\movehandler;
use wslibs\storage\CunChuIO;
use wutongshenyuan\phpfileuploader\IFileMoveHandler;
// 这个handler是上传到Azure
class AzureMoveHandler implements IFileMoveHandler
{
    public static function doMove($sourceFile, $destinationFile):bool
    {
        return CunChuIO::uploadContent($destinationFile,file_get_contents($sourceFile));
    }
    public static function setConfig($config): bool
    {
        /*
         $config = [
          'storename'=>'',
          'rongqi'=>'',
          'storage_list'=>'',
          'accountname'=>'',
          'accountkey'=>'',
         ];
         */
        CunChuIO::setConfig($config);
        return true;
    }

}