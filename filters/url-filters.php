<?php
$url = "<>https://www.w3schools.com</>";

// Remove HTML tags
$url = strip_tags($url);

// Remove other illegal URL characters
$url = filter_var($url, FILTER_SANITIZE_URL);

// Validate URL
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "$url is a valid URL";
} else {
    echo "$url is not a valid URL";
}
?>