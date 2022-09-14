<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Dashboards'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/libs/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>" rel="stylesheet"
          type="text/css">
    <link href="<?php echo e(URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css')); ?>" rel="stylesheet"
          type="text/css">
    <link href="<?php echo e(URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')); ?>" rel="stylesheet"
          type="text/css">
    <link href="<?php echo e(URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/datepicker/datepicker.min.css')); ?>">

    <link href="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Penjanaan
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Gred Akademik
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
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4"><i class="fas fa-user me-2"></i>Jana Keseluruhan Akademik</h4>

                    <form id="user-form" class="needs-validation" novalidate action="<?php echo e(route('grade.academics.store')); ?>"
                          method="post">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="negeri" class="form-label">NEGERI <span class="input-required">*</span></label>
                                    <select name="negeri" class="form-select">
                                        <option selected disabled value="">Sila Pilih</option>
                                        <option value="1">Johor</option>
                                        <option value="2">Kedah</option>
                                        <option value="3">Kelantan</option>
                                        <option value="4">Melaka</option>
                                        <option value="5">Negeri Sembilan</option>
                                        <option value="6">Pahang</option>
                                        <option value="7">Perak</option>
                                        <option value="8">Perlis</option>
                                        <option value="9">Pulau Pinang</option>
                                        <option value="10">Sabah</option>
                                        <option value="11">Sarawak</option>
                                        <option value="12">Selangor</option>
                                        <option value="13">Terengganu</option>
                                        <option value="14">WP Kuala Lumpur</option>
                                        <option value="15">WP Labuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="statusUser" class="form-label">JENIS KOLEJ <span
                                            class="input-required">*</span></label>
                                    <select name="status" class="form-select">
                                        <option disabled value="">Sila Pilih</option>
                                        <option value="1">ILKA</option>
                                        <option value="2">ILKS</option>
                                        <option selected value="3">KPM</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-5">
                                    <label for="statusUser" class="form-label">NAMA KOLEJ <span
                                            class="input-required">*</span></label>
                                    <select name="status" class="form-select">
                                        <option selected disabled value="">Sila Pilih</option>
                                        <option value="1">Kolej Vokasional (ERT) Azizah</option>
                                        <option value="2">Kolej Vokasional Batu Pahat</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="statusUser" class="form-label">KOHORT <span
                                            class="input-required">*</span></label>
                                    <select name="status" class="form-select">
                                        <option disabled value="">Sila Pilih</option>
                                        <option selected value="1">2012</option>
                                        <option value="2">2013</option>
                                        <option value="2">2014</option>
                                        <option value="2">2015</option>
                                        <option value="2">2016</option>
                                        <option value="2">2016</option>
                                        <option value="2">2017</option>
                                        <option value="2">2018</option>
                                        <option value="2">2019</option>
                                        <option value="2">2020</option>
                                        <option value="2">2021</option>
                                        <option value="2">2022</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="statusUser" class="form-label">SEMESTER <span
                                            class="input-required">*</span></label>
                                    <select name="status" class="form-select">
                                        <option selected disabled value="">Sila Pilih</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="statusUser" class="form-label">SESI PENGAMBILAN <span
                                            class="input-required">*</span></label>
                                    <select name="status" class="form-select">
                                        <option disabled value="">Sila Pilih</option>
                                        <option selected  value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="statusUser" class="form-label">KOD PROGRAM <span
                                            class="input-required">*</span></label>
                                    <select name="status" class="form-select">
                                        <option disabled value="">Sila Pilih</option>
                                        <option selected value="1">SEMUA</option>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <hr class="my-4">

                        <div class="row">
                            <div class="text-end">
                                <a href="<?php echo e(route('root')); ?>">
                                    <button type="button" class="btn btn-secondary waves-effect waves-light w-md me-2">
                                        Kembali
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-success waves-effect waves-light w-md btn-store">
                                    Jana Gred
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script type="text/javascript">

        function getDOB() {
            var mykad = $('#mykad').val();
            var year = mykad.slice(0, 2);
            var month = mykad.slice(2, 4);
            var day = mykad.slice(4, 6);

            var now = new Date().getFullYear().toString();
            var decade = now.substr(0, 2);
            if (now.substr(2, 2) > year) {
                year = parseInt(decade.concat(year.toString()), 10);
            }
            var birthdate = new Date(year, (month - 1), day);

            $('#dob').val(birthdate.getFullYear() + '-' + month + '-' + day).change();

        }
    </script>

    <!-- Sweet Alerts js -->
    <script src="<?php echo e(URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

    <!-- Sweet alert init js-->
    <script src="<?php echo e(URL::asset('/assets/js/pages/sweet-alerts.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/datepicker/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/select2/select2.min.js')); ?>"></script>

    
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-validation.init.js')); ?>"></script>

    <!-- form advanced init -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-advanced.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/modules/grade/academics/create.blade.php ENDPATH**/ ?>