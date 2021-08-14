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
?>
