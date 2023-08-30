<template>
  <client-only>
    <G-Map
      ref="gMap"
      language="de"
      :center="mapCenter"
      :zoom="14"
      :options="{
        fullscreenControl: true,
        mapTypeControl: true,
        streetViewControl: false,
        styles: [
          {
            featureType: 'poi',
            stylers: [{ visibility: 'on' }], // Turn off points of interest.
          },
        ],
      }"
    >
      <GMapMarker :position="mapMarker" @click="openMaps"></GMapMarker>
    </G-Map>
  </client-only>
</template>

<script>
export default {
  name: 'MapComponent',
  data() {
    return {
      mapCenter: {
        lat: 48.04290245,
        lng: 7.57816565,
      },
      mapMarker: {
        lat: 48.04290245,
        lng: 7.57816565,
      },
    }
  },
  methods: {
    openMaps() {
      window.open(
        'https://www.google.com/maps/place/Blue+Angel+-+Nightclub,+Stripclub+%26+Cabaret,+Gerberstra%C3%9Fe+6,+79206+Breisach+am+Rhein/@48.0429024,7.5781656,15z/data=!4m6!3m5!1s0x4791133a411494fb:0x75ceb57135140efd!8m2!3d48.0429024!4d7.5781656!16s%2Fg%2F1w0qzv77',
        '_blank'
      )
    },
  },
  mounted() {
    console.log('INIT MAP')
  },
}
</script>

<style>
</style>