<body class="registration-map" ng-controller="registrationController">
<div class="container-justified">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hall-map-top">
      <br />
      <h2>Registration</h2>
      <hr />
    </div>
  </div><!-- close div .row -->
  <br />
  <div class="container">
    <div class="row">
      <form>
        <div class="col-md-6">
          <div class="form-group">
            <label for="usr">Company Name</label>
            <input type="text" class="form-control" name="name" ng-model="company.name" placeholder="Company Name">
          </div>
          <div class="form-group">
            <label for="usr">Owner</label>
            <input type="text" class="form-control"  name="owner" ng-model="company.owner" placeholder="Owner">
          </div>
          <div class="form-group">
            <label for="usr">Location</label>
            <input type="text" class="form-control" name="location" ng-model="company.location" placeholder="Location">
          </div>
          <div class="form-group">
            <label for="usr">Phonenumber</label>
            <input type="text" class="form-control" name="phonenumber" ng-model="company.phonenumber" placeholder="Phonenumber">
          </div>
        </div><!-- close div .col-md-6 -->

        <div class="col-md-6">
          <div class="form-group">
            <label for="usr">Website</label>
            <input type="text" class="form-control"  name="website" ng-model="company.website" placeholder="Website">
          </div>
          <div class="form-group">
            <label for="usr">Admin Email</label>
            <input type="text" class="form-control" name="admin_email" ng-model="company.admin_email" placeholder="Admin Email">
          </div>
          <div class="form-group">
            <label for="usr">Logo</label>
            <input type="file" file-input="logo" class="form-control" name="logo">
          </div>
          <div class="form-group">
            <label for="usr">Marketing Document</label>
            <input type="file" file-input="document" class="form-control" name="document">
          </div>
          <input type="hidden" value="<?= $stand->stand_id; ?>" id="stand_id"/>
          <input type="hidden" value="<?= $stand->event_id; ?>" id="event_id"/>
        </div><!-- close div .col-md-6 -->

        <div class="col-md-12">
          <div class="form-group">
            <button type="button" class="pull-right btn btn-primary" ng-click="confirmReservation()">CONFIRM RESERVATION</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- close div .container -->

</div><!-- close div .container-justified -->
