<?php
require "bootstrap.php";
$settings = parse_ini_file('.env');

$search = [
    'q' => '',
    'part' => 'snippet',
    'type' => 'video',
    'order' => 'date',
    'maxResults' => 50,
    'location' => '46.2695492,20.1335611',
    'locationRadius' => '10km',
];

$youtube = new Madcoda\Youtube(array('key' => $settings['YOUTUBE_API_KEY']));
$videos = $youtube->searchAdvanced($search);

foreach ($videos as $video) {
    echo '<h1>' . $video->snippet->title . '</h1>';
    echo '<h2>' . $video->snippet->publishedAt . '</h2>';
    echo '<a href="https://www.youtube.com/watch?v=' . $video->id->videoId . '"><img src="' . $video->snippet->thumbnails->high->url.'" ></a><hr />';
}