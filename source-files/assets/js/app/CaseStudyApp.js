import React, { Component } from 'react';
import {inject, observer} from 'mobx-react';
import {reaction} from 'mobx';

import entities from 'entities';

import { CaseStudyFilters } from './reactComponentIndex';

@inject ('RootStore')
@observer class CaseStudyApp extends Component {

  constructor(props) {
    super(props);
    this.loadMorePosts = this.loadMorePosts.bind(this);
  }

  componentDidMount =()=>{
    const {RootStore} = this.props;
    RootStore.globalPropsStore.updateProp('loadRoute', this.props.route );
    RootStore.caseStudiesStore.fetchData();
  }

  returnEntity =(value)=>{
    return entities.decodeHTML(value);
  }

  renderCaseStudies = () =>{
    const {RootStore} = this.props;

    if(RootStore.caseStudiesStore.getCaseStudies.length){
      return (
        <div className="row case-studies__grid">
          {RootStore.caseStudiesStore.caseStudies.map(result => (
            <div className="columns" id={result.id} key={result.slug}>
              <a className="case-study__feature" href={result.link}>
                <img src={result.better_featured_image.media_details.sizes['case-study-thumb'].source_url} width="100%" height="auto" />
              </a>
              <div className="case-study__excerpt">
                <h4 className="excerpt__heading"><a href={result.link}>{this.returnEntity(result.title.rendered)}</a></h4>
                <p className="excerpt__body">
                  {this.returnEntity(result.acf.excerpt)}
                </p>
              </div>
            </div>
          ))}
        </div>
      );
    }

    if(RootStore.caseStudiesStore.getCaseStudies.length === 0){
      return (
        <div className="row case-studies__grid align-justify">
          <div className="columns full">
            <p className="lead case-studies__no-cs-found">Sorry, we could not find any case studies that match your current filter or tag selections. Please select all and try again.</p>
          </div>
        </div>
      )
    }
  }

  showLoadMore = ()=>{
    const {RootStore} = this.props;
    if(RootStore.globalPropsStore.getGlobalProps.loadMore){
      return (
        <div className="row case-study__load">
          <div className="columns">
            <a href="#" onClick={this.loadMorePosts} className="slash-link slash-link--load"><span className="slash"></span> Load More</a>
          </div>
        </div>
      );
    }
  }

  loadMorePosts = (e) =>{
    const {RootStore} = this.props;
    const _this = this;
    RootStore.globalPropsStore.updateProp('isLoading', true);
    RootStore.globalPropsStore.paginate();
    RootStore.caseStudiesStore.fetchData();

    if(RootStore.globalPropsStore.getGlobalProps.currentPage == RootStore.caseStudiesStore.getCaseStudiesPageCount){
      RootStore.globalPropsStore.updateProp('loadMore', false);
    }
    e.preventDefault();
  }

  render() {
    const {RootStore} = this.props;
    return (
      <section>

        { RootStore.globalPropsStore.getGlobalProps.isLoading &&
          <div className="preloader"><div className="loader"></div></div>
        }

        <CaseStudyFilters type="cat" heading={this.props.heading} />
        <CaseStudyFilters type="tag" heading="Category" />

        {this.renderCaseStudies()}
        {this.showLoadMore()}

      </section>
    );
  }

}

export default CaseStudyApp;
