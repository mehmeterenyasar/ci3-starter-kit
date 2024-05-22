
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    
                    <li>
                        <a class = "<?php active('admin'); ?>" href="<?= base_url('admin') ?>" >
                            <i class="fa fa-tachometer menu-icon"></i><span class="nav-text">Panel</span>
                        </a>
                    </li>

                    <li>
                        <a class = "<?= active('messages').active('send_message').active('message_sent_successfully') ?>" href="<?= base_url('messages') ?>" >
                            <i class="fa fa-envelope menu-icon"></i><span class="nav-text">Messages</span>
                        </a>
                    </li>   


                    <li>
                        <a class = "<?= active('changepassword') ?>" href="<?= base_url('changepassword') ?>" >
                            <i class="fa fa-lock menu-icon"></i><span class="nav-text">Change Password</span>
                        </a>
                    </li>   


                    <li>
                        <a class = "<?php active('user'); ?>" href="<?= base_url('user') ?>" >
                            <i class="fa fa-users menu-icon"></i><span class="nav-text">Admins</span>
                        </a>
                    </li>   

                    <hr>
                    <li class="nav-label">Modules</li>
                    
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-object-group menu-icon"></i> <span class="nav-text">Accounting</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a class = "<?php active('customers').active('customer_detail'); ?>" href="<?php echo base_url('accounting/customers'); ?>">Customers</a></li>
                            <li><a class = "<?php active('cash_registers').active('register_detail'); ?>" href="<?php echo base_url('accounting/cash_registers'); ?>">Cash Registers</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-calendar menu-icon"></i> <span class="nav-text">Appointment</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a class = "<?php active('appointment_management').active('create_appointment'); ?>" href="<?php echo base_url('appointments/appointment_management'); ?>">Appointment Management</a></li>
                            <li><a class = "<?php active('front_end'); ?>" href="<?php echo base_url('appointments/front_end'); ?>">Front-End</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class = "<?php active('reporting'); ?>" href="<?= base_url('reporting') ?>" >
                            <i class="fa fa-line-chart menu-icon"></i><span class="nav-text">Reporting (Charts)</span>
                        </a>
                    </li>  
                    

                    <li>
                        <a class = "<?php active('map'); ?>" href="<?= base_url('map') ?>" >
                            <i class="fa fa-map menu-icon"></i><span class="nav-text">Map</span>
                        </a>
                    </li>  


                    <hr>

                    <li>
                        <a class="" href="<?= base_url('admin/logout') ?>" onclick="return confirm('Are you sure to logout?')">
                            <i class="fa fa-sign-out menu-icon"></i><span class="nav-text">Log Out</span>
                        </a>
                    </li>

                    
                    
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

