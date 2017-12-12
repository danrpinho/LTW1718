let itemsIDSidebar = document.querySelectorAll('.itemsSidebar li .itemid');
let listIDSidebar = document.querySelectorAll('.itemsSidebar li .listid');
let itemsSidebar = document.querySelectorAll('.itemsSidebar');
let due = document.querySelector('#due');
let overdue = document.querySelector('#overdue');
function checkItemSolved(element, itemid, listID, descr, datedue) {

    let solved;
      if(element.checked) {
        solved = 1;
        for(let i = 0; i < itemsIDSidebar.length; i++) {
          let iid = parseInt(itemsIDSidebar[i].textContent, 10);
          let lid = parseInt(listIDSidebar[i].textContent, 10);
          if(itemid == iid && listID == lid) {
            itemsSidebar[i].remove();
            let itemsSidebarDue = document.querySelectorAll('.itemsSidebarDue');
            let itemsSidebarOverdue = document.querySelectorAll('.itemsSidebarOverdue');

            if(itemsSidebarDue.length == 0) {
              console.log("Change Due Text");
              let h3 = document.querySelector('#due .dueText');
              h3.remove();
              let newH3 = document.createElement('h3');
              newH3.classList.add('dueText');
              let t = document.createTextNode("You don't have any items due in the next week!");
              newH3.append(t);
              due.append(newH3);
            }
            if(itemsSidebarOverdue.length == 0) {
              console.log("Change Overdue Text");
              let h3 = document.querySelector('#overdue .overdueText');
              if(h3)
                overdue.remove();
            }
          }
        }
      } else {
        solved = 0;
        console.log(datedue);

        let date = new Date(datedue);
        let today = new Date();
        console.log(date);
        console.log(today);
        if(date < today) {
          let itemsSidebarOverdue = document.querySelectorAll('.itemsSidebarOverdue');
          if(itemsSidebarOverdue.length == 0) {
              let sidebar = document.querySelector('.sidebar');
              let newoverdue = document.createElement('section');
              newoverdue.setAttribute("id", "overdue");
              let newH3 = document.createElement('h3');
              newH3.classList.add('dueText');
              let t = document.createTextNode("These items are overdue!");
              newH3.append(t);
              newoverdue.append(newH3);
              sidebar.insertBefore(newoverdue, due);
              let overdueitem = document.createElement('ul');
              let month = date.getMonth() + 1;
              overdueitem.setAttribute("class", "itemsSidebar itemsSidebarOverdue");
              overdueitem.innerHTML = '<li><p class="itemdescr"><a href="consult_list.php?id=' + listID + '">' + descr + '</a></p>' +
                              '<p class="datedue">' + date.getFullYear() + '-' + month + '-' + date.getDate() + '</p>' +
                              '<p class="itemid">' + itemid + '</p>' +
                              '<p class="listid">' + listID + '</p></li>';
              newoverdue.append(overdueitem);

          } else {
            let overdueitem = document.createElement('ul');
            overdueitem.setAttribute("class", "itemsSidebar itemsSidebarOverdue");
            let month = date.getMonth() + 1;
            overdueitem.innerHTML = '<li><p class="itemdescr"><a href="consult_list.php?id=' + listID + '">' + descr + '</a></p>' +
                            '<p class="datedue">' + date.getFullYear() + '-' + month + '-' + date.getDate() + '</p>' +
                            '<p class="itemid">' + itemid + '</p>' +
                            '<p class="listid">' + listID + '</p></li>';
            overdue.append(overdueitem);
          }
        } else {
          let itemsSidebarDue = document.querySelectorAll('.itemsSidebarDue');
          if(itemsSidebarDue.length == 0) {
            let h3 = document.querySelector('#due .dueText');
            h3.remove();
            let newH3 = document.createElement('h3');
            newH3.classList.add('dueText');
            let t = document.createTextNode("These items are almost due!");
            newH3.append(t);
            due.append(newH3);
          }
            let dueitem = document.createElement('ul');
            dueitem.setAttribute("class", "itemsSidebar itemsSidebarDue");
            let month = date.getMonth() + 1;
            dueitem.innerHTML = '<li><p class="itemdescr"><a href="consult_list.php?id=' + listID + '">' + descr + '</a></p>' +
                                '<p class="datedue">' + date.getFullYear() + '-' + month + '-' + date.getDate() + '</p>' +
                                '<p class="itemid">' + itemid + '</p>' +
                                '<p class="listid">' + listID + '</p></li>';
            due.append(dueitem);

        }
      }

    let request = new XMLHttpRequest();

    request.open('POST', 'api_check_item.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({itemid: itemid, listid: listID, solved: solved}));
    event.preventDefault();

}
