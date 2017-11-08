<?php
/**
 * Created by PhpStorm.
 * User: Ленин
 * Date: 22.10.2017
 * Time: 4:43
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ImageController extends Controller
{

    /**
     * @param Request $request
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(public_path('ImageLibrary'),$file->getClientOriginalName());
        }
    }

}