<section class="content">
    <article id="lists">
	    <header>
		    <h3 id= "name">Your To-Do Lists</h3>
		    <h3 id= "create"><a href="create_new_list.php">Create New List</a></h3>
	    </header>
        <section id="lists">
        <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
            <?php foreach($lists as $list) { ?>
            <article>
                <h4 class="title"><a href="consult_list.php?id=<?=$list['listID']?>"><?=$list['title']?></a></h4>
                <p class="datecreation">Created on <?=date('F d, Y', strtotime($list['creation']));?></span>
			          <p class="descr"><?=$list['descr']?></p>
				<form action="action_remove_list.php?id=<?=$list['listID']?>" method="post">
					<input type="submit" value="Remove">
				</form>
            </article>
          <?php } } ?>
        </section>
    </article>
</section>
