<section id="lists">
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
        <article>
            <header>
                <?php if (isset($list['title'])) { ?>
              <h3><?=$list['title']?></h3>
              <span class="datecreation">Creation Date: <?=date('Y-m-d', strtotime($list['creation']));?></span>
              <span class="datedue">Date Due: <?=date('Y-m-d', strtotime($list['datadue']));?></span>
          <?php } ?>
            </header>
        </article>
    <?php } ?>
</section>
