<?php

namespace Modules\Workflow\Services;

use Illuminate\Http\UploadedFile;

class FileStorageService
{
    public function storeFile(UploadedFile $file)
    {
        $this->validateFile($file);

        $path = $file->store('workflow_files', 'public');
        return $path;
    }

    private function validateFile(UploadedFile $file){
        $allowedMimes = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'jpg', 'jpeg', 'png'];
        $maxSize = 2048; // Max size in KB

        if(!in_array($file->getClientOriginalExtension(), $allowedMimes)){
            throw new \Exception('Invalid file type');
        }

        if($file->getSize() > $maxSize * 1024){
            throw new \Exception('File size is too large');
        }
    }
}
