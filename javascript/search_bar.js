let text = document.getElementById("listsearch");
text.addEventListener("keyup", searchChanged);

// Handler for change event on text input
function searchChanged(event) {
  let text = event.target;

  let request = new XMLHttpRequest();
  request.addEventListener("load", searchReceived);
  request.open("get", "getsearch.php?name=" + text.value, true);
  request.send();
}

// Handler for ajax response received
function searchReceived() {
  let searches = JSON.parse(this.responseText);
  let list = document.getElementById("suggestions");
  list.innerHTML = ""; // Clean current countries

  // Add new suggestions
  for (search in searches) {
    let item = document.createElement("li");
    item.innerHTML = '<a href="consult_list.php?id=' + searches[search].listID + '">' + searches[search].title;
    list.appendChild(item);
  }
}
