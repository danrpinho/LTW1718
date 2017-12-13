<section class="content">
    <article id="list">
        <header>
          <h3 class="title"><?=$list['title']?></h3>
          <h3 class="back"><a href="index.php">Back</a></h3>
          <p class="datecreation">Created on <?=date('F d, Y', strtotime($list['creation']));?> by <?=$list['username']?></p>
		      <p class="descr"><?=$list['descrList']?></p>
        </header>
        <section id="listitems">
            <span class="tableheader">
                <p class="descr">Description</p>
                <p>Assignee</p>
                <p>Date Due</p>
                <p>Solved</p>
            </span>
            <?php foreach($items as $item) { ?>
                <span class="tableitem">
                    <p class="descr"><?=$item['descrItem']?></p>
                    <p class="assignee"><?=$item['assignee']?></p>
					          <p class="due"><?=$item['datedue']?></p>
                    <input type="checkbox" name="solved" <?php if($item['solved']) { ?>checked<?php } ?> <?php if($_SESSION['username'] === $item['assignee'] || $_SESSION['username'] === $list['username']) {?>onchange="checkItemSolved(this, '<?=$item['id']?>', '<?=$item['listID']?>', '<?=$item['descrItem']?>', '<?=$item['datedue']?>')"<?php }  else { ?>
							onclick="return false;" <?php } ?> >
                    <span class="itemid"><?=$item['id']?></span>
                </span>
            <?php } ?>
            <?php if($_SESSION['username'] == $list['username']) {?>
                <form id= "addlist" action="#" method="get">
                    <span class="newitem">
                        <input id="description" type="text" name="description" placeholder="description" autocomplete="off" required>

                        <datalist id="assigneesList">
                        <?php
                            foreach($usernames as $assigneeName){?>
							<option value="<?=$assigneeName['username']?>" >
							<?php }?>

						</datalist>
                        <input id="assignee" type="text" name="assignee" placeholder="assignee" list="assigneesList"  autocomplete="off" required>
                        <input type="date" name="datedue" placeholder="datedue" required>
                        <input type="hidden" name="id" value="<?=$list['listID']?>">
                        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
                        <input type="submit" value="Add">
                    </span>
                </form>
            <?php }?>
        </section>

    </article>
</section>
