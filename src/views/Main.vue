<template>
	<div>
		<div class="map-container">
			
			<form @submit.prevent="insertMarker" class="search-box">
				<b-field title="Ocorrência">	
					<input v-model="newMarker.description" type="text" class="input" placeholder="Nome da ocorrência">
				</b-field>

				<input type="text" class="input" ref="searchInput">
				<div class="has-text-right">
					<button :disabled="disabled" class="button is-primary">Salvar</button>
				</div>
			</form>

			<GmapMap
			  id="map"
			  :center="map.center"
			  :zoom="16"
			  map-type-id="terrain"
			  style="width: 100%; height: 90vh"
			  :options="{styles: styles}"
			>
			  <gmap-marker
		        :key="index"
		        v-for="(m, index) in markers"
		        :position="m.position">
		      </gmap-marker>
			</GmapMap>
		</div>
	</div>
</template>

<script>
	export default{
		name: 'Main',
		data(){
			return{
				disabled: true,
				map: {
					center: {
						lat: -31.7654,
						lng: -52.3376
					}
				},
				markers: [
					{
						name: "House of Aleida Greve",
			            description: "description 1",
			            date_build: "",
			            position: {lat: -31.7697529, lng: -52.338278499999994}
					}
				],
				styles: [
				    {
				        "featureType": "water",
				        "elementType": "geometry",
				        "stylers": [
				            {
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
				        "stylers": [
				            {
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
				        "stylers": [
				            {
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
				        "stylers": [
				            {
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
				        "stylers": [
				            {
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
				        "stylers": [
				            {
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
				        "stylers": [
				            {
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
				        "stylers": [
				            {
				                "color": "#dedede"
				            },
				            {
				                "lightness": 21
				            }
				        ]
				    },
				    {
				        "elementType": "labels.text.stroke",
				        "stylers": [
				            {
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
				        "stylers": [
				            {
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
				        "stylers": [
				            {
				                "visibility": "off"
				            }
				        ]
				    },
				    {
				        "featureType": "transit",
				        "elementType": "geometry",
				        "stylers": [
				            {
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
				        "stylers": [
				            {
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
				        "stylers": [
				            {
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
					position: null
				}
				
			}
		},
		created(){
			this.initMap()

			this.$gmapApiPromiseLazy().then(() => { 
				let input = this.$refs.searchInput
				let searchBox = new google.maps.places.SearchBox(input)

				searchBox.addListener('places_changed', () => {
          			let places = searchBox.getPlaces()
          			this.disabled = false
          			if(places.length > 0){
          				let address = places[0].formatted_address
          				let latitude = places[0].geometry.location.lat()
          				let longitude = places[0].geometry.location.lng()

          				this.newMarker.name = address
          				this.newMarker.date_build = `${ new Date }`
          				this.newMarker.position = {
          					lat: latitude,
          					lng: longitude
          				}
          			}
          		})
			})
		},
		methods: {
			initMap(){
				if(navigator.geolocation){
					navigator.geolocation.getCurrentPosition((position) =>{
						let pos = {
							lat: position.coords.latitude,
							lng: position.coords.longitude
						}
						this.map.center = pos
					})
				}
			},

			insertMarker(){
				console.log(this.newMarker)

				this.markers.push({
					name: this.newMarker.name,
					description: this.newMarker.description,
					date_build: this.newMarker.date_build,
					position: this.newMarker.position
				})

				/*{
					name: null,
					description: null,
					date_build: null,
					position: null
				}*/
			}
		}
	}
</script>

<style lang="stylus" scoped>
	.map-container
		position relative
		background white
		
		.search-box
			padding 1rem
			@media screen and (min-width: 960px)
				padding 1rem 33%

		.search-box
			.input
				margin-bottom 1rem	
</style>