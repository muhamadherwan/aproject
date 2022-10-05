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

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    {{--    @if (session('error'))--}}
    {{--        <div class="alert alert-danger">--}}
    {{--            <p>{{ $message }}</p>--}}
    {{--        </div>--}}
    {{--    @endif--}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3">
                        <form id="user-form" class="needs-validation" novalidate
                              action="{{ route('grade.vocational.store') }}" method="post">
                            @csrf

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

                                <div class="col-xl-2 col-sm-2">
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

                                <div class="col-xl-4 col-sm-4">
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

                                <div class="col-xl-2 col-sm-2">
                                    <div class="mb-3">
                                        <label class="form-label">KOHORT</label>
                                        <select id="year" name="year" class="form-select" required>
                                            <option selected disabled value="0">-PILIH-</option>
                                            @foreach ($years as $year)
                                                <option
                                                    {{ $year->parameter == now()->year ? 'selected' : '' }} value="{{ $year->parameter }}">
                                                    {{ $year->parameter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-2">
                                    <div class="mb-3">
                                        <label class="form-label">SEMESTER</label>
                                        <select id="semester" name="semester" class="form-select" required>
                                            {{--                                            <option selected disabled value="0">-PILIH-</option>--}}
                                            @foreach ($semesters as $semester)
                                                <option value="{{ $semester->id }}">
                                                    {{ $semester->parameter }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-2">
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

                                <div class="col-xl-3 col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">KURSUS</label>
                                        <select id="course" name="course" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">
                                                    {{ $course->code }} - {{ $course->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl col-sm align-self-end">
                                    <div class="text-sm-end">
                                        <div class="mb-3">
                                            <button type="submit"
                                                    class="btn btn-success waves-effect waves-light w-md btn-store">
                                                <i class="fas fa-file-signature"></i> Jana Gred
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>

                    <hr class="mt-2">

                    {{--                    <div class="row mb-3">--}}

                    {{--                        <div class="col-sm">--}}
                    {{--                            <div class="text-sm-end">--}}
                    {{--                                <a href="#">--}}
                    {{--                                    <button type="button" class="btn btn-success waves-effect waves-light w-md me-2">--}}
                    {{--                                        <i class="mdi mdi-printer me-1"></i>--}}
                    {{--                                        Cetak Slip Keputusan--}}
                    {{--                                    </button>--}}
                    {{--                                </a>--}}
                    {{--                            </div>--}}
                    {{--                        </div><!-- end col-->--}}

                    {{--                    </div>--}}

                    {{--                    <div class="table-responsive table-hover">--}}

                    {{--                        <table id="slip-results-dt" class="table w-100">--}}
                    {{--                            <thead class="table-light">--}}
                    {{--                            <tr>--}}
                    {{--                                <th class="text-center">#</th>--}}
                    {{--                                <th class="text-center">NEGERI</th>--}}
                    {{--                                <th class="text-center">KOLEJ VOKASIONAL</th>--}}
                    {{--                                <th class="text-center">KOHORT</th>--}}
                    {{--                                <th class="text-center">SEMESTER</th>--}}
                    {{--                                <th class="text-center">SESI</th>--}}
                    {{--                                <th class="text-center">PELAJAR</th>--}}
                    {{--                                --}}{{--                                <th class="text-center">BIDANG</th>--}}
                    {{--                                --}}{{--                                <th class="text-center">PROGRAM</th>--}}
                    {{--                                --}}{{--                                <th class="text-center">KURSUS</th>--}}
                    {{--                                --}}{{--                                <th class="text-center">KELAS</th>--}}
                    {{--                            </tr>--}}
                    {{--                            </thead>--}}
                    {{--                            <tbody></tbody>--}}
                    {{--                        </table>--}}
                    {{--                    </div>--}}

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
                let selectedCollege = 'all';
                let selectedYear = $('#year').val();
                let selectedSession = $('#session').val();

                getColleges(selectedState, selectedType);
                getCourses(selectedState, selectedType, selectedCollege, selectedYear, selectedSession);

            })

            $('#type').on('change', function () {

                let selectedState = $('#state').val();
                let selectedType = $('#type').val();
                let selectedCollege = 'all';
                let selectedYear = $('#year').val();
                let selectedSession = $('#session').val();

                getColleges(selectedState, selectedType);
                getCourses(selectedState, selectedType, selectedCollege, selectedYear, selectedSession);

            })

            $('#college').on('change', function () {

                let selectedState = $('#state').val();
                let selectedType = $('#type').val();
                let selectedCollege = $('#college').val();
                let selectedYear = $('#year').val();
                let selectedSession = $('#session').val();

                getCourses(selectedState, selectedType, selectedCollege, selectedYear, selectedSession);

            })

            $('#year').on('change', function () {

                let selectedState = $('#state').val();
                let selectedType = $('#type').val();
                let selectedCollege = $('#college').val();
                let selectedYear = $('#year').val();
                let selectedSession = $('#session').val();

                getCourses(selectedState, selectedType, selectedCollege, selectedYear, selectedSession);
            })

            $('#session').on('change', function () {

                let selectedState = $('#state').val();
                let selectedType = $('#type').val();
                let selectedCollege = $('#college').val();
                let selectedYear = $('#year').val();
                let selectedSession = $('#session').val();

                getCourses(selectedState, selectedType, selectedCollege, selectedYear, selectedSession);
            })

            function getColleges(selectedState, selectedType) {

                $('#college').empty();
                $.ajax({
                    type: 'GET',
                    data: {
                        'selectedState': selectedState,
                        'selectedType': selectedType,
                    },
                    url: '/search/getColleges',
                    success: function (response) {
                        if (!Object.keys(response.data).length > 0) {
                            $('#college').append(
                                `<option disabled selected value="0">TIADA DATA</option>`
                            );
                        } else {
                            $('#college').append(
                                `<option selected value="all">SEMUA</option>`
                            );
                            $.each(response.data, function (i) {
                                $('#college').append(
                                    `<option value="${response.data[i].id}">${response.data[i].code} - ${response.data[i].name}</option>`
                                );
                            })
                        }
                    }
                })

            }

            function getCourses(selectedState, selectedType, selectedCollege, selectedYear, selectedSession) {

                $('#course').empty();
                $.ajax({
                    type: 'GET',
                    data: {
                        'selectedState': selectedState,
                        'selectedType': selectedType,
                        'selectedCollege': selectedCollege,
                        'selectedYear': selectedYear,
                        'selectedSession': selectedSession,
                    },
                    url: '/search/getCourses',
                    success: function (response) {
                        if (!Object.keys(response.data).length > 0) {
                            $('#course').append(
                                `<option disabled selected value="0">TIADA DATA</option>`
                            );
                        } else {
                            $('#course').append(
                                `<option selected value="all">SEMUA</option>`
                            );
                            $.each(response.data, function (i) {
                                $('#course').append(
                                    `<option value="${response.data[i].id}">${response.data[i].code} - ${response.data[i].name}</option>`
                                );
                            })
                        }
                    }
                })

            }
        })
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

    <script src="{{ asset('/assets/js/datatables/slip-results.js') }}"></script>
@endsection

@section('dt')
@endsection
