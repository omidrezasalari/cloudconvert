<?php

namespace Omidrezasalari\Cloudconvert\Classes;

abstract class ConvertType
{
    public const API_KEY = "XXXXXXXXXXXXXXXXXXXXXXXXXXX";

    public abstract function convert($validData);
}
