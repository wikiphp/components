<?php
namespace Tildeverse\Wiki;

use Mni\FrontYAML;

class Parser implements FrontYAML\Markdown\MarkdownParser {
    public function __construct() {
        $this->mdparser = new WikiParsedown();
    }

    public function parse($markdown) {
        return $this->mdparser->text($markdown);
    }

    public static function factory() {
        return new FrontYAML\Parser(null, new Parser());
    }
}
