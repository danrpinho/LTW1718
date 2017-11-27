<section id="content">
    <h3>Your To-Do Lists</h3>
    <h3>Create New List</h3>
    <section id="Lists">
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
          <?php foreach($lists as $list) { ?>
          <article>
            <header>
              <h1><a href="list_item.php?id=<?=$list['listID']?>"><?=$list['title']?></a></h1>
              <span class="datecreation">Creation Date: <?=date('Y-m-d', strtotime($list['creation']));?></span>
              <span class="datedue">Date Due: <?=date('Y-m-d', strtotime($list['datadue']));?></span>
            </header>
          </article>
        <?php } ?>
    <?php } else { ?>
        <article>
            <header>
                <h1>Example</h1>
                <span class="datecreation">2017-11-27</span>
                <span class="datedue">2017-12-03</span>
            </header>
        </article>
    <?php } ?>
    </section>
</section>
