<template>
    <div>
        <nav-bar />
        <vs-row>
            <vs-col offset="2" w="8">
                <slot />
            </vs-col>
        </vs-row>
    </div>
</template>

<script>
import NavBar from "../components/NavBar";
export default {
    components: {NavBar}
}
</script>
