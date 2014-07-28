<?php

namespace themallen\mile;

class Mile{

    private $baseDir = '';

    public function __construct($config = array())
    {
        $this->baseDir.= isset($config['baseDir']) ? $config['baseDir'] : '';
    }

  	public function put($dir, $contents)
    {
        $parts = explode('/', $dir);
        $file = array_pop($parts);
        $dir = $this->baseDir;

        foreach($parts as $part){
            if(!file_exists($dir .= "/$part")) {
            	mkdir($dir);
            }
        }

        $increment=0;
        $tempFile = $this->generateTempName();
        while(file_exists("{$dir}/{$tempFile}")) {
            $increment++;
            $tempFile = $tempFile.$increment;
        }

        file_put_contents("{$dir}/{$tempFile}", $contents);
        $result = rename("{$dir}/{$tempFile}","{$dir}/{$file}");

        if(!$result){
        	if(copy("{$dir}/{$tempFile}","{$dir}/{$file}")) {
        		$result = unlink("{$dir}/{$tempFile}");
        	} else {
        		$result = false;
        	}
        }
        return $result;
    }

    public function get($filename)
    {
        return file_get_contents($filename);
    }

    public function generateTempName()
    {
   		return str_replace(' ', '', 'MileTempFile'.microtime());
   }
}
