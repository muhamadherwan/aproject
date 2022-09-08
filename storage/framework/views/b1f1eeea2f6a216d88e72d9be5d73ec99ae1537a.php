

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
            Akademik
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Pentaksiran Berterusan Akademik
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

                                    <div class="mb-3">
                                        <label class="form-label">KOHORT</label>
                                        <select id="cohort" name="cohort" class="form-select" required>
                                            <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($year->id); ?>">
                                                    <?php echo e($year->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-xl-3 col-sm-3">

                                    <div class="mb-3">
                                        <label class="form-label">JENIS</label>
                                        <select id="college_type" name="college_type" class="form-select" required>
                                            <option value="all">SEMUA</option>
                                            <?php $__currentLoopData = $colleges_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colleges_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e($colleges_type->id == '1' ? 'selected' : ''); ?> value="<?php echo e($colleges_type->id); ?>">
                                                    <?php echo e($colleges_type->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">SEMESTER</label>
                                        <select id="semester" name="semester" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            <?php $__currentLoopData = $semesters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semester): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option (( value="<?php echo e($semester->id); ?>">
                                                    <?php echo e($semester->parameter); ?>

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
                                                    <?php echo e($college->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">SESI</label>
                                        <select id="semester" name="semester" class="form-select" required>
                                            <option value="all">SEMUA</option>
                                            <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e($session->id == '1' ? 'selected' : ''); ?> value="<?php echo e($session->id); ?>">
                                                    <?php echo e($session->parameter); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    ajax: '<?php echo e(url('assessment-b/ajax')); ?>',
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hazizi-3TDS\Desktop\APKV-CODE\apkv-web\resources\views/modules/marks-academic/assessment-b/index.blade.php ENDPATH**/ ?>