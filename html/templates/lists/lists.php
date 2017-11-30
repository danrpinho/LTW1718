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
				  <h5 id="descr"><?=$list['descr']?><h5>
				  <p id="datecreation">Creation Date: <?=date('Y-m-d', strtotime($list['creation']));?></p>
				  <p id="datedue">Date Due: <?=date('Y-m-d', strtotime($list['datadue']));?></p>
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
