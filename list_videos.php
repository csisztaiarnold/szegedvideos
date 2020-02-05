<?php
require "bootstrap.php";

$videos = $capsule->table('videos')->orderBy('published_at', 'desc')->get();

foreach ($videos as $video) {
    echo '<h1>' . $video->title . '</h1>';
    echo '<h2>' . $video->published_at . '</h2>';
    echo '<h3><a href="https://www.youtube.com/channel/' . $video->channel_id . '">' . $video->channel_title . '</a></h3>';
    echo '<a href="https://www.youtube.com/watch?v=' . $video->video_id . '"><img src="' . $video->thumbnail_high_url . '"></a><hr>';
}
