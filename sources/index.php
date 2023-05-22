<?php
if (!defined('SOURCES')) die("Error");
/* static */
$popup = $cache->get("select name$lang, photo, link from #_photo where type = ? and act = ? and find_in_set('hienthi',status) limit 0,1", array('popup', 'photo_static'), 'fetch', 7200);

/* multi */
$slider = $cache->get("select name$lang, desc$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb asc", array('slide'), 'result', 7200);
// $brand = $cache->get("select name$lang, slugvi, slugen, id, photo from #_product_brand where type = ? and find_in_set('hienthi',status) order by numb asc", array('san-pham'), 'result', 7200);
$productHot = $cache->get("select name$lang, slugvi, slugen, id, photo, regular_price, sale_price, discount, type from #_product where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by id desc", array('san-pham'), 'result', 7200);
$proListHot = $cache->get("select name$lang, slugvi, slugen, id from #_product_list where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb asc", array('san-pham'), 'result', 7200);
$newsHot = $cache->get("select name$lang, slugvi, slugen, desc$lang, date_created, id, photo from #_news where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by id desc", array('tin-tuc'), 'result', 7200);
$gioithieu = $cache->get("select name$lang,desc$lang, content$lang,photo, photo1 from #_static where type = ? limit 0,1", array('gioi-thieu'), 'fetch', 7200);
$anhdichvu = $cache->get("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('anh-dich-vu', 'photo_static'), 'fetch', 7200);
$partner = $cache->get("select name$lang, link, photo from #_photo where type = ? and find_in_set('hienthi',status) order by numb asc", array('doi-tac'), 'result', 7200);
$banner = $cache->get("select name$lang,photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb asc", array('banner'), 'result', 7200);
$nhanxet = $cache->get("select name$lang, slugvi, slugen, desc$lang, id, photo from #_news where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by id desc", array('nhan-xet'), 'result', 7200);

$taisaochon = $cache->get("select name$lang, slugvi, slugen, desc$lang,id, photo from #_news where type = ? and find_in_set('hienthi',status) order by id desc", array('tai-sao-chon'), 'result', 7200);

$cauhoi = $cache->get("select name$lang, slugvi, slugen, desc$lang,id, photo from #_news where type = ? and find_in_set('hienthi',status) order by id desc", array('cau-hoi'), 'result', 7200);

$dichvu = $cache->get("select name$lang, slugvi, slugen, desc$lang, id, photo from #_news where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by id desc", array('dich-vu'), 'result', 7200);

$tieuchi = $cache->get("select name$lang, slugvi, slugen, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb asc", array('tieu-chi'), 'result', 7200);

$videoHot = $cache->get("select id,name$lang,link_video from #_photo where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb asc", array('video'), 'result', 7200);


/* SEO */
$seoDB = $seo->getOnDB(0, 'setting', 'update', 'setting');
if (!empty($seoDB['title' . $seolang])) $seo->set('h1', $seoDB['title' . $seolang]);
if (!empty($seoDB['title' . $seolang])) $seo->set('title', $seoDB['title' . $seolang]);
if (!empty($seoDB['keywords' . $seolang])) $seo->set('keywords', $seoDB['keywords' . $seolang]);
if (!empty($seoDB['description' . $seolang])) $seo->set('description', $seoDB['description' . $seolang]);
$seo->set('url', $func->getPageURL());
// $imgJson = (!empty($banner_seo_home['options'])) ? json_decode($banner_seo_home['options'], true) : null;
// if (empty($imgJson) || ($imgJson['p'] != $banner_seo_home['photo'])) {
//     $imgJson = $func->getImgSize($banner_seo_home['photo'], UPLOAD_PHOTO_L . $banner_seo_home['photo']);
//     $seo->updateSeoDB(json_encode($imgJson), 'photo', $banner_seo_home['id']);
// }
// if (!empty($imgJson)) {
//     $seo->set('photo', $configBase . THUMBS . '/' . $imgJson['w'] . 'x' . $imgJson['h'] . 'x2/' . UPLOAD_PHOTO_L . $banner_seo_home['photo']);
//     $seo->set('photo:width', $imgJson['w']);
//     $seo->set('photo:height', $imgJson['h']);
//     $seo->set('photo:type', $imgJson['m']);
// }
$imgJson = (!empty($logo['options'])) ? json_decode($logo['options'], true) : null;
if (empty($imgJson) || ($imgJson['p'] != $logo['photo'])) {
    $imgJson = $func->getImgSize($logo['photo'], UPLOAD_PHOTO_L . $logo['photo']);
    $seo->updateSeoDB(json_encode($imgJson), 'photo', $logo['id']);
}
if (!empty($imgJson)) {
    $seo->set('photo', $configBase . THUMBS . '/' . $imgJson['w'] . 'x' . $imgJson['h'] . 'x2/' . UPLOAD_PHOTO_L . $logo['photo']);
    $seo->set('photo:width', $imgJson['w']);
    $seo->set('photo:height', $imgJson['h']);
    $seo->set('photo:type', $imgJson['m']);
}