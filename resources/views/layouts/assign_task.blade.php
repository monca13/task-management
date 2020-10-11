@extends('layouts.admin_dashboard')

@section('content')
    <div class="container">
        @if ($message = \Illuminate\Support\Facades\Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="col-lg-12 offset-6 form" style="margin: auto;">
            <h2>ASSIGN TASK</h2>
            <hr>
            <form method="post" action="{{url('task/assign').'/'.$task->id}}" id="add">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Task Number</label>
                    <input type="text" class="form-control" id="task_number" name="task_number" value="{{$task->task_number}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <select class="form-control" name="user" id="user" required>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->email}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn-lg">ASSIGN</button>
            </form>
        </div>
    </div>
@endsection


@section('stylesheets')
    <style>
        .form {
            padding: 100px 25px;
            background-color: #3a78b7c9;
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
        }

        button {
            color: #ffffff !important;
            border-radius: 0px !important;
        }

        input {
            font-weight: 700;
        }

        hr {
            border-color: #efefef;
        }

        h2 {
            font-weight: 800;
        }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection
