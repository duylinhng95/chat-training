@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <ul id="listMessage">
                            @foreach($messages as $message)
                            <li>{{$message->content}}</li>
                            @endforeach
                        </ul>
                        <form>
                            <input type="text" id="messageContent">
                            <button type="button" id="btnChat">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{mix('js/chat.js')}}"></script>
    <script>
	    let btn = $("#btnChat")
	    btn.on('submit', function() {
		    console.log('abc');
	    })
    </script>
@endpush
