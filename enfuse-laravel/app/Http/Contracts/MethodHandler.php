<?php

namespace App\Http\Contracts;

interface MethodHandler
{

    /*
     *
     * Must have variable
     */

    public function getFolders();

    public function getCountFolders();

    public function getFilesFromFolder($folder);

    public function getAllFiles();

}