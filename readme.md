## Antevenio Codetest

Single page application using [Laravel](http://laravel.com/) as PHP backend framework and Backbone as frontend.

[Underscore](http://Underscorejs.org) as template system and [Grunt](http://gruntjs.com) for JS workflow tasks.

### Instalation:

```
git clone https://github.com/WyrmxD/av_codetest.git
av_codetest$ composer install
av_codetest$ php artisan migrate
av_codetest$ grunt
av_codetest$ ./run_server.sh
```

### Test

Unit testing for Annotation controller as RESTful API.
````
av_codetest$ phpunit
```
