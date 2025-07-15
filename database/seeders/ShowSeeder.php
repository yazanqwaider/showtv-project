<?php

namespace Database\Seeders;

use App\Models\Show;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shows = $this->getListOfSeries();

        foreach($shows as $show_item) {
            DB::beginTransaction();
            try {
                $show = Show::create([
                    'title' => $show_item['title'],
                    'description' => $show_item['description'],
                    'type' => $show_item['type'],
                ]);

                $show->airing_time_config()->create([
                    'sat' => $show_item['airing_config']['sat'],
                    'sun' => $show_item['airing_config']['sun'],
                    'mon' => $show_item['airing_config']['mon'],
                    'tue' => $show_item['airing_config']['tue'],
                    'wed' => $show_item['airing_config']['wed'],
                    'thu' => $show_item['airing_config']['thu'],
                    'fri' => $show_item['airing_config']['fri'],
                    'time' => $show_item['airing_config']['time'],
                ]);

                foreach($show_item['episodes'] as $episode) {
                    $show->episodes()->create([
                        'title' => $episode['title'],
                        'description' => $episode['description'],
                        'duration' => $episode['duration'],
                        'thumbnail_url' => $episode['thumbnail_url'],
                        'video_url' => $episode['video_url'],
                        'airing_dt' => $episode['airing_date_time'],
                    ]);
                }

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                logger()->error($e);
            }
        }
    }


    private function getListOfSeries()
    {
        return [
            [
                'title' => 'Sherlock Holmes',
                'description' => 'Sherlock is a British mystery crime drama television series based on Sir Arthur Conan Doyle\'s Sherlock Holmes detective stories.',
                'airing_config' => ['sat' => true, 'sun' => true, 'mon' => false, 'tue' => false, 'wed' => true, 'thu' => true, 'fri' => true, 'time' => '08:00:00'],
                'type' => 'series',
                'episodes' => [
                    [
                        'title' => 'A Study in Pink',
                        'description' => 'A Study in Pink is the first episode of the television series Sherlock and first broadcast on BBC One and BBC HD on 25 July 2010.',
                        'airing_date_time' => '2025-07-20 10:10:00',
                        'duration' => 110,
                        'thumbnail_url' => 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQSb7q6WL23k4YG3_DT4H0ZlDGkYY6EvCu-nI08QskPaKuuDOYz-XPs7ZABlp9i6RkpcxijjFcPSKVoDCtdWKVl8lGObYmle2l0W0Z0kw',
                        'video_url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    ],
                    [
                        'title' => 'The Blind Banker',
                        'description' => 'The Blind Banker is the second episode of the television series Sherlock, first broadcast on BBC One and BBC HD on 1 August 2010.',
                        'airing_date_time' => '2025-07-20 10:10:00',
                        'duration' => 110,
                        'thumbnail_url' => 'https://m.media-amazon.com/images/M/MV5BNjJlNDIwYmYtMzNkOC00ZGM1LThlMTktMjQwNzUxZWNkMWEzXkEyXkFqcGc@._V1_.jpg',
                        'video_url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    ]
                ]
            ],
            [
                'title' => 'See',
                'description' => '"See" is an Apple TV+ science fiction drama series starring Jason Momoa and Alfre Woodard. The show is set in a dystopian future where a virus has caused humanity to lose their sight.',
                'airing_config' => ['sat' => true, 'sun' => true, 'mon' => false, 'tue' => false, 'wed' => true, 'thu' => true, 'fri' => true, 'time' => '08:00:00'],
                'type' => 'series',
                'episodes' => [
                    [
                        'title' => 'Godflame',
                        'description' => 'It was released on November 1, 2019. The episode focuses on an army of Witchfinders attacking the village of Alkenny.',
                        'airing_date_time' => '2025-07-20 10:10:00',
                        'duration' => 110,
                        'thumbnail_url' => 'https://resizing.flixster.com/KasTIr4Q52cXFta9grTre2OA8r4=/fit-in/352x330/v2/https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p17567908_b_h9_al.jpg',
                        'video_url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    ],
                    [
                        'title' => 'Message in a Bottle',
                        'description' => 'uddled together, episode 2 of See begins with the villagers sleeping while Baba Voss heads out with the babies to hunt. As thunder crackles overhead',
                        'airing_date_time' => '2025-07-20 10:10:00',
                        'duration' => 110,
                        'thumbnail_url' => 'https://resizing.flixster.com/QbwUrWi5GUuO0smW3xdh6xMuyuU=/fit-in/352x330/v2/https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p17602423_b_h9_ab.jpg',
                        'video_url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    ]
                ]
            ],
            [
                'title' => 'Prison Break',
                'description' => '"Prison Break" is an American television drama series created by Paul Scheuring, originally airing on Fox from 2005 to 2017. The series centers on two brothers: Michael Scofield (Wentworth Miller), who deliberately gets himself imprisoned to help his wrongly accused brother Lincoln Burrows (Dominic Purcell) escape death row.',
                'airing_config' => ['sat' => true, 'sun' => true, 'mon' => false, 'tue' => false, 'wed' => true, 'thu' => true, 'fri' => true, 'time' => '08:00:00'],
                'type' => 'series',
                'episodes' => [
                    [
                        'title' => 'Pilot',
                        'description' => 'The title of the first episode of Prison Break Season 1 is "Pilot". It premiered on August 29, 2005.',
                        'airing_date_time' => '2025-07-20 10:10:00',
                        'duration' => 110,
                        'thumbnail_url' => 'https://upload.wikimedia.org/wikipedia/en/c/cd/PrisonBreakPilot.jpg',
                        'video_url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    ],
                    [
                        'title' => 'Allen',
                        'description' => 'It aired on August 29, 2005. The episode was written by series creator Paul Scheuring and directed by Michael Watkins. This episode introduces Robert Knepper as Theodore "T-Bag" Bagwell.',
                        'airing_date_time' => '2025-07-20 10:10:00',
                        'duration' => 110,
                        'thumbnail_url' => 'https://resizing.flixster.com/3TjCPoGEgTx0GAkrtlw0bVTFTcs=/fit-in/705x460/v2/https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p185128_b_h9_ah.jpg',
                        'video_url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    ]
                ]
            ],
            [
                'title' => 'Silo',
                'description' => 'Set in a dystopian future where a community exists in a giant underground silo comprising 144 levels, it stars Rebecca Ferguson as an engineer.',
                'airing_config' => ['sat' => true, 'sun' => true, 'mon' => false, 'tue' => false, 'wed' => true, 'thu' => true, 'fri' => true, 'time' => '08:00:00'],
                'type' => 'series',
                'episodes' => [
                    [
                        'title' => 'Freedom Day',
                        'description' => 'The episode introduces the series\' setting and core characters, including Sheriff Holston Becker and his wife Allison, and their life within the Silo.',
                        'airing_date_time' => '2025-07-20 10:10:00',
                        'duration' => 110,
                        'thumbnail_url' => 'https://m.media-amazon.com/images/S/pv-target-images/12c290fab2c6ce0a4674e287f489953c53b4ccd5e2d1fa41afaba456f6dd81a7.jpg',
                        'video_url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    ],
                    [
                        'title' => 'Holston\'s Pick',
                        'description' => 'The episode introduces the series\' setting and core characters, including Sheriff Holston Becker and his wife Allison, and their life within the Silo.',
                        'airing_date_time' => '2025-07-20 10:10:00',
                        'duration' => 110,
                        'thumbnail_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTG_2OMz5qZg6XcmF-VLIC87d6bMBmBBBfj9A&s',
                        'video_url' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                    ]
                ]
            ],
        ];
    }
}
