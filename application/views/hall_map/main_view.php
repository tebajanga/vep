<body class="hall-map" ng-controller="hallController">
<div class="container-justified">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hall-map-top">
      <br />
      <h2>Choose your Stand</h2>
      <hr />
    </div>
    <input type="hidden" value="<?= $event_id; ?>" id="event_id"/>
  </div><!-- close div .row -->
  <br />
  <div class="container">
    <div class="row row-stands">
      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 stand" ng-repeat="stand in stands" ng-click="reserveStand(stand)">
        <span class="status" style="background:{{stand.status_color}};">{{stand.status}}</span>
        <p class="stand-free" ng-if="stand.status == 'Free'">
          <span class="price">{{stand.price}}</span>
        </p>

        <p class="booked" style="background:;margin-top:10px;" ng-if="stand.status == 'Booked'">
          <img src="<?= base_url().$this->config->item('company_logo_path'); ?>{{stand.company.logo}}" class="company-logo img-circle"/>
          <br />
          <span>{{stand.company.name}}</span><br />
          <span>{{stand.company.phone_number}}</span><br />
          <span>{{stand.company.website}}</span><br />
          <span><a href="<?= base_url().$this->config->item('company_document_path'); ?>{{stand.company.marketing_document}}">Company Marketing Document</a></span>
        </p>
      </div>
    </div>
  </div><!-- close div .container -->

  <script  type="text/ng-template" id="standDetails">
      <div class="ngdialog-message">
        <br />
        <img src="<?= site_url().$this->config->item('stand_image_path'); ?>{{stand.thumbnail}}" class="img-responsive"/>
        <h4>{{stand.name}}</h4>
        <h5>{{stand.description}}</h5>
        <hr />
        <h5><strong>Price :</strong> <span style="color: #fe5f55;">{{stand.price}}</span></h5>
        <h5><strong>Size  :</strong> {{stand.size}}</h5>
        <h5><strong>Capacity :</strong> {{stand.capacity}}</h5>
      </div>
      <div class="ngdialog-buttons">
          <button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="reserve(stand)">RESERVE</button>
      </div>
  </script>

</div><!-- close div .container-justified -->
