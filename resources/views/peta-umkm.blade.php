<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="{{ asset('map-style.css') }}">
    <title>Peta Umkm</title>
</head>

<body>
    <div id="map"></div>
    <script>
        // map configuration
let config = {
    minZoom: 14,
    maxZoom: 18,
    zoomControl: false,
    attributionControl: false,
  };
  // inital zoom level
  const zoom = 14;
  // inital co-ordinates
  const lat = -8.101885;
  const lng = 112.197382;
  
  // calling map
  const map = L.map("map", config);
  
  // initailize the borderline of desa papungan
  let batasDaerah = [
    [-8.08854, 112.202775],
    [-8.088252, 112.2051],
    [-8.090349, 112.206055],
    [-8.093103, 112.206595],
    [-8.093596, 112.208007],
    [-8.113905, 112.203107],
    [-8.115025, 112.199428],
    [-8.11404, 112.193291],
    [-8.111905, 112.19343],
    [-8.111577, 112.192241],
    [-8.111987, 112.191356],
    [-8.11333, 112.190527],
    [-8.113922, 112.186348],
    [-8.112106, 112.187073],
    [-8.111388, 112.1859],
    [-8.110924, 112.185793],
    [-8.10818, 112.187968],
    [-8.107758, 112.18779],
    [-8.107313, 112.187787],
    [-8.106657, 112.18791],
    [-8.106107, 112.188075],
    [-8.105685, 112.188342],
    [-8.105441, 112.188379],
    [-8.10529, 112.188443],
    [-8.105105, 112.188711],
    [-8.105006, 112.189038],
    [-8.105056, 112.189439],
    [-8.105206, 112.189765],
    [-8.105194, 112.189906],
    [-8.105035, 112.19002],
    [-8.104377, 112.189861],
    [-8.103889, 112.189837],
    [-8.103725, 112.189918],
    [-8.103614, 112.190147],
    [-8.103142, 112.191367],
    [-8.10297, 112.191539],
    [-8.102804, 112.19156],
    [-8.102092, 112.191395],
    [-8.101955, 112.191431],
    [-8.101704, 112.191615],
    [-8.101562, 112.191662],
    [-8.101461, 112.191659],
    [-8.101303, 112.191692],
    [-8.100834, 112.191877],
    [-8.100766, 112.191996],
    [-8.100736, 112.192299],
    [-8.100512, 112.192549],
    [-8.100318, 112.192643],
    [-8.099838, 112.193317],
    [-8.100451, 112.193496],
    [-8.100609, 112.194025],
    [-8.093764, 112.197815],
    [-8.093068, 112.198984],
    [-8.09363, 112.199626],
    [-8.092139, 112.201737],
    [-8.089854, 112.202737],
    [-8.089511, 112.203082],
    [-8.088888, 112.2027],
  ];
  // create a polygon from the borderline of desa papungan
  let polygon = L.polygon(batasDaerah, {
    color: "#2D68F8",
    weight: 2,
    fillOpacity: 0.05,
    dashArray: "8, 5",
  }).addTo(map);
  
  // set the view of the map
  map.setView(polygon.getBounds().getCenter(), zoom);
  
  // array to store all of the markers in the map
  const markers = [];
  
  // Used to load and display tile layers on the map
  // Most tile servers require attribution, which you can set under `Layer`
  L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    maxZoom: config.maxZoom,
    minZoom: config.minZoom,
    attribution: "",
  }).addTo(map);
  
  // add zoom control on the top right of the map
  L.control
    .zoom({
      position: "topright",
    })
    .addTo(map);
  
  // pane for the fixed popup
  let pane = map.createPane("fixed", document.getElementById("map"));
  
  // create a default icon for the marker
  const icon = L.icon({
    iconUrl: "/img/map.svg",
    iconSize: [32, 56],
    iconAnchor: [17, 40],
  });
  
  // create the marker icon that will be active when the marker is clicked
  const clickedIcon = L.icon({
    iconUrl: "/img/clicked-map.svg",
    iconSize: [40, 40],
    iconAnchor: [21, 36],
  });
  
  // data dummy
  const points = [
    {
      lat: -8.095087,
      lng: 112.204605,
      text: '<img src="https://banggaikep.go.id/portal/wp-content/uploads/2024/03/jokowi-1-845x321.jpg" style="max-width: 200px"><h1>Ayda Opak Gambir</h1><h4>085604770211 (Bety Wahyuni)</h4><p>Opak gambir mek sepuluh ewu? mawurah cik!Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, totam officia eos dicta ullam fuga ut at eveniet tenetur debitis placeat, harum explicabo impedit architecto.Veniam nihil reiciendis libero sequi! Lorem ipsum, dolor sit amet consectetur adipisicing elit.Ipsa beatae placeat odio vel velit, fugit dicta laborum labore iste asperiores.Quo facere, magni similique id quasi doloremque sapiente assumenda magnam. Fuga quia delectus totam tenetur temporibus aperiam voluptate porro illum doloribus officiis quaerat, praesentium impedit cupiditate possimus id laboriosam quibusdam commodi nostrum sed odio minus consequatur repellat fugiat? Obcaecati, similique.</p> ',
      title: "Ayda Opak Gambir",
    },
    {
      lat: -8.111467,
      lng: 112.197807,
      text: "<h1>Aneska Camilan</h1><h4>Bu Titin</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam finibus vitae felis a aliquam. Fusce in aliquam libero, quis feugiat enim. Quisque ex magna, laoreet vitae venenatis quis, sagittis fringilla urna. Nam dapibus eget augue in vestibulum. Pellentesque quis justo felis. Donec eget libero odio. Sed ut mi orci. Suspendisse potenti. Nulla rhoncus justo sed nibh eleifend laoreet. Integer aliquam varius lacus, eget vestibulum ex iaculis a. In hac habitasse platea dictumst. Mauris eget orci dictum, convallis turpis non, feugiat eros. Praesent tristique libero risus. Mauris laoreet vel eros non finibus. Nunc consectetur hendrerit quam, in iaculis libero consectetur non. Suspendisse at erat ut diam tincidunt semper ac id orci. Donec commodo ex sed efficitur gravida. Curabitur fringilla pulvinar orci quis mollis. Duis ultrices nisl at lorem facilisis sodales. Maecenas vestibulum mollis lacus, ut rhoncus ex volutpat vitae. Donec id placerat leo, id blandit ipsum. Morbi sit amet bibendum sem. Donec nisi libero, maximus vitae velit eget, pulvinar sollicitudin magna. Aliquam mi risus, tincidunt a pellentesque sed, dapibus sed mauris. Vivamus malesuada accumsan molestie. Suspendisse pulvinar odio a quam mattis semper. Nam auctor sapien vitae tellus hendrerit, vel lobortis sapien faucibus. Praesent consequat ullamcorper est. Donec dignissim mattis felis vel rutrum. Aenean pretium nunc quis dolor ultrices aliquam. Quisque faucibus arcu suscipit ante dapibus, nec dignissim orci gravida. Quisque sit amet diam ante. Integer scelerisque magna sed luctus dignissim. Proin eget magna semper, laoreet massa eget, cursus ligula. Integer non nisl velit. Nunc ut ante libero. Aliquam molestie aliquet augue non venenatis. Sed malesuada lobortis mi sed sollicitudin Nam vulputate iaculis mi. Maecenas quis neque felis. Proin lobortis lacus neque. Suspendisse potenti. Nunc sed enim eleifend ex ultrices luctus. Nam ut metus ut lacus tempus mattis nec eu ex. Proin eu neque condimentum, rhoncus diam id, vestibulum metus. Nunc feugiat mi quis neque aliquam viverra. Duis laoreet velit justo, eu imperdiet enim sagittis id. Praesent efficitur a est hendrerit rutrum. Praesent sit amet imperdiet mi.</p>",
      title: "Aneska Camilan",
    },
  ];
  
  polygon.addTo(map);
  
  // create the marker for each data in the data dummy array
  points.map(({ lat, lng, text, title }) => {
    // add the marker to the map
    const marker = L.marker([lat, lng], {
      icon: icon,
      titl: title,
    }).addTo(map);
  
    // put the marker to the markers array
    markers.push(marker);
  
    // create a popup object for each marker / data
    const popup = L.popup({
      pane: "fixed",
      className: "popup-fixed",
      autoPan: false,
    }).setContent(text);
  
    // add event listener to the marker
    marker.bindPopup(popup).on("click", fitBoundsPadding);
  });
  
  map.on("popupclose", function (e) {
    removeAllAnimationClassFromMap();
  });
  
  const mediaQueryList = window.matchMedia("(min-width: 767px)");
  
  mediaQueryList.addEventListener("change", (event) => onMediaQueryChange(event));
  
  onMediaQueryChange(mediaQueryList);
  
  function onMediaQueryChange(event) {
    if (event.matches) {
      document.documentElement.style.setProperty("--min-width", "true");
    } else {
      document.documentElement.style.removeProperty("--min-width");
    }
  }
  
  let boxInfoWith = 0;
  let paddingTopLeft = 0;
  function fitBoundsPadding() {
    removeAllAnimationClassFromMap();
    // Get width of info div
    const boxInfoWith = document.querySelector(".popup-fixed").offsetWidth;
    const boxInfoHeight = document.querySelector(".popup-fixed").offsetHeight;
  
    // Create a feature group with the marker
    const featureGroup = L.featureGroup([this]).addTo(map);
  
    // Get popup container
    const popupContainer = document.querySelector(".leaflet-popup");
  
    // Check screen width for responsiveness
    const isSmallScreen = window.innerWidth <= 767;
  
    let paddingLeft = 0;
    let paddingTop = 10;
  
    // Adjust padding based on popup position and screen size
    if (popupContainer) {
      if (isSmallScreen) {
        // Bottom popup on small screen
        paddingTopLeft = boxInfoWith / 2; // Center marker horizontally
        paddingTop = -boxInfoHeight;
      } else {
        // Default: Left popup or non-bottom popup
        paddingLeft = boxInfoWith + 10;
      }
    }
    // Fit bounds with adjusted padding
    map.fitBounds(featureGroup.getBounds(), {
      paddingTopLeft: [paddingLeft, paddingTop],
    });
    this.setIcon(clickedIcon);
    this.off("click", fitBoundsPadding);
  }
  
  function removeAllAnimationClassFromMap() {
    markers.forEach((marker) => {
      marker.setIcon(icon);
      marker.on("click", fitBoundsPadding);
    });
    map.setView([lat, lng], zoom);
  }
  
  setInterval(function () {
    if (map.getZoom() >= 16) {
      for (const marker of markers) {
        marker.bindTooltip(marker.options.titl, {
          permanent: true,
          direction: "bottom",
          offset: L.point(0, 0),
        });
      }
    } else {
      for (const marker of markers) {
        marker.unbindTooltip();
      }
    }
  }, 1000);
  
    </script>
</body>

</html>