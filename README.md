
这是从tp5中抽取出来的上传类
使用方法：
```
// 获取文件
$files = FileReceiver::getInstance()->file();
// 移动文件，默认使用move_uploaded_file移动文件，如果要使用自定义的移动类，请在移动前设置
// File::setFileMoveHandler(类名);
$desPath = 'uploads/';
foreach($files as $one){
    // 此路径是可以存入数据库的路径
    $filePath = $one->move($desPath);
}

```

# php-file-uploader
php uploader

