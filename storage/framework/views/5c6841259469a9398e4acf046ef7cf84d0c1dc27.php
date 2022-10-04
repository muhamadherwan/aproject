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
            Vokasional
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

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
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($state->id); ?>">
                                                    <?php echo e($state->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-3">
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

                                <div class="col-xl-3 col-sm-3">
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

                                <div class="col-xl-3 col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">KOHORT</label>
                                        <select id="year" name="year" class="form-select" required>
                                            <option selected disabled value="0">-PILIH-</option>
                                            <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($year->parameter); ?>">
                                                    <?php echo e($year->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">SEMESTER</label>
                                        <select id="semester" name="semester" class="form-select" required>
                                            <option selected disabled value="0">-PILIH-</option>
                                            <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($semester->id); ?>">
                                                    <?php echo e($semester->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-3">
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

                            </div>
                        </form>

                    </div>

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

    <script src="<?php echo e(asset('/assets/js/datatables/users.js')); ?>"></script>

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
<?php $__env->stopSection(); ?>


<?php $__env->startSection('dt'); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/herwan/dev/apkv-web-5/resources/views/modules/grade/vocationals/index.blade.php ENDPATH**/ ?>