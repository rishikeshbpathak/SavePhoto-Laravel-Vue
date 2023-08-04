--> composer create-project --prefer-dist laravel/laravel laravel-vue-crud

--> cd laravel-vue-crud

//--Next, we will install the Laravel frontend scaffolding. This provides a starting point for integrating Vue.js into our application. To install it, run:--//

--> composer require laravel/ui

//--Now, generate the basic scaffolding for Vue.js:--//

--> php artisan ui vue

//--Finally, install the necessary npm dependencies:--//

--> npm install

//--Creating the Model, Migration, and Controller--//
--> php artisan make:model Product -mcr

//--Installing Vue 3 and Dependencies--//
--> npm install vue@next vue-router@next axios --save
