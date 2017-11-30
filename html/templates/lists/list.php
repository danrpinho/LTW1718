<section id="content">
    <article id="list">
        <header>
          <h3 id="title"><?=$list['title']?></h3>
          <h3 id="back"><a href="index.php">Back</a></h3>
		  <h5 id="descr"><?=$list['descr']?></h5>
          <p class="datecreation">Creation Date: <?=date('Y-m-d', strtotime($list['creation']));?></p>
          <p class="datedue">Date Due: <?=date('Y-m-d', strtotime($list['datadue']));?></p>
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
