<section class="content">
    <article id="list">
        <header>
          <h3 class="title"><?=$list['title']?></h3>
          <h3 class="back"><a href="index.php">Back</a></h3>
          <p class="datecreation">Created on <?=date('F d, Y', strtotime($list['creation']));?></p>
		      <p class="descr"><?=$list['descr']?></p>
        </header>
        <table id= "tablelist">
            <thead>
              <tr>
                <th><p>Description</p></th><th><p>Assigneed</p></th><th><p>Date Due</p></th><th><p>Solved</p></th>
              </tr>
            </thead>
            <?php foreach($items as $item) { ?>
                <tr>
                    <td><p><?=$item['descr']?></p></td>
                    <td><p><?=$item['assignee']?></p></td>
					          <td><p><?=$item['datedue']?></p></td>
                    <td><input type="checkbox" name="solved" value=<?=$item['solved']?>></td>
                    <span class="itemid"><?=$item['id']?></span>
                </tr>
            <?php } ?>
        </table>
        <?php if($_SESSION['username'] == $list['username']) {?>
        <form id= "addlist" action="#" method="get">
            <input type="text" name="description" value="Description">
            <input type="text" name="assigneed" value="Assigneed">
            <input type="date" name="datedue" value"Date due">
            <input type="hidden" name="id" value="<?=$list['listID']?>">
            <input type="submit" value="Add">
        </form>
      <?php }?>
    </article>
</section>
