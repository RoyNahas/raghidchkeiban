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
              <v-icon small>mdi-linkedin</v-icon>Linkdin :linkedin.com/in/dr-raghid-chkeiban-a69975184
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
      results: [{ reserve_ID: 0, reserve_Date: '01/01/2020', reserve_Name: 'jonDoe', reserve_Notes: '' }]
    }
  },
  computed: {
    headers () {
      return [
        {
          text: 'ID',
          align: 'start',
          sortable: false,
          value: 'reserve_ID'
        },
        {
          text: 'Date',
          align: 'start',
          sortable: false,
          value: 'reserve_Date'
        },
        {
          text: 'Name',
          align: 'start',
          sortable: false,
          value: 'reserve_Name'
        },
        {
          text: 'Notes',
          align: 'start',
          sortable: false,
          value: 'reserve_Notes'
        },
        {
          text: 'Accepted',
          align: 'start',
          sortable: false,
          value: 'reserve_acceptance'
        }]
    }
  },
  mounted  () {
    this.loadData()
  },
  methods: {
    async loadData () {
      await this.$axios.$get(process.env.apiURL + 'get_reserve_list.php')
        .then((response) => {
          console.log(response)
          this.results = response
          console.log('results:', this.results)
        })
        .catch((error) => {
          // eslint-disable-next-line no-console
          console.log(error)
        })
    }
  }
}
</script>
