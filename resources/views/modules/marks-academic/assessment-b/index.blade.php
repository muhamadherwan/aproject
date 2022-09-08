@extends('layouts.master')

@section('title')
    @lang('translation.Dashboards')
@endsection

@section('css')
    {{-- <!-- DataTables --> --}}
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Akademik
        @endslot
        @slot('title')
            Pentaksiran Berterusan Akademik
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3">
                        <form>

                            <div class="row">

                                <div class="col-xl-3 col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">NEGERI</label>
                                        <select id="state" name="state" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">
                                                    {{ $state->parameter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">KOHORT</label>
                                        <select id="cohort" name="cohort" class="form-select" required>
                                            @foreach ($years as $year)
                                                <option value="{{ $year->id }}">
                                                    {{ $year->parameter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-xl-3 col-sm-3">

                                    <div class="mb-3">
                                        <label class="form-label">JENIS</label>
                                        <select id="college_type" name="college_type" class="form-select" required>
                                            <option value="all">SEMUA</option>
                                            @foreach ($colleges_types as $colleges_type)
                                                <option
                                                    {{ $colleges_type->id == '1' ? 'selected' : '' }} value="{{ $colleges_type->id }}">
                                                    {{ $colleges_type->parameter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">SEMESTER</label>
                                        <select id="semester" name="semester" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            @foreach ($semesters as $semester)
                                                <option (( value="{{ $semester->id }}">
                                                    {{ $semester->parameter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-xl-3 col-sm-3">

                                    <div class="mb-3">
                                        <label class="form-label">KOLEJ VOKASIONAL</label>
                                        <select id="college" name="college" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            @foreach ($colleges as $college)
                                                <option value="{{ $college->id }}">
                                                    {{ $college->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">SESI</label>
                                        <select id="semester" name="semester" class="form-select" required>
                                            <option value="all">SEMUA</option>
                                            @foreach ($sessions as $session)
                                                <option
                                                    {{ $session->id == '1' ? 'selected' : '' }} value="{{ $session->id }}">
                                                    {{ $session->parameter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="col-xl col-sm align-self-end">
                                    <div class="text-sm-end">
                                        <div class="mb-3">
                                            <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light w-md me-2 btn-search">
                                                <i class="fas fa-search"></i> Cari
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <hr class="mt-2">

                    <table id="dt-academic-b" class="table align-middle table-nowrap table-check">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>NAMA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <script>
                            $(function () {
                                $('#table').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    ajax: '{{ url('assessment-b/ajax') }}',
                                    columns: [
                                        {data: 'name', name: 'name'}
                                    ]
                                });
                            });
                        </script>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

@section('script')
    <script>
        $(document).on("click", ".btn-destroy", (function (e) {
            e.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: "Padam Pengguna",
                text: "Adakah anda pasti?",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Padam",
                cancelButtonText: "Batal",
                confirmButtonColor: "#f46a6a",
                cancelButtonColor: "#74788d"
            }).then(function (result) {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Pengguna telah berjaya dipadam!",
                        icon: "success",
                        timer: 2000,
                        showCloseButton: 0,
                        showCancelButton: 0,
                        showConfirmButton: 0,
                        onBeforeOpen: function () {
                            Swal.showLoading(), t = setInterval((function () {
                            }), 100)
                        },
                        onClose: function () {
                            clearInterval(t);
                            form.submit();
                        }
                    })
                }
            })
        }))
    </script>

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
