<?php
include "backend/functions.php";
include "partials/header.php";



?>

<body class="vertical-layout vertical-menu 2-columns  navbar-sticky layout-dark layout-transparent bg-glass-1" data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">
    <?php
    include "partials/navbar.php";
    ?>
    <div class="tab-content">
        <div class="tab-pane fade mt-2 show active" id="Particulier" role="tabpanel" aria-labelledby="account-tab">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered file-export">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th colspan="5">Masseuse info</th>
                                    <th>Handelingen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a data-toggle="modal" data-target="#info">
                                            <i class="ft-eye"></i>
                                        </a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i class="ft-bookmark mr-2"></i>Basic Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-light-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include "partials/footer.php";
