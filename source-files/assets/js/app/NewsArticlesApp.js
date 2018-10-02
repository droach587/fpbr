import React, { Component } from 'react';
import {inject, observer} from 'mobx-react';
import {reaction} from 'mobx';

import entities from 'entities';
import moment from 'moment';

@inject ('RootStore')
@observer class NewsArticlesApp extends Component {

  constructor(props) {
    super(props);
    this.loadMorePosts = this.loadMorePosts.bind(this);
  }

  componentDidMount =()=>{
    const {RootStore} = this.props;
    RootStore.newsArticlesStore.fetchData();
  }

  returnEntity =(value)=>{
    return entities.decodeHTML(value);
  }

  returnMomentDate = (value)=>{
    return moment(value).format("MMM D, YYYY");
  }

  renderNewsStories = () =>{
    const {RootStore} = this.props;
    if(RootStore.newsArticlesStore.getNewsArticles.length){
      return (
        <div className="row news-articles__grid align-justify">
          {RootStore.newsArticlesStore.getNewsArticles.map(result => (
            <div className="columns" id={result.id} key={result.slug}>
              <a className="news__article" href={result.acf.article_url} target="_blank">
                <div className="row">
                  <div className="columns">
                    <h2 className="article__headline">{this.returnEntity(result.title.rendered)}</h2>
                  </div>
                </div>
                <div className="article__byline">
                  <p>
                    <strong>{result.acf.article_source}</strong><br />
                    {this.returnMomentDate(result.acf.article_date)}
                  </p>
                </div>
              </a>
            </div>
          ))}
        </div>
      );
    }
  }

  showLoadMore = ()=>{
    const {RootStore} = this.props;
    if(RootStore.globalPropsStore.getGlobalProps.loadMore){
      return (
        <div className="row case-study__load case-study__load--flush">
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
    RootStore.newsArticlesStore.fetchData();

    if(RootStore.globalPropsStore.getGlobalProps.currentPage == RootStore.newsArticlesStore.getNewsArticlesPageCount){
      RootStore.globalPropsStore.updateProp('loadMore', false);
    }
    e.preventDefault();
  }

  render() {
    const {RootStore} = this.props;
    return (
      <section id="news-articles" className="news-articles section">
        <div className="row align-justify">
          <div className="columns shrink">
            <h4 className="section__title section__title--pink">News</h4>
          </div>
        </div>

        { RootStore.globalPropsStore.getGlobalProps.isLoading &&
          <div className="preloader"><div className="loader"></div></div>
        }

        {this.renderNewsStories()}

        {this.showLoadMore()}

      </section>
    );
  }

}

export default NewsArticlesApp;
