  @extends('layouts.admin.app')

  @section('content')
      <style>
          .resp th {
              width: 100%;
          }

          .resp td {
              text-align: center;
              font-size: 20px;
          }

          .action_btns {
              display: flex;
              justify-content: center;
              align-items: center;
          }

          button.search_btn {
              border-radius: 10px !important;
              padding: 10px 20px !important;
          }

          .manage_apps {
              display: flex;
              justify-content: ;
              align-items: center
          }
      </style>
      <div class="app-title">
          <div>
              <h1>{{ $pageTitle }}</h1>
          </div>
      </div>

      <form action="{{ route('apps.search') }}" method="GET">
          <div class="row manage_apps">
              <div class="col-md-4">
                  <div class="input-space ">
                      <label for="">Search</label>
                      <input type="text" name="search" value="{{ old('search') }}"
                          placeholder="Search by AppName/Keyword" />
                      {{-- <input type="text" name="search" value="{{$search}}" placeholder="Search by AppName/Keyword"/> --}}
                  </div>
              </div>

              <div class="col-md-2">
                  <button type="submit" class="btn-area search_btn">Search</button>
              </div>
          </div>


      </form>
      <br>

      <a href="{{ route('apps.create') }}" class="btn btn-primary" style="float:right;margin:10px;">Add Apps</a>


      <table class="resp">

          <thead>
              <tr>
                  <th scope="col">App Name</th>
                  <th scope="col">Keyword</th>
                  <th scope="col">App URL</th>
                  <th scope="col">Actions</th>

              </tr>
          </thead>
          <tbody>

              @if (Session::has('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
              @endif
              @if ($apps->count() == 0)
                  <tr>
                      <td colspan="5">No records found</td>
                  </tr>
              @endif
              @foreach ($apps as $key => $app)
                  <tr>
                      <td style="font-size: 15px;">{{ $app->app_name }}</td>
                      <td style="font-size: 15px;">{{ $app->keyword }}</td>
                      <td style="font-size: 15px;">{{ $app->url }}</td>

                      {{-- <td style="font-size: 15px;">{{ Carbon\Carbon::parse($app->created_at)->format('M d, Y') }}</td> --}}

                      <td class="action_btns" style="font-size: 15px;">
                          <a href="{{ route('apps.edit', ['id' => $app->id]) }}" class="btn btn-delete">Edit</a> |
                          <a href="{{ route('apps.delete', ['id' => $app->id]) }}" class="btn btn-delete"
                              onclick="return confirm('Are you sure you want to delete this app?');">Delete</a>
                      </td>

                  </tr>
              @endforeach
          </tbody>
      </table>
      <div class="text-center">
          {{ $apps->links() }}
      </div>
  @endsection
