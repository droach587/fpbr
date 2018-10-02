// ---------------------------
// This store contains all of the search results from the wire
// Via fetch, results are populated and distributed to their views.
// When this store updates, the entire view populates and reacts with new data.

import axios from 'axios';

import {observable, action, computed} from 'mobx';

class caseStudiesStore {

  constructor(rootStore) {
    this.rootStore = rootStore;
    //If local, use hardcoded staging site
    this.baseURL = (window.location.origin == 'http://solutions-viacom.local')? 'https://viacompartners.wpengine.com' : window.location.origin;
  }

  @observable caseStudies = [];
  @observable caseStudyAllCount = '';
  @observable caseStudyPageCount = '';
  @observable caseStudyTags = [];
  @observable tagsIndividual = [];
  @observable caseStudyCats = [];
  @observable catsIndividual = [];


  getAllTags =()=>{
    return axios.get(`${this.baseURL}/wp-json/wp/v2/tags?hide_empty=true&per_page=100`);
  }

  getAllCats =()=>{
    return axios.get(`${this.baseURL}/wp-json/wp/v2/categories?hide_empty=true&per_page=100`);
  }

  getAllCaseStudies =()=>{
    const totalPosts = this.rootStore.globalPropsStore.getGlobalProps.totalPosts;
    const loadRoute = this.rootStore.globalPropsStore.getGlobalProps.loadRoute;
    const currentPage = this.rootStore.globalPropsStore.getGlobalProps.currentPage;
    const filterCats = (this.rootStore.globalPropsStore.getGlobalProps.filterCats.length)? `&categories=${this.rootStore.globalPropsStore.getGlobalProps.filterCats.join(',')}` : '';
    const filterTags = (this.rootStore.globalPropsStore.getGlobalProps.filterTags.length)? `&tags=${this.rootStore.globalPropsStore.getGlobalProps.filterTags.join(',')}` : '';
    return axios.get(`${this.baseURL}/wp-json/wp/v2/${loadRoute}?per_page=6&page=${currentPage}&status=publish${filterCats}${filterTags}`);
  }

  @action fetchData = (url) => {
    const _this = this;

    axios.all([_this.getAllTags(), _this.getAllCats(), _this.getAllCaseStudies()]).then(axios.spread(function (tags, cats, caseStudies) {
      // All requests are now complete

      //Populate Case Studies
      _this.caseStudies.push(...caseStudies.data);

      //Populate Total Case Studies
      _this.caseStudyAllCount = caseStudies.headers['x-wp-total'];
      _this.caseStudyPageCount = caseStudies.headers['x-wp-totalpages'];

      //Tags
      tags.data.forEach(function (tag, index) {
        if(!_this.tagsIndividual.includes(tag.id)){
          _this.tagsIndividual.push(tag.id);
          _this.caseStudyTags.push({"id" : tag.id, "name" : tag.name, "slug" : tag.slug});
        }
      });

      //Cats
      cats.data.forEach(function (cat, index) {
        if(!_this.catsIndividual.includes(cat.id)){
          _this.catsIndividual.push(cat.id);
          _this.caseStudyCats.push({"id" : cat.id, "name" : cat.name, "slug" : cat.slug});
        }
      });

      //Hide isLoading
      _this.rootStore.globalPropsStore.updateProp('isLoading', false);

      if(_this.caseStudyPageCount > 1 && _this.caseStudyPageCount > _this.rootStore.globalPropsStore.getGlobalProps.currentPage){
        _this.rootStore.globalPropsStore.updateProp('loadMore', true);
      }

    }));
  }

  @action filterData =()=>{
    this.caseStudies = [];
    this.caseStudyAllCount = '';
    this.caseStudyPageCount = '';
    this.rootStore.globalPropsStore.updateProp('currentPage', 1);
    this.rootStore.globalPropsStore.updateProp('loadMore', false);
    this.fetchData();
  }

  @computed get getCaseStudies(){
    return this.caseStudies;
  }

  @computed get getCaseStudiesCount(){
    return this.caseStudyAllCount;
  }

  @computed get getCaseStudiesPageCount(){
    return this.caseStudyPageCount;
  }

  @computed get getCaseStudyTags(){
    return this.caseStudyTags;
  }

  @computed get getCaseStudyCats(){
    return this.caseStudyCats;
  }


}

export default caseStudiesStore;
