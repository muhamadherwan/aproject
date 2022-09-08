<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Dashboards'); ?> <?php $__env->stopSection(); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Pentadbiran <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Pengguna <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4"><i class="fas fa-user me-2"></i>Butiran Peribadi</h4>

                    <form class="needs-validation" novalidate action="<?php echo e(route('users.update', $selectedUser)); ?>"
                          method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">NAMA PENUH <span
                                            class="input-required">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control" required
                                           value="<?php echo e($selectedUser->name); ?>">
                                    <div class="invalid-feedback">
                                        Nama wajib diisi
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">E-MEL <span class="input-required">*</span></label>
                                    <input id="email" name="email" type="email" class="form-control" required
                                           value="<?php echo e($selectedUser->email); ?>"
                                           parsley-type="email">
                                    <div class="invalid-feedback">
                                        E-mel wajib diisi
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mykad" class="form-label">MYKAD <span
                                            class="input-required">*</span></label>
                                    <input id="mykad" name="mykad" class="form-control" required minlength="12"
                                           value="<?php echo e($selectedUser->mykad); ?>"
                                           maxlength="12" onkeyup="getDOB()"
                                    >
                                    <div class="invalid-feedback">
                                        MyKad wajib diisi
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dob" class="form-label">TARIKH LAHIR <span
                                            class="input-required">*</span></label>
                                    <div class="input-group" id="datepicker">
                                        <input id="dob" name="dob" type="text" class="form-control"
                                               data-date-format="yyyy-mm-dd"
                                               data-date-container='#datepicker' required
                                               value="<?php echo e($selectedUser->dob); ?>"
                                               data-provide="datepicker" data-date-autoclose="true">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        <div class="invalid-feedback">
                                            Tarikh lahir wajib diisi
                                        </div>
                                    </div><!-- input-group -->

                                </div>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="statusUser" class="form-label">STATUS <span
                                            class="input-required">*</span></label>
                                    <select name="status" class="form-select">
                                        <option disabled value="">Sila Pilih</option>
                                        <option value="1" <?php echo e($selectedUser->status == '1' ? 'selected' : ''); ?>>Aktif
                                        </option>
                                        <option value="2" <?php echo e($selectedUser->status == '2' ? 'selected' : ''); ?>>Tidak
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phonenumber" class="form-label">NOMBOR TELEFON</label>
                                    <input value="<?php echo e($selectedUser->phonenumber); ?>" id="phonenumber" name="phonenumber"
                                           class="form-control">
                                </div>
                            </div>

                        </div>

                        <hr class="my-4">

                        <h4 class="card-title mb-4"><i class="fas fa-briefcase me-2"></i>Butiran Pekerjaan</h4>

                        <div class="row">

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="title" class="form-label">GELARAN</label>
                                    <input value="<?php echo e($selectedUser->title); ?>" id="title" name="title" type="text"
                                           class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="department" class="form-label">JABATAN</label>
                                    <input value="<?php echo e($selectedUser->department); ?>" id="department" name="department"
                                           type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="position" class="form-label">JAWATAN</label>
                                    <input value="<?php echo e($selectedUser->position); ?>" id="position" name="position"
                                           type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="grade" class="form-label">GRED</label>
                                    <input value="<?php echo e($selectedUser->grade); ?>" id="grade" name="grade" type="text"
                                           class="form-control">
                                </div>
                            </div>

                        </div>

                        <hr class="my-4">

                        <h4 class="card-title mb-4"><i class="fas fa-home me-2"></i>Butiran Alamat</h4>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="address" class="form-label">ALAMAT <span
                                            class="input-required">*</span></label>
                                    <input value="<?php echo e($selectedUser->address); ?>" id="address" name="address" type="text"
                                           class="form-control" required>
                                    <div class="invalid-feedback">
                                        Alamat wajib diisi
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="postcode" class="form-label">POSKOD <span
                                            class="input-required">*</span></label>
                                    <input value="<?php echo e($selectedUser->postcode); ?>" id="postcode" name="postcode"
                                           class="form-control" required minlength="5"
                                           maxlength="5"
                                    >
                                    <div class="invalid-feedback">
                                        Poskod wajib diisi
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="city" class="form-label">BANDAR <span
                                            class="input-required">*</span></label>
                                    <input value="<?php echo e($selectedUser->city); ?>" id="city" name="city" type="text"
                                           class="form-control" required>
                                    <div class="invalid-feedback">
                                        Bandar wajib diisi
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="area" class="form-label">DAERAH <span
                                            class="input-required">*</span></label>
                                    <input value="<?php echo e($selectedUser->area); ?>" id="area" name="area" type="text"
                                           class="form-control" required>
                                    <div class="invalid-feedback">
                                        Daerah wajib diisi
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="state" class="form-label">NEGERI <span
                                            class="input-required">*</span></label>
                                    <select id="state" name="state" class="form-select" required>
                                        <option selected disabled value="all">Sila Pilih</option>
                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($state->id); ?>"
                                                <?php echo e($state->id == $selectedUser->config_states_fk ? 'selected' : ''); ?>>
                                                <?php echo e($state->parameter); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Negeri wajib diisi
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr class="my-4">

                        <h4 class="card-title mb-4"><i class="fas fa-user-shield me-2"></i>Peranan</h4>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" name="radioRole" required
                                                   id="role<?php echo e($role->id); ?>" value="<?php echo e($role->id); ?>"
                                                <?php echo e($role->id == $selectedRole->role_id ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="role<?php echo e($role->id); ?>">
                                                <?php echo e($role->name); ?>

                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="text-end">
                                <a href="<?php echo e(route('users.index')); ?>">
                                    <button type="button" class="btn btn-secondary waves-effect waves-light w-md me-2">
                                        Kembali
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-success waves-effect waves-light w-md">Simpan
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

    <script src="<?php echo e(URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/datepicker/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/select2/select2.min.js')); ?>"></script>

    
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-validation.init.js')); ?>"></script>

    <!-- form mask -->
    <script src="<?php echo e(URL::asset('/assets/libs/inputmask/inputmask.min.js')); ?>"></script>
    <!-- form mask init -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-mask.init.js')); ?>"></script>
    <!-- form advanced init -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-advanced.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hazizi-3TDS\Desktop\APKV-CODE\apkv-web\resources\views/modules/administration/users/edit.blade.php ENDPATH**/ ?>