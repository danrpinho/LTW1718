<aside id="sidebar">
    <section id="due">
        <h3>These items are almost due!</h3>
        <?php foreach($expiringLists as $expiringlist) { ?>
            <ul>
                <li>
                    <h4 id="itemdescr"><a href="consult_list.php?id=<?=$expiringlist['listID']?>"><?=$expiringlist['descr']?></a></h4>
                    <h5 id="datadue"><?=$expiringlist['datadue']?></h5>
                </li>
            </ul>
        <?php } ?>
    </section>
</aside>
