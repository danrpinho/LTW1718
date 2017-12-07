function checkItemSolved(element, itemid, listID) {
    console.log("Item Solved");
    console.log(itemid);
    console.log(listID);
    let solved;
      if(element.checked) {
        solved = 1;
      } else {
        solved = 0;
      }
    console.log(element.checked);
    let request = new XMLHttpRequest();

    request.open('POST', 'api_check_item.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({itemid: itemid, listid: listID, solved: solved}));
    event.preventDefault();

}
