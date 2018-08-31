
Vue.component('multiselect', window.VueMultiselect.default);
var V = new Vue({
  el: '#x-app',
  data() {
    return {
      url: 'https://msz.beta.gorilla.agency/country',
      images: 'https://orange.binaries.pl/binaries/o/map/ak/html/strony_dedykowany/zagranica/',
      countries: [],
      countryData: null,
      countryDetail: false,
      tipsDetail: false,
      selectOptions: null,
      selected: null,
      options: [],
      countryID: null,
      marker: null,
      currentCountryStatus: null,
      countryGeneral: null,
      modalTitle: null,
      modalContent: null,
      modalWarning: null,
      countryInfos: {},
      countryDepartments: null,
      warnings: null,
      tips1: null,
      tips2: null,
      hideText: false,
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
      var country = "https://msz.beta.gorilla.agency/country/" + id;
      fetch(country)
      .then(data => {
        return data.json()
      })
      .then( data => {
        this.countryData = data;
        this.countryInfos = this.countryData.info;
        this.countryDepartments = this.countryData.departments;
        this.warnings = (this.countryData.warnings.length > 0) ? this.countryData.warnings[0] : null;
        this.drawMarker();      
      });
    },
    rerender() {

      if( window.innerWidth < 1259 || window.innerHeight < 768 )
        this.hideText = true;
      else
        this.hideText = false;

      var id = this.selected.id;
      map = new google.maps.Map(document.getElementById('x-map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8,
        styles: xstyledWhite,
        disableDefaultUI: true,
      });
      var src = `https://msz.beta.gorilla.agency/kml/${id}.kml?v1851`;       
      var ctaLayer = new google.maps.KmlLayer({
        suppressInfoWindows: true,
        url: src,
        map: map,
      });
    
      ctaLayer.addListener('click', function(event) {
      });

      this.getCountry(id);
    },
    drawMarker() {
      if( this.countryData ) {
        var icon = ( this.countryData.warnings.length > 0 ) ? this.countryData.warnings[0].level : 1;
        if( icon == 0 )
          icon = 4;
        var marker = new google.maps.Marker({
          position: xMarkers[this.selected.id].position,
          icon: 'https://msz.beta.gorilla.agency/kml/' + xMarkersIcon[icon] + '?v2',
          map: map
        });

        this.setInfo(marker);
      }
    },
    setInfo( marker ) {
      var status = ( this.countryData.warnings.length > 0) ? this.countryData.warnings[0].level : 1;
      if( status == 0 )
          status = 4;
          
      var ctn = ( this.countryData.warnings.length > 0 ) ? this.countryData.warnings[0].content : "";

      var infoTitle = `<div class='x-info-wrap'>
                      <h3 class='x-heading'>${this.countryData.name}</h3>
                      <h4 class='x-h-info'>${xInfoStatus[status]}</h4>
                      <p class='x-h-info x-h-info--12'>${xInfoStatusDescription[status]}</p>
                      <div class="x-link"><a href="${window.location.hostname}#c=${this.countryData.name.toLowerCase()}" data-cid="${this.countryData.id}">więcej</a></div>
                      </div>`;

        if( window.innerWidth > 540 )
          var mW = 400;
        else
          var mW = 300;

        var infowindow = new google.maps.InfoWindow({
          content: infoTitle,
          maxWidth: mW
        });

        infowindow.open(map, marker);
        V.showCountryDetail();
        // marker.addListener('click', function() {
        // });

    },
    showCountryDetail() {
      var link = document.querySelectorAll('[data-cid]');
      if( !link )
        return;

      link[0].addEventListener('click',e => {
        var status = (this.countryData.warnings.length > 0) ? this.countryData.warnings[0].level : 1;
        if( status == 0 )
          status = 4;
        var statusTxt = (status != 1) ? `<div class="x-status-wrap"><img src="${this.images}images/uwaga.png" class="x-ib-image" /><strong class="x-status-decor">UWAGA!</strong> ${xInfoStatus[status]}</div>` : `<div class="x-status-wrap">${xInfoStatus[status]}</div>`;
        e.preventDefault();

        this.countryDetail = true;

        this.currentCountryStatus = statusTxt;

        this.countryGeneral = `
          <div class="x-country-general">
            <figure class="x-country-general__item">
              <img src="https://polakzagranica.msz.gov.pl/gallery/flags/${this.countryData.code.toLowerCase()}.png" class="x-country-flag" />
            </figure>
            <div class="x-country-general__item">
              <h3 class="x-country-general__name">${this.countryData.name}</h3>
              <p><strong>Stolica: </strong>${this.countryData.capital}</p>
              <p><strong>Waluta: </strong>${this.countryData.currency}</p>
            </div>
          </div>
        `;

      })
    },
    showTips() {
      this.tipsDetail = true;
      this.countryDetail = false;
      this.tips1 = this.tips2 = null;
      document.documentElement.scrollTop = 0;
      window.scrollTo(0, 0);
    },
    showTab(tab, ev){
      this.tipsDetail = true;
      this.countryDetail = false;

      if( tab == 2 ) {
        this.tips1 = true;
        this.tips2 = null;
      } else {
        this.tips1 = null;
        this.tips2 = true;
      }
    },
    backFromTips() {
      this.tips1 = this.tips2 = null;      
      this.tipsDetail = false;
      document.documentElement.scrollTop = 0;  
      window.scrollTo(0, 0);
      if( this.countryData ) {
        this.countryDetail = true;
      } else {
        this.tipsDetail = false;
        this.countryDetail = false;
      }
    },
    back() {
      this.countryDetail = false;  
      this.tipsDetail = false;  
      document.documentElement.scrollTop = 0;  
      window.scrollTo(0, 0);
    },
    showInfo(type, event) {
      switch(type) {
        case 1:
          if( this.countryData.info['Wjazd i pobyt'] ) {
            this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico1.png" /> Wjazd i pobyt</h4>`;
            this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Wjazd i pobyt']}</div>`;
          } else if( this.countryData.info['Wjazd'] ) {
            this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico1.png" /> Wjazd i pobyt</h4>`;
            this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Wjazd']}</div>`;
          }
        break;
        case 2:
          this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico2.png" /> Bezpieczeństwo</h4>`;
          this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Bezpieczeństwo']}</div>`;
        break;
        case 3:
          this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico3.png" /> Ubezpieczenie</h4>`;
          this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Ubezpieczenie']}</div>`;
        break;
        case 4:
          this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico4.png" /> Zdrowie</h4>`;
          this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Zdrowie']}</div>`;
        break;
        case 5:
          this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico10.png" /> Obyczaje</h4>`;
          this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Obyczaje']}</div>`;
        break;
        case 6:
          this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico6.png" /> Informacje dla kierowców</h4>`;
          this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Informacje dla kierowców']}</div>`;
        break;
        case 7:
          this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico7.png" /> Cło</h4>`
          this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Cło']}</div>`;
        break;
        case 8:
          this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico8.png" /> Przepisy prawne</h4>`;
          this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Przepisy prawne']}</div>`;
        break;
        case 9:
          this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico9.png" /> Przydatne informacje</h4>`;
          this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Przydatne informacje']}</div>`;
        break;
        case 10:
          this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico11.png" /> Święta</h4>`;
          this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Święta']}</div>`;
        break;
        case 11:
          this.modalTitle = `<h4 class="x-modal__title"><img src="${this.images}images/ico11.png" /> Podróżowanie po kraju</h4>`;
          this.modalContent = `${this.modalTitle}<div class="x-modal__txt">${this.countryData.info['Podróżowanie po kraju']}</div>`;
        break;
        default:
          this.modalContent = null;
        break;
      }

      if( this.modalContent ) {
        document.body.classList.add('x-modal-open');
      } else {
        document.body.classList.remove('x-modal-open');
      }
    },
    hideModal() {
      this.modalTitle = null;
      this.modalContent = null;
      this.modalWarning = null;
      document.body.classList.remove('x-modal-open');
    },
    showWarnings(){
      this.modalWarning = ( this.warnings.level != 1 ) ? `<div class='x-modal__warn-ico'><img src='${this.images}images/uwaga.png' /></div>` : "";
      var type = this.warnings.type.charAt(0).toUpperCase() + this.warnings.type.slice(1);
      var lvl = ( this.warnings.level != 1 ) ? `<span class='x-warning'>${xInfoStatus[this.warnings.level]}</span>` : xInfoStatus[this.warnings.level];
      this.modalWarning += `
                          <p>
                            <strong>
                              ${type}<br>
                              Ostrzeżenie dla ${this.warnings.place}<br>
                              ${lvl}
                            </strong>
                          </p>
                          <div class='x-modal__p'>
                          ${this.warnings.content}
                          </div>
                        `;
      document.body.classList.add('x-modal-open');
    }
  },
  created() {
    this.getData();
  },
})

