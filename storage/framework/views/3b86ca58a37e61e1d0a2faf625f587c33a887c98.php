
<?php $__env->startSection('content'); ?>
<style>
    .m-2 {
        margin: 2px;
    }

    .p-20 {
        padding-bottom: 15px;
        padding-top: 15px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .bg-w {
        background-color: white;
        border-radius: 10px;
    }

    .warn {
        border: 1px solid #fcefa1;
        background: #fbf9ee;
        color: #363636;
    }
</style>

    <div class="row">
         <?php if(Session::has("success")): ?>
            <div class="alert alert-success">
                <ul>
                    <li><?php echo e(Session::get("success")); ?></li>
                </ul>
            </div>
            <?php endif; ?>
    </div>
        <div class="col-md-6 bg-w d-flex">
            <div class="p-20 bg-w">
                <div class="row d-flex">
                    <div class="col-md-4 text-center">
                        <img src="<?php echo e(url('img/gmail.png')); ?>" alt="">
                    </div>
                    <div class="com-md-8">
                        <strong>Company Email Address</strong>
                        <p>After you have submitted all documentation, you will be assigned a ABC Co. email account and
                            a Salesperson ID.</p>

                        <p>Please check back in a few days for that information. Thank you!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-20">
                        <div class=" warn p-20 d-flex">
                            <span><i class="fa fa-info"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <p>
                                Please use your business email for all professional communications from now on. If you
                                have any questions, please feel free to contact your superior.<br><br>If you encounter
                                any technical issues, please submit a ticket for the IT department. </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="p-20 bg-w">
                <div class="row d-flex">
                    <div class="col-md-4 text-center">
                        <img src="<?php echo e(url('img/skype.png')); ?>" alt="">
                    </div>
                    <div class="com-md-8">
                        <p> <strong>Business-only Skype Address</strong></p>
                        <p><strong>Your Skype ID:</strong><?php if(Auth::user()->skypeid == ''): ?> Not Created Yet <?php else: ?> <?php echo e(Auth::user()->skypeid); ?> <?php endif; ?></p>
                        </p><strong>Your Skype Password:</strong> <?php if(Auth::user()->skypeid == ''): ?> Not Created Yet <?php else: ?> <?php echo e(Auth::user()->password_text); ?> <?php endif; ?></p>
                        <div class=" warn p-20 d-flex">
                            <span><i class="fa fa-info"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <p>
                                Please note, if you change your passwords they will NOT update here on this page. So
                                please keep record of your new passwords</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-20">
                        <div class="">
                            <p><strong>To download Skype, click <a href="http://www.skype.com/intl/en/download">
                                        here</a></strong></p>
                            <p>You will receive a skype-out subscription once you make your first sale and funds are
                                received. You must make a new sale at least once every 30 days to keep your subscription
                                active.
                            </p>
                            <p>If you haven't used Skype before, search YouTube for tutorials, or click on these:
                            </p>

                            <p><a href="http://www.youtube.com/watch?v=sodMDs7rEEk"> How to use Skype</a><br>
                                Once you have downloaded, installed, and logged in to skype, please add our National
                                Sales Director, , having skype ID and ping them to let them know you are ready to go.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 bg-w d-flex">
            <div class="p-20 bg-w">
                <div class="row d-flex">
                    <div class="col-md-12">
                        <img src="<?php echo e(url('img/mikogo-logo.png')); ?>" alt="">
                    </div>

                </div>
                <div class="row">
                    <div class="com-md-12">
                        <p>We use <strong>Mikogo</strong> to give screen-sharing presentations. Please click the link
                            below and follow the on screen instructions to create your free mikogo account at mikogo.com
                        </p>

                        <p><strong><a href="https://www.mikogo.com/account/register.php"> Create Account
                                    Here</a></strong></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="p-20 bg-w">
                <div class="row d-flex">
                    <div class="col-md-7">
                        <img src="<?php echo e(url('img/bcard.png')); ?>" alt="">
                    </div>
                    <div class="com-md-5">
                        <h4> <strong>Business Card</strong></h4>
                        <p>Click below to download your business card. You can take this to your local print shop,
                            Office-Max type place, or even an online printing company to have some made. This card
                            includes the .05" bleed area.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-20">
                        <div class="">
                            <p>(Your business card is not ready yet. Please check back in a couple of days.)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
    <?php echo Form::open(['action' => ['email_skype@update'],'id'=>'form']); ?>

    <?php echo e(Form::token()); ?>

    <div class="box-body">

        <div class="form-group">
            <h3>Notes About Myself</h3>
            <p>Additonal contact notes or information that will be displayed to your team members.</p>
        </div>
        <div class="form-group">
           
            <?php echo e(Form::textarea('descp', $da ,array('class' => 'form-control ckeditor','id' => 'editorblog','placeholder'
            => "Description",'required'=>'true'))); ?>

        </div>
       
        <div class="form-group">
            <?php echo e(Form::submit('Save',array('class' => 'btn btn-primary'))); ?>

        </div>


    </div>
    <?php echo Form::close(); ?>



    <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>