<template>
  <div :class="returnClasses" :style="returnStyle">
    <div
      class="content-container text-block"
      :class="returnRowClass"
      :id="component.containerId"
    >
      <div
        v-if="
          component.mainHeadline ||
          component.subHeadline ||
          component.contentText ||
          component.button
        "
        class="colum-content text-container"
      >
        <h1
          v-if="component.mainHeadline && index == 0"
          style="margin-bottom: 0px"
        >
          {{ component.mainHeadline }}
        </h1>
        <h2 v-else>{{ component.mainHeadline }}</h2>
        <h3
          v-if="component.subHeadline"
          :style="index == 0 ? 'margin-top: 5px' : ''"
        >
          {{ component.subHeadline }}
        </h3>
        <p
          v-if="component.contentText"
          v-html="$md.render(component.contentText)"
        ></p>
        <NuxtLink
          v-if="
            component.button &&
            component.button.buttonText &&
            component.button.buttonLink
          "
          :to="LocalizePath(component.button.buttonLink)"
          :class="component.button.buttonIcon ? 'append-icon' : ''"
          class="button"
          >{{ component.button.buttonText }}</NuxtLink
        >
      </div>
      <div class="colum-content" v-if="checkVisibility">
        <img
          v-if="component.imageblock && component.imageblock.image"
          :class="!component.button ? 'image-margin' : ''"
          :src="component.imageblock.image"
          :alt="component.mainHeadline"
        />
        <div v-if="component.faq">
          <faq-component :faqProp="component.faq"></faq-component>
        </div>
        <div v-if="component.speisekarte">
          <getraenkekarte-component
            :getraenkekarteProp="component.speisekarte"
          ></getraenkekarte-component>
        </div>
        <div v-if="component.contactForm">
          <formular-component></formular-component>
        </div>
        <div v-if="component.imageblock && component.imageblock.sphereViewer">
          <sphere-viewer-component></sphere-viewer-component>
        </div>
      </div>
      <div
        style="position: relative; width: 100%"
        :class="
          !component.button ? 'image-mansonary image-margin' : 'image-mansonary'
        "
        v-if="component.imageblock && component.imageblock.galery"
      >
        <img
          v-for="(image, index) in component.imageblock.galery"
          :key="index"
          :src="image.image"
          alt="blue-angle-gallerie-bild"
        />
      </div>
    </div>
  </div>
</template>

<script>
import Macy from 'macy'

export default {
  props: ['component', 'index'],
  data() {
    return {}
  },
  computed: {
    checkVisibility() {
      console.log(this.component)
      let visible = false
      if (this.component.imageblock && this.component.imageblock.image) {
        visible = true
      } else if (this.component.faq) {
        visible = true
      } else if (this.component.speisekarte) {
        visible = true
      } else if (this.component.contactForm) {
        visible = true
      } else if(this.component.imageblock && this.component.imageblock.sphereViewer) {
        visible = true
      }
      return visible
    },
    backgroundImage() {
      return (
        this.component.imageblock && this.component.imageblock.backgroundImage
      )
    },
    returnStyle() {
      return {
        'background-image': this.backgroundImage
          ? `url(${this.backgroundImage})`
          : '',
        'background-size': 'cover',
        'background-position': 'center',
      }
    },
    returnRowClass() {
      let classString = ''
      if (
        (this.component.imageblock &&
          !this.component.imageblock.galery &&
          !this.component.imageblock.backgroundImage) ||
        this.component.faq ||
        this.component.speisekarte ||
        this.component.contactForm
      ) {
        classString = 'row-2'
      } else {
        classString = 'row'
      }

      if (this.index % 2 === 0) {
        classString += ' row-even'
      } else {
        classString += ' row-odd'
      }
      return classString
    },
    returnClasses() {
      return {
        'full-height':
          this.component.imageblock &&
          this.component.imageblock.backgroundImage,
        highlighted: this.component.highlight,
      }
    },
  },
  mounted() {
    if (this.component.imageblock && this.component.imageblock.galery) {
      this.initMacy()
    }
  },
  methods: {
    LocalizePath(path) {
      const locale = this.$i18n.locale
      return `/${locale}${path}`
    },
    initMacy() {
      const macy = Macy({
        container: '.image-mansonary',
        trueOrder: false,
        waitForImages: true,
        margin: 24,
        columns: 2,
        breakAt: {
          1200: 2,
          940: 1,
          520: 1,
          400: 1,
        },
      })
      console.log(macy)
    },
  },
}
</script>

<style>
.row {
  display: inline-flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
}

.full-height {
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.text-block {
  padding-top: 100px;
  padding-bottom: 100px;
}

.highlighted {
  background-image: url('/images/backgrounds/leather-angle.png');
  background-size: cover;
  background-position: center;
  color: var(--background-dark);
}

.highlighted h2,
.highlighted h3,
.highlighted p {
  color: var(--background-dark);
}

.image-margin {
  margin-top: 100px;
}

.colum-content img {
  width: 100%;
}

.text-container {
  width: 100%;
}

.image-mansonary img {
  width: 100%;
}

@media (min-width: 995px) {
  .row {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  .row-2 {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
  }

  .row-2 .colum-content {
    text-align: left;
  }

  .row-even {
    flex-direction: row-reverse;
  }

  .colum-content {
    width: 50%;
    position: relative;
  }

  .row-2 .colum-content:nth-child(1) {
    margin-right: 15px;
  }

  .colum-content:nth-child(2) {
    margin-left: 15px;
  }

  .text-container {
    width: 40%;
  }
}
</style>