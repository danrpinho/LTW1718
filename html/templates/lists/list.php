<section id="list">
    <article>
        <header>
          <h3><?=$list['title']?></h3>
          <span class="datecreation">Creation Date: <?=date('Y-m-d', strtotime($list['creation']));?></span>
          <br>
          <span class="datedue">Date Due: <?=date('Y-m-d', strtotime($list['datadue']));?></span>
        </header>
        <table>
            <tr>
                <td>descr</td>
                <td>solved</td>
                <td>assignee</td>
            </tr>
            <?php foreach($items as $item) { ?>
                <tr>
                    <td><?=$item['descr']?></td>
                    <td><?=$item['solved']?></td>
                    <td><?=$item['assignee']?></td>
                </tr>
            <?php } ?>
        </table>
    </article>
</section>
