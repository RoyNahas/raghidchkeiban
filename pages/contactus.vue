<template>
  <v-layout>
    <v-flex xs12>
      <v-card d-flex color="grey lighten-3">
        <v-card-title><v-icon>mdi-phone</v-icon>Contact Us</v-card-title>
        <hr class="grey lighten-4">
        <v-card-text>
          <v-row>
            <v-col cols="12">
              <v-card elevation="10" d-flex color="grey lighten-4">
                <!-- <v-card-title class="Subtitle">Contact<v-icon>mdi-account-box</v-icon></v-card-title>
                <hr> -->
                <v-card-text>
                  <v-icon x-large>mdi-phone</v-icon>phone : +961 70 196 188<v-spacer />
                  <v-icon x-large>mdi-linkedin</v-icon> linkedin :<a href="https://linkedin.com/in/dr-raghid-chkeiban-a69975184"> linkedin.com </a><v-spacer />
                  <v-icon x-large> mdi-email</v-icon>Email : rchkeiban@gmail.com<v-spacer />
                </v-card-text>
              </v-card>
            </v-col>
            <v-col xs="12" md="6">
              <v-card elevation="10" d-flex color="grey lighten-4">
                <v-card-title>Request an Appointment<v-icon>mdi-file-clock</v-icon></v-card-title>
                <hr>
                <v-card-text>
                  <appointment />
                </v-card-text>
              </v-card>
            </v-col>
            <v-col xs="12" md="6" justify="center" align="center">
              <v-avatar
                :height="height"
                :width="height"
              >
                <img
                  src="/main.jpeg"
                >
              </v-avatar>
            </v-col>
          </v-row>
          <v-row>
            <v-col>
              <v-card elevation="10" d-flex color="grey lighten-4">
                <v-card-title>locate Us <v-icon>mdi-crosshairs-gps</v-icon></v-card-title>
                <hr>
                <v-card-text>
                  <v-row justify="center" align="center" class="container1">
                    <v-col xs="12" md="6">
                      <gmapMap
                        :center="{lat:33.89886445443822, lng:35.57057961805222}"
                        :zoom="17"
                        map-type-id="roadmap"
                        class="responsive-iframe"
                      >
                        <GmapMarker
                          v-for="(m, index) in markers"
                          :key="index"
                          :position="m.position"
                          :clickable="true"
                          :draggable="true"
                          @click="center=m.position"
                        />
                      </gmapMap>
                    </v-col>
                  </v-row>
                </v-card-text>
              </v-card>
            </v-col>
          </v-row>
        </v-card-text>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  data () {
    return {
      markers: [{
        position: {
          lat: 33.89886445443822,
          lng: 35.57057961805222
        }
      }]
    }
  },
  computed: {
    height () {
      switch (this.$vuetify.breakpoint.name) {
        case 'xs': return 200
        case 'sm': return 500
        case 'md': return 600
        case 'lg': return 700
        case 'xl': return 700
        default: return 0
      }
    }
  }
}

</script>
<style>
.container1 {
  position: relative;
  overflow: hidden;
  width: 100%;
  padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
}

/* Then style the iframe to fit in the container div with full height and width */
.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}
.img-circle {
    border-radius: 50%;
}
</style>
