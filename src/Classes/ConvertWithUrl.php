<?php

namespace Omidrezasalari\Cloudconvert\Classes;

class ConvertWithUrl extends CloudConvert
{

    public function createConvertor()
    {

        return new Url();
    }
}
