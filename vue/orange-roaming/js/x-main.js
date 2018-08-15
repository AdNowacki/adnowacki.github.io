
Vue.component('multiselect', window.VueMultiselect.default);
var V = new Vue({
  el: '#x-app',
  data() {
    return {
      url: 'http://msz.beta.gorilla.agency/country',
      countries: [],
      countryData: null,
      selectOptions: null,
      selected: null,
      options: [],
      countryID: null
    }
  },
  methods: {
    getData() {
      fetch(this.url)
      .then(data => {
        return data.json()
      })
      .then( data => {
        this.countries = data;
        this.countriesFiltered = this.countries;
        this.nodata = "Brak danych";
        this.setSelect();
      });
    },
    setSelect() {
      this.countries.forEach((el, ind) => {
        let oItem = {
          id: el.id,
          name: el.name,
          key: ind
        }

        this.options.push(oItem);
      })

    },
    getCountry(id){
      var country = "http://msz.beta.gorilla.agency/country/" + id;
      fetch(country)
      .then(data => {
        return data.json()
      })
      .then( data => {
        this.countryData = data;
        console.log(this.countryData);
      });
    },
    rerender() {
      var id = this.selected.id;
      map = new google.maps.Map(document.getElementById('x-map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8,
        styles: xstyled,
        zoomControl: false,
        scaleControl: false,
        fullscreenControl: true
      });
      var src = `http://leguralnie.pl/kml/${id}.kml?v183`;       
      var ctaLayer = new google.maps.KmlLayer({
        url: src,
        map: map,
      });

      this.getCountry(id);
    },
  },
  created() {
    this.getData();
  },
})

var map;
var src = 'http://leguralnie.pl/kml/polska.kml?v4';
function initMap() {
  map = new google.maps.Map(document.getElementById('x-map'), {
    center: {lat: 52.237049, lng: 21.017532},
    zoom: 8,
    styles: xstyled,
    mapTypeControl: false,
    zoomControl: false,
    scaleControl: false,
    fullscreenControl: true
  });

  var ctaLayer = new google.maps.KmlLayer({
      url: src,
      map: map,
    });
}
