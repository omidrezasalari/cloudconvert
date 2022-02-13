# Cloud Covert 

Cloud Covert is a PHP library for converting .webm videos to mp4.

## Installation

Use the package manager [Composer](https://getcomposer.org/) to install cloud convert.

```bash
composer require omidrezasalari/cloudconvert
```

## Set configuration 
* Set API_KEY and constant with your personal API From [Cloud Convert Api](https://cloudconvert.com/dashboard/api/v2/keys)

```php
 # omidrezasalari\Cloudconvert\Classes\Convert::class
const API_KEY = "Your personal API..."
```

* Set video Url that should be converted to mp4.

```php
 # omidrezasalari\Cloudconvert\Classes\Url::class
 const URL = "Your video path";
```

## Usage

```php
require_once __DIR__ . '/vendor/autoload.php';

use Omidrezasalari\Cloudconvert\Classes\CloudConvert;
use Omidrezasalari\Cloudconvert\Classes\ConvertWithUrl;

# returns 'export_url'

$fileName="example.webm"


function clientCode(CloudConvert $client,string $fileName)
{

    $convertor=$client->createConvertor();

    echo $convertor->convert($fileName);
  
}

// Real example 

function clientCode(new ConvertWithUrl ,string $fileName)
{
    
    $convertor=$client->createConvertor();

    echo $convertor->convert($fileName);
    
}



```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)
