<?php
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
