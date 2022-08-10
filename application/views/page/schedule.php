<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <div class="text-center"><?php echo $this->session->flashdata('message'); ?></div>
            <?php echo validation_errors(); ?>
            <a href="<?= base_url('Page/history') ?>" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="bi-bootstrap-reboot"></i>
                </span>
                <span class="text">Report History</span>
            </a>
        </div> -->
        <div class="card-body">
            <div class="text-center"><?php echo $this->session->flashdata('message'); ?></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">Full Name</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                        <?php $no = 0;
                        foreach ($schedule as $p) { ?>
                            <tr>
                                <td class="text-center" width="10px"><?= ++$no ?></td>
                                <td class="text-center" width="50px"><?= date('Y, d M', strtotime($p['tanggal'])) ?></td>
                                <td class="text-center" width="20px"><?= date('H:i', strtotime($p['waktu'])) ?></td>
                                <td class="text-left"><?= $p['namaku'] ?></td>
                                <td class="text-center" width="10px"><?= $p['katagori'] ?></td>
                                <td class="text-left"><?= $p['pesan'] ?></td>
                                <td class="text-center" width="70px">
                                    <button title="update" id="edit_scdhl" data-id="<?= $p['idschedule'] ?>" class="btn btn-primary btn-sm bi-pencil" data-toggle="modal" data-target="#editscdhl"></button>
                                    <button title="remove" id="delt_scdhl" data-id="<?= $p['idschedule'] ?>" class="btn btn-danger btn-sm bi-trash" data-toggle="modal" data-target="#deltscdhl"></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<div class="modal fade" id="editscdhl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #b2b5fb;">
                <h4 class="modal-title text-primary">Edit Schedule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-schdlb">
                <div class="form-group">
                    <form method="post" action="<?php echo base_url('Page/edit_schedule'); ?>">
                        <div id="ajax_eschedule">
                            <h4>Unavailable !</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <input type="submit" name="simpan" class="btn btn-primary" value="Update" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deltscdhl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fbb2b2;">
                <h4 class="modal-title text-danger">Delete Schedule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-delt">
                <div class="form-group">
                    <form id="form" method="post" action="<?php echo base_url('Page/delete_schedule'); ?>">
                        <input type="hidden" id="idkode" name="idkode" required />
                        <h4>Do you want to delete?</h4>
                        <div class="table-responsive">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <input type="submit" name="hapus" class="btn btn-danger" value="Yes, Delete" />
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>