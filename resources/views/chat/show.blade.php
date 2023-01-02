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
                                <li>Test1</li>
                                <li>Test2</li>
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

</script>
@endpush

@stack('scripts')
