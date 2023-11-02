<?php

class UploadFileService
{
    public function set_file(mixed $file) : string
    {
        $file_path = 'media/' . $file['name'];
        move_uploaded_file($file['tmp_name'], $file_path);
        return $file_path;
    }
}