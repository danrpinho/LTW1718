let entityMap = {
  "&": "&amp;",
  "<": "&lt;",
  ">": "&gt;",
  '"': '&quot;',
  "'": '&#39;',
  "/": '&#x2F;'
};

function escapeHtml(string) {
  return String(string).replace(/[&<>"'\/]/g, function (s) {
      return entityMap[s];
  });
}

let form = document.getElementById('addlist');
let table = document.getElementById('tablelist');
let select = document.getElementById('category');
if(form) {
  form.addEventListener('submit', submitItem);
}

if(select) {
  select.addEventListener('change', changeCat);
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function submitItem(event) {

  let description = /*escapeHtml(*/document.querySelector('input[name=description]').value;//);
  let assigneed = /*escapeHtml(*/document.querySelector('input[name=assignee]').value;//);
  let datedue = /*escapeHtml(*/document.querySelector('input[name=datedue]').value;//);
  let listid = /*escapeHtml(*/document.querySelector('input[name=id]').value;//);
  let itemid = document.querySelector('#list #listitems .tableitem') != null ? /*escapeHtml(*/document.querySelector('#list #listitems .tableitem:last-of-type span.itemid').textContent/*)*/ : 0;
  let request = new XMLHttpRequest();
  request.addEventListener('load', receiveItems);
  request.open('POST', 'api_add_item.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(encodeForAjax({itemid: itemid, listid: listid, description: description, assigneed: assigneed, datedue: datedue}));
  event.preventDefault();

}

function changeCat(event) {
  let category =  /*escapeHtml(*/select.options[select.selectedIndex].value;//);
  let request = new XMLHttpRequest();
  request.addEventListener('load', receiveCat);
  request.open('POST', 'api_change_category.php', true);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send(encodeForAjax({category: category}));
  event.preventDefault();
}

function receiveCat(data) {
  let categories = JSON.parse(this.responseText);
  let section = document.querySelector('#listLists');
  let lists = document.querySelector('#lists');
  let name = document.querySelector('header #user .username').textContent;

  section.remove();
  let newsection = document.createElement('section');
  newsection.setAttribute("id", "listLists");
  let monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

  if(typeof categories != 'undefined') {
    for (let i = 0; i < categories.length; i++) {
      let category = document.createElement('article');
      let date = new Date(categories[i].creation);
      if(name != categories[i].username) {
        category.innerHTML = '<span class = "info"><h4 class="title"><a href="consult_list.php?id=' + categories[i].listID + '">' + categories[i].title + '</a></h4>' +
                             '<p class="datecreation">Created on ' + monthNames[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear() + ' by ' + categories[i].username + '</p>' +
                             '<p class="category">Category: ' + categories[i].category + '</p>' +
                             '<p class="descr">' + categories[i].descrList + '</p></span></article>';
      } else {
        category.innerHTML = '<article><span class = "info"><h4 class="title"><a href="consult_list.php?id=' + categories[i].listID + '">' + categories[i].title + '</a></h4>' +
                             '<p class="datecreation">Created on ' + monthNames[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear() + ' by ' + categories[i].username + '</p>' +
                             '<p class="category">Category: ' + categories[i].category + '</p>' +
                             '<p class="descr">' + categories[i].descrList + '</p></span></article>' +
                             '<form action="action_remove_list.php?id=' + categories[i].listID + '" method="post">' +
                     				 '<input type="submit" value="Remove"></form>';
      }
      newsection.append(category);
    }
  }
  lists.append(newsection);
}

function receiveItems(data) {
  let section = document.querySelector('#listitems');
  let arrayResponse = JSON.parse(this.responseText);
  let items = arrayResponse[1];
  let ret = arrayResponse[0];
  let date = new Date();
  let sectionDue = document.querySelector('#due');
  let sectionOverDue = document.querySelector('#overdue');

  date.setDate(date.getDate() + 7);
  let today = new Date();
  for (let i = 0; i < items.length; i++) {
    let item = document.createElement('span');
    item.classList.add('tableitem');
    item.innerHTML = '<p class="descr">' + items[i].descrItem + '</p>' +
                     '<p class="assignee">' + items[i].assignee + '</p>' +
                     '<p class="due">' + items[i].datedue + '</p>' +
                     '<input type="checkbox" name="solved" onchange="checkItemSolved(this, '+ items[i].id +', ' + items[i].listID+ ', ' + items[i].datedue + ')">' +
                     '<span class="itemid">' + items[i].id + '</span>';

    section.insertBefore(item, form);
    let datedue = new Date(items[i].datedue);

    let name = document.querySelector('header #user .username').textContent;
    if(datedue <= date && items[i].assignee === name && datedue >= today) {
      let h3 = document.querySelector('#due .dueText');
      h3.remove();
      let newh3 = document.createElement('h3');
      newh3.setAttribute("class", "dueText");
      let t = document.createTextNode("These items are almost due!");
      newh3.append(t);
      sectionDue.prepend(newh3);


      let due = document.createElement('ul');
      due.setAttribute("class", "itemsSidebar itemsSidebarDue");
      due.innerHTML = '<li><p class="itemdescr"><a href="consult_list.php?id=' + items[i].listID + '">' + items[i].descrItem + '</a></p>' +
                      '<p class="datedue">' + items[i].datedue + '</p>' +
                      '<p class="itemid">' + items[i].id + '</p>' +
                      '<p class="listid">'+ items[i].listID + '</p></li>';
      sectionDue.append(due);
    } else {
      if(!sectionOverDue) {
        console.log("HERE");
        let newh3 = document.createElement('h3');
        newh3.setAttribute("class", "overdueText");
        let t = document.createTextNode("These items are overdue!");
        newh3.append(t);
        let newsectionOverDue = document.createElement('section');
        newsectionOverDue.setAttribute("id", "overdue");
        newsectionOverDue.prepend(newh3);
        let due = document.createElement('ul');
        due.setAttribute("class", "itemsSidebar itemsSidebarDue");
        due.innerHTML = '<li><p class="itemdescr"><a href="consult_list.php?id=' + items[i].listID + '">' + items[i].descrItem + '</a></p>' +
                        '<p class="datedue">' + items[i].datedue + '</p>' +
                        '<p class="itemid">' + items[i].id + '</p>' +
                        '<p class="listid">'+ items[i].listID + '</p></li>';
        newsectionOverDue.append(due);
        let sidebar = document.querySelector('.sidebar');
        sidebar.insertBefore(newsectionOverDue,sectionDue);

      } else {
        console.log("HERE!!!!");
        let due = document.createElement('ul');
        due.setAttribute("class", "itemsSidebar itemsSidebarDue");
        due.innerHTML = '<li><p class="itemdescr"><a href="consult_list.php?id=' + items[i].listID + '">' + items[i].descrItem + '</a></p>' +
                        '<p class="datedue">' + items[i].datedue + '</p>' +
                        '<p class="itemid">' + items[i].id + '</p>' +
                        '<p class="listid">'+ items[i].listID + '</p></li>';
        sectionOverDue.append(due);
      }
    }
  }
  if(ret === 1){
	  document.getElementById("assignee").value="";
	  alert('The assignee you chose is not a valid user');
  }
  else if(ret === 2){
	  document.getElementById("description").value="";
	  alert('The description you chose has already been used to describe a different item');
  }
}

/*function changeInputAssignee(val){
	var autoCompleteResult = ma
}*/