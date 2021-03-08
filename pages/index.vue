<template>
  <v-layout>
    <v-flex xs12>
      <v-card color="transparent" outlined>
        <v-card-text>
          <v-carousel
            cycle
            height="800"
            hide-delimiter-background
            show-arrows-on-hover
          >
            <v-carousel-item
              v-for="(slide, i) in Imgslides"
              :key="i"
            >
              <v-img
                height="100%"
                :src="slide.source"
              >
                <v-row
                  class="fill-height"
                  align="center"
                  justify="center"
                >
                  <div dark class="display-3">
                    {{ slide.name }}
                  </div>
                </v-row>
              </v-img>
            </v-carousel-item>
          </v-carousel>
          <v-spacer />
          <v-card tile>
            <v-card-text justify="center" align="center">
              <v-alert
                prominent
                tile
              >
                <v-row>
                  <v-col cols="12"><h1 class="primary--text">Welcome To Dr. Raghid Chkeiban Clinic</h1></v-col>
                  <v-col cols="12"><h2 class="primary--text">Where Smiles are Transformed!</h2></v-col>
                  <v-col cols="12"><h3 class="primary--text">At Braces for Us™, our mission is to provide the highest quality orthodontic care with exceptional service by going the extra mile before, during, and after your treatment. Dr. Martine DeCambre, along with her knowledgeable team, is committed to giving each patient a beautiful smile and the self-esteem that goes with it.</h3></v-col>
                </v-row>
              </v-alert>
              <v-avatar height="400" width="400">
                <img
                  height="100%"
                  src="/primaryPhoto.JPG"
                >
              </v-avatar>
            </v-card-text>
          </v-card>
        </v-card-text>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  data () {
    return {
      data: '',
      Imgslides: [
        { source: './slide1.jpeg', name: 'slide1' },
        { source: './slide2.jpeg', name: 'slide2' },
        { source: './slide3.jpeg', name: 'slide3' }
      ],
      slideHigh () {
        switch (this.$vuetify.breakpoint.name) {
          case 'xs': return "600"
          case 'sm': return "600"
          case 'md': return "800"
          case 'lg': return "800"
          case 'xl': return "800"
          default: return "500"
        }
      }
    }
  }
}
</script>
<style>
</style>
