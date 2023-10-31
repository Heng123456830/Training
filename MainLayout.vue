<template>
    <Link href="/">Main Page</Link>&nbsp;
    <Link href="/hello">Show Page</Link>
    <div>The page wiht time {{ timer }}</div>
    <slot>Default</slot>


</template>
<script setup>
import{link} from '@inertiajs/inertia-vue3'
import{ref} from 'vue'

const 
timer = (0);
serInterval(() => timer.value,1000)
</script>c