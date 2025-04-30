import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,

});


var userId = document.querySelector('meta[name="user_id"]').getAttribute('content');

console.log('chat.'+userId);

window.Echo.private('chat.'+userId)  //chat.2
.listen('NewMessage', (e) => {
    console.log(e); 
    document.getElementById('message').innerHTML += `<p>${e.message}</p>`;
});

window.Echo.join('online').here(users =>(
    console.log(users)
)).joining(user => (
    console.log(user)
)).leaving(user => (
    console.log(user)
));

