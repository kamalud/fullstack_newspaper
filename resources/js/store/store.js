import axios from "axios";

export default{
    state:{
        categoryData:[],
        postData:[],
    },
    getters:{
        getcategory(state){
            return state.categoryData;
        },
        getpost(state){
            return state.postData;
        }
    },
    actions:{
        categoryInfo(data){
            axios.get('admin/category-get').then(response=>{
               data.commit('categoryall',response.data.categories);
            });
        },
        postInfo(data){
            axios.get('/admin/post-get').then(response=>{
               data.commit('postall',response.data.posts);
            });
        }
    },
    mutations:{
        categoryall(state,data){
            state.categoryData = data;
        },
        postall(state,data){
            state.postData = data;
        }
    },
}          