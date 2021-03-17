<?php
namespace tildeteam;

class tildeparsedown extends \ParsedownExtra {
    public $bootstrap = false;
    public $forkawesome = false;

    protected function blockHeader($line) {
        $header = parent::blockHeader($line);

        if (!isset($header))
            return null;

        $id = preg_replace('/[^a-z0-9]/', '-', strtolower($header['element']['text']));
        $header['element']['attributes']['id'] = $id;

        // add anchor link to header text
        $text = '<small><a ';
        $text .= $this->bootstrap ?? false ? 'class="text-muted" ' : '';
        $text .= 'href="#' . $id . '">';
        $text .= $this->forkawesome ?? false ? '<i class="fa fa-link"></i>' : '&#x1f517;';
        $text .= '</a></small> ' . $header['element']['text'];

        $header['element']['text'] = $text;

        return $header;
    }

    protected function blockTable($line, array $block = null) {
        $table = parent::blockTable($line, $block);

        if (!isset($table))
            return null;

        if ($this->bootstrap)
            $table['element']['attributes']['class'] = "table table-striped";

        return $table;
    }
}

