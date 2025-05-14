<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    //
    public function index()
    {
        $files = File::files(public_path('media/gallery/videos'));
        $media = [];

        foreach ($files as $file) {
            $extension = strtolower($file->getExtension());
            $type = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']) ? 'image' :
                    (in_array($extension, ['mp4', 'webm', 'ogg']) ? 'video' : 'unknown');

            if ($type !== 'unknown') {
                $media[] = [
                    'path' => 'media/gallery/videos/' . $file->getFilename(),
                    'type' => $type,
                ];
            }
        }

        return view('media.gallery.videosPage', compact('media'));
    }

}