var map;
var src = 'https://msz.beta.gorilla.agency/kml/polska.kml?v4';
function initMap() {
  map = new google.maps.Map(document.getElementById('x-map'), {
    center: {lat: 52.237049, lng: 21.017532},
    zoom: 8,
    styles: xstyledWhite,
    mapTypeControl: false,
    disableDefaultUI: true,
  });

  var ctaLayer = new google.maps.KmlLayer({
    suppressInfoWindows: true,
    url: src,
    map: map,
  });

  ctaLayer.addListener('click', function(event) {
  });
}

var tabs = document.querySelectorAll('.x-tab');
var tabCtn = document.querySelector('.x-tab-ctn');
var backNav = document.getElementById('x-back-nav');

if( backNav ) {
  backNav.addEventListener('click', function(){
    $('html,body').animate({scrollTop: ( $('.x-tabs').offset().top - 30 ) + 'px'},700);    
    // document.querySelector('.x-tabs').scrollIntoView({behavior: "smooth"});
  });
}

if( tabs ) {
  [].forEach.call(tabs,function(el){
    el.addEventListener('click',function(){
      var pos = $('.x-tab-ctn').offset().top;
      var th = this;
      var thCtn = this.getAttribute('data-c');
      [].forEach.call(tabs,function(element){
        element.classList.remove('act');
        document.querySelector('[data-t="'+element.getAttribute('data-c')+'"]').style.display = "none";
      });
      this.classList.add('act');
      document.querySelector('[data-t="'+thCtn+'"]').style.display = "block";
      // tabCtn.scrollIntoView({behavior: "smooth"});
      $('html,body').animate({scrollTop: (pos - 20)+'px'},700);
    });
  });
};

