<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Accounts</title>
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('frontend/javascript/bootstrap.min.js') }}"></script>
    <script type="text/javascript " src="{{ URL::asset('frontend/javascript/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('frontend/css/style.css') }}">
</head>

<body>
    <!-- Component Top Navbar -->
    <x-top_navbar />

    <div class="col-sm-12">
        <div class="row">
            <x-side_navbar />
            <div class="col-sm-10 py-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-5">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('search_transaction_name')}}" method="post">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col">
                                                <center>
                                                    <label for="">Name : </label>
                                                </center>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="" value="">
                                                <br>
                                                <button type="submit" class="btn btn-dark">Fetch Data</button>
                                                <a href="{{route('all_transactions')}}">
                                                    <button type="button" class="btn btn-danger">Clear</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('search_transaction_date') }}" method="post">
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <center>
                                                    <label for="">From :</label>
                                                </center>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="date" name="from_date" class="form-control"
                                                    id="from_date" placeholder="" value="">
                                            </div>
                                            <div class="col-sm-2">
                                                <center>
                                                    <label for="">To :</label>
                                                </center>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="date" name="to_date" class="form-control" id="to_date"
                                                    placeholder="" value="">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <div class="col">
                                                <button type="submit" class="btn btn-dark">Fetch Data</button>
                                                <a href="">
                                                    <button type="button" class="btn btn-danger">Clear</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 px-4">
                                <a href="{{ route('add_transaction') }}">
                                    <button type="button" class="btn _btn">New Transaction</button>
                                </a>
                                <a href="{{ url('new_receivable') }}">
                                    <button type="button" class="btn _btn">New Receivable</button>
                                </a>
                                <a href="{{ url('new_payable') }}">
                                    <button type="button" class="btn _btn">New Payable</button>
                                </a>

                            </div>
                            <div class="col-sm-4">
                                <center>
                                    <h3>All Transactions</h3>
                                </center>
                            </div>
                            <div class="col-sm-4" style="justify-content:end;">

                            </div>
                        </div>
                        <div class="container-fluid px-3 py-3 overflow-auto"
                            style="padding-right:10px; max-height:67vh; overflow-y:auto;">
                            <!--  -->
                            <table class="table table-stripped table-hover border-dark text-center">
                                <thead class="thead-dark" style="position:sticky; top:-17px;">
                                    <tr style=" padding-top:0;">
                                        <th>Sr no.</th>
                                        <th>Transaction Id</th>
                                        <th>Name</th>
                                        <th>Purpose</th>
                                        <th>Action</th>
                                        <th>Mode</th>
                                        <th>Amount</th>
                                        <!-- <th>View</th> -->
                                        <th>Date & Time</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <!-- <th>Print</th> -->
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($all_transactions->reverse() as $transactions)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $transactions->id }}</td>
                                            <td>{{ $transactions->name }}</td>
                                            <td>{{ $transactions->purpose }}</td>

                                            @if ($transactions->action == 'paid')
                                                <td style="color:red;"><b>{{ $transactions->action }}</b></td>
                                            @else
                                                <td style="color:green;"><b>{{ $transactions->action }}</b></td>
                                            @endif
                                            <td>{{ $transactions->mode }}</td>

                                            @if ($transactions->action == 'paid')
                                                <td style="color:red;"><b>{{ $transactions->amount }}</b></td>
                                            @else
                                                <td style="color:green;"><b>{{ $transactions->amount }}</b></td>
                                            @endif
                                            <td>{{ $transactions->created_at }}</td>
                                            <td>
                                                <a href="{{ url('update_transaction') }}/{{ $transactions->id }}"
                                                    class = "btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('delete_transaction') }}/{{ $transactions->id }}"
                                                    class="btn btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-trash3-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
