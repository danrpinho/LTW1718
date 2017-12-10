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
  let assigneed = document.querySelector('input[name=assignee]').value;
  let datedue = document.querySelector('input[name=datedue]').value;
  let listid = document.querySelector('input[name=id]').value;
  let itemid = document.querySelector('#list #listitems .tableitem') != null ? document.querySelector('#list #listitems .tableitem:last-of-type span.itemid').textContent : -1;
  let request = new XMLHttpRequest();
  request.addEventListener('load', receiveItems);
  request.open('POST', 'api_add_item.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(encodeForAjax({itemid: itemid, listid: listid, description: description, assigneed: assigneed, datedue: datedue}));
  event.preventDefault();

}

function receiveItems(data) {
  let section = document.querySelector('#listitems');
  let arrayResponse = JSON.parse(this.responseText);
  let items = arrayResponse[1];
  let ret = arrayResponse[0];
  let date = new Date();
  let sectionDue = document.querySelector('#due');

  date.setDate(date.getDate() + 7);
  let today = new Date();
  for (let i = 0; i < items.length; i++) {
    let item = document.createElement('span');
    item.classList.add('tableitem');
    item.innerHTML = '<p class="descr">' + items[i].descr + '</p>' +
                     '<p class="assignee">' + items[i].assignee + '</p>' +
                     '<p class="due">' + items[i].datedue + '</p>' +
                     '<input type="checkbox" name="solved" onchange="checkItemSolved(this, '+ items[i].id +', ' + items[i].listID+ ')">' +
                     '<span class="itemid">' + items[i].id + '</span>';

    section.insertBefore(item, form);
    let datedue = new Date(items[i].datedue);
    let name = document.querySelector('header #user .username').textContent;
    if(datedue <= date && items[i].assignee === name) {
      let h3 = document.querySelector('#due .dueText');
      if(h3) {
        h3.remove();
        let newh3 = document.createElement('h3');
        let t = document.createTextNode("These items are almost due!");
        newh3.append(t);
        sectionDue.append(newh3);
      }

      let due = document.createElement('ul');
      due.innerHTML = '<li><p class="itemdescr"><a href="consolt_list.php?id=' + items[i].listID + '">' + items[i].descr + '</a></p>' +
                      '<p class="datedue">' + items[i].datedue + '</p></li>';
      sectionDue.append(due);
    }
  }
  if(ret === 1){
	  alert('The assignee you chose is not a valid user');
  }
}
