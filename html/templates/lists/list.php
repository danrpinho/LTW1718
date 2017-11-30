<section id="content">
    <article id="list">
        <header>
          <h3 id="title"><?=$list['title']?></h3>
          <h3 id="back"><a href="index.php">Back</a></h3>
          <p class="datecreation">Creation Date: <?=date('Y-m-d', strtotime($list['creation']));?></p>
		  <p id="descr"><?=$list['descr']?></p>
        </header>
        <table>
            <thead>
              <tr>
                <th>Description</th><th>Assigneed</th><th>Solved</th>
              </tr>
            </thead>
            <?php foreach($items as $item) { ?>
                <tr>
                    <td><?=$item['descr']?></td>
                    <td><?=$item['assignee']?></td>
                    <td><input type="checkbox" name="solved" value=<?=$item['solved']?>></td>
                </tr>
            <?php } ?>
        </table>
	</article>
</section>
