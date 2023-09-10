@extends('layouts.base')
@section('content')

       <!-- start page title -->
       <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Invoices</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                            <li class="breadcrumb-item active">Invoices</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card"> 
           <div class="card-body"> 
           <h1 class="card-title">Yearly Invoice Summary</h1>
            <table id="datatable" class="table table-bordered  dt-responsive table-hover" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="table-light">
                    <tr>
                        <th>Year</th>
                        <th>Total Invoices</th>
                        <th>Total Invoice Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($yearlyData as $data)
                    <tr>
                        <td>{{ $data['year'] }}</td>
                        <td>{{ $data['count'] }}</td>
                        <td>{{ $data['total'] }}</td>
                        <td><a href="{{ route('invoices.show', $data['year']) }}">View Invoices</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

           </div>
        </div>
            
@endsection


@section('script')

<script>






</script>

@endsection