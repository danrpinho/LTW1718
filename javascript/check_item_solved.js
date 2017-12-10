function checkItemSolved(element, itemid, listID) {

    let solved;
      if(element.checked) {
        solved = 1;
      } else {
        solved = 0;
      }
    let request = new XMLHttpRequest();
	
    request.open('POST', 'api_check_item.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({itemid: itemid, listid: listID, solved: solved}));
    event.preventDefault();

}
