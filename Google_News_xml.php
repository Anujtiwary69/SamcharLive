  <?php

header("Content-Type: application/rss+xml; charset=ISO-8859-1");
    DEFINE ('DB_USER', 'edibbwqq_samacha');   
    DEFINE ('DB_PASSWORD', 'NamAO#a}cCdI');   
    DEFINE ('DB_HOST', 'localhost');   
    DEFINE ('DB_NAME', 'edibbwqq_News'); 
 
    $rssfeed = '<?xml version="1.0" encoding="UTF-8"?>';
    
    $rssfeed .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">';
    

$connection = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
        or die('Could not connect to database');
    mysql_select_db(DB_NAME)
        or die ('Could not select database');
 
    $query = "SELECT * FROM blog_posts_seo ORDER BY postDate DESC LIMIT 1000";
    $result = mysql_query($query) or die ("Could not execute query");
 
    while($row = mysql_fetch_array($result)) {
        extract($row);
 
        $rssfeed .= '<url>';
		$rssfeed .= '<loc>http://www.samacharlive.com/News/'. $postSlug . '</loc>';
		$rssfeed .= '<news:news>';
		$rssfeed .= '<news:publication><news:name>Samachar Live</news:name><news:language>en</news:language></news:publication><news:genres>PressRelease,Blog,UserGenerated</news:genres>';
        $rssfeed .= '<news:publication_date>' . date("Y-m-d ", strtotime($postDate)) . '</news:publication_date>';
		$rssfeed .= '<news:title>' . $postTitle . '</news:title>';
        $rssfeed .= '<news:keywords>' . $postKeywords . '</news:keywords>';
        $rssfeed .= '</news:news>';
        $rssfeed .= '</url>';
    }
 
    $rssfeed .= '</urlset>';
    
 
    echo $rssfeed;
?>
	

	
	
	
	