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
            Penjanaan Gred
        @endslot
        @slot('title')
            Vokasional
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
                                </div>

                                <div class="col-xl-3 col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">JENIS</label>
                                        <select id="type" name="type" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            @foreach ($collegeTypes as $type)
                                                <option {{ $type->id == 1 ? 'selected' : '' }} value="{{ $type->id }}">
                                                    {{ $type->parameter }}
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
                                                    {{ $college->code }} - {{ $college->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xl-3 col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">KOHORT</label>
                                        <select id="year" name="year" class="form-select" required>
                                            <option selected disabled value="0">-PILIH-</option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year->parameter }}">
                                                    {{ $year->parameter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">SEMESTER</label>
                                        <select id="semester" name="semester" class="form-select" required>
                                            <option selected disabled value="0">-PILIH-</option>
                                            @foreach ($semesters as $semester)
                                                <option value="{{ $semester->id }}">
                                                    {{ $semester->parameter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">SESI</label>
                                        <select id="session" name="session" class="form-select" required>
                                            <option selected disabled value="0">-PILIH-</option>
                                            @foreach ($sessions as $session)
                                                <option
                                                    {{ $session->id == 1 ? 'selected' : ''}} value="{{ $session->id }}">
                                                    {{ $session->parameter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $('#state').on('change', function () {
                let selectedState = $('#state').val();
                let selectedType = $('#type').val();
                $('#college').empty();
                $.ajax({
                    type: 'GET',
                    data: {
                        'selectedState': selectedState,
                        'selectedType': selectedType,
                    },
                    url: '/grade/getColleges',
                    success: function (response) {
                        if (!Object.keys(response.data).length > 0) {
                            $('#college').append(
                                `<option disabled selected value="0">TIADA DATA</option>`
                            );
                        } else {
                            $('#college').append(
                                `<option disabled selected value="all">SEMUA</option>`
                            );
                            $.each(response.data, function (i) {
                                $('#college').append(
                                    `<option value="${response.data[i].id}">${response.data[i].code} - ${response.data[i].name}</option>`
                                );
                            })
                        }
                    }
                })
            })

            $('#type').on('change', function () {
                let selectedState = $('#state').val();
                let selectedType = $('#type').val();
                $('#college').empty();
                $.ajax({
                    type: 'GET',
                    data: {
                        'selectedState': selectedState,
                        'selectedType': selectedType,
                    },
                    url: '/grade/getColleges',
                    success: function (response) {
                        if (!Object.keys(response.data).length > 0) {
                            $('#college').append(
                                `<option disabled selected value="0">TIADA DATA</option>`
                            );
                        } else {
                            $('#college').append(
                                `<option disabled selected value="all">SEMUA</option>`
                            );
                            $.each(response.data, function (i) {
                                $('#college').append(
                                    `<option value="${response.data[i].id}">${response.data[i].code} - ${response.data[i].name}</option>`
                                );
                            })
                        }
                    }
                })
            })

            // $('#year').on('change', function () {
            //     let selectedCollege = $('#college').val();
            //     let selectedYear = $('#year').val();
            //     console.log(selectedCollege)
            //     console.log(selectedYear)
            //     $('#course').empty();
            //     $.ajax({
            //         type: 'GET',
            //         data: {
            //             'selectedCollege': selectedCollege,
            //             'selectedYear': selectedYear,
            //         },
            //         url: '/grade/getCourses',
            //         success: function (response) {
            //             if (!Object.keys(response.data).length > 0) {
            //                 $('#course').append(
            //                     `<option disabled selected value="0">TIADA DATA</option>`
            //                 );
            //             } else {
            //                 $('#course').append(
            //                     `<option disabled selected value="all">SEMUA</option>`
            //                 );
            //                 $.each(response.data, function (i) {
            //                     $('#course').append(
            //                         `<option value="${response.data[i].id}">${response.data[i].code} - ${response.data[i].name}</option>`
            //                     );
            //                 })
            //             }
            //         }
            //     })
            // })
        })
    </script>

    <script src="{{ asset('/assets/js/datatables/users.js') }}"></script>

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


@section('dt')
@endsection

