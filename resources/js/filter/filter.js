import moment from 'moment';
import Vue from 'vue';



Vue.filter('time',(a)=>{
   return moment(a).format('MMMM Do YYYY');
});

Vue.filter('Fronttime',(a)=>{
   return moment(a).format('dddd , MMMM Do YYYY');
});


Vue.filter('subString',(content,length)=>{
   return content.substring(0,length);
});