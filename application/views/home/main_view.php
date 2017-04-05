<body class="event-map">
<div class="container-justified" ng-controller="eventController">
  <div class="events" ng-repeat="event in events">
    <div class="event" style="top:{{event.latitude}}px;left:{{event.longitude}}px;" ng-click="showEvent(event)" hide-event="hideEvent()">
      <img src="<?= site_url('images/location_marker_32px.png'); ?>" /><br />
      <span><em>{{event.name}}</em></span>
    </div><!-- close div .event -->
  </div><!-- close div .events -->
  <div class="event-details">
    <div class="well" ng-show="eventDetails">
      <span><strong>Name:</strong> <span>{{event_name}}</span></span><br />
      <span><strong>Location:</strong> <span>{{event_location}}</span></span><br />
      <span><strong>Start Date:</strong> <span>{{event_start_date | date:"MM/dd/yyyy 'at' h:mma"}}</span></span><br />
      <span><strong>End Date:</strong> <span>{{event_end_date}}</span></span>
    </div>
    <button type="button" class="btn btn-primary btn-block" ng-click="bookYourPlace()" ng-disabled="bookYourPlaceButton">BOOK YOUR PLACE</button>
  </div><!-- close div .event-details -->
</div><!-- close div .container -->
