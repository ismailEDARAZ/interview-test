<template>
    <div>
        <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                Laravel test
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/"> Accueil </a>
                <a class="navbar-item" href="/courses">  Courses  </a>
                <a class="navbar-item" href="/categories">  Categories  </a>
            </div>

            <div class="navbar-end">
            <div class="navbar-item">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link"> FR</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item">  EN </a>
                            <a class="navbar-item"> AR </a>
                        </div>
                </div>
            </div>
            </div>
        </div>
        </nav>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
