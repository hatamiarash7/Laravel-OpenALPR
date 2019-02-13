
# Laravel-OpenALPR

It's an OpenALPR package for Laravel. You can easily use this in your project.

## Installation
OpenALPR is a cross-platform project that you can run it on Windows, Linux or MacOS.
First you should install core package of OpenALPR.

### Linux
````
sudo apt-get update && sudo apt-get install -y openalpr openalpr-daemon openalpr-utils libopenalpr-dev tesseract-ocr
````
### Windows
1. Install python ( 64-bit )
2. Donwload 64-bit SDK [here](https://deb.openalpr.com/windows-sdk/openalpr64-sdk-latest.zip) and extract that
3. Add extracted folder to your PATH

## Test
You can test alpr by running this command :  
`alpr --version`

## Installation ( Laravel )
Include package into your project using composer

`composer require hatamiarash7/openalpr`

Publish the package config file
```
php artisan vendor:publish --provider="Hatamiarash7\OpenALPR\OpenALPRServiceProvider"
```

## Usage
Local
```
OpenALPR::recognize("licence.jpg")
```
From URL
```
OpenALPR::recognize("http://example.com/licence.jpg")
```
## Sample
There is a sample laravel project. Check it and write your awesome project  
[OpenLaravel-OpenALPR](https://github.com/hatamiarash7/Laravel-OpenALPR-Sample)
