<template>
    <div>
        <h1 class="mb-8 font-bold text-3xl">Edit Course</h1>
        <p class="mb-8 leading-normal">Edit the course</p>
    <form @submit.prevent="update">
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
     <div>
        <Link :href="route('course.destroy', course.id)" method="delete" as="button" type="button" class="border rounded px-4 py-2 bg-red-500">Delete</Link>
    </div>
  </div>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout'
import { Link } from '@inertiajs/inertia-vue3'

export default {
  metaInfo: { title: 'Edit Course' },
  layout: AppLayout,
  components: {
      Link
  },
  props: {
      course: Object,
  },
  data () {
      return {
          form: this.$inertia.form ({
              name: this.course.name,
              location: this.course.location,
              holes: this.course.holes,
          }),
      }
  },
  methods: {
    update: function () {
      this.form.put(this.route('course.update', this.course.id))
    }
  }
}
</script>