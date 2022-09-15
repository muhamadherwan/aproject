<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css"/>

    <link href="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Penjanaan Gred
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Akademik
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
    <div class="alert alert-danger">
        <p><?php echo e($message); ?></p>
    </div>
<?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3">
                        <form id="user-form" class="needs-validation" novalidate action="<?php echo e(route('grade.academics.store')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>

                            <div class="row">

                                <div class="col-xl-3 col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">NEGERI</label>
                                        <select id="state" name="state" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($state->id); ?>">
                                                    <?php echo e($state->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-2">
                                    <div class="mb-3">
                                        <label class="form-label">JENIS</label>
                                        <select id="type" name="type" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            <?php $__currentLoopData = $collegeTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e($type->id == 1 ? 'selected' : ''); ?> value="<?php echo e($type->id); ?>">
                                                    <?php echo e($type->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">KOLEJ VOKASIONAL</label>
                                        <select id="college" name="college" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            <?php $__currentLoopData = $colleges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $college): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($college->id); ?>">
                                                    <?php echo e($college->code); ?> - <?php echo e($college->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                            <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e($year->parameter == now()->year ? 'selected' : ''); ?> value="<?php echo e($year->parameter); ?>">
                                                    <?php echo e($year->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-2">
                                    <div class="mb-3">
                                        <label class="form-label">SEMESTER</label>
                                        <select id="semester" name="semester" class="form-select" required>
                                            
                                            <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($semester->id); ?>">
                                                    <?php echo e($semester->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-sm-2">
                                    <div class="mb-3">
                                        <label class="form-label">SESI</label>
                                        <select id="session" name="session" class="form-select" required>
                                            <option selected disabled value="0">-PILIH-</option>
                                            <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e($session->id == 1 ? 'selected' : ''); ?> value="<?php echo e($session->id); ?>">
                                                    <?php echo e($session->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">KURSUS</label>
                                        <select id="course" name="course" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($course->id); ?>">
                                                    <?php echo e($course->code); ?> - <?php echo e($course->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl col-sm align-self-end">
                                    <div class="text-sm-end">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-success waves-effect waves-light w-md btn-store">
                                                <i class="fas fa-file-signature"></i> Jana Gred
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>

                    <hr class="mt-2">






































                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

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
    <script src="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

    <!-- Sweet alert init js-->
    <script src="<?php echo e(URL::asset('/assets/js/pages/sweet-alerts.init.js')); ?>"></script>

    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>

    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>

    <script src="<?php echo e(asset('/assets/js/datatables/slip-results.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('dt'); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/modules/grade/academics/create.blade.php ENDPATH**/ ?>