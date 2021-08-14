<?php
/*
 * Copyright (C) 2019-2021 Ben Harris <ben@tilde.team>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace tildeteam;

use Mni\FrontYAML;

class wiki implements FrontYAML\Markdown\MarkdownParser {
    public static $bootstrap = false;
    public static $forkawesome = false;

    public function __construct() {
        $this->mdparser = new tildeparsedown();
    }

    public function parse($markdown) {
        $this->mdparser->bootstrap = self::$bootstrap;
        $this->mdparser->forkawesome = self::$forkawesome;

        return $this->mdparser->text($markdown);
    }

    public static function factory() {
        self::$bootstrap = false;
        self::$forkawesome = false;

        return new FrontYAML\Parser(null, new wiki());
    }
}
?>
