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

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use tildeteam\wiki;

final class WikiTest extends TestCase {
    public function testHeaderIds(): void {
        $parser = wiki::factory();
        $header = '# hello there';
        $this->assertEquals(
            '<h1 id="hello-there"><small><a href="#hello-there">&#x1f517;</a></small> hello there</h1>',
            $parser->parse($header)->getContent()
        );
    }

    public function testHeaderIdsWithBootstrap(): void {
        $parser = wiki::factory();
        wiki::$bootstrap = true;
        wiki::$forkawesome = true;
        $header = '# hello there';

        $this->assertEquals(
            '<h1 id="hello-there"><small><a class="text-muted" href="#hello-there"><i class="fa fa-link"></i></a></small> hello there</h1>',
            $parser->parse($header)->getContent()
        );
    }

    public function testTableClasses(): void {
        $parser = wiki::factory();
        $table = '| tilde name | description | where to join | notes |
            | --- | --- | --- | ---|
| [breadpunk.club](https://breadpunk.club) | breadpunk.club is a small tilde focused on bread-making and community-building.  see the [manifesto](https://breadpunk.club/docs/manifesto/) for more information on our mission. | [signup information here](https://breadpunk.club/join/) | |';
        $this->assertEquals(
            '<table>
<thead>
<tr>
<th>tilde name</th>
<th>description</th>
<th>where to join</th>
<th>notes</th>
</tr>
</thead>
<tbody>
<tr>
<td><a href="https://breadpunk.club">breadpunk.club</a></td>
<td>breadpunk.club is a small tilde focused on bread-making and community-building.  see the <a href="https://breadpunk.club/docs/manifesto/">manifesto</a> for more information on our mission.</td>
<td><a href="https://breadpunk.club/join/">signup information here</a></td>
<td></td>
</tr>
</tbody>
</table>',
            $parser->parse($table)->getContent()
        );
    }

    public function testTableClassesWithBootstrap(): void {
        $parser = wiki::factory();
        wiki::$bootstrap = true;
        $table = '| tilde name | description | where to join | notes |
            | --- | --- | --- | ---|
| [breadpunk.club](https://breadpunk.club) | breadpunk.club is a small tilde focused on bread-making and community-building.  see the [manifesto](https://breadpunk.club/docs/manifesto/) for more information on our mission. | [signup information here](https://breadpunk.club/join/) | |';
        $this->assertEquals(
            '<table class="table table-striped">
<thead>
<tr>
<th>tilde name</th>
<th>description</th>
<th>where to join</th>
<th>notes</th>
</tr>
</thead>
<tbody>
<tr>
<td><a href="https://breadpunk.club">breadpunk.club</a></td>
<td>breadpunk.club is a small tilde focused on bread-making and community-building.  see the <a href="https://breadpunk.club/docs/manifesto/">manifesto</a> for more information on our mission.</td>
<td><a href="https://breadpunk.club/join/">signup information here</a></td>
<td></td>
</tr>
</tbody>
</table>',
            $parser->parse($table)->getContent()
        );
    }
}
?>
