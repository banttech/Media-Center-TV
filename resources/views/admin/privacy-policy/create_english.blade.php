@extends('layouts.admin.app')

@section('content')
    <style>
        button.submit_btn {
            width: 170px !important;
            border-radius: 10px !important;
        }

        .category_image {
            margin-top: 10px;
        }

        .desc_character_length {
            margin-top: 6px;
            float: right;
        }

        .allowed_type {
            font-size: 13px;
            color: #11d11c;
            margin-bottom: 0px !important;
        }
    </style>
    <?php
    Cache::flush();
    
    ?>

    <div class="white-bx">
        <h3 class="sub-heading">Add Privacy Policy English</h3>

        <form action="{{ route('privacy-policy-english.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="">Privacy Policy English*</label>
                        <input type="file" name="image_english" value="" />
                        <p class="allowed_type">Only JPG, JPEG and PNG extensions are allowed.</p>
                        <p class="allowed_type">Image size can't exceeds the size 800px X 800px.</p>

                        <br>

                        <img class="mt-2" src="{{ url('admin_assets/images/' . $homeLogo->pp_english_image) }}"
                            alt=" " style="width: 100%; max-width: 512px; height: 100%; max-height: 250px;"
                            id="pp_english_img" />
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-area submit_btn">Save</button>
        </form>
    </div>

    <script>
        const logoImg = document.getElementById('pp_english_img');
        const logoInput = document.querySelector('input[name="image_english"]');

        logoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    logoImg.setAttribute('src', this.result);
                });
                reader.readAsDataURL(file);

            }

        });
    </script>
@endsection
