<aside class="sidebar">
  <form class="search" action="#" method="get">
    <label>Lists:
      <input id="listsearch" name="listsearch" type="text" autocomplete="off">
    </label>
  </form>
  <ul id="suggestions">
  </ul>
    <?php if(count($expiredItems) > 0){ ?>
        <section id="overdue">
            <h3 class="overdueText">These items are overdue!</h3>
            <?php foreach($expiredItems as $expiredItem) { ?>
                <ul class="itemsSidebar itemsSidebarOverdue">
                    <li>
                        <p class="itemdescr"><a href="consult_list.php?id=<?=$expiredItem['listID']?>"><?=$expiredItem['descrItem']?></a></p>
                        <p class="datedue"><?=$expiredItem['datedue']?></p>
                        <p class="itemid"><?=$expiredItem['id']?></p>
                        <p class="listid"><?=$expiredItem['listID']?></p>
                    </li>
                </ul>
            <?php } ?>

        </section>
    <?php }?>
    <section id="due">
        <?php if(count($expiringItems) > 0){?>
            <h3 class="dueText">These items are almost due!</h3>
            <?php foreach($expiringItems as $expiringItem) { ?>
                <ul class="itemsSidebar itemsSidebarDue">
                    <li>
                        <p class="itemdescr"><a href="consult_list.php?id=<?=$expiringItem['listID']?>"><?=$expiringItem['descrItem']?></a></p>
                        <p class="datedue"><?=$expiringItem['datedue']?></p>
                        <p class="itemid"><?=$expiringItem['id']?></p>
                        <p class="listid"><?=$expiringItem['listID']?></p>
                    </li>
                </ul>
            <?php } ?>
        <?php } else { ?>
            <h3 class="dueText">You don't have any items due in the next week!</h3>
        <?php } ?>
    </section>

</aside>
