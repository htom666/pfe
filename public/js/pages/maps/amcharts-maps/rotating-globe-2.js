"use strict";$(document).ready(function(){am4core.ready(function(){am4core.useTheme(am4themes_animated);var e=am4core.create("map-11",am4maps.MapChart);e.geodata=am4geodata_worldLow,e.projection=new am4maps.projections.Orthographic,e.panBehavior="rotateLongLat",e.deltaLatitude=-20,e.padding(20,20,20,20),e.adapter.add("deltaLatitude",function(e){return am4core.math.fitToRange(e,-90,90)});var a=e.series.push(new am4maps.MapPolygonSeries);a.useGeodata=!0;var t=a.mapPolygons.template;t.tooltipText="{name}",t.fill=am4core.color("#47c78a"),t.stroke=am4core.color("#454a58"),t.strokeWidth=.5;var o=e.series.push(new am4maps.GraticuleSeries);o.mapLines.template.line.stroke=am4core.color("#ffffff"),o.mapLines.template.line.strokeOpacity=.08,o.fitExtent=!1,e.backgroundSeries.mapPolygons.template.polygon.fillOpacity=.1,e.backgroundSeries.mapPolygons.template.polygon.fill=am4core.color("#ffffff"),t.states.create("hover").properties.fill=e.colors.getIndex(0).brighten(-.5);var r=void 0;setTimeout(function(){r=e.animate({property:"deltaLongitude",to:1e5},2e7)},3e3),e.seriesContainer.events.on("down",function(){r&&r.stop()})})});