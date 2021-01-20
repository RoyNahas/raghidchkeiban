<template>
  <v-row justify="center" align="center">
    <v-col cols="12">
      <Appointment />
    </v-col>
    <v-spacer />
    <v-col cols="12" justify="center" align="center">
      <v-data-table
        :headers="headers"
        :items="results"
        :items-per-page="5"
        class="elevation-1"
      />
    </v-col>
  </v-row>
</template>
<script>

export default {
  data () {
    return {
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
  mounted () {
    this.loadData()
  },
  methods: {
    loadData () {
      this.$axios.$get(process.env.apiURL + 'get_reserve_list.php')
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
