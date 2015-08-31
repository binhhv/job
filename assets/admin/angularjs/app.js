var app = angular.module('myApp', ['ui.bootstrap','chieffancypants.loadingBar', 'ngAnimate','ngSanitize', 'ui.select']);


app.config(function(cfpLoadingBarProvider) {
    cfpLoadingBarProvider.includeSpinner = true;
  });





