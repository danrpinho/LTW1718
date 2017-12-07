<aside class="sidebar">
    <?php if(count($expiredLists) > 0){ ?>
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
    <?php }?>
    <section id="due">
        <?php if(count($expiringLists) > 0){?>
            <h3>These items are almost due!</h3>
            <?php foreach($expiringLists as $expiringlist) { ?>
                <ul>
                    <li>
                        <p class="itemdescr"><a href="consult_list.phpclass=<?=$expiringlist['listID']?>"><?=$expiringlist['descr']?></a></p>
                        <p class="datedue"><?=$expiringlist['datedue']?></p>
                    </li>
                </ul>
            <?php } ?>
        <?php } else echo("<h3>You don't have any items due in the next week!</h3>")?>
    </section>

</aside>
