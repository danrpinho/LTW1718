<aside class="sidebar">
  <form class="search" action="#" method="get">
    <label>Country:
      <input id="listsearch" name="listsearch" type="text">
    </label>
  </form>
  <ul id="suggestions">
  </ul>
    <?php if(count($expiredItems) > 0){ ?>
        <section id="overdue">
            <h3>These items are overdue!</h3>
            <?php foreach($expiredItems as $expiredItem) { ?>
                <ul>
                    <li>
                        <p class="itemdescr"><a href="consult_list.php?id=<?=$expiredItem['listID']?>"><?=$expiredItem['descrItem']?></a></p>
                        <p class="datedue"><?=$expiredItem['datedue']?></p>
                    </li>
                </ul>
            <?php } ?>

        </section>
    <?php }?>
    <section id="due">
        <?php if(count($expiringItems) > 0){?>
            <h3>These items are almost due!</h3>
            <?php foreach($expiringItems as $expiringItem) { ?>
                <ul>
                    <li>
                        <p class="itemdescr"><a href="consult_list.php?id=<?=$expiringItem['listID']?>"><?=$expiringItem['descrItem']?></a></p>
                        <p class="datedue"><?=$expiringItem['datedue']?></p>
                    </li>
                </ul>
            <?php } ?>
        <?php } else { ?>
            <h3 class="dueText">You don't have any items due in the next week!</h3>
        <?php } ?>
    </section>

</aside>
