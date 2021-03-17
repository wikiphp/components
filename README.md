# tildewiki

this is a small collection of parsedown extensions used across several tildeverse
sites to power the wiki.

## basic usage

1. add tildewiki as a vcs repository in composer.json
```php
composer require tildeteam/wiki
```

1. get an instance
```php
$parser = tildeteam\wiki\Parser::factory();
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

