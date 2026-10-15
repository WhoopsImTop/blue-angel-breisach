<template>
  <client-only>
    <div ref="mapContainer" class="map-container"></div>
  </client-only>
</template>

<script>
import 'maplibre-gl/dist/maplibre-gl.css'

export default {
  name: 'MapComponent',
  data() {
    return {
      mapCenter: [7.57816565, 48.04290245],
      mapMarker: [7.57816565, 48.04290245],
      map: null,
    }
  },
  async mounted() {
    const { default: maplibregl } = await import('maplibre-gl')
    await this.$nextTick()
    if (!this.$refs.mapContainer) return

    this.map = new maplibregl.Map({
      container: this.$refs.mapContainer,
      style: 'https://tiles.openfreemap.org/styles/liberty',
      center: this.mapCenter,
      zoom: 14,
      cooperativeGestures: true,
    })
    this.map.addControl(new maplibregl.NavigationControl(), 'top-right')
    this.map.addControl(new maplibregl.FullscreenControl(), 'top-right')

    const marker = new maplibregl.Marker({ color: '#db2a5a' })
      .setLngLat(this.mapMarker)
      .addTo(this.map)
    const markerEl = marker.getElement()
    markerEl.style.cursor = 'pointer'
    markerEl.addEventListener('click', this.openMaps)
  },
  beforeDestroy() {
    if (this.map) this.map.remove()
  },
  methods: {
    openMaps() {
      window.open(
        'https://www.google.com/maps/place/Blue+Angel+-+Nightclub,+Stripclub+%26+Cabaret,+Gerberstra%C3%9Fe+6,+79206+Breisach+am+Rhein/@48.0429024,7.5781656,15z/data=!4m6!3m5!1s0x4791133a411494fb:0x75ceb57135140efd!8m2!3d48.0429024!4d7.5781656!16s%2Fg%2F1w0qzv77',
        '_blank'
      )
    },
  },
}
</script>

<style>
.map-container {
  width: 100%;
  height: 400px;
}
</style>
