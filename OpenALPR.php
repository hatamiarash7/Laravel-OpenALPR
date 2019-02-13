<?php

namespace Hatamiarash7\OpenALPR;

use Hatamiarash7\OpenALPR\Exceptions\NotInstalledException;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;

class OpenALPR
{
    private $country;

    public function __construct()
    {
        if (str_contains(exec("type alpr"), "not found")) {
            throw new NotInstalledException("ALPR is not installed !");
        }

        if (strtoupper(PHP_OS) == "LINUX") {
            if (str_contains(exec("type tesseract"), "not found")) {
                throw new NotInstalledException("You are in Linux. Tesseract-ocr is not installed !");
            }
        }

        $this->country = config("openalpr.country", "us");
    }

    public function country($country)
    {
        $this->country = $country;
    }

    public function recognize($image)
    {
        $path = tempnam(sys_get_temp_dir(), 'lp_') . ".jpg";

        Image::make($image)->save($path);
        $response = json_decode(exec("alpr " . $path . " -c " . $this->country . " -n 1 -j"), true);

        if ($response == false) {
            throw new UnexpectedResponseException("ALPR responded in unexpected format !");
        }

        unlink($path);

        $ocr = collect($response)->get("results");

        if ($ocr) {
            return $ocr[0]["plate"];
        } else {
            return null;
        }
    }
}
