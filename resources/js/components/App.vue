<template>

    <div class="uk-container">
      <header>

        <nav class="uk-navbar-container">
        <div class="uk-container">
            <div uk-navbar>
                <div class="uk-navbar-center">
                    <div class="uk-navbar-center-left">
                        <ul class="uk-navbar-nav">
                            <li class="uk-active"> <router-link to="/" class="uk-navbar-item uk-logo" style="text-decoration: none; ">Home</router-link></li>
                        </ul>
                    </div>
                    <router-link to="/" class="uk-navbar-item uk-logo" style="text-decoration: none; ">SavePhoto</router-link>
                    <div class="uk-navbar-center-right">
                        <ul class="uk-navbar-nav">
                            <li><router-link to="/photos/create" class="nav-link text-white" style="text-decoration: none; ">Add Product</router-link></li>
                            <!-- <li><a href="/photo/list">List</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

      </header>

      <div class="card">
        <div class="card-body">
          <div class="container-fluid">
            <router-view></router-view>
          </div>
        </div>
      </div>

    </div>

    </template>

    <script>
    export default {
      name: 'App'
    }
    </script>
