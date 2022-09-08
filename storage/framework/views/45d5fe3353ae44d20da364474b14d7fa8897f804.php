

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
            Pentadbiran
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Pengguna
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3">
                        <form>

                            <div class="row">

                                <div class="col-xl-2 col-sm-2">
                                    <div class="mb-3">
                                        <label class="form-label">PERANAN PENGGUNA</label>
                                        <select id="filter-role" name="filter-role" class="form-select" required>
                                            <option selected value="all">SEMUA</option>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($role->id); ?>">
                                                    <?php echo e($role->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl col-sm align-self-end">
                                    <div class="text-sm-end">
                                        <div class="mb-3">
                                            <button id="button-search" type="button"
                                                    class="btn btn-primary waves-effect waves-light w-md me-2">
                                                <i class="fas fa-search"></i> Cari
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <hr class="mt-2">

                    <div class="row mb-3">

                        <div class="col-sm">
                            <div class="text-sm-end">
                                <a href="<?php echo e(route('users.create')); ?>">
                                    <button type="button" class="btn btn-secondary waves-effect waves-light w-md me-2">
                                        <i class="mdi mdi-plus me-1"></i>
                                        Daftar Pengguna
                                    </button>
                                </a>
                            </div>
                        </div><!-- end col-->

                    </div>

                    <div class="table-responsive table-hover">

                        <table id="users-dt" class="table w-100">
                            <thead class="table-light">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">MYKAD</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">TELEFON</th>
                                <th class="text-center">PERANAN</th>
                                <th class="text-center">SUNTING</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(asset('/assets/js/datatables/users.js')); ?>"></script>

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


<?php $__env->startSection('dt'); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/herwan/dev/apkv-web-2/resources/views/modules/administration/users/index.blade.php ENDPATH**/ ?>