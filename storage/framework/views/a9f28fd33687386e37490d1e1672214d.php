<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Edit Tweet')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <?php if(auth()->guard()->check()): ?>
                            <?php if($tweet->user_id !== Auth::id()): ?>
                                <div class="alert alert-danger">You are not authorized to edit this tweet.</div>
                                @return
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- Success Message -->
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <!-- Error Messages -->
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    
                        <!-- Form to edit tweet -->
                        <form action="<?php echo e(route('tweets.update', $tweet->id)); ?>" method='POST'>
                            <?php echo csrf_field(); ?> 
                            <?php echo method_field("PUT"); ?>

                            <div class="mb-3">
                                <label for="tweetText" class="form-label">What's on your mind? (Max 280 characters)</label>
                                <textarea id="tweetText" name="new_text" class="form-control" rows="4" maxlength="280" required><?php echo e(old("new_text", $tweet["text"])); ?></textarea>
                                <small class="text-muted float-end"><span id="charCount">280</span> characters remaining</small>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Update Tweet</button>
                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary">Cancel</a>
                            </div>

                            <?php $__env->startPush('scripts'); ?>
                            <script>
                                document.getElementById('tweetText').addEventListener('input', function() {
                                    const maxLength = 280;
                                    const remaining = maxLength - this.value.length;
                                    document.getElementById('charCount').textContent = remaining;
                                });
                            </script>
                            <?php $__env->stopPush(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\Laravel-crud-main - Copy\resources\views/tweets/edit.blade.php ENDPATH**/ ?>