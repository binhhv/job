var app = angular.module('myApp', ['ui.bootstrap','chieffancypants.loadingBar', 'ngAnimate']);


app.config(function(cfpLoadingBarProvider) {
    cfpLoadingBarProvider.includeSpinner = true;
  })



