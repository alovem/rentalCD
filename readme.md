# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

API to get master CD data
```
Method      : GET


URL         : /mastercds
Response    : [id,title,category,qty,price,created_at,update_at,categoryname]

URL         : /mastercds/(id)
Response    : [id,title,category,qty,price,created_at,update_at,categoryname]

```


API to insert CD data
```
Method      : POST


URL         : /mastercds
Parameter    : [title,category,qty,price]

```

API to get update CD data
```
Method      : POST


URL         : /mastercds/(id)
Response    : [title,category,qty,price]

```





API to get master Customer data
```
Method      : GET


URL         : /mastercustomers
Response    : [id,customername,customeraddress,created_at,update_at]

URL         : /mastercustomers/(id)
Response    : [id,customername,customeraddress,created_at,update_at]

```


API to insert master Customer data
```
Method      : POST


URL         : /mastercustomers
Parameter    : [customername,customeraddress]

```

API to update master Customer data
```

URL         : /mastercustomers/(id)
Parameter    : [customername,customeraddress]

```


API to get master categories data
```
Method      : GET


URL         : /mastercategories
Response    : [id,categoryname,created_at,update_at]

URL         : /mastercategories/(id)

```


API to get rental data
```
Method      : GET


URL         : /rental
Response    : [id,cd_id,customer_id,qty,status,date_from,date_to,customer_name,title,created_at,update_at]

URL         : /rental/(id)
Response    : [id,cd_id,customer_id,qty,status,date_from,date_to,customer_name,title,created_at,update_at]

```


API to insert rental data
```
Method      : POST


URL         : /rental
Parameter   : [cd_id,customer_id,qty,date_from(YYYY-mm-dd),date_to(YYYY-mm-dd)]
Response    : [messages,totalcost]

```



API to update rental data
```
Method      : PUT


URL         : /rental/(id)
Parameter   : [cd_id,customer_id,qty,date_from(YYYY-mm-dd),date_to(YYYY-mm-dd),status(open/finished)]
Response    : [messages,totalcost]

```
