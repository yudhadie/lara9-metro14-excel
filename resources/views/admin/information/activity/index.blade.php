@extends('admin.templates.default')

@section('content')

    <div class="content flex-column-fluid" id="kt_content">
        <div class="card">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">{{$title}}</span>
                        <span class="text-muted mt-1 fw-bold fs-7">{{$subtitle ?? ''}}</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table id="kt_datatable" class="table align-middle table-striped gy-5 gs-7 border rounded">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th>No</th>
                                    <th>Data</th>
                                    <th>Activity</th>
                                    <th>User</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        var element = document.getElementById('menu-info');
            element.classList.add('show');
        var element2 = document.getElementById('menu-info-activity');
            element2.classList.add('active');
    </script>

    <script>
        "use strict";
        var KTDatatablesBasicBasic = function() {

        var initTable1 = function() {
            var table = $('#kt_datatable');
            table.DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: '{{ route('data.activity') }}',
                columns: [
                    {data:'DT_RowIndex', orderable: false, searchable: false},
                    {data:'data'},
                    {data:'events'},
                    {data:'user'},
                    {data:'time'},
                    {data:'action', responsivePriority: -1, orderable: false, searchable: false},
                ],
                columnDefs: [
                    {
                        targets: 0,
                        className: 'dt-center',
                        width: '30px',
                    },
                    {
                        targets: [2,3,4,5],
                        className: "dt-center",
                    },
                ],
                dom:
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +
                "<'table-responsive'tr>" +
                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">",
            });

        };

        return {
            //main function to initiate the module
            init: function() {
                initTable1();
            }
        };
        }();

        jQuery(document).ready(function() {
        KTDatatablesBasicBasic.init();
        });
    </script>

@endpush
