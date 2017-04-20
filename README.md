# YAML Injector
This package enables you to inject YAML data into your views.

## Installation
```sh
composer require curtisblackwell/laravel-blade-directive-yaml-injector
```


## Usage
```blade
@yaml('myVar', 'my-yaml-file')
```

### Example
```php
// config/app.php
'providers' => [
  ...
  CurtisBlackwell\YamlInjectionProvider::class,
  ...
],
```

```blade
@yaml('bowie', 'david-bowie')

<table>
  <thead>
    <tr>
      <th>Year</th>
      <th>Title</th>
    </tr>
  </thead>
  <tbody>
    @foreach($bowie['albums'] as $album)
      <tr>
        <td>{{ $album['year'] }}</td>
        <td>{{ $album['title'] }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
```

```yaml
# resources/views/david-bowie.yaml
albums:
  -
    title: Self-titled
    year: 1967
  -
    title: Self-titled
    year: 1969
  -
    title: The Man Who Sold the World
    year: 1970
  -
    title: Hunky Dory
    year: 1971
  -
    title: The Rise and Fall of Ziggy Stardust and the Spiders from Mars
    year: 1972
  ```
