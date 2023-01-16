<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasFile
{
    public function uploadFile($request, $path)
    {
        $file = null;
        if($request->file('persyaratan')){
            $file = $request->file('persyaratan');
            $file->storeAs($path, $file->hashName());
        }

        return $file;
    }

    public function updateImage($path, $data, $name)
    {
        Storage::disk('local')->delete($path. basename($data->file));

        $data->update([
            'persyaratan' => $name,
        ]);
    }
}