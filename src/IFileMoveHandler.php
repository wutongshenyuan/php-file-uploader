<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/30
 * Time: 13:37
 */
namespace wutongshenyuan\phpfileuploader;
interface IFileMoveHandler{
    public static function doMove($sourceFile,$destinationFile):bool ;
    public static function setConfig($config):bool ;
}