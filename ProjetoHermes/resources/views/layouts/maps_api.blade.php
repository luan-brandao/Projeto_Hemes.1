<!DOCTYPE html>
<html>
  <head>
    <title>Simple Marker</title>
    <!-- The callback parameter is required, so we use console.debug as a noop -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYpX74MDVl2DnBv3B34URbUWVXsr9aUI4&callback=console.debug&libraries=maps,marker&v=beta">
    </script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      gmp-map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <gmp-map center="-22.915822982788086,-42.819297790527344" zoom="14" map-id="DEMO_MAP_ID">
      <gmp-advanced-marker position="-22.915822982788086,-42.819297790527344" title="My location"></gmp-advanced-marker>
    </gmp-map>
  </body>
</html>