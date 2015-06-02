<?php
/**
 * Created by PhpStorm.
 * User: UserPC
 * Date: 2015/6/2
 * Time: 10:56
 */

/*
 * 上传文件至文件夹
 * $fileid 控件名称
 * $filedir 上传目录
 * $newname 新名称
 * */
function uploadfile($fileid, $filedir, $newname)
{
    $message = array();
    $target_dir = $filedir;
    $target_file = $target_dir . basename($_FILES[$fileid]["name"]);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $message['msg'] = "文件格式不正确，必须为only JPG, JPEG, PNG & GIF";
        $message['status'] = 0;
        return $message;
    }
    if ($_FILES[$fileid]["error"] > 0) {
        $message['msg'] = "上传文件出错,Return Code: " . $_FILES[$fileid]["error"] . "<br />";
        $message['status'] = 0;
        return $message;
    } else {
        if (file_exists($target_dir . $newname.'.'.$imageFileType)) {
            $message['msg'] = "文件已经存在uploads文件夹";
            $message['status'] = 0;
            return $message;
        } else {
            move_uploaded_file($_FILES[$fileid]["tmp_name"],
                $target_dir . $newname.'.'.$imageFileType);
            $message['msg'] = $newname.'.'.$imageFileType;
            $message['status'] = 1;
            return $message;
        }
    }
}