<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/30
 * Time: 13:49
 */

namespace wutongshenyuan\phpfileuploader\movehandler;
use wutongshenyuan\phpfileuploader\IFileMoveHandler;
// 这个handler是上传到Azure
class AzureMoveHandler implements IFileMoveHandler
{
    public function doMove($sourceFile, $destinationFile):bool
    {
        return false;
    }
}