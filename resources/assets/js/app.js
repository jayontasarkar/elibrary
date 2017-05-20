
require('./bootstrap');

import GraphComponent from './components/GraphComponent'

Vue.component('graph-component', GraphComponent);

const app = new Vue({
    el: '#app',
    data: window.Laravel
});
