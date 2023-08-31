
<!Doctype html>
<html lang="ja">

<head>
<ONContribute id="$contribute_id"></ONContribute>
<?php
$current_category_id   = $category_id;
$current_category_name = $category_name;
?>
<ONCategory>
<?php if( $current_category_id==$category_id ) $current_category_url = $category_url; ?>
</ONCategory>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=-100" />
<meta name="format-detection" content="telephone=no" />
<title>{=$title=}｜{=$base_title=}</title>
<ONIf condition="$keywords_Value">
<meta name="keywords" content="{=$keywords_Value=}" />
<ONElse>
<meta name="keywords" content="" />
</ONIf>
<ONIf condition="$description_Value">
<meta name="description" content="{=$description_Value=}" />
<ONElse>
<meta name="description" content="" />
</ONIf>
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<!-- FAVICON -->
<link rel="icon" href="../../favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" sizes="180x180" href="../../favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../favicon/favicon-16x16.png">
<link rel="manifest" href="../../favicon/site.webmanifest">
<!-- STYLESHEET -->
<link rel="stylesheet" media="all" href="../../css/styles.css" />
<link rel="stylesheet" media="all" href="../../css/responsive.css" />
<link rel="stylesheet" media="all" href="../../css/under.css" />
<link rel="stylesheet" media="all" href="../../css/under_responsive.css" />
<script src="../../js/jquery.js"></script>
<!-- Google Analytics start -->
<!-- Google Analytics end -->

<!-- JSON BREADCRUMBS -->
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "ホーム",
        "item": "link_domain"
    },
    {
        "@type": "ListItem",
        "position": 2,
        "name": "{=$base_title=}",
        "item": "link_domain/page_name"
    },
    {
        "@type": "ListItem",
        "position": 3,
        "name": "{=$current_category_name=}",
        "item": "link_domain/page_name/{=$current_category_url=}"
    },
    {
        "@type": "ListItem",
        "position": 4,
        "name": "{=$title=}",
        "item": "link_domain/page_name/{=$url=}"
    }]
}
</script>
</head>

<body id="kiji_detail" class="under">
    <div id="wrapper">
        <header>
            <h1>{=$title=}｜{=$base_title=}</h1>
        </header>
        <!-- end #header-->
        <main>
            <!-- content start -->
            <div id="content">
                <div id="top_info">
                    <div class="inner">
                        <h2>{=$base_title=}</h2>
                    </div>
                </div>
                <div id="topic_path">
                    <div class="inner clearfix">
                        <ul>
                            <li><a href="#">ホーム</a></li>
							<li><a href="../">{=$base_title=}</a></li>
							<li><a href="../{=$current_category_url=}">{=$current_category_name=}</a></li>
							<li>{=$title=}</li>
                        </ul>
                    </div>
                </div>

                <div class="inner clearfix">
                    <h3>{=$title=}<span class="en">DUMMY</span></h3>
                    <section class="kiji_detail_ct clearfix">
                    	<ONIf condition="$image1_Value">
						<p class="center"><img src="./{=$image1_Src=}" alt="{=$title=}" /></p>
						</ONIf>
						<ONIf condition="$text1_Value">
						<div class="mb30">{=$text1_Value=}</div>
						</ONIf>
						<p class="btn center"><a href="../">戻る</a></p>
					</section>
				</div>
            </div>
            <!-- content end -->
        </main>
        <!-- end #main-->

        <footer></footer>
        <!-- end footer -->
    </div>
    <script src="../../js/sweetlink.js"></script>
    <script src="../../js/common.js"></script>
</body>

</html>