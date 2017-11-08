<?php

namespace App\Http\Helpers;


class DataHandler
{

    /*
    |-----------------------------------------------------
    | unset param with sufix _number and params processing
    |-----------------------------------------------------
    */
    public static function handlerEnfuseParams($params)
    {
        unset ($params['_token']);
        unset ($params['image']);

        foreach ($params as $key => $val){
            // delete param with sufix number
            if ( isset($params[$key.'_number']) ){
                $params[trim($key)] = $params[$key.'_number'];
                unset($params[$key.'_number']);
            }

            // replace chekbox from "on" to boolean param
            if ($val == "on"){
                $params[$key] = true;
            }

            if($val == null or $val == "None"){
                unset($params[$key]);
            }
        }

        // preview or Multi or enfuse.
        if (isset($params['preview'])){
            unset($params['preview']);
            $params['output'] = 'preview/'.str_random(16).'.jpg';
        }
        // multi
        elseif(isset($params['multi'])){
            $params['output'] = 'output/'.str_random(16).'.tiff';
            unset($params['multi']);
        }
        // enfuse
        else{
            $params['output'] = 'output/'.str_random(16).'.tiff';
        }

        return $params;
    }

}