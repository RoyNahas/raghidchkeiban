<template>
  <v-app>
    <v-navigation-drawer
      v-model="drawer"
      :mini-variant="miniVariant"
      :clipped="clipped"
      fixed
      app
      dark
      color="rgb(39, 17, 152)"
    >
      <v-list dark>
        <v-list-item
          v-for="(item, i) in items"
          :key="i"
          :to="item.to"
          router
          exact
        >
          <v-list-item-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title v-text="item.title" />
          </v-list-item-content>
          <hr color="raghid3">
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar
      :clipped-left="clipped"
      app
      :prominent="showOnScreen"
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-spacer v-if="showOnScreen" />
      <v-img
        src="logo_color - menu.jpg"
        contain
        :max-height="showOnScreen ? 120 : 50"
      />
      <v-spacer v-if="showOnScreen" />
      <v-row v-if="showOnScreen">
        <v-col v-if="showOnScreen" cols="12">
          <h4 v-if="showOnScreen">
            <v-icon v-if="showOnScreen" large>mdi-cellphone</v-icon>
            (+961)-70196188
          </h4>
        </v-col>
        <v-col v-if="showOnScreen" cols="12">
          <div v-if="showOnScreen" class="mt-n6 subtitle-2">
            <v-icon v-if="showOnScreen" small>mdi-doctor</v-icon>
            Dr raghid chkeiban
          </div>
        </v-col>
      </v-row>
      <v-row v-if="showOnScreen">
        <v-col>
          <v-btn v-if="showOnScreen" large color="success">Make An Appoitment</v-btn>
        </v-col>
      </v-row>
    </v-app-bar>
    <v-main>
      <v-container>
        <nuxt />
        <v-speed-dial
          v-model="fab"
          :fixed="true"
          :top="false"
          :bottom="true"
          :right="true"
          :left="false"
          :direction="direction"
          :open-on-hover="hover"
          :transition="transition"
        >
          <template v-slot:activator>
            <v-btn
              v-model="fab"
              color="blue darken-2"
              dark
              fab
            >
              <v-icon v-if="fab">
                mdi-close
              </v-icon>
              <v-icon v-else>
                mdi-phone
              </v-icon>
            </v-btn>
          </template>
          <v-btn
            fab
            dark
            color="indigo"
            href="https://www.facebook.com/raghid.chkeiban.3"
          >
            <v-icon>mdi-facebook</v-icon>
          </v-btn>
          <v-btn
            fab
            dark
            color="blue"
            @click="dialog = !dialog"
          >
            <v-icon>mdi-phone</v-icon>
          </v-btn>
          <v-btn
            fab
            href="https://www.instagram.com/raghidchkeiban"
          >
            <v-icon>mdi-instagram</v-icon>
          </v-btn>
        </v-speed-dial>

        <v-dialog v-model="dialog" max-width="500px">
          <v-card>
            <v-card-text>
              <p class="display-1 text--primary d-flex justify-center">
                03327448
              </p>
            </v-card-text>
            <v-card-actions>
              <v-spacer />
              <v-btn text color="primary" @click="dialog = false">
                Close
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-container>
    </v-main>
    <v-footer :absolute="!fixed" app>
      <span>&copy; {{ new Date().getFullYear() }}</span>
    </v-footer>
  </v-app>
  <!-- <v-btn class="rounded" color="blue"><v-icon color="white">mdi-facebook</v-icon></v-btn>
 <v-btn><v-icon>mdi-instagram</v-icon></v-btn> -->
</template>

<script>
export default {
  data () {
    return {
      clipped: false,
      drawer: false,
      fixed: false,
      items: [
        {
          icon: 'mdi-apps',
          title: 'Welcome',
          to: '/'
        },
        {
          icon: 'mdi-table-plus',
          title: 'Appoitment',
          to: '/reservation'
        },
        {
          icon: 'mdi-file-document-multiple-outline',
          title: 'Cases',
          to: '/cases'
        },
        {
          icon: 'mdi-phone',
          title: 'Contact Us',
          to: '/contactus'
        }
      ],
      miniVariant: false,
      right: true,
      rightDrawer: false,
      direction: 'top',
      fab: false,
      fling: false,
      hover: false,
      tabs: null,
      dialog: false,
      transition: 'slide-y-reverse-transition'
    }
  },
  computed: {
    showOnScreen () {
      switch (this.$vuetify.breakpoint.name) {
        case 'xs': return false
        case 'sm': return false
        case 'md': return true
        case 'lg': return true
        case 'xl': return true
        default: return false
      }
    }
  }
}
</script>
