@extends('layouts.admin.app')

@section('content')
    <style>
        button.submit_btn {
            width: 170px !important;
            border-radius: 10px !important;
        }

        #family_chords {
            height: 203px;
            border-radius: 30px 0px 0px 0px;
        }

        #family_chords option {
            padding: 5px;
            border-bottom: 1px solid #b9c2cb;
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

        <form action="{{ route('manage-customers.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="">Customer Name*</label>
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}" required />
                    </div>
                    {{-- @error('customer_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                </div>
                <div class="col-md-6">
                    <div class="input-space">
                        <label for="">Email Address*</label>
                        <input type="text" name="email" value="{{ old('email') }}" required />
                    </div>
                    {{-- @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}

                </div>
                <div class="col-md-6">
                    <div class="input-space">
                        <label for="">Phone Number*</label>
                        <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                            placeholder="XXX-XXX-XXXX" required />
                    </div>


                    {{-- @error('url')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}

                </div>
                <div class="col-md-6">
                    <div class="input-space">
                        <label for="">Status*</label>
                        <select name="status" id="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    {{-- @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}

                </div>
            </div>
            <button type="submit" class="btn-area submit_btn">Add</button>

        </form>
    </div>
@endsection
