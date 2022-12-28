import './bootstrap';

// window.Echo.channel('notifications')
//     .listen('.UserSessionChanged', (e) => {
//         const notificationElement = document.getElementById('notification');

//         notificationElement.innerText = e.message;

//         console.log("App.js channel2");

//         notificationElement.classList.remove('invisible');
//         notificationElement.classList.remove('alert-success');
//         notificationElement.classList.remove('alert-danger');

//         notificationElement.classList.add('alert-' + e.type);
//     });

// var channel = Echo.channel('notifications');
// channel.listen('.UserSessionChanged', function(data) {
//   alert(JSON.stringify(data));
//   console.log("App.js channel2");
// });


// window.Echo.channel('firstc')
//     .listen('.firste', (e) => {
//         const notificationElement = document.getElementById('notification');

//         notificationElement.innerText = e.message;

//         console.log("App.js channel2");

//         notificationElement.classList.remove('invisible');
//         notificationElement.classList.remove('alert-success');
//         notificationElement.classList.remove('alert-danger');

//         notificationElement.classList.add('alert-' + e.type);
//     });

window.Echo.channel('notifications')
    .listen('.App\\Events\\UserSessionChanged', (e) => {
        const notificationElement = document.getElementById('notification');

        notificationElement.innerText = e.message;

        console.log(e.message);

        notificationElement.classList.remove('invisible');
        notificationElement.classList.remove('alert-success');
        notificationElement.classList.remove('alert-danger');

        notificationElement.classList.add('alert-' + e.type);
    });