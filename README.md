# Correio Services

Use this package to check how much will cost to deliver your package using the Correio's service.

---

- [**Installing**](#installing)
- [**Getting Started**](#getting-started)
- [**Contributing**](#contributing)
- [**License**](#license)

---

## Installing

Install it using composer

```
composer require rhberro\correio-packages
```

## Getting Started

### Price and Deadline

```php
$request = Rhberro\Correios\Request::complete('13450044', '13466070', '1.2', '16', '21.8', '15.0', '15.0', '40010');
```

### Price

```php
$request = Rhberro\Correios\Request::price('13450044', '13466070', '1.2', '16', '21.8', '15.0', '15.0', '40010');
```

### Deadline

```php
$request = Rhberro\Correios\Request::deadline('13450044', '13466070', '40010');
```

### Response

```php
$response = Rhberro\Correios\Request::deadline('13450044', '13466070', '40010');

foreach ($response->getServices() as $service) {
    $code = $service->Codigo;
    $deadline = $service->Valor;
}
```

## Contributing

The contribution guide will be available soon.

## License

The Correio Services library is open-sourced software licensed under the MIT license.
