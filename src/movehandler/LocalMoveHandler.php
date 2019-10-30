<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/30
 * Time: 13:44
 */
namespace phpfileuploader\movehandler;
use phpfileuploader\IFileMoveHandler;

class LocalMoveHandler implements IFileMoveHandler
{
    public static function doMove($sourceFile, $destinationFile):bool
    {
         return move_uploaded_file($sourceFile,$destinationFile);
    }
}