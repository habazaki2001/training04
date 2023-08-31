<!Doctype html>
<html lang="ja">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=-100" />
<meta name="format-detection" content="telephone=no" />
<title>{=$base_title=}｜</title>
<meta name="keywords" content="{=$base_title=}" />
<meta name="description" content="{=$base_title=}" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<!-- FAVICON -->
<link rel="icon" href="../favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
<link rel="manifest" href="../favicon/site.webmanifest">
<!-- STYLESHEET -->
<link rel="stylesheet" media="all" href="../css/styles.css" />
<link rel="stylesheet" media="all" href="../css/responsive.css" />
<link rel="stylesheet" media="all" href="../css/under.css" />
<link rel="stylesheet" media="all" href="../css/under_responsive.css" />
<script src="../js/jquery.js"></script>
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
        "name": "h2ミーダミーダミーダ",
        "item": "link_domain/page_name"
    }]
}
</script>
</head>

<body id="kiji" class="under">
    <div id="wrapper">
        <header>
            <h1>{=$base_title=}｜</h1>
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
                            <li>{=$base_title=}</li>
                        </ul>
                    </div>
                </div>

                <div class="inner clearfix">
                    <h3>{=$base_title=}<span class="en">Kijikaku</span></h3>
					<section class="kiji_content">
						<!-- *********   CATEGORIES   ********* -->
                        <div class="list_anchor">
						    <ONCategory>
	                            <p class="btn_anchor"><a href="{=$category_url=}">{=$category_name=}</a></p>
						    </ONCategory>
                        </div>
						<!-- *********    /CATEGORIES ********* -->
						
						<!-- *********   POSTS   ********* -->
						<div class="kiji_list">
                        <?php $limitNum = 9 ?>
                        <ONContributeSearch page="@$_GET['p']" limit="$limitNum" category="@$current_category_id">
                            <ONContributeFetch>
                                <dl>
                                	<!-- NẾU chỉ thị load date dạng yy.mm.dd thì mở tag này
                                    <dt><img src="../images/ic_date.png" width="24" alt="Date"><?php echo date("Y.m.d", strtotime($date)); ?></dt>
									 -->
                                    <dt><img src="../images/ic_date.png" width="24" alt="Date">{=$date=}</dt>
                                    <dd><a href="./{=$url=}">{=$title=}</a></dd>
                                </dl>
                            </ONContributeFetch>
                        </ONContributeSearch>
	                    </div>
                        <!-- *********    /POSTS ********* -->

	                    <!-- *********   PAGINATION   ********* -->
	                    <ONPagenation record_count="$max_record_count" limit="$limitNum">
	                        <ONIf condition="$max_record_count > $limitNum">
	                            <ul class="pagination">
	                                <ONIf condition="$current_page <= 1">
	                                    <li class="disabled"><a href="#">&lt;&lt;</a></li>
	                                    <ONElse>
	                                        <li><a href="./?p={=$current_page-1=}">&lt;&lt;</a></li>
	                                </ONIf>
	                                <ONPagenationFetch>
	                                    <ONIf condition="$current_page == $page">
	                                        <li class="active"><a href="#">{=$page=}</a></li>
	                                        <ONElse>
	                                            <li><a href="./?p={=$page=}">{=$page=}</a></li>
	                                    </ONIf>
	                                </ONPagenationFetch>
	                                <ONIf condition="$current_page*$limitNum<$max_record_count">
	                                    <li><a href="./?p={=$current_page+1=}">&gt;&gt;</a></li>
	                                    <ONElse>
	                                        <li class="disabled"><a href="#">&gt;&gt;</a></li>
	                                </ONIf>
	                            </ul>
	                        </ONIf>
	                    </ONPagenation>
						<!-- *********    /PAGINATION ********* -->
					</section>
                </div>
            </div>
            <!-- content end -->
        </main>
        <!-- end #main-->

        <footer></footer>
        <!-- end footer -->
    </div>
    <script src="../js/sweetlink.js"></script>
    <script src="../js/common.js"></script>
</body>

</html>