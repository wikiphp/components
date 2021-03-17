# tildewiki

[![Build Status](https://drone.tildegit.org/api/badges/team/tildewiki/status.svg)](https://drone.tildegit.org/team/tildewiki)

customized [Mni/FrontYaml](https://github.com/mnapoli/frontyaml)
to use parsedown and a small collection of extensions
used across several tildeverse sites to power the wiki.

## basic usage

1. add tildewiki
```php
composer require tildeteam/wiki
```

1. get an instance
```php
require_once __DIR__.'/vendor/autoload.php';
$parser = tildeteam\wiki::factory();
```

1. set options
```php
tildeteam\wiki::$bootstrap = true;
tildeteam\wiki::$forkawesome = true;
```

1. parse stuff
```php
$parsed = $parser->parse(file_get_contents("my.md"));
echo $parsed->getContent();
```

1. get yaml frontmatter values
```php
echo $parsed->getYAML()["my_yaml_key"];
```

