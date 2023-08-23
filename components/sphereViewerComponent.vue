<template>
  <v-pannellum
    :src="srcTour"
    :orientation="true"
    :auto-load="false"
    :auto-rotate="true"
    :compass="true"
    :show-fullscreen="true"
    :mouse-zoom="false"
    :double-click-zoom="true"
    :hfov="180"
    :hotSpots="hotSpots"
    style="height: 500px"
  ></v-pannellum>
</template>

<script>
import VuePannellum from 'vue-pannellum'
export default {
  components: {
    'v-pannellum': VuePannellum,
  },
  data() {
    return {
      viewer: null,
      srcTour: {
        default: {
          firstScene: 'bar',
          author: 'Elias Englen',
          sceneFadeDuration: 1000,
        },
        scenes: {
          bar: {
            title: 'Bar',
            type: 'equirectangular',
            panorama: '/panoramas/bar.png',
            hotSpots: [
              {
                pitch: 0,
                yaw: -90,
                type: 'info',
                text: 'Bar <br> <a href="/getraenkekarte" target="_blank">Getränkekarte</a>',
                sceneId: 'bar',
                URL: '/getraenkekarte',
              },
              {
                pitch: 0,
                yaw: -20,
                type: 'scene',
                text: 'Eingang',
                sceneId: 'eingang',
              },
              {
                pitch: -12,
                yaw: 90,
                type: 'scene',
                text: 'Showbühne',
                sceneId: 'showBuehne',
              },
              {
                pitch: -0.9,
                yaw: 124.4,
                type: 'scene',
                text: 'Tanzfläche',
                sceneId: 'tanzflaeche',
              },
              {
                pitch: -8,
                yaw: 60,
                type: 'scene',
                text: 'Gästebereich',
                sceneId: 'gaesteBereich',
              },
              {
                pitch: 0,
                yaw: -45,
                type: 'scene',
                text: 'Nichtraucher Raum',
                sceneId: 'noSmoking',
              },
            ],
          },
          noSmoking: {
            title: 'Nichtraucher Raum',
            type: 'equirectangular',
            panorama: '/panoramas/nichtraucher.png',
            yaw: 90,
            hotSpots: [
              {
                pitch: 0,
                yaw: 35,
                type: 'scene',
                text: 'Bar',
                sceneId: 'bar',
              },
              {
                pitch: 0,
                yaw: -72,
                type: 'info',
                text: 'Private Dances',
              },
              {
                pitch: 0,
                yaw: -113,
                type: 'info',
                text: 'Private Dances',
              },
              {
                pitch: 0,
                yaw: -133,
                type: 'info',
                text: 'Private Dances',
              },
            ],
          },
          showBuehne: {
            title: 'Showbühne',
            type: 'equirectangular',
            panorama: '/panoramas/showbuehne.png',
            hotSpots: [
              {
                pitch: 0,
                yaw: 160,
                type: 'scene',
                text: 'Bar',
                sceneId: 'bar',
              },
              {
                pitch: 0,
                yaw: 90,
                type: 'scene',
                text: 'Tanzfläche',
                sceneId: 'tanzflaeche',
              },
              {
                pitch: -2,
                yaw: 182,
                type: 'scene',
                text: 'Nichtraucher Raum',
                sceneId: 'noSmoking',
              },
              {
                pitch: -2,
                yaw: 203,
                type: 'scene',
                text: 'Eingang',
                sceneId: 'eingang',
              },
              {
                pitch: -8,
                yaw: -110,
                type: 'scene',
                text: 'Gästebereich',
                sceneId: 'gaesteBereich',
              },
            ],
          },
          gaesteBereich: {
            title: 'Gästebereich',
            type: 'equirectangular',
            panorama: '/panoramas/gaestebereich.png',
            hotSpots: [
              {
                pitch: 0,
                yaw: 205,
                type: 'scene',
                text: 'Bar',
                sceneId: 'bar',
              },
              {
                pitch: 0,
                yaw: 140,
                type: 'scene',
                text: 'Tanzfläche',
                sceneId: 'tanzflaeche',
              },
              {
                pitch: -35,
                yaw: 130,
                type: 'scene',
                text: 'Schowbühne',
                sceneId: 'showBuehne',
              },
              {
                pitch: -3,
                yaw: 223,
                type: 'scene',
                text: 'Nichtraucher Raum',
                sceneId: 'noSmoking',
              },
              {
                pitch: -3,
                yaw: 245,
                type: 'scene',
                text: 'Eingang',
                sceneId: 'eingang',
              },
            ],
          },
          eingang: {
            title: 'Eingang',
            type: 'equirectangular',
            panorama: '/panoramas/eingang.png',
            hotSpots: [
              {
                pitch: 0,
                yaw: 120,
                type: 'scene',
                text: 'Bar',
                sceneId: 'bar',
              },
            ],
          },
          tanzflaeche: {
            title: 'Tanzfläche',
            type: 'equirectangular',
            panorama: '/panoramas/tanzflaeche.png',
            hotSpots: [
              {
                pitch: -4,
                yaw: 205,
                type: 'scene',
                text: 'Bar',
                sceneId: 'bar',
              },
              {
                pitch: -40,
                yaw: -30,
                type: 'scene',
                text: 'Schowbühne',
                sceneId: 'showBuehne',
              },
              {
                pitch: -4,
                yaw: 220,
                type: 'scene',
                text: 'Nichtraucher Raum',
                sceneId: 'noSmoking',
              },
              {
                pitch: -8,
                yaw: 285,
                type: 'scene',
                text: 'Gästebereich',
                sceneId: 'gaesteBereich',
              },
              {
                pitch: -3,
                yaw: 235,
                type: 'scene',
                text: 'Eingang',
                sceneId: 'eingang',
              },
            ],
          },
        },
      },
    }
  },
}
</script>

<style>
</style>