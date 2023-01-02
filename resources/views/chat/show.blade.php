@extends('layouts.app')

@push('styles')
    <style type="text/css">
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
                                        <li>Test1 sdsdf</li>
                                        <li>Test2 sdsdd</li>
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

    Echo.join('chat')
        .here((users) => {
            users.forEach((user, index) => {
            let element = document.createElement('li');

            element.setAttribute('id', user.id);
            element.innerText = user.name;

            usersElement.appendChild(element);

        });
        })
        .joining((user) => {
            let element = document.createElement('li');

            element.setAttribute('id', user.id);
            element.innerText = user.name;

            usersElement.appendChild(element);
        })
        .leaving((user) => {
            const element = document.getElementById(user.id);

            element.parentNode.removeChild(element);
        })
        .listen();
</script>
@endpush

@stack('scripts')
