<?php  
	if(!defined('SOURCES')) die("Error");

	/* product search */
	if(!empty($_GET['keyword']))
	{
		$keywordText = htmlspecialchars($_GET['keyword']);
		$keyword = htmlspecialchars($_GET['keyword']);
		$keyword = $func->changeTitle($keyword);

		if($keyword)
		{
			$where = "";
			$where = "type = ? and (name$lang LIKE ? or slugvi LIKE ? or slugen LIKE ?) and find_in_set('hienthi',status)";
			$params = array("san-pham","%$keyword%","%$keyword%","%$keyword%");

			$curPage = $getPage;
			$perPage = 20;
			$startpoint = ($curPage * $perPage) - $perPage;
			$limit = " limit ".$startpoint.",".$perPage;
			$sql = "select photo, name$lang, slugvi, slugen, sale_price, regular_price, discount, id from #_product where $where order by numb,id desc $limit";
			$product = $d->rawQuery($sql,$params);
			$sqlNum = "select count(*) as 'num' from #_product where $where order by numb,id desc";
			$count = $d->rawQueryOne($sqlNum,$params);
			$total = (!empty($count)) ? $count['num'] : 0;
			$url = $func->getCurrentPageURL();
			$paging = $func->pagination($total,$perPage,$curPage,$url);
		}
	}

	/* SEO */
	$seo->set('title',$titleMain);

	/* breadCrumbs */
	$breadcr->set('',$titleMain);
	$breadcrumbs = $breadcr->get();
?>