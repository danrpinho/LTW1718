let form = document.getElementById('addlist');
let table = document.getElementById('tablelist');
if(form) {
  form.addEventListener('submit', submitItem);
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function submitItem(event) {

  let description = document.querySelector('input[name=description]').value;
  let assigneed = document.querySelector('input[name=assigneed]').value;
  let datedue = document.querySelector('input[name=datedue]').value;
  let listid = document.querySelector('input[name=id]').value;
  let itemid = document.querySelector('#list #tablelist') != null ? document.querySelector('#list .itemid:last-of-type').textContent : -1;
  let request = new XMLHttpRequest();
  request.addEventListener('load', receiveItems);
  request.open('POST', 'api_add_item.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(encodeForAjax({itemid: itemid, listid: listid, description: description, assigneed: assigneed, datedue: datedue}));
  event.preventDefault();

}

function receiveItems(data) {
  let table = document.querySelector('#tablelist');
  let list = document.querySelector('#list');
  let items = JSON.parse(this.responseText);
  for (let i = 0; i < items.length; i++) {
    let item = document.createElement('tr');
    let span = document.createElement('span');
    span.innerHTML = items[i].id;
    span.classList.add('itemid');
    list.insertBefore(span, table);

    item.innerHTML = '<td><p>' + items[i].descr + '</p></td>' +
                     '<td><p>' + items[i].assignee + '</p></td>' +
                     '<td><p>' + items[i].datedue + '</p></td>' +
                     '<td><input type="checkbox" name="solved" value=' + items[i].solved + '></td>';

    table.append(item);
  }
}
