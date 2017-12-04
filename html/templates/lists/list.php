<section class="content">
    <article id="list">
        <header>
          <h3 class="title"><?=$list['title']?></h3>
          <h3 class="back"><a href="index.php">Back</a></h3>
          <p class="datecreation">Created on <?=date('F d, Y', strtotime($list['creation']));?></p>
		  <p class="descr"><?=$list['descr']?></p>
        </header>
        <table>
            <thead>
              <tr>
                <th><p>Description</p></th><th><p>Assigneed</p></th><th><p>Data Due</p></th><th><p>Solved</p></th>
              </tr>
            </thead>
            <?php foreach($items as $item) { ?>
                <tr>
                    <td><p><?=$item['descr']?></p></td>
                    <td><p><?=$item['assignee']?></p></td>
					<td><p><?=$item['datadue']?></p></td>
                    <td><input type="checkbox" name="solved" value=<?=$item['solved']?>></td>
                </tr>
            <?php } ?>
        </table>
    </article>
</section>
