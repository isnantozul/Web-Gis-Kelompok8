          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>
            <a target="_blank" class="btn btn-primary mb-2" href="<?= base_url("admin/download") ?>"><i class="fas fa-print"></i> Download Data</a>
            <div class="row">
              <div class="col-lg-6">
                <?php echo $this->session->flashdata('message') ?>
                <table class="table table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Location</th>
                      <th scope="col">User Send</th>
                      <th scope="col">User Role</th>
                      <th scope="col" width="100%">Date Created</th>
                      <th scope="col" width="100%">Date Updated</th>
                      <th scope="col" width="100%">User Edit</th>
                      <th scope="col" width="100%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($map as $r) : ?>
                      <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $r['location']; ?></td>
                        <td><?php echo $r['user_send']; ?></td>
                        <?php if ($r["role_id"] == 1) : ?>
                          <td><?php echo "Administrator" ?></td>
                        <?php else : ?>
                          <td><?php echo "Member" ?></td>
                        <?php endif; ?>

                        <td><?php echo date('d F Y', $r['date_created']); ?></td>
                        <?php if ($r["date_updated"] == 0) : ?>
                          <td></td>
                        <?php else : ?>
                          <td><?php echo date('d F Y', $r['date_updated']); ?></td>
                        <?php endif; ?>
                        <td><?php echo $r['user_edit']; ?></td>

                        <td>
                          <button type="button" class="btn btn-danger deleted" id="<?php echo $r["id"] ?>">
                            Delete
                          </button>

                          <a href="<?= base_url('admin/edit_map/') . $r["id"] ?>" type="button" class="btn btn-primary">Edit</a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
          <!-- /.container-fluid -->

          </div>
          <!-- End of Main Content -->

          <div class=" modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Delete Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Are You Sure Want to Delete the Map Data?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a href="" type="button" class="btn btn-danger modalDelete">Delete</a>
                </div>
              </div>
            </div>
          </div>