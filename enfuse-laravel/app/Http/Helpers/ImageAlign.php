<?php

namespace App\Http\Helpers;

use Illuminate\Database\Query\Builder;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\ProcessBuilder;
use Enfuse\Exceptions\ExecutableNotFoundException;

class ImageAlign
{

    protected $images = [];

    protected $workingDirectory;

    protected $binPath;

    protected $params;

    public $output = null;

    protected $timeOut;


    public function __construct($params)
    {
        $this->params = $params;
    }

    public function setBinPath($binPath)
    {
        $finder = (new ExecutableFinder())->find('align_image_stack', 'null', [$binPath]);
        if ($finder){
            $this->binPath = $binPath;
        }else{
            throw new ExecutableNotFoundException('image_align_stack not found');
        }
    }

    public function setWorkingDirectory($workingDirectory)
    {
        $this->workingDirectory = $workingDirectory;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }


    public function setTimeOut($timeout)
    {
        $this->timeOut = $timeout;
    }

    /*
     * @return array
     */
    //need to DO
    public function startImageAlign():array
    {
        array_unshift($this->params, $this->binPath);
        $arrayWithAlignImage = [];
        $countImage = count($this->params) - 2;


        $process = new Process($this->params);
        $process->setWorkingDirectory($this->workingDirectory);
        $process->setTimeout($this->timeOut);

        $process->run();
        $this->output = $process->getOutput();


        if ($process->isSuccessful()){
            for ($i=0; $i<$countImage; $i++){
                if( file_exists($this->workingDirectory.'/'.str_replace('-a','', $this->params[1]).'000'.$i.'.tif') ){
                    $arrayWithAlignImage[] = str_replace('-a','', $this->params[1]).'000'.$i.'.tif';
                }
            }
        }
        return $arrayWithAlignImage;
    }


}