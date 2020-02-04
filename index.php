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

foreach (array_merge($videos_by_keywords, $videos_by_location) as $video) {
    echo '<h1>' . $video->snippet->title . '</h1>';
    echo '<h2>' . $video->snippet->publishedAt . '</h2>';
    echo '<a href="https://www.youtube.com/watch?v=' . $video->id->videoId . '"><img src="' . $video->snippet->thumbnails->high->url.'" ></a><hr />';
}
