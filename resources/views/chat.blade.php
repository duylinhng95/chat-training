@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @foreach($messages as $message)
                        <ul>
                            <li>{{$message}}</li>
                        </ul>
                        @endforeach
                        <form>
                            <input type="text">
                            <button>submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{mix('js/chat.js')}}"></script>
@endpush
