<?php

namespace App\Services;

use File;
use Image;
use Utility;

class FileUploadService
{
    /**
     * @param $data
     * @return null|string
     */
    public function saveFiles($data): ?string
    {

        if(isset($data['file'])) {
            $fileName = (isset($data['file_name'])?$data['file_name'].'_':null).time() . '.' . $data['file']->getClientOriginalExtension();
            $uploadPath = public_path($data['destination']);

            $data['file']->move($uploadPath, $fileName);
            return '/'.$data['destination'].$fileName;
        }
        return null;
    }
}
