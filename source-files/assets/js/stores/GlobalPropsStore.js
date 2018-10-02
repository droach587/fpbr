// ---------------------------
// Global Properties rootStore
// This controls all of the high-level states of the application for view reactivity.

import {observable, action, computed, autorun} from 'mobx';

class GlobalPropsStore {

  constructor(rootStore) {
    this.rootStore = rootStore
  }

  @observable csProps = {
    postsToLoad: 6,
    articlesToLoad: 3,
    currentPage: 1,
    isLoading: true,
    loadMore: true,
    filterTags: [],
    filterCats: [],
    loadRoute: 'case_studies',
    newsRoute: 'news'
  };

  @action updateProp = (prop, value) => {
    this.csProps[prop] = value;
  }

  @action paginate = () => {
    this.csProps.currentPage ++;
  }

  @computed get getGlobalProps(){
    return this.csProps;
  }

}

export default GlobalPropsStore;
