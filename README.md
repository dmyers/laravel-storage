# Storage Package for Laravel 4

Storage is a filesystem abstraction layer for Laravel 4 applications.

## Installation via Composer

Add this to you composer.json file, in the require object:

```javascript
"dmyers/laravel-storage": "1.*"
```

After that, run composer install to install Storage.

Add the service provider to `app/config/app.php`, within the `providers` array.

```php
'providers' => array(
    // ...
    'Dmyers\Storage\StorageServiceProvider',
)
```

Add a class alias to `app/config/app.php`, within the `aliases` array.

```php
'aliases' => array(
    // ...
    'Storage' => 'Dmyers\Storage\Storage',
)
```

Finally, ensure the files directory defined in the config file is created
and writable by the web server (defaults to public/files).

```console
$ mkdir public/files
$ chmod -R 777 public/files
```

## Configuration

Publish the default config file to your application so you can make modifications.

```console
$ php artisan config:publish dmyers/laravel-storage
```

## Usage

Check if a file exists in storage:

```php
Storage::exists('user/avatar.jpg');
```

Get a file's contents from storage:

```php
Storage::get('user/avatar.jpg');
```

Put a file into storage:

```php
Storage::put('user/avatar.jpg', $contents);
```

Upload a file into storage:

```php
Storage::upload($_FILES['avatar'], 'user/avatar.jpg');
```

Download a file from storage:

```php
Storage::download('user/avatar.jpg', 'tmp/images/user-1/avatar.jpg');
```

Delete a file from storage:

```php
Storage::delete('user/avatar.jpg');
```

Move a file in storage:

```php
Storage::move('user/avatar.jpg', 'user/1/avatar.jpg');
```

Copy a file in storage:

```php
Storage::copy('user/avatar.jpg', 'user/avatar.bak.jpg');
```

Get a file's type from storage:

```php
Storage::type('user/avatar.jpg');
```

Get a file's mime type from storage:

```php
Storage::mime('user/avatar.jpg');
```

Get a file's size from storage:

```php
Storage::size('user/avatar.jpg');
```

Get a file's last modification date from storage:

```php
Storage::lastModified('user/avatar.jpg');
```

Check if a path is a directory in storage:

```php
Storage::isDirectory('user/avatar.jpg');
```

List all files in storage:

```php
Storage::files('images');
```

Get the full URL to a file in storage:

```php
Storage::url('user/avatar.jpg');
```

Render a file from storage to the browser:

```php
Storage::render('user/avatar.jpg');
```