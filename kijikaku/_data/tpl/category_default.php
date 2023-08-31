<?php

	$setting=unserialize(@file_get_contents(DATA_DIR.'/setting/overnotes.dat'));
	ini_set('mbstring.http_input', 'pass');
	parse_str($_SERVER['QUERY_STRING'],$_GET);
	$keyword=isset($_GET['k'])?trim($_GET['k']):'';
	$category=isset($_GET['c'])?trim($_GET['c']):'';
	$page=isset($_GET['p'])?trim($_GET['p']):'';
	$base_title = !empty($setting['title'])? $setting['title'] : 'OverNotes';

?>﻿<!Doctype html>
<html lang="ja">

<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=-100" />
<meta name="format-detection" content="telephone=no" />
<title><?php echo $current_category_name; ?>｜<?php echo $base_title; ?></title>
<meta name="keywords" content="<?php echo $current_category_name; ?>,<?php echo $base_title; ?>" />
<meta name="description" content="<?php echo $current_category_name; ?>｜<?php echo $base_title; ?>" />
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
        "item": "tên_domain/tên_kiji/"
    },
    {
        "@type": "ListItem",
        "position": 3,
        "name": "<?php echo $current_category_name; ?>",
        "item": "tên_domain/tên_kiji/<?php echo $current_category_url; ?>/"
    }]
}
</script>
</head>

<body id="kiji_cate" class="under">
    <div id="wrapper">
        <header>
            <h1><?php echo $current_category_name; ?>｜<?php echo $base_title; ?></h1>
        </header>
        <!-- end #header-->
        <main>
            <!-- content start -->
            <div id="content">
                <div id="top_info">
                    <div class="inner">
                        <h2><?php echo $current_category_name; ?></h2>
                    </div>
                </div>
                <div id="topic_path">
                    <div class="inner clearfix">
                        <ul>
                            <li><a href="tên_domain/">ホーム</a></li>
                            <li><a href="../"><?php echo $base_title; ?></a></li>
                            <li><?php echo $current_category_name; ?></li>
                        </ul>
                    </div>
                </div>
				
                <div class="inner clearfix">
                	<h3><?php echo $base_title; ?><span class="en">Tên_page</span></h3>
                	<?php
	if($current_category_text){
?>
	                	<section class="clearfix">
	                		<?php echo $current_category_text; ?>  
	                		<!-- NẾU TEXT CATE KHÁC NHAU THÌ NHẬP chỗ này trong [ _sys] https://prnt.sc/z94HkjwtYc2o  -->
	                	</section>
	                <?php
	}
?>

					<section class="kiji_content">
						<!-- *********   CATEGORIES   ********* -->
                        <div class="list_anchor">
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
                            <p class="btn_anchor"><a href="../<?php echo $category_url; ?>"><?php echo $category_name; ?></a></p>
						    <?php
	}
?>
                        </div>
						<!-- *********    /CATEGORIES ********* -->
						
						<!-- *********   POSTS   ********* -->
						<div class="kiji_list">
	                        <?php $limitNum = 20 ?>
	                        <?php
	$contribute_index=contribute_search(
		@$current_category_id
		,''
		,''
		,''
		,''
		,''
	);
	$max_record_count=count($contribute_index);

	$current_page=(@$_GET['p'])?(@$_GET['p']):1;
	$contribute_index=array_slice($contribute_index,($current_page-1)*$limitNum,$limitNum);
	$record_count=count($contribute_index)

?>
	                            <?php
	$local_index=0;
	foreach($contribute_index as $rowid=>$index){
		$contribute=unserialize(@file_get_contents(DATA_DIR.'/contribute/'.$index['id'].'.dat'));
		$title=$contribute['title'];
		$url=$contribute['url'].'/';
		$category_id=$index['category'];
		$category_data=unserialize(@file_get_contents(DATA_DIR.'/category/'.$category_id.'.dat'));
		$category_name=$category_data['name'];
		$category_text=@$category_data['text'];
		$field_id=$index['field'];
		$date=$index['public_begin_datetime'];
		$id=$index['id'];
		$field=get_field($field_id);

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
		$local_index++;

?>
                                <dl>
                                	<!-- NẾU chỉ thị load date dạng yyyy.mm.dd thì mở tag này
                                    <dt><img src="../images/ic_date.png" width="24" alt="Date"><?php echo date("Y.m.d", strtotime($date)); ?></dt>
									 -->
                                    <dt><img src="../../images/ic_date.png" width="24" alt="Date"><?php echo $date; ?></dt>
                                    <dd><a href="../<?php echo $url; ?>"><?php echo $title; ?></a></dd>
                                </dl>
	                            <?php
		foreach($field as $field_index=>$field_data){
			unset(${$field_data['code'].'_Name'});
			unset(${$field_data['code'].'_Value'});
			unset(${$field_data['code'].'_Src'});
		}
	}
?>
	                        
	                    </div>
                        <!-- *********    /POSTS ********* -->


	                    <!-- *********   PAGINATION   ********* -->
	                    <?php
	$page_count=(int)ceil($max_record_count/(float)$limitNum);
?>
	                        <?php
	if($max_record_count > $limitNum){
?>
	                            <ul class="pagination">
	                                <?php
	if($current_page <= 1){
?>
	                                    <li class="disabled"><a href="#">&lt;&lt;</a></li>
	                                    <?php
	}else{
?>
	                                        <li><a href="./?p=<?php echo $current_page-1; ?>">&lt;&lt;</a></li>
	                                <?php
	}
?>
	                                <?php
	$page_old=@$page;
	for($page=1;$page<=$page_count;$page++){
?>
	                                    <?php
	if($current_page == $page){
?>
	                                        <li class="active"><a href="#"><?php echo $page; ?></a></li>
	                                        <?php
	}else{
?>
	                                            <li><a href="./?p=<?php echo $page; ?>"><?php echo $page; ?></a></li>
	                                    <?php
	}
?>
	                                <?php
	}
$page=$page_old;
?>
	                                <?php
	if($current_page*$limitNum<$max_record_count){
?>
	                                    <li><a href="./?p=<?php echo $current_page+1; ?>">&gt;&gt;</a></li>
	                                    <?php
	}else{
?>
	                                        <li class="disabled"><a href="#">&gt;&gt;</a></li>
	                                <?php
	}
?>
	                            </ul>
	                        <?php
	}
?>
	                    
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
    <script src="../../js/sweetlink.js"></script>
    <script src="../../js/common.js"></script>
</body>

</html>