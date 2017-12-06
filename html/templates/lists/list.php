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
                <tr class="tablerow">
                    <td><p><?=$item['descr']?></p></td>
                    <td><p><?=$item['assignee']?></p></td>
					          <td><p><?=$item['datedue']?></p></td>
                    <td class="commentid"><?=$item['id']?></span>
                    <td><input type="checkbox" name="solved" value=<?=$item['solved']?>></td>
                </tr>
            <?php } ?>
        </table>
        <form id= "addlist" action="#" method="get">
            <label>Description: <input type="text" name="description"></label>
            <label>Assigneed: <input type="text" name="assigneed"></label>
            <label>Date due: <input type="date" name="datedue"></label>
            <input type="hidden" name="id" value="<?=$list['listID']?>">
            <input type="submit" value="Add">
        </form>
    </article>
</section>
