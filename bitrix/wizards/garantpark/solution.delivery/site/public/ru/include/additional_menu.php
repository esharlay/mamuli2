<? if (SITE_DIR == "/"): ?>
<dt><a <?if ($APPLICATION->GetCurPage() == SITE_DIR . 'menu/new/') echo 'class="active"'; ?> href='<? echo SITE_DIR ?>menu/new/'>�������</a></dt>
<dt><a <?if ($APPLICATION->GetCurPage() == SITE_DIR . 'menu/hits/') echo 'class="active"'; ?>href='<? echo SITE_DIR ?>menu/hits/'>����</a></dt>
<dt class="last"><a <?if ($APPLICATION->GetCurPage() == SITE_DIR . 'menu/recommends/') echo 'class="active"'; ?> href='<? echo SITE_DIR ?>menu/recommends/'>�������������</a></dt>
<? else: ?>
<dt><a <?if ($APPLICATION->GetCurPage() == SITE_DIR . 'menu/new.php') echo 'class="active"'; ?> href='<? echo SITE_DIR ?>menu/new.php'>�������</a></dt>
<dt><a <?if ($APPLICATION->GetCurPage() == SITE_DIR . 'menu/hits.php') echo 'class="active"'; ?>href='<? echo SITE_DIR ?>menu/hits.php'>����</a></dt>
<dt class="last"><a <?if ($APPLICATION->GetCurPage() == SITE_DIR . 'menu/recommends.php') echo 'class="active"'; ?> href='<? echo SITE_DIR ?>menu/recommends.php'>�������������</a></dt>
<?endif?>
