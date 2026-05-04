<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'upload' => ['required', 'file', 'image', 'max:5120'],
        ]);

        $path = $request->file('upload')->store('cms', 'public');

        return response()->json([
            'url' => Storage::disk('public')->url($path),
        ]);
    }
}

