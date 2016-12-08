<?php
global $webkite_dev_mode;

$results = "<div id='webkite-results'".
           " class='webkite-results'".
           " data-results-server='" . WEBKITE_RR_URL . "'". // RR server
           " data-dataset-id='" . $dataset . "'".
           " data-theme-server='" . WEBKITE_THEME_URL . "'". // theme server
           " data-theme='" . $theme . "'";

if (isset($theme_style))
  $results .= " data-style='" . $theme_style . "'"; 

if (isset($perpage))
  $results .= " data-per-page='" . $perpage . "'"; 

if (isset($filters))
  $results .= " data-filters='" . $filters . "'"; 

if (isset($sorts))
  $results .= " data-sorts='" . $sorts . "'"; 

if (isset($language) && $language != '')
  $results .= " data-language='" . $language . "'";

if ($webkite_dev_mode)
  $results .= " data-env='develop'";
  
$results .= "></div>";

echo $results;
?>
