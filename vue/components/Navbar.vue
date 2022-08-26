<template>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><router-link to="/" class="nav-link px-2 text-secondary">Главная</router-link></li>
                </ul>

                <div class="text-end">
                    <button type="button" class="btn btn-warning">
                        <router-link to="/register" class="nav-link px-2">Регистрация</router-link>
                    </button>
                </div>
            </div>
        </div>
    </header>
</template>