# wiki.php components

Customized [Mni/FrontYaml](https://github.com/mnapoli/frontyaml)
to use parsedown and a small collection of extensions
for an updated wiki.php.

## basic usage

1. add to composer
```php
composer require wiki.php/components
```

1. get an instance
```php
require_once __DIR__.'/vendor/autoload.php';
$parser = wiki.php\components::factory();
```

1. set options
```php
wiki.php\components::$bootstrap = true;
wiki.php\components::$forkawesome = true;
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

Copyright (C) 2021 Anton McClure <anton@tloks.com>

This file is free software: you may copy, redistribute and/or modify it 
under the terms of the GNU Affero General Public License as published by 
the Free Software Foundation, either version 3 of the License, or (at 
your option) any later version.

This file is distributed in the hope that it will be useful, but WITHOUT 
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero General Public 
License for more details.

You should have received a copy of the GNU Affero General Public License 
along with this program; if not, see https://gnu.org/licenses or write to:
  Free Software Foundation, Inc.
  51 Franklin Street, Fifth Floor
  Boston, MA 02110-1301
  USA

This file incorporates work covered by the following copyright and
permission notice:

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
