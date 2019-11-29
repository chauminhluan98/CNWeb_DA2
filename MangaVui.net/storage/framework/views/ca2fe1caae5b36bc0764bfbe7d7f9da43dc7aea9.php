<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header">Edit a user</div>
		<div class="card-body">
			<form action="<?php echo e(url('/admin/users/edit')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<input type="hidden" id="id" name="id" value="<?php echo e($user->id); ?>" />
				<div class="form-group">
					<label for="name">Name <span class="text-danger font-weight-bold">*</span></label>
					<input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($user->name); ?>" required autocomplete="name" autofocus />
					<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<label for="username">Username <span class="text-danger font-weight-bold">*</span></label>
					<input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e($user->username); ?>" required autocomplete="username" />
					<?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<label for="email">E-Mail address <span class="text-danger font-weight-bold">*</span></label>
					<input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($user->email); ?>" required autocomplete="email" />
					<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-group">
					<label for="privilege">Privilege <span class="text-danger font-weight-bold">*</span></label>
					<select class="custom-select form-control <?php $__errorArgs = ['privilege'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="privilege" name="privilege" required>
						<option value="">-- Choose --</option>
						<option value="admin">Administrator</option>
						<option value="author" selected="selected">User</option>
					</select>
					<?php $__errorArgs = ['privilege'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
						<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
					<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				</div>
				<div class="form-check mb-2">
					<input class="form-check-input" type="checkbox" id="change_password_checkbox" name="change_password_checkbox" />
					<label class="form-check-label" for="change_password_checkbox">Change password</label>
				</div>
				<div id="change_password_group">
					<div class="form-group">
						<label for="password">New password <span class="text-danger font-weight-bold">*</span></label>
						<input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="new-password" />
						<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
					<div class="form-group">
						<label for="password-confirm">Confirm new password <span class="text-danger font-weight-bold">*</span></label>
						<input id="password-confirm" type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password_confirmation" autocomplete="new-password" />
						<?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span>
						<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					</div>
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#change_password_group").hide();
			$("#change_password_checkbox").change(function() {
				if($(this).is(":checked"))
				{
					$("#change_password_group").show();
					$("#change_password_group :input").attr("required", "required");
				}
				else
				{
					$("#change_password_group").hide();
					$("#change_password_group :input").removeAttr("required");
				}
			});
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\Wamp\www\inews_v2.0\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>