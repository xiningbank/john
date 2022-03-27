<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function uploadFiles(Request $r) {
        $file = $r->file('file');
        $clientFilename = $file->getClientOriginalName();

        $localFolder = 'uploads';
        $serverRelativePath = $file->store($localFolder);
        $serverAbsolutePath = storage_path('app') . '/' . $serverRelativePath;
        $newServerAbsolutePath = PATHINFO($serverAbsolutePath, PATHINFO_DIRNAME) . '/' . $clientFilename;
        rename($serverAbsolutePath, $newServerAbsolutePath);

        $httpUrl = env('APP_URL') . '/john/uploads/' . $clientFilename;

        $data = [
            'url' => $httpUrl,
        ];

        return [
            'code' => 200,
            'msg'  => 'success',
            'data' => $data,
        ];
    }
}
