<?php require '../controllers/profile-controller.php'; ?>

<?php include './partials/header.php'; ?>
<?php include './partials/navbar.php'; ?>


  <div class="profile">
    <div class="personal-info">
      <div class="header">
        <h3 class="name"><img src="../assets/img/profile-default-male.png" alt=""><?= $userinfo[0]['username'];?></h3>
      </div>
      <table>
        <tr>
          <td>First Name:</td>
          <td><?= $userinfo[0]['fname'];?></td>
        </tr>
        <tr>
          <td>Last Name:</td>
          <td><?= $userinfo[0]['lname'];?></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><?= $userinfo[0]['email']; ?> &nbsp<a class="email" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
        </tr>
        <tr>
          <td># of Jobs Posted:</td>
          <td>100000000</td>
        </tr>
        <tr>
          <td># of Jobs Applied:</td>
          <td>None</td>
        </tr>
      </table>
    </div>
  </div>


<?php include './partials/footer.php'; ?>
