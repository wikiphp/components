<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class WikiTest extends TestCase {
    public function testHeaderIds(): void {
        $parser = tildeteam\wiki\Parser::factory();
        $header = '# hello there' . PHP_EOL;
        $this->assertEquals(
            $parser->parse($header)->getContent(),
            '<h1 id="hello-there"><small><a class="text-muted" href="#hello-there"><i class="fa fa-link"></i></a></small> hello there</h1>'
        );
    }

    public function testTableClasses(): void {
        $parser = tildeteam\wiki\Parser::factory();
        $table = '| tilde name | description | where to join | notes |
            | --- | --- | --- | ---|
| [breadpunk.club](https://breadpunk.club) | breadpunk.club is a small tilde focused on bread-making and community-building.  see the [manifesto](https://breadpunk.club/docs/manifesto/) for more information on our mission. | [signup information here](https://breadpunk.club/join/) | |';
        $this->assertEquals(
            $parser->parse($table)->getContent(),
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
</table>'
        );
    }
}
