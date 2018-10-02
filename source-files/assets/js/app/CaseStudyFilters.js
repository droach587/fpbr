import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {inject, observer} from 'mobx-react';
import {reaction} from 'mobx';

@inject ('RootStore')
@observer class CaseStudyFilters extends Component {

  constructor(props) {
    super(props);
    this.state = {
      filters: [],
      disabled: true,
    }
  }

  onChange =(e)=>{
    // current array of options
    const {RootStore} = this.props;
    const filters = this.state.filters;
    const _this = this;
    const headingLower = this.props.heading.toLowerCase();
    let index;

    if(e.target.name == `${headingLower}-all`){
      //this.refs.checked = false;
      for (var key in this.refs) {
      	if (this.refs.hasOwnProperty(key)) {
      		this.refs[key].checked = false;
      	}
        filters.length = 0;
      }
    }else{
      // check if the check box is checked or unchecked
      if (e.target.checked) {
        filters.push(e.target.value);
      }else{
        index = filters.indexOf(+e.target.value);
        filters.splice(index, 1);
      }
    }

    // update the state with the new array of options
    this.setState({ filters: filters });

    if(this.props.type == "tag"){
      RootStore.globalPropsStore.updateProp('filterTags', this.state.filters);
    }

    if(this.props.type == "cat"){
      RootStore.globalPropsStore.updateProp('filterCats', this.state.filters);
    }

    if(this.state.filters.length >= 1){
      this.setState({ disabled: false });
    }

    if(this.state.filters.length == 0){
      this.setState({ disabled: true });
    }

    RootStore.globalPropsStore.updateProp('isLoading', true);
    RootStore.caseStudiesStore.filterData();

  }

  allSelectClick =(e)=>{
    this.setState({ filters: [] });
    this.onChange(e);
  }

  renderFilterCheck =(id, slug, name, heading)=> {
    const headingLower = heading.toLowerCase();
    return(
      <div className="columns xsmall-24" id={id} key={slug}>
        <label className="filter__label"><input type="checkbox" className={`js-${headingLower}-filter`} ref={`js-${headingLower}-filter-${id}`} value={id} name={`${headingLower}-filters[]`} onChange={this.onChange} /> <span className="label__check"></span> {name} </label>
      </div>
    );
  }

  renderFilterList =()=>{
    const {RootStore} = this.props;
    const _this = this;
    if(this.props.type == "tag"){
      return (
        <React.Fragment>
          {RootStore.caseStudiesStore.getCaseStudyTags.map(result => (
            _this.renderFilterCheck(result.id, result.slug, result.name, _this.props.heading)
          ))}
        </React.Fragment>
      );
    }
    if(this.props.type == "cat"){
      return (
        <React.Fragment>
          {RootStore.caseStudiesStore.getCaseStudyCats.map(result => (
            _this.renderFilterCheck(result.id, result.slug, result.name, _this.props.heading)
          ))}
        </React.Fragment>
      );
    }
  }

  render() {
    const {RootStore} = this.props;
    const headingLower = this.props.heading.toLowerCase();
    const disabled = this.state.disabled ? 'disabled' : '';
    const checked = this.state.disabled ? 'checked' : '';
    return (
      <div className="row case-studies__filters align-middle">

        <div className="columns filter__heading-wrapper shrink js-mobile-toggle" data-target="#demo-filters">
          <div className="row">
            <div className="columns">
              <h6 className="filter__heading">Filter by {this.props.heading}</h6>
              <span className="filter__carat hide-for-large"></span>
            </div>
          </div>
        </div>

        <div className="columns filter__filters-wrapper">
          <div className="row align-middle">
            <div className="columns shrink">
              <label className="filter__label"><input disabled={disabled} checked={checked} onClick={this.allSelectClick} type="checkbox" className="js-cs-filter" value="{this.state.allCheckValue}" name={`${headingLower}-all`}/> <span className="label__check"></span> All</label>
            </div>
            <div className="columns show-for-large">
              <span className="filter__slash">/</span>
            </div>
            {this.renderFilterList()}
          </div>
        </div>

      </div>
    );
  }

}

export default CaseStudyFilters;
