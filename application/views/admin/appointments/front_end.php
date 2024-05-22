<?php $this->load->view('admin/include/header'); ?>
<?php $this->load->view('admin/include/sidebar'); ?>

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Appointment Schedule</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <?php
                                $today = date('N'); // Haftanın gününü sayısal olarak al (1 = Pazartesi, 7 = Pazar)
                                for ($i = 0; $i < 7; $i++) {
                                    $date = date('m/d/Y', strtotime("+$i day"));
                                    $dayName = date('l', strtotime("+$i day"));
                                    echo "<th scope='col'>" . $date . '<br>' . $dayName . "</th>\n";
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $time_slots = ['08', '09', '10', '11', '12', '13', '14', '15', '16', '17'];

                            function check_shift_status($hour, $date)
                            {
                                $check = shift::find(['date' => $date, 'hour_' . $hour => 1]);
                                return $check ? true : false;
                            }

                            foreach ($time_slots as $hour) {
                                echo "<tr>";
                                for ($i = 1; $i <= 7; $i++) {
                                    $date = date('Y-m-d', strtotime('tomorrow +' . ($i - 1) . ' day'));
                                    $is_active = check_shift_status($hour, $date);

                                    if ($is_active) {
                                        $modalId = 'exampleModal' . $hour . '_' . $i; 
                                        echo "<td class='text-center'> <button type='button' class='btn btn-primary btn-block' data-toggle='modal' data-target='#$modalId' data-zaman='$date $hour:00'> $hour:00 </button> </td>"; ?>

                                        <!-- Modal -->
                                        <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitle"> Book Appointment - <?php echo date('m/d/Y', strtotime($date)) . ' | ' . $hour . ':00'; ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="" method="POST" enctype="multipart/form-data" action="<?= base_url('appointments/book_appointment') ?>">
                                                            <div class="form-group">
                                                                <label for="ad_soyad">Name - Surname</label>
                                                                <input type="text" name="name_surname" class="form-control" autocomplete="off" required>
                                                            </div>
                                                            <input type="hidden" name="date" value="<?= $date . ' ' . $hour . ':00' ?>">
                                                            
                                                            <div class="form-group">
                                                                <label for="email">E-mail</label>
                                                                <input type="email" name="email" class="form-control" autocomplete="off" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tel">Phone Number</label>
                                                                <input type="text" name="tel" class="form-control" autocomplete="off" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="mesaj">Your Message</label>
                                                                <textarea name="message" class="form-control" rows="4" placeholder="Your Message"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary  " data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Book Appointment</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        echo "<td class='text-center'> <a class='btn btn-warning btn-block text-white disabled'>Unavailable</a> </td>";
                                    }
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->

<?php $this->load->view('admin/include/footer'); ?>
