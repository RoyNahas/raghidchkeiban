<template>
  <v-card tile>
    <v-card-text>
      <validation-observer
        ref="observer"
        v-slot="{ invalid }"
      >
        <form @submit.prevent="submit">
          <validation-provider
            v-slot="{ errors }"
            name="Name"
            rules="required|max:50"
          >
            <v-text-field
              v-model="name"
              :counter="50"
              :error-messages="errors"
              label="Name"
              required
            />
          </validation-provider>
          <validation-provider
            v-slot="{ errors }"
            name="phoneNumber"
            :rules="{
              required: true,
              digits: 8
            }"
          >
            <v-text-field
              v-model="phoneNumber"
              :counter="8"
              :error-messages="errors"
              label="Phone Number"
              required
            />
          </validation-provider>
          <validation-provider
            v-slot="{ errors }"
            name="email"
            rules="required|email"
          >
            <v-text-field
              v-model="email"
              :error-messages="errors"
              label="E-mail"
              required
            />
          </validation-provider>
          <v-menu
            v-model="menu2"
            :close-on-content-click="false"
            :nudge-right="40"
            transition="scale-transition"
            offset-y
            min-width="auto"
          >
            <template v-slot:activator="{ on, attrs }">
              <!--v-slot:[`item.actions`]="{ item } ">  -->
              <v-text-field
                v-model="date"
                label="Date"
                prepend-icon="mdi-calendar"
                readonly
                v-bind="attrs"
                v-on="on"
              />
            </template>
            <v-date-picker
              v-model="date"
            />
          </v-menu>
          <validation-provider
            v-slot="{ errors }"
            name="select"
            rules="required"
          >
            <v-select
              v-model="select"
              :items="items"
              :error-messages="errors"
              label="Reason of Reservation"
              data-vv-name="select"
              required
            />
          </validation-provider>
          <v-textarea
            v-model="moreInfo"
            name="input-7-1"
            filled
            label="More Info"
            auto-grow
          />
          <v-btn
            class="mr-4"
            type="submit"
            :disabled="invalid"
          >
            submit
          </v-btn>
          <v-btn @click="clear">
            clear
          </v-btn>
        </form>
      </validation-observer>
    </v-card-text>
  </v-card>
</template>
<script>
import { required, digits, email, max, regex } from 'vee-validate/dist/rules'
import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate'

setInteractionMode('eager')

extend('digits', {
  ...digits,
  message: '{_field_} needs to be {length} digits. ({_value_})'
})

extend('required', {
  ...required,
  message: '{_field_} can not be empty'
})

extend('max', {
  ...max,
  message: '{_field_} may not be greater than {length} characters'
})

extend('regex', {
  ...regex,
  message: '{_field_} {_value_} does not match {regex}'
})

extend('email', {
  ...email,
  message: 'Email must be valid'
})

export default {
  components: {
    ValidationProvider,
    ValidationObserver
  },
  data () {
    return {
      name: '',
      phoneNumber: '',
      email: '',
      select: null,
      moreInfo: '',
      date: new Date().toISOString().substr(0, 10),
      results: [],
      items: ['Appointment', 'Consultation', 'Payment', 'Check Up'],
      menu2: false

    }
  },
  computed: {
    dataToSend () {
      return {
        name: this.name,
        phoneNumber: this.phoneNumber,
        email: this.email,
        select: this.select,
        moreInfo: this.moreInfo,
        date: this.date
      }
    },
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
    submit () {
      this.saveReservation()
      this.$refs.observer.validate()
    },
    clear () {
      this.name = ''
      this.phoneNumber = ''
      this.email = ''
      this.select = null
      this.$refs.observer.reset()
    },
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
    },
    saveReservation () {
      this.$axios.post(process.env.apiURL + 'set_reservation.php', 'data=' + encodeURIComponent(JSON.stringify(this.dataToSend)))
        .then((response) => {
          console.log(response)
        })
        .catch((error) => {
          // eslint-disable-next-line no-console
          console.log(error)
        })
    }
  }
}
</script>
