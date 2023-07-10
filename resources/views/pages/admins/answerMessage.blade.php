@extends('layouts.admin')
@section('title')
    Flex Shop - Answer message {{$data['message']->message_id}}
@endsection
@section('description')
    Answer message
@endsection
@section('content')
    <div id="content">
    @include('fixed.admins.navbar')
    <div class="section">
        <div class="container m-5">
            <div class="mb-3">
                <h1>Message details</h1>
            </div>
            <div>
                <h5 id="messageId" class="my-3">Message ID: {{$data['message']->message_id}}</h5>
                <h5 id="answerName" class="my-3">Name: {{$data['message']->name}}</h5>
                <h5 id="answerEmail" class="my-3">Email: {{$data['message']->email}}</h5>
                <div class="d-flex flex-row my-3">
                    <div class="mr-3">
                        <h5>Message: </h5>
                    </div>
                    <div class="margin-left-20">
                        <h5 id="answerMessage">{{$data['message']->text}}</h5>
                    </div>
                </div>
                <form action="">
                    <div class="d-flex flex-row">
                        <div class="mr-3">
                            <h5>Answer: </h5>
                        </div>
                        <div class="margin-left-20">
                            <textarea cols="70" rows="3" class="rounded border-info" id="answer" placeholder="Type here..."></textarea>
                            <p class="text-danger hidden" id="textError"></p>
                        </div>
                    </div>
                    <br/>
                    <div>
                        <button class="btn btn-info " type="button" id="sendAnswer">Send answer</button>
                        <p id="status" class="my-2"></p>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection
