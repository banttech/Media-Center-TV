  @extends('layouts.admin.managecustomer')

  @section('content1')
      <style>
          .resp th {
              width: 100%;
              table-layout: fixed;
          }

          .resp td {
              text-align: center;
              font-size: 20px;
          }

          .resp th,
          .resp td {
              white-space: nowrap;
          }

          .action_btns {
              display: flex;
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

      <form action="{{ route('manage-customers.search') }}" method="GET">
          <div class="row manage_apps">
              <div class="col-md-5">
                  <div class="input-space ">
                      <label for="">Search</label>
                      <input type="text" name="search" value="{{ request()->search }}"
                          placeholder="Search by Customer Name/Email Address/Phone Number" />
                      {{-- <input type="text" name="search" value="{{$search}}" placeholder="Search by AppName/Keyword"/> --}}
                  </div>
              </div>

              <div class="col-md-2">
                  <button type="submit" class="btn-area search_btn">Search</button>
              </div>
          </div>
      </form>
      <br>

      <a href="{{ route('manage-customers.create') }}" class="btn btn-primary" style="float:right;margin:10px;">Add
          Customer</a>


      <table class="resp">

          <thead>
              <tr>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Email Address</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Status</th>
                  <th scope="col">Registration Date</th>
                  <th scope="col">Actions</th>
              </tr>
          </thead>
          <tbody>

              @if (Session::has('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
              @endif
              @if ($customers->count() == 0)
                  <tr>
                      <td colspan="6" class="text-center">No records found</td>
                  </tr>
              @endif
              @foreach ($customers as $key => $customer)
                  <tr>
                      <td style="font-size: 15px;"><a
                              href="{{ route('manage-customers.payment-period', ['id' => $customer->id]) }}">{{ $customer->name }}</a>
                      </td>
                      <td style="font-size: 15px;">{{ $customer->email }}</td>
                      <td style="font-size: 15px;">{{ $customer->phone_number }}</td>
                      <td style="font-size: 15px;">{{ $customer->status }}</td>
                      <td style="font-size: 15px;">{{ $customer->created_at }}</td>


                      <td class="action_btns" style="font-size: 15px;">
                          <a href="{{ route('manage-customers.edit', ['id' => $customer->id]) }}"
                              class="btn btn-delete">Edit</a> |
                          <a href="{{ route('manage-customers.delete', ['id' => $customer->id]) }}" class="btn btn-delete"
                              onclick="return confirm('Are you sure you want to delete this customer?');">Delete</a>
                      </td>

                  </tr>
              @endforeach
          </tbody>
      </table>
      <div class="text-center">
          <nav class="" aria-label="Page navigation example">
              {{ $customers->links($custom_pagination) }}
          </nav>
      </div>
  @endsection
