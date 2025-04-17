<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class CloudinaryService
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('cloudinary.cloud_name'),
                'api_key' => config('cloudinary.api_key'),
                'api_secret' => config('cloudinary.api_secret'),
            ],
            'url' => [
                'secure' => true
            ]
        ]);
    }

    public function upload($file, $folder = '')
    {
        return $this->cloudinary->uploadApi()->upload($file->getRealPath(), [
            'folder' => $folder,
            'public_id' => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'overwrite' => true,
            'resource_type' => 'auto'
        ]);
    }

    public function delete($publicId)
    {
        return $this->cloudinary->uploadApi()->destroy($publicId);
    }
}