<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Course</h1>
    <p class="mb-4 leading-normal"> Course List</p>
    <div class="flex gap-4 mb-8">
      <div v-for="(course, index) in $page.props.courses" :key="index">
        <div class="font-bold">
          {{ course.name }}
        </div>
        <div>
          {{ course.location }}
        </div>
        <div>
          {{ course.holes }}
        </div>
        <div>
          <Link :href="route('course.edit', course.id)" method="get" as="button" type="button" class="border rounded px-4 py-2 bg-green-500">Edit</Link>
        </div>
      </div>
    </div>
    <div>
      <Link href="/course/create" method="get" as="button" type="button" class="border rounded px-4 py-2">Create Course</Link>
    </div>
  </div>
</template>


<script>
import AppLayout from '../../Layouts/AppLayout'
import { Link } from '@inertiajs/inertia-vue3'

export default {
  metaInfo: { title: 'Course' },
  layout: AppLayout,
  components: {
    Link
  },
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