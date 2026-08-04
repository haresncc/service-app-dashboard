<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static  function storeFiles(array $data, array $files)
    {
        foreach ($files as $myFile => $field) {
            if (isset($data[$myFile])) {
                $file = $data[$myFile];
                $path = $file->store('', ['disk' => 'public']);
                $data[$field] = $path;
            };
        }
        return $data;
    }
    public static  function deleteFiles(array $files)
    {
        foreach ($files as $myFile) {
            Storage::disk('public')->delete($myFile);
        }
    }
}
