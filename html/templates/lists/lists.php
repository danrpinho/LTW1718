<section class="content">
    <article id="lists">
	    <header>
		    <h3 id= "name">Your To-Do Lists</h3>
		    <h3 id= "create"><a href="create_new_list.php">Create New List</a></h3>
        <select id="category">
          <option value="All">All</option>
          <option value="Items">Items</option>
          <?php foreach($categories as $categoryarray) { foreach($categoryarray as $category) { echo $category ?>
          <option value="<?=$category?>"><?=$category?></option>
        <?php } } ?>
      </select>
	    </header>
        <section id="listLists">
        <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
            <?php foreach($lists as $list) { ?>
            <article>
                <span class="info">
                    <h4 class="title"><a href="consult_list.php?id=<?=$list['listID']?>"><?=$list['title']?></a></h4>
                    <p class="datecreation">Created on <?=date('F d, Y', strtotime($list['creation']));?> by <?=$list['username']?></p>
                    <p class="category">Category: <?=$list['category']?></p>
                    <p class="descr"><?=$list['descrList']?></p>
                </span>
        		<form action="action_remove_list.php?id=<?=$list['listID']?>" method="post">
        			<input type="submit" value="Remove">
        		</form>
            </article>
          <?php }  ?>
        <?php foreach($listsAssociated as $list) { ?>
            <article>
                <span class="info">
                    <h4 class="title"><a href="consult_list.php?id=<?=$list['listID']?>"><?=$list['title']?></a></h4>
                    <p class="datecreation">Created on <?=date('F d, Y', strtotime($list['creation']));?> by <?=$list['username']?></span>
                    <p class="category">Category: <?=$list['category']?></p>
                    <p class="descr"><?=$list['descrList']?></p>
                </span>
            </article>
        <?php } } ?>
        </section>
    </article>
</section>
