<aside class="sidebar">
    <section id="due">
        <h3>These items are almost due!</h3>
        <?php foreach($expiringLists as $expiringlist) { ?>
            <ul>
                <li>
                    <p class="itemdescr"><a href="consult_list.phpclass=<?=$expiringlist['listID']?>"><?=$expiringlist['descr']?></a></p>
                    <p class="datedue"><?=$expiringlist['datedue']?></p>
                </li>
            </ul>
        <?php } ?>
    </section>
    <section id="overdue">
        <h3>These items are overdue!</h3>
        <?php foreach($expiredLists as $expiredList) { ?>
            <ul>
                <li>
                    <p class="itemdescr"><a href="consult_list.php?id=<?=$expiredList['listID']?>"><?=$expiredList['descr']?></a></p>
                    <p class="datedue"><?=$expiredList['datedue']?></p>
                </li>
            </ul>
        <?php } ?>
    </section>
</aside>
