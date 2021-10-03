<?php declare(strict_types=1);


namespace App\Services;


use App\Contract\Parser;
use App\Models\Category;
use App\Models\Source;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class ParserService implements Parser
{
    public function parse(string $link)
    {
        //$xml = \XmlParser::load($link); =
        $xml = \Orchestra\Parser\Xml\Facade::load($link);
        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
        $e = explode("/", $link);
        $filename = end($e);
        Source::create([
            'title' => $filename,
            'link' => $link,
        ]);

        /*
         * В тестовой таблице Source есть другие записи, но чтобы парсить прямо из нее, можно делать примерно так, только сперва не забывать в source добавлять источники
         * $sourceArray = [];
            foreach (Source::all() as $sourceName) {
                $sourceArray[] = $sourceName['link'];
            }
        и далее как ниже: foreach($sourceArray['news'] as $news) {...}
         */

        foreach ($data['news'] as $oneNews) {
            News::create([
                'category_id' => 1,
                'title' => $oneNews['title'],
                'description' => $oneNews['description'],
                'author' => 'Yandex',
                'created_at' => $oneNews['pubDate'],
                'source_id' => 1
            ]);
        }

        // Если бы хотели записывать в файл
        // Storage::disk('parsing')->append('news/' . $filename, json_encode($data));
    }
}
