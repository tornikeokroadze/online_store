function initialize() {
    var e, t = [
            ["Georgia", 41.7190819, 44.8025878]
        ],
        a = [
            ['<div class="info_content">Georgia</div>']
        ],
        s = [
            ["img/map-marker.png"]
        ],
        l = new google.maps.LatLngBounds,
        r = jQuery("#map-canvas-multipointer"),
        i = (r.data("address"), r.data("latlng"), r.data("zoom")),
        y = (r.data("mapstyle"), r.data("title"), jQuery(r.data("popupstring-id")).html(), r.data("marker"), {
            scrollwheel: !1,
            scaleControl: !0,
            disableDefaultUI: !0,
            panControl: !0,
            zoomControl: !0,
            mapTypeControl: !0,
            streetViewControl: !0,
            overviewMapControl: !0,
            mapTypeId: "roadmap"
        });
    (e = new google.maps.Map(r.get(0), y)).setTilt(45);
    var o, n, f = new google.maps.InfoWindow;
    for (n = 0; n < t.length; n++) {
        var p = new google.maps.LatLng(t[n][1], t[n][2]);
        l.extend(p), o = new google.maps.Marker({
            position: p,
            map: e,
            title: t[n][0],
            icon: s[n][0]
        }), google.maps.event.addListener(o, "click", function(t, s) {
            return function() {
                f.setContent(a[s][0]), f.open(e, t)
            }
        }(o, n)), e.fitBounds(l)
    }
    var u = google.maps.event.addListener(e, "bounds_changed", function(e) {
        this.setZoom(i), google.maps.event.removeListener(u)
    })
}
var THEMEMASCOT_googlemap_init_obj = {},
    THEMEMASCOT_GEOCODE_ERROR = "Error",
    THEMEMASCOT_googlemap_styles = {
        default: [],
        style1: [{
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
            featureType: "landscape.man_made",
            elementType: "geometry.fill",
            stylers: [{
                color: "#eeeeee"
            }]
        }, {
            featureType: "landscape.natural.landcover",
            elementType: "geometry.fill",
            stylers: [{
                color: "#f2f2f2"
            }]
        }, {
            featureType: "landscape.natural.terrain",
            elementType: "geometry.fill",
            stylers: [{
                color: "#dddddd"
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
        }, {
            featureType: "water",
            elementType: "geometry.fill",
            stylers: [{
                color: "#FFBD1F"
            }]
        }, {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{
                color: "#979797"
            }]
        }, {
            featureType: "water",
            elementType: "labels.text.stroke",
            stylers: [{
                weight: "0.01"
            }]
        }],
        style2: [{
            featureType: "landscape",
            stylers: [{
                hue: "#007FFF"
            }, {
                saturation: 100
            }, {
                lightness: 156
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.highway",
            stylers: [{
                hue: "#FF7000"
            }, {
                saturation: -83.6
            }, {
                lightness: 48.80000000000001
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.arterial",
            stylers: [{
                hue: "#FF7000"
            }, {
                saturation: -81.08108108108107
            }, {
                lightness: -6.8392156862745
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.local",
            stylers: [{
                hue: "#FF9A00"
            }, {
                saturation: 7.692307692307736
            }, {
                lightness: 21.411764705882348
            }, {
                gamma: 1
            }]
        }, {
            featureType: "water",
            stylers: [{
                hue: "#0093FF"
            }, {
                saturation: 16.39999999999999
            }, {
                lightness: -6.400000000000006
            }, {
                gamma: 1
            }]
        }, {
            featureType: "poi",
            stylers: [{
                hue: "#00FF60"
            }, {
                saturation: 17
            }, {
                lightness: 44.599999999999994
            }, {
                gamma: 1
            }]
        }],
        style3: [{
            stylers: [{
                hue: "#00ffe6"
            }, {
                saturation: -20
            }]
        }, {
            featureType: "road",
            elementType: "geometry",
            stylers: [{
                lightness: 100
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "road",
            elementType: "labels",
            stylers: [{
                visibility: "off"
            }]
        }],
        style4: [{
            stylers: [{
                saturation: -100
            }]
        }],
        style5: [{
            featureType: "landscape",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 20.4705882352941
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.highway",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 25.59999999999998
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.arterial",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: -22
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.local",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 21.411764705882348
            }, {
                gamma: 1
            }]
        }, {
            featureType: "water",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 21.411764705882348
            }, {
                gamma: 1
            }]
        }, {
            featureType: "poi",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 4.941176470588232
            }, {
                gamma: 1
            }]
        }],
        style6: [{
            featureType: "landscape",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 20.4705882352941
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.highway",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 25.59999999999998
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.arterial",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: -22
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.local",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 21.411764705882348
            }, {
                gamma: 1
            }]
        }, {
            featureType: "water",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 21.411764705882348
            }, {
                gamma: 1
            }]
        }, {
            featureType: "poi",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 4.941176470588232
            }, {
                gamma: 1
            }]
        }],
        style7: [{
            featureType: "landscape",
            stylers: [{
                invert_lightness: !0
            }, {
                saturation: -100
            }, {
                lightness: 65
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "poi",
            stylers: [{
                saturation: -100
            }, {
                lightness: 51
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "road.highway",
            stylers: [{
                saturation: -100
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "road.arterial",
            stylers: [{
                saturation: -100
            }, {
                lightness: 30
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "road.local",
            stylers: [{
                saturation: -100
            }, {
                lightness: 40
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "transit",
            stylers: [{
                saturation: -100
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "administrative.province",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "water",
            elementType: "labels",
            stylers: [{
                visibility: "on"
            }, {
                lightness: -25
            }, {
                saturation: -100
            }]
        }, {
            featureType: "water",
            elementType: "geometry",
            stylers: [{
                hue: "#ffff00"
            }, {
                lightness: -25
            }, {
                saturation: -97
            }]
        }],
        style8: [{
            featureType: "landscape",
            stylers: [{
                hue: "#FFA800"
            }, {
                saturation: 17.799999999999997
            }, {
                lightness: 152.20000000000002
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.highway",
            stylers: [{
                hue: "#007FFF"
            }, {
                saturation: -77.41935483870967
            }, {
                lightness: 47.19999999999999
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.arterial",
            stylers: [{
                hue: "#FBFF00"
            }, {
                saturation: -78
            }, {
                lightness: 39.19999999999999
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.local",
            stylers: [{
                hue: "#00FFFD"
            }, {
                saturation: 0
            }, {
                lightness: 0
            }, {
                gamma: 1
            }]
        }, {
            featureType: "water",
            stylers: [{
                hue: "#007FFF"
            }, {
                saturation: -77.41935483870967
            }, {
                lightness: -14.599999999999994
            }, {
                gamma: 1
            }]
        }, {
            featureType: "poi",
            stylers: [{
                hue: "#007FFF"
            }, {
                saturation: -77.41935483870967
            }, {
                lightness: 42.79999999999998
            }, {
                gamma: 1
            }]
        }],
        style9: [{
            featureType: "water",
            elementType: "geometry.fill",
            stylers: [{
                color: "#A3C6FE"
            }]
        }, {
            featureType: "transit",
            stylers: [{
                color: "#b3C6FE"
            }, {
                visibility: "off"
            }]
        }, {
            featureType: "road.highway",
            elementType: "geometry.stroke",
            stylers: [{
                visibility: "on"
            }, {
                color: "#EBCE7B"
            }]
        }, {
            featureType: "road.highway",
            elementType: "geometry.fill",
            stylers: [{
                color: "#ffffff"
            }]
        }, {
            featureType: "road.local",
            elementType: "geometry.fill",
            stylers: [{
                visibility: "on"
            }, {
                color: "#ffffff"
            }, {
                weight: 1.8
            }]
        }, {
            featureType: "road.local",
            elementType: "geometry.stroke",
            stylers: [{
                color: "#d7d7d7"
            }]
        }, {
            featureType: "poi",
            elementType: "geometry.fill",
            stylers: [{
                visibility: "on"
            }, {
                color: "#ebebeb"
            }]
        }, {
            featureType: "administrative",
            elementType: "geometry",
            stylers: [{
                color: "#a7a7a7"
            }]
        }, {
            featureType: "road.arterial",
            elementType: "geometry.fill",
            stylers: [{
                color: "#ffffff"
            }]
        }, {
            featureType: "road.arterial",
            elementType: "geometry.fill",
            stylers: [{
                color: "#ffffff"
            }]
        }, {
            featureType: "landscape",
            elementType: "geometry.fill",
            stylers: [{
                visibility: "on"
            }, {
                color: "#E9E5DC"
            }]
        }, {
            featureType: "road",
            elementType: "labels.text.fill",
            stylers: [{
                color: "#696969"
            }]
        }, {
            featureType: "administrative",
            elementType: "labels.text.fill",
            stylers: [{
                visibility: "on"
            }, {
                color: "#737373"
            }]
        }, {
            featureType: "poi",
            elementType: "labels.icon",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "poi",
            elementType: "labels",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "road.arterial",
            elementType: "geometry.stroke",
            stylers: [{
                color: "#d6d6d6"
            }]
        }, {
            featureType: "road",
            elementType: "labels.icon",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "poi",
            elementType: "geometry.fill",
            stylers: [{
                color: "#dadada"
            }]
        }],
        dark: [{
            featureType: "landscape",
            stylers: [{
                invert_lightness: !0
            }, {
                saturation: -100
            }, {
                lightness: 65
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "poi",
            stylers: [{
                saturation: -100
            }, {
                lightness: 51
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "road.highway",
            stylers: [{
                saturation: -100
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "road.arterial",
            stylers: [{
                saturation: -100
            }, {
                lightness: 30
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "road.local",
            stylers: [{
                saturation: -100
            }, {
                lightness: 40
            }, {
                visibility: "on"
            }]
        }, {
            featureType: "transit",
            stylers: [{
                saturation: -100
            }, {
                visibility: "simplified"
            }]
        }, {
            featureType: "administrative.province",
            stylers: [{
                visibility: "off"
            }]
        }, {
            featureType: "water",
            elementType: "labels",
            stylers: [{
                visibility: "on"
            }, {
                lightness: -25
            }, {
                saturation: -100
            }]
        }, {
            featureType: "water",
            elementType: "geometry",
            stylers: [{
                hue: "#ffff00"
            }, {
                lightness: -25
            }, {
                saturation: -97
            }]
        }],
        greyscale1: [{
            stylers: [{
                saturation: -100
            }]
        }],
        greyscale2: [{
            featureType: "landscape",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 20.4705882352941
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.highway",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 25.59999999999998
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.arterial",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: -22
            }, {
                gamma: 1
            }]
        }, {
            featureType: "road.local",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 21.411764705882348
            }, {
                gamma: 1
            }]
        }, {
            featureType: "water",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 21.411764705882348
            }, {
                gamma: 1
            }]
        }, {
            featureType: "poi",
            stylers: [{
                hue: "#FF0300"
            }, {
                saturation: -100
            }, {
                lightness: 4.941176470588232
            }, {
                gamma: 1
            }]
        }]
    };
jQuery(function(e) {
    "use strict";
    initialize()
});