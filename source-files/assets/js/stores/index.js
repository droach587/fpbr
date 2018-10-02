// ---------------------------
// Component Index
// This page imports and exports the various app components for declaritive imports app-wise.
// If you create a new component, import it here, and it will be available via ES6 {Import}

import GlobalPropsStore from './GlobalPropsStore';
import CaseStudiesStore from './CaseStudiesStore';
import NewsArticlesStore from './NewsArticlesStore';

class RootStore {
  constructor() {
    this.globalPropsStore = new GlobalPropsStore(this);
    this.caseStudiesStore = new CaseStudiesStore(this);
    this.newsArticlesStore = new NewsArticlesStore(this);
  }
}

export default RootStore;
