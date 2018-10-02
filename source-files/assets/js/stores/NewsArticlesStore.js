// ---------------------------
// This store contains all of the search results from the wire
// Via fetch, results are populated and distributed to their views.
// When this store updates, the entire view populates and reacts with new data.

import axios from 'axios';

import {observable, action, computed} from 'mobx';

class newsArticleStore {

  constructor(rootStore) {
    this.rootStore = rootStore;
    //If local, use hardcoded staging site
    this.baseURL = (window.location.origin == 'http://solutions-viacom.local')? 'https://viacompartners.wpengine.com' : window.location.origin;
  }

  @observable newsArticles = [];
  @observable newsArticlesAllCount = '';
  @observable newsArticlesPageCount = '';


  getAllNewsArticles =()=>{
    const totalPosts = this.rootStore.globalPropsStore.getGlobalProps.totalPosts;
    const loadRoute = this.rootStore.globalPropsStore.getGlobalProps.newsRoute;
    const currentPage = this.rootStore.globalPropsStore.getGlobalProps.currentPage;
    return axios.get(`${this.baseURL}/wp-json/wp/v2/${loadRoute}?per_page=3&page=${currentPage}&status=publish`);
  }

  @action fetchData = (url) => {
    const _this = this;

    axios.all([_this.getAllNewsArticles()]).then(axios.spread(function (newsArticles) {
      // All requests are now complete

      //Populate Case Studies
      _this.newsArticles.push(...newsArticles.data);

      //Populate Total Case Studies
      _this.newsArticlesAllCount = newsArticles.headers['x-wp-total'];
      _this.newsArticlesPageCount = newsArticles.headers['x-wp-totalpages'];

      //Hide show isLoading
      _this.rootStore.globalPropsStore.updateProp('isLoading', false);

    }));
  }

  @computed get getNewsArticles(){
    return this.newsArticles;
  }

  @computed get getNewsArticlesCount(){
    return this.newsArticlesAllCount;
  }

  @computed get getNewsArticlesPageCount(){
    return this.newsArticlesPageCount;
  }


}

export default newsArticleStore;
