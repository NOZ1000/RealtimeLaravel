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
@endpush

@stack('scripts')



{{-- @push('scripts')
<script type="module" src="http://[::1]:5173/resources/js/api.js"></script>    
@endpush
@stack('scripts') --}}