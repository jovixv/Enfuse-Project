<?php


namespace App\Http\Entities;

use App\Http\Contracts\MethodHandler;
use Chumper\Zipper\Zipper;


class zipMethod implements MethodHandler
{
     protected $zipper;

     protected $fileName;

     protected $RootFolder;

     public function __construct(string $filename)
     {
         $this->zipper   = new Zipper();
         $this->fileName = $filename;
     }

    /*
     * @return array with fill path to folders
     */
     public function getFolders() : array
     {
         $this->unPack(); // run extract..

         return glob(public_path('/ImageLibrary/temp/'.$this->RootFolder.'/*'), GLOB_ONLYDIR);
     }


     /*
      * @return int
      */
     public function getCountFolders():int
     {
         return count($this->getFolders());
     }


     public function getFilesFromFolder($folder)
     {
         return glob($folder.'/*.{jpeg,JPEG,jpg,JPG,tiff,TIFF,tif,TIF,png,PNG}', GLOB_BRACE);
     }


     public function getAllFiles()
     {
         // TODO: Implement getAllFiles() method.
     }


     public function addToArchive()
     {
        return $this->zipper->make( public_path('ImageLibrary/'.$this->RootFolder.'.zip') )
                            ->add( public_path( 'ImageLibrary/temp/'.$this->RootFolder ) );
     }

    /*
     * @set A Folder Name where will be unpacked archive.
     */
     private function unPack() : void
     {
        $folderName = str_random(15);


        if (!file_exists(public_path('/ImageLibrary/'.$this->fileName.'')))
        {
            throw new \Exception('Somthing went worong, file_exists return false');
        }

         $this->zipper
             ->make( public_path('/ImageLibrary/'.$this->fileName.'') )
             ->extractTo(public_path('/ImageLibrary/temp/'.$folderName));

        $this->RootFolder = $folderName; // folders where was be extracted archive.
     }

}