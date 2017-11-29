<section id="content">
    <span id= "name">Your To-Do Lists</span>
    <span id= "create">Create New List</span>
    <section id="lists">
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
          <?php foreach($lists as $list) { ?>
          <article>
            <header>
              <h3><?=$list['title']?></h3>
              <h3><a href="consult_list.php?id=<?=$list['listID']?>">Read</a></h3>
              <span class="datecreation">Creation Date: <?=date('Y-m-d', strtotime($list['creation']));?></span>
              <span class="datedue">Date Due: <?=date('Y-m-d', strtotime($list['datadue']));?></span>
            </header>
          </article>
        <?php } ?>
    <?php } else { ?>
        <article>
            <header>
                <h3>Example</h3>
                <span class="datecreation">Creation Date: 2017-11-27</span>
                <br>
                <span class="datedue">Date Due: 2017-12-03</span>
            </header>
        </article>
    <?php } ?>
    </section>
</section>
