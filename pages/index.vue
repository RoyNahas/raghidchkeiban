<template>
  <v-layout>
    <v-flex xs12>
      <v-card color="blue lighten-5">
        <v-card-text>
          <v-parallax
            src="/older-doctor.jpg"
            height="956"
            class="parallax-mirror"
          />
          <v-row justify="center" align="center">
            <v-col sm="3" offset-sm="5" xs="6">
              <h1 color="yellow" style="center">Coming Soon</h1>
            </v-col>
            <v-col sm="3" xs="6">
              <v-img src="/tooth-build.jpg" max-height="200" max-width="200" />
            </v-col>
          </v-row>
          <!-- <v-row justify="center" align="center">
            <v-card>
              <v-img src="/logo_color.jpg" />
            </v-card>
          </v-row> -->
          <v-btn class="mr-4">submit</v-btn>
        </v-card-text>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  data () {
    return {
      data: ''
    }
  }
}
</script>
<style>
.parallax-mirror,#vurtUnderlay{
    height:auto!important;
    width:100%!important;
    padding:45% 0 0;
}
.parallax-mirror img{width:100%!important;height:100%!important}
</style>
