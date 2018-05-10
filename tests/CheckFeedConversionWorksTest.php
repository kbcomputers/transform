<?php

use Kregel\Transform\Transformer;

class CheckFeedConversionWorksTest extends \PHPUnit\Framework\TestCase
{
    public function testIfWeGetAnArray()
    {
        $feed = new \Tests\Transform\Profile();

        $feed->setOriginalFeed([
            'NAME' => 'Micaela Cummings',
        ]);

        $this->assertNotNull($feed);

        $this->assertArrayHasKey('NAME', $feed->getOriginalFeed());
    }

    public function testWeCanConvertAnArray()
    {
        $feed = new \Tests\Transform\Profile();

        $feed->setOriginalFeed([
            'BIRTHDAY' => [
                'AGE' => 28,
                'DATE' => '1989-04-30 19:19:06',
            ],
        ]);

        $feed->setKeys([
            'NAME' => 'name',
            'BIRTHDAY|array' => 'birthday',
            'BIRTHDAY' => [
                'AGE' => 'age',
                'DATE' => 'date'
            ]
        ]);

        $this->assertArrayHasKey('birthday', $feed->transform());
    }

    public function testWeCanConvertANestedArray()
    {
        $feed = new \Tests\Transform\Profile();

        $feed->setOriginalFeed([
            'USER' => [
                'NAME' => 'Micaela Cummings',
                'BIO' => 'Quasi atque sit quisquam id facere sunt fugiat repellendus voluptates ut et omnis minus eos est vitae nesciunt debitis maiores inventore dolorum hic eveniet nihil aperiam itaque vitae.',
                'SSN' => '517-01-7345',
                'BIRTHDAY' => [
                    'AGE' => 28,
                    'DATE' => '1989-04-30 19:19:06',
                ],
                'PHOTO' => 'https://randomuser.me/api/portraits/women/31.jpg',
                'SEED' => 130,
            ]
        ]);

        $feed->setKeys([
            'USER|array' => 'user',
            'USER' => [
                'BIRTHDAY|array' => 'birthday',
                'BIRTHDAY' => [
                    'AGE' => 'age',
                    'DATE' => 'date'
                ]
            ]
        ]);

        $this->assertArrayHasKey('user', $feed->transform());
        $this->assertArrayHasKey('birthday', $feed->transform()['user']);
        $this->assertArrayHasKey('age', $feed->transform()['user']['birthday']);
    }
}