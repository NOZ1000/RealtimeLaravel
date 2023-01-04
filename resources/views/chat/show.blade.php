@extends('layouts.app')

@push('styles')
    <style type="text/css">
        #users > li {
            cursor: pointer;
        }
    </style>
@endpush

@stack('styles')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Chat</div>

                <div class="card-body">
                    <div class="row p-2">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-12 border rounded-lg p-23">
                                    <ul id="messages" class="list-unstyled overflow-auto" style="height: 45vh">
 
                                    </ul>
                                </div>
                                <form action="">
                                    <div class="row py-3">
                                        <div class="col-10">
                                            <input type="text" class="form-control" id="message">
                                        </div>
                                        <div class="col-2">
                                            <button id="send" type="submit" class="btn btn-primary btn-block">Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-2">
                            <p><strong>Online Now</strong></p>
                            <ul id="users" class="list-unstyled overflow-auto text-info" style="height: 45hv">

                            </ul>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module">
    import 'http://localhost:5173/resources/js/bootstrap';

    const usersElement = document.getElementById('users');
    const messagesElement = document.getElementById('messages');

    function greetUser(id) 
    {
        window.axios.post('/chat/greet/' + id);
        console.log("Greeting works");
    }

    Echo.join('chat')
        .here((users) => {
            users.forEach((user, index) => {
            let element = document.createElement('li');

            element.setAttribute('id', user.id);
            element.addEventListener('click', (e) => {
                window.axios.post('/chat/greet/' + user.id);
                
            });
            element.innerText = user.name;

            usersElement.appendChild(element);
            });
        })
        .joining((user) => {
            let element = document.createElement('li');

            element.setAttribute('id', user.id);


            element.addEventListener('click', (e) => {
                window.axios.post('/chat/greet/' + user.id);
                console.log("Greeting works");
            });

            element.innerText = user.name;

            usersElement.appendChild(element);
        })
        .leaving((user) => {
            const element = document.getElementById(user.id);

            element.parentNode.removeChild(element);
        })
        .listen('.App\\Events\\MessageSent', (e) => {
            let element = document.createElement('li');

            element.innerText = e.user.name + ': ' + e.message;

            messagesElement.appendChild(element);
        });

</script>

<script type="module">
    import 'http://localhost:5173/resources/js/bootstrap';
    const messageElement = document.getElementById('message');
    const sendElement = document.getElementById('send');


    sendElement.addEventListener('click', (e) => {
        e.preventDefault();


        window.axios.post('/chat/message', {
            message: messageElement.value,
        });

        messageElement.value = "";
    });

</script>

<script type="module">
    import 'http://localhost:5173/resources/js/bootstrap';

    Echo.private('chat.greet.{{ auth()->user()->id }}')
        .listen('.App\\Events\\GreetingSent', (e) => {
            const messagesElement = document.getElementById('messages');
            let element = document.createElement('li');

            element.innerText = e.message;
            element.classList.add('list-group-item-success');

            messagesElement.appendChild(element);
        });
</script>
@endpush

@stack('scripts')
