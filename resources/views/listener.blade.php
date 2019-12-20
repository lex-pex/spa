@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listen Broadcast</div>
                    <div id="app" class="card-body">
                        <div id="app">
                            <p> @{{ message }} </p>
                            {{--<p> <input v-model="message"> </p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection