{{--
Title: Map
Description:
Category: vdi-blocks
Icon: grid-view
Keywords:
Mode: edit
Align:
PostTypes:
SupportsAlign: true
SupportsAlignText: true
SupportsAlignContent: true
SupportsInnerBlocks: true
SupportsMode: true
SupportsMultiple: true
EnqueueStyle:
EnqueueScript:
EnqueueAssets:
--}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
  integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>
<div class="px-4 sm:px-0">
  <div class="lg:flex justify-between items-center">
  <br />
  <div class="">
    <a class="sr-only focus:not-sr-only" href="#after-map">Skip map navigation</a>
    <p id="map-instructions" class="sr-only">
      This interactive map shows Alamos Mines and Projects. Use tab key to navigate between markers. 
      Press Enter on a marker to view community details. Press Escape to close details.
    </p>
  </div>
</div>
<div class="h-[75vh] w-full" id="map" role="application" aria-label="Map showing First Nations community locations" aria-describedby="map-instructions" style="width:100%; min-height:500px;">
</div>
<div id="after-map"></div>

<script>
$(document).ready(function() {
  if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
    $('#map').attr('role','application');
  }

  $('#map').attr('aria-busy', 'true')
          .append('<div id="map-loading" aria-live="polite" class="sr-only">Map is loading, please wait.</div>');
          
  var latTotal = 0;
  var lngTotal = 0;
  
var markerData = [
    {
    coords: [43.64745265773803, -79.37827784630323],
    alt: "Marker for Toronto Head Office",
    popup: `<div class="popup-content">
      <h3 class="text-xl font-bold mb-2">Toronto Head Office</h3>
      <p class="mb-2">The Alamos corporate office is based in Toronto, the mining finance capital of the world. Per the
        Ontario Mining Association, 43% of the world's public mining companies globally are listed on either the TSX or
        TSXV.</p>
<p><strong>Employees:</strong> 74</p>
      <p><strong>Contractors:</strong> 0</p>
    </div>`
    },
    {
    coords: [47.947160624449566, -80.67651664653803],
    alt: "Marker for Young-Davidson Mine",
    popup: `<div class="popup-content">
      <h3 class="text-xl font-bold mb-2">Young-Davidson</h3>
      <p class="mb-2">Young-Davidson is a low-cost, long-life operation and one of Canada's largest underground gold mines.
        With a large Mineral Reserve base and strong ongoing free cash flow generation, Young-Davidson will serve as Alamos'
        foundation for growth for many years to come.</p>
      <p><strong>Location:</strong> Matachewan, Ontario</p>
      <p><strong>Acquired:</strong> 2015</p>
      <p><strong>Method:</strong> Underground and carbon-in-leach (CIL) circuit</p>
      <p><strong>2024 Production:</strong> 174,000 ounces</p>
<p><strong>Employees:</strong> 753</p>
      <p><strong>Contractors:</strong> 129</p>
    </div>`
    },
    {
    coords: [48.30062551014685, -84.43396684348993],
    alt: "Marker for Island Gold Mine",
    popup: `<div class="popup-content">
<h3 class="text-xl font-bold mb-2">Island Gold District</h3>
      <p class="mb-2">The Island Gold District is comprised of the adjacent Island Gold and Magino mines, two long-life
        operations with a large mineral reserve and resource base and significant exploration upside. Island Gold is an
        underground mine and one of Canada's highest grade and lowest cost gold mines. Magino is a large open pit mining
        operation located within 300 meters of the Island Gold deposit. The combination of the Island Gold and Magino mines
        will create one of the largest and lowest-cost gold mines in Canada.</p>
      <h4 class="text-lg font-bold mb-1 mt-3">Island Gold Mine</h4>
      <p><strong>Location:</strong> Dubreuilville, Ontario</p>
      <p><strong>Acquired:</strong> 2017</p>
      <p><strong>Method:</strong> Underground and carbon-in-pulp (CIP) circuit</p>
      <p><strong>2024 Production:</strong> 155,000 ounces</p>
<p><strong>Employees:</strong> 591</p>
      <p><strong>Contractors:</strong> 125</p>
    </div>`
    },
    {
    coords: [48.29529046982324, -84.45509769426135],
    alt: "Marker for Magino Mine",
    popup: `<div class="popup-content">
      <h3 class="text-xl font-bold mb-2">Island Gold District</h3>
      <p class="mb-2">The Island Gold District is comprised of the adjacent Island Gold and Magino mines, two long-life
        operations with a large mineral reserve and resource base and significant exploration upside. Island Gold is an
        underground mine and one of Canada's highest grade and lowest cost gold mines. Magino is a large open pit mining
        operation located within 300 meters of the Island Gold deposit. The combination of the Island Gold and Magino mines
        will create one of the largest and lowest-cost gold mines in Canada.</p>
      <h4 class="text-xl font-bold mb-2">Magino Mine</h4>
      <p><strong>Location:</strong> Dubreuilville, Ontario</p>
      <p><strong>Acquired:</strong> July 2024</p>
      <p><strong>Method:</strong> Open pit and CIP circuit</p>
      <p><strong>H2 2024 Production:</strong> 33,000 ounces</p>
<p><strong>Employees:</strong> 319</p>
      <p><strong>Contractors:</strong> 123</p>
    </div>`
    },
    {
    coords: [29.02142269470052, -110.9055011600225],
    alt: "Marker for Hermosillo Regional Office",
    popup: `<div class="popup-content">
      <h3 class="text-xl font-bold mb-2">Hermosillo Regional Office</h3>
      <p class="mb-2">The Hermosillo Regional Office supports the Mulatos Mine Complex and exploration activities within
        Mexico. Several employees and support services are located full-time at the Hermosillo Office, including Finance,
        Procurement, and members of mine management.</p>
<p><strong>Employees:</strong> 55</p>
      <p><strong>Contractors:</strong> 4</p>
    </div>`
    },
    {
    coords: [28.644726550332962, -108.73820936475552],
    alt: "Marker for Mulatos District",
    popup: `<div class="popup-content">
      <h3 class="text-xl font-bold mb-2">Mulatos District</h3>
      <p class="mb-2">The Mulatos Mine District is Alamos Gold's founding operation and is comprised of the Mulatos and La
        Yaqui Grande mines. It was acquired for $10 million and has produced over 2.5 million ounces of gold and generated
~$470 million in free cash flow since 2005. Mulatos remains a consistent gold producer and significant cash flow
        generator, with strong exploration potential.</p>
      <p><strong>Location:</strong> Sonora, Mexico</p>
      <p><strong>Acquired:</strong> 2003</p>
      <p><strong>Method:</strong> Open-pit, heap-leach and adsorption-desorption-recovery (ADR) operations</p>
      <p><strong>2024 Production:</strong> 205,000 ounces</p>
<p><strong>Employees:</strong> 460</p>
      <p><strong>Contractors:</strong> 677</p>
    </div>`
    },
    {
    coords: [56.89703429599862, -100.95719225064089],
    alt: "Marker for Lynn Lake Project",
    popup: `<div class="popup-content">
      <h3 class="text-xl font-bold mb-2">Lynn Lake Project</h3>
      <p class="mb-2">Lynn Lake is one of the highest-grade open pit gold deposits in Canada. With its low costs and
        excellent infrastructure already in place, the project represents a significant opportunity to drive the future
        growth of our business in Canada. Alamos announced a positive construction decision for the Lynn Lake Project in
        January 2025.</p>
      <p><strong>Location:</strong> Lynn Lake, Manitoba</p>
      <p><strong>Acquired:</strong> 2016</p>
      <p><strong>Method:</strong> Future open-pit and CIP circuit</p>
<p><strong>Employees:</strong> 34</p>
      <p><strong>Contractors:</strong> 0</p>
    </div>`
    },
    {
    coords: [42.3191297653887, -120.78127399932006],
    alt: "Marker for Quartz Mountain Project",
    popup: `<div class="popup-content">
      <h3 class="text-xl font-bold mb-2">Quartz Mountain Project</h3>
      <p class="mb-2">The Quartz Mountain Project is a longer-term growth opportunity for Alamos. It has an established
        Mineral Resource and strong exploration potential through a large prospective land package.</p>
      <p><strong>Location:</strong> Oregon, USA</p>
      <p><strong>Acquired:</strong> 2013</p>
      <p><strong>Method:</strong> Future open-pit and heap leach operation</p>
      <p><strong>Employees:</strong> 0</p>
      <p><strong>Contractors:</strong> 0</p>
    </div>`
    },
    {
    coords: [30.793325652688992, -111.91544908781015],
    alt: "Marker for El Chanate",
    popup: `<div class="popup-content">
      <h3 class="text-xl font-bold mb-2">El Chanate</h3>
      <p class="mb-2">The El Chanate mine ceased mining activities in October 2018 and continues through the reclamation
        process.</p>
      <p><strong>Location:</strong> Sonora, Mexico</p>
      <p><strong>Acquired:</strong> 2015</p>
      <p><strong>Method:</strong> Former open-pit and heap leach operation</p>
<p><strong>Employees:</strong> 1</p>
      <p><strong>Contractors:</strong> 10</p>
    </div>`
    },
    {
    coords: [40.0136669020622, 26.728992960082998],
    alt: "Marker for Turkish Development Projects",
    popup: `<div class="popup-content">
      <h3 class="text-xl font-bold mb-2">Turkish Development Projects</h3>
      <p class="mb-2">The Turkish Development Projects are comprised of the Aği Daği, Kirazlı and Çamyurt projects in
        western Türkiye.</p>
      <p><strong>Location:</strong> Çanakkale Province, Türkiye</p>
      <p><strong>Acquired:</strong> 2010</p>
      <p><strong>Method:</strong> Future open-pit and heap leach operations</p>
<p><strong>Employees:</strong> 6</p>
      <p><strong>Contractors:</strong> 5</p>
    </div>`
    },
    {
    coords: [61.366982, -75.92229053],
    alt: "Marker for Qiqavik Gold Project",
    popup: `<div class="popup-content">
      <h3 class="text-xl font-bold mb-2">Qiqavik Gold Project</h3>
      <p class="mb-2">The Qiqavik Gold Project is an early-stage exploration project containing high-grade gold showings
        over a 40 kilometre strike of the Cape Smith Greenstone Belt.</p>
      <p><strong>Location:</strong> Nunavik, Quebec</p>
      <p><strong>Acquired:</strong> 2024</p>
      <p><strong>Employees:</strong> 0</p>
      <p><strong>Contractors:</strong> 0</p>
    </div>`
    }
    ];

  markerData.forEach(function(marker) {
    latTotal += marker.coords[0];
    lngTotal += marker.coords[1];
  });
  
  var centerLat = latTotal / markerData.length;
  var centerLng = lngTotal / markerData.length;
  


  var map = L.map('map').setView([centerLat, centerLng], 3);



  L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
    attribution: '&copy; <a target="_blank" href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a target="_blank" href="https://carto.com/attributions">CARTO</a>'
  }).addTo(map);
  
  var markerIcon = L.icon({
    iconUrl: '/wp-content/uploads/2025/04/marker.png',
    iconSize: [20, 30],
    shadowAnchor: [4, 62] 
  });
  
  var style = document.createElement('style');
  style.textContent = `
    .leaflet-popup-content-wrapper {
      max-width: 500px;
      min-width: 450px;
    }
    .leaflet-popup-close-button {
      padding: 20px !important;
      font-size: 18px !important;
    }
    #map,
    #map .leaflet-container,
    #map .leaflet-pane,
    #map .leaflet-control,
    #map .leaflet-popup {
    z-index: 1 !important;
    }
    #map .leaflet-popup,
    #map .leaflet-control {
    z-index: 2 !important;
    }
    .leaflet-attribution-flag svg {
      display: none !important;
    }
  `;
  document.head.appendChild(style);

  markerData.forEach(function(marker, index) {
    try {
      var markerInstance = L.marker(marker.coords, {
        icon: markerIcon,
        alt: marker.alt,
        keyboard: true,
        title: marker.alt.replace('Marker for ', '')
      }).bindPopup(marker.popup);

      markerInstance.on('add', function() {
        if (this._icon) {
          this._icon.tabIndex = 0;
          this._icon.setAttribute('aria-label', marker.alt);
          this._icon.setAttribute('role', 'button');
          this._icon.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
              markerInstance.openPopup();
            }
          });
        }
      });

      markerInstance.addTo(map);
    } catch(e) {
      console.error("Error adding marker:", e);
    }
  });
  
  setTimeout(function() {
    $('#map').attr('aria-busy', 'false');
    $('#map-loading').text('Map has finished loading. Use tab key to navigate between markers.').attr('aria-live', 'polite');
    
  
    map.invalidateSize();
    
  }, 1000);
  
  let anchors = document.getElementsByTagName('a');
  for (let i = 0; i < anchors.length; i++) {
    if (anchors[i].title === 'A JS library for interactive maps') {
      anchors[i].target = '_blank';
      anchors[i].setAttribute('aria-label', 'Leaflet library website');
      break;
    }
  }
  
  $('.leaflet-shadow-pane').remove();
  $('.leaflet-tile-container img, .leaflet-shadow-pane img').attr('role', 'presentation').attr('alt', '');
  
  // Focus Management
  map.on('popupopen', function(popup) {
    $(popup.popup._container).find('.leaflet-popup-content')
      .attr('tabindex', '0')
      .focus()
      .attr('aria-live', 'polite');
    
    $(popup.popup._container).on('keydown', function(e) {
      if (e.key === 'Escape') {
        map.closePopup();
      }
    });
    

    var close = $(popup.popup._container).find('.leaflet-popup-close-button');
    $(popup.popup._container).find('.leaflet-popup-close-button').remove();
    close.attr('title', 'Close item')
         .attr('aria-label', 'Close popup');
    $(popup.popup._container).append(close);
  });
  
  // map.on('popupclose', function(popup) {
  //   if (popup.popup._source && popup.popup._source._icon) {
  //     $(popup.popup._source._icon).focus();
  //   }
  // });

  // --- Prevent scroll/zoom from being caught by the map until user clicks ---
  map.scrollWheelZoom.disable();
  map.touchZoom.disable();
  map.doubleClickZoom.disable();
  map.boxZoom.disable();
  map.keyboard.disable();

  // Remove any pointer-events or wheel event handlers related to sleep/wake
  $('#map .leaflet-container').css('pointer-events', 'auto');
  $('#map .leaflet-container').off('wheel');
  $(document).off('keydown', wakeMap);
  $(document).off('touchstart', wakeMap);

  // Only enable zoom interactions after a click on the map container
  function enableMapZoom() {
    map.scrollWheelZoom.enable();
    map.touchZoom.enable();
    map.doubleClickZoom.enable();
    map.boxZoom.enable();
    map.keyboard.enable();

    // Remove the click listener after activation
    $('#map .leaflet-container').off('click', enableMapZoom);
  }
  $('#map .leaflet-container').on('click', enableMapZoom);
  // --- End scroll/zoom prevention ---

  $('#map .leaflet-container').on('wheel', function (e) {
    e.preventDefault();
  });



  function wakeMap() {
    $('#map .leaflet-container').css('pointer-events', 'auto');
    $('#map .leaflet-container').off('wheel');
    $('#map-sleep-overlay').remove();
    $(document).off('keydown', wakeMap);
  }

  $(document).on('keydown', wakeMap);
  $(document).on('touchstart', wakeMap);
});


</script>
