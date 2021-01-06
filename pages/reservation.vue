<template>
  <div>
    <v-row justify="center" align="center">
      <v-data-table
        :headers="headers"
        :items="results"
        :items-per-page="5"
        class="elevation-1"
      />
    </v-row>
    <v-row justify="center" align="center">
      <v-col cols sm="8" offset-sm="2" xs="12">
        <v-card class="mx-auto">
          <v-img
            class="white--text align-end"
            src="/main.jpeg"
            aspect-ratio="1.5"
          >
            <!-- <v-card-title>Dr. Raghid Chkeiban</v-card-title> -->
          </v-img>

          <v-card-subtitle class="pb-0"> Contact : </v-card-subtitle>

          <v-card-text class="text--primary">
            <div><v-icon small>mdi-phone</v-icon>phone : +961 70 196 188</div>
            <div>
              <v-icon small>mdi-linkedin</v-icon>Linkdin :
              <href>linkedin.com/in/dr-raghid-chkeiban-a69975184</href>
            </div>
            <div>
              <v-icon small>mdi-email</v-icon>Email : rchkeiban@gmail.com
            </div>
          </v-card-text>

          <!-- <v-card-actions>
          <v-btn :href="'https://wa.me/+96103327448'"
            ><v-icon color="green" meduim>mdi-whatsapp</v-icon> WhatsApp
          </v-btn>
        </v-card-actions> -->
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  data () {
    return {
      headers: '',
      results: ''
    }
  },

  methods: {
    loadData () {
      this.$axios
        .$get('../php/get_reserve_list.php')
        .then((response) => {
          this.results = response.data
        })
        .catch((error) => {
          // eslint-disable-next-line no-console
          console.log(error)
        })
    }
  }
}
</script>
