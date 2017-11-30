<section id="content">
	<header>
		<h3 id= "name">Your To-Do Lists</h3>
		<h3 id= "create"><a href="create_new_list.php">Create New List</a></h3>
	</header>
    <section id="lists">
    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
          <?php foreach($lists as $list) { ?>
          <article>
            <header>
              <h3 id="title"><a href="consult_list.php?id=<?=$list['listID']?>"><?=$list['title']?></a></h3>
			  <h5 id="descr"><?=$list['descr']?></h5>
              <p class="datecreation">Creation Date: <?=date('Y-m-d', strtotime($list['creation']));?></span>
            </header>
          </article>
        <?php } ?>
    <?php } else { ?>
        <article>
            <header>
                <h3 id="title">Example</h3>
                <p class="datecreation">Creation Date: 2017-11-27</p>
            </header>
        </article>
    <?php } ?>
    </section>
</section>
