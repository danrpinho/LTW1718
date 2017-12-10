//let loginButton = document.querySelector('.loginform > .login');
let signUpButton = document.querySelector('.loginform > .register');

//if(loginButton) loginButton.addEventListener("click", login);
if(signUpButton) signUpButton.addEventListener("click", signUp);


function login() {
    console.log("login");
    let request = new XMLHttpRequest();
    let form = document.getElementsByClassName('loginform')[0];
    let username = document.querySelector('form input[name=username]').value;
    let password = document.querySelector('form input[name=password]').value;
    request.open('POST', 'action_login.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ type: 1, username: username, password: password }));
    location.href = "index.php"

}

function signUp() {
    console.log("signUp");
    location.href = "register.php"
    /*let request = new XMLHttpRequest();
    request.open('POST', 'signUp.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(encodeForAjax({ type: 0, username: '0', password: '0' }));*/
}