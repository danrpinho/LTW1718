<aside id="sidebar">
    <section id="due">
        <h3>These items are almost due!</h3>
        <?php foreach($expiringLists as $list) { ?>
            <ul>
                <li>
                    <h4><a href="consult_list.php?id=<?=$list['listID']?>"><?=$list['title']?></a></h4>
                    <h5><?=$list['datadue']?></h5>
                </li>
            </ul>
        <?php } ?>
    </section>
</aside>
