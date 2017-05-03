<?xml version="1.0" encoding="UTF-8"?>
<?php
 error_reporting(0); 
 
    $rssfeed .= '<rss version="2.0">';
    $rssfeed .= '<channel>';
    $rssfeed .= '<title> News - Today News Headlines from India and World - Samachar Live</title>';
    $rssfeed .= '<link>http://www.samacharlive.com</link>';
    $rssfeed .= '<description>Latest headlines from India and from around the world. Check out most recent and up-to-date news coverage, videos, photos at Samachar Live</description>';
    $rssfeed .= '<language>en-us</language>';
    $rssfeed .= '<copyright>Copyright (C) 2017 samacharlive.com</copyright>';
    $PostTitle ="";


    DEFINE ('DB_USER', 'root');   
    DEFINE ('DB_PASSWORD', '');   
    DEFINE ('DB_HOST', 'localhost');   
    DEFINE ('DB_NAME', 'edibbwqq_News'); 

$connection = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
        or die('Could not connect to database');
    mysql_select_db(DB_NAME)
        or die ('Could not select database');
 
    $query = "SELECT * FROM blog_posts_seo ORDER BY postDate DESC";
    $result = mysql_query($query) or die ("Could not execute query");
 
    while($row = mysql_fetch_array($result)) {
        extract($row);
 
        $rssfeed .= '<item>';
        $rssfeed .= '<title>' . $PostTitle . '</title>';
        $rssfeed .= '<description>' . $postDesc . '</description>';
        $rssfeed .= '<link>http://samacharlive.com/News/'. $postSlug . '</link>';
        $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($postDate)) . '</pubDate>';
        $rssfeed .= '</item>';
    }
 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
    header("Content-Type: application/rss+xml; charset=ISO-8859-1");
    header('Content-Type: application/xml');
    echo trim($rssfeed);?>
	

	
	
	
	