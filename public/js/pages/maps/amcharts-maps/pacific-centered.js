"use strict";$(document).ready(function(){am4core.ready(function(){am4core.useTheme(am4themes_animated);var t=am4core.create("map-3",am4maps.MapChart);t.geodata=am4geodata_worldLow,t.projection=new am4maps.projections.NaturalEarth1,t.panBehavior="rotateLong";var e=t.series.push(new am4maps.MapPolygonSeries);e.useGeodata=!0,e.mapPolygons.template.fillOpacity=.6,e.mapPolygons.template.nonScalingStroke=!0,e.mapPolygons.template.strokeWidth=.5,e.mapPolygons.template.adapter.add("fill",function(e,a){return t.colors.getIndex(Math.round(4*Math.random())).saturate(.3)});var a=e.mapPolygons.template;a.tooltipText="{name}",a.states.create("hover").properties.fill=t.colors.getIndex(1),t.deltaLongitude=-154.8,t.series.push(new am4maps.GraticuleSeries).fitExtent=!1})});