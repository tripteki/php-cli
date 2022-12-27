<?php

namespace Src;

class Version
{
    /**
     * @return string
     */
    public function __invoke()
    {
        $project = @file_get_contents(__DIR__."/../composer.json");

        if ($version = @json_decode($project, true)["version"]) {

            return $version;

        } else {

            return "1.0.0";
        }
    }
};
