 <div class="header-logo-reponsive">
     <div class="wrap-content d-flex align-items-center justify-content-lg-between justify-content-center">
         <div class="logo ">
             <a class="logo-header" href="">
                 <?= $func->getImage(['upload' => UPLOAD_PHOTO_L, 'sizes' => '500x100x2', 'image' => $logo['photo'], 'alt' => $setting['name' . $lang]]) ?>
             </a>
         </div>
     </div>
 </div>

 <div class="menu-res">
     <div class="menu-bar-res">
         <a id="hamburger" href="#menu" title="Menu"><span></span></a>
         <!-- <div class="search-res">
             <p class="icon-search transition"><i class="bi bi-search"></i></p>
             <div class="search-grid w-clear">
                 <input type="text" name="keyword-res" id="keyword-res" placeholder="<?= nhaptukhoatimkiem ?>" onkeypress="doEnter(event,'keyword-res');" value="<?= (!empty($_GET['keyword-res'])) ? $_GET['keyword-res'] : '' ?>" />
                 <p onclick="onSearch('keyword-res');"><i class="bi bi-search"></i></p>
             </div>
         </div> -->
     </div>
     <nav id="menu">
         <ul>
             <li><a class="<?php if ($com == '' || $com == 'index') echo 'active'; ?> transition" href="" title="<?= trangchu ?>"><?= trangchu ?></a></li>
             <li><a class="<?php if ($com == 'gioi-thieu') echo 'active'; ?> transition" href="gioi-thieu" title="<?= gioithieu ?>"><?= gioithieu ?></a></li>
            <li>
                            <a class="<?php if ($com == 'dich-vu') echo 'active'; ?> transition" href="dich-vu" title="<?= dichvu ?>">Dịch Vụ In</a>
                            <?php if (count($dichvucap1)) { ?>
                                <ul>
                                    <?php foreach ($dichvucap1 as $klist => $vlist) {
                                        $spcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                                        <li>
                                            <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
                                            <?php if (!empty($spcat)) { ?>
                                                <ul>
                                                    <?php foreach ($spcat as $kcat => $vcat) {
                                                        $spitem = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_item where id_cat = ? and find_in_set('hienthi',status) order by numb,id desc", array($vcat['id'])); ?>
                                                        <li>
                                                            <a class="has-child transition" title="<?= $vcat['name' . $lang] ?>" href="<?= $vcat[$sluglang] ?>"><?= $vcat['name' . $lang] ?></a>
                                                            <?php if (!empty($spitem)) { ?>
                                                                <ul>
                                                                    <?php foreach ($spitem as $kitem => $vitem) {
                                                                        $spsub = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_sub where id_item = ? and find_in_set('hienthi',status) order by numb,id desc", array($vitem['id'])); ?>
                                                                        <li>
                                                                            <a class="has-child transition" title="<?= $vitem['name' . $lang] ?>" href="<?= $vitem[$sluglang] ?>"><?= $vitem['name' . $lang] ?></a>
                                                                            <?php if (!empty($spsub)) { ?>
                                                                                <ul>
                                                                                    <?php foreach ($spsub as $ksub => $vsub) { ?>
                                                                                        <li>
                                                                                            <a class="transition" title="<?= $vsub['name' . $lang] ?>" href="<?= $vsub[$sluglang] ?>"><?= $vsub['name' . $lang] ?></a>
                                                                                        </li>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                            <?php } ?>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php } ?>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
             <li>
                 <a class="<?php if ($com == 'san-pham') echo 'active'; ?> transition" href="san-pham" title="<?= sanpham ?>">Mẫu Sản Phẩm</a>
                 <?php if (count($proListMenu)) { ?>
                     <ul>
                         <?php foreach ($proListMenu as $klist => $vlist) {
                                $spcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                             <li>
                                 <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
                                 <?php if (!empty($spcat)) { ?>
                                     <ul>
                                         <?php foreach ($spcat as $kcat => $vcat) {
                                                $spitem = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_item where id_cat = ? and find_in_set('hienthi',status) order by numb,id desc", array($vcat['id'])); ?>
                                             <li>
                                                 <a class="has-child transition" title="<?= $vcat['name' . $lang] ?>" href="<?= $vcat[$sluglang] ?>"><?= $vcat['name' . $lang] ?></a>
                                                 <?php if (!empty($spitem)) { ?>
                                                     <ul>
                                                         <?php foreach ($spitem as $kitem => $vitem) {
                                                                $spsub = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_sub where id_item = ? and find_in_set('hienthi',status) order by numb,id desc", array($vitem['id'])); ?>
                                                             <li>
                                                                 <a class="has-child transition" title="<?= $vitem['name' . $lang] ?>" href="<?= $vitem[$sluglang] ?>"><?= $vitem['name' . $lang] ?></a>
                                                                 <?php if (!empty($spsub)) { ?>
                                                                     <ul>
                                                                         <?php foreach ($spsub as $ksub => $vsub) { ?>
                                                                             <li>
                                                                                 <a class="transition" title="<?= $vsub['name' . $lang] ?>" href="<?= $vsub[$sluglang] ?>"><?= $vsub['name' . $lang] ?></a>
                                                                             </li>
                                                                         <?php } ?>
                                                                     </ul>
                                                                 <?php } ?>
                                                             </li>
                                                         <?php } ?>
                                                     </ul>
                                                 <?php } ?>
                                             </li>
                                         <?php } ?>
                                     </ul>
                                 <?php } ?>
                             </li>
                         <?php } ?>
                     </ul>
                 <?php } ?>
             </li>
             <li>
                 <a class="has-child <?php if ($com == 'tin-tuc') echo 'active'; ?> transition" href="tin-tuc" title="<?= tintuc ?>"><?= tintuc ?></a>
                 <?php if (count($newsListMenu)) { ?>
                     <ul>
                         <?php foreach ($newsListMenu as $klist => $vlist) {
                                $ttcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                             <li>
                                 <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
                                 <?php if (!empty($ttcat)) { ?>
                                     <ul>
                                         <?php foreach ($ttcat as $kcat => $vcat) {
                                                $ttitem = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_item where id_cat = ? and find_in_set('hienthi',status) order by numb,id desc", array($vcat['id'])); ?>
                                             <li>
                                                 <a class="has-child transition" title="<?= $vcat['name' . $lang] ?>" href="<?= $vcat[$sluglang] ?>"><?= $vcat['name' . $lang] ?></a>
                                                 <?php if (!empty($ttitem)) { ?>
                                                     <ul>
                                                         <?php foreach ($ttitem as $kitem => $vitem) {
                                                                $ttsub = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_sub where id_item = ? and find_in_set('hienthi',status) order by numb,id desc", array($vitem['id'])); ?>
                                                             <li>
                                                                 <a class="has-child transition" title="<?= $vitem['name' . $lang] ?>" href="<?= $vitem[$sluglang] ?>"><?= $vitem['name' . $lang] ?></a>
                                                                 <?php if (!empty($ttsub)) { ?>
                                                                     <ul>
                                                                         <?php foreach ($ttsub as $ksub => $vsub) { ?>
                                                                             <li>
                                                                                 <a class="transition" title="<?= $vsub['name' . $lang] ?>" href="<?= $vsub[$sluglang] ?>"><?= $vsub['name' . $lang] ?></a>
                                                                             </li>
                                                                         <?php } ?>
                                                                     </ul>
                                                                 <?php } ?>
                                                             </li>
                                                         <?php } ?>
                                                     </ul>
                                                 <?php } ?>
                                             </li>
                                         <?php } ?>
                                     </ul>
                                 <?php } ?>
                             </li>
                         <?php } ?>
                     </ul>
                 <?php } ?>
             </li>
             <li><a class="<?php if ($com == 'lien-he') echo 'active'; ?> transition" href="lien-he" title="<?= lienhe ?>"><?= lienhe ?></a></li>
         </ul>
     </nav>
 </div>