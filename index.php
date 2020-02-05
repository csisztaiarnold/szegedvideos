<?php
require "bootstrap.php";

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

$youtube = new Madcoda\Youtube(['key' => $settings['YOUTUBE_API_KEY']]);
$videos_by_keywords = $youtube->searchAdvanced(array_merge($search, $search_by_keyword));
$videos_by_location = $youtube->searchAdvanced(array_merge($search, $search_by_location));

$videos = parseVideos(array_merge($videos_by_keywords, $videos_by_location), $capsule);

$email_content = '';
if (!empty($videos)) {
    $capsule->table('videos')->insert($videos);
    foreach ($videos as $video) {
        $email_content .= $video['title']." - https://www.youtube.com/watch?v=".$video['video_id']."\n";
    }
    mail($settings['NOTIFICATION_EMAIL'], 'New videos!', $email_content);
}

function parseVideos($video_array, $capsule)
{
    $videos = [];
    foreach ($video_array as $video) {
        if (!$capsule->table('videos')->where('video_id', $video->id->videoId)->get()->first()) {
            $videos[] = [
                'video_id' => $video->id->videoId,
                'published_at' => $video->snippet->publishedAt,
                'title' => $video->snippet->title,
                'description' => $video->snippet->description,
                'thumbnail_default_url' => $video->snippet->thumbnails->default->url,
                'thumbnail_default_width' => $video->snippet->thumbnails->default->width,
                'thumbnail_default_height' => $video->snippet->thumbnails->default->height,
                'thumbnail_medium_url' => $video->snippet->thumbnails->medium->url,
                'thumbnail_medium_width' => $video->snippet->thumbnails->medium->width,
                'thumbnail_medium_height' => $video->snippet->thumbnails->medium->height,
                'thumbnail_high_url' => $video->snippet->thumbnails->high->url,
                'thumbnail_high_width' => $video->snippet->thumbnails->high->width,
                'thumbnail_high_height' => $video->snippet->thumbnails->high->height,
                'channel_id' => $video->snippet->channelId,
                'channel_title' => $video->snippet->channelTitle,
            ];
        }
    }
    return $videos;
}
