<?php include("Head.php") ?>
<?php include('../Assets/Connection/Connection.php'); ?>
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Dashboard</h2>
        <div class="row stat-cards">
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon primary">
                <i data-feather="bar-chart-2" aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">1478 286</p>
                <p class="stat-cards-info__title">Total visits</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success">
                    <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon warning">
                <i data-feather="file" aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">1478 286</p>
                <p class="stat-cards-info__title">Total visits</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success">
                    <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon purple">
                <i data-feather="file" aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">1478 286</p>
                <p class="stat-cards-info__title">Total visits</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit danger">
                    <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon success">
                <i data-feather="feather" aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">1478 286</p>
                <p class="stat-cards-info__title">Total visits</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit warning">
                    <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-9">
            <div class="chart">
              <canvas id="myChart" aria-label="Site statistics" role="img"></canvas>
            </div>
            <div class="users-table table-wrapper">
              <h2>Staff Data</h2>
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
                    <th>SLNO</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=0;
                  $sel = "select * from tbl_staff";
                  $result = $con -> query($sel);
                  while($data = $result -> fetch_assoc())
                  {
                    $i++;
                  ?>
                  <tr>
                    <td>
                      <?php echo $i ?>
                    </td>
                    <td>
                      <div class="pages-table-img">
                        <picture><source srcset="../Assets/File/Staff/<?php echo $data["staff_photo"]; ?>" type="image/webp"><img src="./img/avatar/avatar-face-04.png" alt="User Name"></picture>
                      </div>
                    </td>
                    <td>
                      <?php echo $data["staff_name"]; ?>
                    </td>
                    <td>
                      <?php echo $data["staff_email"]; ?>
                    </td>
                    <td>
                      <?php echo $data["staff_contact"]; ?>
                    </td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php include("Foot.php") ?>