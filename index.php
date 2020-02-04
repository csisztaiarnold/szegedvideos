<?php
require "bootstrap.php";
$settings = parse_ini_file('.env');

$search = [
    'q' => '',
    'part' => 'snippet',
    'type' => 'video',
    'order' => 'date',
    'maxResults' => 50,
];

$search_by_keyword = [
    'q' => 'szeged',
];

$search_by_location = [
    'location' => '46.2695492,20.1335611', // Szeged
    'locationRadius' => '30km',
];

$youtube = new Madcoda\Youtube(array('key' => $settings['YOUTUBE_API_KEY']));
$videos_by_keywords = $youtube->searchAdvanced(array_merge($search, $search_by_keyword));
$videos_by_location = $youtube->searchAdvanced(array_merge($search, $search_by_location));

$videos = getVideos(array_merge($videos_by_keywords, $videos_by_location));

foreach ($videos as $video) {
    echo '<h1>' . $video['title'] . '</h1>';
    echo '<h2>' . $video['published_at'] . '</h2>';
    echo '<h3><a href="https://www.youtube.com/channel/' . $video['channel']['id'] . '">' . $video['channel']['title'] . '</a></h3>';
    echo '<a href="https://www.youtube.com/watch?v=' . $video['id']. '"><img src="' . $video['thumbnail']['high']['url'] .'"></a><hr>';
}

function getVideos($video_array) {
    foreach ($video_array as $video) {
        $videos[] = [
            'id' => $video->id->videoId,
            'published_at' => $video->snippet->publishedAt,
            'title' => $video->snippet->title,
            'description' => $video->snippet->description,
            'thumbnail' => [
                'default' => [
                    'url' => $video->snippet->thumbnails->default->url,
                    'width' => $video->snippet->thumbnails->default->width,
                    'height' => $video->snippet->thumbnails->default->height,
                ],
                'medium' => [
                    'url' => $video->snippet->thumbnails->medium->url,
                    'width' => $video->snippet->thumbnails->medium->width,
                    'height' => $video->snippet->thumbnails->medium->height,
                ],
                'high' => [
                    'url' => $video->snippet->thumbnails->high->url,
                    'width' => $video->snippet->thumbnails->high->width,
                    'height' => $video->snippet->thumbnails->high->height,
                ],
            ],
            'channel' => [
                'id' => $video->snippet->channelId,
                'title' => $video->snippet->channelTitle,
            ]
        ];
    }
    return $videos;
}

