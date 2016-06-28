# Correio Packages

Use this package to check how much will cost to deliver your package using the Correio's service.

## Installing

Install using composer

    composer require rhberro\correio-packages

## Requests

### Price and Deadline

    $request = Rhberro\Correios\Request::complete('13450044', '13466070', '1.2', '16', '21.8', '15.0', '15.0', '40010');

### Price

    $request = Rhberro\Correios\Request::price('13450044', '13466070', '1.2', '16', '21.8', '15.0', '15.0', '40010');

### Deadline

    $request = Rhberro\Correios\Request::deadline('13450044', '13466070', '40010');

## Responses

    ...
    
    $request = Rhberro\Correios\Request::deadline('13450044', '13466070', '40010');
    
    foreach ($request->getPackages() as $package) {
        $code = $package->code;
        $deadline = $package->deadline;
    }
    
    ...
