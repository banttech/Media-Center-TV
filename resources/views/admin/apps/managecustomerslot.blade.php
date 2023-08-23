  @extends('layouts.admin.managecustomer')

  @section('content1')
      <style>
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
      {{-- <div class="app-title">
          <div>
              <h1>{{ $pageTitle }}</h1>
          </div>
      </div> --}}

      {{-- <form action="{{ route('manage-customers.search') }}" method="GET">
          <div class="row manage_apps">
              <div class="col-md-5">
                  <div class="input-space ">
                      <label for="">Search</label>
                      <input type="text" name="search" value="{{ old('search') }}" placeholder="Search by Customer Name/Email Address/Phone Number"/>
                                        </div>
              </div>
            
              <div class="col-md-2">
                  <button type="submit" class="btn-area search_btn">Search</button>
              </div>
          </div>


      </form> --}}


      <div>
          <h1>{{ $name . '  ' . '- Payment Period Records' }}</h1>
      </div>

      <table class="resp">

          <thead>
              <tr>
                  <th scope="col">Payment Period From</th>
                  <th scope="col">Payment Period To</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Status</th>
                  <th scope="col">Payment Done Date</th>
                  <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>

              @if (Session::has('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
              @endif

              @foreach ($customers as $key => $customer)
                  <tr>
                      <td style="font-size: 15px;">{{ date('d-m-Y', strtotime($customer->pp_from)) }}</td>
                      <td style="font-size: 15px;">{{ date('d-m-Y', strtotime($customer->pp_to)) }}</td>
                      <td style="font-size: 15px;">${{ $customer->amount }}</td>
                      <td style="font-size: 15px;">{{ $customer->status }}</td>
                      <td style="font-size: 15px;">
                          @if ($customer->payment_done_date != null)
                              {{ date('d-m-Y', strtotime($customer->payment_done_date)) }}
                          @else
                              --
                          @endif
                      </td>

                      @if ($customer->status == 'unpaid')
                          <td style="font-size: 15px;"><a
                                  href="{{ route('manage-customers.makepayment', ['id' => $customer->id]) }}" class=""
                                  onclick="return confirm('Are you sure to make payment for this record?');">Make
                                  Payment</a></td>
                      @else
                          <td style="font-size: 15px;">Payment Done</td>
                      @endif

                  </tr>
              @endforeach
          </tbody>
      </table>
      <div class="text-center">
          {{-- {{ $customers->links() }} --}}
      </div>
  @endsection
