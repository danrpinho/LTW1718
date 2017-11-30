<section id="content">
    <section id="list">
        <article>
            <header>
              <h3><?=$list['title']?></h3>
              <h3><a href="index.php">Back</a></h3>
              <span class="datecreation">Creation Date: <?=date('Y-m-d', strtotime($list['creation']));?></span>
              <span class="datedue">Date Due: <?=date('Y-m-d', strtotime($list['datadue']));?></span>
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
</section>