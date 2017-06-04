function makeSomeMaps(){
        map = d3.carto.map();
        d3.select("#map").call(map);

        countryLayer = d3.carto.layer.geojson();

        countryLayer.path("geojson/world.geojson")
        .label("Countries")
        .renderMode("svg")
        .clickableFeatures(true)
        .cssClass("country");
        map.addCartoLayer(countryLayer);
        map.setScale(2);
      
        }

