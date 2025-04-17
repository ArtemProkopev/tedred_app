<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CloudinaryService;

class ImageUploadController extends Controller
{
    protected $cloudinary;

    public function __construct(CloudinaryService $cloudinary)
    {
        $this->cloudinary = $cloudinary;
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $uploaded = $this->cloudinary->upload($request->file('image'), 'news_images');
            
            return response()->json([
                'success' => true,
                'url' => $uploaded->getSecurePath(),
                'public_id' => $uploaded->getPublicId()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}