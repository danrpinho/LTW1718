<section class="content">
    <article id="list">
        <header>
          <h3 class="title"><?=$list['title']?></h3>
          <h3 class="back"><a href="index.php">Back</a></h3>
          <p class="datecreation">Created on <?=date('F d, Y', strtotime($list['creation']));?></p>
		      <p class="descr"><?=$list['descr']?></p>
        </header>
        <section id="listitems">
            <span class="tableheader">
                <p class="descr">Description</p>
                <p>Assigneed</p>
                <p>Date Due</p>
                <p>Solved</p>
            </span>
            <?php foreach($items as $item) { ?>
                <span class="tableitem">
                    <p class="descr"><?=$item['descr']?></p>
                    <p><?=$item['assignee']?></p>
					<p><?=$item['datedue']?></p>
                    <input type="checkbox" name="solved" <?php if($item['solved']) { ?>checked<?php } ?> onchange="checkItemSolved(this, <?=$item['id']?>, <?=$item['listID']?>)"></td>
                    <span class="itemid"><?=$item['id']?></span>
                </span>
            <?php } ?>
        </section>
        <?php if($_SESSION['username'] == $list['username']) {?>
        <form id= "addlist" action="#" method="get">
            <span class="newitem">
                <input type="text" name="description"placeholder="description" required>
                <input type="text" name="assigneed" placeholder="assigneed" required>
                <input type="date" name="datedue" placeholder="datedue" required>
                <input type="hidden" name="id" value="<?=$list['listID']?>">
                <input type="submit" value="Add">
            </span>
        </form>
      <?php }?>
    </article>
</section>
