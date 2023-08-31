<?php

	$setting=unserialize(@file_get_contents(DATA_DIR.'/setting/overnotes.dat'));
	ini_set('mbstring.http_input', 'pass');
	parse_str($_SERVER['QUERY_STRING'],$_GET);
	$keyword=isset($_GET['k'])?trim($_GET['k']):'';
	$category=isset($_GET['c'])?trim($_GET['c']):'';
	$page=isset($_GET['p'])?trim($_GET['p']):'';
	$base_title = !empty($setting['title'])? $setting['title'] : 'OverNotes';

?>
<!Doctype html>
<html lang="ja">

<head>
<?php
	$contribute=get_contribute($contribute_id);
		$title=$contribute['title'];
	$category_id=$contribute['category'];
	$category_data=unserialize(@file_get_contents(DATA_DIR.'/category/'.$category_id.'.dat'));
	$category_name=$category_data['name'];
	$category_text=@$category_data['text'];
	$category_url=$category_data['id'];
	$field_id=$contribute['field'];
	$id=$contribute['id'];
	$field=get_field($field_id);
	$date=$contribute['public_begin_datetime'];
	$url=$contribute['url'].'/';

	foreach($field as $field_index=>$field_data){
		${$field_data['code'].'_Name'}=$field_data['name'];
		${$field_data['code'].'_Value'}=make_value(
		$field_data['name']
				,@$contribute['data'][$field_id][$field_index]
			,$field_data['type']
			,$id
			,$field_id
			,$field_index
		);
		if($field_data['type']=='image'){
			${$field_data['code'].'_Src'}=ROOT_URI.'/_data/contribute/images/'.@$contribute['data'][$field_id][$field_index];
		}
	}

?>
<?php
$current_category_id   = $category_id;
$current_category_name = $category_name;
?>
<?php
	$category_index=get_category_index();
	foreach($category_index as $rowid=>$id){
		$category_data=unserialize(@file_get_contents(DATA_DIR.'/category/'.$id.'.dat'));
		$category_url=$category_data['id'];
		$category_name=$category_data['name'];
		$category_text=@$category_data['text'];
		$category_id=$id;
		${'category'.$id.'_url'}=$category_data['id'];
		${'category'.$id.'_name'}=$category_data['name'];
		${'category'.$id.'_text'}=@$category_data['text'];
		$selected=(@$_GET['c']==$id?' selected="selected"':'');

?>
<?php if( $current_category_id==$category_id ) $current_category_url = $category_url; ?>
<?php
	}
?>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=-100" />
<meta name="format-detection" content="telephone=no" />
<title><?php echo $title; ?>｜<?php echo $base_title; ?></title>
<?php
	if($keywords_Value){
?>
<meta name="keywords" content="<?php echo $keywords_Value; ?>" />
<?php
	}else{
?>
<meta name="keywords" content="" />
<?php
	}
?>
<?php
	if($description_Value){
?>
<meta name="description" content="<?php echo $description_Value; ?>" />
<?php
	}else{
?>
<meta name="description" content="" />
<?php
	}
?>
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<!-- FAVICON -->
<link rel="icon" href="../../favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" sizes="180x180" href="../../favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../favicon/favicon-16x16.png">
<link rel="manifest" href="../../favicon/site.webmanifest">
<!-- STYLESHEET -->
<link rel="stylesheet" href="../../css/styles.css" media="all" />
<link rel="stylesheet" href="../../css/responsive.css" media="all" />
<link rel="stylesheet" href="../../css/under.css" media="all" />
<link rel="stylesheet" href="../../css/under_responsive.css" media="all" />
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
        "name": "ホーム",  // cái này thay đổi tùy theo page [ TOP , HOME v.v.v. , nhớ đổi Topic path trùng với chỗ này --> ĐỌC XONG XÓA COMMENT NÀY ]
        "item": "tên_domain/"
    },
    {
        "@type": "ListItem",
        "position": 2,
        "name": "<?php echo $base_title; ?>",
        "item": "tên_domain/tên_page/"
    },
    {
        "@type": "ListItem",
        "position": 3,
        "name": "<?php echo $current_category_name; ?>",
        "item": "tên_domain/tên_list/<?php echo $current_category_url; ?>/"
    },
    {
        "@type": "ListItem",
        "position": 4,
        "name": "<?php echo $title; ?>",
        "item": "tên_domain/tên_list/<?php echo $url; ?>/"
    }]
}
</script>
</head>

<body id="kiji_detail" class="under">
    <div id="wrapper">
        <header>
            <h1><?php echo $title; ?>｜<?php echo $base_title; ?></h1>
        </header>
        <!-- end #header-->
        <main>
            <!-- content start -->
            <div id="content">
                <div id="top_info">
                    <div class="inner">
                        <h2><?php echo $title; ?></h2>
                    </div>
                </div>
                <div id="topic_path">
                    <div class="inner clearfix">
                        <ul>
                            <li><a href="tên_domain/">ホーム</a></li>
							<li><a href="../"><?php echo $base_title; ?></a></li>
							<li><a href="../<?php echo $current_category_url; ?>"><?php echo $current_category_name; ?></a></li>
							<li><?php echo $title; ?></li>
                        </ul>
                    </div>
                </div>

                <div class="inner clearfix">
                    <h3><?php echo $title; ?><span class="en">DUMMY</span></h3>
                    <section class="kiji_content clearfix">
                    	<?php
	if($image1_Value){
?>
						<p class="center"><img src="./<?php echo $image1_Src; ?>" alt="<?php echo $title; ?>" /></p>
						<?php
	}
?>
						<?php
	if($text1_Value){
?>
						<div class="mb30"><?php echo $text1_Value; ?></div>
						<?php
	}
?>
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