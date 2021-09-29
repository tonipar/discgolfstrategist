<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Course Creation</h1>
    <p class="mb-8 leading-normal"> Create a course</p>
    <form @submit.prevent="store">
      <div>
        <label for="name">Name:</label>
        <input id="first_name" v-model="form.name" />
      </div>
      <div>
        <label for="name">Location:</label>
        <input id="first_name" v-model="form.location" />
      </div>
      <div>
        <label for="name">Number of holes:</label>
        <input id="first_name" v-model="form.holes" />
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout'
export default {
  metaInfo: { title: 'Create Course' },
  layout: AppLayout,
  data () {
      return {
          form: this.$inertia.form ({
              name: null,
              location: null,
              holes: null,
          }),
      }
  },
  methods: {
    store: function () {
      this.form.post(this.route('course.store'))
    }
  }
}
</script>