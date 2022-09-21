<?php
include "backend/functions.php";
include "partials/header.php";
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
                                <?php masseuseInfo(); ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "partials/footer.php";
