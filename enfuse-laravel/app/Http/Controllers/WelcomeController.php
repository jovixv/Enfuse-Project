<?php
/**
 * Created by PhpStorm.
 * User: Ленин
 * Date: 21.10.2017
 * Time: 5:19
 */

namespace App\Http\Controllers;

use Enfuse\Enfuse;
use Illuminate\Http\Request;
use App\Http\Helpers\ImageAlign;
use App\Http\Helpers\DataHandler;
use App\Http\Contracts\MethodHandler;


class WelcomeController extends Controller
{

    protected $method;


    /*
    |--------------------------------------------------
    | The main method to run Enfuse.
    | This method used in multi-parts execution the enfuse app.
    |--------------------------------------------------
     * @param $request Request
     */
    // TODO : REFACTORING
    public function ajaxRequest(Request $request)
    {

        $downloadPath = env('DOWNLOAD_PATH');
        $alignOutput = [];

        $params = DataHandler::handlerEnfuseParams($request->all());
        $images = $request->input('image');

        //if params['align] == true., We uses image align
        if (isset($params['align'])){

            unset($params['align']);

            array_unshift($images, '-aaligned_image_');

            $imageAling = new ImageAlign($images);
            $imageAling->setWorkingDirectory($downloadPath);
            $imageAling->setBinPath( env('ALIGN_BIN_PATh') );
            $imageAling->setTimeOut(10000000);
            $images      = $imageAling->startImageAlign();
            $alignOutput = explode(PHP_EOL, $imageAling->output);
        }


        $enfuse = new Enfuse($params);

        $enfuse->setDownloadPath($downloadPath); //required
        $enfuse->setBinPath( env('ENFUSE_BIN_PATH') ); // it is not required if PATH was set.
        $enfuse->setInputFile($images);
        $enfuse->setTimeOut(10000000);
        //$enfuse->debugOn();

        $image = $enfuse->startEnfuse();

        //add css class to output
        $arrayOutput = explode(PHP_EOL,
            str_replace('enfuse: info:','<span class="atn">enfuse: info:</span>',str_replace('enfuse: warning:','<span class="atv">enfuse: warning:</span>',$enfuse->getOutput))
        );

        $arrayOutput = array_merge($alignOutput,$arrayOutput);


        return response([
           'output' => $arrayOutput,
           'image'  =>'ImageLibrary/'.$image->getAvalibleOutputFile()[0]
        ]);
    }


    /*
    |-----------------------------------------------
    | This method need for multi run enfuse soft.
    | @param \Request
    | @required param: ZIP archive with folders. Photos must be in the folder
    |-----------------------------------------------
    |*/

    public function multiHandler(Request $request, $method = 'zip')
    {
       $objName = '\App\Http\Entities\\'.$method.'Method';
       $this->setter(new $objName('test.zip'));


       $folders = $this->method->getFolders();

        foreach ($folders as $folder)
        {
             $request->request->add([
                 'image' => $this->method->getFilesFromFolder($folder),
                 //'multi' => $folder // Path for output file
             ]);
         $response = $this->ajaxRequest($request);
         $response = json_decode($response->getContent());

         // add file to folder where will be unpacked archive..
         rename($response->image, $folder.'/enfused_'.str_replace('ImageLibrary/output/','', $response->image));
        }

        $this->method->addToArchive();
    }


    private function setter(MethodHandler $method)
    {
        $this->method = $method;
    }
}