<?php
function get_CURL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics,contentDetails,invideoPromotion&id=UCnCnWrrvgh7Is24mMAeZFiQ&key=AIzaSyAJhmsIfYl7lhj5ajP2Wb4PGKS--fAr0FM');

$youtubepic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];

$youtubetitle = $result['items'][0]['snippet']['title'];

$youtubesubs = $result['items'][0]['statistics']['subscriberCount'];

$youtubedes = $result['items'][0]['snippet']['description'];

$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyAJhmsIfYl7lhj5ajP2Wb4PGKS--fAr0FM&channelId=UCnCnWrrvgh7Is24mMAeZFiQ&maxResults=1&order=date&part=snippet';

$result = get_CURL($urlLatestVideo);

$LatestVideoID = $result['items'][0]['id']['videoId'];
