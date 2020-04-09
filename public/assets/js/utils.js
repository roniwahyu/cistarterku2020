$(window).on("load", function() {
    context_menu_map = new GMaps({
        div: "#context-menu",
        lat: -12.043333,
        lng: -77.028333,
        styles: [{
            stylers: [{
                hue: "#2c3e50"
            }, {
                saturation: 250
            }]
        }, {
            featureType: "road",
            elementType: "geometry",
            stylers: [{
                lightness: 50
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "road",
            elementType: "labels",
            stylers: [{
                visibility: "off"
            }]
        }]
    }), context_menu_map.setContextMenu({
        control: "map",
        options: [{
            title: "Add marker",
            name: "add_marker",
            action: function(e) {
                this.addMarker({
                    lat: e.latLng.lat(),
                    lng: e.latLng.lng(),
                    title: "New marker"
                })
            }
        }, {
            title: "Center here",
            name: "center_here",
            action: function(e) {
                this.setCenter(e.latLng.lat(), e.latLng.lng())
            }
        }]
    }), geofences_map = new GMaps({
        div: "#geofences",
        lat: -12.043333,
        lng: -77.028333
    });
    var e = [],
        t = [
            [-12.040397656836609, -77.03373871559225],
            [-12.040248585302038, -77.03993927003302],
            [-12.050047116528843, -77.02448169303511],
            [-12.044804866577001, -77.02154422636042]
        ];
    for (var a in t) latlng = new google.maps.LatLng(t[a][0], t[a][1]), e.push(latlng);
    polygon = geofences_map.drawPolygon({
        paths: e,
        strokeColor: "#BBD8E9",
        strokeOpacity: 1,
        strokeWeight: 3,
        fillColor: "#BBD8E9",
        fillOpacity: .6
    }), geofences_map.addMarker({
        lat: -12.043333,
        lng: -77.028333,
        draggable: !0,
        fences: [polygon],
        outside: function(e, t) {
            alert("This marker has been moved outside of its fence")
        }
    }), custom_control_map = new GMaps({
        div: "#custom-controls",
        zoom: 16,
        lat: -12.043333,
        lng: -77.028333,
        styles: [{
            featureType: "water",
            elementType: "geometry",
            stylers: [{
                hue: "#165c64"
            }, {
                saturation: 34
            }, {
                lightness: -69
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "landscape",
            elementType: "geometry",
            stylers: [{
                hue: "#b7caaa"
            }, {
                saturation: -14
            }, {
                lightness: -18
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "landscape.man_made",
            elementType: "all",
            stylers: [{
                hue: "#cbdac1"
            }, {
                saturation: -6
            }, {
                lightness: -9
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "road",
            elementType: "geometry",
            stylers: [{
                hue: "#8d9b83"
            }, {
                saturation: -89
            }, {
                lightness: -12
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{
                hue: "#d4dad0"
            }, {
                saturation: -88
            }, {
                lightness: 54
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "road.arterial",
            elementType: "geometry",
            stylers: [{
                hue: "#bdc5b6"
            }, {
                saturation: -89
            }, {
                lightness: -3
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "road.local",
            elementType: "geometry",
            stylers: [{
                hue: "#bdc5b6"
            }, {
                saturation: -89
            }, {
                lightness: -26
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "poi",
            elementType: "geometry",
            stylers: [{
                hue: "#c17118"
            }, {
                saturation: 61
            }, {
                lightness: -45
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "poi.park",
            elementType: "all",
            stylers: [{
                hue: "#8ba975"
            }, {
                saturation: -46
            }, {
                lightness: -28
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "transit",
            elementType: "geometry",
            stylers: [{
                hue: "#a43218"
            }, {
                saturation: 74
            }, {
                lightness: -51
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "administrative.province",
            elementType: "all",
            stylers: [{
                hue: "#ffffff"
            }, {
                saturation: 0
            }, {
                lightness: 100
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "administrative.neighborhood",
            elementType: "all",
            stylers: [{
                hue: "#ffffff"
            }, {
                saturation: 0
            }, {
                lightness: 100
            }, {
                visibility: "off"
            }]
        }, {
            featureType: "administrative.locality",
            elementType: "labels",
            stylers: [{
                hue: "#ffffff"
            }, {
                saturation: 0
            }, {
                lightness: 100
            }, {
                visibility: "off"
            }]
        }, {
            featureType: "administrative.land_parcel",
            elementType: "all",
            stylers: [{
                hue: "#ffffff"
            }, {
                saturation: 0
            }, {
                lightness: 100
            }, {
                visibility: "off"
            }]
        }, {
            featureType: "administrative",
            elementType: "all",
            stylers: [{
                hue: "#3a3935"
            }, {
                saturation: 5
            }, {
                lightness: -57
            }, {
                visibility: "off"
            }]
        }, {
            featureType: "poi.medical",
            elementType: "geometry",
            stylers: [{
                hue: "#cba923"
            }, {
                saturation: 50
            }, {
                lightness: -46
            }, {
                visibility: "on"
            }]
        }]
    }), custom_control_map.addControl({
        position: "top_right",
        content: "Geolocate",
        style: {
            margin: "5px",
            padding: "1px 6px",
            border: "solid 1px #717B87",
            background: "#fff"
        },
        events: {
            click: function() {
                GMaps.geolocate({
                    success: function(e) {
                        custom_control_map.setCenter(e.coords.latitude, e.coords.longitude)
                    },
                    error: function(e) {
                        alert("Geolocation failed: " + e.message)
                    },
                    not_supported: function() {
                        alert("Your browser does not support geolocation")
                    }
                })
            }
        }
    }), infoWindow = new google.maps.InfoWindow({}), fusion_layers_map = new GMaps({
        div: "#fusion-table-layers",
        zoom: 11,
        lat: 41.850033,
        lng: -87.6500523
    }), fusion_layers_map.loadFromFusionTables({
        query: {
            select: "'Geocodable address'",
            from: "1mZ53Z70NsChnBMm-qEYmSDOvLXgrreLTkQUvvg"
        },
        suppressInfoWindows: !0,
        events: {
            click: function(e) {
                infoWindow.setContent("You clicked here!"), infoWindow.setPosition(e.latLng), infoWindow.open(fusion_layers_map.map)
            }
        }
    }), infoWindow = new google.maps.InfoWindow({}), kml_layers_map = new GMaps({
        div: "#kml-layers",
        zoom: 12,
        lat: 40.65,
        lng: -73.95
    }), kml_layers_map.loadFromKML({
        url: "http://api.flickr.com/services/feeds/geo/?g=322338@N20&lang=en-us&format=feed-georss",
        suppressInfoWindows: !0,
        events: {
            click: function(e) {
                infoWindow.setContent(e.featureData.infoWindowHtml), infoWindow.setPosition(e.latLng), infoWindow.open(kml_layers_map.map)
            }
        }
    }), (s = new GMaps({
        div: "#map-types",
        lat: -12.043333,
        lng: -77.028333,
        mapTypeControlOptions: {
            mapTypeIds: ["hybrid", "roadmap", "satellite", "terrain", "osm"]
        }
    })).addMapType("osm", {
        getTileUrl: function(e, t) {
            return "https://a.tile.openstreetmap.org/" + t + "/" + e.x + "/" + e.y + ".png"
        },
        tileSize: new google.maps.Size(256, 256),
        name: "OpenStreetMap",
        maxZoom: 18
    }), s.setMapTypeId("osm");
    var s, n;
    (s = new GMaps({
        el: "#overlay-map-types",
        lat: -12.043333,
        lng: -77.028333
    })).addOverlayMapType({
        index: 0,
        tileSize: new google.maps.Size(256, 256),
        getTile: function(e, t, a) {
            var l = a.createElement("div");
            return l.innerHTML = e, l.style.width = this.tileSize.width + "px", l.style.height = this.tileSize.height + "px", l.style.background = "rgba(250, 250, 250, 0.55)", l.style.fontFamily = "Monaco, Andale Mono, Courier New, monospace", l.style.fontSize = "10", l.style.fontWeight = "bolder", l.style.border = "dotted 1px #aaa", l.style.textAlign = "center", l.style.lineHeight = this.tileSize.height + "px", l
        }
    }), panorama = GMaps.createPanorama({
        el: "#street-view-panoramas",
        lat: 42.3455,
        lng: -71.0983
    }), $(document).on("submit", ".edit_marker", function(e) {
        e.preventDefault();
        var t = $(this).data("marker-index");
        $lat = $("#marker_" + t + "_lat").val(), $lng = $("#marker_" + t + "_lng").val();
        var a = $("#edit_marker_template").text().replace(/{{index}}/g, t).replace(/{{lat}}/g, $lat).replace(/{{lng}}/g, $lng);
        s.markers[t].setPosition(new google.maps.LatLng($lat, $lng)), s.markers[t].infoWindow.setContent(a), $marker = $("#markers-with-coordinates").find("li").eq(0).find("a"), $marker.data("marker-lat", $lat), $marker.data("marker-lng", $lng)
    }), $(document).on("click", ".pan-to-marker", function(e) {
        var t, a;
        e.preventDefault();
        var l = $(this).data("marker-index"),
            i = $(this).data("marker-lat"),
            n = $(this).data("marker-lng");
        if (null != l) {
            var r = s.markers[l].getPosition();
            t = r.lat(), a = r.lng()
        } else t = i, a = n;
        s.setCenter(t, a)
    }), s = new GMaps({
        div: "#interact-ui",
        lat: -12.043333,
        lng: -77.028333,
        styles: [{
            featureType: "water",
            elementType: "geometry",
            stylers: [{
                color: "#193341"
            }]
        }, {
            featureType: "landscape",
            elementType: "geometry",
            stylers: [{
                color: "#2c5a71"
            }]
        }, {
            featureType: "road",
            elementType: "geometry",
            stylers: [{
                color: "#29768a"
            }, {
                lightness: -37
            }]
        }, {
            featureType: "poi",
            elementType: "geometry",
            stylers: [{
                color: "#406d80"
            }]
        }, {
            featureType: "transit",
            elementType: "geometry",
            stylers: [{
                color: "#406d80"
            }]
        }, {
            elementType: "labels.text.stroke",
            stylers: [{
                visibility: "on"
            }, {
                color: "#3e606f"
            }, {
                weight: 2
            }, {
                gamma: .84
            }]
        }, {
            elementType: "labels.text.fill",
            stylers: [{
                color: "#ffffff"
            }]
        }, {
            featureType: "administrative",
            elementType: "geometry",
            stylers: [{
                weight: .6
            }, {
                color: "#1a3541"
            }]
        }, {
            elementType: "labels.icon",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [{
                color: "#2c5a71"
            }]
        }]
    }), GMaps.on("marker_added", s, function(e) {
        $("#markers-with-index").append('<li><a href="#" class="pan-to-marker" data-marker-index="' + s.markers.indexOf(e) + '">' + e.title + "</a></li>"), $("#markers-with-coordinates").append('<li><a href="#" class="pan-to-marker" data-marker-lat="' + e.getPosition().lat() + '" data-marker-lng="' + e.getPosition().lng() + '">' + e.title + "</a></li>")
    }), GMaps.on("click", s.map, function(e) {
        var t = s.markers.length,
            a = e.latLng.lat(),
            l = e.latLng.lng(),
            i = $("#edit_marker_template").text().replace(/{{index}}/g, t).replace(/{{lat}}/g, a).replace(/{{lng}}/g, l);
        s.addMarker({
            lat: a,
            lng: l,
            title: "Marker #" + t,
            infoWindow: {
                content: i
            }
        })
    }), $(document).on("click", ".pan-to-marker", function(e) {
        var t, a, l, i;
        e.preventDefault(), i = $(this).data("marker-index"), a = (t = n.markers[i].getPosition()).lat(), l = t.lng(), n.setCenter(a, l)
    }), (n = new GMaps({
        div: "#json",
        lat: -12.043333,
        lng: -77.028333,
        styles: [{
            featureType: "administrative",
            elementType: "labels.text.fill",
            stylers: [{
                color: "#444444"
            }]
        }, {
            featureType: "landscape",
            elementType: "all",
            stylers: [{
                color: "#f2f2f2"
            }]
        }, {
            featureType: "poi",
            elementType: "all",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "road",
            elementType: "all",
            stylers: [{
                saturation: -100
            }, {
                lightness: 45
            }]
        }, {
            featureType: "road.highway",
            elementType: "all",
            stylers: [{
                visibility: "simplified"
            }]
        }, {
            featureType: "road.arterial",
            elementType: "labels.icon",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "transit",
            elementType: "all",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "water",
            elementType: "all",
            stylers: [{
                color: "#46bcec"
            }, {
                visibility: "on"
            }]
        }]
    })).on("marker_added", function(e) {
        var t = n.markers.indexOf(e);
        $("#results").append('<li><a href="#" class="pan-to-marker" data-marker-index="' + t + '">' + e.title + "</a></li>"), t == n.markers.length - 1 && n.fitZoom()
    });
    var l = $.getJSON("../../../app-assets/data/gmaps/foursquare.json?q[near]=Lima,%20PE&q[query]=Ceviche");
    l.done(function(e) {
        $("#foursquare-results").text(JSON.stringify(e))
    }), l.done(function(e) {
        var t, a = [];
        if (0 < e.venues.length) {
            t = e.venues;
            for (var l = 0; l < t.length; l++) {
                var i = t[l];
                null != i.location.lat && null != i.location.lng && a.push({
                    lat: i.location.lat,
                    lng: i.location.lng,
                    title: i.name,
                    icon: {
                        size: new google.maps.Size(32, 32),
                        url: "https://foursquare.com/img/categories/food/default.png"
                    }
                })
            }
        }
        n.addMarkers(a)
    })
});