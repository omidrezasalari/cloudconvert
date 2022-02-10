<?php

namespace Omidrezasalari\Cloudconvert\Classes;

abstract class Convert
{
    public const API_KEY = "XXXXXXXXXXXXXXXXXXXXXXXXXXX";

    abstract public function convert(string $fileName);
}
