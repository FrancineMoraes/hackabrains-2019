<template>
<div>
  <div class="map-container">

    <form @submit.prevent="insertMarker" :class=" isVisible ? 'search-box active' : 'search-box' ">
      <b-field title="Ocorrência">
        <input v-model="newMarker.description" type="text" class="input" placeholder="Observação">
      </b-field>

      <input type="text" class="input" ref="searchInput">
      <div class="has-text-right">
          <button :disabled="disabled" class="button is-primary">Salvar</button>
        </div>
      </form>

      <GmapMap id="map" :center="map.center" :zoom="16" map-type-id="terrain" style="width: 100%; height: 90vh" :options="{styles: styles}">
        <gmap-marker :key="index" v-for="(m, index) in markers" :position="m.position">
        </gmap-marker>
      </GmapMap>

      <nav class="bottom-menu">
        <button class="button rota">
          <p>Rota</p>
          <v-icon name="caret-square-right" />
        </button>

        <button @click.prevent="openInsert" class="button ocorrencia">
          <p>Ocorrência</p>
          <v-icon name="exclamation" />
        </button>
      </nav>
    </div>
  </div>
  </template>

  <script>
  import axios from 'axios'

  export default {
    name: 'Main',
    data() {
      return {
        datas: {},
        disabled: true,
        isVisible: false,
        map: {
          center: {
            lat: -31.7654,
            lng: -52.3376
          }
        },
        markers: [{
          name: "House of Aleida Greve",
          description: "description 1",
          date_build: "",
          position: {
            lat: -31.7697529,
            lng: -52.338278499999994
          }
        }],
        styles: [{
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#e9e9e9"
              },
              {
                "lightness": 17
              }
            ]
          },
          {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [{
                "color": "#f5f5f5"
              },
              {
                "lightness": 20
              }
            ]
          },
          {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#ffffff"
              },
              {
                "lightness": 17
              }
            ]
          },
          {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#ffffff"
              },
              {
                "lightness": 29
              },
              {
                "weight": 0.2
              }
            ]
          },
          {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ffffff"
              },
              {
                "lightness": 18
              }
            ]
          },
          {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ffffff"
              },
              {
                "lightness": 16
              }
            ]
          },
          {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                "color": "#f5f5f5"
              },
              {
                "lightness": 21
              }
            ]
          },
          {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
                "color": "#dedede"
              },
              {
                "lightness": 21
              }
            ]
          },
          {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "visibility": "on"
              },
              {
                "color": "#ffffff"
              },
              {
                "lightness": 16
              }
            ]
          },
          {
            "elementType": "labels.text.fill",
            "stylers": [{
                "saturation": 36
              },
              {
                "color": "#333333"
              },
              {
                "lightness": 40
              }
            ]
          },
          {
            "elementType": "labels.icon",
            "stylers": [{
              "visibility": "off"
            }]
          },
          {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [{
                "color": "#f2f2f2"
              },
              {
                "lightness": 19
              }
            ]
          },
          {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#fefefe"
              },
              {
                "lightness": 20
              }
            ]
          },
          {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#fefefe"
              },
              {
                "lightness": 17
              },
              {
                "weight": 1.2
              }
            ]
          }
        ],
        newMarker: {
          name: null,
          description: null,
          date_build: null,
          position: null,
          title: null
        },
        latitude: null,
        longitude: null,
        rua: null,
        bairro: null,
        cidade: null,
        estado: null,
        places: null

      }
    },
    created() {
      this.initMap()

      this.$gmapApiPromiseLazy().then(() => {
        let input = this.$refs.searchInput
        let searchBox = new google.maps.places.SearchBox(input)

        searchBox.addListener('places_changed', () => {
          let places = searchBox.getPlaces()
          this.places = places
          this.disabled = false
          if (places.length > 0) {
            let address = places[0].formatted_address
            let latitude = places[0].geometry.location.lat()
            let longitude = places[0].geometry.location.lng()

            this.newMarker.name = address
            this.newMarker.date_build = `${ new Date }`
            this.newMarker.position = {
              lat: latitude,
              lng: longitude
            }
            this.longitude = longitude
            this.latitude = latitude

          }
        })
      })
    },
    methods: {
      initMap() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition((position) => {
            let pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            }

            this.map.center = pos
          })
        }
      },

      insertMarker() {
        console.log(this.newMarker)
        // console.log(this.longitude)
        // console.log(this.latitude)
        // console.log(this.places[0].address_components[4]);

        // https://hackabrains-2019.herokuapp.com/api/mapping/store
        // axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
      this.datas = {
        street: this.places[0].address_components[1].long_name,
        number: this.places[0].address_components[0].long_name,
        district: this.places[0].address_components[2].long_name,
        city: this.places[0].address_components[3].long_name,
        state: this.places[0].address_components[4].short_name,
        latitude: this.latitude,
        longitude: this.longitude,
        user_id: 1,
        mapping_type_id: 1
      }

        axios.post('https://hackabrains-2019.herokuapp.com/api/mapping/store', this.datas )
          .then(function(response) {
            console.log(response);
          })
          .catch(function(error) {
            console.log(error);
          });



        this.markers.push({
          name: this.newMarker.name,
          description: this.newMarker.description,
          date_build: this.newMarker.date_build,
          position: this.newMarker.position
        })

        let pos = {
          lat: this.latitude,
          lng: this.longitude
        }

        this.map.center = pos

        this.$swal({
          type: 'success',
          title: 'Observação enviada!'
        })

      },

      openInsert() {
        this.isVisible = !this.isVisible
      }
    }
  }
  </script>

  <style lang="stylus" scoped>
  	.map-container{
  		position: relative;
  		background: white;

  		.search-box{
        display: none;
        &.active{
          display: block;
          animation: move 1s;
        }
  			@media screen and (min-width: 960px){
  				padding: 1rem 33%;
        }
      }
  		.search-box{
  			.input{
  				margin-bottom: 1rem;
        }
      }

      .bottom-menu{
        display: flex;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;

        @media screen and (min-width: 960px){
          width: 25%;
        }

        .button{
          flex: 1;
          padding: 1rem;
          text-align: center;
          background: #477cb2;
          color: white;
          min-height: 50px;
          padding-bottom: 1.5rem;

          .fa-icon{
          font-size: 2rem;
          margin-left 1rem;
        }
      }
      .ocorrencia{
        background-color red
      }
    }
  }
</style>
