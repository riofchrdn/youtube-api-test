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

?>