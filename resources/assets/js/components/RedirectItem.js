import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class RedirectItem extends Component {
    constructor(props) {
        super(props);
        this.state = {url: ''};

        this.handleClick = this.handleClick.bind(this);
    }

    handleClick(event) {
        event.preventDefault();

        axios.get(this.state.url).then((response) => {
            console.log(response);
        });
    }

    componentWillMount() {
        this.setState({url: this.props.url});
    }

    render() {
         var url = this.state.url;

        return (
            <a href='#' onClick={this.handleClick}>{url}</a>
        );
    }
}