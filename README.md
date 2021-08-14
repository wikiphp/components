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

## License

Copyright (C) 2019-2021 Ben Harris <ben@tilde.team>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
