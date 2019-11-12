<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/30
 * Time: 13:44
 */
namespace wutongshenyuan\phpfileuploader\movehandler;
use wutongshenyuan\phpfileuploader\IFileMoveHandler;

class LocalMoveHandler implements IFileMoveHandler
{
    public static function doMove($sourceFile, $destinationFile):bool
    {
         return move_uploaded_file($sourceFile,$destinationFile);
    }
    public static function setConfig($config): bool
    {
        return true;
    }
}