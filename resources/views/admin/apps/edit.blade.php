@extends('layouts.admin.app')

@section('content')
    <style>
        .input-space textarea {
            width: auto !important;
        }

        button.update_btn {
            width: 170px !important;
            border-radius: 10px !important;
        }

        .authors_list {
            height: 300px !important;
            border-radius: 30px 0px 0px 0px !important;
        }

        .authors_list option {
            padding: 6px 0;
            border-bottom: 1px solid #b9c2cb;
            font-size: 16px;
        }

        .category_list {
            height: 300px !important;
            border-radius: 30px 0px 0px 0px !important;
        }

        .category_list option {
            padding: 6px 0;
            border-bottom: 1px solid #b9c2cb;
            font-size: 16px;
        }
    </style>
    <div class="white-bx">
        <h3 class="sub-heading">{{ $pageTitle }}</h3>

        <form action="{{ route('apps.update', ['id' => $apps->id]) }}" method="POST" enctype="multipart/form-data">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="input-space">
                        <label for="">App Name*</label>
                        <input type="text" name="app_name" value="{{ $apps->app_name }}" />
                    </div>
                </div>
               
                    <div class="col-md-6">
                        <div class="input-space">
                            <label for="">Keyword*</label>
                            <input type="text" name="keyword" value="{{ $apps->keyword }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-space">
                            <label for="">URL*</label>
                            <input type="text" name="url" value="{{ $apps->url }}" />
                        </div>
                    </div>
               
            </div>
            <button type="submit" class="btn-area update_btn">Update</button>
        </form>
    </div>
@endsection
