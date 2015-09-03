<?php

namespace Amasty;

class Crud
{
    protected $requiredFields = ['companyName','moduleName'];
    protected $templatePath = 'template/';
    protected function getTemplate()
    {
        $path = realpath($this->templatePath);
        $objects = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );
        return $objects;
    }

    protected function replace($search, $replace, $subject)
    {
        $subject = str_replace(
            $this->roundArray($search),
            array_map('strtolower', $replace),
            $subject
        );
        return str_replace(
            $this->roundArray(array_map('ucfirst', $search)),
            array_map('ucfirst', $replace),
            $subject
        );
    }

    protected function roundArray($array)
    {
        foreach ($array as $key => $value) {
            $array[$key] = '{{'.$value.'}}';
        }
        return $array;
    }
    
    protected function upFirstLetter($array)
    {
        foreach ($array as $key => $value) {
            $array[$key] = ucfirst($value);
        }
        return $array;
    }

    protected function replaceParams($params, $objects)
    {
        $result = [];
        foreach ($objects as $name => $object) {
            if (is_file($name)) {
                $path = explode($this->templatePath, $name);
                $content = $this->replace($this->requiredFields, $params, file_get_contents($object));
                $path[1] = $this->replace($this->requiredFields, $params, $path[1]);
                $object = [
                    'type'=>'file',
                    'dirName'=>ucfirst($params['companyName']).'/'.ucfirst($params['moduleName']).'/'.$path[1],
                    'content'=>$content
                ];
            } else {
                $path = explode($this->templatePath, $name);
                $path[1] = $this->replace($this->requiredFields, $params, $path[1]);
                $object = [
                    'type'=>'dir',
                    'dirName'=>ucfirst($params['companyName']).'/'.ucfirst($params['moduleName']).'/'.$path[1]
                ];
            }
            $result[] = $object;
        }
        return $result;
    }

    protected function archiveFiles($objects)
    {
        $tmp = tempnam("tmp", "zip");
        $archiver = new \ZipArchive();
        $archiver->open($tmp, \ZipArchive::OVERWRITE);
        foreach ($objects as $object) {
            if ($object['type'] == 'file') {
                $archiver->addFromString($object['dirName'], $object['content']);
            } else {
                $archiver->addEmptyDir($object['dirName']);
            }
        }

        $archiver->close();
        header('Content-Type: application/zip');
        header('Content-Length: ' . filesize($tmp));
        header('Content-Disposition: attachment; filename="file.zip"');
        readfile($tmp);
        unlink($tmp);
    }

    public function createModule($params)
    {
        foreach ($this->requiredFields as $required) {
            if (!array_key_exists($required, $params) || $params[$required]=='') {
                throw new \Exception('Please fill filed '.$required);
            }
        }
        $this->generateArchive($params);
    }

    protected function prepareParams($params)
    {
        $search = [' '];
        $replace = [''];
        foreach ($params as $key => $value) {
            $params[$key] = str_replace($search, $replace, $value);
        }
        return $params;
    }

    protected function generateArchive($params)
    {
        $objects = $this->getTemplate();
        $params = $this->prepareParams($params);
        $objects = $this->replaceParams($params, $objects);
        return $this->archiveFiles($objects);
    }
}
