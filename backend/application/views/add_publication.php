
<!--editPublications modal -->
<div class="modal fade" id="editPublicationModal2" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4>Edit Publications</h4>
      </div>
      <div class="modal-body">
        <textarea id="editPublicationContent2" name="editPublicationContent2"></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-default pull-left">บันทึก</button>
        <button class="btn btn-primary btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
      </div>
      <!--end modal footer-->
    </div>
    <!--end modal content-->
  </div>
  <!--end modal dialog-->
</div>
<!--end editPublication modal-->

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">ผลงานตีพิมพ์</h3>
      </div>
      <div class="content-header-right col-md-8 col-12">
        <div class="breadcrumbs-top float-md-right">
          <div class="breadcrumb-wrapper mr-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('main/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">ผลงานตีพิมพ์
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content-body">
      <!-- Line Awesome section start -->
      <section id="header-footer">
        <div class="row match-height">


          <div class="col-12">

            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>
                        <span id="publication" class='dashboard-title'>ข้อมูลผลงานตีพิมพ์</span>
                    </div>
                    </h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <?php foreach ($publications as $publication) : ?>
                        <div class="row">
                          <div class="col-md-10"><?= $publication->detail ?></div>

                          <div class="col-md-2">
                            <a href='#editPublicationModal2' data-toggle='modal' data-id='<?= $publication->id ?>'><i class="fa fa-pencil"></i></a>
                            <a href='#' class="delete-publication" data-id='<?= $publication->id ?>'><i class="fa fa-remove"></i></a>
                            <a href='#' class="sort-publication" data-direction="up" data-sort-order="<?= $publication->sortOrder ?>" data-id='<?= $publication->id ?>'><i class="fa fa-angle-double-up"></i></a>
                            <a href='#' class="sort-publication" data-direction="down" data-sort-order="<?= $publication->sortOrder ?>" data-id='<?= $publication->id ?>'><i class="fa fa-angle-double-down"></i></a>
                          </div>

                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>




          </div>
        </div>

    </div>
    </section>
      <section id="line-awesome-icons">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title dashboard-title" id="publication2">เพิ่มผลงานตีพิมพ์</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>

                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                  </ul>
                </div>
              </div>


              <div class="ml-6">
                <!--start content -->
                <br>
                <div class="ml-3 mr-3">
                <textarea id="addPublicationContent" name="addPublicationContent"></textarea>
                </div>
                <button id="addPublicationContent_bt" type="button" onclick="" class="btn btn-success btn-default pull-right m-2 mr-2">บันทึก</button>
                <br>

              </div>




            </div>
          </div>
        </div>
      </section>
      <!-- // Line Awesome section end -->