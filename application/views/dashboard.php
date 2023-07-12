<div class="content-wrapper">

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <br>
        <h3 class="m-0"><strong>Welcome <?php echo $user->surname; ?>,</strong></h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>


<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-3 col-6">

        <div class="small-box bg-<?php echo $color; ?>">
          <div class="inner">
          <h3 style="font-size: 2.0rem;"><?php echo number_format($tenancy->balance); ?> <sup style="font-size: 15px">UGX</sup></h3>
            <p><strong><?php echo $text; ?>:</strong></p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
          <a href="#" class="small-box-footer" type="button" data-toggle="modal" data-target="#modal-default">Make Payment <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
          <div class="inner">
            <!--<h3 style="font-size: 1.8rem;">120,000 <sup style="font-size: 15px">UGX</sup></h3> -->
            <h3 style="font-size: 2.0rem;">20 June 2023</h3>
            <p><strong>Date of Next Payment:</strong></p>
            
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">View Tenancy Details <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
          <div class="inner">
            <h3 style="font-size: 1.8rem;">1</h3>
            <p><strong>Pending Maintainence Requests</strong></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">Make Request <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-dark">
          <div class="inner">
          <h3 style="font-size: 1.8rem;"><?php echo $tenancy->yaka; ?></h3>
            <p><strong>Yaka No:</strong></p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">Pay Bill <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>



  </div>
</section>

<section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><strong>RECENT TRANSACTIONS</strong></h3>
                </div>

                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Currency</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Payment Type</th>
                        <th>Receipt</th>
                      </tr>
                    </thead>
                    <tbody>
                
                       <?php

                       foreach($transactions as $trans){

                        echo '
                      <tr>
                        <td>'.$trans->sortcode.'</td>
                        <td>'.number_format($trans->amountpaid).'</td>
                        <td>'.$trans->transactiondate.'</td>
                        <td>'.$trans->paymenttype.'</td>
                        <td><button class="btn btn-success toastrDefaultSuccess">View Receipt</button></td>
                      </tr>';


                       }

                       ?>
                      

                    </tbody>
                    <!--
                    <tfoot>
                      <tr>
                      <th>Payment Date</th>
                        <th>Payment Type</th>
                        <th>Currency</th>
                        <th>Amount</th>
                      </tr>
                      -->
                    </tfoot>
                  </table>
                </div>

              </div>

            </div>

          </div>

        </div>

      </section>


</div>

<div class="modal fade" id="modal-overlay">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
              </div>
              <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>

          </div>

  </div>


