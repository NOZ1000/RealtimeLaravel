import './bootstrap';

console.log('hello from api.js');

window.axios.get('/api/users').then((response) => {
    const usersElement = document.getElementById('users');

    let users = response.data;
    console.log(users);

    users.forEach((user, index) => {
        let element = document.createElement('li');

        element.setAttribute('id', user.id);
        element.innerText = user.name;

        usersElement.appendChild(element);

    });
});