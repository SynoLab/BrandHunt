@extends('layouts.admin_includes.app')

@section('content')
<div class="container-xl wide-xl">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Bank Details</h3>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt"><a href="{{ route('home') }}"
                                            class="btn btn-danger"><em class="icon ni ni-arrow-left"></em><span>Go
                                                to Dashboard</span></a></li>
                                    {{-- <li class="nk-block-tools-opt ml-auto"><a href="{{ route('banks.create') }}"
                                            class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Bank
                                                Details</span></a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div><!-- .toggle-wrap -->
                    </div><!-- .nk-block-head-content -->
                </div>
                <div class="card card-preview">
                    <div class="card-inner">
                        <table class="datatable-init-export nowrap table" data-export-title="Export">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bank Name</th>
                                    <th>Bank Code</th>
                                    <th>Branch Name</th>
                                    <th>Branch Code</th>
                                    <th>Swift Code</th>
                                    <th>Account Number</th>
                                    <th>Name</th>
                                    <th>Account Type</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($bankDetails as $bank)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$bank->bank_name}}</td>
                                    <td>{{$bank->bank_code}}</td>
                                    <td>{{$bank->branch_name}}</td>
                                    <td>{{$bank->branch_code}}</td>
                                    <td>{{$bank->swift_code}}</td>
                                    <td>{{$bank->account_number}}</td>
                                    <td>{{$bank->name}}</td>
                                    <td>{{$bank->account_type}}</td>
                                    <td class="table-td">
                                        <a class="btn btn-info btn-sm" href="{{ route('banks.edit', $bank->id) }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        
                                    </td>

                                </tr>
                                @php
                                $no = $no +1;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- .card-preview -->
            </div> <!-- nk-block -->
        </div>
    </div>
</div>
@endsection
