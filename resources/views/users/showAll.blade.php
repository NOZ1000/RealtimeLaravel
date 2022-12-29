@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <ul id="users">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="module">
    import 'http://localhost:5173/resources/js/bootstrap';

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
</script>

<script type="module">
    import 'http://localhost:5173/resources/js/bootstrap';

    window.Echo.channel('users')
        .listen('.App\\Events\\UserCreated' , (e) => {
            const usersElement = document.getElementById('users');
            let element = document.createElement('li');

            console.log("EEEEEEEEEEE", e.user.id);
            element.setAttribute('id', e.user.id);
            element.innerText = e.user.name;

            usersElement.appendChild(element);
        })
        .listen('.App\\Events\\UserUpdated' , (e) => {
            const element = document.getElementById(e.user.id);

            element.innerText = e.user.name;

        })
        .listen('.App\\Events\\UserDeleted' , (e) => {
            const element = document.getElementById(e.user.id);

            element.parentNode.removeChild(element);
        });
</script>

@endpush

@stack('scripts')



{{-- @push('scripts')
<script type="module" src="http://[::1]:5173/resources/js/api.js"></script>    
@endpush
@stack('scripts') --}}